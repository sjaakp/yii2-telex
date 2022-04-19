<?php
/**
 * MIT licence
 * Version 2.1.0
 * Sjaak Priester, Amsterdam 22-09-2015 ... 26-12-2018.
 *
 * News scroller widget for Yii 2.0 framework
 */

namespace sjaakp\telex;

use yii\base\Widget as BaseWidget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\data\DataProviderInterface;

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

    /**
     * @var null|DataProviderInterface
     */
    public $dataProvider = null;

    /**
     * @var string
     * attribute names of records provided by content
     */
    public $bodyAttribute = 'body';
    public $styleAttribute = 'style';
    public $urlAttribute = 'url';

    /**
     * @var string
     * string prepended to 'style'-attribute to form HTML-class
     */
    public $stylePrefix = 'telex-';

    /**
     * @var array
     * Default JavaScript options of the widget.
     */
    public $defaultOptions = [];

    /**
     * @var array of String|array - array of messages.
     * if array of String, they are the messages. May also contain HTML.
     * if array of array, they have the following members:
     *     - 'content': the text of the message. May also contain HTML, like a link.
     *     - 'class' (optional): the CSS-class of the message. May be used for styling.
     *     - 'id' (optional): the identifier of the message.
     */
    public $messages = [];

    public function init()  {
        if ($this->dataProvider instanceof DataProviderInterface)    {
            $this->messages = array_map(function($model) {
                if (is_array($model)) {
                    $text = $this->prepareBody($model[$this->bodyAttribute]);
                    $url = $model[$this->urlAttribute];
                    $style = $model[$this->styleAttribute];

                } else {
                    $text = $this->prepareBody(Html::getAttributeValue($model, $this->bodyAttribute));
                    $url = Html::getAttributeValue($model, $this->urlAttribute);
                    $style = Html::getAttributeValue($model, $this->styleAttribute);
                };                                
                
                if (! empty($url)) $text = Html::a($text, $url);
                $r = [
                    'content' => $text
                ];
                if (! empty($style)) $r['class'] = $this->stylePrefix . $style;
                return $r;
            }, $this->dataProvider->getModels());
        }
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

    protected function prepareBody($str)  {
        return $str;
    }
}
