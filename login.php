<?PHP include 'inc/header.php';     ?>

<?PHP include 'inc/navbar.php';     ?>
<?PHP
if (checkIsLogin()) {
    header("Location: home.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center" style="background-color: burlywood;">Login</h2>

            <form action="actions/login.php" method="post">

                <div class="mb-3">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group my-1 p-2">
                    <input type="submit" name="submit" class="form-control" style="background-color:cornflowerblue"></input>
                </div>
            </form>
        </div>
    </div>
</div>


<?PHP include 'inc/footer.php';     ?>