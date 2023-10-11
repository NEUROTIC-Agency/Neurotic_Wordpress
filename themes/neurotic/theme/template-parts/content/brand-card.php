<!-- Previously, the outter div was an a tag with an href -->
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow sm:flex-row md:max-w-xl hover:cursor-default">
  <div class="flex items-center justify-center w-full h-full rounded-l-lg sm:border-b-8" style="border-color:<?php echo $brand_color ?>">
    <img class="object-cover h-auto rounded-t-lg w-36 sm:w-72 p-7" style="min-width: 192px" src="<?php echo $thumbnail ?>" alt="Brand thumbnail">
  </div>
  <div class="flex flex-col justify-between p-4 leading-normal border-t border-gray-200 rounded-b-lg sm:border-t-0">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $title ?></h5>
    <p class="font-normal text-gray-700"><?php echo $excerpt ?></p>
  </div>
</div>
