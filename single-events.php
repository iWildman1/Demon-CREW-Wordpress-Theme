<?php get_header(); ?>

<div class="list-header">
  <?php while( have_posts()) : the_post(); ?>
  <?php
    //Variable setup

    $banner     = get_field('event_banner');
    $date       = get_field('event_date');
    $location   = get_field('event_location');
    $info       = get_field('event_information');
  ?>
  <div class="container">
    <div class="row clearfix">
      <h3 class="pull-left">Upcoming Events</h3>
      <small class="pull-right">Home / Events / <?php the_title(); ?></small>
    </div>
  </div>
</div>

<div class="container single-container">
  <div class="event">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h1><?php the_title(); ?></h1>
        <img src="<?php echo $banner ?>" alt="" />
        <div class="single-event-info">
          <div class="container-fluid">
            <div class="row">
              <p class="event-main-description">
              <div class="col-md-6">
                <div class="single-event-box clearfix">
                  <table>
                    <tr>
                      <td class="td-lead"><p><i class="fa fa-pencil"></i>Event Title:</p></td>
                      <td><p><?php the_title(); ?></p></td>
                    </tr>
                    <tr>
                      <td class="td-lead"><p><i class="fa fa-calendar"></i>Event Date:</p></td>
                      <td><p><?php $date = new DateTime($date); echo $date->format('jS F Y') ?></p></td>
                    </tr>
                    <tr>
                      <td class="td-lead"><p><i class="fa fa-map-marker"></i>Event Location:</p></td>
                      <td><p><?php echo $location ?></p></td>
                    </tr>
                  </table>
                </div>
              </div>
                  <span class="event-words"><?php echo $info ?></span>
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>

<?php get_footer() ?>
