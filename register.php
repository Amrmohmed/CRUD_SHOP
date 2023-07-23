<?PHP include 'inc/header.php';     ?>
<?PHP include 'inc/navbar.php';     ?>


<?php

if (checkIsLogin()) {
    header("Location: home.php");
}

$errors = [];
$old = [];


if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}

if (isset($_SESSION['old'])) {
    $old = $_SESSION['old'];
}


?>


<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center" style="background-color: burlywood;">Register</h2>

            <form action="actions/register.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" <?php if (isset($old['name'])) { ?> value="<?php echo ($old['name']); ?>" <?php } ?>>

                    <?php if (isset($errors['name'])  && !empty($errors['name'])) { ?>
                        <p class=" alert alert-danger text-center"> <?php echo ($errors['name']) ?></p>
                    <?php } ?>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" <?php if (isset($old['email'])) { ?> value="<?php echo ($old['email']); ?>" <?php } ?>>

                        <?php if (isset($errors['email'])  && !empty($errors['email'])) { ?>
                            <p class=" alert alert-danger text-center"> <?php echo ($errors['email']) ?></p>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" <?php if (isset($old['age'])) { ?> value="<?php echo ($old['age']); ?>" <?php } ?>>

                        <?php if (isset($errors['name'])  && !empty($errors['name'])) { ?>
                            <p class=" alert alert-danger text-center"> <?php echo ($errors['age']) ?></p>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">

                        <?php if (isset($errors['password'])  && !empty($errors['password'])) { ?>
                            <p class=" alert alert-danger text-center"> <?php echo ($errors['password']) ?></p>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Register" name="submit"></button>
            </form>

            <?php unset($_SESSION['errors']); ?>
        </div>
    </div>
</div>



<?PHP include 'inc/footer.php';     ?>