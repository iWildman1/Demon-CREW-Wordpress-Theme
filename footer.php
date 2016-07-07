<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Demon_CREW
 */

?>

<section id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h5>Site Links</h5>
				<?php
					wp_nav_menu( array(
						'theme_location'		=> 'footer'
					) );
				?>
			</div>
			<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
				<h5>Subscribe</h5>
				<input type="text" name="Subscribe" placeholder="Enter Email Address">
				<a class="btn btn-secondary btn-light" type="a" name="aEvents" >Subscribe</a>
			</div>
			<div class="col-md-4 col-sm-12">
				<h5>Contact</h5>
				<p>
					De Montfort University<br>
					Leicester, UK
				</p>
			</div>
		</div>
	</div>
	<div class="lower-footer">
		<div class="container">
			<div class="text-central">
				<p>
					Copyright &copy Demon CREW 2016. Designed and Developed by Daniel Wildman
				</p>
			</div>
		</div>
	</div>
</section>
</div><!-- #content -->

<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/scrollspy.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/init.js"></script>

</body>
</html>
