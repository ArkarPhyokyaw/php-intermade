<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>

<div class="container  ">
    <div class="row ">
        <div class="col-md-3">
            <div class="card shadow" style="height: 665px;">
                <div class="card-header">
                    <h2 class="text-center">Sidemenu</h2>
                </div>
                <div class="card-block" style="overflow-y: auto;">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($data['cats'] as $cat): ?>
                            <li class="list-group-item rounded-0 d-flex justify-content-between align-items-center">
                                <span>
                                    <a href="#"><?php echo $cat->name; ?></a>
                                </span>
                                <span>
                                    <a href="<?php echo URLROOT."category/edit/".$cat->id?>"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="<?php echo URLROOT."category/deleted/".$cat->id ?>"><i class="fa fa-trash text-danger"></i></a>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7 offset-md-1 text-center">

            <?php echo flash("register_success") ?>
            <?php echo flash("login_fail");?>

            <form method="post" class=" border shadow px-3 pt-3 mt-5" action="<?php echo URLROOT."category/created";?>">
                <h1>Created Category</h1>
                <div class="form-group">
                    <div class="text-left">
                        <label for="name">Created Category</label>
                    </div>
                    <input type="text" class="form-control <?php echo !empty($data['name_err']) ? "is-invalid" : ''; ?>" id="name" name="name">
                    <span class="text-danger"><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                </div>
                <div class="row justify-content-end mt-3 mb-3 p-3">
                    <div>
                        <button class="btn btn-outline-secondary">Cancel</button>
                        <button class="btn btn-primary">Created</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
