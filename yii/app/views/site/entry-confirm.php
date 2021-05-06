
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Dices</label>: <?= Html::encode($model->dice) ?></li>
</ul>




<!--
<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->emails) ?></li>
    <li><label>Test</label>: <?= Html::encode($model->hidden1) ?></li>
</ul>


<div class="site-game21">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'emails') ?>

    <?= $form->field($model, 'hidden1')->hiddenInput(['value'=> "hello"])->label(false); ?>
    
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        
    </div>

<?php ActiveForm::end(); ?>