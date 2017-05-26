<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rara_Journal
 */

$sidebar_layout = rara_journal_sidebar_layout();

get_header(); ?>


<!-- 3 Pictiures Section  -->

<div class="row top_section">
 
<?php
global $post;
$args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 4 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<h2><?php the_title(); ?></h2>
		<div class="top_section_content"><?php the_content();?></div>
		
</div>
<?php endforeach; 
wp_reset_postdata();?>


<!-- Middle Content Section  -->

<div class="row middle_section">
 
<?php
global $post;
$args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 5 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<div class="middle_section_content"><?php the_content();?></div>
		
</div>
<?php endforeach; 
wp_reset_postdata();?>


<!-- Bottom Brand Section  -->

<div class="row bottom_section">
 
<?php
global $post;
$args = array( 'posts_per_page' => 5, 'offset'=> 0, 'category' => 6 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<h2><?php the_title(); ?></h2>
		<div class="bottom_section_content"><?php the_content();?></div>
		
</div>
<?php endforeach; 
wp_reset_postdata();?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php 
if( $sidebar_layout == 'right-sidebar' ) get_sidebar(); 
get_footer();