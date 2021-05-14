<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Highscore';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<br>
<table id="highscore">
    <tr>
        <th>Gamer</th>
        <th>Score</th>
        <th>Game</th>
    </tr>
    <?php foreach ($highscores as $HS): ?>
        <tr>
            <td><b><?= $HS->name ?></b></td>
            <td><?= $HS->score ?></td>
            <td><?= $HS->game ?></td>
        </tr>
    <?php endforeach; ?>
</table>
