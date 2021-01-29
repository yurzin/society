<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\viewmodel\ViewModel */

$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->users->name . ' ' . $model->users->last_name;
\yii\web\YiiAsset::register($this);

?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-4 col-md-5 mobile-mb32">
            <div class="profile-foto resume-profile-foto"><img src="../<?= $model->users->photo ?>" alt="profile-foto">
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16"><?= $model->users->name . ' ' . $model->users->last_name; ?>
            </div>

            <div class="profile-info company-profile-info resume-view__info-blick">
                <div class="profile-info__block company-profile-info__block mb8">
                    <div class="profile-info__block-left company-profile-info__block-left">Возраст</div>
                    <div class="profile-info__block-right company-profile-info__block-right">
                        <?= Yii::$app->i18n->format(
                            '{n, plural, one{# год} few{# года} many{# лет} other{# года}}',
                            ['n' => $model->getAge()],
                            'ru_RU'
                        ); ?>
                    </div>
                </div>
                <div class="profile-info__block company-profile-info__block mb8">
                    <div class="profile-info__block-left company-profile-info__block-left">Город проживания</div>
                    <div class="profile-info__block-right company-profile-info__block-right"><?= $model->users->city ?></div>
                </div>
                <div class="profile-info__block company-profile-info__block mb8">
                    <div class="profile-info__block-left company-profile-info__block-left">Электронная почта</div>
                    <div class="profile-info__block-right company-profile-info__block-right"><a
                                href="#"><?= $model->users->email ?></a></div>
                </div>
                <div class="profile-info__block company-profile-info__block mb8">
                    <div class="profile-info__block-left company-profile-info__block-left">Телефон</div>
                    <div class="profile-info__block-right company-profile-info__block-right"><a
                                href="#"><?= $model->users->phone ?></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <p style="margin-top: 15px">
            <?= Html::a('Обновить', ['update', 'id' => $model->users->id], ['class' => 'link-orange-btn orange-btn mr24 mobile-mb12']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->users->id], [
                'class' => 'link-orange-btn orange-btn mr24 mobile-mb12',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
</div>
