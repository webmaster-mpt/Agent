<?php

use frontend\models\Klient;
use frontend\models\Operations;
use frontend\models\Property;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BuyerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Куплено';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

.breadcrumb{
    background-color: #9370DB;
    color:#000000;
    width:175px;
}
.breadcrumb a{
    background-color: #9370DB;
    color:#000000;
}
.breadcrumb .active{
    background-color: #9370DB;
    color:#000000;
}
span{
    color:#9370DB;
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
.summary{
    color:#800000;
}
th{
    color: #4682B4;
}
td{
    background-color: #000000;
    color: white;
}
.form-control{
    background-color: #000000;
    color:white;
    border-color: #9370DB;
    width: 110px;
}
.form-control:hover{
    border-color: #9370DB;
}
</style>
<div class="buyer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Fname',
            'name',
            'Sname',
            'telephone',
            [
                'attribute'=>'id_klient',
                'filter'=> Klient::find()->select(['name','id'])->indexBy('id')->column(),
                'value' => 'klient.name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Купить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
