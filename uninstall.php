<?php

/**
Trigger this file on plugin uninstall
*
*
*@package rjatkhajuriaplugin
*/

if( ! defined('wp_uninstall_plugin')){
	die;
}
 
 // clear database stored data 
 
 //$books = get_posts(array( 'post_type' => 'books', 'numberposts' => -1) )
 
 //foreach( $books as $book ) {
	// wp_delete_post($book->ID, false );
 //}
 
 // access the database via sql
 
 global $wpdb;
 $wpdb->query("DELETE FROM wp_post WHERE post_type = 'book'");
 
 $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
 $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");