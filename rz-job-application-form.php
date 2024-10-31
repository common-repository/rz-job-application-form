<?php
/*
Plugin Name: rz Job Application form
Plugin URI: https://devles.com
Description: rz Job Application form is a frontend form Plugin.
Version: 1.0
Author: Rezwan Shiblu
Author URI: https://github.com/Rezwan81
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Domain Path: /languages
Text domain: job-application
Plugin Type: Piklist
*/

/**
 * Checking plugin path
 */
defined( 'ABSPATH' ) or die( 'you are cheating' );

/**
 * Plugin language
 */
function rz_job_application_plugin_load_plugin_textdomain() {

    load_plugin_textdomain( 'job-application', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'rz_job_application_plugin_load_plugin_textdomain' );

/**
*  css jss enqueue 
*/
add_action( 'wp_enqueue_scripts', 'rz_job_jobapplication_scripts_and_styles' );

function rz_job_jobapplication_scripts_and_styles() {

    wp_enqueue_style( 'cv-single-page-custom-css', PLUGINS_URL( '/assets/css/custom.css', __FILE__) );
    wp_enqueue_style( 'cv-single-page-bootstarp-css', PLUGINS_URL( '/assets/css/bootstrap.min.css', __FILE__) );
    
    wp_enqueue_script( 'cv-single-page-bootstarp-js', PLUGINS_URL( '/assets/js/bootstrap.min.js', __FILE__), ['jquery'] );

    wp_enqueue_script( 'cv-single-page-custom-js', PLUGINS_URL( '/assets/js/custom.js',__FILE__) );   
}

/**
* CPT on dashboard
*/
function rz_job_application_form() {

    $labels = array(
        'name'                  => _x( 'Job Applications', 'Job Application Admin Menu Name', 'job-application' ),
        'singular_name'         => _x( 'Job Application', 'Job Application singular name', 'job-application' ),
        'menu_name'             => _x( 'Job Application ', 'Admin Menu text', 'job-application' ),
        'name_admin_bar'        => _x( 'Job Application', 'Add New on admin bar', 'job-application' ),
        'add_new'               => __( 'Add New', 'job-application' ),
        'add_new_item'          => __( 'Add New Job Application', 'job-application' ),
        'new_item'              => __( 'New Job Application', 'job-application' ),
        'edit_item'             => __( 'Edit Job Application', 'job-application' ),
        'view_item'             => __( 'View Job Application', 'job-application' ),
        'all_items'             => __( 'All Job Applications', 'job-application' ),
        'search_items'          => __( 'Search Job Application', 'job-application' ),
        'parent_item_colon'     => __( 'Parent Job Application:', 'job-application' ),
        'not_found'             => __( 'No Job Application found.', 'job-application' ),
        'not_found_in_trash'    => __( 'No Job Application found in Trash.', 'job-application' ),
        'featured_image'        => _x( 'Job Application candidate Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'job-application' ),
        'set_featured_image'    => _x( 'Set candidate image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'job-application' ),
        'remove_featured_image' => _x( 'Remove candidate image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'job-application' ),
        'use_featured_image'    => _x( 'Use as candidate image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'job-application' ),
        'archives'              => _x( 'Job Application archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'job-application' ),
        'insert_into_item'      => _x( 'Insert into Job Application', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'job-application' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Job Application', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'job-application' ),
        'filter_items_list'     => _x( 'Filter Job Application list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'job-application' ),
        'items_list_navigation' => _x( 'Job Application list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'job-application' ),
        'items_list'            => _x( 'Job Application list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'job-application' ),
    );  

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Job Application.', 'job-application' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Job Application' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 2,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array( 'title', 'editor' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'Job Application', $args );

    /**
    * employee types taxonomy
    */
    $labels = array(
        'name'              => _x( 'Employee Types', 'taxonomy general name' ),
        'singular_name'     => _x( 'Employee Type', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Employee Types' ),
        'all_items'         => __( 'All Employee Types' ),
        'parent_item'       => __( 'Parent Employee Type' ),
        'parent_item_colon' => __( 'Parent Employee Type:' ),
        'edit_item'         => __( 'Edit Employee Type' ),
        'update_item'       => __( 'Update Employee Type' ),
        'add_new_item'      => __( 'Add New Employee Type' ),
        'new_item_name'     => __( 'New Employee Type Name' ),
        'menu_name'         => __( 'Employee Type' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'type' ),
    );

    register_taxonomy( 'employee_type', array( 'jobapplication' ), $args );
}

add_action( 'init','rz_job_application_form' );



/**
 * meta box colum
 */
add_filter( 'manage_edit-jobapplication_columns', 'rz_job_application_edit_columns' ) ;

function rz_job_application_edit_columns( $columns ) {

    $columns = array(
        'cb' => '&lt;input type="checkbox" />',
        'title' => __( 'Candidate Name' ),
        'email' => __( 'Email' ),
        'phone' => __( 'Phone' ),
        'employee_type' => __( 'Employee Type' ),
        'candidate_image' => __('Photo'),
        'date' => __( 'Date' )
    );

    return $columns;
}


/**
 * CPT custom coloum on data table
 */
add_action( 'manage_jobapplication_posts_custom_column', 'rz_job_application_manage_columns', 10, 2 );

function rz_job_application_manage_columns( $column, $post_id ) {

    global $post;

    switch( $column ) {

        case 'email' :

            $email = get_post_meta( $post_id, 'email', true );
            if ( empty( $email ) )
                echo __( 'Unknown' );
            else
                echo $email;
            break;

        case 'phone' :

            $phone = get_post_meta( $post_id, 'phone', true );
            if ( empty( $phone ) )
                echo __( 'Unknown' );
            else
                echo $phone;
            break;

        case 'candidate_image' :

            $size = array('100', '100');
            $photo = get_post_meta( $post_id, 'candidate_image', true );

            if ( empty( $photo ) )
                echo __( 'No image' );
            else
                echo wp_get_attachment_image( $photo, $size );
            break;    

        case 'employee_type' :

            $taxonomy = $employee_type;
            $post_type = get_post_type($post_id);

            $terms = get_the_terms( $post_id, 'employee_type' );

            if ( !empty( $terms ) ) {

                foreach ( $terms as $term )
            $post_terms[] ="<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " .esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
            echo join('', $post_terms );
            }

            else {
                _e( 'No Type' );
            }
            break;    

        default :
            break;
    }
}

/**
 * CPT single page
 */
function rz_job_application_single_page( $file ) {
    global $post;

    if( "jobapplication" == $post->post_type ) {

        $file_path = plugin_dir_path(__FILE__)."cpt-templates/single-jobapplication.php";
        $file = $file_path;
    }
    return $file;
}

add_filter( 'single_template', 'rz_job_application_single_page' );



/**
 * CPT page template
 */
function rz_job_application_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

    $post_templates['jobapplication-cpt-page.php'] = __('Candidate CV/Resume');

    return $post_templates;
}

add_filter( 'theme_page_templates', 'rz_job_application_add_template_to_select', 10, 4 );

/**
 * Check if current page has our custom template. Try to load
 * template from theme directory and if not exist.... load it 
 * from root plugin directory.
 */
function rz_job_application_load_plugin_template( $template ) {

    if( get_page_template_slug() === 'jobapplication-cpt-page.php' ) {

        if ( $theme_file = locate_template( array( 'jobapplication-cpt-page.php' ) ) ) {
            $template = $theme_file;
        } else {
            $template = plugin_dir_path( __FILE__ ) . 'jobapplication-cpt-page.php';
        }
    }

    if( $template == '' ) {
        throw new \Exception('No template found');
    }

    return $template;
}

add_filter( 'template_include', 'rz_job_application_load_plugin_template' );

/**
 * Documentation page include
 */
require_once('documentation.php');

/**
 * Admin notice
 */
function rz_job_application_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><a href="https://wordpress.org/plugins/piklist/">PIKLIST</a> Plugin need activated for <a href="#">Job Application Form Plugin</a></p>
    </div>
    <?php
}

add_action( 'admin_notices', 'rz_job_application_notice' );







