<?php
	/*
	Template Name: News Page
	*/
?>
<!-- Adding in the header -->
<?php get_header(); ?>
<?php wp_nav_menu(array('theme_location'=>'secondary')); ?>
<div id="body-content-container">
	<h1><?php the_title(); ?></h1>
	<div class="row">
		<div class="col-xs-12 col-sm-8 row">
			<div class="post-content"></div>
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="newsThumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
					<small><?php the_time('j F Y'); ?></small>
					<div><?php the_content(); ?></div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
			<?php
				//	Getting the title
				$category = get_the_title();
				//	Turning all letters into lowercase
				$category = strtolower($category);
				//	Replacing all spaces with dashes
				$category = str_replace(' ','-', $category);
				//	Replaing the & symbol with nothing
				$category = str_replace('&','', $category);
				//	Only displaying posts with a category
				// $programmes = new WP_Query("type=post&category_name=$category");

				$parms = array(
					'type'=>'post',
					'category_name'=>$category,
					'posts_per_page' => 2
				);
				$news = new WP_Query($parms);

			?>
			<!-- Displaying the different courese in the selected category -->
			<div class="row">
				<?php if($news->have_posts()): ?>
				<?php while($news->have_posts()): $news->the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<div><?php the_content(); ?></div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- Adding in the footer -->
<?php get_footer(); ?>