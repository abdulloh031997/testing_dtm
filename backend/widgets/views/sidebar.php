<?php
$app = Yii::$app;

use yii\helpers\Url; ?>

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?= Url::to(['/']); ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Bosh sahifa</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['certificate/index']); ?>" class="waves-effect">
                        <i class=" ri-bookmark-2-fill"></i>
                        <span>Malaka oshirish</span>
                    </a>
                </li>
                <li>
                    <a href="<?= Url::to(['certificate/a-print']); ?>" target="_blank" class="waves-effect">
                        <i class=" ri-shield-star-line"></i>
                        <span>Sertifikat olganlar</span> <span><i class="ri-star-fill"></i></span>
                    </a>
                </li>
                
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-menu-2-fill"></i>
                        <span>Job</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= Url::to(['/job-category/index']); ?>">Job Categories</a></li>
                        <li><a href="<?= Url::to(['/job/index']); ?>">Job</a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-checkbox-multiple-blank-line"></i>
                        <span>Content</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= Url::to(['post-category/index']); ?>">Post Category</a></li>
                        <li><a href="<?= Url::to(['post/index']); ?>">Post</a></li>
                        <li><a href="<?= Url::to(['menu/index']); ?>">Menu</a></li>
                        <li><a href="<?= Url::to(['pages/index']); ?>">Pages</a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-folder-3-line"></i>
                        <span>Media</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= Url::to(['/media/files']); ?>">Files</a></li>
                        <li><a href="<?= Url::to(['/media/images/?view=grid']); ?>">Images</a></li>
                        <li><a href="<?= Url::to(['/media/uploads']); ?>">Uploads</a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-3-line"></i>
                        <span>System</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= Url::to('/settings/index') ?>">Settings</a></li>
                        <li><a href="<?= Url::to(['/languages/index']); ?>">Languages</a></li>
                        <li><a href="<?= Url::to(['/countries/index']); ?>">Countries</a></li>
                        <li><a href="<?= Url::to(['/region/index']); ?>">Regions</a></li>
                        <li><a href="<?= Url::to(['/district/index']); ?>">District</a></li>
                        <li><a href="<?= Url::to(['/role/index']); ?>">Role</a></li>
                        <li><a href="<?= Url::to(['/users/index']); ?>">User</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>