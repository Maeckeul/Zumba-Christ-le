<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.zumba-christele.com
 * @since      0.0.1
 *
 * @package    Planning
 * @subpackage Planning/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Planning
 * @subpackage Planning/public
 * @author     Zumba Christèle <contact@zumba-christele.com>
 */
class Planning_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public static function planning_displayPlanning($id, $nonce, $content)
	{			
		
		require_once SYET_PATH . 'public/controller/PlanningControllerPlanning.php';
		$controller = PlanningControllerPlanning::planning_displayPlanning($id, $nonce, $content);
		return $controller;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name."uikit", plugin_dir_url( __FILE__ ) . 'css/uikit.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/planning-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster", plugin_dir_url( __FILE__ ) . 'tooltipster/css/tooltipster.bundle.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster2", plugin_dir_url( __FILE__ ) . 'tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css', array(), $this->version, 'all' );
		
	
		

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name . "uikit-icon", 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.3/js/uikit-core.min.js', "", $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/planning-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " createcss", plugin_dir_url( __FILE__ ) . 'js/jquery.injectCSS.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " tooltipster", plugin_dir_url( __FILE__ ) . 'tooltipster/js/tooltipster.bundle.min.js', array( 'jquery' ), $this->version, false );
		
	}
}