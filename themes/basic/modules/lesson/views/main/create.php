<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\lesson\models\Lesson $model */

$this->title = Yii::t('app.lesson', 'Create Lesson');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app.lesson', 'Lessons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('inc/_form', [
        'model' => $model,
    ]) ?>

</div>
