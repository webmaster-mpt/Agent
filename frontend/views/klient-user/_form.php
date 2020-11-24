<?php

use frontend\models\Operations;
use frontend\models\Property;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\klientuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klient-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'Fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_property')->dropDownList(Property::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'rooms')->dropDownList([
        '0' => '1-комнатная',
        '1' => '2ух-комнатная',
        '2' => '3ёх-комнатная',
        '3' => '4ёх-комнатная',
        '4' => '5ти-комнатная']) ?>
    
    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_operations')->dropDownList(Operations::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <?= $form->field($model, 'cost')->textInput() ?>
    
    <?= $form->field($model, 'udobstva')->textarea(['rows' => 6,'placeholder'=>'тихий район, рядом с метро...и т.д']) ?>
    
    <?= $form->field($model, 'activeContract')->hiddenInput(['value' => 'несоставлен'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
