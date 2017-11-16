<?php

namespace f4soft\codemirror;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class CodeMirror extends InputWidget
{
    public $clientOptions = [
        'lineNumbers' => true,
        'matchBrackets' => true,
        'indentUnit' => 4,
        'indentWithTabs' => true,
        'lineWrapping' => true,
        'mode' => 'htmlmixed',
    ];

    /**
     * @inheritdoc
     */
    protected function registerClientScript()
    {
        $view = $this->getView();
        CodeMirrorAsset::register($view);
        $this->options['id'] = $this->getId();

        $js = "
            CodeMirror.commands.autocomplete = function(cm) {
                CodeMirror.showHint(cm, CodeMirror.htmlHint);
            }
            CodeMirror.commands.save = function(cm){
                $('#" . $this->options['id'] . "').text(cm.getValue());
            }            
            ";
        $view->registerJs($js);

        $js = "var editor = CodeMirror.fromTextArea(document.getElementById(\"{$this->options['id']}\")";

        $options = Json::encode($this->clientOptions);
        $js .= empty($this->clientOptions) ? '' : ', ' . ($options);
        $js .= ");";
        $js .= "editor.setSize('100%', 'auto');";
        $view->registerJs($js);
    }

    /**
     * @return mixed
     */
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            $content = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $content = Html::textarea($this->name, $this->value, $this->options);
        }
        return $content;
    }
}
