<?php require_once APPROOT ."/views/inc/header.php";?>
<?php require_once APPROOT."/views/inc/nav.php";?>


<div class="container-fluid">
    <div class="container my-4">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5 .bg-custom">
                <?php echo  flash("register_success") ?>
                <?php echo flash("login_fail");?>
                <h1 class="text-center ">Login to Post</h1>
                <form  method="post" action="<?php echo URLROOT."user/login";?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control <?php echo !empty($data['email_err']) ? "is-invalid" : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <span class="text-danger"><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control <?php echo !empty($data['password_err']) ? "is-invalid" : ''; ?>"id="password" name="password">
                        <span class="text-danger"><?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?></span>
                    </div>
                    <div class="row  justify-content-between no-gutters">
                        <a href="<?php echo URLROOT."user/register";?>">already register plz login</a>
                        <div>
                            <button class="btn btn-outline-sencondary">cancle</button>
                            <button class="btn btn-primary">login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<?php require_once APPROOT ."/views/inc/footer.php";?>