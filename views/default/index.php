<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel wokster\translationmanager\models\SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-index row">

    <div class="pad no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Module Rules:</h4>
            If there is no translation, displayed text from "key". Accordingly, if the "key" and the translation is identical, does not necessarily make the translation.
            "Key" is an identifier. It is in the site code and serves as a link with this module. To add a new translation, it is necessary not only to create it here, but also insert the corresponding key in site code.
        </div>
    </div>
    <div class="col-xs-12">
        <a href="<?=\yii\helpers\Url::to(['create'])?>" class="btn btn-success">create new</a>
        <div class="box box-default">
            <div class="box-header with-border">
                <span class="label label-default">записей <?= $dataProvider->getCount()?> из <?= $dataProvider->getTotalCount()?></span>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'summary' => '',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => Yii::$app->controller->module->grid_column,
                ]); ?>
            </div>
        </div>
    </div>
</div>
