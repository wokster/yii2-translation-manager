<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model wokster\translationmanager\models\SourceMessage */

$this->title = 'Создать Translation';
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
