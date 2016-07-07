<?php
/**
 * The template for displaying event archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Demon_CREW
 */

get_header(); ?>

<?php
  //Date Variables. Needed for later comparison.

  $current_date = date('Ymd', strtotime("now"));
  $future_date = date('Ymd', strtotime("+12 months"));
 ?>

<div class="list-header">
  <div class="container">
    <div class="row clearfix">
      <h3 class="pull-left">Upcoming Events</h3>
      <small class="pull-right">Home / Events</small>
    </div>
  </div>
</div>

<div class="events-container">
  <div class="event-header">
    <div class="event-title">
      <h6>Today</h6>
    </div>
  </div>

  <?php $loop = new WP_Query( array(
    'post_type'     => 'events',
    'meta_key'      => 'event_date',
    'meta_compare'  => 'BETWEEN',
    'meta_value'    => array($current_date, $future_date),
    'orderby'       => 'event_date',
    'order'         => 'ASC',
    'posts_per_page'=> -1
  ) ); ?>

  <?php while($loop->have_posts()) : $loop->the_post(); ?>
  <div class="timeline-block clearfix">
    <div class="timeline-connector">
    </div>
    <div class="timeline-content clearfix">
      <h2><?php the_title(); ?></h2>
      <small><?php $date = get_field('event_date'); $date = new DateTime($date); echo $date->format('jS F Y') ?></small>
      <p>
        <?php the_field('event_excerpt') ?>
      </p>
      <a href="<?php the_permalink(); ?>">Read More</a>
    </div>
  </div>
<?php endwhile; ?>

</div>

<?php
get_footer();
