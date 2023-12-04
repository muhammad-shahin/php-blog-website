<?php
include_once("Class/function.php");
$objBlogSiteAdmin = new BlogSiteAdmin();


$allCategories = $objBlogSiteAdmin->all_category();
echo "<pre>";
print_r($allCategories);
echo "</pre>";
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
  <h1 class="text-4xl text-center">Manage All Category</h1>

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
         <a href="edit.php?status=edit&&id=<?php echo $category['cat_id'] ?>"><button class="px-5 py-2 bg-green-500 text-white rounded">Edit</button></a>
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