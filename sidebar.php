	<div id="sidebar">
	  <div id="sidebarwrapper">
		<ul class="side-nav">
        <?php
        /*
		wp_nav_menu(array(
		'theme_location' => 'sidebar',
		'menu_class' => 'sec-nav',
		'container' => false,
		'depth' => 1,
		'echo' => list_child_pages(),
		'fallback_cb' => default_ua_menu
		)); 
		
		function list_child_pages() {
		  $children = wp_list_pages('title_li=&child_of='.$page->ID.'&echo=0&depth=0');
		  if ($children) { ?>
  		    <ul>
  			  <?php echo $children; ?>
 		    </ul>
     <?php }
		  }
		if(is_active_sidebar(1)){ dynamic_sidebar('Sidebar'); }
		if(is_active_sidebar(2)){ dynamic_sidebar('Sidebar Linksbox (crimson)'); }
		if(is_active_sidebar(3)){ dynamic_sidebar('Sidebar Linksbox (gray)'); }
		if(is_active_sidebar(4)){ dynamic_sidebar('Sidebar Linksbox (dark gray)'); }

		*/
		?>
        
        
        
        
          <?php 	/* Widgetized sidebar, if you have the plugin installed. */
				if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar')) : else : ?>
		</ul>
		<?php  endif; ?>
      </div>	<!-- Sidebar Wrapper ends -->
     </div>		<!-- Sidebar ends -->