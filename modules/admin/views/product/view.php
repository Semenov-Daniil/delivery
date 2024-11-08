<?php

use app\models\Product;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var app\models\Category $categories */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'price',
            'count',
            'weight',
            'kilocalories',
            'shelf_life',
            'description:ntext',
            [
                'attribute' => 'category_id',
                'value' => $categories[$model->category_id]
            ],
            [
                'attribute' => 'photo',
                'value' => Html::img('/uploads/' . $model->photo, ['class' => 'w-25', 'alt' => $model->title]),
                'format' => 'html',
                'visible' => (bool)$model->photo
            ],
        ],
    ]) ?>

</div>
