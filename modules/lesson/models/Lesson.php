<?php

namespace app\modules\lesson\models;

use Yii;
use app\modules\lesson\models\Viewed;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%lesson}}".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $title
 * @property string|null $description
 * @property string|null $link
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lesson}}';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y.m.d'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['title', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app.lesson', 'ID'),
            'created_at' => Yii::t('app.lesson', 'Created At'),
            'updated_at' => Yii::t('app.lesson', 'Updated At'),
            'title' => Yii::t('app.lesson', 'Title'),
            'description' => Yii::t('app.lesson', 'Description'),
            'link' => Yii::t('app.lesson', 'Link'),
        ];
    }
    //Связь с моделью просмотренных уроков
    public function getSeen()
    {
        return $this->hasMany(Viewed::class, ['lid' => 'id']);
    }
    //Считаем все доступные уроки
    //Сравниевам с просмотренными уроками
    //И если пользователь посмотрел все - выводим уведомление с поздравлением
    public function countViewed($uid)
    {
        $lessonCount = Lesson::find()->count();
        $viewedCount = Viewed::find()->where(['uid' => $uid])->count();
        $class = 'disabled';
        if($viewedCount >= $lessonCount) {
            return $class;
        }

        return false;
    }
    //Проверяем смотрел ли пользователь урок и если да - блокируем кнопку
    public function lessonViewed($lid, $uid)
    {
        $class = 'disabled';
        $data = Viewed::find()->where(['lid' => $lid, 'uid' => $uid])->one();
        if(!is_null($data)) {
            return $class;
        } else {
            return false;
        }
    }
}
