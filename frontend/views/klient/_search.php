<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KlientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="klient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Fname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'Sname') ?>

    <?= $form->field($model, 'address') ?>

    <?php echo $form->field($model, 'id_operations') ?>

    <?php echo $form->field($model, 'photo') ?>

    <?php echo $form->field($model, 'telephone') ?>
    
    <?php echo $form->field($model, 'cost') ?>
    
    <?php echo $form->field($model, 'rooms') ?>
    
    <?php echo $form->field($model, 'id_property') ?>
    
    <?php echo $form->field($model, 'udobstva') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
