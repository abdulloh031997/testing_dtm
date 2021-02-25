<div class="container-fluid">
    <div class="row">
        <?php

        use yii\helpers\Url;

        foreach ($data as $key => $one) : ?>
            <div class="col-sm-4">
                <a href="<?= Url::to(['dashboard/block']) ?>">
                    <div class="card">
                        <div class="card-block-small text-center">
                            <div class="font-weight-bold"><?= $one['name'] ?></div>
                            <br>
                            <i class="feather icon-file-text bg-info p-1">&nbsp; <?= $one->lang->name ?></i>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>