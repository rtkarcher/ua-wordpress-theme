<?php get_header();?>


<div id="container">
<?php get_sidebar(); ?>
  <div id="content">
    <div class="main-content">
      <div id="index-title-container">
        <h1 id="index-title-text"><?php bloginfo('description')?></h1>
        <img id="index-title-img" src="<?php bloginfo('template_directory'); ?>/images/topimg_col7.jpg" alt="Main Image" width="736" height="260" />
	  </div>
    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        
        		<!-- * Note about adding/removing publish date, time, and/or author above posts: -->
                
		  <small><?php /* the_time('F jS, Y'); */ ?><?php /* echo "by "; the_author(); */ ?></small>
          
                <!-- 	* To display the dates and times that posts were published, close (or remove) the PHP comment tags surrounding 
                        	"the_time('F jS, Y');" on the line above.
                        * To hide the dates and times that posts were published, leave the PHP comment tags surrounding "the_time('F jS, Y');" intact. 
                            If the comment tags have been removed previously, simply enclose "the_time('F jS, Y');" in PHP comment tags.
                        * To display the authors' names, close (or remove) the PHP comment tags surrounding "echo "by "; the_author();" on the line above.
                        * To hide the authors' names, leave the PHP comment tags surrounding "echo "by "; the_author();" intact. 
                        	If the comment tags have been removed previously, simply enclose "echo "by "; the_author();" in PHP comment tags. -->

		  <div class="entry-snippet">
			<?php the_content('Read the rest of this entry &raquo;'); ?>
		  </div>
		  <p class="postmetadata">
		    <?php the_tags('Tags: ', ', ', '<br />'); ?><!-- Posted in <?php /* the_category(', ') */ ?> | --><?php /* edit_post_link('Edit', '', ' | '); */ ?>
			<?php /* comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); */ ?>
          </p>
	  </div>	<!-- Post ends -->
	<?php endwhile; else : ?>
	  <h2>Not Found</h2>
		<p>Sorry, no posts matched your criteria.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
    </div> 	<!-- Main Content ends -->
</div>	<!-- Content ends -->
</div> <!-- Container ends -->


</div> <!-- Wrapper ends -->

<?php get_footer(); ?>