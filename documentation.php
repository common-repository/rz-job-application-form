<?php

// adds the submenu to that Custom Post Type:
add_action('admin_menu', 'rz_job_application_documentation');

function rz_job_application_documentation()
{
    add_submenu_page( 'edit.php?post_type=jobapplication', 'Documentation', 'Documentation', 'manage_options', 'documentation', 'rz_job_application_doc');
}

function rz_job_application_doc() 
{ 
	?>  
	    <h1>Use below shortcode for display form on frontend.</h1>
		<h1>Shortcode name: [piklist_form form='jobapplication' add_on='rz-Job-Application-form'] </h1>
	<?php
}
