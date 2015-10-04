<?php
/**
 * MIT licence
 * Version 1.0.1
 * Sjaak Priester, Amsterdam 22-09-2015 ... .
 *
 * News scroller widget for Yii 2.0 framework
 */

namespace sjaakp\telex;

use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;

class Telex extends Widget {

   /**
     * @var array
     * Client options for the Telex jQuery widget.
     * @link https://github.com/sjaakp/telex
     */
    public $options = [];

    /**
     * @var array
     * HTML options of the dateline container.
     * Use this if you want to explicitly set the ID.
     */
    public $htmlOptions = [];

    public function init()  {
        if (isset($this->htmlOptions['id'])) {
            $this->setId($this->htmlOptions['id']);
        }
        else $this->htmlOptions['id'] = $this->getId();
    }

    public function run()   {
        $view = $this->getView();

        $asset = new TelexAsset();
        $asset->register($view);

        $jOpts = count($this->options) ? Json::encode($this->options) : '{}';

        $id = $this->getId();

        $js = "var {$id}=$('#{$id}').telex($jOpts);";

        $view->registerJs($js);

        echo Html::tag('div', '', $this->htmlOptions);
    }
}
