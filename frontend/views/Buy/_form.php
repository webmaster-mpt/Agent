<?php

use frontend\models\Klient;
use frontend\models\Operations;
use frontend\models\Property;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\buyer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buyer-form">
    
    <?php $form = ActiveForm::begin(['id' => 'id_klient']); ?>
    

    <?= $form->field($model, 'Fname')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_klient')->textInput(['value'=>$id])?>

    
    <div class="form-group">
        <?= Html::submitButton('Купить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
