<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model wokster\translationmanager\models\SourceMessage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="btn-group">
                        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Вы уверены, что хотите безвозвратно удалить Translation?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                    $arr = [
                        'id',
                        'category',
                        'message:ntext',
                    ];
                    foreach ($model->languages as $key=>$one){
                        $arr[] = ['label'=>$key, 'value' => $one];
                    }
                    ?>
                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => $arr,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
