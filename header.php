<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header">
<div id="masthead">
<div id="site-title">

<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>
" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
<?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
</div>


<div id="site-description"><?php bloginfo( 'description'  ); ?></div>
<div id="site-logo"> <?php the_custom_logo(); ?></div>
<?php   
if ( $site_description && ( is_home() || is_front_page() ) ) {
	echo " | $site_description";
}
?>
	<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu.
 The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
<div class="header-navigation-wrapper">
			<?php
					if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
						?>


	<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'geekedtype' ); ?>" role="navigation">
			<ul class="primary-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'primary' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);

								} elseif ( ! has_nav_menu( 'expanded' ) ) {
									

									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => new geekedtype_Walker_Page(),
										)
									);

								}
								?>

								</ul>

</nav><!-- .primary-menu-wrapper -->
	<div class="header-toggles hide-no-js">
			<?php if ( has_nav_menu( 'expanded' ) ) { ?>

					<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e( 'Menu', 'geekedtype' ); ?></span>
										<span class="toggle-icon">
											<?php geekedtype_the_theme_svg( 'ellipsis' ); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->
					<?php
						}
						?>
		</div><!-- .header-toggles -->
					<?php
						}
						?>

</div><!-- .header-navigation-wrapper -->
 <?php
		// Output the menu modal.
?>
<div class="secondary-menu">

<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
<span class="toggle-text"><?php _e( 'Close Menu', 'geekedtype' ); ?></span>
					<?php //geekedtype_the_theme_svg( 'cross' ); ?>
				</button><!-- .nav-toggle -->

				<?php

				$mobile_menu_location = '';

				// If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
				if ( has_nav_menu( 'mobile' ) ) {
					$mobile_menu_location = 'mobile';
				} elseif ( has_nav_menu( 'primary' ) ) {
					$mobile_menu_location = 'primary';
				} elseif ( has_nav_menu( 'expanded' ) ) {
					$mobile_menu_location = 'expanded';
				}

				if ( has_nav_menu( 'expanded' ) ) {

					$expanded_nav_classes = '';

					if ( 'expanded' === $mobile_menu_location ) {
						$expanded_nav_classes .= ' mobile-menu';
					}

					?>

					<nav class="expanded-menu<?php echo esc_attr( $expanded_nav_classes ); ?>" aria-label="<?php esc_attr_e( 'Expanded', 'geekedtype' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">
							<?php
							if ( has_nav_menu( 'expanded' ) ) {
								wp_nav_menu(
									array(
										'container'      => '',
										'items_wrap'     => '%3$s',
										'show_toggles'   => true,
										'theme_location' => 'expanded',
									)
								);
							}
							?>
						</ul>

					</nav>

					<?php
				}

				if ( 'expanded' !== $mobile_menu_location ) {
					?>

					<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'geekedtype' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">

						<?php
						if ( $mobile_menu_location ) {

							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => $mobile_menu_location,
								)
							);

						} else {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_toggles'       => true,
									'title_li'           => false,
									'walker'             => new geekedtype_Walker_Page(),
								)
							);

						}
						?>

						</ul>

					</nav>

					<?php
				}
				?>

			</div><!-- .secondary-menu-->
					

</div><!--End of masthead--> 
</header>
<div id="container">
