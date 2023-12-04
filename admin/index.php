<?php
include_once("includes/head.php");
include("Class/function.php");
$objAdmin = new BlogSiteAdmin();
if (isset($_POST['admin_login'])) {
    $loginMsg = $objAdmin->admin_login($_POST);
}
if (isset($_SESSION['adminID'])) {
    header("location:dashboard.php");
}
?>

<body class="bg-primary">
<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
<main>
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Login</h3>
            </div>
            <div class="card-body">
                <form class="" method="POST">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" type="email" name="admin_email" placeholder="Enter email address" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-4" id="inputPassword" type="password" name="admin_pass" placeholder="Enter password" />
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                            <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                        </div>
                    </div>
                    <p class="text-red-500"><?php if(isset($loginMsg) && $loginMsg !== true) {echo $loginMsg;} ?></p>      
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="password.html">Forgot Password?</a>
                        <input class="btn bg-[#007BFF] text-white" name="admin_login" value="Login" type="submit" />
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
</div>
<div id="layoutAuthentication_footer">
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid">
<div class="d-flex align-items-center justify-content-between small">
    <div class="text-muted">Copyright &copy; Your Website <?php echo date('Y') ?></div>
    <div>
        <a href="#">Privacy Policy</a>
        &middot;
        <a href="#">Terms &amp; Conditions</a>
    </div>
</div>
</div>
</footer>
</div>
</div>
<?php include_once("includes/script.php") ?>
</body>

</html>