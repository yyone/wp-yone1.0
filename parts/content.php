				<article <?php post_class(); ?>>
					<div class="box">
						<h2 class="title">
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
							<span class="text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						</h2>
	
						<time datetime="<?php the_time('Y/m/d'); ?>" class="time">
							posted on <?php the_time('Y/m/d'); ?>
							<?php if(is_user_logged_in() && author_can($post->ID, 'publish_posts')) : ?>
								&nbsp;<a href="<?php echo get_edit_post_link($post->ID); ?>">[Edit]</a>
							<?php endif; ?>
						</time>
	
						<div class="context">
							<?php the_content(); ?>
						</div><!-- /context -->

						<div class="hr"></div>
						<div class="attached">
							<div class="share">
								<span class="title">Share This:&nbsp;</span>
								<ul class="social_button">
									<li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-via="y_yone" data-lang="ja">ツイート</a></li>
									<li class="fb"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fyone3.net&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=20&amp;appId=216570448382466" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:20px;" allowTransparency="true"></iframe></li>
									<li class="gplus"><div class="g-plusone" data-size="medium" data-href="http://yone3.net"></div></li>
									<li class="hatena"><a href="http://b.hatena.ne.jp/entry/yone3.net" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>
								</ul>
							</div>
							<div class="category">
								<span class="title">Category:&nbsp;&nbsp;</span><?php the_category(', '); ?>
							</div>
							<div class="tag">
								<span class="title">Tags:&nbsp;&nbsp;</span><?php the_tags('', ', ', ' '); ?>
							</div>
							<div class="indicator">
								<span class="before"><?php previous_post_link('%link', "<< " . '%title', true); ?></span>
								<span class="next"><?php next_post_link('%link', '%title' . " >>", true); ?></span>
							</div>
							<br class="clear" />
						</div><!-- /attached -->
						<?php get_template_part('/parts/back_to_top'); ?>
					</div><!-- /box -->

					<div class="box">
						<div id="comments">
							<?php comments_template('/parts/comments.php', true); ?>
						</div><!-- /comment -->
						<?php get_template_part('/parts/back_to_top'); ?>
					</div><!-- /box -->

					<div class="box">
						<div class="zenback">
								<!-- X:S ZenBackWidget --><script type="text/javascript">document.write(unescape("%3Cscript")+" src='http://widget.zenback.jp/?base_uri=http%3A//yone3.net&nsid=104715941241188385%3A%3A104715950368022747&rand="+Math.ceil((new Date()*1)*Math.random())+"' type='text/javascript'"+unescape("%3E%3C/script%3E")); </script><!-- X:E ZenBackWidget -->
						</div>
						<?php get_template_part('/parts/back_to_top'); ?>
					</div><!-- /box -->
				</article>
