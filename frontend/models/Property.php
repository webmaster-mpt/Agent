<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property int $id
 * @property string $name
 *
 * @property Contract[] $contracts
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property';
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
            'name' => 'Название недвижимости',
        ];
    }

    /**
     * Gets query for [[Contracts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['id_property' => 'id']);
    }
    public function getKlient()
    {
        return $this->hasMany(Klient::className(), ['id_property' => 'id']);
    }
}
