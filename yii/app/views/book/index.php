<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php foreach ($countries as $country): ?>
<table style="width:100%">
  <tr>
    <td><b><?= $country->title ?></b></td>
  </tr>
  <tr>
    <td>Author: <?= $country->author ?></td>
  </tr>
  <tr>
    <td>ISBN: <?= $country->isbn ?></td>
  </tr>
  <tr>
    <td><?php echo Html::img('@web/img/'. $country->image .'.jpeg') ?></td><br><br>
  </tr>
</table>
<?php endforeach; ?>
