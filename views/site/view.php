<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Display post';
?>
<div class="site-index">

                    
    <?= $this->render('_post', [
        'model' => $model,
    ]) ?>
     
    
</div>
