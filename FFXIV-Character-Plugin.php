<?php
/**
 * Plugin Name: FFXIV Character Plugin
 * Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
 * Description: A Plugin that uses the Lodestone API from FFXIV Pads to display your Character on FFXIV
 * Version: 1.0.0
 * Author: Coronoro
 * License: GPL2
 */
 
global $ffxiv_character_db_version;
$ffxiv_character_db_version = '1.0';
 
 function addCharacter(){
 
 }
 
 function ffxiv_character_install(){
	global $wpdb;

	$table_name = $wpdb->prefix . "User_Character"; 
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		user_id bigint(20) unsigned NOT NULL default '0',
		char_id mediumint(9) NOT NULL,
		char_name tinytext NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		text text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		KEY user_id (user_id),
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	
	add_option( 'ffxiv_character_db_version', $ffxiv_character_db_version );
   
 }
 
 register_activation_hook( __FILE__, 'ffxiv_character_install' );
 
?>
