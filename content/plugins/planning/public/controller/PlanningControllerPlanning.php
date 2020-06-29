<?php 
/**
 * Provide public display
 *
 *
 * @link       http://www.zumba.com
 * @since      0.0.1
 *
 * @package    planning
 * @subpackage planning/public/controller
 */

if (!defined('WPINC')){die;}

class PlanningControllerPlanning {

	public function __construct() {
  	}

  	public static function planning_displayPlanning($id, $nonce, $content) {
  		
  		

			require_once SYET_PATH . "public/models/PlanningModelPlanning.php";
		    $model = new PlanningModelPlanning();
		    $modelForView = $model->planning_displayPlanning($id);
		    //var_dump($model->planning_displayPlanning($id));

		    require_once SYET_PATH . "public/views/PlanningViewPlanning.php";
		    $view = new PlanningViewPlanning($model);
		    $view->planning_displayPlanning($modelForView, $content);
		
	    
  	}
}

?>