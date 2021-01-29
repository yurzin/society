<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="users-form">

    <?php
    $form = ActiveForm::begin(); ?>

    <?php
    if ($model->photo): ?>
        <img id="previewPhoto" src="../<?= $model->photo ?>" alt="Ваше изображение">
    <?php
    else: ?>
        <img id="previewPhoto" src="../images/photo_default.jpg" alt="Ваше изображение">
    <?php
    endif; ?>

    <?= $form->field($model, 'imageFile')->fileInput(['onchange' => 'loadPreview()']) ?>
    <?php \yii\helpers\VarDumper::dump($form->field($model, 'imageFile'), 3, true) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->textInput(['type' => 'date']) ?>

    <?php
    $model->gender = 'Мужчина';
    echo $form->field($model, 'gender')->radioList(['Мужчина' => 'Мужчина', 'Женщина' => 'Женщина']) ?>

    <?= $form->field($model, 'city')->dropDownList(
        ['Кемерово' => 'Кемерово', 'Новокузнецк' => 'Новокузнецк', 'Санкт-Петербуг' => 'Санкт-Петербуг'],
        [
            'prompt' => 'Выберите город'
        ]
    ) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'phone')->widget(
        MaskedInput::class,
        [
            'mask' => '9-999-999-9999',
            'options' => ['placeholder' => ('Контактный телефон')]
        ]
    ) ?>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    ActiveForm::end(); ?>

</div>