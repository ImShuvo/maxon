<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maxon
 */

get_header();
?>

<div id="primary" class="content-area container">
	<div class="row">
		<div class="col-md-8">
			<div class="page">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>

		</div><!-- content -->
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- sidebar -->
	</div>
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
