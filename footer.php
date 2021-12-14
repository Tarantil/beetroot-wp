	</main>
	<footer class="footer">
		<div class="container footer__container">
			<div class="footer__items">
				<div class="footer__item">
					<p class="footer__title"><?php echo wp_get_nav_menu_name( 'footer_beetroot');  ?></p>		
					<?php wp_nav_menu( [
						'theme_location' => 'footer_beetroot',
						'container' => 'nav',
						'container_class' => 'footer__nav',
						'menu_class' => 'footer__menu'

					] ); ?>
				</div>
				<div class="footer__item">
					<p class="footer__title"><?php echo wp_get_nav_menu_name( 'footer_company');  ?></p>
					<?php wp_nav_menu( [
						'theme_location' => 'footer_company',
						'container' => 'nav',
						'container_class' => 'footer__nav',
						'menu_class' => 'footer__menu footer__menu_columns'

					] ); ?>
				</div>
				<div class="footer__item footer__item_width">
					<div class="footer__social-links">
						<?php 
						if( $social_links = wp_get_nav_menu_items('Social Links') ) {
							$social_list = '';
							foreach ( (array) $social_links as $key => $social_link ) {
								$title = $social_link->title;
								$url = $social_link->url; 
								$social_list .= '<a href="' . $url . '"  class="footer__social-link"><img src="'.get_field("icon",$social_link)["url"].'" alt="'.get_field("icon", $social_link)["alt"].'" class="pre-footer__icon"></a>';
							}
							echo $social_list;
						}
						?>
					</div>
					<div class="footer__subscribe">
						<p class="footer__title footer__title_yellow">subscribe to news</p>
						<form action="" id="subscribe" method="post">
							<div class="footer__form-wrap">
								<input name="email" id="email" type="email" placeholder="Email Address" class="footer__form-control" />
								<input type="submit" value="&#8594;"  class="footer__form-submit" >
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
	</body>
</html>

