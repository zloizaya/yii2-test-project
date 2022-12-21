<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \app\modules\user\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use app\assets\LoginAsset;

LoginAsset::register($this);

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCsrfMetaTags();

?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta name="theme-color" content="#7952b3">
</head>
<body class="text-center">
    <?php $this->beginBody() ?>
    <main class="form-signin">
        <h1><?= Html::encode($this->title) ?></h1>
        <p><?=Yii::t('app', 'Follow to login')?></p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="form-floating">
            <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'autofocus' => true])->label(false) ?>
        </div>
        <div class="form-floating">
            <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login button'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <p class="mt-5 mb-3 text-muted"><?= date('Y') ?> <?= Yii::$app->params['appName'] ?></p>
        <?php ActiveForm::end(); ?>
    </main>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>