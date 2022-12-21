<?php

namespace app\modules\lesson\models;

use Yii;

/**
 * This is the model class for table "{{%viewed}}".
 *
 * @property int $id
 * @property int|null $uid
 * @property int|null $lid
 */
class Viewed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%viewed}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'lid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app.lesson', 'ID'),
            'uid' => Yii::t('app.lesson', 'Uid'),
            'lid' => Yii::t('app.lesson', 'Lid'),
        ];
    }
}
