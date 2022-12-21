<?php

use app\modules\lesson\models\Lesson;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\modules\lesson\models\LessonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app.lesson', 'Lessons');
$this->params['breadcrumbs'][] = $this->title;
$flash = lesson::countViewed(Yii::$app->user->identity->id);
?>
<div class="lesson-index">
    <?php if(Yii::$app->user->can('addNewLesson')): ?>
    <p>
        <?= Html::a(Yii::t('app.lesson', 'Create Lesson'), ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
    <?php endif; ?>
    <?php if($flash != false): ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::t('app', 'Congratulations! You are looked through all the lessons!') ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <h2 class="pb-2 border-bottom"><?= Html::encode($this->title) ?></h2>
        <div class="card-group">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'row',
                    ],
                    'itemOptions' => ['class' => 'col-md-4 mb-3'],
                    'itemView' => 'inc/_listLessonMain',
                    'summary' => false,
                ]) ?>
        </div>
    </div>
</div>
