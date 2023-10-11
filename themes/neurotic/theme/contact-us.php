<?php

/* Template Name: Contact us page */

get_header();
?>
<section id="primary">
  <main id=" main">
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="py-8 pb-24 bg-white lg:pt-12">
          <div class="px-4 mx-auto max-w-8xl lg:px-4">
            <div class="xl:mx-64 2xl:mx-80">
              <h1 class="mb-4 text-4xl font-bold text-gray-900 lg:font-extrabold lg:text-5xl lg:leading-none lg:text-center lg:mb-7">Contact us</h1>
              <p class="mb-10 text-lg font-normal text-gray-500 lg:text-center lg:text-xl">Let us know what you need and we will get back to you in no time.</p>
            </div>
          </div>
          <div class="px-4 mx-auto max-w-8xl lg:px-4">
            <div class="max-w-3xl p-4 mx-auto rounded-lg shadow-md border-gray-50 lg:p-8">
              <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
              <script>
                hbspt.forms.create({
                  region: "eu1",
                  portalId: "139782170",
                  formId: "88975625-38ef-4b1e-8d8e-e8e1f705eb54"
                });
              </script>
            </div>
          </div>
        </section>
      </article><!-- #post-<?php the_ID(); ?> -->
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
