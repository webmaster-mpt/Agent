<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

.breadcrumb{
    background-color: #9370DB;
    color:#000000;
    width:190px;
}
.breadcrumb a{
    background-color: #9370DB;
    color:#000000;
}
.breadcrumb .active{
    background-color: #9370DB;
    color:#000000;
}
.control-label{
    color:white;
}
p{
    color:#9370DB;
}
.breadcrumb .active::before{
    background-color: #9370DB;
    color:#000000;
}
.btn-primary{
    background-color: #9370DB;
    color:#000000;
    border-color:#000000;
}
#signupform-photo{
    background-color: #9370DB;
    color:#000000;
    border-color:#000000;
}

.form-control{
    background-color: #000000;
    color:white;
    border-color: #9370DB;
    width: 100%;
}
.form-control:hover{
    border-color: #9370DB;
}
</style>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Зарегистрируйтесь для входа в систему</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup','options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'photo')->fileInput() ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Сигнуп', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
