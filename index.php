<?php
include("admin/Class/function.php");
$objAdmin = new BlogSiteAdmin();
$categories = $objAdmin->display_cat();
// foreach ($categories as $category) {
//  echo "<pre>";
//  print_r($category['cat_name']);
//  echo "</pre>";
// }

?>


<?php
include_once("includes/head.php");
?>

<body>

 <!-- ***** Preloader Start ***** -->
 <?php
 include_once("includes/preloader.php");
 ?>
 <!-- ***** Preloader End ***** -->

 <!-- Header -->
 <?php
 include_once("includes/header.php");
 ?>

 <!-- Page Content -->
 <!-- Banner Starts Here -->
 <?php
 include_once("includes/banner.php");
 ?>
 <!-- Banner Ends Here -->

 <!-- call to action starts here -->
 <?php
 include_once("includes/cta.php");
 ?>

 <section class="blog-posts">
  <div class="container">
   <div class="row">
    <div class="col-lg-8">
     <!-- all blog post starts here -->
     <?php
     include_once("includes/blogpost.php");
     ?>
     <!-- all blog post ends here -->
    </div>
    <div class="col-lg-4">
     <!-- sidebar -->
     <?php
     include_once("includes/sidebar.php");
     ?>
    </div>
   </div>
  </div>
 </section>

 <!-- footer -->
 <?php
 include_once("includes/footer.php");
 ?>

 <!-- all scripts -->
 <?php
 include_once("includes/scripts.php");
 ?>

</body>

</html>