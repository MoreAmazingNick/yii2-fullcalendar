<?php

namespace moreamazingnick\fullcalendar;

/**
 * Class CoreAsset
 * @package moreamazingnick\fullcalendar
 */
class CoreAsset extends \yii\web\AssetBundle
{
    /**
     * @var  boolean
     * Whether to automatically generate the needed language js files.
     * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
     * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
     */
    public $autoGenerate = true;
    /** @var  array Required CSS files for the fullcalendar */
    public $css = [
        'fc-main.css',
    ];
    /** @var  array List of the dependencies this assets bundle requires */
    public $depends = [
        'yii\web\YiiAsset',
        'moreamazingnick\fullcalendar\PrintAsset',
    ];
    /**
     * @var  boolean
     * FullCalendar can display events from a public Google Calendar. Google Calendar can serve as a backend that manages and persistently stores event data (a feature that FullCalendar currently lacks).
     * Please read http://fullcalendar.io/docs/google_calendar/ for more information
     */
    public $googleCalendar = false;
    /** @var  array Required JS files for the fullcalendar */
    public $js = [
        'fc-main.js',
        'fc-locales-all.js',
    ];
    public $sourcePath=__DIR__."/fullcalendar/lib/";
    /** @var  string locale for the fullcalendar */
    public $locale = null;
    /** @var  string Location of the fullcalendar distribution */

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        //$language = empty($this->locale) ? \Yii::$app->language : $this->locale;
        //if (file_exists($this->sourcePath . "/locales/$language.js")) {
        //    $this->js[] = "locales/$language.js";
        // }

        // We need to return the parent implementation otherwise the scripts are not loaded
        return parent::registerAssetFiles($view);
    }
}
