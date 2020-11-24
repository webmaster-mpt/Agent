<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property int $id
 * @property int $id_klient
 * @property int $id_operations
 * @property int $id_property
 * @property int $id_sotrudnik
 * @property string $date_On
 * @property string $date_Off
 *
 * @property Klient $klient
 * @property Operations $operations
 * @property Property $property
 * @property Sotrudniki $sotrudnik
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_klient', 'id_operations', 'id_property', 'id_sotrudnik', 'date_On', 'date_Off'], 'required'],
            [['id_klient', 'id_operations', 'id_property', 'id_sotrudnik'], 'integer'],
            [['date_On', 'date_Off'], 'safe'],
            [['id_klient'], 'exist', 'skipOnError' => true, 'targetClass' => Klient::className(), 'targetAttribute' => ['id_klient' => 'id']],
            [['id_operations'], 'exist', 'skipOnError' => true, 'targetClass' => Operations::className(), 'targetAttribute' => ['id_operations' => 'id']],
            [['id_property'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['id_property' => 'id']],
            [['id_sotrudnik'], 'exist', 'skipOnError' => true, 'targetClass' => Sotrudniki::className(), 'targetAttribute' => ['id_sotrudnik' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [ 
            'id_klient' => 'Клиент', 
            'id_operations' => 'Операция', 
            'id_property' => 'Недвижимость', 
            'id_sotrudnik' => 'Сотрудник', 
            'date_On' => 'Дата начало', 
            'date_Off' => 'Дата окончания', 
        ];
    }
    /**
     * Gets query for [[Klient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKlient()
    {
        return $this->hasOne(Klient::className(), ['id' => 'id_klient']);
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

    /**
     * Gets query for [[Property]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'id_property']);
    }

    /**
     * Gets query for [[Sotrudnik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSotrudnik()
    {
        return $this->hasOne(Sotrudniki::className(), ['id' => 'id_sotrudnik']);
    }
}
