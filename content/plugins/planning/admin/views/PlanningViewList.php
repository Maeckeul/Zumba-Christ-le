<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.zumba-christele.com
 * @since      0.0.1
 *
 * @package    Planning
 * @subpackage Planning/admin/views
 */

if (!defined('WPINC')){die;}

require_once SYET_PATH . 'admin/models/PlanningModelList.php';
$model = PlanningModelList::planning_listItems();
$syet_column_exist = PlanningModelList::planning_column_exist();

class PlanningViewList
{
    
    //private $model;
    
    public function __construct($model)
    {
    }

    public static function planning_displayPlanning($model)
    {
        //$this->model;
        //var_dump($this->model);
        $ajax_nonce = wp_create_nonce("nonce_easytimetable"); ?>
		<div class="sy-admin-container">
			<h1 class="sy-plugin-title"><?php _e('EasyTimetable, schedule management system', 'easytimetable-responsive-schedule-management-system'); ?></h1>
			<div class="sy-home-button-container">
				<a class="page-title-action button" style="background-color:#23282d;" href="admin.php?page=easy-timetable"><?php _e('Manage', 'easytimetable-responsive-schedule-management-system'); ?></a>
				<a class="page-title-action button" href="<?php echo admin_url('admin.php?page=et_create') ?>"><?php _e('New', 'easytimetable-responsive-schedule-management-system'); ?></a>
                <a class="page-title-action button" href="<?php echo admin_url('admin.php?page=et_settings') ?>"><?php _e('Settings', 'easytimetable-responsive-schedule-management-system'); ?></a>
				<a class="page-title-action button" href="http://www.stereonomy.com/stereonomy-documentation-help-support/easytimetable-products-documentation/category/easytimetable-for-wordpress" target="_blank" title="<?php _e('EasyTimetable for Wordpress documentation', 'easytimetable-responsive-schedule-management-system'); ?>"><?php _e('Documentation', 'easytimetable-responsive-schedule-management-system'); ?></a>
				<a class="page-title-action button" href="http://www.stereonomy.com/stereonomy-documentation-help-support/community-support-forum/easy-timetable-free-for-wordpress" target="_blank" title="<?php _e('EasyTimetable for Wordpress Support forum', 'easytimetable-responsive-schedule-management-system'); ?>"><?php _e('Ask for help', 'easytimetable-responsive-schedule-management-system'); ?></a>
				<a class="page-title-action button" style="background-color:crimson;" href="<?php echo admin_url('admin.php?page=et_extended') ?>"><?php _e('Get extended', 'easytimetable-responsive-schedule-management-system'); ?></a>
				<a class="page-title-action button" href="<?php echo admin_url('admin.php?page=et_about') ?>"><?php _e('About', 'easytimetable-responsive-schedule-management-system'); ?></a>
			</div>
			<div class="sy-listplanning">
				<ul id="ulformlistplanning" class="ulformlistplanning"> 
				<li class="sy-title-eachplanning">
					<div class="sy-divlist sy-listid"><?php _e('Id', 'easytimetable-responsive-schedule-management-system'); ?></div>
					<div class="sy-divlist sy-listtitle"><?php _e('Title', 'easytimetable-responsive-schedule-management-system'); ?></div>
					<div class="sy-divlist sy-listtype"><?php _e('Type', 'easytimetable-responsive-schedule-management-system'); ?></div>
					<div class="sy-divlist sy-listtimemode"><?php _e('Time mode', 'easytimetable-responsive-schedule-management-system'); ?></div>
					<div class="sy-divlist sy-liststart"><?php _e('Start time', 'easytimetable-responsive-schedule-management-system'); ?></div>
					<div class="sy-divlist sy-listaction"><?php _e('Actions', 'easytimetable-responsive-schedule-management-system'); ?></div>
				</li>
				<?php foreach ((array)$model as $item): ?>
					<?php
                        $type = ($item->type == 0 ? __('Fixed', 'easytimetable-responsive-schedule-management-system') : __('Adaptative', 'easytimetable-responsive-schedule-management-system'));
        $time_mode = ($item->time_mode == 0 ? __('24h', 'easytimetable-responsive-schedule-management-system') : __('12h', 'easytimetable-responsive-schedule-management-system'));
        // On récuère les activités
        $activities = stripslashes($item->activities);
        // On récuère les activités planifiées
        $scheduledacts = stripslashes($item->scheduledact);
        // On décode le json
        $jsonTimetable = json_decode($scheduledacts, true); ?>
					<li class="sy-eachplanning .sy-liplanning-<?php echo $item->id; ?>" data-form="<?php echo $item->id; ?>" data-tooltip-content="#tooltip_content_<?php echo $item->id; ?>">
						<form id="sche-<?php echo $item->id; ?>" method="POST" action="">
							<input id="planning_id" name="planning_id" type="hidden" value="<?php echo $item->id; ?>">
							<input id="saveSecurity" type="hidden" name="saveSecurity" value="<?php echo esc_html($ajax_nonce) ?>">
							<div class="sy-divlist sy-listid"><?php echo $item->id; ?></div>
							<div class="sy-divlist sy-listtitle"><?php echo $item->p_name; ?></div>
							<div class="sy-divlist sy-listtype"><?php echo $type; ?></div>
							<div class="sy-divlist sy-listtimemode"><?php echo $time_mode; ?></div>
							<div class="sy-divlist sy-liststart"><?php echo $item->start_h; ?></div>
							<div class="sy-divlist sy-listaction">
								<input id="et_edit_planning_<?php echo $item->id; ?>" class="editButton" type="submit" title="<?php _e('Edit timetable', 'easytimetable-responsive-schedule-management-system'); ?>" value="">
								<input id="et_delete_planning_<?php echo $item->id; ?>" style="display:none;" data-planning="<?php echo $item->id; ?>" class="deleteButton" type="submit" value="<?php _e('Yes', 'easytimetable-responsive-schedule-management-system'); ?>">
								<input id="et_duplicate_planning" title="<?php _e('Duplicate timetable is available in the extended version', 'easytimetable-responsive-schedule-management-system'); ?>" class="duplicateButton" type="submit" value="">
								<input id="trash_<?php echo $item->id; ?>" class="trashButton" type="submit" value="" title="<?php _e('Delete timetable', 'easytimetable-responsive-schedule-management-system'); ?>">
								<input id="copytag_<?php echo $item->id; ?>" class="copyTagButton" type="submit" value="" data-tooltip-content=".tooltiptag-<?php echo $item->id; ?>" data-clipboard-text="[planning id=<?php echo $item->id; ?>]">
							
							</div>
							<div class="tooltiptag-container" style="display:none;">
								<div class="tooltiptag-<?php echo $item->id; ?>"><strong><?php printf(__('Click to copy the tag "[planning id=%s]', 'easytimetable-responsive-schedule-management-system'), $item->id); ?></strong><br /> then <strong>paste it</strong> in a post or in a page.</div>
							</div>
						</form>
					</li>
					<div class="tooltip_templates">
					    <div id="tooltip_content_<?php echo $item->id; ?>" class="sy-tooltiplist">
					    	<h2 class="sy-title-list"><?php echo $item->p_name; ?></h2>
					    	<div class="sy-listtimetables">

					    	<?php $variationCount = 0; ?>
					    	<?php if ($jsonTimetable['timetables']): ?>
						    	<?php foreach ($jsonTimetable['timetables'] as $variation): ?>		
									<?php $arrayplanAct = $variation["scheduledacts"]; ?>
									<?php $arrayplanAct_length = count($arrayplanAct); ?>
							        <div class="sy-small-schedule">
							        	<div class="sy-small-title"><?php _e('Schedule ', 'easytimetable-responsive-schedule-management-system');
        echo((int)$variationCount + 1); ?></div>
							        <?php
                                        // On récuère les activités
                                        $activities = stripslashes($item->activities);
        // On récupère les activités planifiées
        $scheduledacts = stripslashes($item->scheduledact);
        // On décode le json
        $jsonTimetable = json_decode($scheduledacts, true);
        // On transforme la chaîne des activités en tableau
        $arrayAct = explode(",{", $activities);
        $arrayAct_length = count($arrayAct);


        $rows = $item->rows;
        $rwidth= 90/$rows;
        for ($number=1;$number<=$rows;$number++) { ?>
				   							<div class="sy-small-col"  style="width:<?php echo $rwidth ?>%;">	
									   		<?php
                                            $cells = $item->cells;
                                            $rheight = 65*$cells;
                                            for ($cell=1;$cell<=$cells;$cell++) {
                                                if ($cell < 10) {
                                                    $zero = "00";
                                                } else {
                                                    $zero = "0";
                                                }
                                                $idul = $number.$zero.$cell;
                                                $tabAct = array(); ?>
					                        	<ul id="cellule_<?php echo $idul ?>" class="sy-small-creneau" style="background-color:#<?php echo $item->cell_color ?>;height:15px;margin-bottom:1px !important;">
						                        	
												<?php for ($i = 0 ; $i < $arrayplanAct_length ; $i++) {
                                                    $encodedplanAct = json_encode($arrayplanAct[$i]);
                                                    $decodedplanAct = json_decode($encodedplanAct);
                                                    
                                                    if ($decodedplanAct && (int)$decodedplanAct->{'id_cell'} == (int)$idul) {
                                                        $actId = (int)$decodedplanAct->{'id_activity'};
                                                        // On ajoute le nom de l'activité dans le tableau
                                                        array_push($tabAct, $decodedplanAct->{'title'});
                                                        //On compte le nombre d'élément du tableau pour l'ajouter à l'id de l'activité
                                                        $actCount = count($tabAct);
                                                        if ($actId >= 1 && preg_match('/^"a/', $arrayAct[$actId])) {
                                                            // on ajoute le délimiteur de json enlevé lors de la conversion en tableau ci-dessus
                                                            $arrayAct[$actId] = '{'.$arrayAct[$actId];
                                                            // On décode la string en objet json
                                                            $decodedAct = json_decode($arrayAct[$actId]);
                                                        //var_dump($decodedAct);
                                                        } // Fin if $i >= 1
                                                        else {
                                                            $decodedAct = json_decode($arrayAct[$actId]);
                                                            //var_dump($decodedAct);
                                                        } // fin else
                                                        if (isset($decodedplanAct->{'merge'})) {
                                                            if ($decodedplanAct->{'merge'} == 1 && $actCount == 1) {
                                                                $doublestyle = "float:left;width:50%;";
                                                            } elseif ($decodedplanAct->{'merge'} == 1 && $actCount == 2) {
                                                                $doublestyle = "float:right;width:50%;";
                                                            } elseif ($decodedplanAct->{'merge'} == 0 && $actCount == 1) {
                                                                $doublestyle = "width:100%;";
                                                            }
                                                        } ?> 
												        <li  class="activite" style="background-color:#<?php echo $decodedAct->{'actcolor'} ?>;color:#<?php echo  $decodedAct->{'fontcolor'} ?>;<?php echo $doublestyle ?>">
													    </li>
												<?php
                                                    }// fin if id_cell == idul
                                                }// fin for arrayplanAct
                                            //}// fin if $data[0]->scheduledact?>
						                        	</ul>
						                    <?php
                                            } ?>    
											</div>
								   	<?php	} ?>
						   			</div>
						   			<?php $variationCount++; ?>
					   			<?php endforeach ?>
					   		<?php else: ?>
					   		<div><?php _e('Please edit and save right after the timetable is loaded to update the timetable', 'easytimetable-responsive-schedule-management-system'); ?></div>
					   		<?php endif ?>
				   			</div>
				   			<div class="liste-activites">
				   				<div class="sy-title-acti"><?php _e('Activities', 'easytimetable-responsive-schedule-management-system'); ?></div>
				   				<div>
				   					<?php
                                    // On récuère les activités
                                    $activities = stripslashes($item->activities);
        // On récupère les activités planifiées
        $scheduledacts = stripslashes($item->scheduledact);
        // On transforme la chaîne des activités en tableau
        $arrayAct = explode(",{", $activities);

        // On transforme la chaîne des activités planifiées en tableau
        $arrayplanAct = explode(",{", $scheduledacts);

        $arrayAct_length = count($arrayAct);
        $arrayplanAct_length = count($arrayplanAct);

        if ($item->activities) {
            for ($i = 0 ; $i < $arrayAct_length ; $i++) {
                if ($i >= 1) {
                    // on ajoute le délimiteur de json enlevé lors de la conversion en tableau ci-dessus
                    $arrayAct[$i] = '{'.$arrayAct[$i];
                    // On décode la string en objet json
                    $decodedAct = json_decode($arrayAct[$i]);
                } // Fin if $i >= 1
                else {
                    $decodedAct = json_decode($arrayAct[$i]);
                    //var_dump($decodedAct);
                } // fin else
                                                //echo $decodedAct->{'actname'};
                                                $acttitle = rawurldecode($decodedAct->{'actname'}); ?>
												<li id="act-<?php echo $decodedAct->{'actid'} ?>" class="sy-small-act" style="background-color:#<?php echo $decodedAct->{'actcolor'} ?>;color:#<?php echo $decodedAct->{'fontcolor'} ?>;">
						            	                <div id="nom" class="sy-small-name" style="color:#<?php $decodedAct->{'fontcolor'}?>;"><?php echo urldecode($acttitle) ?>: <?php echo $decodedAct->{'actduration'} ?>'</div>
					            	            </li>
											<?php
            } // fin for $i $arrayAct_length
        } // if $data[0]->activities
                                    ?>
				   				</div>
				   			</div>
					    </div>
					    
					</div>	
				
				<?php endforeach ?>
				</ul>
			</div>
		<?php
    }

    public static function planning_savePlanning($model)
    {
        //$this->model;
        //var_dump($this->model); ?>
			<h1>EasyTimetable</h1>
			<a class="page-title-action" href="admin/models/PlanningViewList.php">New</a>
			<ul> 
			<?php foreach ((array)$model as $item): ?>
				
				<li>
					<?php echo $item->p_name; ?> | <?php echo $item->id; ?>
				</li>
				
			<?php endforeach ?>
			</ul>
		<?php
    }

    public static function planning_refresh()
    {
        ?>
		<script type="text/javascript">
			location.reload();
		</script>
		<?php
    }
}

?>



	   