<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Klient;
use frontend\models\Operations;
use frontend\models\Sotrudniki;
use frontend\models\Property;

/* @var $this yii\web\View */
/* @var $model frontend\models\contract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_klient')->dropDownList(Klient::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'id_operations')->dropDownList(Operations::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'id_property')->dropDownList(Property::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'id_sotrudnik')->dropDownList(Sotrudniki::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'date_On')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'date_Off')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
