<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sotrudniki".
 *
 * @property int $id
 * @property string $Fname
 * @property string $name
 * @property string $Sname
 *
 * @property Contract[] $contracts
 */
class Sotrudniki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sotrudniki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fname', 'name', 'Sname'], 'required'],
            [['Fname', 'name', 'Sname'], 'string', 'max' => 50],
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
            'name' => 'Имя сотрудника',
            'Sname' => 'Отчество',
        ];
    }

    /**
     * Gets query for [[Contracts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['id_sotrudnik' => 'id']);
    }
}
