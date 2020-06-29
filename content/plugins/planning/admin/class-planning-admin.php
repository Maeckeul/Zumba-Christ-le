<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.zumba-christele.com
 * @since      0.0.1
 *
 * @package    planning
 * @subpackage planning/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    planning
 * @subpackage planning/admin
 * @author     Zumba Christèle <contact@zumba-christele.com>
 */
class Planning_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public static function planning_displayAdmin()
	{			
		require_once SYET_PATH . 'admin/controller/PlanningControllerList.php';
		$controller = PlanningControllerList::planning_displayPlanning();
		return $controller;
	}

	public static function planning_createNew() {
		require_once SYET_PATH . 'admin/controller/PlanningControllerCreate.php';
		$display = PlanningControllerCreate::planning_display();
		return $display;
	}
	
	public static function planning_saveTimetable($data) {
		require_once SYET_PATH . 'admin/controller/PlanningControllerCreate.php';
		$save = PlanningControllerCreate::planning_saveTimetable($data);
		return $save;
	}
	
	public static function planning_editPlanning($data) {
		require_once SYET_PATH . 'admin/controller/PlanningControllerCreate.php';
		$edit = PlanningControllerCreate::planning_editPlanning($data);
		return $edit;
	}
	public static function planning_deletePlanning($id) {
		require_once SYET_PATH . 'admin/controller/PlanningControllerList.php';
		$delete = PlanningControllerList::planning_deletePlanning($id);
		return $delete;
	}
	public static function planning_duplicatePlanning($id) {
		require_once SYET_PATH . 'admin/controller/PlanningControllerList.php';
		$duplicate = PlanningControllerList::planning_duplicatePlanning($id);
		return $duplicate;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/planning-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " colpick", plugin_dir_url( __FILE__ ) . 'css/colpick.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " datetimepicker", plugin_dir_url( __FILE__ ) . 'css/jquery.datetimepicker.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster", plugin_dir_url( __FILE__ ) . 'js/tooltipster/css/tooltipster.bundle.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster2", plugin_dir_url( __FILE__ ) . 'js/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster3", plugin_dir_url( __FILE__ ) . 'js/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.0.1
	 */
	public function enqueue_scripts() {

		wp_enqueue_script('jQuery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', "", "", true);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/planning-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " colpick", plugin_dir_url( __FILE__ ) . 'js/colpick.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " datetimepicker", plugin_dir_url( __FILE__ ) . 'js/jquery.datetimepicker.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " copytoclipboard", plugin_dir_url( __FILE__ ) . 'js/clipboard.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " tooltipster", plugin_dir_url( __FILE__ ) . 'js/tooltipster/js/tooltipster.bundle.min.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/planning-admin.js', array('jquery') );
		wp_enqueue_script('jquery');
	}

}