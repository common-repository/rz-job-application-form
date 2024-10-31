<?php get_header();
  global $post;
 ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h4><?php echo get_the_date(); ?></h4>
    <button type="button" class="btn btn-primary" onclick="window.print()">Print CV</button>
    
    <?php 
	$image_id = get_post_meta(get_the_id(), 'candidate_image', true);
	$image_data =  wp_get_attachment_image_src($image_id, 'full');
    ?> 

   <img style="width:250px; float:left; padding-right:20px; " src="<?php echo $image_data[0];?>"/> 
   <p>Name : <?php the_title();?></p>
   <p>Email : <?php echo get_post_meta(get_the_id(), 'email', true);?></p>
   <p>Phone : <?php echo get_post_meta(get_the_id(), 'phone', true);?></p>
   <p>Address :</p>

    <p style="text-align:justify; font-size: 18px; line-height: 1.6;"><?php echo $post->post_content; ?></p>

    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>

<?php get_footer(); ?>




