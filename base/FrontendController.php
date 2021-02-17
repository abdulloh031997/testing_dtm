<?php

namespace base;

use base\libs\Redis;
use common\models\Profile;
use Yii;
use yii\web\Controller;
use yii\web\Cookie;

/**
 * Frontend controller
 */
class FrontendController extends Controller
{
    public $data;
    public $theme_alias;
    public $theme_path;
    public $theme_path_name;
    public $themeClass;

    public $user;
    public $user_id;
    public $user_roles;
    public $user_profile;

    public $meta = array();
    public $body_class = array();

    /**
     * Init
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        // Init meta
        $this->meta = [
            'title' => '',
            'keywords' => '',
            'description' => '',
        ];

        // Init container
        $container = new Container();
        $container::$prefix = 'front';

        // Parse URL
        $this->parseURL();

        // Set user card hash
        $this->setUserCardHash();

        // Init theme
        $this->initTheme();

        // Init theme class
        if (method_exists($this->themeClass, 'init')) {
            $this->themeClass->init();
        }
    }

    /**
     * Before action
     *
     * @param $action
     * @return void
     */
    public function beforeAction($action)
    {
        $app = Yii::$app;
        $user = $app->user;

        if (!$user->isGuest) {
            $user_id = $user->getId();
            $roles = Redis::getUserRoles($user_id);
            $profile = Redis::getUserProfile($user_id);

            $this->user = $user->identity;
            $this->user_id = $user_id;
            $this->user_roles = $roles;
            $this->user_profile = $profile;

            Container::push('current_user', $user->identity);
            Container::push('current_user_id', $user_id);
            Container::push('current_user_profile', $profile);
            Container::push('current_user_roles', $roles);

            $this->body_class[] = 'logged-in';
        }

        return parent::beforeAction($action);
    }

    /**
     * Set card hash to user
     *
     * @return void
     */
    private function setUserCardHash()
    {
        $cookie_hash = false;
        $cookies = Yii::$app->request->cookies;
        $cookie_item = $cookies->getValue('card_hash');

        if ($cookie_item != null) {
            $cookie_hash = $cookie_item;
        }

        if (!$cookie_hash || empty($cookie_hash)) {
            $str = _random_string('alnum', 30);
            $str .= '-' . date('Y-m-d-H:i:s', strtotime('+1 year'));
            $str .= '-' . _random_string('alpha', 5);
            $str .= '-' . strtotime('now');
            $hash = md5($str) . '_' . rand(100000000, 999999999);

            $cookie = new Cookie([
                'name' => 'card_hash',
                'value' => $hash,
                'expire' => time() + (60 * 60 * 24 * 365),
            ]);

            Yii::$app->response->cookies->add($cookie);
        }
    }

    /**
     * Init theme
     *
     * @return void
     */
    private function initTheme()
    {
        // Check theme
        $store_theme = Yii::$app->params['default_theme'];
        $store_theme_setting = get_setting_value('store_theme');

        if ($store_theme_setting) {
            $store_theme = $store_theme_setting;
        }

        // Theme path
        $this->theme_path = THEMES_PATH . $store_theme . DS;
        $this->theme_alias = '@themes/' . $store_theme . '/';

        $theme_class_file = $this->theme_path . 'app/StoreTheme.php';

        if (is_file($theme_class_file)) {
            require_once $theme_class_file;
            $this->themeClass = new \StoreTheme();
        } else {
            $this->viewPath = '@frontend/views/system';

            echo $this->renderPartial('theme-error', array(
                'message' => 'Theme class not found!'
            ));

            exit();
        }

        if (is_dir($this->theme_path)) {
            Yii::$app->layoutPath = $this->theme_alias . 'layouts';
            Yii::$app->viewPath = $this->theme_alias . 'views';
        } else {
            $this->viewPath = '@frontend/views/system';

            echo $this->renderPartial('theme-error', array(
                'message' => 'Theme class not found!'
            ));

            exit();
        }
    }

    /**
     * Register JS file or files
     *
     * @param [type] $file
     * @return void
     */
    public function registerJs($file)
    {
        if ($file) {
            $this->themeClass->registerJs($file);
        }
    }

    /**
     * Register CSS file or files
     *
     * @param [type] $file
     * @return void
     */
    public function registerCss($file)
    {
        if ($file) {
            $this->themeClass->registerCss($file);
        }
    }

    /**
     * Parse URL to controller
     *
     * @return array
     */
    private function parseURL()
    {
        $parsed_url = '';
        $lang_code = '';
        $lang_array = array();
        $languages = get_languages();

        $url = Yii::$app->request->url;
        $url = trim($url, '/');
        $url_array = $url ? explode('/', $url) : array();

        if ($url_array) {
            $lang_code = $url_array[0];
            unset($url_array[0]);

            $parsed_url = array_values($url_array);
        } else {
            $setting = get_setting('store_language', false);
            $lang_code = $setting ? $setting['settings_value'] : '';
        }

        if ($languages) {
            foreach ($languages as $item) {
                if ($item['lang_code'] == $lang_code) {
                    $lang_array = $item;
                }
            }
        }

        Container::push('parsed_url', $parsed_url);
        Container::push('current_lang', $lang_array);
    }
}
