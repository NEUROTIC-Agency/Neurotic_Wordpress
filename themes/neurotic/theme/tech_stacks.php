<?php

/* Template Name: Tech stacks page */

get_header();
?>
<section id="primary">
  <main id="main">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="px-4 pb-10 mt-10 md:mt-20 md:px-16 entry-header">
          <div class="flex items-center mb-4 space-x-4 text-sm font-medium">
            <a href="/" class="flex gray-700 hover:underline"><?php require get_template_directory() . '/images/home.svg' ?><span class="ml-4">Home</span></a>
            <span class="text-gray-400"><?php require get_template_directory() . '/images/chevron-right.svg' ?></span>
            <p class="text-gray-500">Technologies</p>
          </div>
          <?php the_title('<h1 class="mb-4 text-4xl font-black text-black md:text-6xl md:mb-7">', '</h1>'); ?>
          <p class="max-w-4xl mb-5 text-xl text-gray-500"><?php echo get_the_excerpt() ?></p>
          <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Get a quote</button>
        </header><!-- .entry-header -->
        <hr class="mx-4 md:mx-16">
        <div class="px-4 md:px-16">
          <div class="grid w-full gap-4 py-10 mb-3 md:mb-20 lg:grid-cols-2 2xl:grid-cols-3 md:w-auto md:gap-9">
            <?php
            $techs = get_posts(array(
              'post_type' => 'tech',
              'posts_per_page' => -1,
              'orderby' => 'order', // Sort by numeric value
              'order' => 'ASC', // Order in ascending order'
            ));

            foreach ($techs as $tech) {
              $excerpt = get_the_excerpt($tech);
              $thumbnail = get_the_post_thumbnail_url($tech, 'medium');
              $title = get_the_title($tech);
              $url = get_permalink($tech);
              $bg_color = get_field('tech_color', $tech->ID);

              require get_template_directory() . '/template-parts/content/tech-card.php';
            }
            ?>
          </div><!-- .entry-content -->
        </div>

      </article><!-- #post-${ID} -->
    <?php
      // If comments are open, or we have at least one comment, load  the comment template.
      if (comments_open() || get_comments_number()) {
        comments_template();
      }
    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer();
