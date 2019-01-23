<?php
/**
 * @rajatkhajuria plugin
 */
 /*
 Plugin Name: rajatkhajuria plugin
 Plugin URI: https://rajatkhajuriaplugin.com/
 Description: This is my first attempt to write a custom plugin.
 Version: 1.0
 Author: Rajat Khajuria
 Author URI: https://rajatkhajuriaplugin.com/wordpress-plugins/
 License: GPLv2 or later
Text Domain: rajatkhajuriaplugin
 */
 
 /*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die('Hey,what are you doing here? you silly human!')

class Rajatkhajuriaplugin
{
	
	
	public $plugin;
	
	function__construct(){
		$this.plugin= plugin_basename(__file__);
	}
		
    function register(){
		add_action( 'admin_enqueue_scripts',array($this,'enqueue'));
		
		add_action('admin_menu',array($this,'add_admin_pages'));
		
		
		add_filter("plugin_action_link_'.$this->plugin",array($this,'setting_link'));
		
		
	}	
	
	public function settings_link($links){
		// add custom settings link
	}
	
	public function add_admin_pages(){
		add_menu_pages('rajatkhajuriaplugin','rajatkhajuria','manage_options','rajatkhajuria_plugin',array($this, 'admin_index' ),'dash-store', 110);
		
	}
	
	public function admin_index(){
		require_once plugin_dir_path(__file__).'templates/admin.php';
	}
	protected function create_post_type(){
		add_action( 'init', array($this,'custom_post_type'));
		
	}
		
		
    function activate(){
		// generate  CPT
		$this->custom_post_type();
		//flush rewrite ruleses
		flush_rewrite_rules();
		}
		
	function deactivate(){
		//flush rewrite rules
		flush_rewrite_rules();
		}
	 
		 
 
    function custom_post_type(){
		register_post_type('book',['public'=>'true,'label' => 'books']);
		}

    
	function enqueue() {
		// enqueue all our scrips
		wp_enqueue_style('mypluginstyle',plugins_url( '/assets/mystyle.css',__file__));
		wp_enqueue_script('mypluginstyle',plugins_url( '/assets/mystyle.js',__file__));
		}

	private function print_stuff(){
		echo 'Test';
	}	
}
 



if ( class_exists('rajatkhajuriaplugin')){
	$rajatkhajuriaplugin = new rajatkhajuriaplugin();
	$rajatkhajuriaplugin->register();
	
	
	
}

$secondclass = newsecondclass();
$secondclass-> register_post_type();



//activation
register_activation_hook(__file__,array( $rajatkhajuriaplugin, 'activate'));
//deactivation
require_once plugin_dir_path(__file__).'inc/'rajatkhajuria-plugin-deactivate.php';
register_deactivation_hook(__file__,array( $rajatkhajuriaplugin, 'deactivate'));


