<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ianua.imagewize.com
 * @since      1.0.0
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the Ianua Projects, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ianua_Projects
 * @subpackage Ianua_Projects/admin
 * @author     Your Name <jasper@imagewize.com>
 */
class Ianua_Projects_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Ianua_Projects    The ID of this plugin.
	 */
	private $Ianua_Projects;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Ianua_Projects       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Ianua_Projects, $version ) {

		$this->Ianua_Projects = $Ianua_Projects;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ianua_Projects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ianua_Projects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Ianua_Projects, plugin_dir_url( __FILE__ ) . 'css/ianua-projects-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ianua_Projects_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ianua_Projects_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->Ianua_Projects, plugin_dir_url( __FILE__ ) . 'js/ianua-projects-admin.js', array( 'jquery' ), $this->version, false );

	}

}
