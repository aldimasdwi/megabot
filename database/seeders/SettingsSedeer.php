<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUrl = env('APP_URL');

        $general_settings = [
            'isRTL' => 'true',
            'isAddShow' => 'true',
            'isChatShow' => 'true',
            'isVoiceEnable' => 'true',
            'isCameraEnable' => 'true',
            'isGuestLoginEnable' => 'true',
            'email' => 'megabot@gmail.com',
            'isGoogleAdmobEnable' => 'true',
            'isChatHistoryEnable' => 'true',
            'isImageGeneratorShow' => 'true',
            'isCategorySuggestion' => 'true',
            'isTextCompletionShow' => 'true',
            'youtube' => 'Youtube',
            'about_us' => 'About Us',
            'linkedin' => 'Linkedin',
            'instagram' => 'Instagram',
            'site_name' => 'Megabot',
            'description' => 'Description',
            'twitter_url' => 'Twitter',
            'facebook_url' => 'Facebook',
            'phone_number' => 'Phone Number',
            'home_logo_url' => $baseUrl . '/admin/homeLogo.png',
            'privacy_policy' => 'Privacy Policy',
            'chatgpt_api_key' => 'Your Chatgpt API key',
            'drawer_logo_url' => $baseUrl . '/admin/drawerLogo.png',
            'free_chat_limit' => '5',
            'splash_logo_url' => $baseUrl . '/admin/splashLogo.png',
            'terms&condition' => 'Terms & Condition',
            'refundLink' => 'Your refund link',
            'rewardPoint' => 'reward Point'
        ];

        $ads_Settings = [
            'admobile_publisher_id' => 'Your Admobile Publisher ID',
            'admobile_app_id' => 'Your Admobile App ID',
            'open_ads_id' => 'Your Openads ID',
            'rateapp_android_id' => 'Your Rate App Android Id',
            'rateapp_ios_id' => 'Your Rate App iOS Id',
            'native_id' => 'Your Native ID',
            'ad_banner_android_id' => 'Your Ad Banner Android ID',
            'ad_banner_ios_id' => 'Your Ad Banner iOS ID',
            'ad_reward_android_id' => 'Your Ad Reward Android ID',
            'ad_reward_ios_id' => 'Your Ad Reward iOS ID',
            'add_interstitial_android_id' => 'Your Ad Interstitial Android ID',
            'add_interstitial_ios_id' => 'Your Ad Interstitial iOS ID',
        ];

        $email_settings = [
            'mail_mailer' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_username' => 'smtp.gmail.com',
            'mail_password' => 'enter your email app password',
            'mail_encryption' => 'TLS',
            'mail_from_address' => 'smtp.gmail.com',
            'mail_from_name' => 'megabot',
        ];

        $update_popup_settings = [
            'app_link' => '',
            'description' => '',
            'update_popup_show' => '',
            'new_app_version_code' => 'MEGABOT',
        ];

        Setting::updateOrCreate([
            'general_settings' => $general_settings,
            'ads_Settings' => $ads_Settings,
            'email_settings' => $email_settings,
            'update_popup_settings' => $update_popup_settings,
        ]);
    }
}
