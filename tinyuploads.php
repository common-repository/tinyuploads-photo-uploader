<?php
  /*
Plugin Name: TinyUploads Photo Uploader
Plugin URI: http://wordpress.tinyuploads.com/
Description: TinyUploads is a fast and simple way to get images online.  Automatically resize and upload pictures for your blog.  Choose from 3 different thumbnail sizes, write captions, re-order images, and more.  
Version: 1.1
Author: TinyUploads
  */

// Hook for adding admin menus
add_action('admin_menu', 'add_tinyuploads_tab');

// action function for above hook
function add_tinyuploads_tab() {

  add_menu_page('TinyUploads', 'TinyUploads', 'manage_options', 'tinyuploads', 'tinyuploads_tab', 'http://tinyuploads.com/images/favicon.gif');
}


function tinyuploads_tab() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  $email =  wp_get_current_user()->user_email;

  echo '<div class="wrap">';
  echo '<iframe id=tu_iframe src="http://tinyuploads.com/?email='.$email.'&wp=1" frameborder=0 marginwidth=0 marginheight=0 style="overflow-x:hidden;overflow-y;auto;border:0px #000 solid;" width=1000 height=600></iframe>';
  echo '</div>';
  echo <<<EOF
<script>
    function resizeIframe(){
    var bodyheight = document.body.clientHeight;
    var h = bodyheight-100;
    var iframe = document.getElementById('tu_iframe');
    if(h > 600) iframe.height=h;
  }
  resizeIframe();
</script>
EOF;
}


