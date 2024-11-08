<?php

/** @var yii\data\ActiveDataProvider $model */

use yii\bootstrap5\Html;

?>

<div class="card" style="width: 18rem;">
    <?= Html::a('<img src="/uploads/' . ($model->photo ?? $model::NO_PHOTO) . '" class="card-img-top" alt="...">', ['view', 'id' => $model->id]); ?>
    <div class="card-body">
        <?= Html::a("<h4 class=\"card-title\">$model->title</h4>", ['view', 'id' => $model->id], ['class' => 'text-decoration-none']);  ?>
        <p class="card-text"><?= $model->description ?></p>
        <div class="d-flex justify-content-between align-items-end mb-3">
            <div class="card-text fs-4 fw-semibold"><?= $model->price ?> ₽</div>
            <div>
                <?=$model->count?> шт.
            </div>
        </div>
        <?= Html::a('Подробнее...', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']); ?>
    </div>
</div>