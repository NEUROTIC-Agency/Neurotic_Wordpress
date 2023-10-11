<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 w-fit">
  <ul class="flex flex-wrap -mb-px">
    <li class="mr-2">
      <a href="#" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">All</a>
    </li>
    <?php
    $posts = get_posts(array('post_type' => 'service', 'post_status' => 'publish', 'posts_per_page' => -1,));
    foreach ($posts as $post) {
      $service_category = get_field('service_category', $post->ID);
      $ids[] = $service_category;
    }
    foreach ($ids as $id) : ?>
      <li class="mr-2">
        <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"><?php echo get_cat_name($id); ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
