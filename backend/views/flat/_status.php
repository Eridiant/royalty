    <?php foreach ($models as $model): ?>
        <div class="status-item" data-status="<?= $model->status; ?>" data-id="<?= $model->id; ?>">
            <div class="status-flat">
                <p><?= $model->num; ?></p>
            </div>
            <div class="status-btn">
                <a href="#" class="status-free" data-status="0">free</a>
                <a href="#" class="status-sold" data-status="1">sold</a>
                <a href="#" class="status-resr" data-status="2">resr</a>
            </div>
        </div>
    <?php endforeach; ?>