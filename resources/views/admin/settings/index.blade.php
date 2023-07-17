@extends('admin.layouts.master')

@section('title', __('static.settings.settings'))

@section('content')
    <div class="card">
        <div class="d-flex align-items-start custom-tabs">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-tabContent" data-bs-toggle="pill" data-bs-target="#general_settings"
                    type="button" role="tab" aria-controls="App_Settings" aria-selected="true">
                    <i class="ri-settings-line"></i>
                    {{ __('static.settings.general_settings') }}</button>
                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#Ads_Setting"
                    type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="ri-broadcast-line"></i>
                    {{ __('static.settings.ads_settings') }}</button>
                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#Email_Setting"
                    type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <i class="ri-mail-settings-line"></i>{{ __('static.settings.email_settings') }}</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#App_Update_Popup"
                    type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <i class="ri-upload-cloud-line"></i>{{ __('static.settings.app_update_popup') }}</button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="general_settings" role="tabpanel" aria-labelledby="app_settings"
                    tabindex="0">
                    {!! Form::open([
                        'route' => 'admin.general.settings',
                        'method' => 'PUT',
                        'files' => true,
                        'enctype' => 'multipart/form-data',
                        'class' => 'needs-validation user-add',
                    ]) !!}
                    <div class="row nested-tab">
                        <div class="col-xxl-10 col-12">
                            <h5>{{ __('static.settings.general_settings') }}</h5>
                            <ul class="nav nav-tabs nested-nav" id="general" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="appearance-tab" data-bs-toggle="tab"
                                        data-bs-target="#appearance" type="button" role="tab"
                                        aria-controls="appearance"
                                        aria-selected="true">{{ __('static.settings.appearance') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="keys-tab" data-bs-toggle="tab" data-bs-target="#keys"
                                        type="button" role="tab" aria-controls="keys"
                                        aria-selected="false">{{ __('static.settings.api_keys') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social"
                                        type="button" role="tab" aria-controls="social"
                                        aria-selected="false">{{ __('static.settings.social') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aboutus-tab" data-bs-toggle="tab" data-bs-target="#aboutus"
                                        type="button" role="tab" aria-controls="aboutus"
                                        aria-selected="false">{{ __('static.settings.usage_terms') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="adstatus-tab" data-bs-toggle="tab"
                                        data-bs-target="#adstatus" type="button" role="tab" aria-controls="adstatus"
                                        aria-selected="false">{{ __('static.settings.status') }}</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="generalContent">
                                <div class="tab-pane fade show active" id="appearance" role="tabpanel"
                                    aria-labelledby="appearance-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Home_Logo',
                                                __('static.settings.home_logo') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::file('home_logo', [
                                                    'class' => 'form-control',
                                                    'files' => true,
                                                    'multiple' => false,
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'splash_logo',
                                                __('static.settings.splash_logo') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::file('splash_logo', [
                                                    'class' => 'form-control',
                                                    'files' => true,
                                                    'multiple' => false,
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'drawer_logo',
                                                __('static.settings.drawer_logo') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::file('drawer_logo', [
                                                    'class' => 'form-control',
                                                    'files' => true,
                                                    'multiple' => false,
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'site_name',
                                                __('static.settings.site_name') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'site_name',
                                                    isset($settings->general_settings['site_name']) ? $settings->general_settings['site_name'] : old('site_name'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('site_name')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'email',
                                                __('static.settings.email') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::email(
                                                    'email',
                                                    isset($settings->general_settings['email']) ? $settings->general_settings['email'] : old('email'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('email')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Phone Number',
                                                __('static.settings.phone_number') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'phone_number',
                                                    isset($settings->general_settings['phone_number'])
                                                        ? $settings->general_settings['phone_number']
                                                        : old('phone_number'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('phone_number')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'description',
                                                __('static.settings.description') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::textarea(
                                                    'description',
                                                    isset($settings->general_settings['description']) ? $settings->general_settings['description'] : old('description'),
                                                    ['class' => 'form-control', 'style' => 'height: 77px'],
                                                ) !!}
                                                @error('description')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'refundLink',
                                                __('static.settings.refundLink') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'refundLink',
                                                    isset($settings->general_settings['refundLink']) ? $settings->general_settings['refundLink'] : old('refundLink'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('refundLink')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'rewardPoint',
                                                __('static.settings.rewardPoint') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::number(
                                                    'rewardPoint',
                                                    isset($settings->general_settings['rewardPoint']) ? $settings->general_settings['rewardPoint'] : old('rewardPoint'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('rewardPoint')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="keys" role="tabpanel" aria-labelledby="keys-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'chatgpt_api_key',
                                                __('static.settings.chatgpt_api_key') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'chatgpt_api_key',
                                                    isset($settings->general_settings['chatgpt_api_key'])
                                                        ? $settings->general_settings['chatgpt_api_key']
                                                        : old('chatgpt_api_key'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'free_chat_limit',
                                                __('static.settings.free_chat_limit') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::number(
                                                    'free_chat_limit',
                                                    isset($settings->general_settings['free_chat_limit'])
                                                        ? $settings->general_settings['free_chat_limit']
                                                        : old('free_chat_limit'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'facebook_url',
                                                __('static.settings.facebook') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'facebook_url',
                                                    isset($settings->general_settings['facebook_url'])
                                                        ? $settings->general_settings['facebook_url']
                                                        : old('facebook_url'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('facebook_url')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'twitter_url',
                                                __('static.settings.twitter') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'twitter_url',
                                                    isset($settings->general_settings['twitter_url']) ? $settings->general_settings['twitter_url'] : old('twitter_url'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('twitter_url')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'instagram',
                                                __('static.settings.instagram') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'instagram',
                                                    isset($settings->general_settings['instagram']) ? $settings->general_settings['instagram'] : old('instagram'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('instagram')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'linkedin',
                                                __('static.settings.linkedin') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'linkedin',
                                                    isset($settings->general_settings['linkedin']) ? $settings->general_settings['linkedin'] : old('linkedin'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('linkedin')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'youtube',
                                                __('static.settings.youtube') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'youtube',
                                                    isset($settings->general_settings['youtube']) ? $settings->general_settings['youtube'] : old('youtube'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('youtube')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="aboutus" role="tabpanel" aria-labelledby="aboutus-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'About Us',
                                                __('static.settings.about_us') . '<span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::textarea(
                                                    'about_us',
                                                    isset($settings->general_settings['about_us']) ? $settings->general_settings['about_us'] : old('about_us'),
                                                    ['class' => 'form-control', 'style' => 'height: 77px'],
                                                ) !!}
                                                @error('about_us')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Privacy Policy',
                                                __('static.settings.privacy_policy') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::textarea(
                                                    'privacy_policy',
                                                    isset($settings->general_settings['privacy_policy'])
                                                        ? $settings->general_settings['privacy_policy']
                                                        : old('privacy_policy'),
                                                    ['class' => 'form-control', 'style' => 'height: 77px'],
                                                ) !!}
                                                @error('privacy_policy')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Terms & Condition',
                                                __('static.settings.terms&condition') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::textarea(
                                                    'terms&condition',
                                                    isset($settings->general_settings['terms&condition'])
                                                        ? $settings->general_settings['terms&condition']
                                                        : old('terms&condition'),
                                                    ['class' => 'form-control', 'style' => 'height: 77px'],
                                                ) !!}
                                                @error('terms&condition')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="adstatus" role="tabpanel"
                                    aria-labelledby="adstatus-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isChatShow',
                                                        __('static.settings.is_chat_show') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isChatShow"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isChatShow'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isCategorySuggestion',
                                                        __('static.settings.is_category_suggestion') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isCategorySuggestion"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isCategorySuggestion'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isVoiceEnable',
                                                        __('static.settings.is_voice_enable') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isVoiceEnable"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isVoiceEnable'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isCameraEnable',
                                                        __('static.settings.is_camera_enable') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isCameraEnable"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isCameraEnable'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isImageGeneratorShow',
                                                        __('static.settings.is_image_generator_show') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isImageGeneratorShow"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isImageGeneratorShow'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isTextCompletionShow',
                                                        __('static.settings.is_text_completion_show') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isTextCompletionShow"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isTextCompletionShow'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label('isRTL', __('static.settings.is_rtl') . ' <span>*</span>', ['class' => 'col-9'], false) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isRTL"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isRTL'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group row">
                                                    {!! Form::label('isAddShow', __('static.settings.is_add_show') . ' <span>*</span>', ['class' => 'col-9'], false) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isAddShow"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isAddShow'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isChatHistoryEnable',
                                                        __('static.settings.is_chathistory_enable') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isChatHistoryEnable"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isChatHistoryEnable'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isGuestLoginEnable',
                                                        __('static.settings.is_guest_login_enable') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isGuestLoginEnable"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isGuestLoginEnable'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {!! Form::label(
                                                        'isGoogleAdmobEnable',
                                                        __('static.settings.is_google_admob_enable') . ' <span>*</span>',
                                                        ['class' => 'col-9'],
                                                        false,
                                                    ) !!}
                                                    <div class="col-3">
                                                        <div
                                                            class="form-check form-switch justify-content-md-start justify-content-end">
                                                            <input class="form-check-input" name="isGoogleAdmobEnable"
                                                                type="checkbox" value="true"
                                                                id="status1"@if ($settings->general_settings['isGoogleAdmobEnable'] == true) checked @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-10 col-12 text-end">
                            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- ----------------------------------------- Ads_Setting ---------------------------------------------------------------------- --}}
                <div class="tab-pane fade" id="Ads_Setting" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">
                    {!! Form::open([
                        'route' => 'admin.ads.settings',
                        'method' => 'PUT',
                        'class' => 'needs-validation user-add',
                    ]) !!}
                    <div class="row nested-tab">
                        <div class="col-xxl-10 col-12">
                            <h5>{{ __('static.settings.ads_setting') }}</h5>
                            <ul class="nav nav-tabs nested-nav" id="adsetting" role="tablist">
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link active" id="admobile-tab" data-bs-toggle="tab"
                                        data-bs-target="#admobile" type="button" role="tab"
                                        aria-controls="admobile"
                                        aria-selected="true">{{ __('static.settings.admobile_settings') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="openapp-tab" data-bs-toggle="tab"
                                        data-bs-target="#openapp" type="button" role="tab" aria-controls="openapp"
                                        aria-selected="false">{{ __('static.settings.open_app_ads') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="native-tab" data-bs-toggle="tab"
                                        data-bs-target="#native" type="button" role="tab" aria-controls="native"
                                        aria-selected="false">{{ __('static.settings.native_ad') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="adbanner-tab" data-bs-toggle="tab"
                                        data-bs-target="#adbanner" type="button" role="tab"
                                        aria-controls="adbanner"
                                        aria-selected="false">{{ __('static.settings.ad_banner') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="adreward-tab" data-bs-toggle="tab"
                                        data-bs-target="#adreward" type="button" role="tab"
                                        aria-controls="adbanner"
                                        aria-selected="false">{{ __('static.settings.ad_reward') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="adinterstitial-tab" data-bs-toggle="tab"
                                        data-bs-target="#adinterstitial" type="button" role="tab"
                                        aria-controls="adinterstitial"
                                        aria-selected="false">{{ __('static.settings.ad_interstitial') }}</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="adsettingContent">
                                <div class="tab-pane fade show active" id="admobile" role="tabpanel"
                                    aria-labelledby="admobile-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Ad Publish Id',
                                                __('static.settings.ad_publish_id') . '<span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'admobile_publisher_id',
                                                    isset($settings->ads_Settings['admobile_publisher_id'])
                                                        ? $settings->ads_Settings['admobile_publisher_id']
                                                        : old('admobile_publisher_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('admobile_publisher_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'ad_app_id',
                                                __('static.settings.ad_app_id') . '<span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'admobile_app_id',
                                                    isset($settings->ads_Settings['admobile_app_id'])
                                                        ? $settings->ads_Settings['admobile_app_id']
                                                        : old('admobile_app_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('admobile_app_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="openapp" role="tabpanel" aria-labelledby="openapp-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'open_ads_id',
                                                __('static.settings.open_ads_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'open_ads_id',
                                                    isset($settings->ads_Settings['open_ads_id']) ? $settings->ads_Settings['open_ads_id'] : old('open_ads_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('open_ads_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'RateApp Android Id',
                                                __('static.settings.rateapp_android_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'rateapp_android_id',
                                                    isset($settings->ads_Settings['rateapp_android_id'])
                                                        ? $settings->ads_Settings['rateapp_android_id']
                                                        : old('rateapp_android_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('rateapp_android_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'RateApp IOS Id',
                                                __('static.settings.rateapp_ios_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'rateapp_ios_id',
                                                    isset($settings->ads_Settings['rateapp_ios_id'])
                                                        ? $settings->ads_Settings['rateapp_ios_id']
                                                        : old('rateapp_ios_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('rateapp_ios_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="native" role="tabpanel" aria-labelledby="native-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'native_id',
                                                __('static.settings.native_id') . '<span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'native_id',
                                                    isset($settings->ads_Settings['native_id']) ? $settings->ads_Settings['native_id'] : old('native_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('native_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="adbanner" role="tabpanel"
                                    aria-labelledby="adbanner-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'ad_banner_android_id',
                                                __('static.settings.ad_banner_android_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'ad_banner_android_id',
                                                    isset($settings->ads_Settings['ad_banner_android_id'])
                                                        ? $settings->ads_Settings['ad_banner_android_id']
                                                        : old('ad_banner_android_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('ad_banner_android_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Add Banner IOS Id',
                                                __('static.settings.ad_banner_ios_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'ad_banner_ios_id',
                                                    isset($settings->ads_Settings['ad_banner_ios_id'])
                                                        ? $settings->ads_Settings['ad_banner_ios_id']
                                                        : old('reward_ios_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="adreward" role="tabpanel"
                                    aria-labelledby="adreward-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'ad_reward_android_id',
                                                __('static.settings.ad_reward_android_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'ad_reward_android_id',
                                                    isset($settings->ads_Settings['ad_reward_android_id'])
                                                        ? $settings->ads_Settings['ad_reward_android_id']
                                                        : old('ad_reward_android_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('ad_reward_android_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Add Reward IOS Id',
                                                __('static.settings.ad_reward_ios_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'ad_reward_ios_id',
                                                    isset($settings->ads_Settings['ad_reward_ios_id'])
                                                        ? $settings->ads_Settings['ad_reward_ios_id']
                                                        : old('ad_reward_ios_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="adinterstitial" role="tabpanel"
                                    aria-labelledby="adinterstitial-tab">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Add Interstitial Android Id',
                                                __('static.settings.add_interstitial_android_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'add_interstitial_android_id',
                                                    isset($settings->ads_Settings['add_interstitial_android_id'])
                                                        ? $settings->ads_Settings['add_interstitial_android_id']
                                                        : old('add_interstitial_android_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                                @error('add_interstitial_android_id')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {!! Form::label(
                                                'Add Interstitial Ios Id',
                                                __('static.settings.add_interstitial_ios_id') . ' <span>*</span>',
                                                ['class' => 'col-xl-3 col-md-4'],
                                                false,
                                            ) !!}
                                            <div class="col-xl-9 col-md-8">
                                                {!! Form::text(
                                                    'add_interstitial_ios_id',
                                                    isset($settings->ads_Settings['add_interstitial_ios_id'])
                                                        ? $settings->ads_Settings['add_interstitial_ios_id']
                                                        : old('add_interstitial_ios_id'),
                                                    ['class' => 'form-control'],
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-10 col-12 text-end">
                            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                {{-- -------------------------------------------------------------- Mail Settings ------------------------------------------- --}}
                <div class="tab-pane fade" id="Email_Setting" role="tabpanel" aria-labelledby="v-pills-settings-tab"
                    tabindex="0">
                    {!! Form::open(['route' => 'admin.email.settings', 'method' => 'PUT', 'class' => 'needs-validation user-add']) !!}
                    <div class="col-xxl-10 col-12">
                        <h5>{{ __('static.settings.email_settings') }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    {!! Form::label('MAIL_MAILER', __('static.settings.mailer'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'mail_mailer',
                                            isset($settings->email_settings['mail_mailer']) ? $settings->email_settings['mail_mailer'] : old('mail_mailer'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('MAIL_HOST', __('static.settings.mail_host'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'mail_host',
                                            isset($settings->email_settings['mail_host']) ? $settings->email_settings['mail_host'] : old('mail_host'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('MAIL_PORT', __('static.settings.mail_port'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'mail_port',
                                            isset($settings->email_settings['mail_port']) ? $settings->email_settings['mail_port'] : old('mail_port'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('MAIL_USERNAME', __('static.settings.mail_username'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'mail_username',
                                            isset($settings->email_settings['mail_username'])
                                                ? $settings->email_settings['mail_username']
                                                : old('mail_username'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('MAIL_PASSWORD', __('static.settings.mail_password'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::password('mail_password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {!! Form::label('MAIL_ENCRYPTION', __('static.settings.mail_encryption'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        <select name="mail_encryption" id="MAIL_ENCRYPTION" class="form-control">
                                            <option data-countryCode="TLS"
                                                value="TLS"@if ($settings->email_settings['mail_encryption'] == 'TLS') selected @endif>TLS
                                            </option>
                                            <option data-countryCode="SSL"
                                                value="SSL"@if ($settings->email_settings['mail_encryption'] == 'SSL') selected @endif>SSL
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('MAIL_FROM_ADDRESS', __('static.settings.mail_from_address'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'mail_from_address',
                                            isset($settings->email_settings['mail_from_address'])
                                                ? $settings->email_settings['mail_from_address']
                                                : old('mail_from_address'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('MAIL_FROM_NAME', __('static.settings.mail_from_name'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'mail_from_name',
                                            isset($settings->email_settings['mail_from_name'])
                                                ? $settings->email_settings['mail_from_name']
                                                : old('mail_from_name'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-end">
                                        {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="tab-pane fade" id="App_Update_Popup" role="tabpanel" aria-labelledby="v-pills-settings-tab"
                    tabindex="0">
                    {!! Form::open([
                        'route' => 'admin.appupdatepopup.settings',
                        'method' => 'PUT',
                        'files' => true,
                        'enctype' => 'multipart/form-data',
                        'class' => 'needs-validation user-add',
                    ]) !!}
                    <div class="col-xxl-10 col-12">
                        <h5>{{ __('static.settings.app_update_popup') }}</h5>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    {!! Form::label('update_popup_show', __('static.settings.app_update_popup_show/hide'), [
                                        'class' => 'col-xl-3 col-md-4 col-9',
                                    ]) !!}
                                    <div class="col-xl-7 col-md-6 col-3">
                                        <div class="form-check form-switch justify-content-md-start justify-content-end">
                                            <input class="form-check-input" name="update_popup_show" type="checkbox"
                                                value="true"
                                                id="status"@if ($settings->update_popup_settings['update_popup_show'] == true) checked @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('new_app_version_code', __('static.settings.new_app_version_code'), [
                                        'class' => 'col-xl-3 col-md-4',
                                    ]) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'new_app_version_code',
                                            isset($settings->update_popup_settings['new_app_version_code'])
                                                ? $settings->update_popup_settings['new_app_version_code']
                                                : old('new_app_version_code'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('description', __('static.settings.description'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::textarea(
                                            'description',
                                            isset($settings->update_popup_settings['description'])
                                                ? $settings->update_popup_settings['description']
                                                : old('description'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('app_link', __('static.settings.app_link'), ['class' => 'col-xl-3 col-md-4']) !!}
                                    <div class="col-xl-9 col-md-8">
                                        {!! Form::text(
                                            'app_link',
                                            isset($settings->update_popup_settings['app_link'])
                                                ? $settings->update_popup_settings['app_link']
                                                : old('app_link'),
                                            ['class' => 'form-control'],
                                        ) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-end">
                                        {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{-- vectormap script --}}
    <script src="{{ asset('admin/js/vectormap.min.js') }}"></script>
    <script src="{{ asset('admin/js/vectormap.js') }}"></script>
    <script src="{{ asset('admin/js/vectormapcustom.js') }}"></script>
@endpush
