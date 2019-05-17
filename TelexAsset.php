<?php
/**
 * MIT licence
 * Version 2.0.0
 * Sjaak Priester, Amsterdam 22-09-2015 ... 17-12-2018.
 *
 * News scroller widget for Yii 2.0 framework
 */

namespace sjaakp\telex;

use yii\web\AssetBundle;

class TelexAsset extends AssetBundle {

    public $js = [
        'telex.js'
    ];

//    public $sourcePath = '@bower/telex/dist';
    public $baseUrl = '//unpkg.com/@sjaakp/telex/dist';

//    public $publishOptions = [
//        'forceCopy' => YII_DEBUG
//    ];
}
