<div class="container-fluid">
    <div class="row">
    <?php foreach ($edu as $key => $one):?>
        <div class="col-md-6 col-xl-4">
            <a href="">
                <div class="card widget-statstic-card">
                    <div class="card-header">
                        <div class="card-header-left">
                            <h5><?=$one['name_uz']?></h5>
                            <p class="p-t-10 m-b-0 text-c-blue">3 soat </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <i class="icofont icofont-mathematical-alt-1 st-icon bg-c-blue"></i>
                        <div class="text-left">
                            <h3 class="d-inline-block">180 </h3>
                            <i class="feather icon-arrow-up text-c-green f-30 "></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>