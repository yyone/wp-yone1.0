<?php get_header(); ?>

	<div id="main">
		<!------------ left box -------------->
		<?php get_template_part('leftbar'); ?>
	
		<!------------ right box -------------->
		<?php get_template_part('rightbar'); ?>
	
		<!------------ content box -------------->
		<div id="central">
			<div class="content_box">
			<?php
			/* print_r($wp_query); */
			if(have_posts()) :
				while(have_posts()) :
					the_post();
					get_template_part('parts/archive-content');
				endwhile;
				if(function_exists('page_navi')) :
					page_navi('elm_class=page-nav&edge_type=span');
				endif;
			endif;
			?>
			</div><!-- /content_box -->
		</div><!-- /central -->
	
	</div><!-- /main -->

<?php get_footer(); ?>
