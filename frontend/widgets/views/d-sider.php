<?php
    use yii\helpers\Url;
?>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Test</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="">
                        <a href="<?=Url::to(['dashboard/index/'])?>">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Bosh sahifa</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="icofont icofont-listing-number"></i></span>
                            <span class="pcoded-mtext">Fanlar</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?=Url::to(['dashboard/regions/'])?>">
                            <span class="pcoded-micon"><i class="icofont icofont-listing-number"></i></span>
                            <span class="pcoded-mtext">Test Yechish</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#">
                            <span class="pcoded-micon"><i class="icofont icofont-blood-test"></i></span>
                            <span class="pcoded-mtext">Yangi testlar</span>
                            <span class="pcoded-badge label label-warning">NEW</span>
                        </a>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                            <span class="pcoded-mtext">Ro'yxatdan o'tganalar </span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="widget-statistic.htm">
                                    <span class="pcoded-mtext">Pul to'laganlar</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="widget-data.htm">
                                    <span class="pcoded-mtext">Pul to'lamaganlar</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?=Url::to(['/dashboard/list'])?>">
                                    <span class="pcoded-mtext">Umumiy</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                            <span class="pcoded-mtext">Sozlamalar</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="<?=Url::to(['/role/index'])?>">
                                    <span class="pcoded-mtext">Role</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="widget-data.htm">
                                    <span class="pcoded-mtext">Users</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?=Url::to(['/dashboard/list'])?>">
                                    <span class="pcoded-mtext">Location</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
  