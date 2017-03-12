<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $pagination yii\data\Pagination */

$this->title = 'Display all posts';
?>
<div class="site-index">

    <?= Html::a('Create', ['create'], ['class' => 'btn btn-primary']) ?>

    <?php foreach ($model as $post): ?>                   
        <?= $this->render('_post', [
            'model' => $post,
        ]) ?>
    <?php endforeach; ?>    

    <?= LinkPager::widget(['pagination' => $pagination]) ?> 
    
</div>
