<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "klient".
 *
 * @property int $id
 * @property string $Fname
 * @property string $name
 * @property string|null $Sname
 * @property string $address
 * @property int $id_operations
 * @property string $photo
 * @property string $telephone
 * @property int $cost
 * @property string $rooms
 * @property int $id_property
 * @property string $udobstva
 *
 * @property Buy[] $buys
 * @property Contract[] $contracts
 * @property Operations $operations
 */
class KlientUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'klient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fname', 'name', 'address', 'id_operations', 'photo', 'telephone', 'cost', 'rooms', 'id_property', 'udobstva','activeContract'], 'required'],
            [['address', 'photo', 'udobstva','activeContract'], 'string'],
            [['id_operations', 'cost', 'id_property'], 'integer'],
            [['Fname', 'name', 'Sname'], 'string', 'max' => 50],
            [['telephone'], 'string', 'max' => 15],
            [['rooms'], 'string', 'max' => 5],
            [['id_operations'], 'exist', 'skipOnError' => true, 'targetClass' => Operations::className(), 'targetAttribute' => ['id_operations' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fname' => 'Фамилия',
            'name' => 'Имя',
            'Sname' => 'Отчество',
            'address' => 'Адрес',
            'id_operations' => 'Операция',
            'photo' => 'Фото',
            'telephone' => 'Телефон',
            'cost' => 'Стоимость',
            'rooms' => 'Комнаты',
            'id_property' => 'Недвижимость',
            'udobstva' => 'Удобства',
            'activeContract' => 'Статус контракта',
        ];
    }

    /**
     * Gets query for [[Buys]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuys()
    {
        return $this->hasMany(Buy::className(), ['id_klient' => 'id']);
    }

    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'id_property']);
    }

    /**
     * Gets query for [[Contracts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['id_klient' => 'id']);
    }

    /**
     * Gets query for [[Operations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperations()
    {
        return $this->hasOne(Operations::className(), ['id' => 'id_operations']);
    }
}
