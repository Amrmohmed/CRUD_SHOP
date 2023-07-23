<?PHP include 'inc/header.php';     ?>
<?PHP include 'inc/navbar.php';     ?>

<?php


$errors = [];


if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}



?>


<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center" style="background-color: burlywood;">Add Product</h2>

            <form action="actions/add-product.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" <?php if (isset($old['name'])) { ?> value="<?php echo ($old['name']); ?>" <?php } ?>>

                    <?php if (isset($errors['name'])  && !empty($errors['name'])) { ?>
                        <p class=" alert alert-danger text-center"> <?php echo ($errors['name']) ?></p>
                    <?php } ?>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" <?php if (isset($old['email'])) { ?> value="<?php echo ($old['email']); ?>" <?php } ?>>

                        <?php if (isset($errors['email'])  && !empty($errors['email'])) { ?>
                            <p class=" alert alert-danger text-center"> <?php echo ($errors['email']) ?></p>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">

                        <?php if (isset($errors['image'])  && !empty($errors['image'])) { ?>
                            <p class=" alert alert-danger text-center"> <?php echo ($errors['image']) ?></p>
                        <?php } ?>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Add Now" name="submit"></button>
            </form>

            <?php unset($_SESSION['errors']); ?>
        </div>
    </div>
</div>



<?PHP include 'inc/footer.php';     ?>