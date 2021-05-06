<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Dice';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-message">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $message ?>
    </p>

    <p>You have entered the following information:</p>
        
        <ul>
            <li><label>Dices</label>: <?= Html::encode($model->dice) ?></li>
        </ul>
        <?php $form = ActiveForm::begin(); ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                
            </div>
        <?php ActiveForm::end(); ?>

</div>