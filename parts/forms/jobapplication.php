<?php
/*
Title: Job Application
Method: post
Message: Your Job Application Has Been Received
Logged in: false
*/

  // Where to save this form
  piklist('field', array(
    'type' => 'hidden',
    'scope' => 'post',
    'field' => 'post_type',
    'value' => 'Job Application'
  ) );

  piklist('field', array(
    'type' => 'text',
    'field' => 'post_title',
    'scope' => 'post',
    'label' => __( 'Your Name' )
  ) );

  piklist('field', array(
    'type' => 'textarea',
    'field' => 'post_content',
    'scope' => 'post',
    'label' => __( 'Your Biography' )
  ) );

   piklist('field', array(
    'type' => 'file',
    'field' => 'candidate_image',
    'scope' => 'post_meta',
    'label' => __( 'Your Photo' )
  ) );

  piklist('field', array(
    'type' => 'text',
    'field' => 'email',
    'scope' => 'post_meta',
    'label' => __( 'Email' )
  ) );

  piklist('field', array(
    'type' => 'text',
    'field' => 'phone',
    'scope' => 'post_meta',
    'label' => __( 'Phone Number' )
  ) );

  piklist('field', array(
    'type' => 'hidden',
    'field' => 'post_status',
    'scope' => 'post',
    'value' => 'pending'
  ) );

  // Submit button
  piklist('field', array(
    'type' => 'submit',
    'field' => 'submit',
    'value' => 'Apply'
  ));