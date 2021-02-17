<?php

namespace base\libs;

use common\models\Profile;
use Yii;

class Redis extends RedisApp
{
    public static $key_user_roles = 'user-roles';
    public static $key_user_profile = 'user-profile';

    public static function getUrlObjectKey()
    {
        $output = false;
        $url = Yii::$app->request->url;

        if ($url) {
            $redis_key = preg_replace("/\s+/", "", $url);
            $redis_key = trim($redis_key, '/');
            $redis_key = str_replace("/", "-", $redis_key);

            $output = $redis_key;
        }

        return $output;
    }

    public static function getUrlObjectsListKey($type)
    {
        $output = false;

        if ($type) {
            $output = $type . '-items-url-list';
        }

        return $output;
    }

    public static function getFrontendObjectKey($id, $type)
    {
        $output = false;

        if (is_numeric($id) && $type) {
            $output = $type . '-frontend-item-id-' . $id;
        }

        return $output;
    }

    public static function getFrontendObject($type)
    {
        $output = false;
        $list_key = Redis::getUrlObjectsListKey($type);

        if ($list_key) {
            $list_object = Redis::get($list_key);

            if ($list_object && !is_null($list_object)) {
                $unserialized = unserialize($list_object);

                if ($unserialized) {
                    $key = self::getUrlObjectKey();

                    if (isset($unserialized[$key]) && $unserialized[$key]) {
                        $redis_object_key = $unserialized[$key];
                        $output = self::get($redis_object_key);
                    }
                }
            }
        }

        return $output;
    }

    public static function setUrlObject($type, $id)
    {
        $url = Yii::$app->request->url;
        $list_key = Redis::getUrlObjectsListKey($type);

        if ($list_key && $url) {
            $redis_key = self::getFrontendObjectKey($id, $type);

            if ($redis_key) {
                $key = self::getUrlObjectKey();
                $redis_object = Redis::get($list_key);
                $redis_item[$key] = $redis_key;

                if ($redis_object && !is_null($redis_object)) {
                    $unserialized = unserialize($redis_object);
                    $redis_item = array_merge($unserialized, $redis_item);
                }

                self::set($list_key, serialize($redis_item));
            }
        }
    }

    public static function setFrontendObject($type, $id, $data)
    {
        $redis_key = self::getFrontendObjectKey($id, $type);

        if ($redis_key) {
            self::set($redis_key, serialize($data));
        }
    }

    public static function getUserProfile($user_id)
    {
        $output = false;

        if (is_numeric($user_id) && $user_id > 0) {
            // Check redis
            $is_active = self::is_active();
            $key = self::$key_user_profile . '-' . $user_id;

            if ($is_active) {
                $redis_object = self::get($key);

                if (!is_null($redis_object) && is_string($redis_object) && !empty($redis_object)) {
                    return unserialize($redis_object);
                }
            }

            $output = Profile::find()->where(['user_id' => $user_id])->one();

            // Set to redis
            Redis::set($key, serialize($output));
        }

        return $output;
    }

    public static function getUserRoles($user_id)
    {
        $output = false;

        if (is_numeric($user_id) && $user_id > 0) {
            // Check redis
            $is_active = self::is_active();
            $key = self::$key_user_roles . '-' . $user_id;

            if ($is_active) {
                $redis_object = self::get($key);

                if (!is_null($redis_object) && is_string($redis_object) && !empty($redis_object)) {
                    return unserialize($redis_object);
                }
            }

            $output = Yii::$app->authManager->getRolesByUser($user_id);

            // Set to redis
            Redis::set($key, serialize($output));
        }

        return $output;
    }
}
