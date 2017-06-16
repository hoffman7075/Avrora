<?php

    include '../../../wp-load.php';

//    if( 'GET' == $_SERVER['REQUEST_METHOD'] && !empty( $_GET['action'] ) &&  $_GET['action'] == "new_post") {

    // Do some minor form validation to make sure there is content
    if (isset ($_POST['name'])) {
        $title =  $_POST['name'];
    } else {
        echo 'Пожалуйста, введите имя';
    }
        
    $link = $_POST['link'];
        
    $date = date("Y-m-d H:i:s");

    if (isset ($_POST['form-message'])) {
        $description = $_POST['form-message'];
    } else {
        echo 'Пожалуйста, введите отзыв';
    }

    // Add the content of the form to $post as an array
    $new_post = array(
        'post_title'    => $title,
        'post_content'  => $description,
        'post_status'   => 'draft',           // Choose: publish, preview, future, draft, etc.
        'post_type' => 'otzivi',  //'post',page' or use a custom post type if you want to,
        'post_date' => $date,
        'post_date_gmt' => $date
    );
    //save the new post
    $pid = wp_insert_post($new_post);
    set_post_thumbnail( $pid, 242 );
    // save a basic text value
    $field = "link";
    update_field( $field, $link, $pid );
    wp_redirect(get_permalink($pid)); exit;
?>