<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
 ?>
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
     <!-- Text Logo - Use this if you don't have a graphic logo -->
     <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->
     <!-- Image Logo -->
     <a class="navbar-brand logo-image text-dark" style="" href="/">
        <img src="/images/version.png"alt="alternative">
    </a>

     <!-- Mobile Menu Toggle Button -->
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-awesome fas fa-bars"></span>
         <span class="navbar-toggler-awesome fas fa-times"></span>
     </button>
     <!-- end of mobile menu toggle button -->

     <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <ul class="navbar-nav ml-auto">
             <li class="nav-item">
                 <a class="nav-link page-scroll" href="#header">Bosh sahifa <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link page-scroll" href="<?=Url::to(['/#services'])?>">Xizmatlar</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link page-scroll" href="<?=Url::to(['/'])?>">Malaka oshirish</a>
             </li>
             <?php if (Yii::$app->user->isGuest) :?>
             <li class="nav-item" style="margin-top: -10px;">
                <a class="btn-solid-reg" href="<?=Url::to(['/site/signup'])?>">Ro'yxatdan o'tish</a>
             </li>
            <?php else: ?>
              <!-- Dropdown Menu -->          
              <li class="nav-item dropdown" style="margin-top: -10px;">
                    <a class="dropdown-toggle btn-solid-reg text-light" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Kirish</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?=Url::to(['dashboard/index'])?>"><span class="item-text">Profile</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <?= Html::beginForm(\yii\helpers\Url::base(true) . '/site/logout', "POST");?>
                            <button type="submit" class="dropdown-item"><i class="icon-material-outline-power-settings-new"></i><span class="item-text">Log out</span></button>
                        <?= Html::endform();?>
                    </div>
                </li>
            <?php endif ?>
         </ul>
         
     </div>
 </nav> <!-- end of navbar -->
 <!-- end of navigation -->