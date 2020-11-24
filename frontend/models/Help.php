<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property int $id
 * @property string $text_help
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_help'], 'required'],
            [['text_help'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text_help' => 'Напишите нам',
        ];
    }
}
