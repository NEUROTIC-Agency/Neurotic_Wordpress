<?php

/* Template Name: Pure text page */

get_header();
?>

<section id="primary">
  <main id="main">

    <?php
    /* Start the Loop */
    while (have_posts()) :
      the_post();
    ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="px-4 mt-10 mb-10 md:mt-20 md:px-16 entry-header">
          <div class="flex items-center mb-4 space-x-4 text-sm font-medium">
            <a href="/" class="flex gray-700 hover:underline"><?php require get_template_directory() . '/images/home.svg' ?><span class="ml-4">Home</span></a>
            <span class="text-gray-400"><?php require get_template_directory() . '/images/chevron-right.svg' ?></span>
            <p class="text-gray-500"><?php the_title() ?></p>
          </div>
          <div>
            <h1 class="text-4xl font-black text-black md:text-6xl <?php echo has_excerpt() ? 'mb-4 md:mb-7' : 'md:mb-0' ?>"><?php the_title() ?></h1>
            <?php if (has_excerpt()) { ?>
              <p class="max-w-4xl text-xl text-gray-500"><?php echo get_the_excerpt() ?></p>
            <?php } ?>
          </div>
        </header><!-- .entry-header -->
        <hr class="mx-4 md:mx-16">
        <div class="flex px-4 md:px-16">
          <div <?php neurotic_content_class('entry-content py-10 w-full md:w-auto'); ?>>
            <?php
            the_content(
              sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers. */
                  __('Continue reading<span class="sr-only"> "%s"</span>', 'neurotic'),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                get_the_title()
              )
            );
            ?>
          </div><!-- .entry-content -->
        </div>

      </article><!-- #post-${ID} -->
    <?php

      if (is_singular('post')) {
        // Previous/next post navigation.
        the_post_navigation(
          array(
            'next_text' => '<span aria-hidden="true">' . __('Next Post', 'neurotic') . '</span> ' .
              '<span class="sr-only">' . __('Next post:', 'neurotic') . '</span> <br/>' .
              '<span>%title</span>',
            'prev_text' => '<span aria-hidden="true">' . __('Previous Post', 'neurotic') . '</span> ' .
              '<span class="sr-only">' . __('Previous post:', 'neurotic') . '</span> <br/>' .
              '<span>%title</span>',
          )
        );
      }

      // If comments are open, or we have at least one comment, load
      // the comment template.
      if (comments_open() || get_comments_number()) {
        comments_template();
      }

    // End the loop.
    endwhile;
    ?>

  </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
