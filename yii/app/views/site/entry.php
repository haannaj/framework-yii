<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Game 21';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-game21">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php if ($model->dice == null ) : ?>
        
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'dice')->label("Enter how many dices you want to play with") ?>
            <?= $form->field($model, 'PP')->hiddenInput(['value'=> 0])->label(false); ?>
            <?= $form->field($model, 'CP')->hiddenInput(['value'=> 0])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    <?php else :?>
        <?php if ($gameOverMessage == "" && $model->stop == null) : ?>
            <p>Your dices rolled:</p>
            <h2><?= $message; ?></h2>
            <p>Total sum of dices: <b><?= $totalDices ?></b></p><br>

            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'dice')->hiddenInput(['value'=> $model->dice])->label(false); ?>
                <?= $form->field($model, 'summa')->hiddenInput(['value'=> $totalDices])->label(false); ?>
                <?= $form->field($model, 'PP')->hiddenInput(['value'=> $model->PP])->label(false); ?>
                <?= $form->field($model, 'CP')->hiddenInput(['value'=> $model->CP])->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Roll', ['class' => 'btn btn-primary']) ?>               
                </div>
            <?php ActiveForm::end(); ?>

            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'dice')->hiddenInput(['value'=> $model->dice])->label(false); ?>
                <?= $form->field($model, 'summa')->hiddenInput(['value'=> $totalDices])->label(false); ?>
                <?= $form->field($model, 'stop')->hiddenInput(['value'=> "stop"])->label(false); ?>
                <?= $form->field($model, 'PP')->hiddenInput(['value'=> $model->PP])->label(false); ?>
                <?= $form->field($model, 'CP')->hiddenInput(['value'=> $model->CP])->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Stop rolling', ['class' => 'btn btn-primary']) ?>               
                </div>
            <?php ActiveForm::end(); ?>
        
        <?php elseif ($model->stop == "stop" || $gameOverMessage !== "") :?>
            <h3><?= $pointsMessage; ?></h3>
            <br>
            <p>You got total: <b><?= $totalDices ?></b></p>
            <p>The computer got: <b><?= $computer ?></b></p>
            

        <?php endif; ?>
        <br><p>Players point: <b><?=$playerPoint?></b>  |  Computer point: <b><?=$computerPoint?></b></p><br><br>

        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'dice')->hiddenInput(['value'=> $model->dice])->label(false); ?>
            <?= $form->field($model, 'PP')->hiddenInput(['value'=> $playerPoint])->label(false); ?>
            <?= $form->field($model, 'CP')->hiddenInput(['value'=> $computerPoint])->label(false); ?>   
            <div class="form-group">
                <?= Html::submitButton('Start new round', ['class' => 'btn btn-primary']) ?>  
                         
            </div>
        <?php ActiveForm::end(); ?>
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                <?= Html::submitButton('Reset score', ['class' => 'btn btn-primary']) ?>               
            </div>
        <?php ActiveForm::end(); ?>
    <?php endif; ?>

    
</div>
