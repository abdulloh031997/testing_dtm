<?php
// Check cli mode
function is_cli()
{
    if (php_sapi_name() == "cli") {
        return true;
    }

    return false;
}

// Check url
function is_url($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    return true;
}

// Check email address
function is_email($string)
{
    if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    return false;
}

// Translation text
function __($message, $params = array())
{
    return Yii::t('app', $message, $params, Yii::$app->language);
}

// Get setting
function get_setting($key, $language = null)
{
    $output = false;

    if (is_null($language) || !$language) {
        $lang = get_current_lang();
    } else {
        $lang = clean_str($language);
    }

    $temp = new \base\libs\Temp();
    $temp_file = $temp->getArray('system', 'settings');

    if ($temp_file) {
        foreach ($temp_file as $temp_value) {
            if ($temp_value['settings_key'] == $key) {
                $output = $temp_value;
                break;
            }
        }
    }

    if ($lang) {
        $temp_file = $temp->getArray('system', 'settings_translations');

        if (isset($temp_file[$lang]) && $temp_file[$lang]) {
            foreach ($temp_file[$lang] as $temp_value) {
                if ($temp_value['settings_key'] == $key) {
                    $output['settings_value'] = $temp_value['settings_value'];
                    break;
                }
            }
        }
    }

    if (!$output) {
        $where = ['settings_key' => $key];
        $output = \backend\models\System::getSetting($where, $lang);
    }

    return $output;
}

// Get setting value
function get_setting_value($key, $default = false, $language = null)
{
    $output = false;
    $setting = get_setting($key, $language);

    if ($setting) {
        $output = $setting['settings_value'];
    }

    return $output ? $output : $default;
}

// Select array with empty label
function select_array_with_empty_label($array, $label = '-', $key = '')
{
    $default = array($key => $label);

    if (is_array($array) && $array) {
        return array_merge($default, $array);
    }

    return $default;
}

// Init content settings
function init_content_settings($model)
{
    $output = $model;

    if ($model) {
        $settings = json_decode($model->settings, true);

        if ($settings) {
            foreach ($settings as $key => $value) {
                $output->$key = $value;
            }
        }
    }

    return $output;
}

// Init content meta
function init_content_meta($info)
{
    $output = $info;

    if ($info) {
        $settings = json_decode($info->meta, true);

        if ($settings) {
            foreach ($settings as $key => $value) {
                $output->$key = $value;
            }
        }
    }

    return $output;
}

// Get product image
function get_product_image($info)
{
    $output = images_url('default-image.png');

    if ($info && $info->image) {
        $output = $info->image;
    }

    return $output;
}

// Count content childs
function count_content_childs($model, $field_key)
{
    $count = \common\models\ContentFields::find()
        ->where(['content_id' => $model->id, 'field_key' => $field_key])
        ->one();

    if ($count && is_numeric($count->field_value)) {
        return $count->field_value;
    }

    return '0';
}

// Count segment childs
function count_segment_childs($model, $field_key)
{
    $count = \common\models\SegmentFields::find()
        ->where(['segment_id' => $model->id, 'field_key' => $field_key])
        ->one();

    if ($count && is_numeric($count->field_value)) {
        return $count->field_value;
    }

    return '0';
}
