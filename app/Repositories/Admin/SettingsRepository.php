<?php

namespace App\Repositories\Admin;

use App\Exceptions\ExceptionHandler;
use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Interface SettingRepository.
 */
class SettingsRepository extends BaseRepository
{
    protected $fields = [
        'ads_Settings',
        'email_settings',
        'general_settings',
        'update_popup_setting',
    ];

    public function model()
    {
        return Setting::class;
    }

    public function index()
    {
        $settings = $this->model->first();

        return view('admin.settings.index', ['settings' => $settings]);
    }

    public function generalSetting($request)
    {
        try {
            $settings = $this->model->first();

            $checkboxes = [
                'isChatShow',
                'isCategorySuggestion',
                'isVoiceEnable',
                'isCameraEnable',
                'isImageGeneratorShow',
                'isTextCompletionShow',
                'isTheme',
                'isRTL',
                'isAddShow',
                'isRazorPayEnable',
                'isStripeEnable',
                'isPaypalEnable',
                'isInAppEnable',
                'isChatHistoryEnable',
                'isGuestLoginEnable',
                'isGoogleAdmobEnable',
            ];

            $generalSettings = $settings->general_settings ?? [];
            foreach ($checkboxes as $checkbox) {
                $generalSettings[$checkbox] = $request->has($checkbox);
            }

            $generalSettings = $this->updateLogoUrls($settings, $request, $generalSettings);
            $this->model->first()->update(['general_settings' => json_decode(json_encode($generalSettings))]);

            return redirect()->back()->with('message', __('static.response.general_settings_updated'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function updateLogoUrls($settings, $request, $generalSettings)
    {
        $logoFields = [];
        foreach ($request->all() as $fieldName => $fieldValue) {
            if (strpos($fieldName, '_logo') !== false && $request->file($fieldName)) {
                $urlField = $fieldName . '_url';
                $media = $settings->addMediaFromRequest($fieldName)->toMediaCollection($fieldName);
                $generalSettings[$urlField] = $media->getFullUrl();
                $logoFields[] = $fieldName;
            }
        }

        foreach ($logoFields as $fieldName) {
            unset($request[$fieldName]);
        }

        $generalSettings = array_merge($generalSettings, $request->except('_token', '_method'));

        return $generalSettings;
    }

    public function adsSetting($request)
    {
        try {
            $settings = $this->model->first();
            $settings->ads_Settings = $request->except(['_token', '_method']);
            $settings->save();

            return redirect()->back()->with('message', __('static.response.ads_settings_updated'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function emailSetting($request)
    {
        try {
            $settings = $this->model->first();
            $settings->email_settings = $request->except(['_token', '_method']);

            DotenvEditor::setKeys($settings->email_settings);
            DotenvEditor::save();

            $settings->save();

            return redirect()->route('admin.settings')->with('message', 'Email Settings Updated');
        } catch (\Exception $e) {
            DB::rollback();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function appUpdatePopup($request)
    {
        try {
            if (!$request->update_popup_show) {
                $request->merge(['update_popup_show' => false]);
            }
            $request = Arr::except($request->all(), ['_token', '_method']);
            $this->model->first()->update(['update_popup_settings' => json_decode(json_encode($request))]);

            return redirect()->back()->with('message', __('static.response.app_settings_updated'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
