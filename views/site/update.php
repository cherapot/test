<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Update a post';
?>
<div class="site-index">

                 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>   

    
</div>
