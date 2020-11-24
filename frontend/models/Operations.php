<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "operations".
 *
 * @property int $id
 * @property string $name
 *
 * @property Contract[] $contracts
 * @property Klient[] $klients
 */
class Operations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование операции',
        ];
    }

    /**
     * Gets query for [[Contracts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['id_operations' => 'id']);
    }

    /**
     * Gets query for [[Klients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKlients()
    {
        return $this->hasMany(Klient::className(), ['id_operations' => 'id']);
    }
}
