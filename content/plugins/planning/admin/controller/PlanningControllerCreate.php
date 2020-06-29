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
 * @subpackage planning/admin/controller
 */

if (!defined('WPINC')){die;}

class PlanningControllerCreate {

	public function __construct() {
  	}

  	public static function planning_display() {
	    require_once SYET_PATH . "admin/models/PlanningModelCreate.php";
	    $model = new PlanningModelCreate();
	    $count = $model->planning_display();

	    require_once SYET_PATH . "admin/views/PlanningViewCreate.php";
	    $view = new PlanningViewCreate($model);
	    if ($count == 0)
	    {
	    	$view->planning_display($model);
	    }
	    else 
	    {
	    	$view->planning_displayToo($model);
	    }
  	}

  	public static function planning_saveTimetable($data) {
  		check_ajax_referer('nonce_easytimetable', 'saveSecurity');
	    require_once SYET_PATH . "admin/models/PlanningModelCreate.php";
	    $model = PlanningModelCreate::planning_saveTimetable($data);
	    
	    require_once SYET_PATH . "admin/views/PlanningViewCreate.php";
	    
	    PlanningViewCreate::planning_afterSave((int)$model[0]->id);
  	}

  	public static function planning_editPlanning($data) {
  		check_ajax_referer('nonce_easytimetable', 'saveSecurity');
	    require_once SYET_PATH . "admin/models/PlanningModelCreate.php";
	    $model = PlanningModelCreate::planning_editPlanning((int)$data['id']);

	    require_once SYET_PATH . "admin/views/PlanningViewCreate.php";
	    $view = new PlanningViewCreate($model);
	    $view->planning_editPlanning($model);
  	}
	
}