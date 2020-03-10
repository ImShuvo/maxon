<?php
/**
 * The template for displaying archive pages
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
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			the_posts_navigation();
			else :
			get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div><!-- content -->
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- sidebar -->
	</div> 
</div><!-- #primary -->

<?php
get_footer();


