<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php require_once APPROOT . "/views/inc/nav.php"; ?>



<div class="container-fluid">
    <div class="container my-4">
        <div class="col-md-8 offset-md-2">
            <div class="card p-5 bg-custom shadow">
                <h1 class="text-center">Created a Post</h1>
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="drop">Post category</label>
                        <select class="form-control" id="drop">
                            <?php foreach ($data['cats'] as $cat):?>
                                <option value="<?php echo $cat->id?>"><?php echo $cat->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control <?php echo !empty($data['title_err']) ? "is-invalid" : ''; ?>" id="title" name="title">
                        <span class="text-danger"><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
                    </div>
                    

                    <div class="form-group">
                        <label for="desc">desc</label>
                        <textarea name="desc" id="desc"  rows="2" class="form-control <?php echo !empty($data['desc_err']) ? "is-invalid" : ''; ?>"></textarea>
                        <span class="text-danger"><?php echo !empty($data['desc_err']) ? $data['desc_err'] : ''; ?></span>
                    </div>
                    

                    <div class="form-group">
                            <label for="file" class="form-label">img uploads</label>
                            <input class="form-control" type="file" id="file" name="file">
                            <span class="text-danger"><?php echo !empty($data['file_err']) ? $data['file_err'] : ''; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="content">content</label>
                        <textarea name="content" id="content"  rows="4" class="form-control <?php echo !empty($data['file_err']) ? "is-invalid" : ''; ?>"></textarea>
                        <span class="text-danger"><?php echo !empty($data['content_err']) ? $data['content_err'] : ''; ?></span>
                    </div>

                    <div class=" justify-content-end ">
                        <div>
                            <button class="btn btn-outline-secondary">Cancel</button>
                            <button class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
