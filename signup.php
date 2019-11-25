<?php
require "includes/db.php";
require_once "includes/functions.php";
include "includes/language/Language.php";

$data = $_POST;
if( isset($data['click_signup']) ) {

    $errors = array();
    if( trim($data['login']) == '' ) {
        $errors[] = lang_Enter_login;
    }

    if( trim($data['email'])== '' ) {
        $errors[] = lang_Enter_email;
    }

    if(strlen($data['password']) < 6 ) {
        $errors[] = lang_Password_must_be;
    }

    if( trim($data['name'])== '' ) {
        $errors[] = lang_Enter_name;
    }

    if(R::count('users', "login = ?", array($data['login'])) > 0 ) {
        $errors[] = lang_User_with__login;
    }

    if(R::count('users', "email = ?", array($data['email'])) > 0 ) {
        $errors[] = lang_User_with__email;
    }

    if(empty($errors)) {
        $img_name = "";
        if ($_FILES["file"]["name"] != '') {
            if (isSecurity($_FILES["file"]) && ($_FILES["file"]["name"] != '')) $img_name = loadAvatar($_FILES["file"]);
            else $errors[] = lang_Error_loading;
        }
    }

    if(empty($errors)) {

        $user = R::dispense('users');
        $user->login = clean($data['login']);
        $user->email = clean($data['email']);
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->name = clean($data['name']);
        $user->img = $img_name;

        R::store($user);

        $_SESSION['logged_user'] = $user;
        header('Location: profile.php');

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
                    <li class="active"><?php echo lang_Signup ?></li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--register-starts-->

    <div class="prdt">
        <div class="container">
            <div class="prdt-top">
                <div class="col-md-12">
                    <div class="product-one signup">
                        <div class="register-top heading">
                            <h2><?php echo lang_Signup ?></h2>
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
                                <form method="post" action="/signup.php" id="signup" role="form" enctype="multipart/form-data">
                                    <div class="form-group has-feedback">
                                        <label for="login"><?php echo lang_login_kilir?></label>
                                        <input type="text" name="login" class="form-control" id="login" value="<?php echo htmlspecialchars(@$data['login']);?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="email"><?php echo lang_Email?></label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars(@$data['email']);?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="name"><?php echo lang_Name?></label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlspecialchars(@$data['name']);?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="password"><?php echo lang_Password?></label>
                                        <input type="password" name="password" class="form-control" id="password" value="<?php echo @$data['password'];?>" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="file"><?php echo lang_Avatar?></label>
                                        <input type="file" name="file" id="file" value="<?php echo @$_FILES["file"];?>">
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <button type="submit" name="click_signup" class="btn btn-default"><?php echo lang_Signup?></button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--register-end-->
<? require "includes/tpl/footer.php"; ?>