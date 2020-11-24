<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "buy".
 *
 * @property int $id
 * @property string $Fname
 * @property string $name
 * @property string $Sname
 * @property string $telephone
 * @property int $id_klient
 *
 * @property Klient $klient
 */
class Buy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fname', 'name', 'Sname', 'telephone', 'id_klient'], 'required'],
            [['id_klient'], 'integer'],
            [['Fname', 'name', 'Sname'], 'string', 'max' => 50],
            [['telephone'], 'string', 'max' => 13],
            [['id_klient'], 'exist', 'skipOnError' => true, 'targetClass' => Klient::className(), 'targetAttribute' => ['id_klient' => 'id']],
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
            'telephone' => 'Телефон',
            'id_klient' => 'Клиент',
        ];
    }
    public function Buy()
    {        
        
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
}
