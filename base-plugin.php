<?php
/**
 * Plugin Name: Base Plugin
 * Plugin URI: http://typoglyphic.com
 * Description: This is a base WordPress plugin with the ability to update from github
 * Version: 0.1
 * Author: Bryan Bielefeldt
 * Author URI: http://typoglyphic.com
 * License: GPL2
 */

/*
|--------------------------------------------------------------------------
| include updater
|--------------------------------------------------------------------------
*/
	include_once('updates/updater.class.php');
	// set configuration
	if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
		$config = array(
			'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
			'proper_folder_name' => 'base-plugin', // this is the name of the folder your plugin lives in
			'api_url' => 'https://api.github.com/repos/bielefeldt/base-plugin',
			'raw_url' => 'https://raw.github.com/bielefeldt/base-plugin/master',
			'github_url' => 'https://github.com/bielefeldt/base-plugin',
			'zip_url' => 'https://github.com/bielefeldt/base-plugin/archive/master.zip',
			'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
			'requires' => '3.9', // which version of WordPress does your plugin require?
			'tested' => '3.9', // which version of WordPress is your plugin tested up to?
			'readme' => 'README.txt', // which file to use as the readme for the version number
			//'access_token' => '', // Access private repositories by authorizing under Appearance > Github Updates when this example plugin is installed
		);
		new WP_GitHub_Updater($config);
	}
/*
|--------------------------------------------------------------------------
| remove links from comments
|--------------------------------------------------------------------------
*/
	include( dirname(__FILE__).'/library/functions.class.php' );
	$init_config = array (
			//...
		);
	new plugin_BaseClass($init_config);

?>