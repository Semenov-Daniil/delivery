<?php

use app\models\Product;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var app\models\Product $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin([
        'id' => 'catalog-pjax',
        'enablePushState' => false,
        'timeout' => 5000,
    ]); ?>

        <div class="block-link">
            <?= Html::a('link test1', '', ['class' => 'btn btn-primary btn-test', 'data-id' => 1]) ?>
            <?= Html::a('link test2', '', ['class' => 'btn btn-primary btn-test', 'data-id' => 2]) ?>
        </div>

        <div class="my-3 d-flex justify-content-between align-items-end">
            <div class="form-group">
                Сортировка
                <div class="d-flex align-items-center gap-2">
                    <?= $dataProvider->sort->link('title', ['class' => 'btn btn-outline-secondary']) ?>
                    <?= $dataProvider->sort->link('price', ['class' => 'btn btn-outline-secondary']) ?>
                    <?= $dataProvider->sort->link('count', ['class' => 'btn btn-outline-secondary']) ?>
                    <?= Html::a('Сбросить', ['/catalog'], ['class' => 'btn btn-outline-secondary'])?>
                </div>
            </div>
            <div class="d-flex gap-3">
                <?= $this->render('_search', [
                    'model' => $searchModel,
                ]);  ?>
            </div>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "
                <div class=\"mt-3\">{pager}</div>\n
                <div class=\"d-flex justify-content-evenly align-item-stretch flex-wrap\">{items}</div>\n
                <div class=\"mt-3\">{pager}</div>",
            'itemOptions' => ['class' => 'item mx-3 align-self-stretch'],
            'itemView' => '_item',
            'pager' => [
                'class' => LinkPager::class
            ],
        ]) ?>
    <?php Pjax::end(); ?>


</div>
