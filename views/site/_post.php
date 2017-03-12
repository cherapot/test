<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
?>
<div class="post row">

    <div class="content col-md-12">

        <h2> <?= Html::encode($model->title) ?> </h2>
        <p> <?= Html::encode($model->post) ?> </p>

    

        <div class="form-group">
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            
            <!-- Либо кнопку 'Delete' можно обернуть в форму и сделать невидимое поле с name = 'id' и value = $model->id. Затем исправить actonDelete, чтобы он использовал id из post request -->

            <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= $this->context->action->id != 'view' ? Html::a('View', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) : '' ?>
        </div>

    

    </div>

</div><!-- post -->