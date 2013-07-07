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
					<span><?php if(is_category()): ?>カテゴリ：<?php elseif(is_tag()): ?>タグ：<?php elseif(is_date()): ?>過去の投稿：<?php endif; ?></span>
					<h1><?php if(is_category()): single_cat_title(); elseif(is_tag()): single_tag_title(); elseif(is_date()): $year = get_query_var('year');$monthnum = get_query_var('monthnum');$title = $year."年";if(!empty($monthnum)) $title .= $monthnum."月";echo $title; endif; ?></h1>
				</div>
			</header>
			<?php
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
