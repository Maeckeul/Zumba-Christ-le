<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.zumba-christele.com
 * @since      0.0.1
 *
 * @package    planning
 * @subpackage planning/admin/models
 */

if (!defined('WPINC')){die;}

class PlanningControllerList {

	public function __construct() {
  	}

  	public static function planning_displayPlanning() {
	    require_once SYET_PATH . "admin/models/PlanningModelList.php";
	    $model = new PlanningModelList();

	    require_once SYET_PATH . "admin/views/PlanningViewList.php";
	    $view = new PlanningViewList($model);
	    $view->planning_displayPlanning($model);
	  }

  	public static function planning_deletePlanning($data) {
  		check_ajax_referer('nonce_easytimetable', 'saveSecurity');
	    require_once SYET_PATH . "admin/models/PlanningModelList.php";
	    $model = new PlanningModelList($data);
	    $result = $model->planning_deleteItem($data);

	    require_once SYET_PATH . "admin/views/PlanningViewList.php";
	    $view = new PlanningViewList($model);
	    $view->planning_displayPlanning($model);
  	}
	
}