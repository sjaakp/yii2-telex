<?php
/**
 * MIT licence
 * Version 1.0.0
 * Sjaak Priester, Amsterdam 22-09-2015.
 *
 * News scroller widget for Yii 2.0 framework
 */

namespace sjaakp\telex;

use yii\web\AssetBundle;

class TelexAsset extends AssetBundle {
    public $depends = [
        'yii\jui\JuiAsset',
    ];

    public $sourcePath = '@bower/telex/dist';

    public function init()    {
        parent::init();

        $this->js[] = YII_DEBUG ? 'telex.js' : 'telex.min.js';
    }
}