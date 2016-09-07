<?php

namespace wokster\translationmanager;

/**
 * translation module definition class
 */
class TranslationManager extends \yii\base\Module
{
  /**
   * @var array Array of languages
   */
    public $languages = ['en','ru'];

    public $grid_column = [];

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'wokster\translationmanager\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->grid_column = $this->getGridColumns();
    }

  /**
   * @return array Return array of column for gridViewWidget
   */
    public function getGridColumns(){
        $columns = [
            ['class' => 'yii\grid\SerialColumn'],
            'category',
            'message:ntext'
        ];

        foreach ($this->languages as $one){
            $columns[] = [
                'label' => $one,
                'value' => 'languages.'.$one,
                'filter' => '<input type="text" class="form-control" name="SourceMessageSearch[languages]['.$one.']">',
            ];
        }

        $columns[] = ['class' => 'yii\grid\ActionColumn'];

        return $columns;
    }
}
