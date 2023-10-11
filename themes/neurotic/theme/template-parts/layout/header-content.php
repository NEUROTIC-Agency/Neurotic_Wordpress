<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neurotic
 */

?>
<?php include get_template_directory() . '/template-parts/content/contact_modal.php' ?>
<?php include get_template_directory() . '/template-parts/content/specialist_modal.php' ?>
<header id="masthead" class="sticky overflow-hidden z-30 top-0 p-6 bg-white border-gray-200 <?php echo is_home() ? '' : 'border-b' ?>">
	<div class="flex items-center justify-between">
		<a href="/">
			<div class="flex items-center space-x-2 text-lg text-black">
				<img src='<?php echo get_template_directory_uri() . '/images/tomega.svg' ?>' class="w-8 mb-0" />
				<div class="flex flex-col">
					<h2 class="mb-1 text-2xl font-medium leading-none lowercase">Tomega</h2>
					<p class="leading-none uppercase" style="font-size:10px">by Neurotic</p>
				</div>
			</div>
		</a>
		<button id="button-open">
			<img src="<?php echo get_template_directory_uri() . '/images/menu-button-open.svg'; ?>" alt="Open" class="openSvg">
		</button>
	</div>
	<div id="sidebar-background" class="fixed top-0 left-0 right-0 z-10 hidden w-full h-screen bg-black/30">
	</div>
	<nav id="site-navigation" aria-expanded="false" aria-label="<?php esc_attr_e('Main Navigation', 'neurotic'); ?>" class="absolute top-0 z-10 flex flex-col h-screen p-6 duration-300 ease-in bg-white shadow-xl -right-96 w-96">
		<div class="flex justify-end">
			<button aria-controls="primary-menu" aria-expanded="false" id="button-close">
				<img src="<?php echo get_template_directory_uri() . '/images/menu-button-close.svg'; ?>" alt="Close">
			</button>
		</div>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
		<div class="flex flex-col justify-end h-full">
			<div class="flex flex-col space-y-3">
				<a href="mailto:hello@tomega.co.uk" class="hover:underline">hello@tomega.co.uk</a>
				<a href="tel:+44 746 423 6371" class="hover:underline">+44 746 423 6371</a>
				<button type="button" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 w-full">Get a Free Quote</button>
			</div>
		</div>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->
