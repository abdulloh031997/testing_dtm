<?php
// Code debug
function debug($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

// Get array value
function array_value($array = false, $key = false, $default = false, $check_value = false)
{
    if (is_array($array) && isset($array[$key])) {
        $data = $array[$key];

        if ($data) {
            return $data;
        } else {
            return $check_value ? $default : $data;
        }
    }

    return $default;
}

// Get HOST
function get_host()
{
    $host = '';
    $possibleHostSources = array('HTTP_X_FORWARDED_HOST', 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR');
    $sourceTransformations = array(
        "HTTP_X_FORWARDED_HOST" => function ($value) {
            $elements = explode(',', $value);
            return trim(end($elements));
        }
    );

    foreach ($possibleHostSources as $source) {
        if (!empty($host)) {
            break;
        }
        if (empty($_SERVER[$source])) {
            continue;
        }
        $host = $_SERVER[$source];
        if (array_key_exists($source, $sourceTransformations)) {
            $host = $sourceTransformations[$source]($host);
        }
    }

    // Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);

    return trim($host);
}

// Delete files in dir
function delete_files_in_dir($dir)
{
    if (is_dir($dir)) {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file)) {
                delete_files_in_dir($file);
            } else {
                unlink($file);
            }
        }

        rmdir($dir);
    }
}
