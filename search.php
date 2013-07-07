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
/*
			query_posts($query_param);
			print_r($wp_query);
*/
			?>
			<header class="header-box">
				<div class="archive-header">
					<span>「</span><h1><?php the_search_query(); ?></h1><span>」の検索結果</span>
				</div>
			</header>
			<?php
			if(have_posts()) :
				while(have_posts()) :
					the_post();
					get_template_part('parts/archive-content');
				endwhile;
				if(function_exists('page-navi')) :
					page_navi('elm_class=page-nav&edge_type=span');
				endif;
			endif;
			?>
			</div><!-- /content_box -->
		</div><!-- /central -->
	
	</div><!-- /main -->

<?php get_footer(); ?>
