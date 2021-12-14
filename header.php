<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
	<header class="header">
		<div class="container header__container">
			<?php 
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				 
				if ( has_custom_logo() ) {
				    echo '<a class="header__logo" href="'.get_home_url().'"><img src="'.esc_url( $logo[0] ).'" alt="'.get_bloginfo( 'name' ).'"></a>';
				} else {
				   echo '<a href="'.get_home_url().'"><img src="'.get_template_directory_uri(). '/src/images/logo.png" alt="'.get_bloginfo( 'name' ).'"></a>';
				}
			?>
			<?php wp_nav_menu( [
				'theme_location' => 'header_menu',
				'container' => 'nav',
				'container_class' => 'header__nav',
				'menu_class' => 'header__menu'

			] ); ?>
		</div>	
	</header>
	<main class='main'>
	<?php wp_head(); ?>