<?php

namespace base\libs;

/**
 * Temp class
 */
class Temp
{
    private $active;

    /**
     * Contstructor
     */
    public function __construct()
    {
        $path = TEMP_PATH;
        $this->active = \Yii::$app->params['local_cache'];

        if (!is_dir($path)) {
            mkdir($path);
        }
    }

    /**
     * Get array from file
     *
     * @param string $folder
     * @param string $filename
     * @return array
     */
    public function getArray($folder, $filename)
    {
        $array = array();

        if ($this->active) {
            $path = $this->dir($folder);
            $filename = str_replace('.php', '', $filename);
            $file = $path . $filename . '.php';

            if (is_file($file)) {
                $array = include $file;
            }
        }

        return $array;
    }

    /**
     * Create temp for type
     *
     * @param string $type
     * @return void
     */
    public function createFor($type)
    {
        if (!$this->active) {
            return;
        }

        if ($type == 'languages') {
            $this->setLanguages();
        } elseif ($type == 'settings') {
            $this->setSettings();
        }
    }

    /**
     * Set languages
     *
     * @return void
     */
    public function setLanguages()
    {
        if (!$this->active) {
            return;
        }

        $path = $this->dir('system');
        $file = $path . 'languages.php';

        $results = \common\models\Languages::find()
            ->where(['status' => 1])
            ->asArray()
            ->all();

        if ($results) {
            $this->writeArray($file, $results);
        }
    }

    /**
     * Set settings
     *
     * @return void
     */
    public function setSettings()
    {
        if (!$this->active) {
            return;
        }

        $path = $this->dir('system');
        $file = $path . 'settings.php';
        $file_translations = $path . 'settings_translations.php';

        $results = \common\models\Settings::find()
            ->asArray()
            ->all();

        $translations = \common\models\SettingsTranslation::find()
            ->asArray()
            ->all();

        if ($results) {
            $this->writeArray($file, $results);
        }

        if ($translations) {
            $langs = array();

            foreach ($translations as $translation) {
                $lang = $translation['language'];
                $langs[$lang][] = $translation;
            }

            $this->writeArray($file_translations, $langs);
        }
    }

    /**
     * Dir for temp
     *
     * @param string $name
     * @return void
     */
    public function dir($name)
    {
        $path_name = str_replace('/', DS, $name);
        $path_name = trim($path_name, DS);
        $path = TEMP_PATH . $path_name . DS;

        if (!is_dir($path)) {
            mkdir($path);
        }

        return $path;
    }

    /**
     * Write array to file
     *
     * @param string $file
     * @param array $array
     * @return void
     */
    public function writeArray($file, $array)
    {
        $write = "";

        if (is_array($array) && $array) {
            $write = "<?php\nreturn " . var_export($array, true) . "\n?>";
        }

        file_put_contents($file, $write);
    }
}
