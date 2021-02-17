<?php

namespace base;

use base\libs\Redis;
use common\models\Brands;
use common\models\ContentInfos;
use common\models\ProductsInfo;
use common\models\SegmentInfos;
use common\models\Shops;
use common\models\User;

class Frontend
{
    /**
     * Get content to controller
     *
     * @param array $url_array
     * @param string $language
     * @param array $where
     * @return mixed
     */
    public static function contentToController($url_array, $language = null, $where_query = array())
    {
        $object = false;

        if (is_null($language)) {
            $language = get_current_lang();
        }

        // Redis
        $redis_object = Redis::getFrontendObject('content');

        if (!is_null($redis_object) && is_string($redis_object) && !empty($redis_object)) {
            return unserialize($redis_object);
        }

        if ($url_array) {
            $item = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $query = ContentInfos::find()
                    ->alias('info')
                    ->join('INNER JOIN', 'site_content content', 'content.id = info.content_id')
                    ->where(['info.slug' => $url_item, 'info.language' => $language]);

                if ($where_query && is_array($where_query)) {
                    $query->andWhere($where_query);
                }

                $item = $query->with('model')->one();

                if ($item) {
                    $draw_url[] = $item->slug;
                }
            }

            if ($draw_url && $item && $item->model->deleted != 1 && $item->model->status == 1) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $item;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->model = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->model->info = (object) $object->attributes;
            $item->model->content = (object) $object->model->attributes;

            $item->oldAttributes->info = (object) $object->oldAttributes;
            $item->oldAttributes->content = (object) $object->model->oldAttributes;

            // Set to redis
            $info = $item->model->info;

            Redis::setUrlObject('content', $info->info_id);
            Redis::setFrontendObject('content', $info->info_id, $item);

            return $item;
        }
    }

    /**
     * Get segment to controller
     *
     * @param array $url_array
     * @param string $language
     * @return mixed
     */
    public static function segmentToController($url_array, $language = null, $where_query = array())
    {
        $object = false;

        if (is_null($language)) {
            $language = get_current_lang();
        }

        // Redis
        $redis_object = Redis::getFrontendObject('segment');

        if (!is_null($redis_object) && is_string($redis_object) && !empty($redis_object)) {
            return unserialize($redis_object);
        }

        if ($url_array) {
            $item = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $query = SegmentInfos::find()
                    ->alias('info')
                    ->join('INNER JOIN', 'site_segments segment', 'segment.id = info.segment_id')
                    ->where(['info.slug' => $url_item, 'info.language' => $language]);

                if ($where_query && is_array($where_query)) {
                    $query->andWhere($where_query);
                }

                $item = $query->with('model')->one();

                if ($item) {
                    $draw_url[] = $item->slug;
                }
            }

            if ($draw_url && $item && $item->model->deleted != 1 && $item->model->status == 1) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $item;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->model = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->model->info = (object) $object->attributes;
            $item->model->segment = (object) $object->model->attributes;

            $item->oldAttributes->info = (object) $object->oldAttributes;
            $item->oldAttributes->segment = (object) $object->model->oldAttributes;

            // Set to redis
            $info = $item->model->info;

            Redis::setUrlObject('segment', $info->info_id);
            Redis::setFrontendObject('segment', $info->info_id, $item);

            return $item;
        }
    }

    /**
     * Get brand to controller
     *
     * @param array $url_array
     * @param string $language
     * @return mixed
     */
    public static function brandToController($url_array)
    {
        $object = false;

        // Redis
        $redis_object = Redis::getFrontendObject('brand');

        if (!is_null($redis_object) && is_string($redis_object) && !empty($redis_object)) {
            return unserialize($redis_object);
        }

        if ($url_array) {
            $model = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $model = Brands::find()
                    ->where(['slug' => $url_item, 'deleted' => 0, 'status' => 1])
                    ->one();

                if ($model) {
                    $draw_url[] = $model->slug;
                }
            }

            if ($draw_url) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $model;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->brand = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->brand = (object) $object->attributes;
            $item->oldAttributes = (object) $object->oldAttributes;

            // Set to redis
            $brand = $item->brand;

            Redis::setUrlObject('brand', $brand->id);
            Redis::setFrontendObject('brand', $brand->id, $item);

            return $item;
        }
    }

    /**
     * Get product to controller
     *
     * @param array $url_array
     * @param string $language
     * @return mixed
     */
    public static function productToController($url_array, $language = null)
    {
        $object = false;

        if (is_null($language)) {
            $language = get_current_lang();
        }

        // Redis
        $redis_object = Redis::getFrontendObject('product');

        if (!is_null($redis_object) && is_string($redis_object) && !empty($redis_object)) {
            return unserialize($redis_object);
        }

        if ($url_array) {
            $model = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $model = ProductsInfo::find()
                    ->alias('info')
                    ->join('INNER JOIN', 'products', 'products.id = info.product_id')
                    ->where(['info.slug' => $url_item, 'info.language' => $language, 'products.deleted' => 0, 'products.status' => 1])
                    ->with('model')
                    ->one();

                if ($model) {
                    $draw_url[] = $model->slug;
                }
            }

            if ($draw_url) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $model;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->model = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->model->info = (object) $object->attributes;
            $item->model->product = (object) $object->model->attributes;

            $item->oldAttributes->info = (object) $object->oldAttributes;
            $item->oldAttributes->product = (object) $object->model->oldAttributes;

            // Set to redis
            $info = $item->model->info;

            Redis::setUrlObject('product', $info->info_id);
            Redis::setFrontendObject('product', $info->info_id, $item);

            return $item;
        }
    }

    /**
     * Get shop to controller
     *
     * @param array $url_array
     * @param string $language
     * @return mixed
     */
    public static function shopToController($url_array, $language = null)
    {
        $object = false;

        if (is_null($language)) {
            $language = get_current_lang();
        }

        if ($url_array && $language) {
            $model = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $model = Shops::find()
                    ->where(['slug' => $url_item, 'deleted' => 0, 'status' => 1])
                    ->with('info')
                    ->one();

                if ($model) {
                    $draw_url[] = $model->slug;
                }
            }

            if ($draw_url) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $model;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->model = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->model->shop = (object) $object->attributes;
            $item->model->info = (object) $object->info->attributes;

            $item->oldAttributes->shop = (object) $object->oldAttributes;
            $item->oldAttributes->info = (object) $object->info->oldAttributes;

            return $item;
        }
    }

    /**
     * Get customer to controller
     *
     * @param array $url_array
     * @param string $language
     * @return mixed
     */
    public static function customerToController($url_array, $language = null)
    {
        $object = false;

        if (is_null($language)) {
            $language = get_current_lang();
        }

        if ($url_array && $language) {
            $model = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $id = $url_item;
                $_prefix = User::$url_prefix;
                $_prefix_len = strlen($_prefix);

                if ($_prefix_len > 0) {
                    $id = substr($url_item, $_prefix_len);
                }

                $model = User::find()
                    ->where(['id' => $id, 'status' => User::STATUS_ACTIVE])
                    ->with('profile')
                    ->one();

                if ($model) {
                    $draw_url[] = $_prefix . $model->id;
                }
            }

            if ($draw_url) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $model;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->model = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->model->customer = (object) $object->attributes;
            $item->model->profile = (object) $object->profile->attributes;

            $item->oldAttributes->customer = (object) $object->oldAttributes;
            $item->oldAttributes->profile = (object) $object->profile->oldAttributes;

            return $item;
        }
    }

    /**
     * Get seller to controller
     *
     * @param array $url_array
     * @param string $language
     * @return mixed
     */
    public static function sellerToController($url_array, $language = null)
    {
        $object = false;

        if (is_null($language)) {
            $language = get_current_lang();
        }

        if ($url_array && $language) {
            $model = false;
            $draw_url = array();

            foreach ($url_array as $url_item) {
                $id = $url_item;
                $_prefix = User::$url_prefix;
                $_prefix_len = strlen($_prefix);

                if ($_prefix_len > 0) {
                    $id = substr($url_item, $_prefix_len);
                }

                $model = User::find()
                    ->leftJoin('auth_assignment', 'auth_assignment.user_id = users.id')
                    ->where(['users.id' => $id, 'status' => User::STATUS_ACTIVE])
                    ->andWhere(['=', 'auth_assignment.item_name', 'seller'])
                    ->with('profile')
                    ->one();

                if ($model) {
                    $draw_url[] = $_prefix . $model->id;
                }
            }

            if ($draw_url) {
                $url_string = implode('/', $url_array);
                $_string = implode('/', $draw_url);

                if ($url_string == $_string) {
                    $object = $model;
                }
            }
        }

        if ($object) {
            $item = new \stdClass();
            $item->model = new \stdClass();
            $item->oldAttributes = new \stdClass();

            $item->model->customer = (object) $object->attributes;
            $item->model->profile = (object) $object->profile->attributes;

            $item->oldAttributes->customer = (object) $object->oldAttributes;
            $item->oldAttributes->profile = (object) $object->profile->oldAttributes;

            return $item;
        }
    }
}
