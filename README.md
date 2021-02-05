Yii2-telex 2.1
==============

#### Telex news scroller widget for the Yii2 PHP Framework ####

[![Latest Stable Version](https://poser.pugx.org/sjaakp/yii2-telex/v/stable)](https://packagist.org/packages/sjaakp/yii2-telex)
[![Total Downloads](https://poser.pugx.org/sjaakp/yii2-telex/downloads)](https://packagist.org/packages/sjaakp/yii2-telex)
[![License](https://poser.pugx.org/sjaakp/yii2-telex/license)](https://packagist.org/packages/sjaakp/yii2-telex)

Telex widget is a widget to render my [Javascript telex widget](https://github.com/sjaakp/telex). It displays horizontal scrolling news messages, traffic information, stock quotes, and the like, provided by a Yii2 `DataProvider`.

A demonstration of **Yii2-telex** is [here](https://sjaakpriester.nl/software/yii2-telex).

## Installation ##

Install **Yii2-telex** with [Composer](https://getcomposer.org/). Either add the following to the `require` section of your `composer.json` file:

`"sjaakp/yii2-telex": "*"` 

Or run:

`composer require sjaakp/yii2-telex "*"` 

You can manually install **Yii2-telex** by [downloading the source in ZIP-format](https://github.com/sjaakp/yii2-telex/archive/master.zip).

## Using Yii2-telex ##


#### Options ####

Yii2-telex has the following options:

- **dataProvider**: instance of a `yii\data\DataProviderInterface` providing `BaseObject`s with message data.
- **bodyAttribute**: attribute name of the attribute of the message's body text. The body text may contain HTML. Default: `"body"`.
- **styleAttribute**: attribute name of the style attribute (optional). This attribute will be prefixed with **stylePrefix** to form the HTML-class of the message. Default: `"style"`.
- **urlAttribute**: attribute name of the url attribute (optional). If set, the message will be a link to the url. Default: `"url"`.
- **stylePrefix**: see **styleAttribute**. Default: `"telex-"`.
- **options**: array of options for the underlying Javascript telex widget. More information [here](https://github.com/sjaakp/telex#messages "GitHub").
- **htmlOptions**: array of HTML options for the Telex container. Use this if you want to explicitly set the ID. 

#### Overridable ####

Yii2-telex's protected function `prepareBody($str)` can be overridden. To manipulate the body text before it is sent to the widget. 
The default implementation just returns `$str`.
