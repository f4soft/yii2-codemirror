<?php

namespace f4soft\codemirror;

use yii\web\AssetBundle;

/**
 * Class CodeMirrorAsset
 * @package f4soft\codemirror
 */
class CodeMirrorAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/codemirror';

    /**
     * @inheritdoc
     */
    public $js = [
        'lib/codemirror.js',
        'addon/edit/matchbrackets.js',
        'mode/htmlmixed/htmlmixed.js',
        'mode/xml/xml.js',
        'mode/javascript/javascript.js',
        'mode/css/css.js',
        'mode/php/php.js',
        'addon/hint/show-hint.js',
        'addon/hint/html-hint.js',
        'addon/hint/xml-hint.js',
    ];

    public $css = [
        'lib/codemirror.css',
        'addon/hint/show-hint.css',
    ];
}