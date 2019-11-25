<?php
require "includes/db.php";
require_once "includes/functions.php";
require "includes/language/Language.php";

require "includes/tpl/header.php";
?>


<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.php"><?php echo lang_Home?></a></li>
                <li class="active"><?php echo lang_Profile ?></li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--profile-starts-->

<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2><?php echo lang_Profile ?></h2>
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(!empty($errors)): ?>
                                    <div class="alert alert-danger">
                                        <?php echo array_shift($errors);?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                    <div class="profile-card">
                        <?php $_SESSION['logged_user']['img'] ? $avatar = $_SESSION['logged_user']['img'] : $avatar = 'default.png';?>
                        <div class="ava">
                            <img src='public/images/avatar/<?php echo $avatar ?>' alt='avatar'/>
                        </div>
                        <h1><?= htmlspecialchars($_SESSION['logged_user']['name']);?></h1>
                        <p class="profile-title">CEO & Founder, Example</p>
                        <a class="profile-a" href="#"><i class="fa fa-dribbble"></i></a>
                        <a class="profile-a" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="profile-a" href="#"><i class="fa fa-linkedin"></i></a>
                        <a class="profile-a" href="#"><i class="fa fa-facebook"></i></a>
                        <p><button class="profile-button">Contact</button></p>
                    </div>









                </div>
            </div>
        </div>
    </div>
</div>
<!--profile-end-->

<? require "includes/tpl/footer.php"; ?>

