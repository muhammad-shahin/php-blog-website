<?php
include_once("Class/function.php");
$objBlogSiteAdmin = new BlogSiteAdmin();
if (isset($_POST['add_cat'])) {
 $addPostMsg = $objBlogSiteAdmin->add_cat($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- tailwind css cdn -->
 <script src="https://cdn.tailwindcss.com"></script>
 <title>Add Post - PHP Blog Website</title>
</head>

<body>
 <div class="w-full space-y-6 p-10">
  <h1 class="text-4xl">Add New Post</h1>
  <form action="" method="POST" class="space-y-6">

   <div class="flex flex-col max-w-lg">
    <label class="text-gray-700 font-medium text-lg">Category Name</label>
    <input type="text" name="cat_name" placeholder="Write Category Name" class="px-3 py-2 outline-blue-400 border-gray-300 placeholder:text-gray-500 border-2 rounded">
   </div>

   <div class="flex flex-col max-w-lg">
    <label class="text-gray-700 font-medium text-lg">Category Description</label>
    <input type="text" name="cat_desc" placeholder="Write Category Description" class="px-3 py-2 outline-blue-400 border-gray-300 placeholder:text-gray-500 border-2 rounded">
   </div>
   <p class="font-medium text-green-500"><?php if (isset($addPostMsg)) {
                                          echo $addPostMsg;
                                         } ?></p>
   <div class="flex flex-col max-w-lg">
    <input type="submit" name="add_cat" value="Add Category" class="px-3 py-2 bg-blue-500 border-gray-300 text-white border-2 rounded hover:bg-blue-700 duration-300 font-medium">
   </div>

  </form>
 </div>
</body>

</html>