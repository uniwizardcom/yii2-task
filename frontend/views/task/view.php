<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserFrontend;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['label' => 'Kategoria', 'value' => Categories::findOne(['id' => $model->category_id])->name ],
            ['label' => 'Użytkownik', 'value' => UserFrontend::findOne(['id' => $model->user_id])->username ],
            'name',
            ['label' => 'Zadanie wykonane', 'value' => (($model->status==1) ?'Tak':'Nie')],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
