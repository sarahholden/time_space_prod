<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sh_template
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- ==============================
	METADATA
	=================================== -->
	<? if (get_field('seo_description')) { ?>
		<meta name="description" content="<?= get_field('seo_description') ?>"/>
	<? } ?>

	<? if (get_field('canonical_url')) { ?>
		<link rel="canonical" href="<?= canonical_url ?>" />
	<? } else { ?>
		<link rel="canonical" href="<?= get_permalink() ?>" />
	<? } ?>

	<!-- ==============================
	WP HEAD
	=================================== -->
	<?php wp_head(); ?>

	<!-- ==============================
	FAVICON
	=================================== -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/icons/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">


	<!-- ==============================
	SEO & ANALYTICS
	=================================== -->
	<!-- Start Google Analytics Code -->
	<? $gaTrackingId = get_field('google_analytics_tracking_id', 'option') ? get_field('google_analytics_tracking_id', 'option') : ''; ?>
	<script type="text/javascript">
		var _gaq = _gaq || [];

		_gaq.push(['_setAccount', '<?= $gaTrackingId ?>']);
		_gaq.push(['_setDomainName', 'none']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']); //Asynchronous tracking

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})(); // classic analytics
	</script>
	<!-- End Google Analytics Code -->

	<!-- ==============================
	SOCIAL SHARING
	=================================== -->

	<!-- OPEN GRAPH METADATA -->
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?= the_title() ?>" />
	<? if (get_field('seo_description')) { ?>
		<meta property="og:description" content="<?= get_field('seo_description') ?>" />
	<? } ?>
	<meta property="og:url" content="<?= get_permalink() ?>" />
	<meta property="og:site_name" content="TimeSpace Group" />
	<? if (get_field('og_image')) { ?>
		<meta property="og:image" content="<?= get_field('og_image') ?>" />
	<? } ?>

	<!-- TWITTER METADATA -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?= the_title() ?>" />
	<? if (get_field('seo_description')) { ?>
		<meta name="twitter:description" content="<?= get_field('seo_description') ?>" />
	<? } ?>
	<? if (get_field('twitter_image')) { ?>
		<meta name="twitter:image" content="<?= get_field('twitter_image') ?>" />
	<? } ?>


	<!-- ==============================
	USER ADDED HEAD SCRIPTS
	=================================== -->
	<? if (get_field('header_scripts', 'option')) { ?>
	  <?= get_field('header_scripts', 'option') ?>
	<? } ?>


</head>

<body <?php body_class(); ?>>

<div class="close-nav-overlay js-close-nav"></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sh_template' ); ?></a>

	<div class="nav-wrapper">
  <!--   SOCIAL   -->


  <div class="container-full">
    <!--   LOGO   -->
    <div class="logo-wrapper">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<? if (get_field('logo', 'option')) { ?>
					<img src="<?= get_field('logo', 'option')['url'] ?>" alt="Logo" class="logo">
				<? } else {?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Logo" class="logo">
				<? } ?>
			</a>
    </div>

    <!--   NAV   -->
		<nav>
			<a href="#" class="close js-close-nav">
				<img src="<?php echo get_template_directory_uri(); ?>/images/close.svg" alt="Close Navigation" >
			</a>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'header-nav',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
  </div>


  <div class="hamburger">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61 58">
		  <g fill="none" fill-rule="evenodd">
		    <polygon fill="#121A3C" points="0 58 61 58 61 0 0 0"/>
		    <g stroke="#FFF" stroke-linecap="square" stroke-width="2" transform="translate(13 15)">
		      <line class="line-1" x1=".5" x2="34.334" y1="13.5" y2="13.5"/>
		      <line class="line-2" x1=".5" x2="34.334" y1=".5" y2=".5"/>
		      <line class="line-3" x1=".5" x2="34.334" y1="27" y2="27"/>
		    </g>
		  </g>
		</svg>

  </div>


</div>


	<div id="content" class="site-content">
