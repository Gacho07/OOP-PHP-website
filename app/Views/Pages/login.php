<div class="col-lg-6 py-5 mx-auto mb">

    <h2 class="py-2">Login form</h2>

    <form action="index.php?page=login" method="POST">
        <div class="form-group">
            <input type="text" name="tbEmail" class="form-control" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <input type="password" name="tbPassword" class="form-control" placeholder="Enter your password">
        </div>

        <input type="submit" value="Login" class="btn btn-success" name="btnLogin">
    </form>

    <?php
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        foreach($errors as $error) {
            echo $error . "<br/>";
        }
        unset($_SESSION['errors']);
    }
    ?>

    Don't have account? <a href="index.php?page=register" class="slide"> Register </a>

</div>