 <?php wp_footer(); ?>
</div> <!-- Wrapper ends -->
  <div id="footer">				<!--Footer begins-->
	<div id="footerwrapper">			<!--Footer wrapper begins-->
    
<!--Note about Functional Footer: If you wish to include the "functional" footer with listed links, finish the comment marks on the "Footer links begin" and "Footer links end" lines-->
    
	<!--Footer links begin
	  <div class="column_3">
		<h1>Footer List 1</h1>
		<ul>
		 <li><a href="#">Link 1</a></li>
		 <li><a href="#">Link 2</a></li>
		 <li><a href="#">Link 3</a></li>
		 <li><a href="#">Link 4</a></li>
		 <li><a href="#">Link 5</a></li>
		</ul>
	 </div>
	 <div class="column_3">
		<h1>Footer List 2</h1>
		<ul>
		 <li><a href="#">Link 1</a></li>
		 <li><a href="#">Link 2</a></li>
		 <li><a href="#">Link 3</a></li>
		 <li><a href="#">Link 4</a></li>
		 <li><a href="#">Link 5</a></li>
		</ul>
	 </div>
	 <div class="column_3">
		<h1>Footer List 3</h1>
		<ul>
		 <li><a href="#">Link 1</a></li>
		 <li><a href="#">Link 2</a></li>
		 <li><a href="#">Link 3</a></li>
		 <li><a href="#">Link 4</a></li>
		 <li><a href="#">Link 5</a></li>
		</ul>
	 </div>
	Footer links end-->
     
	 <div id="footer-nav">	<!--Footer-nav begins-->
     	<ul id="footer-icon-list_left">     
          <li id="foot_home"><a href="http://www.ua.edu/">UA Home</a></li>     
          <li id="foot_news"><a href="http://www.uanews.ua.edu/">UA News</a></li>     
          <li id="foot_cal"><a href="http://www.ua.edu/">Calendar</a></li>     
     	</ul>
     	<ul id="footer-icon-list_right"> 
          <li id="foot_connect"><a href="http://www.ua.edu/connect/">Connect</a></li>        
          <li id="foot_rss"><a href="http://www.ua.edu/subscribe/">Subscribe</a></li>
          <li id="foot_email"><a href="http://www.ua.edu/contact.html">Contact UA</a></li>
        </ul>
		<div id="standard-footer-links">
        <?php function list_footer_links() {
				$footer_links = wp_list_bookmarks('title_li=&categorize=0&category_name=Footer&limit=7&echo=0');
				$bookmark_spacers = explode('</li>', $footer_links); //create array from string returned by wp_list_bookmarks
				$divider = " |";
				array_pop($bookmark_spacers); //pop last element off array
				echo implode($divider, $bookmark_spacers);
			  }
		?>
<!--          <ul id="info-links">
            <li><?php /* $list_footer_links = list_footer_links(); echo $list_footer_links; */ ?></li>
          </ul>
-->
          <p id="copyright"><a href="http://www.ua.edu/copyright.html">Copyright &copy; <?php echo date('Y'); ?></a> 
							<a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> | 
							<a href="http://www.ua.edu">The University of Alabama</a> | Tuscaloosa, AL 35487 | (205) 348-6010
          </p>
        </div>				<!--Standard footer links ends-->
	 </div>					<!--Footer-nav ends-->
	</div>					<!--Footer wrapper ends-->
  </div>					<!--Footer ends-->
</body>
</html>