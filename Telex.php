<?php
/**
 * MIT licence
 * Version 2.0.0
 * Sjaak Priester, Amsterdam 22-09-2015 ... 17-12-2018.
 *
 * News scroller widget for Yii 2.0 framework
 */

namespace sjaakp\telex;

use yii\base\Widget as BaseWidget;
use yii\helpers\Html;
use yii\helpers\Json;

class Telex extends BaseWidget   {

    /**
     * @var array
     * HTML options of the widget container.
     * Use this to explicitly set the ID.
     */
    public $htmlOptions = [];

    /**
     * @var array
     * JavaScript options of the widget.
     */
    public $options = [];


    public $messages = [];

    /**
     * @var array
     * Default JavaScript options of the widget.
     */
    public $defaultOptions = [];

    public function init()  {
        if (isset($this->htmlOptions['id'])) {
            $this->setId($this->htmlOptions['id']);
        }
        else $this->htmlOptions['id'] = $this->getId();
    }

    public function run()   {

        $view = $this->getView();
        TelexAsset::register($view);

        $id = $this->getId();
        $var = 'q' . str_replace('-', '_', $id);

        $opts = array_merge($this->defaultOptions, $this->options);
        $opts = empty($opts) ? '{}' : Json::encode($opts);
        $msgs = empty($this->messages) ? '[]' : Json::encode($this->messages);

        $view->registerJs("$var=Telex.widget('$id', $opts, $msgs);");
        echo Html::tag('div', '', $this->htmlOptions);
    }
}
