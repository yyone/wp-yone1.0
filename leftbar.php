			<div id="left">
				<div class="left_box">
					<div class="box_background_top"></div>
					<div class="box_background_content">
						<div class="widget-title">メニュー</div>
						<ul class="box_content">
							<?php
								$cate = get_leftbar_category();
								$sub_cate = get_leftbar_category();
								for($i=0;$i<count($cate);$i++) :
									if(substr($cate[$i][0],-2) == '00') :
										if($cate[$i][1] == 'home') :
							?>
								<li class="menu_icon" id="menu_home"><a href="<?php echo home_url('/'); ?>">
										<?php else: ?>
								<li class="menu_icon" id="menu_<?php echo $cate[$i][1]; ?>"><a href="/category/<?php echo $cate[$i][1]; ?>">
										<?php endif; ?>
								<div class="menu_<?php echo $cate[$i][1]; ?>"></div><span class="name"><?php if(is_front_page()): ?><h2><?php endif; ?><?php echo $cate[$i][2]; ?><?php if(is_front_page()): ?></h2><?php endif; ?></span></a>
										<?php
										$flg = 0;
										$hit_array = array();
										for($j=0;$j<count($sub_cate);$j++) :
											if(substr($cate[$i][0],0,2) == substr($sub_cate[$j][0],0,2)
											&& substr($sub_cate[$j][0],-2) != '00') :
												$flg = 1;
												$hit_array[$sub_cate[$j][1]] = $sub_cate[$j][2];
											endif;
										endfor;
										?>
	
										<?php if($flg) : ?><ul><?php endif; ?>
										<?php if($flg) :
											foreach($hit_array as $key => $value) : ?>
										<li><a href="/category/<?php echo $key; ?>"><span class="sub_title"><?php echo $value; ?></span></a></li>
										<?php
											endforeach;
											endif; ?>
										<?php if($flg) : ?></ul><?php endif; ?>
								</li>
									<?php endif; ?>
								<?php endfor; ?>
						</ul><!-- /box_content -->
					</div><!-- /box_background_content -->
					<div class="box_background_bottom"></div>
				</div><!-- /left_box -->
			</div><!-- /left -->
