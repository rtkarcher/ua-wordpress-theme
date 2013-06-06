<?php //sidebar widgets
require_once(TEMPLATEPATH . '/includes/controlpanel.php');
global $shortname;
$settings = get_option($shortname.'_options');

if ( function_exists('register_sidebar') ) {
	
	register_sidebar(array(
		'name' => 'Sidebar',
		'id'   => 'sidebar',
		'before_widget' => ''/*'<div id="%1$s" class="widget %2$s">'*/,
		'after_widget' => ''/*'</div>'*/,
		'before_title' => '<p class="widgettitle">',
		'after_title' => '</p>',
	));
	
	register_sidebar(array(
		'name' => 'Header',
		'id'   => 'header',
		'description'   => 'From the \'Available Widgets\' panel, you can click and drag a search box into your site\'s header. (More header widgets coming soon!)',
		'before_widget' => '<div id="toolbox">	<!-- Toolbox begins -->
							  <ul id="toolbox-links">
          	  					<li><a id="tool1" href="/site.html">A-Z Index</a></li>
              					<li><a id="tool2" href="http://tour.ua.edu/">Campus Tour</a></li>
              					<li><a id="tool3" href="http://directory.ua.edu/">Directories</a></li>
              					<li><a id="myBama" href="http://mybama.ua.edu/">myBama</a></li>
							  </ul>',
							
		'after_widget'  => '</div>	<!-- Toolbox ends -->',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>'
	));

}


/*
Plugin Name:  Disable WordPress Core Update
Description:  Disables the WordPress core update checking and notification system.
Plugin URI:   http://lud.icro.us/disable-wordpress-core-update/
Version:      1.4
Author:       John Blackbourn
Author URI:   http://johnblackbourn.com/
Props:        Matt Mullenweg and _ck_

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/

# 2.3 to 2.7:
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_action( 'init', create_function( '$b', "remove_action( 'admin_notices', 'update_nag' );" ), 3 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
add_filter( 'pre_option_update_core', create_function( '$b', "return null;" ) );

# 2.8 to 3.0:
remove_action( 'admin_notices', 'update_nag', '3' );
remove_action( 'wp_version_check', 'wp_version_check' );
remove_action( 'admin_init', '_maybe_update_core' );
add_filter( 'pre_transient_update_core', create_function( '$a', "return null;" ) );
add_filter( 'pre_transient_update_core', create_function( '$b', "return null;" ) );

# 3.0:
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ), create_function( '$b', "return null;" ) );




/************************************
	Enable WordPress 3.0 Menus
************************************/

if($settings['ua_nav_type'] == "One Level"){
	register_nav_menus(array(
			'primary' => __('Primary Navigation')
		));
	
	$headertype = "one";
}
elseif($settings['ua_nav_type'] == "Two Level"){
	register_nav_menus(array(
			'primary' => __('Primary Navigation'),
			'secondary' => __('Secondary Navigation')
		));
	
	$headertype = "two";
}
elseif($settings['ua_nav_type'] == "None"){		
	$headertype = "none";
}

if($settings['ua_layout'] != "No Sidebar"){
		register_nav_menus(array(
			'sidebar' => __('Sidebar Navigation')
		));
}

if($settings['ua_layout'] == "Two Small Sidebars"){
		register_nav_menus(array(
			'sidebar_right' => __('Right Sidebar Navigation')
		));
}


register_nav_menus(array(
		'footer' => __('Footer Links'),
		'functional_left' => __('Functional Footer links (left)'),
		'functional_middle' => __('Functional Footer links (middle)'),
		'functional_right' => __('Functional Footer links (right)')
	));


/************************************
	UA Theme Admin - Background Image
						for Navigation
************************************/

add_action('wp_head', 'ua_header_nav_type');

function ua_header_nav_type(){
	global $headertype;
    
	echo "<style type=\"text/css\">\n";
	echo "body{ background:#fff url(" . get_bloginfo('template_url') . "/images/header-bg-" . $headertype . ".png) top left repeat-x; }\n";
	
	if($headertype == "one"){
		echo "#header { height:152px; }\n #content { margin-top:40px; }\n .entry { margin-top:-24px; }\n";
	}
	
	elseif($headertype == "two"){
		echo "#header { height:178px; }\n #content { margin-top:60px; }\n .entry { margin-top:-24px; }\n";
	}
	else{
		echo "#content { margin-top:20px; }\n .entry { margin-top:-24px; }\n";
	}
	
	echo "</style>\n";
}

/************************************
	Enable Featured Image
************************************/
if(function_exists('add_theme_support')){
	add_theme_support('post-thumbnails');
}



?>