<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Categories;
use app\models\UserFrontend;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Zadania');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Task'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['label' => 'Kategoria', 'value' => function($model){ return Categories::findOne(['id' => $model->category_id])->name;}],
            ['label' => 'Użytkownik', 'value' => function($model){ return UserFrontend::findOne(['id' => $model->user_id])->username;}],
            'name',
            ['label' => 'Zadanie wykonane', 'value' => function($model){ return (($model->status==1) ?'Tak':'Nie');}],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
