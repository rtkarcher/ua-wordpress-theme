<?php 
get_header();
get_sidebar(); 
?>

  <div id="content">
	<div class="page-title">
	  <h1>Two Level Horizontal Navigation with Left Vertical Navigation</h1>
      <img src="<?php bloginfo('template_directory'); ?>/images/topimg_col7.jpg" alt="Main Image" width="736" height="260" class="img_main" />
	</div>
    <div class="main-content">
	<p style="font-size:1.8em;line-height:145%;margin-bottom:18px;">This is an example of large text. Duis mauris justo, tincidunt in, molestie sed, lacinia vel, dolor. <a href="#">Aenean ac tellus porttitor</a> ligula hendrerit ornare. Vivamus gravida ornare augue. Proin porta, quam a vulputate blandit, massa lorem euismod eros, <a href="#">vel nonummy</a> enim sapien eget nisi. Com sociis natoque penatibus et magnis dis <a href="#">parturient</a> montes, nascetur ridiculus mus. In dapibus commodo dolor. Aliquam facilisis turpis ac tortor.</p>
	<p>This is an example of regular text. Duis mauris justo, tincidunt in, molestie sed, lacinia vel, dolor. <a href="#">Aenean ac tellus porttitor</a> ligula hendrerit ornare. Vivamus gravida ornare augue. Proin porta, quam a vulputate blandit, massa lorem euismod eros, <a href="#">vel nonummy</a> enim sapien eget nisi. Com sociis natoque penatibus et magnis dis <a href="#">parturient</a> montes, nascetur ridiculus mus. In dapibus commodo dolor. Aliquam facilisis turpis ac tortor.</p>
	<h1>Heading Style H1</h1>
	<h2>Heading Style H2</h2>
	<h3>Heading Style H3</h3>
	<h4>Heading Style H4</h4>
	<h5>Heading Style H5</h5>
	<h6>Heading Style H6</h6>
	<ul>
	 <li><a href="#">Link</a></li>
	 <li><a href="#">Link</a></li>
	 <li><a href="#">Link</a></li>
	 <li><a href="#">Link</a></li>
	 <li><a href="#">Link</a></li>
	 <li><a href="#">Link</a></li>
	</ul>
	<div class="cont_col_3">
	 <div class="linksbox">
		<h1>Crimson Header Linksbox</h1>
		<ul>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		</ul>
	</div>
  </div>
  <div class="cont_col_3">
	<div class="linksbox">
		<h1 class="gray">Light Gray Header Linksbox</h1>
		<ul>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		</ul>
	</div>
  </div>
  <div class="cont_col_3 noright">
	<div class="linksbox">
		<h1 class="darkgray">Dark Gray Linksbox</h1>
		<ul>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		</ul>
	</div>
  </div>
  <div class="cont_col_2">
	<div class="linksbox">
		<h1 class="large">Large Heading in Linksbox</h1>
		<ul class="nobullets">
		 <li><a href="#">No bullets on unordered list</a></li>
		 <li><a href="#">No bullets on unordered list</a></li>
		 <li><a href="#">No bullets on unordered list</a></li>
		 <li><a href="#">No bullets on unordered list</a></li>
		 <li><a href="#">No bullets on unordered list</a></li>
		</ul>
	</div>
  </div>
  <div class="cont_col_2 noright">
	<div class="linksbox">
		<h1>Linksbox with text</h1>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
		<ul>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		 <li><a href="#">Link</a></li>
		</ul>
	</div>
  </div>
    <form method="post" action="">
	  <fieldset>
	   <legend>Contact Form</legend>
	    <label for="name">Name <span>*</span></label>
	     <input type="text" name="name" size="40" maxlength="100" id="name" />
	    <br />
	    <label for="deptorg">Department/Organization</label>
	     <input type="text" name="deptorg" size="40" maxlength="150" id="deptorg" />
	    <br />
	    <label for="phone">Telephone Number</label>
	     <input type="text" name="phone" size="20" maxlength="50" id="phone" />
	    <br />
	    <label for="email">E-mail Address <span>*</span></label>
	     <input type="text" name="email" size="40" maxlength="150" id="email" />
	    <br />
	    <label for="question">Enter your question, comment, or issue report <span>*</span></label>
	     <textarea name="question" cols="35" rows="5" id="question"></textarea>
	    <br />
		  <div style="display:none;">
		    <label for="state">This box is for spam protection - <strong>please leave it blank</strong>:</label>
			 <input size="30" name="state" id="state" />
		  </div>
	    <input type="submit" name="Submit" value="Submit" class="submit" id="sendmail" />
	  </fieldset>
	</form>
   </div>
    </div>
  </div>

<?php get_footer(); ?>