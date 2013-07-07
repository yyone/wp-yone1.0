				<article <?php post_class(); ?>>
					<div class="box">
						<div class="title">
							<?php
								$cat_array = get_leftbar_category(); $flg;
	
								for($i=0;$i<count($cat_array);$i++) :
									$key=$cat_array[$i][1]; $value=$cat_array[$i][2];
									if(substr($cat_array[$i][0], -2) == '00' && in_category($key)) :
							?>
								<div class="title_<?php echo $key; ?>"></div>
							<?php
										$flg = true; break;
									endif;
								endfor;
							if(!$flg) :
							?>
								<div class="title_life"></div>
							<?php endif; ?>
							<span class="text"><a href="<?php the_permalink(); ?>">
							<?php if(is_front_page()): ?><h3><?php elseif(is_archive() || is_search()): ?><h2><?php endif; ?><?php the_title(); ?><?php if(is_front_page()): ?></h3><?php elseif(is_archive() || is_search()): ?></h2><?php endif; ?></a></span>
						</div>
	
						<time datetime="<?php the_time('Y/m/d'); ?>" class="time">
							posted on <?php the_time('Y/m/d'); ?>
							<?php if(is_user_logged_in() && author_can($post->ID, 'publish_posts')) : ?>
								&nbsp;<a href="<?php echo get_edit_post_link($post->ID); ?>">[Edit]</a>
							<?php endif; ?>
						</time>
	
						<div class="context">
							<?php the_content('⇒ 続きを読む'); ?>
						</div><!-- /context -->
	
						<div class="comment-link">
							<?php
								$comment_count = get_comment_count($post->ID);
								if($comment_count['approved'] == 1) :
							?>
								<span><a href="<?php the_permalink(); ?>#comments">Comment(1)</a></span>
							<?php elseif($comment_count['approved'] > 1) : ?>
								<span><a href="<?php the_permalink(); ?>#comments">Comments(<?php echo $comment_count['approved']; ?>)</a></span>
							<?php else : ?>
								<span>No Comments</span>
							<?php endif; ?>
						</div><!-- /comment -->
					</div><!-- /box -->
				</article>
