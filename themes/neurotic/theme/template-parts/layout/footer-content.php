<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neurotic
 */

?>

<footer id="colophon">
	<section class="px-4 pt-20 bg-blue-600 md:px-16 pb-36">
		<h4 class="mb-4 text-3xl font-extrabold text-center text-white md:mb-2 md:text-4xl">Sign Up To Our Newsletter</h4>
		<p class="max-w-4xl mx-auto mb-6 text-lg text-center text-white md:text-xl">We specialize in bringing together top-tier tech talent, fostering an environment of collaboration, innovation, and resilience. Build a powerhouse tech team ready to take on any challenge.</p>
		<?php include get_template_directory() . '/template-parts/content/newsletter-form.php' ?>
	</section>
	<?php if (has_nav_menu('menu-2')) : ?>
		<nav aria-label=" <?php esc_attr_e('Footer Menu', 'neurotic'); ?>" class="flex flex-col px-4 py-14 md:flex-row md:p-24">
			<div class="mb-6 md:w-1/4 md:mr-24 lg:mr-36 xl:mr-56 md:mb-0">
				<div class="flex items-center mb-6 space-x-2 text-lg text-black">
					<img src='<?php echo get_template_directory_uri() . '/images/tomega.svg' ?>' class="w-8 mb-0" />
					<div class="flex flex-col">
						<h2 class="mb-1 text-2xl font-medium leading-none lowercase">Tomega</h2>
						<p class="leading-none uppercase" style="font-size:10px">by Neurotic</p>
					</div>
				</div>
				<p class="text-gray-500">We are a technology and design partner for small to medium sized recruitment companies.</p>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_class'     => 'footer-menu',
					'depth'          => 2,
				)
			);
			?>
		</nav>
	<?php endif; ?>
	<hr class="mx-4 md:mx-16">
	<div class="flex flex-col items-center justify-center px-4 text-sm text-gray-500 md:text-base my-14 md:flex-row">
		<p><a href="https://www.neurotic.co/" target="_blank" class="text-blue-700 hover:underline hover:text-blue-600">NEUROTIC</a> Ltd All Rights Reserved.&nbsp;</p>
		<p>Company number 11547128 from England and Wales</p>
	</div>
</footer><!-- #colophon -->
