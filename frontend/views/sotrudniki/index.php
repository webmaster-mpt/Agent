<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SotrudnikiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

.breadcrumb{
    background-color: #9370DB;
    color:#000000;
    width:185px;
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
<div class="sotrudniki-index">

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>    

</div>
