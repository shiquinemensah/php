<?php
/**
*Trigger this file on Plugin uninstall
*
* @package SxodPlugin
*
*/

if (! defined ('WP_UNINSTALL_PLUGIN')) {
    die; 
}

// // Clear Database stored data
// $books = get_posts( array('post_type' => 'book', 'numberposts' => -1));

// foreach( $books as $book ) {
//     wp_delete_post($book->ID, false);// true delets all the podts no regards for the data
    
// }

// access the database through SQL 
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type= 'book'");
$wpdb->query(" DELETE FROM wp_postmeta WHERE post_id Not IN (SELECT if FROM wp_posts)");


