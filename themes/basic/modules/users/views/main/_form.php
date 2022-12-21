<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\users\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
<?php $form = ActiveForm::begin(); ?>
    <div class="row mb-3">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['placeholder' => Yii::t('app.users', 'Username'), 'maxlength' => true])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app.users', 'Email'), 'maxlength' => true])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'full_name')->textInput(['placeholder' => Yii::t('app.users', 'Full Name'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app.users', 'Password'), 'maxlength' => true])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'repassword')->passwordInput(['placeholder' => Yii::t('app.users', 'Re-Password'), 'maxlength' => true])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app.users', 'Save'), ['class' => 'btn btn-success btn-sm']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
