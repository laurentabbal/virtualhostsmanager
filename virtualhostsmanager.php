<?php
/**
 * Virtual Hosts Manager for EasyPHP DevServer [ www.easyphp.org ]
 * @author   Laurent Abbal <laurent@abbal.com>
 * @version  1.2
 * @link     http://www.easyphp.org
 */

$module_i18n = array();
$module_i18n = array(
	"en"	=>	array(
		"norights"				=>	"Unfortunately, you do not have rights to create a Virtual Host. You must have write permissions on the file:",
		"activate"				=>	"activate",		
		"desactivate"			=>	"deactivate",		
		"delete"				=>	"Delete this Virtual Host",	
		"add_vhost"				=>	"add a virtual host",
        "refresh_vhost"			=>	"reload virtual hosts",
        "add_vhost_chapo"		=>	"When maintaining and developing multiple sites / applications on internet, it is helpful to have a copy of each site / application
									running on your local computer and to have them running in the same conditions (same server configuration, same path...). Virtual 
									Hosts allow you to do that. Thus, whenever you move your projects to production environment, you don't have to change the absolute 
									path manually and they run exactely the same way.",	
		"add_vhost_1"			=>	"<span>If the directory you want to use doesn't exist, create it</span> (eg: C:\localweb\websites\projet1)",	
		"add_vhost_2"			=>	"<span>Create a name for the Servername</span> (eg: projet1)",	
		"add_vhost_3"			=>	"<span>Copy below the path to your directory</span> (eg: C:\weblocal\websites\projet1)",	
		"add_vhost_4"			=>	"create",	
		"info"					=>	"info",	
		"cancel"				=>	"cancel",		
		"close"					=>	"close",	
		"warning_servername_1"	=>	"The name can only contain alpha-numeric characters, dots, underscores and hyphens.",
		"warning_servername_2"	=>	"If the name is an internet address, this address will redirected on your local computer. Not on internet.",
		"warning_conf"			=>	"If you experience any problem, open the folder 'EasyPHP-xxx/conf_files/', delete or rename 'httpd.conf', rename the most recent backup 
									(example : 'httpd_2011-03-18@1300458590.conf' &gt; 'httpd.conf') and restart EasyPHP. Follow the same procedure with the hosts file :",
		"warning_url"			=>	"The name looks like an internet address. Be carefull. If the name chosen is www.google.com for example, the address 
									http://www.google.com will be redirected to your local computer and won't be reachable on internet. You can do that, but don't 
									forget to deactivate your virtual 
									host or to delete it if you want go on internet.",
		"save"					=>	"I have read the warning above &raquo; Save",	
	),
	"fr"	=>	array(
		"norights"				=>	"Malheureusement, vous n&apos;avez pas les droits n&eacute;cessaires pour cr&eacute;er un H&ocirc;te Virtuel. Vous devez avoir les 
									droits en &eacute;criture pour le fichier :",
		"activate"				=>	"activer",		
		"desactivate"			=>	"d&eacute;sactiver",		
		"delete"				=>	"Supprimer cet H&ocirc;te Virtuel",	
		"add_vhost"				=>	"ajouter un h&ocirc;te virtuel",
        "refresh_vhost"			=>	"reload virtual host",
		"add_vhost_chapo"		=>	"Quand on maintient ou d&eacute;veloppe de plusieurs sites / applications sur Internet, il est utile d&apos;avoir une copie de chaque 
									site / application qui fonctionne sur un ordinateur en local dans les m&ecirc;mes conditions (m&ecirc;me configuration du 
									serveur, le m&ecirc;me chemin ...). Les H&ocirc;tes Virtuels permettent de le faire. Ainsi, une fois vos d&eacute;veloppements termin&eacute;s, lorsque vous 
									transf&eacute;rez vos projets sur votre environnement de production, vous n&apos;avez pas &agrave; changer le chemin absolu manuellement. Ils fonctionneront 
									exactement de la m&ecirc;me mani&egrave;re.",	
		"add_vhost_1"			=>	"<span>Si le dossier que vous souhaitez utiliser n&apos;existe pas, cr&eacute;ez le.</span> (eg: C:\localweb\websites\project1)",	
		"add_vhost_2"			=>	"<span>Donnez un nom &agrave; cet h&ocirc;te virtuel</span> (eg: project1)",	
		"add_vhost_3"			=>	"<span>Copiez ci-dessous le chemin de votre dossier</span> (eg: C:\weblocal\websites\project1)",	
		"add_vhost_4"			=>	"cr&eacute;er",		
		"info"					=>	"info",	
		"cancel"				=>	"annuler",		
		"close"					=>	"fermer",		
		"warning_servername_1"	=>	"Le nom ne peut contenir que des caract&egrave;res alphanum&eacute;riques, des points, traits de soulignement (underscore) et des tirets.",
		"warning_servername_2"	=>	"Si le nom choisi est une adresse Internet, cette adresse sera redirig&eacute;e sur votre ordinateur local. Pas sur Internet.",
		"warning_conf"			=>	"En cas de probl&egrave;me, ouvrir le r&eacute;pertoire 'EasyPHP-xxx/conf_files/', effacer ou renommer 'httpd.conf', renommer la 
									sauvegarde la plus r&eacute;cente (exemple : 'httpd_2011-03-18@1300458590.conf' &gt; 'httpd.conf') et red&eacute;marrer EasyPHP.",
		"warning_url"			=>	"Le nom ressemble &agrave; une adresse Internet. Soyez tr&egrave;s vigilant. Si le nom choisi est www.google.com par exemple, 
									l&apos;adresse http://www.google.com sera redirig&eacute; vers votre ordinateur local et ne sera plus accessibles sur internet. 
									Vous pouvez le faire, mais n&apos;oubliez pas de d&eacute;sactiver votre h&ocirc;te virtuel ou de l&apos;effacer si vous voulez 
									aller sur internet.",
		"save"					=>	"J'ai lu l'avertissement ci-dessus &raquo; Enregistrer",		
	),
); 

include_once('virtualhostsmanager_functions.php');
?>

<div class='add_vhost_button'>
    <a href='http://<?php echo $_SERVER['HTTP_HOST']; ?>/modules/virtualhostsmanager/virtualhostsmanager_update.php?to=refresh_host'><?php echo $module_i18n[$lang]['refresh_vhost']; ?></a>
</div>

<div class='add_vhost_button'>
    <a href='<?php echo $_SERVER['PHP_SELF']; ?>?to=add_vhost_1#anchor_virtualhostsmanager'><?php echo $module_i18n[$lang]['add_vhost']; ?></a>
</div>

<?php
clearstatcache();

if (is_writable(get_hostsfile_dir() . '\hosts')) {

	adapt_httpdconf($_SERVER['SERVER_PORT']);

	//== DISPLAY VIRTUALHOSTS ================================================

	$vhosts_array = read_vhosts('easyphp_vhosts');

	if (count($vhosts_array) != 0) {
		echo '<br style="clear:both;" />';
		echo '<div class="vhosts">';
		foreach ($vhosts_array as $key => $vhost) {

			$vhost_name = trim($vhost[2]);
			$port = ($_SERVER['SERVER_PORT'] == '80') ? '' : ':' . $_SERVER['SERVER_PORT'];

			if (in_array($vhost_name, read_hostsfile('hosts'))) {
			
				$vhost_link = str_replace("/","\\", trim($vhost[1]));			
				$hash = (check_hash($vhost_name) == 'on') ? 'on' : 'off';
				$switch_hash = (check_hash($vhost_name) == 'on') ? 'off' : 'on';
				$onoff = (check_hash($vhost_name) == 'on') ? $module_i18n[$lang]['activate'] : $module_i18n[$lang]['desactivate'];			
			
				echo '<div class="vhost">';
				if ($hash == 'on') echo '<div class="vhost_name_hashon"><img src="../modules/virtualhostsmanager/images/vhost_hashon.png" width="16" height="11" alt="virtualhost" />' . $vhost_name;
				if ($hash == 'off') echo '<div class="vhost_name_hashoff"><img src="../modules/virtualhostsmanager/images/vhost_hashoff.png" width="16" height="11" alt="virtualhost" /><a href="http://' . $vhost_name . $port . '" target="_blank">' . $vhost_name . '</a>';
				if (stripos($vhost_name,'.') !== false) echo ' <span class="infobulle_warning"><a class="info" href="#">!<span>' . $module_i18n[$lang]['warning_url'] . '</span></a></span>';
				echo '</div>';
				
				echo '<div class="vhost_path_hash' . $hash . '"><img src="../modules/virtualhostsmanager/images/path_hash' . $hash . '.png" width="16" height="11" alt="virtualhost path" border="0" />' . $vhost_link . '\</div>';
				if ((isset($_GET['num_virtualhost'])) and ($_GET['to'] == "del_confirm") and ($_GET['num_virtualhost'] == $key)) {
					echo '<div class="vhost_del_confirm_frame">';
					echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/modules/virtualhostsmanager/virtualhostsmanager_update.php?to=del_virtualhost&amp;num_virtualhost=' . $key . '#anchor_virtualhostsmanager" class="vhost_del_confirm">' . $confirm . '</a>';
					echo '<a href="' . $_SERVER['PHP_SELF'] . '#anchor_virtualhostsmanager" class="vhost_del_cancel">' . $cancel . '</a>';
					echo '</div>';
				} else {
					echo '<div class="vhost_del">';
					echo '<a href="' . $_SERVER['PHP_SELF'] . '?to=del_confirm&amp;num_virtualhost=' . $key . '#anchor_virtualhostsmanager" title="' . $module_i18n[$lang]['delete'] . '"><img src="../modules/virtualhostsmanager/images/delete.png" width="9" height="9" alt="' . $module_i18n[$lang]['delete'] . '" border="0" /></a>';
					echo '</div>';
					
					
					echo '<div class="vhost_onoff">';
					echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/modules/virtualhostsmanager/virtualhostsmanager_update.php?to=onoff_host&amp;hash=' . $switch_hash . '&amp;servername=' . $vhost_name . '&amp;num_virtualhost=' . $key . '#anchor_virtualhostsmanager">' . $onoff . '</a>';
					echo '</div>';

				}
				echo "</div>";
			}
		}
		echo '<br style="clear:both"; />';
		echo "</div>";
	} else {
		echo '<br style="clear:both"; />';
	}
	//========================================================================


	//== MENU ITEM : ADD VIRTUAL HOST ========================================
	if ($_GET['to'] == "add_vhost_1") {
		?>
			<div class="add_vhost">
				<h5><?php echo $module_i18n[$lang]['add_vhost']; ?></h5>
		
				<p><?php echo $module_i18n[$lang]['add_vhost_chapo']; ?></p>
				<form method="post" action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/modules/virtualhostsmanager/virtualhostsmanager_update.php">
				
					<div><span>1.</span> <?php echo $module_i18n[$lang]['add_vhost_1']; ?></div>
					<div><span>2.</span> <?php echo $module_i18n[$lang]['add_vhost_2']; ?></div>
					<input type="text" name="vhost_name" size="65" />
					<div class='warning_servername'><span>!</span> <?php echo $module_i18n[$lang]['warning_servername_1']; ?></div>
					<div class='warning_servername'><span>!</span> <?php echo $module_i18n[$lang]['warning_servername_2']; ?></div>
					<div><span>3.</span> <?php echo $module_i18n[$lang]['add_vhost_3']; ?></div>
					<input type="text" name="vhost_link" size="80" />
					<input type="hidden" name="to" value="add_vhost_2" />
					<input type="hidden" name="lang" value="<?php echo $lang; ?>" />
					<br />
					<div class="warning_conf"><?php echo $module_i18n[$lang]['warning_conf'] . "'" . get_hostsfile_dir() . "\hosts'"; ?></div>
					<input type="submit" value="<?php echo $module_i18n[$lang]['save']; ?>" alt="<?php echo $module_i18n[$lang]['save']; ?>" title="<?php echo $module_i18n[$lang]['save']; ?>" class="submit" />
					<span class='add_vhost_cancel'><a href='index.php#anchor_virtualhostsmanager'><?php echo $module_i18n[$lang]['cancel']; ?></a></span>
					
				</form>
			</div>
		</div><br /></body></html>
		<?php
		exit; // close tags				
	}
	//========================================================================
	
} else {
	echo '<br style="clear:both"; />';
	if ($_GET['to'] == "add_vhost_1") {
		echo '<div class="norights">' . $module_i18n[$lang]['norights'] . ' ' . get_hostsfile_dir() . '\hosts</div>';
		echo '<div class="close"><a href="index.php">' . $module_i18n[$lang]['close'] . '</a></div>';
	}
}	
?>