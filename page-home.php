<?php
/**
 * Template Name: Home Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Demon_CREW
 */

get_header('home'); ?>

<?php
  // Header Section Custom fields

  $header_tagline     = get_field('header_tagline');
  $header_image       = get_field('header_image');

  //About Section Custom fields

  $about_title        = get_field('about_heading_content');
  $about_subtitle     = get_field('about_subheading_content');
  $chair_name         = get_field('chairperson_name');
  $chair_image        = get_field('chairperson_image');
  $secretary_name     = get_field('secretary_name');
  $secretary_image    = get_field('secretary_image');
  $treasurer_name     = get_field('treasurer_name');
  $treasurer_image    = get_field('treasurer_image');
  $hs_name            = get_field('hs_name');
  $hs_image           = get_field('hs_image');

  //Works Section Custom fields

  $works_header       = get_field('works_home_header');

  //Blog Section Custom fields

  $blog_bg_image      = get_field('blog_background_image');

  //Date setup

  $current_date       = date('Ymd', strtotime("now"));
  $future_date        = date('Ymd', strtotime("+12 months"));

 ?>

<section id="header" style="background-image: url(<?php echo $header_image['url']?>)">
  <div class="header-text">
    <h1><?php echo $header_tagline ?></h1>
    <a class="btn btn-primary" href="#work">View Our Work</a>
  </div>
  <a href="#about"><i class="fa fa-angle-down"></i></a>
</section>
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h4><?php echo $about_title ?></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <p class="lead">
          <?php echo $about_subtitle ?>
        </p>
      </div>
    </div>
    <div class="meet-the-team">
      <div class="row">
        <div class="col-md-3 col-sm-6">
            <img src="<?php echo $chair_image['url'] ?>"/>
            <h6><?php echo $chair_name ?></h6>
            <small>Chair</small>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="<?php echo $secretary_image['url'] ?>" />
            <h6><?php echo $secretary_name ?></h6>
            <small>Secretary</small>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="<?php echo $treasurer_image['url'] ?>" />
            <h6><?php echo $treasurer_name ?></h6>
            <small>Treasurer</small>
        </div>
        <div class="col-md-3 col-sm-6">
            <img src="<?php echo $hs_image['url'] ?>" />
            <h6><?php echo $hs_name ?></h6>
            <small>Health and Safety Officer</small>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="work">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <p class="lead">
          <?php echo $works_header ?>
        </p>
      </div>
    </div>
  </div>
  <div class="work-masonry">
    <div class="masonry-container">

      <?php $loop = new WP_Query( array(
        'post_type'     => 'works',
        'orderby'       => 'post_id',
        'order'         => 'DESC',
        'post_count'    => '4',
        'posts_per_page'=> '4'
      ) );?>

      <?php $count = 1; $masonry_class = ''; while($loop->have_posts() ) : $loop->the_post();

        switch ($count) {
          case 1:
            $masonry_class = 'masonry-main';
            break;
          case 2:
            $masonry_class = 'masonry-upper';
            break;
          case 3:
            $masonry_class = 'masonry-upper-2';
            break;
          case 4:
            $masonry_class = 'masonry-lower';
            break;
          default:
            $masonry_class = '';
            break;
        }
      ?>
      <div class="masonry <?php echo $masonry_class ?>" style="background-image: url('<?php the_field('work_image') ?>')" data-url="<?php the_permalink(); ?>">
        <div class="masonry-info">
          <div class="masonry-text">
            <h5><?php the_title()?></h5>
            <small><?php the_field('work_author')?></small>
          </div>
        </div>
      </div>

      <?php $count++; endwhile; ?>
    </div>
  </div>
  <a href="/work" class="btn btn-secondary" type="a" name="aWork">View More Work</a>
</section>
<section id="events">
  <h1>Upcoming Events</h1>
  <div class="event-grid">
    <div class="container">
      <div class="row">
        <?php $loop = new WP_Query( array(
          'post_type'     => 'events',
          'meta_key'      => 'event_date',
          'meta_compare'  => 'BETWEEN',
          'meta_value'    => array($current_date, $future_date),
          'orderby'       => 'event_date',
          'order'         => 'ASC',
          'post_count'    => '4',
          'posts_per_page'=> '4'
        ) )?>

        <?php while($loop->have_posts()) : $loop->the_post() ?>
        <div class="col-md-6 col-sm-12">
          <div class="col-sm-6">
            <img src="<?php echo get_field('event_image')['url'] ?>" alt="Event 1" />
          </div>
          <div class="col-sm-6">
            <p><?php $return_date = get_field('event_date'); $date = new DateTime($return_date); echo $date->format('jS F Y') ?></p>
            <h5><?php the_title() ?></h5>
            <small><a href="<?php the_permalink(); ?>">Learn More</a></small>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <a href="/events" class="btn btn-secondary" type="a" name="aEvents">View All Events</a>
    </div>
  </div>
</section>
<section id="blog">
  <div class="blog-container" style="background-image: url('<?php echo $blog_bg_image['url'] ?>')">
    <div class="col-md-6 col-md-offset-6">
      <div class="blog-info">
        <?php $loop = new WP_Query( array(
          'post_type'     => 'post',
          'orderby'       => 'post_id',
          'order'         => 'DESC',
          'post_count'    => '3',
          'posts_per_page'=> '4'
        ) ); ?>
        <ul id="blog-rotate">
          <?php while($loop->have_posts()) : $loop->the_post(); ?>
          <li>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p>
              - <?php the_author(); ?>
            </p>
          </li>
          <? endwhile; ?>
        </ul>

        <div class="rotator-box">
          <span class="rotator rotator-full"></span>
          <span class="rotator rotator-empty"></span>
          <span class="rotator rotator-empty"></span>
        </div>
        <a href="/blog" class="btn btn-secondary btn-light" type="a" name="aEvents">View All Blogs</a>
      </div>
    </div>
  </div>
</section>
<section id="contact">
  <div class="container">
    <div class="col-md-12">
      <form class="contact-form" action="index.html" method="post">
        <div class="row">
          <div class="col-md-6">
              <input type="text" name="Name" placeholder="Name">
          </div>
          <div class="col-md-6">
              <input type="text" name="Email Address" placeholder="Email Address">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
              <input type="text" name="Phone" placeholder="Phone">
          </div>
          <div class="col-md-9">
              <input type="text" name="Subject" placeholder="Subject">
          </div>
        </div>
        <div class="row">
          <textarea name="message" rows="1" cols="40" placeholder="Message..."></textarea>
        </div>
      </form>
      <div class="a-container">
        <a class="btn btn-secondary" type="a" name="aEvents">Send Message</a>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
