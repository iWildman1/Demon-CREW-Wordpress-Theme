<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Demon_CREW
 */

get_header(); ?>

<div class="list-header">
  <div class="container">
    <div class="row clearfix">
      <h3 class="pull-left">Our Work</h3>
      <small class="pull-right">Home / Works</small>
    </div>
  </div>
</div>
<div class="container list-container">
  <div class="row">

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $loop = new WP_Query( array(
      'post_type'     => 'works',
      'orderby'       => 'post_id',
      'posts_per_page'=> '4',
      'paged'         => $paged,
      'order'         => 'DESC'
    ) ); ?>

    <?php $count = 1; while($loop->have_posts()) : $loop->the_post() ?>
      <div class="col-sm-6">
        <a href="/worksingle.html"><img src="<?php the_field('work_image'); ?>" />
        <h5>Work Title Here</h5></a>
        <ul class="list-info">
          <li><i class="fa fa-calendar" aria-hidden="true"></i>26th June 2016</li>
          <li><i class="fa fa-comment" aria-hidden="true"></i>13 Comments</li>
        </ul>
        <p class="list-text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!
        </p>
        <a class="readMore" href="/blogsingle.html">Read More</a>
      </div>

      <?php if ($count % 2== 0): ?>
      </div>
      <div class="row">
      <?php endif ?>
    <?php $count++; endwhile; ?>

  </div>
  <div class="pagination clearfix">
    <div class="pull-left">
      <?php previous_posts_link('Previous'); ?>
    </div>
    <div class="pull-right">
      <?php next_posts_link('Next', $loop->max_num_pages); ?>
    </div>
  </div>
</div>

<?php
get_footer();
