<?php require_once APPROOT ."/views/inc/header.php";?>
<?php require_once APPROOT."/views/inc/nav.php";?>




<div class="container-fluid">
    <div class="container">
        <div class="btn button">
        <form action="<?php echo URLROOT . "post/created"; ?>"  method="post">
        <a href="<?php echo URLROOT . "post/created"; ?>">created</a>
        </form>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <?php foreach ($data['cats'] as $cat):?>
                        <li class="list-group-item"><a href="<?php echo URLROOT . "post/home/".$cat->id; ?>"><?php echo $cat->name ?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-md-8">
                <?php foreach ($data['posts'] as $post):?>
                    <div class="card mb-5">
                        <div class="card-header bg-dark text-white"><?php echo $post->title ?></div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $post->desc ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-success">Detail</button>
                            <div>
                                <button type="button" class="btn btn-secondary">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>






<?php require_once APPROOT ."/views/inc/footer.php";?>