<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link rel="shortcut icon" href="http://www.ua.edu/favicon.ico" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <script type="text/javascript" src="style.js"></script>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
  <div id="wrapper">	<!-- Wrapper begins -->
    <div id="header">	<!-- Header begins -->
    <?php global $shortname;
		$settings = get_option($shortname.'_options');
		if($settings['ua_header_search'] == "Search") {
			$nameplate = true;
			$search_form = true;
		  }
	?>
      <div id="header-banner">	<!-- Header Banner begins: area above navigation; contains UA nameplate, site name wordmark, & search field -->  

        <!-- * Note about header search field: 
        	If including a header search field, enclose the first <h1> "nameplate" line below in comment tags, then remove the comment tags 
            on either side of the "nameplate-wide" line below:	-->

	 <!-- <h1><a href="http://www.ua.edu" id="nameplate">The University of Alabama</a></h1> -->
	 	  <h1><a href="http://www.ua.edu" id="nameplate-wide">The University of Alabama</a></h1>
	 <!-- <h1><a href="http://www.ua.edu" id="nameplate-large">The University of Alabama</a></h1> -->
		  <p><span><a href="<?php bloginfo("url"); ?>/" id="wordmark"><?php bloginfo('name'); ?></a></span></p><br /><br />
       	  <?php if($search_form){ ?>
          	<div id="toolbox">	<!--Toolbox begins-->
            <ul id="toolbox-links">
          	  <li><a id="tool1" href="/site.html">A-Z Index</a></li>
              <li><a id="tool2" href="http://tour.ua.edu/">Campus Tour</a></li>
              <li><a id="tool3" href="http://directory.ua.edu/">Directories</a></li>
              <li><a id="myBama" href="http://mybama.ua.edu/">myBama</a></li>
            </ul>
            	<form id="quick-search" action="<?php bloginfo('url'); ?>/">
			 	 <input class="qsearch-text" id="qsearch" type="text" name="s" value="SEARCH" onfocus="if(this.value==this.defaultValue) this.value='';" title="" />
			 	 <input class="qsearch-submit" id="submit" alt="" type="submit" value="submit"  />
		    	</form>
          	</div>	<!-- Toolbox ends -->
          <?php }
       	  if($settings['ua_nav_type'] == "One Level" || $settings['ua_nav_type'] == "Two Level") {
       	  	$menu = wp_nav_menu(array('theme_location' => 'primary','fallback_cb' => '','echo' => false));
	       	if($menu) {
				$count = preg_match_all('/<li[^<]+?>/', $menu, $matches);
				wp_nav_menu(array(
				'theme_location' => 'primary',
				'menu_class' => 'menu_' . $count,
				'container_id' => 'main-nav',
				'depth' => 1,
				'fallback_cb' => ''
				));
		 	  }
			else {
				wp_nav_menu(array('theme_location' => 'primary','fallback_cb' => default_main_nav));
			  }
       	    }

       	  if($settings['ua_nav_type'] == "Two Level") {
       	  	$sec_menu = wp_nav_menu(array('theme_location' => 'secondary','container_id' => 'targ-nav','depth' => 1,'fallback_cb' => '','echo' => false));
       	  	if($sec_menu) {
				$count = preg_match_all('/<li[^<]+?>/', $sec_menu, $matches);
					$output = preg_replace('/<li[^>]+(id="[^"]*")\s+class="([^"]+)"/', '<li $1 class="slash $2"', $sec_menu, $count-1);
					echo $output;	
			  }
			else {
				wp_nav_menu(array('theme_location' => 'secondary','container' => false,'fallback_cb' => default_targ_nav));
			  }
       	    }
          ?>
	</div>					<!-- Header ends (for Two-Level Horizontal Navigation Template) -->
</head>
<body>