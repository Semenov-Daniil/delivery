<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CatalogLightSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\models\Category $categories */

$this->title = 'Каталог light';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'value' => function($model) {
                    return ($model->photo ? Html::img('/uploads/' . $model->photo, ['class' => 'w-25 me-3', 'alt' => $model->title]) : '') . $model->title;
                },
                'format' => 'html',
            ],
            'price',
            'count',
            'weight',
            'kilocalories',
            'shelf_life',
            'description:ntext',
            [
                'attribute' => 'category_id',
                'value' => function($model, $key, $index, $column) use($categories) {
                    return $categories[$model->category_id];
                }    
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
