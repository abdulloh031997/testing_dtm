<?php
// Assets URL
function assets_url($url = false)
{
    $assets_url = Yii::$app->params['assets_url'];

    if ($url) {
        return $assets_url . $url;
    }

    return $assets_url;
}

// Admin URL
function admin_url($url = false)
{
    $admin_url = Yii::$app->params['admin_url'];

    if ($url) {
        return $admin_url . $url;
    }

    return $admin_url;
}

// Images URL
function images_url($url = false)
{
    $images_url = assets_url('images/');

    if ($url) {
        return $images_url . $url;
    }

    return $images_url;
}

// Seller URL
function seller_url($url = false)
{
    $seller_url = Yii::$app->params['seller_url'];

    if ($url) {
        return $seller_url . $url;
    }

    return $seller_url;
}

// Store URL
function store_url($url = false)
{
    $store_url = Yii::$app->params['store_url'];

    if ($url) {
        return $store_url . $url;
    }

    return $store_url;
}

// Uploads URL
function uploads_url($url = false)
{
    $uploads_url = assets_url('uploads/');

    if ($url) {
        return $uploads_url . $url;
    }

    return $uploads_url;
}

// Get current URL
function get_current_url()
{
    return ltrim(Yii::$app->request->url, '/');
}

// Get previous url
function get_previous_url($default = false)
{
    $request = Yii::$app->request;

    if ($request->referrer) {
        return $request->referrer;
    } elseif ($default) {
        return $default;
    }

    return admin_url();
}

// Set query params to url
function set_query_var($var, $value, $url = null)
{
    if ($var && $value) {
        $params = array($var => $value);

        if ($url) {
            $currentParams = \Yii::$app->getRequest()->getQueryParams();
            $currentParams[0] = '/' . trim($url, '/');
            $route = array_replace_recursive($currentParams, $params);
            $output = yii\helpers\Url::toRoute($route);
        } else {
            $output = yii\helpers\Url::current($params, true);
        }

        return $output;
    }
}

// Get brand url
function get_brand_url($id, $language = '')
{
    $object = array();
    $store_url = store_url();

    if (is_numeric($id) && $id > 0) {
        $object = \common\models\Brands::find()
            ->where(['id' => $id])
            ->one();

        if ($object) {
            $store_url = store_url($language . '/brand/' . $object->slug);
        }
    }

    return $store_url;
}

// Get category url
function get_category_url($id, $language = '')
{
    return get_segment_url($id, $language);
}

// Get content url
function get_content_url($id, $language = '', $prefix = '')
{
    $i = 0;
    $array = array();
    $content_type = false;
    $store_url = store_url();

    if (is_numeric($id) && $id > 0) {
        $parent_id = $id;

        do {
            $i++;

            $content = \common\models\Content::find()
                ->alias('content')
                ->select('content.*, info.slug as _slug')
                ->join('INNER JOIN', 'site_content_info info', 'info.content_id = content.id')
                ->where(['content.id' => $parent_id, 'info.language' => $language])
                ->one();

            if ($content) {
                $array[] = $content->_slug;
                $parent_id = $content->parent_id;

                if (!$content_type) {
                    $content_type = $content->type;
                }
            }
        } while ($content && $parent_id > 0 && $i < 10000);
    }

    if ($array) {
        krsort($array);
        $string = implode('/', $array);
        $url = store_url($language . '/');

        if ($prefix) {
            $prefix = trim($prefix, '/');
            $store_url = $url . $prefix . '/' . $string;
        } elseif ($content_type && $content_type != 'page') {
            $store_url = $url . $content_type . '/' . $string;
        } else {
            $store_url = $url . $string;
        }
    }

    return $store_url;
}

// Get customer url
function get_customer_url($id, $language = 'en', $prefix = 'customer')
{
    $object = array();
    $store_url = store_url();

    if (is_numeric($id) && $id > 0) {
        $url_prefix = \common\models\User::$url_prefix;
        $object = \common\models\User::find()
            ->where(['id' => $id])
            ->one();

        if ($object) {
            $prefix = trim($prefix, '/');
            $store_url = store_url($language . '/' . $prefix . '/' . $url_prefix .  $object->id);
        }
    }

    return $store_url;
}

// Get product url
function get_product_url($id, $language = '')
{
    $prefix = 'p/';
    $object = array();
    $store_url = store_url();

    if (is_numeric($id) && $id > 0) {
        $object = \common\models\Products::find()
            ->select('products.*, info.slug as _slug')
            ->join('INNER JOIN', 'products_info info', 'info.product_id = products.id')
            ->where(['products.id' => $id, 'info.language' => $language])
            ->one();

        if ($object) {
            $url = store_url($language . '/');
            $store_url = $url . $prefix . $object->_slug;
        }
    }

    return $store_url;
}

// Get post url
function get_post_url($id, $language = '')
{
    return get_content_url($id, $language);
}

// Get segment url
function get_segment_url($id, $language = '', $prefix = '')
{
    $i = 0;
    $array = array();
    $segment_type = false;
    $store_url = store_url();

    if (is_numeric($id) && $id > 0) {
        $parent_id = $id;

        do {
            $i++;

            $segment = \common\models\Segment::find()
                ->alias('segment')
                ->select('segment.*, info.slug as _slug')
                ->join('INNER JOIN', 'site_segments_info info', 'info.segment_id = segment.id')
                ->where(['segment.id' => $parent_id, 'info.language' => $language])
                ->one();

            if ($segment) {
                $array[] = $segment->_slug;
                $parent_id = $segment->parent_id;

                if (!$segment_type) {
                    $segment_type = $segment->type;
                }
            }
        } while ($segment && $parent_id > 0 && $i < 10000);
    }

    if ($segment_type) {
        switch ($segment_type) {
            case 'product_category':
                $segment_type = 'c';
                break;
            case 'post_category':
                $segment_type = 'category';
                break;
            case 'post_tag':
                $segment_type = 'tag';
                break;
        }
    }

    if ($array) {
        krsort($array);
        $string = implode('/', $array);
        $url = store_url($language . '/');

        if ($prefix) {
            $prefix = trim($prefix, '/');
            $store_url = $url . $prefix . '/' . $string;
        } elseif ($segment_type) {
            $store_url = $url . $segment_type . '/' . $string;
        } else {
            $store_url = $url . 'segment/' . $string;
        }
    }

    return $store_url;
}

// Get seller url
function get_seller_url($id, $language = 'en')
{
    return get_customer_url($id, $language, 'seller');
}

// Get shop url
function get_shop_url($id, $language = 'en')
{
    $object = array();
    $store_url = store_url();

    if (is_numeric($id) && $id > 0) {
        $object = \common\models\Shops::find()
            ->where(['id' => $id])
            ->one();

        if ($object) {
            $store_url = store_url($language . '/shop/' . $object->slug);
        }
    }

    return $store_url;
}
