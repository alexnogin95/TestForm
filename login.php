<?php
require "includes/db.php";
include "includes/language/Language.php";

$data = $_POST;
if( isset($data['click_login']) ) {
    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ($user) {
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
            header('Location: profile.php');

        }
        else {
            $errors[] = lang_Password_incorrect;
        }
    }
    else {
        $errors[] = lang_User_not_found;
    }
}

require "includes/tpl/header.php";
?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.php"><?php echo lang_Home?></a></li>
                <li class="active"><?php echo lang_login ?></li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--login-starts-->

<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2><?php echo lang_login ?></h2>
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


                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="/login.php" id="signup" role="form">
                                <div class="form-group has-feedback">
                                    <label for="login"><?php echo lang_login_kilir?></label>
                                    <input type="text" name="login" class="form-control" id="login" value="<?php echo htmlspecialchars(@$data['login']);?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>


                                <div class="form-group has-feedback">
                                    <label for="pasword"><?php echo lang_Password?></label>
                                    <input type="password" name="password" class="form-control" id="pasword" value="<?php echo htmlspecialchars(@$data['password']);?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>


                                <button type="submit" name="click_login" class="btn btn-default"><?php echo lang_login?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--login-end-->
<? require "includes/tpl/footer.php"; ?>
