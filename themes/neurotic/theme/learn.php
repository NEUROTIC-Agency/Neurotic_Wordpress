<?php

/* Template Name: Learn page */

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
            <p class="text-gray-500"><?php the_title() ?></p>
          </div>
          <?php the_title('<h1 class="mb-4 text-4xl font-black text-black md:text-6xl md:mb-7">', '</h1>'); ?>
          <p class="max-w-4xl mb-5 text-xl text-gray-500"><?php echo get_the_excerpt() ?></p>
          <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Get a quote</button>
        </header><!-- .entry-header -->
        <hr class="mx-4 md:mx-16">
        <div class="px-4 md:px-16">
          <?php require get_template_directory() . '/template-parts/content/search.php' ?>
          <?php
          $search_query = isset($_GET['learn']) ? sanitize_text_field($_GET['learn']) : '';

          $args = array(
            'post_type' => 'knowledge',
            'posts_per_page' => -1,
            's' => $search_query,
          );

          $knowledge_query = new WP_Query($args);

          if ($knowledge_query->have_posts()) {
            echo '<div class="grid w-full gap-4 py-10 mb-3 md:mb-20 md:grid-cols-2 xl:grid-cols-3 md:w-auto md:gap-9">';
            while ($knowledge_query->have_posts()) {
              $knowledge_query->the_post();
              $excerpt = get_the_excerpt();
              $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              $title = get_the_title();
              $url = get_permalink();

              require get_template_directory() . '/template-parts/content/knowledge-card.php';
            }
            echo '</div>';
          } elseif ($search_query !== '') {
            echo '<div class="py-16 my-10 border border-gray-300 border-dashed rounded-lg"><p class="text-center text-gray-500">No results</p></div>';
          } else {
            // Show all knowledge posts
            echo '<div class="grid w-full gap-4 py-10 md:grid-cols-2 xl:grid-cols-3 md:w-auto md:gap-9">';
            $knowledges = get_posts(array(
              'post_type' => 'knowledge',
              'posts_per_page' => -1,
            ));
            foreach ($knowledges as $knowledge) {
              $excerpt = get_the_excerpt($knowledge);
              $thumbnail = get_the_post_thumbnail_url($knowledge, 'medium');
              $title = get_the_title($knowledge);
              $url = get_permalink($knowledge);

              require get_template_directory() . '/template-parts/content/knowledge-card.php';
            }
            echo '</div>';
          }
          wp_reset_postdata();
          ?><!-- .entry-content -->
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
