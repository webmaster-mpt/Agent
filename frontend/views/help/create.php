<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\help */

$this->params['breadcrumbs'][] = ['label' => 'Помощь', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Написать';
?>
<style>

.breadcrumb{
    background-color: #9370DB;
    color:#000000;
    width:255px;
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
    font-size: 30px;
    color:white;
}
.breadcrumb .active::before{
    background-color: #9370DB;
    color:#000000;
}
.btn-success{
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
<div class="help-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
