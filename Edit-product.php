<?PHP include 'inc/header.php';     ?>
<?PHP include 'inc/navbar.php';     ?>

<?php

if (!isset($_GET['id'])) {
    header("Location: 404.php");
}

$id = $_GET['id'];

$allProduct = json_decode(file_get_contents("data/products.json"), true);
$editProduct = null;

foreach ($allProduct as $product) {
    if ($product['id'] == $id) {
        $editProduct = $product;
    }
}

if ($editProduct === null) {
    header("Location: 404.php");
}


$errors = [];


if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}



?>


<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center" style="background-color:chocolate;">Edit Product</h2>

            <form action="actions/edit-product.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $editProduct['id']; ?>">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $editProduct['name']; ?> ">

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $editProduct['price']; ?>">

                    </div>

                    <input type="submit" class="btn btn-primary" value="Edit Now" name="submit"></button>
            </form>
        </div>
    </div>
</div>



<?PHP include 'inc/footer.php';     ?>