<?php
	/**
	 * Site footer.
	 */
	?>
<footer class="footer">
	<div class="container">
		<div class="row footer__top-container">
			<div class="footer__top-item footer__top-item--start">
				<?php dynamic_sidebar( 'footer_1' ); ?>
			</div>
			<div class="footer__top-item footer__top-item--mid">
				<?php dynamic_sidebar( 'footer_2' ); ?>
			</div>
			<div class="footer__top-item footer__top-item-end">
				<?php dynamic_sidebar( 'footer_3' ); ?>
			</div>
		</div>
		<div class="row footer__bottom">
			<div class="col-12 footer__bottom-container">
		  <?php dynamic_sidebar( 'footer_4' ); ?>
		  <?php if (have_rows('payments_methods', 'option')): ?>
					<ul class="payment-methods">
							<?php while (have_rows('payments_methods', 'option')):
									the_row(); ?>
									<li class="payment-methods__item" >
										<img src="<?php echo get_sub_field('payment_image')['url']; ?>" alt="<?php echo get_sub_field('payment_image')['name']; ?>" class="payment-methods__img">
									</li>
							<?php endwhile; ?>
					</ul>
		  <?php endif; ?>
		  <?php if (have_rows('footer_social_links', 'option')): ?>
						<ul class="footer__social-list social-list">
				<?php
					while (have_rows('footer_social_links', 'option')):
						the_row(); ?>
											<li class="social-list__item">
												<a href="<?php the_sub_field('hyper_link'); ?>" class="social-list__link" title="<?php the_sub_field('link_name'); ?>">
													<img src="<?php echo get_sub_field('link_icon')['url']; ?>" alt="<?php the_sub_field('link_name'); ?>" class="wp-block-social-list__img">
												</a>
											</li>
					<?php endwhile; ?>
						</ul>
		  <?php endif; ?>
			</div>

		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
