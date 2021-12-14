<?php get_header() ?>
<div class="banner">
	<?php $apply_link=get_field('apply'); 
	$company_logo=get_field('company_logo');?>
	<div class="container main__container">
		<h1 class="banner__title"><?php the_title() ?></h1>
		<div class="banner__description">
			<?php the_excerpt() ?>
		</div>
		<div class="banner__info-wrap">
			<a href="<?php echo $apply_link['url'] ?>" class="btn banner__btn"><?php echo $apply_link['title'] ?></a>
			<p class="banner__location"><?php echo get_field('location') ?></p>
			<div class="banner__icons">
				<?php $output = preg_match_all('/<img[^>]+>/i', get_field('technologies'), $result); 
				$img = array();
				foreach( $result[0] as $img_tag)
				{
				    preg_match_all('/(alt|src)=("[^"]*")/i', $img_tag, $img);
				    if($img[0]){
					    echo '<img '.$img[0][0].' '.$img[0][1].' class="banner__icon">';
					}
				} ?>
			</div>

			<img src="<?php echo $company_logo['url'] ?>" alt="<?php echo $company_logo['alt'] ?>" class="banner__logo">
		</div>
	</div>
</div>
<div class="container main__container">
	<?php the_content() ?>
	
</div>
<div class="pre-footer">
	<div class="container main__container">
		<div class="pre-footer__wrap">
			<p class="pre-footer__title"><?php echo get_field('title_pre') ?></p>
			<div class="pre-footer__social-links">
				<?php $links=get_field('social_links'); 
				foreach ($links as $link) {
					$url=$link["link"]["url"]?$link["link"]["url"]:"#!";
					$image=$link["icon"];
				 	echo '
				 	<a href="'.$url.'" class="pre-footer__social-link">
						<img src="'.$image["url"].'" alt="'.$image["alt"].'" class="pre-footer__icon">
					</a>
				 	';
				 } ?>
			
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>