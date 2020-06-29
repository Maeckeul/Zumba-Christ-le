<?php 

/**
 * Provide Public display
 *
 *
 * @link       http://www.zumba-christele.com
 * @since      0.0.1
 *
 * @package    planning
 * @subpackage planning/public/models
 */

if (!defined('WPINC')){die;}

class PlanningModelPlanning  {

	function __construct()
	{

	}
	public static function planning_displayPlanning($id) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'planning';
    	$results = $wpdb->get_results(
            $wpdb->prepare("
            SELECT *
            FROM $table_name
            WHERE id = %d
            ",$id)
        );
        return $results;
	}

}
?>