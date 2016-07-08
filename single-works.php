<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Demon_CREW
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>

		<div class="list-header">
			<div class="container">
				<div class="row clearfix">
					<h3 class="pull-left">Our Work</h3>
					<small class="pull-right">Home / Work / <?php the_title(); ?></small>
				</div>
			</div>
		</div>
		<div class="main-post">
			<div class="container">
				<div class="col-md-10 col-md-offset-1">
					<h3><?php the_title(); ?></h3>
					<ul class="post-info-list">
						<li><i class="fa fa-calendar" aria-hidden="true"></i><?php $date = get_the_date(); $date = new DateTime($date); echo $date->format('jS F Y') ?></li>
						<li><i class="fa fa-user" aria-hidden="true"></i><?php the_author(); ?></li>
						<li><i class="fa fa-comment" aria-hidden="true"></i><?php comments_number(); ?></li>
					</ul>
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<img class="preview-image" src="<?php echo $url ?>" alt="" />
					<div class="post-body">
						<?php the_content(); ?>
					</div>
					<div class="share-icons clearfix">
						<p class="pull-left">
							Share This Post:
						</p>
						<ul class="pull-right">
							<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="author-container">
						<div class="author-name">
							<h4>Posted by <strong><?php the_author(); ?></strong></h4>
						</div>
						<div class="author-info">
							<div class="row">
								<img class="author-img" src="<?php echo get_avatar_url(get_the_author_meta( 'ID' )); ?>" alt="Author Avatar" />
								<p class="author-description">
									<?php the_author_meta('description'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php	// If comments are open or we have at least one comment, load up the comment template.
		endwhile; // End of the loop.
		?>
<?php

get_footer();
