<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html">
<meta name="author" content="Yoshio Yonezawa">
<meta name="copyright" content="yone3.net">
<!--
<meta name="viewport" content="width=device-width" />
<meta name="format-detection" content="telephone=no" />
-->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />

<!--[if lt IE 9]>
  <meta http-equiv="Imagetoolbar" content="no" />
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Socialパーツ用ogp設定 -->
<?php
if(is_single()) :
	get_template_part('parts/header_ogp');
endif;
?>

<title><?php
	global $page, $paged;
	if(is_search()) :
		wp_title('', true, 'left');
		echo ' | ';
	else :
		wp_title('|', true, 'right');
	endif;
	bloginfo('name');
	if(is_front_page()) :
		echo ' | ';
		bloginfo('description');
	endif;
	if($paged >= 2 || $page >= 2) :
		echo ' | ' . sprintf('%sページ', max($paged, $page));
	endif;
?></title>
<?php wp_head(); ?>
</head>

<body>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-27SM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-27SM');</script>
	<!-- End Google Tag Manager -->
	<!------------ social tag -------------->
	<?php get_template_part('parts/social-script'); ?>

<div id="container">
<div id="bg_container">

	<!------------ header -------------->
	<header id="header">
		<a href="<?php echo home_url('/'); ?>"><img class="logo" src="<?php bloginfo('template_url'); ?>/img/site_title.png" width="314" height="93" alt="yone3.net"></a>
		<div class="description"><?php bloginfo('description'); ?></div>

		<div class="bread_crump">
		<?php
		if(!is_front_page() && function_exists('bread_crumb')) :
			bread_crumb('navi_element=nav&type=string&home_label=TOP&joint_string=   ＞   ');
		endif;
		?>
		</div><!-- /bread_crump -->

		<div class="social_icon">
			<a href="https://twitter.com/y_yone" target="_blank" id="twitter"><div class="twitter"></div></a>
			<a href="https://www.facebook.com/yone.yoshio" target="_blank" id="facebook"><div class="facebook"></div></a>
			<a href="http://www.linkedin.com/profile/view?id=99148272" target="_blank" id="linkedin"><div class="linkedin"></div></a>
			<a href="https://ja.foursquare.com/y_yone" target="_blank" id="foursquare"><div class="foursquare"></div></a>
			<a href="http://yone3.net/feed" target="_blank" id="rss"><div class="rss"></div></a>
		</div><!-- /social_icon -->

		<div id="search_box">
			<?php get_search_form(); ?>
		</div>	
	</header><!-- /header -->
