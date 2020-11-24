<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\buyer */

$this->title = 'Купить недвижимость';
$this->params['breadcrumbs'][] = ['label' => 'Куплено', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

.breadcrumb{
    background-color: #9370DB;
    color:#000000;
    width:336px;
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
<div class="buyer-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Покупка несуществующей недвижимости!)</h4>
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id
    ]) ?>

</div>
