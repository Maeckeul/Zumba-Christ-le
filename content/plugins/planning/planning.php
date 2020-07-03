<?php

/**  
 * @wordpress-plugin
 * Plugin Name:       Planning  
 * Description:       The Best Planning of the World
 * Version:           0.0.1
 * Author:            Maeckeul, Davy et Cécile
 * License:           VPTCS
 * License URI:       http://www.vptcs.org/licenses/vptcs-1.0.txt
 * Text Domain:       planning
 */

if(!defined('WPINC')){die;}
define( 'SYET_PATH', plugin_dir_path( __FILE__ ) );
define( 'SYET_URL', plugin_dir_url( __FILE__ ) );
add_filter('widget_text', 'do_shortcode');

function activate_planning() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-planning-activator.php';
    Planning_Activator::planning_activate();
    Planning_Activator::planning_create_table("planning");
}

register_activation_hook(__FILE__, 'activate_planning');

function deactivate_planning() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-planning-deactivator.php';
	Planning_Deactivator ::planning_deactivate();
}

register_activation_hook( __FILE__, 'activate_planning' );
register_deactivation_hook( __FILE__, 'deactivate_planning' );

require plugin_dir_path( __FILE__ ) . 'includes/class-planning.php';

function planning_run_easy_timetable() {

    $pluggin = new Planning();
    $pluggin->run();
}

planning_run_easy_timetable();

add_action('admin_menu', 'admin_add_admin_et_menu');

function admin_add_admin_et_menu()
{
    add_menu_page('Planning', 
    	'Planning', 
    	'manage_options', 
    	'planning', 
    	array('Planning_Admin', 'planning_displayAdmin')); 
    add_submenu_page('planning', 
    	'Planning', 
    	__( 'Planning', 'planning' ), 
    	'manage_options', 
    	'planning', 
    	array('Planning_Admin', 'planning_displayAdmin'));
    add_submenu_page('planning', 
    	'Planning - Créer nouveau', 
    	__( 'Ajouter nouveau', 'planning' ), 'manage_options', 
    	'et_create', 
    	array('Planning_Admin', 'planning_createNew'));
}

function planning_save_planning() {
	$data = $_POST;
	//Validating 
	if(isset($data["id"]))
	{
		$data["id"] = intval($data["id"]);
	}
		
	if (!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $data["creation_date"]) || !isset($data["creation_date"])) { 
        $data["creation_date"] = date("Y-m-d H:i:s");
    } 

    if (!isset($data["p_name"]))
    {
    	$data["p_name"] = "My first Schedule";
    }
    $data["p_name"] = sanitize_text_field( $data["p_name"] );
    
    $data["time_mode"] = intval($data["time_mode"]);
    if ( strlen( $data["time_mode"] ) > 1 ) {
	  	$data["time_mode"] = substr( $data["time_mode"], 0, 1 );
	}

    if ( strlen( $data["type"] ) > 1 ) {
	  	$data["type"] = substr( $data["type"], 0, 1 );
	}
	$data["type"] = intval($data["type"]);

	
    if ( strlen( $data["display_title"] ) > 1 ) {
	  	$data["display_title"] = substr( $data["display_title"], 0, 1 );
	}
	$data["display_title"] = intval($data["display_title"]);
	
	
    if ( strlen( $data["display_filters"] ) > 1 ) {
	  	$data["display_filters"] = substr( $data["display_filters"], 0, 1 );
	}
	$data["display_filters"] = intval($data["display_filters"]);
	
	
    if ( strlen( $data["rows"] ) > 2 ) {
	  	$data["rows"] = substr( $data["rows"], 0, 2 );
	}
	$data["rows"] = intval($data["rows"]);
	
	
    if ( strlen( $data["cells"] ) > 2 ) {
	  	$data["cells"] = substr( $data["cells"], 0, 2 );
	}
	$data["cells"] = intval($data["cells"]);
	
	$data["cell_color"] = strip_tags($data["cell_color"]);
    $data["cell_color"] = htmlspecialchars($data["cell_color"]);
    if ( strlen( $data["cell_color"] ) > 6 ) {
	  	$data["cell_color"] = substr( $data["cell_color"], 0, 6 );
	}

	$hexpattern = '/([a-fA-F0-9]{3}){1,2}\b/';
	if (!preg_match($hexpattern, $data["cell_color"]))
	{
		$data["cell_color"] = "f5f5f5";
	}

	
    if ( strlen( $data["print"] ) > 3 ) {
	  	$data["height"] = substr( $data["print"], 0, 3 );
	}
	$data["height"] = intval($data["height"]);
	$data["description"] = htmlspecialchars($data["description"]);


	$data["print"] = intval($data["print"]);
    if ( strlen( $data["print"] ) > 1 ) {
	  	$data["print"] = substr( $data["print"], 0, 1 );
	}
	$data["access"] = intval($data["access"]);
    if ( strlen( $data["access"] ) > 1 ) {
	  	$data["access"] = substr( $data["access"], 0, 1 );
	}
	$data["created_by"] = intval($data["created_by"]);
    
    // Validate json data activities
    $arrayAct = explode(",{", stripslashes($data["activities"]));
    foreach ($arrayAct as $actjson) 
    {
    	if (preg_match('/^"a/', $actjson))
    	{
    		$actjson = '{'.$actjson;
    	}
		if (json_decode($actjson))
        {	
        	$isJson = TRUE;
        }
        else 
        {
        	$isJson = FALSE;
        }
    }
    if ($isJson == TRUE)
    {
    	$data["activities"] = stripslashes($data["activities"]);
    }
    else 
    {
    	$data["activities"] = "";
    }

	// Validate json data scheduledact
	$arrayPlanAct = explode(",{", stripslashes($data["scheduledact"]));
	foreach ($arrayPlanAct as $planactjson) 
	{
		//var_dump($planactjson);
		if(preg_match('/^"d/', $planactjson))
		{
			$planactjson = '{'.$planactjson;
		}
		if (json_decode($planactjson))
        {	
        	$isJsonP = TRUE;
        }
        else 
        {	
        	$isJsonP = FALSE;
        }
        //var_dump($planactjson);
	}
	if ($isJsonP == TRUE)
    {
    	$data["scheduledact"] = stripslashes($data["scheduledact"]);

    }
    else 
    {
    	$data["scheduledact"] = "";
    }
	
	//Sanitazing data
	$data["action"] = sanitize_post_field('action', $data['action'], $data['id'], 'db');
	if (isset($data['id'])) {
		$data["id"] = sanitize_post_field('id', $data['id'], $data['id'], 'db');
	}
	$data["p_name"] = sanitize_text_field($data['p_name']);
	$data["creation_date"] = sanitize_post_field('creation_date', $data['creation_date'], $data['id'], 'db');
	$data["time_mode"] = sanitize_post_field('time_mode', $data['time_mode'], $data['id'], 'db');
	$data["type"] = sanitize_post_field('type', $data['type'], $data['id'], 'db');
	$data["display_title"] = sanitize_post_field('display_title', $data['display_title'], $data['id'], 'db');
	$data["display_filters"] = sanitize_post_field('display_filters', $data['display_filters'], $data['id'], 'db');
	$data["start_h"] = sanitize_post_field('start_h', $data['start_h'], $data['id'], 'db');
	$data["rows"] = sanitize_post_field('rows', $data['rows'], $data['id'], 'db');
	$data["rows_name"] = sanitize_post_field('rows_name', $data['rows_name'], $data['id'], 'db');
	$data["cells"] = sanitize_post_field('cells', $data['cells'], $data['id'], 'db');
	$data["cell_color"] = sanitize_post_field('cell_color', $data['cell_color'], $data['id'], 'db');
	$data["height"] = sanitize_post_field('height', $data['height'], $data['id'], 'db');
	$data["description"] = sanitize_text_field($data['description']);
	$data["activities"] = sanitize_post_field('activities', $data['activities'], $data['id'], 'db');
	$data["scheduledact"] = sanitize_post_field('scheduledact', $data['scheduledact'], $data['id'], 'db');
	$data["days"] = sanitize_post_field('days', $data['days'], $data['id'], 'db');
	$data["print"] = sanitize_post_field('print', $data['print'], $data['id'], 'db');
	$data["created_by"] = sanitize_post_field('created_by', $data['created_by'], $data['id'], 'db');
	$data["access"] = sanitize_post_field('access', $data['access'], $data['id'], 'db');
	//var_dump($data);
	require_once SYET_PATH . 'admin/class-planning-admin.php';
	$save = Planning_Admin::planning_saveTimetable($data);
	return $save;
}

function planning_edit_planning() {

	$data["action"] = sanitize_post_field('action', $_POST['action'], $_POST['id'], 'db');
	$data["id"] = intval($_POST["id"]);
	$data["id"] = sanitize_post_field('id', $data['id'], $data['id'], 'db');
	//var_dump($data);
	require_once SYET_PATH . 'admin/class-planning-admin.php';
	$save = Planning_Admin::planning_editPlanning($data);
	//var_dump($save);
	return $save;
}

function planning_delete_planning() {
	$data["action"] = sanitize_post_field('action', $_POST['action'], $_POST['id'], 'db');
	$data["id"] = intval($_POST["id"]);
	$data["id"] = sanitize_post_field('id', $data['id'], $data['id'], 'db');
	require_once SYET_PATH . 'admin/class-planning-admin.php';
	$delete = Planning_Admin::planning_deletePlanning($data);
	//var_dump($save);
	return $delete;
}

function planning_settings_page()
{
	require_once SYET_PATH . 'admin/class-planning-admin.php';
	$settings = Planning_Admin::planning_settings_page();
	return $settings;
}

function planning_get_images_from_media_library_to_add_it_to_activity() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'posts_per_page' => 300,
        'orderby' => 'asc'
    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image) {
        $images[]= $image->guid;
    }
    return $images;
}

function planning_my_media_gallery_to_insert_in_activity() {
    $imgs = planning_get_images_from_media_library_to_add_it_to_activity();
	$html = '<div id="syet_media-gallery">';
	$html .= '<div class="syet_close">x</div>';
	foreach($imgs as $img) {
		$html .= '<img style="max-width:150px;" src="' . $img . '" alt="" />';
	}
	$html .= '</div>';
	echo $html;
}

add_action('wp_ajax_planning_save_planning', 'planning_save_planning');
add_action('wp_ajax_planning_edit_planning', 'planning_edit_planning');
add_action('wp_ajax_planning_delete_planning', 'planning_delete_planning');
add_action('wp_ajax_planning_my_media_gallery_to_insert_in_activity', 'planning_my_media_gallery_to_insert_in_activity');

global $arrayAtts;
$arrayAtts = array();

function planning( $atts, $content = null ){
	global $arrayAtts;
	extract(shortcode_atts(array(
        'id' => 1
    ), $atts));

	array_push($arrayAtts, $atts);
	//var_dump($arrayAtts);
	$id = (int)$id;
	$nonce = wp_create_nonce('displayPlanning');
	$content = do_shortcode($content);
	//var_dump($content);
	//var_dump($nonce);
    
    ob_start();

    displayTheTT($id,$nonce, $content );
    $output = do_shortcode(ob_get_contents());
    ob_end_clean();
	
	return $output;	
}

function displayTheTT($id,$nonce, $content ){
	
	require_once SYET_PATH . 'public/class-planning-public.php';
	$display = Planning_Public::planning_displayPlanning($id, $nonce, $content);
}

function register_planning_shortcodes(){

	add_shortcode('planning', 'planning');
 }

 add_action( 'init', 'register_planning_shortcodes');

 class planning_widget extends WP_Widget {

	// constructor
	public function __construct() {
    $widget_options = array( 
      'classname' => 'planning_widget',
      'description' => 'Display a timetable from Planning plugin. Select an id to make it work!',
    );
    parent::__construct( 'planning_widget', 'Planning widget', $widget_options );
  }

  	public function widget( $args, $instance) {
		$id = (int)(apply_filters( 'widget_title', $instance[ 'planningId' ] ));
		//var_dump($id);
		$nonce = wp_create_nonce('displayPlanning');
		$content = "";
		displayTheTT($id,$nonce, $content );	
	}

	// widget form creation
	public function form( $instance ) {
	  	$planningId = ! empty( $instance['planningId'] ) ? $instance['planningId'] : ''; ?>
	  	<p>
	   	 	<label for="<?php echo $this->get_field_id( 'planningId' ); ?>">Id:</label>
	    	<input type="number" id="<?php echo $this->get_field_id( 'planningId' ); ?>" name="<?php echo $this->get_field_name( 'planningId' ); ?>" value="<?php echo esc_attr( $planningId ); ?>" />
	  	</p><?php 
	}

	// widget update
	public function update( $new_instance, $old_instance ) {
	  	$instance = $old_instance;
	  	$instance[ 'planningId' ] = strip_tags( $new_instance[ 'planningId' ] );
	  	return $instance;
	}
}
function planning_widget_reg() { 
	register_widget( 'planning_widget' );
  }
  add_action( 'widgets_init', 'planning_widget_reg' );
  