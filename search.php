<?php
get_header();
?>

<div id="container">
<?php get_sidebar(); ?>
<div id="content">
  <div id="page">
	<div class="main-content">
      <div id="search-results-page">
        <h3>Search Results for: "<?php echo $s; ?>"</h3>
          <form id="quick-search" action="<?php bloginfo('url'); ?>/">
			  <input class="qsearch-text" id="qsearch" type="text" name="s" value="<?php echo $s; ?>" onfocus="if(this.value==this.defaultValue) this.value='';" title="" />
			  <input class="qsearch-submit" id="submit" alt="" type="submit" value="Search"  />
			</form>
       
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
          <br />
          <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
          <?php the_excerpt(); ?>
          <p><a href="<?php the_permalink(); ?>">Read the rest of this document &raquo;</a></p>
		</div>	<!-- Post ends -->
        <?php endwhile; ?>
    <!--
		  <p class="post-nav">
            <span class="previous"><?php /* next_posts_link('Older Entries') */ ?></span>
            <span class="next"><?php /* previous_posts_link('Newer Entries') */ ?></span>
          </p>
     -->
        
		<?php else : ?>
          <br /><br />
		  <p class="no-search-results">Sorry, your search - <strong><?php echo $s; ?></strong> - did not match any documents.</p>
		  <p class="no-search-results">Suggestions:
           <ul class="no-search-results">
			<li>Make sure all words are spelled correctly.</li>
			<li>Try different keywords.</li>
			<li>Try more generalized keywords.</li>
           </ul>
          </p>
        
	<?php endif; ?>
      </div> <!-- Search Results Page ends -->
	</div>	<!-- Main Content ends -->
  </div>	<!-- Page ends -->
</div>		<!-- Content ends -->
</div>	<!-- Container ends-->
</div> <!-- Wrapper ends -->
<?php get_footer(); ?>