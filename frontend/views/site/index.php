<?php

/* @var $this yii\web\View */

use frontend\models\Contract;
use frontend\models\Klient;
use frontend\models\Operations;
use frontend\models\Property;
use frontend\models\Sotrudniki;

$this->title = 'Агенство недвижимости';
?>
<style>
body{
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
    line-height: 1.42em;
    color:#A7A1AE;
 
    background-color:#1F2739;
}
.btn-success{
    background-color: #9370DB;
    color:#000000;
    border-color:#000000;
}
main{
    display: flex;
    flex-flow: row wrap;
    align-items: center;
    justify-content: center;
    padding: 40px;
}
.panel{
    width: 600px;
    background: #f5f5f5;
    box-shadow: 0 10px 20px rgba(0,0,0,.3);
    overflow: hidden;
    border-radius: 5px;
    padding: 25px;
    z-index: 2;
}
.title{
    font-weight: 900;
    text-transform: uppercase;
    font-size: 30px;
    color: #23211f;
    margin-bottom: 5px;
}
th{
    color:black;
    font-family: 'Comfortaa', cursive;
    font-weight: 300;
}
.pull{
    color:#000000;
}
.heading{
    background-color: #9370DB;
    color:black;
    width:100px;
    margin:0 40%;
    font-weight: bold;
    overflow: hidden;
    border-radius: 5px;
    padding: 5px;
    z-index: 2;
}
.wrap{
    width: 100%;
    display: flex;
    flex-flow: row wrap;
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
    line-height: 1.42em;
    color:#A7A1AE;
    background-color:#1F2739;
}
div {
    display: block;
}
.button-container {
    text-align: center;
    margin-top: 10px;
}
.button-container a {
    text-decoration: none;
    background-color: #9370DB;
    margin: 10px 20px;
    padding: 10px 30px;
    border-radius: 5px;
    border: 2px solid #9370DB;
    color: black;
    font-family: 'Open Sans', sans-serif;
}
</style>
<div class="site-index">
    <div class="jumbotron">
    <main>
    <?php
        foreach ($klients as $klient) 
        {
        ?>    
            <div class="panel panel-default">
                <div class="title">
                    <p><? echo  $property = Property::find()->where('id=' . $klient->id_property)->one()->name;?></p>
                </div>
                <img src="/uploads/<? echo  $klient->photo;?>" alt="">
                <div class="panel-body">
                    <table>
                    <tr>
                    <th>Количество комнат: <? echo  $klient->rooms;?></th>
                    <th>Удобства: <? echo  $klient->udobstva;?></th>
                    <tr>
                        <th>Хозяин квартиры: <? echo  $klient->Fname. " " .$klient->name. " " .$klient->Sname?></th>
                    </tr>
                    <tr>
                        <th>Адрес: <? echo  $klient->address;?></th>
                        <th>Телефонный номер: <? echo  $klient->telephone;?></th>
                    </tr>
                    <tr>
                        <th>Операция: <? echo  $klient->name;?></th>
                        <th>Цена: <?echo  $klient->cost;?> руб</th>
                    </tr>
                    </tr>
                    </table>                    
                </div>
                <div class="button-container">
                <a class="pull" href="<?= Yii::$app->urlManager->createUrl(['buy/create', 'id' => $klient->id]);?>">Купить</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</main>
</div>
