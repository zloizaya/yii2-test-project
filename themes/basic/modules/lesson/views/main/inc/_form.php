<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\lesson\models\Lesson $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lesson-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row mb-3">
        <div class="col-md-4">
            <?= $form->field($model, 'title')->textInput(['placeholder' => Yii::t('app.lesson', 'Title'), 'maxlength' => true])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'link')->textInput(['placeholder' => Yii::t('app.lesson', 'Link'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <?= $form->field($model, 'description')->textarea(['rows' => 6])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app.lesson', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
