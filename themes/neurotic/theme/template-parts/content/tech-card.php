<a href="<?php echo $url ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:max-h-60 sm:flex-row md:max-w-xl hover:bg-gray-100">
  <div class="flex items-center w-full h-full rounded-t-lg sm:h-40 sm:w-40 md:h-48 md:w-48 sm:rounded-tr-none sm:rounded-l-lg" style="min-width: 192px; background:<?php echo $bg_color ?>">
    <img class="object-cover w-32 h-auto rounded-t-lg sm:w-full p-7" src="<?php echo $thumbnail ?>" alt="">
  </div>
  <div class="flex flex-col justify-between w-full p-4 leading-normal">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $title ?></h5>
    <?php
    $trimmed_excerpt = mb_substr($excerpt, 0, 115);
    if (mb_strlen($excerpt) > 115) {
      $trimmed_excerpt .= '...';
    }
    ?>
    <p class="font-normal text-gray-700"><?php echo $trimmed_excerpt; ?></p>
  </div>
</a>
