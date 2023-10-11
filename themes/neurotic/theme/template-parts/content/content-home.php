<?php

/**
 * Template part for displaying homepage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php neurotic_post_thumbnail(); ?>

  <section class="px-4 pt-5 md:pt-20 md:px-16 pb-28">
    <div class="grid grid-cols-4 grid-rows-2 mb-20 gap-9">
      <div class="col-span-4 row-span-1 lg:col-span-3">
        <button class="inline-flex items-center justify-between px-1 py-1 pr-4 mb-5 text-sm text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
          <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3 font-semibold">FREE</span><span class="mr-2 text-sm font-medium">Web Design Audit</span>
        </button>
        <h2 class="mb-5 text-4xl font-black text-black md:text-6xl"><?php echo get_field('cta') ?></h2>
        <p class="mb-6 text-xl text-gray-500"><?php echo get_field('cta_description') ?></p>
        <div>
          <a href="/services"><button type="button" class="text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Services</button></a>
          <a href="/contact-us"><button type="button" class="text-blue-700 bg-white border border-blue-700 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Contact us</button></a>
        </div>
      </div>
      <?php require get_template_directory() . '/template-parts/content/videos-banner.php' ?>
    </div>
    <p class="text-sm font-semibold text-center text-gray-500 mb-7 md:text-left">A FEW BELIEVERS</p>
    <div class="flex flex-wrap justify-center w-fit gap-9 md:justify-start">
      <?php $believer_brands = get_field('believer_brands');
      foreach ($believer_brands as $brand) { ?>
        <a href="<?php echo $brand['believer_url'] ?>" class="group" target="_blank">
          <img src="<?php echo $brand['believer_brand']; ?>" class="h-12 grayscale group-hover:grayscale-0">
        </a>
      <?php } ?>
    </div>
  </section>
  <section class="px-4 pt-20 md:px-16 bg-gray-50 pb-36" id="services">
    <h2 class="mb-2 text-4xl font-extrabold text-black"><?php echo get_field('services_section_title') ?></h2>
    <p class="mb-5 text-xl text-gray-500"><?php echo get_field('services_section_description') ?></p>
    <div class="mb-11">
      <a href="/services"><button type="button" class="text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">All services</button></a>
      <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button" class="text-blue-700 bg-white border border-blue-700 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Get a quote</button>
    </div>

    <div class="flex space-x-4 overflow-x-auto md:space-x-9 scroll-container">
      <?php
      $services = get_posts(array(
        'post_type' => 'service',
        'posts_per_page' => -1,
        'orderby' => 'order', // Sort by numeric value
        'order' => 'ASC', // Order in ascending order'
      ));

      foreach ($services as $service) {
        $excerpt = get_the_excerpt($service);
        $thumbnail = get_the_post_thumbnail_url($service, 'medium_large');
        $title = get_the_title($service);
        $url = get_permalink($service);
        $bg_color = get_field('service_color', $service->ID);

        require get_template_directory() . '/template-parts/content/service-card.php';
      }
      ?>
    </div>
  </section>
  <section class="px-4 pt-20 md:px-16 pb-36">
    <h4 class="mb-2 text-4xl font-extrabold text-center text-black"><?php echo get_field('technologies_section_title') ?></h4>
    <p class="max-w-4xl mx-auto mb-6 text-xl text-center text-gray-500"><?php echo get_field('technologies_section_description') ?></p>
    <div class="mx-auto mb-11 w-fit">
      <a href="/tech"><button type="button" class="text-white border border-blue-700 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">View All</button></a>
      <button data-modal-target="specialistModal" data-modal-toggle="specialistModal" type="button" class="text-blue-700 bg-white border border-blue-700 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Talk to a specialist</button>
    </div>
    <div class="grid gap-4 mx-auto lg:grid-cols-2 w-fit md:gap-9">
      <?php
      $techs = get_posts(array(
        'post_type' => 'tech',
        'posts_per_page' => 8,
        'orderby' => 'order', // Sort by numeric value
        'order' => 'ASC', // Order in ascending order'
      ));

      foreach ($techs as $tech) {
        $excerpt = get_the_excerpt($tech);
        $title = get_the_title($tech);
        $thumbnail = get_the_post_thumbnail_url($tech, 'medium_large');
        $url = get_permalink($tech);
        $bg_color = get_field('tech_color', $tech->ID);
        require get_template_directory() . '/template-parts/content/tech-card.php';
      }
      ?>
    </div>
  </section>
  <section class="px-4 pt-20 md:px-16 pb-28 bg-gray-50">
    <h4 class="mb-2 text-4xl font-extrabold text-center text-black"><?php echo get_field('team-building_section_title') ?></h4>
    <p class="max-w-4xl mx-auto mb-6 text-xl text-center text-gray-500"><?php echo get_field('team-building_section_description') ?></p>
    <div class="mx-auto mb-11 w-fit">
      <a href="/service/build-it-support-design-team/"><button type="button" class="text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Read more</button></a>
      <a href="/contact-us"><button type="button" class="text-blue-700 bg-white border border-blue-700 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Contact us</button></a>
    </div>
    <video autoplay playsinline muted loop class="w-full max-w-3xl mx-auto rounded-lg">
      <source src="<?php echo get_template_directory_uri() . '/images/footer_video.mp4' ?>" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </section>
  <section class="px-4 pt-20 md:px-16 pb-36">
    <h4 class="mb-2 text-4xl font-extrabold text-center text-black"><?php echo get_field('review_section_title') ?></h4>
    <p class="max-w-4xl mx-auto mb-12 text-xl text-center text-gray-500"><?php echo get_field('reviews_section_description') ?></p>
    <?php require get_template_directory() . '/template-parts/content/testimonials.php' ?>
  </section>

  <section class="px-4 pt-20 md:px-16 pb-36 bg-gray-50">
    <h4 class="mb-2 text-4xl font-extrabold text-center text-black"><?php echo get_field('knowledge_section_title') ?></h4>
    <p class="max-w-4xl mx-auto mb-6 text-xl text-center text-gray-500"><?php echo get_field('knowledge_section_description') ?></p>
    <div class="mx-auto mb-11 w-fit">
      <a href="/learn"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 border border-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">All Articles & Tutorials</button></a>
    </div>
    <div class="grid gap-4 mx-auto md:gap-9 md:grid-cols-2 lg:grid-cols-3 w-fit">
      <?php
      $knowledges = get_posts(array(
        'post_type' => 'knowledge',
        'posts_per_page' => 3,
      ));

      foreach ($knowledges as $knowledge) {
        $excerpt = get_the_excerpt($knowledge);
        $title = get_the_title($knowledge);
        $url = get_permalink($knowledge);
        require get_template_directory() . '/template-parts/content/knowledge-card.php';
      }
      ?>
    </div>
  </section>

  <div <?php neurotic_content_class('entry-content'); ?>>
    <?php
    the_content();

    wp_link_pages(
      array(
        'before' => '<div>' . __('Pages:', 'neurotic'),
        'after'  => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
