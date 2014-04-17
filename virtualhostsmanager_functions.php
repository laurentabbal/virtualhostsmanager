<?php
/**
 * Virtual Hosts Manager for EasyPHP DevServer [ www.easyphp.org ]
 * @author   Laurent Abbal <laurent@abbal.com>
 * @version  1.2
 * @link     http://www.easyphp.org
 */

function adapt_httpdconf() {
	$httpdconf = @file_get_contents('../../binaries/conf_files/httpd.conf');
	if(stripos($httpdconf,'## Virtualhost localweb') === false) {
		$patch = "## Virtualhost localweb\n";
		$patch .= "<VirtualHost 127.0.0.1>\n";
		$patch .= "\tDocumentRoot \"" . '${path}/data/localweb' . "\"\n";
		$patch .= "\tServerName 127.0.0.1\n";
		$patch .= "\t<Directory \"" . '${path}/data/localweb' . "\">\n";
		$patch .= "\t\tOptions FollowSymLinks Indexes\r\n";
		$patch .= "\t\tAllowOverride All\r\n";
		$patch .= "\t\tOrder deny,allow\r\n";
		$patch .= "\t\tAllow from 127.0.0.1\r\n";
		$patch .= "\t\tDeny from all\r\n";
		$patch .= "\t\tRequire all granted\r\n";
		$patch .= "\t</Directory>\r\n";
		$patch .= "</VirtualHost>\n";	
		$patch .= "Include ../../data/conf/apache_virtual_hosts.conf";

		$new_httpdconf = str_replace('Include ../../data/conf/apache_virtual_hosts.conf', $patch, $httpdconf);
			
		// Backup old httpd.conf
		rename('../../binaries/conf_files/httpd.conf', '../../binaries/conf_files/httpd_' . date("Y-m-d@U") . '.conf');

		// Save new httpd.conf
		file_put_contents('../../binaries/conf_files/httpd.conf', $new_httpdconf);
	}
}


function read_vhosts($part) {

	$vhosts_content = @file_get_contents('../../data/conf/apache_virtual_hosts.conf');

	if ($part == 'easyphp_vhosts') {
		$matches = array();
		$easyphp_vhosts_array = array();
		preg_match_all("'(#|)<VirtualHost(.*?)<\/VirtualHost>'si", $vhosts_content, $matches);
		foreach ($matches[0] as $key => $vhost) {
			preg_match("'DocumentRoot \"(.*?)\"'si", $vhost,$documentroot);
			preg_match("'ServerName (.*?)\n'si", $vhost,$servername);
			$easyphp_vhosts_array[$key][0] = trim($vhost); 
			$easyphp_vhosts_array[$key][1] = trim($documentroot[1]); 
			$easyphp_vhosts_array[$key][2] = trim($servername[1]); 
		}
		return $easyphp_vhosts_array;
	}
	
	if ($part == 'servernames') {
		$matches = array();
		$servernames_array = array();
		preg_match_all("'(#|)<VirtualHost(.*?)<\/VirtualHost>'si", $vhosts_content, $matches);
		foreach ($matches[0] as $key => $vhost) {
			preg_match("'ServerName (.*?)\n'si", $vhost,$servername);
			$servernames_array[] = trim($servername[1]); 
		}
		return $servernames_array;
	}
	
	if ($part == 'file') return $vhosts_content;
}


function get_hostsfile_dir() {
	$hostlist = array(
		// 95, 98/98SE, Me 	%WinDir%\
		// NT, 2000, and 32-bit versions of XP, 2003, Vista, 7 	%SystemRoot%\system32\drivers\etc\
		// 64-bit versions 	%SystemRoot%\system32\drivers\etc\
		'' => '#Windows 95|Win95|Windows_95#i',
		'' => '#Windows 98|Win98#i',
		'' => '#Windows ME#i',	
		'\system32\drivers\etc' => '#Windows NT 4.0|WinNT4.0|WinNT|Windows NT#i',			
		'\system32\drivers\etc' => '#Windows NT 5.0|Windows 2000#i',
		'\system32\drivers\etc' => '#Windows NT 5.1|Windows XP#i',
		'\system32\drivers\etc' => '#Windows NT 5.2#i',
		'\system32\drivers\etc' => '#Windows NT 6.0#i',
		'\system32\drivers\etc' => '#Windows NT 7.0#i',
	);
	foreach($hostlist as $hostdir=>$regex) {
		if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) break;
	}
	// Return FALSE is hosts cannot be opened
	$hosts_path = $_SERVER['WINDIR'].$hostdir;
	return $hosts_path;
}


function read_hostsfile($part) {
	$hostsfile_array = array();
	$hosts_array = array();
	$hostsfile = @file_get_contents(get_hostsfile_dir().'\hosts','r');
	$hostsfile_array = explode("\n",$hostsfile);
	foreach ($hostsfile_array as $line) {
		if((stripos($line,'127.0.0.1') !== false) and ((stripos($line,'127.0.0.1')) < 3)) {
			$line_array = explode('127.0.0.1', $line);
			$hosts_array[] = trim($line_array[1]);
		}
	}
	if ($part == 'file') return $hostsfile_array;
	if ($part == 'hosts') return $hosts_array;
}

function check_hash($server_name) {
	$hostsfile_array = read_hostsfile('file');
	foreach ($hostsfile_array as $line) {
		$pos_hash = stripos($line,'#');
		$pos_127001 = stripos($line,'127.0.0.1');
		$pos_servername = stripos($line,$server_name);
		if(($pos_127001 !== false) and ($pos_servername !== false)) {
			if (($pos_hash !== false) and ($pos_hash < $pos_127001)) {
				$hash = "on";
			} else {
				$hash = "off";
			}
		} 
	}
	return $hash;
}
?>