<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package divertheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope"
         itemtype="http://schema.org/CreativeWork">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
	</header>
	<!-- .entry-header -->

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

	<div class="entry-bottom">
		<div class="row">
			<div class="col-sm-8">
				<?php the_tags( '<i class="fa fa-tags"></i> Tags: ', ', ' ); ?>
			</div>
			<div class="col-sm-4">
				<div class="share">
					<span><i class="fa fa-share-alt"></i> <?php echo __( 'Share: ', 'divertheme' ); ?></span>
					<span><a target="_blank"
					         href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i
								class="fa fa-facebook"></i></a></span>
					<span><a target="_blank"
					         href="http://twitter.com/share?text=<?php echo urlencode( the_title() ); ?>&url=<?php echo urlencode( the_permalink() ); ?>&via=twitter&related=<?php echo urlencode( "coderplus:Wordpress Tips, jQuery and more" ); ?>"><i
								class="fa fa-twitter"></i></a></span>
					<span><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink() ?>"><i
								class="fa fa-google-plus"></i></a></span>
				</div>
			</div>
		</div>
	</div>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'แก้ไข', 'divertheme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-footer -->
</article><!-- #post-## -->
