<?php include("helpers/auth.php") ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <?php if (checkIsLogin()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
                <?php if (checkIsLogin()) { ?>
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" href="logout.php">
                            <div>
                                <i class="fas fa-globe-americas fa-lg mb-1"></i>
                            </div>
                            Logout
                        </a>
                    </li>
                <?php } else { ?>

                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" href="register.php">
                            <div>
                                <i class="fas fa-bell fa-lg mb-1"></i>
                            </div>
                            Register
                        </a>
                    </li>
                    <li class="nav-item text-center mx-2 mx-lg-1">
                        <a class="nav-link" href="login.php">
                            <div>
                                <i class="fas fa-globe-americas fa-lg mb-1"></i>
                            </div>
                            Login
                        </a>
                    </li>
                <?php } ?>
            </ul>




        </div>
    </div>
</nav>