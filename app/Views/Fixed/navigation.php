<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 align-self-center">
            <a href="#">
                <img src="app/assets/images/logo.png" alt="logo" />
            </a>
        </div>
        <div class="col-12 col-md-3 text-right align-self-center">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=carModels">Models</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <?php if (isset($_SESSION['user']))
                            echo $_SESSION['user']->first_name . " / " . $_SESSION['user']->roleName;
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid p-0 bg-darker">
    <nav class="navbar navbar-expand-lg navbar-light bg-darkest">
        <div class="col-12 col-sm-12 col-md-9 align-self-center">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="col-12 col-md-3 text-center align-self-center">
            <p class="my-md-4 header-links">
                <?php if (!isset($_SESSION['user'])) : ?>
                    <a href="index.php?page=login" class="px-1">Sign In</a>
                    <a href="index.php?page=register" class="px-4">Create Account</a>
                <?php endif; ?>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']->idRole === "1") :
                ?>
                    <a href="index.php?page=logout" class="px-1">Logout</a>
                <?php endif; ?>

                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']->idRole === "2") :
                ?>
                    <a href="index.php?page=crudCars" class="px-1">Admin/Cars</a>
                    <a href="index.php?page=addCars" class="px-1">Add Cars</a>
                    <a href="index.php?page=adminHome" class="px-1">Admin/Home</a>
                    <a href="index.php?page=logout" class="px-1">Logout</a>
                <?php endif; ?>
            </p>
        </div>
    </nav>
</div>