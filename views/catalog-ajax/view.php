<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var app\models\Category $categories */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h3>Товар: <?= Html::encode($this->title) ?></h3>

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
