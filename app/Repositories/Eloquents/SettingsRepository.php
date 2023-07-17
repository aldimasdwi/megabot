<?php

namespace App\Repositories\Eloquents;

use App\Exceptions\ExceptionHandler;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Arr;
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

        return [
            'settings' => $settings,
            'seccess' => true,
        ];
    }

    public function frontSettings()
    {
        try {

            $settingValues = $this->model->first();
            $settings['general_settings'] = Arr::only($settingValues['general_settings'], config('enums.front_settings.general_settings'));
            $settings['ads_Settings'] = Arr::only($settingValues['ads_Settings'], config('enums.front_settings.ads_settings'));

            return $settings;
        } catch (Exception $e) {
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}
