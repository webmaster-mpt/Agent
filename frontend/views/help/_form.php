<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\help */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="help-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text_help')->textarea(['rows' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить письмо', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
