<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package divertheme
 */
$divertheme_page_layout_private = get_post_meta( get_the_ID(), "divertheme_page_layout_private", true );
$divertheme_header_top          = get_post_meta( get_the_ID(), "divertheme_header_top", true );
$divertheme_header_preset       = get_post_meta( get_the_ID(), "divertheme_header_preset", true );
$divertheme_color_scheme        = get_post_meta( get_the_ID(), "divertheme_color_scheme", true );
$divertheme_sticky_header       = get_post_meta( get_the_ID(), "divertheme_sticky_header", true );
$divertheme_custom_logo         = get_post_meta( get_the_ID(), "divertheme_custom_logo", true );
$divertheme_custom_class        = get_post_meta( get_the_ID(), "divertheme_custom_class", true );
$divertheme_bread_crumb_enable  = get_post_meta( get_the_ID(), "divertheme_bread_crumb_enable", true );
$divertheme_uncover_enable      = get_post_meta( get_the_ID(), "divertheme_uncover_enable", true );
$divertheme_disable_title       = get_post_meta( get_the_ID(), "divertheme_disable_title", true );
$divertheme_disable_parallax    = get_post_meta( get_the_ID(), "divertheme_disable_parallax", true );
$breadcrumb_home_text          = get_theme_mod( 'breadcrumb_home_text', 'Home' );
if ( $divertheme_page_layout_private != 'default' ) {
	$layout = get_post_meta( get_the_ID(), "divertheme_page_layout_private", true );
} else {
	$layout = get_theme_mod( 'site_layout', site_layout );
}
get_header(); ?>
<?php if ( $layout == 'full-width' ) { ?>
	<div class="content-wrapper">
		<main class="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope"
				         itemtype="http://schema.org/CreativeWork">
					<?php if ( ! get_post_meta( get_the_ID(), "divertheme_disable_title", true ) && get_post_meta( get_the_ID(), "divertheme_heading_image", true ) ) { ?>
						<header <?php if ( $divertheme_disable_parallax != 'on' ) { ?> data-stellar-background-ratio="0.5" <?php } ?>
							class="entry-header has-bg"
							style="background-image: url('<?php echo get_post_meta( get_the_ID(), "divertheme_heading_image", true ) ?>')">
							<div class="container">
								<?php if ( get_post_meta( get_the_ID(), "divertheme_alt_title", true ) ) { ?>
									<h1 class="entry-title"
									    itemprop="headline"><?php echo get_post_meta( get_the_ID(), "divertheme_alt_title", true ); ?>sss</h1>
								<?php } else { ?>
									<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
								<?php } ?>
								<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
									<div class="breadcrumb">
										<div class="container">
											<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</header>
					<?php } elseif ( ! get_post_meta( get_the_ID(), "divertheme_disable_title", true ) && ! get_post_meta( get_the_ID(), "divertheme_heading_image", true ) ) { ?>
						<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
							<div class="breadcrumb">
								<div class="container">
									<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
								</div>
							</div>
						<?php } ?>
						<header class="entry-header">
							<div class="container">
								<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
							</div>
						</header>
					<?php } elseif ( get_post_meta( get_the_ID(), "divertheme_disable_title", true ) ) { ?>
						<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
							<div class="breadcrumb">
								<div class="container">
									<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
							<div class="breadcrumb">
								<div class="container">
									<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
								</div>
							</div>
						<?php } ?>
						<div class="entry-header">
							<div class="container">
								<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
							</div>
						</div>
					<?php } ?>
					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'divertheme' ),
							'after'  => '</div>',
						) );
						?>
					</div>
				</article>
				<div class="container">
					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div>
			<?php endwhile; // end of the loop. ?>
		</main>
	</div>

<?php } else { ?>
	<div class="content-wrapper">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( ! get_post_meta( get_the_ID(), "divertheme_disable_title", true ) && get_post_meta( get_the_ID(), "divertheme_heading_image", true ) ) { ?>
				<div <?php if ( $divertheme_disable_parallax != 'on' ) { ?> data-stellar-background-ratio="0.5" <?php } ?>
					class="entry-header has-bg"
					style="background-image: url('<?php echo get_post_meta( get_the_ID(), "divertheme_heading_image", true ) ?>')">
					<div class="container">
						<?php if ( get_post_meta( get_the_ID(), "divertheme_alt_title", true ) ) { ?>
							<h1 class="entry-title"
							    itemprop="headline"><?php echo get_post_meta( get_the_ID(), "divertheme_alt_title", true ); ?></h1>
						<?php } else { ?>
							<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
						<?php } ?>
						<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
							<div class="breadcrumb">
								<div class="container">
									<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } elseif ( ! get_post_meta( get_the_ID(), "divertheme_disable_title", true ) && ! get_post_meta( get_the_ID(), "divertheme_heading_image", true ) ) { ?>
				<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
					<div class="breadcrumb">
						<div class="container">
							<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
						</div>
					</div>
				<?php } ?>
				<?php if(!is_front_page()) { ?>
				<div class="entry-header">
					<div class="container">
						<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
					</div>
				</div>
				<?php } ?>
			<?php } elseif ( get_post_meta( get_the_ID(), "divertheme_disable_title", true ) ) { ?>
				<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
					<div class="breadcrumb">
						<div class="container">
							<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
						</div>
					</div>
				<?php } ?>
			<?php } else { ?>
				<?php if ( function_exists( 'tm_bread_crumb' ) && $divertheme_bread_crumb_enable != 'disable' ) { ?>
					<div class="breadcrumb">
						<div class="container">
							<?php echo tm_bread_crumb( array( 'home_label' => $breadcrumb_home_text ) ); ?>
						</div>
					</div>
				<?php } ?>
				<div class="entry-header">
					<div class="container">
						<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
					</div>
				</div>
			<?php } ?>
		<?php endwhile; // end of the loop. ?>
		<div class="container">
			<div class="row">
				<?php if ( $layout == 'sidebar-content' ) { ?>
					<?php get_sidebar(); ?>
				<?php } ?>
				<?php if ( $layout == 'sidebar-content' || $layout == 'content-sidebar' ) { ?>
					<?php $class = 'col-md-9'; ?>
				<?php } else { ?>
					<?php $class = 'col-md-12'; ?>
				<?php } ?>
				<div class="<?php echo esc_attr( $class ); ?>">
					<main class="content" role="main" itemprop="mainContentOfPage">
						<?php while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope"
							         itemtype="http://schema.org/CreativeWork">
								<div class="entry-content" itemprop="text">
									<?php the_content(); ?>
									<?php
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'divertheme' ),
										'after'  => '</div>',
									) );
									?>
								</div>
								<!-- .entry-content -->

								<footer class="entry-footer">
									<?php edit_post_link( __( 'Edit', 'divertheme' ), '<span class="edit-link">', '</span>' ); ?>
								</footer>
								<!-- .entry-footer -->
							</article><!-- #post-## -->

							<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>

						<?php endwhile; // end of the loop. ?>
					</main>
				</div>
				<?php if ( $layout == 'content-sidebar' ) { ?>
					<?php get_sidebar(); ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>
