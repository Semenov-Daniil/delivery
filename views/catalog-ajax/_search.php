<?php

use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search d-flex">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'd-flex gap-4',
            'data' => ['pjax' => true]
        ]
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'category_id')->dropdownList(Category::getCategories(), ['prompt'=>'Выбрать категорию']) ?>

    <div class="form-group d-flex gap-2 align-items-end">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Сброс', ['/catalog'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
