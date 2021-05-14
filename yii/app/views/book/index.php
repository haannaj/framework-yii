<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1><br>
<table id="books">
  <tr>
    <?php foreach ($countries as $country): ?>
      <td><b><?= $country->title ?></b></td>
    <?php endforeach; ?>
  </tr>
  <tr>
    <?php foreach ($countries as $country): ?>
      <td><?= $country->author ?></td>
    <?php endforeach; ?>
  </tr>
  <tr>
    <?php foreach ($countries as $country): ?>
      <td>ISBN: <?= $country->isbn ?></td>
    <?php endforeach; ?>
  </tr>
  <tr>
    <?php foreach ($countries as $country): ?>
      <td><?php echo Html::img('@web/img/'. $country->image .'.jpeg') ?></td>
    <?php endforeach; ?>
  </tr>
</table>