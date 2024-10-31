<?php
/**
* Title: Job Application Information
* Post Type: jobapplication, post
*/

  piklist('field', array(
	'type'  => 'text',
	'field' => 'email',
	'scope' => 'post_meta',
	'label' => __( 'Email' )
	) );

  piklist('field', array(
    'type'  => 'text',
    'field' => 'phone',
    'scope' => 'post_meta',
    'label' => __( 'Phone Number' )
  ) );

  piklist('field', array(
    'type'  => 'file',
    'field' => 'candidate_image',
    'scope' => 'post_meta',
    'label' => __( 'Your Photo' )
  ) );

  

  