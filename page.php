<?php
get_header();
?>

<div id="container">
<?php get_sidebar(); ?>
<div id="content">
  <div id="page">
	<div class="main-content">

      

         
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">         
         <!--
		  <div class="page-title">
        	<h1><?php /* the_title(); */ ?></h1>
          </div>	-->
          <div id="page-title-container">
		   <h1 id="page-title"><?php the_title(); ?></h1>
          </div>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>	<!-- Entry ends -->
		</div>	<!-- Post ends -->
		<?php endwhile; endif; ?>
	</div>	<!-- Main Content ends -->
  </div>	<!-- Page ends -->
</div>		<!-- Content ends -->
</div>	<!-- Container ends-->


</div> <!-- Wrapper ends -->


<?php get_footer(); ?>