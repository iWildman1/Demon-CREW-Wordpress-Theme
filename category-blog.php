<?php
  get_header();
?>

<div class="list-header">
  <div class="container">
    <div class="row clearfix">
      <h3 class="pull-left">Our Blogs</h3>
      <small class="pull-right">Home / Blog</small>
    </div>
  </div>
</div>
<div class="container list-container">
  <div class="row">

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $loop = new WP_Query( array(
      'post_type'       => 'post',
      'orderby'         => 'post_id',
      'paged'           => $paged,
      'order'           => 'DESC',
      'posts_per_page'  => 9
    ) ) ?>

    <?php while($loop->have_posts()) : $loop->the_post() ?>
      <div class="col-md-4 col-sm-6">
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?>
        <h5><?php the_title(); ?></h5></a>
        <ul class="list-info">
          <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date() ?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><?php comments_number(); ?></li>
        </ul>
        <p class="list-text">
          <?php the_excerpt(); ?>
        </p>
        <a class="readMore" href="<?php the_permalink() ?>">Read More</a>
      </div>
    <?php endwhile; ?>

  </div>
  <div class="pagination clearfix">
    <div class="pull-left">
      <?php previous_posts_link( 'Previous' ); ?>
    </div>
    <div class="pull-right">
      <?php next_posts_link('Next', $loop->max_num_pages); ?>
    </div>
  </div>
</div>

<?php
 get_footer();
