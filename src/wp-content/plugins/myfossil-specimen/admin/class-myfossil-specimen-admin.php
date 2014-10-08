<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://atmoapps.com
 * @since      0.0.1
 *
 * @package    myFOSSIL
 * @subpackage myFOSSIL/includes
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to enqueue
 * the dashboard-specific stylesheet and JavaScript.
 *
 * @package    myFOSSIL
 * @subpackage myFOSSIL/admin
 * @author     Brandon Wood <bwood@atmoapps.com>
 */
class myFOSSIL_Specimen_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $name    The ID of this plugin.
	 */
	private $name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.0.1
	 * @var      string    $name       The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $name, $version ) {
		$this->name = $name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		/**
         * This function is provided for demonstration purposes only.
		 *
         * An instance of this class should be passed to the run() function
         * defined in myFOSSIL_Specimen_Admin_Loader as all of the hooks are
         * defined in that particular class.
		 *
         * The myFOSSIL_Specimen_Admin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this class.
		 */

        wp_enqueue_style( $this->name, plugin_dir_url( __FILE__ ) .
                'css/myfossil-specimen-admin.css', array(), $this->version,
                'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		/**
         * This function is provided for demonstration purposes only.
		 *
         * An instance of this class should be passed to the run() function
         * defined in myFOSSIL_Specimen_Admin_Loader as all of the hooks are
         * defined in that particular class.
		 *
         * The myFOSSIL_Specimen_Admin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this class.
		 */

        wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) .
                'js/myfossil-specimen-admin.js', array( 'jquery' ),
                $this->version, false );

	}

}
