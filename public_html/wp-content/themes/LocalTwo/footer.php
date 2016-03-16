<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package divertheme
 */
?>
<div class="bottom-wrapper">
	<?php if ( is_active_sidebar( 'footer' ) ) { ?>
		<footer <?php footer_class(); ?> role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<aside id="image_text_widget-2" class="widget widget_image_text_widget">
							<div class="widget-content">
								<img class="image-text-widget-image" src="<?php echo get_theme_mod('normal_logo_image', normal_logo_image); ?>" width="100%" height="auto" title="<?php echo bloginfo('blogname'); ?>" alt="">
								<div class="image-text-widget-text">
									ที่อยู่ <?php echo get_theme_mod('site_contact_address', site_contact_address); ?><br>โทรศัพท์ <?php echo get_theme_mod('site_contact_phone', site_contact_phone); ?><br>โทรสาร <?php echo get_theme_mod('site_contact_fax', site_contact_fax); ?>
								</div>
							</div>
						</aside>

						<?php dynamic_sidebar( 'footer' ); ?>
						<div class="social">
							<?php wp_nav_menu( array( 'theme_location' => 'social', 'fallback_cb' => false ) ); ?>
						</div>
					</div>
					<div class="col-md-3 footer-menu1">
						<?php dynamic_sidebar( 'footer2' ); ?>
					</div>
					<div class="col-md-3 footer-menu2">
						<?php dynamic_sidebar( 'footer3' ); ?>
					</div>
					<div class="col-md-3 footer-menu3">
						<?php dynamic_sidebar( 'footer4' ); ?>
					</div>
				</div>
			</div>
		</footer><!--/footer-->
	<?php } ?>
	<?php if ( get_theme_mod( 'footer_copyright_enable', footer_copyright_enable ) ) { ?>
		<div class="footer-copyright" id="text-left">
			<div class="container">
				<?php echo html_entity_decode( get_theme_mod( 'copyright_text', copyright_text ) . ' พัฒนาโดย <a href="http://www.diversition.co.th" target="_blank">บริษัท ไดเวอร์ซิชั่น จำกัด</a>' ); ?>
			</div>
		</div>
	<?php } ?>
</div>
</div><!--/#page-->
<?php if ( get_theme_mod( 'enable_back_to_top', enable_back_to_top ) ) { ?>
	<a class="scrollup"><i class="fa fa-angle-up"></i>กลับไปด้านบน</a>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
