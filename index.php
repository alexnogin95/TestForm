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
                <br class="product-one signup">
                    <div class="register-top heading">
                        <h2><?php echo lang_Home?></h2>
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

                    </br>
                    <?php if(!empty($_SESSION['logged_user'])): ?>
                        <span style="text-align: center;"><h2><?php echo lang_Welcome ?>, <?= htmlspecialchars($_SESSION['logged_user']['name']);?></h2></span>
                        <a href="profile.php" style="text-align: center;"><h2><?php echo lang_Profile ?></h2></a>
                        <a href="logout.php" style="text-align: center;"><h2><?php echo lang_Exit ?></h2></a>
                    <?php else: ?>
                        <a href="login.php" style="text-align: center;"><h2><?php echo lang_login?></h2></a>
                        <a href="signup.php" style="text-align: center;"><h2><?php echo lang_Signup?></h2></a>
                    <?php endif; ?>
                    </br>

                </div>
            </div>
        </div>
    </div>
</div>
<!--profile-end-->

<? require "includes/tpl/footer.php"; ?>

