<?php
include_once("includes/template_head.php");
include('Class/function.php');
$objAdminLogout = new BlogSiteAdmin();
session_start();
$id = $_SESSION['adminID'];
if (!$id) {
    header("location:index.php");
}
if (isset($_GET['adminlogout'])) {
    if ($_GET['adminlogout'] == 'logout') {
        $objAdminLogout->admin_logout();
    }
}
?>


<body class="sb-nav-fixed">
    <?php include_once("includes/topnav.php") ?>
    <div id="layoutSidenav">
        <?php include_once("includes/sidenav.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php
                    if (isset($view)) {
                        if ($view == "dashboard") {
                            include("view/dash_view.php");
                        } elseif ($view == "manage post") {
                            include("view/manage_post_view.php");
                        } elseif ($view == "manage category") {
                            include("view/manage_cat_view.php");
                        } elseif ($view == "add post") {
                            include("view/add_post_view.php");
                        } elseif ($view == "add category") {
                            include("view/add_cat_view.php");
                        }
                    }
                    ?>
                </div>
            </main>
            <?php include_once("includes/footer.php") ?>
        </div>
    </div>
    <?php include_once("includes/template_script.php") ?>
</body>

</html>