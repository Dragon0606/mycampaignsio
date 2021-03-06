<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

global $include_filterable_table;
$include_filterable_table = true;

?>
<?php require 'parts/top.php'; ?>

<div class="content-row">
                    
	<div class="content-column w-100">

		<div class="content-column-main">
		    
		    <!-- <div class="title">
                <div class="left-pos"><h3>DOMAINS</h3></div>
            </div> -->
            
		    <div class="content-column-inner">

		    	<div class="list-table-wrap">
                    
                	<table class="filter-table list-table mv3 collapse tc">
                        <thead>
                            <tr>
                                <th data-sortable="false"></th>
                                <th>DOMAIN</th>
                                <th data-sortable="false">ACTIONS</th>
                                <th>ON PAGE ANALYSIS</th>
                                <th>SERPS</th>
                                <th>UPTIME</th>
                                <th>MALWARE</th>
                                <th>WEBMASTER</th>
                                <th>ANALYTICS</th>
                            </tr>
                        </thead>
                		<tbody>
                            <?php
                            $counter = 0;
                            foreach($domains as $domain) {

                                $counter++;

                                $domain_url = $domain['domain_name'];
                                $domain_name = $domain['domain_name'];
                                $wp_login_url = base_url() . 'auth/site/viewsite/' . $domain['domain_id'];
                                $piwik_script_url = base_url() . 'analytics/code/' . $domain['domain_id'];
                                $domain_stats_url = base_url() . 'auth/dashboard/' . $domain['domain_id'];
                                $edit_domain_url = base_url() . 'auth/edit_project/' . $domain['domain_id'];
                                $delete_domain_url = base_url() . 'auth/deletedomain/' . $domain['domain_id'];

                                $enabled_features = array(
                                    'on_page_analysis' => 1 === (int) $domain['monitorOnPageIssues'],
                                    'serps' => 1 === (int) $domain['keywordexist'],
                                    'uptime' => 'UP' === $domain['server_status'] || 'DOWN' === $domain['server_status'],
                                    'malware' => 1 === (int) $domain['monitorMalware'],
                                    'webmaster' => 1 === (int) $domain['connectToGoogle'],
                                    'analytics' => 1 === (int) $domain['ga_account'],
                                );
                                ?>
                			<tr>
                                <td><?php echo $counter; ?></td>
                				<td class="tl">
                					<a href="<?php echo $domain_url; ?>" title="" target="_blank" class="no-underline underline-hover white"><?php echo $domain_name; ?></a>
                				</td>
                				<td class="domain-actions">
                					<a href="<?php echo $wp_login_url; ?>" target="_blank" title="" class="tooltip"><i class="material-icons">&#xE890;</i><span class="tooltiptext">Login WordPress</span></a>
                					<a href="#" title="" onclick="openPiwikCode('<?php echo $piwik_script_url; ?>');" class="tooltip"><i class="material-icons">&#xE88F;</i><span class="tooltiptext">Analytics Script</span></a>
                                    <a href="<?php echo $domain_stats_url; ?>" title="" class="tooltip"><i class="material-icons">&#xE417;</i><span class="tooltiptext">Domain Stats</span></a>
                					<a href="<?php echo $edit_domain_url; ?>" title="" class="tooltip"><i class="material-icons">&#xE3C9;</i><span class="tooltiptext">Edit Domain</span></a>
                					<a href="<?php echo $delete_domain_url; ?>" title="" onclick="return on_click_domain_remove('Are you sure you want to delete this domain?')" class="tooltip"><i class="material-icons">&#xE92B;</i><span class="tooltiptext">Delete Domain</span></a>
                					<?php 
                                    /* @note: Doesn't need. The link exists in donaim name (first column). */ /* ?>
                                    <a href="<?php echo $domain_url; ?>" title="Visit Site"target="_blank" class="tooltip"><i class="material-icons">&#xE89E;</i><span class="tooltiptext">Visit Site</span></a>
                                    <?php */ ?>
                				</td>

                                <?php foreach( $enabled_features as $is_ok ){ ?>
                                <td class="feature-enabled-icon"> <?php
                                    if($is_ok){
                                        ?><i class="material-icons campaignsio-admin-green">&#xE5CA;</i><?php
                                    }
                                    else{
                                        ?><i class="material-icons campaignsio-admin-orange">&#xE5CD;</i><?php
                                    } ?>
                                </td>
                                <?php } ?>
                   		</tr>
                			<?php } ?>
                		</tbody>
                	</table>

            	</div>

		    </div>

		</div>

	</div>

</div>

<?php require 'parts/bottom.php'; ?>