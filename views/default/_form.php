<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\translation\models\SourceMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-message-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">

                <div class="box-header with-border">
                    <h3 class="box-title">Заполните форму</h3>
                </div>

                <div class="box-body">

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?php
                      $c = $form->field($model, 'category');
                      if($model->isNewRecord){
                        $c->textarea(['rows' => 1]);
                      }else{
                        $c->label(false)->hiddenInput();
                      }
                      echo $c;
                      ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?php
                      $m = $form->field($model, 'message');
                      if($model->isNewRecord){
                        $m->textarea(['rows' => 1]);
                      }else{
                        $m->label(false)->hiddenInput();
                      }
                      echo $m;
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'en')->textarea(['rows' => 1]) ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'fr')->textarea(['rows' => 1]) ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?= $form->field($model, 'ru')->textarea(['rows' => 1]) ?>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
  <?php ActiveForm::end(); ?>
</div>
