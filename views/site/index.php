<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label' => 'Фото',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img(Url::toRoute($data->photo),
                        ['width' => '80px', 'height' => 'auto']);
                }],
            'date',
            'name',
            'last_name',
            'email:email',
            'phone',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
