<?php
/**
 * Template Name: Full Width
 */

get_header(); ?>

		<div id="fight" class="one-column container-fluid">
				<div class="featured-image">
					<?php the_post_thumbnail('onecolumn-image', array('title' => get_the_title())); ?>
				</div>
				<div class="entry-content">
	      		<?php get_template_part( 'loop', 'page' );
	      			$name = get_post_meta( $post->ID, '_cmb_name', true );
	      			$name_two = get_post_meta( $post->ID, '_cmb_name_two', true ); 
	      			$height = get_post_meta( $post->ID, '_cmb_height', true );
	      			$height_two = get_post_meta( $post->ID, '_cmb_height_two', true );
	      			$weight = get_post_meta( $post->ID, '_cmb_weight', true );
	      			$weight_two = get_post_meta( $post->ID, '_cmb_weight_two', true );
	      			$hometown = get_post_meta( $post->ID, '_cmb_hometown', true );
	      			$hometown_two = get_post_meta( $post->ID, '_cmb_hometown_two', true );
	      			$job = get_post_meta( $post->ID, '_cmb_occupation', true );
	      			$job_two = get_post_meta( $post->ID, '_cmb_occupation_two', true );
	      			$pic = get_post_meta( $post->ID, '_cmb_headshot', true );
	      			$pic_two = get_post_meta( $post->ID, '_cmb_headshot_two', true );
	      			$bio = get_post_meta( $post->ID, '_cmb_bio', true );
	      			$bio_two = get_post_meta( $post->ID, '_cmb_bio_two', true );
	      			$position = get_post_meta( $post->ID, '_cmb_position', true );
	      			$position_two = get_post_meta( $post->ID, '_cmb_position_two', true );

	      		?>
	      			
	      			<h1 class="fight_title"><?php echo $name ?><img  id="versus" src="wp-content/themes/vlrfc_theme/images/versus.png"><?php echo $name_two ?></h1>

	      			<div class="fighter_one col-sm-5 fighter">
	      				<h3 class="boxer_name col-sm-6"><?php echo $name; ?></h3>
	      				<h3 class="boxer_height col-sm-6"><?php echo $height; ?></h3>
	      				<img src="<?php echo $pic ?>">
	      				<h3><span class="glyphicon glyphicon-user">Stats</span></h3>
	      				<?php 
	      					if($weight){ echo '<h4>Weight: ' . $weight . '</h4>' ;} 
	      					if($hometown){ echo '<h4>Hometown: ' . $hometown . '</h4>' ;} 
	      					if($job){ echo '<h4>Occupation: ' . $job . '</h4>' ;} 
	      					if($position){ echo '<h4>Position: ' . $position . '</h4>' ;}
	      					if($bio){ echo '<h4>Bio: ' . $bio . '</h4>' ;} 

	      				?>
	      			</div>
	      			<div class="fighter_two col-sm-5 fighter">
						<h3 class="boxer_name col-sm-6"><?php echo $name_two; ?></h3>
	      				<h3 class="boxer_height col-sm-6"><?php echo $height_two; ?></h3>
	      				<img src="<?php echo $pic_two ?>">
	      				<h3><span class="glyphicon glyphicon-user">Stats</span></h3>
	      				<?php 
	      					if($weight_two){ echo '<h4>Weight: ' . $weight_two . '</h4>' ;} 
	      					if($hometown_two){ echo '<h4>Hometown: ' . $hometown_two . '</h4>' ;} 
	      					if($job_two){ echo '<h4>Occupation: ' . $job_two . '</h4>' ;} 
	      					if($position_two){ echo '<h4>Position: ' . $position_two . '</h4>' ;}
	      					if($bio_two){ echo '<h4>Bio: ' . $bio_two . '</h4>' ;} 
	      				 ?>
	      			</div>
	      			<div class="progress progress-striped col-xs-12">
						<div class="progress-bar progress-bar-danger active" style="width: 0%;">
							<span class="sr-only">0% Complete</span>
						</div>
					</div>
	      		</div>
		</div><!-- #container -->
<?php comments_template( '', true ); ?>
<?php get_footer(); ?>
<script>
	jQuery(document).ready(function(){
		jQuery(".progress").before(jQuery("div .wdf_goal"));
		// get the progress percentage and set our progress bar to it
		var percentage = jQuery(".wdf_goal_progress").attr("aria-valuenow");
		jQuery(".progress-bar-danger").width(percentage.concat("%"));

		// move social media to after fighter
		jQuery("#fight").after(jQuery(".twitter-share-button"));
		jQuery("#fight").after(jQuery(".fb-like"));

		//move fundraising panel to above progress bar
		jQuery(".progress").after(jQuery(".wdf_fundraiser_panel"));
		jQuery(".wdf_fundraiser_panel").after(jQuery(".progress"));

	});
</script>
