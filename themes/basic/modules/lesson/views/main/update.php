<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\lesson\models\Lesson $model */

$this->title = Yii::t('app.lesson', 'Update Lesson: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app.lesson', 'Lessons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app.lesson', 'Update');
?>
<div class="lesson-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('inc/_form', [
        'model' => $model,
    ]) ?>

</div>
