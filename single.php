<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maxon_un
 */

get_header();
?>

<div id="primary" class="content-area container">
	<div class="row">
		<div class="col-md-8">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div><!-- content -->
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- sidebar -->
	</div>
</div><!-- #primary -->

<?php
get_footer();
