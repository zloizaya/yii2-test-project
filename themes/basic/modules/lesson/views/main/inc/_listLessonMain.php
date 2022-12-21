<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<div class="card">
  <div class="card-header">
    <h3><?= $model->title ?></h3>
  </div>
  <div class="card-body">
    <p><?= \yii\helpers\StringHelper::truncate($model->description, 100, '...'); ?></p>
  </div>
  <div class="card-footer">
    <?= Html::a(Yii::t('app.lesson', 'Read More'), ['/lesson/main/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm'])?>
    <?php foreach($model->seen as $view): ?>
      <?php if(!is_null($view['lid']) && !is_null($view['uid'])): ?>
        <?php if($view['lid'] === $model->id && $view['uid'] === Yii::$app->user->identity->id): ?>
          <div class="float-end"><?= Html::img('@web/img/icons8-ок-48.png') ?></div>
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>