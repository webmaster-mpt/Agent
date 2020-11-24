<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Klient;
use frontend\models\Operations;
use frontend\models\Sotrudniki;
use frontend\models\Property;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContractSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<?= $form->field($model, 'id_klient')->dropDownList(Klient::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

<?= $form->field($model, 'id_operations')->dropDownList(Operations::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

<?= $form->field($model, 'id_property')->dropDownList(Property::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

<?= $form->field($model, 'id_sotrudnik')->dropDownList(Sotrudniki::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>


    <?php // echo $form->field($model, 'date_On') ?>

    <?php // echo $form->field($model, 'date_Off') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
