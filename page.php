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
			if(have_posts()) :
				while(have_posts()) :
					the_post();
					get_template_part('parts/page-content');
				endwhile;
			endif;
			?>
			</div><!-- /content_box -->
		</div><!-- /central -->
	
	</div><!-- /main -->

<?php get_footer(); ?>
