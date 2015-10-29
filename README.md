Yii2-telex
==========

#### Telex news scroller widget for the Yii2 PHP Framework ####

Telex widget is a very lightweight widget to render my [Javascript jQuery telex widget](https://github.com/sjaakp/telex).

A demonstration of **Yii2-telex** is [here](http://www.sjaakpriester.nl/software/yii2-telex).

## Installation ##

Install **Yii2-telex** with [Composer](https://getcomposer.org/). Either add the following to the require section of your `composer.json` file:

`"sjaakp/yii2-telex": "*"` 

Or run:

`composer require sjaakp/yii2-telex "*"` 

You can manually install **Yii2-telex** by [downloading the source in ZIP-format](https://github.com/sjaakp/yii2-telex/archive/master.zip).

## Using Yii2-telex ##

Use **Yii-telex** in a view like any other widget, like this:

	<?php
	use sjaakp\telex\Telex;
	?>
		... view code ...

        <?= Telex::widget([
            'options' => [
                'messages' => [
					[ 'id' => 'm1', 'content' => 'Initial message'],
					// ... more messages ...
				],
				'duration' => 7500,
				// ... more options ...	
            ],
            'htmlOptions' => [
                // ...
            ]
        ]) ?>

		... more view code ...


#### options ####

Dateline has the following options:

- **options**: array of options for the underlying telex jQuery widget. More information [here](https://github.com/sjaakp/telex#messages "GitHub").
- **htmlOptions** (optional): array of HTML options for the Dateline container. Use this if you want to explicitly set the ID. 
