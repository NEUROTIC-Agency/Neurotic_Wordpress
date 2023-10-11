<div class="grid max-w-4xl mx-auto mb-8 bg-white border border-gray-200 lg:mb-12 lg:grid-cols-2 testimonials rounded-xl">
  <?php
  $reviews = get_posts(array(
    'post_type' => 'review',
    'posts_per_page' => -1,
  ));

  foreach ($reviews as $index => $review) {
    $excerpt = get_the_excerpt($review);
    $thumbnail = get_the_post_thumbnail_url($review, 'medium');
    $title = get_the_title($review);
    $author = get_field('review_author', $review->ID);
    $author_role = get_field('review_author_role', $review->ID);
  ?>
    <figure class="flex flex-col items-center justify-center p-8 text-center md:p-12">
      <blockquote class="max-w-2xl mx-auto text-gray-500">
        <h3 class="text-lg font-semibold text-gray-900"><?php echo $title ?></h3>
        <p class="my-4"><?php echo $excerpt ?></p>
      </blockquote>
      <figcaption class="flex items-center justify-center space-x-3">
        <img class="rounded-full w-9 h-9" src="<?php echo $thumbnail ?>" alt="profile picture">
        <div class="space-y-0.5 font-medium text-left">
          <div><?php echo $author ?></div>
          <div class="text-sm font-light text-gray-500"><?php echo $author_role ?></div>
        </div>
      </figcaption>
    </figure>
  <?php } ?>
</div>
