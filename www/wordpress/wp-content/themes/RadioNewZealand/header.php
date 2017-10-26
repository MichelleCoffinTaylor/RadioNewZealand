<!-- header.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Custom Wordpress Site</title>
	<!-- Adding in the header -->
	<?php wp_head(); ?>
</head>
<?php 
	if( is_front_page() ){
		$bodyClass = array('my-body', 'front-page');
	} else {
		$bodyClass = array('my-body');
	}
	function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
?>
<body <?php body_class($bodyClass); ?> >
	<header>
		<div class="website-logo">
			<?php $custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<img src="'. esc_url( $logo[0] ) .'">';
				} else {
						echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
				}
			?>
		</div>
		<!-- Adding in the header navgation into the theme -->
		<!-- The user does not have to use this but we created it incase they wanted to have a primary navigation -->
		<div class="website-navigation">
			<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
		</div>
		<div class="website-search-bar">
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
				<input type="search" class="search-field"
				placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
				value="<?php echo get_search_query() ?>" name="s"
				title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</label>
				<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
			</form>
		</div>
	</header>
	<div class="container">