<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="<?php echo URLROOT?>">
           <img src="<?php echo URLROOT . 'assets/imgs/logo.jpg' ?>"  width="30" height="30" class="rounded-circle" alt="">
           <span class="ml-3">Football</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <?php if( getUserSession() ): ?>
    <li class="nav-item active">
        <a class="nav-link text-white" href="<?php echo URLROOT.'admin/home'; ?>">Admin panel <span class="sr-only">(current)</span></a>
    </li>
<?php endif; ?>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?php if(getUserSession()!=false):?>
                        <?php echo getUserSession()->name ?>
                       <?php else:?>
                        member
                       <?php endif;?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if(getUserSession()!=false):?>
                        <a class="dropdown-item" href="<?php echo URLROOT."user/logout"?>">logout</a>
                    <?php else:?>
                        <a class="dropdown-item" href="<?php echo URLROOT."user/login"?>">login</a>
                        <a class="dropdown-item" href="<?php echo URLROOT."user/register"?>">register</a>
                    <?php endif;?>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
