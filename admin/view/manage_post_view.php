<?php
include_once("Class/function.php");
$objBlogSiteAdmin = new BlogSiteAdmin();


$allCategories = $objBlogSiteAdmin->all_category();


if (isset($_GET['status'])) {
 if ($_GET['status'] == "edit") {
  $edit_id = $_GET['id'];

  $edit_category;
  foreach ($allCategories as $category) {
   if ($category['cat_id'] == $edit_id) {
    $edit_category = $category;
   }
  };

  // update category
  if (isset($_POST['update_cat'])) {
   $update_status = $objBlogSiteAdmin->update_category($_POST);
   // echo "<pre>";
   // echo ($update_status);
   // echo "</pre>";
  }
 } elseif (isset($_GET['status'])) {
  if ($_GET['status'] == "delete") {
   $delete_id = $_GET['id'];
   $delete_status = $objBlogSiteAdmin->delete_category($delete_id);
  }
 }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- tailwind css cdn -->
 <script src="https://cdn.tailwindcss.com"></script>
 <title>Manage Category - PHP Blog Website</title>
</head>

<body>
 <div class="w-full space-y-6 p-10">
  <?php if (isset($edit_category)) {


  ?>
   <h2 class="text-4xl text-center">Edit Category for ID : <?php echo $edit_category['cat_id'] ?> </h2>
   <form action="" method="POST" class="space-y-6 w- mx-auto">

    <div class="flex flex-col w-full">
     <label class="text-gray-700 font-medium text-lg">Category ID</label>
     <input type="text" name="cat_id" value="<?php echo $edit_category['cat_id'] ?>" class="px-3 py-2 outline-blue-400 border-gray-300 placeholder:text-gray-500 border-2 rounded" readonly>
    </div>


    <div class="flex flex-col w-full">
     <label class="text-gray-700 font-medium text-lg">Category Name</label>
     <input type="text" name="u_cat_name" value="<?php echo $edit_category['cat_name'] ?>" class="px-3 py-2 outline-blue-400 border-gray-300 placeholder:text-gray-500 border-2 rounded">
    </div>

    <div class="flex flex-col w-full">
     <label class="text-gray-700 font-medium text-lg">Category Description</label>
     <input type="text" name="u_cat_desc" value="<?php echo $edit_category['cat_desc'] ?>" class="px-3 py-2 outline-blue-400 border-gray-300 placeholder:text-gray-500 border-2 rounded">
    </div>
    <div class="flex flex-col w-full">
     <input type="submit" name="update_cat" value="Update Category" class="px-3 py-2 bg-blue-500 border-gray-300 text-white border-2 rounded hover:bg-blue-700 duration-300 font-medium">
    </div>

   </form>
  <?php  } ?>
  <h1 class="text-4xl text-center">Manage All Category</h1>
  <!-- update success or error msg -->
  <?php if (isset($update_status) && $update_status === "Success") {
   echo ' <p class="font-medium text-xl text-center text-green-500">Edited Successfully</p>';
  } elseif (isset($update_status) && $update_status === "Failed") {
   echo ' <p class="font-medium text-xl text-center text-red-500">Failed To Update Category</p>';
  } ?>
  <!-- delete success or error msg -->
  <?php if (isset($delete_status) && $delete_status === "Success") {
   echo ' <p class="font-medium text-xl text-center text-green-500">Deleted Successfully</p>';
  } elseif (isset($delete_status) && $delete_status === "Failed") {
   echo ' <p class="font-medium text-xl text-center text-red-500">Failed To Delete Category</p>';
  } ?>

  <div class="p-10 rounded-md">
   <table class=" mx-auto">
    <thead>
     <tr class="bg-blue-500 text-2xl lg:text-xl text-white text-center">
      <td class="border border-gray-700 p-2">Category ID</td>
      <td class="border border-gray-700 p-2">Category Name</td>
      <td class="border border-gray-700 p-2">Category Description</td>
      <td class="border border-gray-700 p-2">Action</td>
     </tr>
    </thead>
    <tbody class="text-center bg-gray-100">
     <?php if (!empty($allCategories)) { ?>
      <?php foreach ($allCategories as $category) { ?>
       <tr class="border border-blue-500">
        <td class="border border-blue-500 p-2">
         <?php echo $category['cat_id'] ?>
        </td>
        <td class="border border-blue-500 p-2">
         <?php echo $category['cat_name'] ?>
        </td>
        <td class="border border-blue-500 p-2">
         <?php echo $category['cat_desc'] ?>
        </td>
        <td class="border border-blue-500 p-2 flex flex-wrap justify-center items-center gap-5">
         <a href="?status=edit&&id=<?php echo $category['cat_id'] ?>"><button class="px-5 py-2 bg-green-500 text-white rounded">Edit</button></a>
         <a href="?status=delete&&id=<?php echo $category['cat_id'] ?>"><button class="px-5 py-2 bg-red-500 text-white rounded">Delete</button></a>
        </td>
       </tr>
      <?php } ?>
     <?php } else { ?>
      <tr>
       <td colspan="4" class="text-center">No categories found</td>
      </tr>
     <?php } ?>

    </tbody>
   </table>
  </div>
 </div>
</body>

</html>