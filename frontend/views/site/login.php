<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$art = 'Главная';
$this->title = 'Авторизация';
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
#loginform-rememberme{
    background-color: #9370DB;
    color:#000000;
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
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Авторизуйтесь чтоб войти в систему</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Если забыл пароль <?= Html::a('ВОССТАНОВИ', ['site/request-password-reset']) ?>.
                    
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
