						<?php
							$comment_count = get_comment_count($post->ID);
							if($comment_count['approved'] > 0	) :
						?>
						<div class="comments-title">
							<div class="comment_count"><?php echo '「<em>' . get_the_title() . '</em>」に' . get_comments_number() . '件のコメント'; ?></div>
						</div>
						<ol class="commentlist">
							<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
						</ol>
						<div class="clearfix"></div>
						<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
						<nav class="navigation">
							<ul>
								<li class="nav-previous"><?php previous_comments_link('<<  古いコメント'); ?></li>
								<li class="nav-next"><?php next_comments_link('新しいコメント  >>'); ?></li>
							</ul>
						</nav>
						<div class="clearfix"></div>
						<?php 
							endif;
						else :
						?>
						<div class="comment_count">今のところ「<?php echo get_the_title(); ?>」にコメントは無し</div>
						<?php
						endif;

						$fields = array(
							'author' =>
								'<p class="comment-form-author"><label class="comment-label" for="author">'.('Name').'</label>'.
								'<input id="author" class="comment-input" name="author" type="text" value="'.
								esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.' required /></p>',

							'email' =>
								'<p class="comment-form-email"><label class="comment-label" for="email">'.('Mail Address' ).'</label> '.
								'<input id="email" class="comment-input" name="email" type="email" value="'.
								esc_attr(  $commenter['comment_author_email'] ).'" size="30"'.$aria_req.' required /></p>',

							'url' => 
								'<p class="comment-form-url"><label class="comment-label" for="url">'. ( 'Web Site' ).'</label>'.
								'<input id="url" class="comment-input" name="url" type="url" value="'.
								esc_attr( $commenter['comment_author_url'] ).'" size="30" /></p>',
						);

						$args = array(
							'fields' => apply_filters('comment_form_default_fields', $fields),
							'comment_field' =>
								'<p class="comment-form-comment">'.
								'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" type="textarea" required	></textarea></p>',
							'comment_notes_before' => '',
							'comment_notes_after' => '',
							'title_reply' => ( 'コメントを残す' ),
							'title_reply_to' => ( 'Leave a Comment to %s' ),
							'label_submit' => ( 'Submit Comment' ),
						);

						comment_form($args, $post->ID);
						?>
