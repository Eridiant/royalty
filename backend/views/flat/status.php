<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Статус квартир';
?>

<div class="floor-items" data-current="2">
    <?php foreach ($floors as $key => $floor): ?>
        <div class="floor-item<?= $key == 0 ? ' active' : '' ; ?>" data-floor="<?= $floor->floor; ?>">
            <?= $floor->floor; ?>
        </div>
    <?php endforeach; ?>
</div>

<div class="status-items">
    <?= $this->render('_status', compact('models')) ?>
</div>
