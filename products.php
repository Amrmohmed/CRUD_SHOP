<?php include('inc/header.php') ?>
<?php include('inc/navbar.php') ?>

<?php





$productsJson = file_get_contents("data/products.json");
$productsArr = json_decode($productsJson, true);

$userProducts = [];

foreach ($productsArr as $product) {
    if ($product['user_id'] == $_SESSION['user']['id']) {
        $userProducts[] = $product;
    }
}

?>
<a href="add-product.php" class="btn btn-primary">Add Products</a>

<div class="conatiner">
    <div class="row">
        <?php foreach ($userProducts as $product) { ?>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo 'uplouds/' . ($product['image']); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <p class="card-text"> <?php echo "$" . $product['price'] ?></p>
                        <a href="Edit-product.php?id=<?php echo $product['id'] ?>" class="btn btn-info ">Edit </a>
                        <a href="delete-product.php?id=<?php echo $product['id'] ?>" class="btn btn-danger ">Delete</a>

                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</div>

<?php include('inc/footer.php') ?>