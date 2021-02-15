<!DOCTYPE html>
<html>

<head>
    <title><?php $this->title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->addMainTplCSSName([
        'bootstrap.min',
        'jquery-ui',
        'bootstrap.min',
        'switchery.min',
        'style',
        'feather',
        'icofont',
        'select2.min',
        'bootstrap-datetimepicker',
        'component',
        'jquery.mCustomScrollbar'

    ]); ?>
    <?php $this->addMainTplCSSName('/'); ?>
    <?php $this->addMainTplJSName('jquery', true); ?>
    <?php $this->addMainTplJSName('jquery-ui'); ?>
    <?php $this->addMainTplJSName('switchery.min'); ?>
    <?php $this->addMainTplJSName('vendors/popper.js/js/popper.min'); ?>
    <?php $this->addMainTplJSName('vendors/bootstrap/bootstrap.min'); ?>
    <?php $this->addMainTplJSName('vendors/jquery-slimscroll/js/jquery.slimscroll'); ?>
    <?php $this->addMainTplJSName('vendors/modernizr/js/modernizr'); ?>
    <?php $this->addMainTplJSName('vendors/select2/js/select2.full.min'); ?>
    <?php $this->addMainTplJSName('vendors/bootstrap-multiselect/js/bootstrap-multiselect'); ?>
    <?php $this->addMainTplJSName('vendors/multiselect/js/jquery.multi-select'); ?>
    <?php $this->addMainTplJSName('jquery.mCustomScrollbar.concat.min'); ?>
    <?php $this->addMainTplJSName('SmoothScroll'); ?>
    <?php $this->addMainTplJSName('pcoded.min'); ?>
    <?php $this->addMainTplJSName('vartical-layout.min'); ?>
    <?php $this->addMainTplJSName('script'); ?>


    <?php $this->onDemandTplJSName([
        'vendors/photoswipe/photoswipe.min'
    ]); ?>
    <?php $this->onDemandTplCSSName([
        'photoswipe'
    ]); ?>
    <?php $this->addMainTplJSName('core'); ?>
    <?php $this->addMainTplJSName('modal'); ?>
    <?php $this->addMainTplJSName('select2-custom'); ?>
    <?php $this->head(true, false, true); ?>
    <meta name="csrf-token" content="<?php echo cmsForm::getCSRFToken(); ?>" />
    <meta name="generator" content="My Bux Corp" />

</head>

<body id="<?php echo $device_type; ?>_device_type">
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- end start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="/">
                            <img class="img-fluid" src="/templates/ty/images/logo.png" alt="Bosh sahifa">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <?php if ($this->hasWidgetsOn('header1')) { ?>
                            <?php $this->widgets('header1'); ?>
                        <?php } ?>
                        <?php if ($this->hasWidgetsOn('header2')) { ?>
                            <?php $this->widgets('header2'); ?>
                        <?php } ?>
                    </div>

                </div>
            </nav>
            <!-- end nav -->

            <!-- main start -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php if ($this->hasWidgetsOn('sidebar')) { ?>
                        <nav class="pcoded-navbar">
                            <div class="pcoded-inner-navbar main-menu">
                                <?php $this->widgets('sidebar'); ?>
                            </div>
                        </nav>
                    <?php } ?>
                    <?php if ($this->isBody()) { ?>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <!-- Main-body start -->
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <?php $this->breadcrumbs(array('strip_last' => false)); ?>
                                        <?php $this->block('before_body'); ?>
                                        <?php $this->body(); ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- main end -->

        </div>
    </div>



    <?php $this->printJavascriptTags(); ?>
    <?php $this->bottom(); ?>
    <?php $this->onDemandPrint(); ?>


</body>

</html>