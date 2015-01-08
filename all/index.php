<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
// kusabax/majakkalauta
// Overboard script
// v0.02
// © Skittie 2012
	 
// Juche-aatteen perusteella skriptien tulee olla mahdollisimman omavaraisia, joten siirrän configin tänne t. skittie
$obname = '/all/ - 711chan Overboard';
$obdesc = 'All the posts... All the time.';
$obpath = '/all/index.php';
$shown_replies = 3;
	
require '../config.php';
require KU_ROOTDIR . 'inc/functions.php';
require KU_ROOTDIR . 'inc/classes/board-post.class.php';
require KU_ROOTDIR . 'inc/classes/bans.class.php';
require KU_ROOTDIR . 'inc/classes/posting.class.php';
require KU_ROOTDIR . 'inc/classes/parse.class.php';
	 
function navbar(){
	global $tc_db;
	$sectq = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "sections` ORDER BY `order` ASC");
	$es = '<div class="navbar">';
	   
	foreach($sectq as $sect){
		$boardsq = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "boards` WHERE `section` = ".$sect['id']." ORDER BY `order` ASC");
		$es .= '[ ';
		foreach($boardsq as $bkey => $bval){
			$es .= '<a href="/'.$bval['name'].'" title="'.$bval['desc'].'">'.$bval['name'].'</a>';
			//if(next($boardsq)) $es .= ' / ';
			if(end($boardsq)) $es .= ' / ';
		}
		$es .= '] ';
	}
	$es .= '</div>';
	return $es;
}
$version = '0.02';
$return = '';
$return .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>'.$obname.'</title>
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="Sat, 17 Mar 1990 00:00:01 GMT" />
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<script type="text/javascript" src="'.KU_WEBPATH.'/lib/javascript/gettext.js"></script>
		<script type="text/javascript" src="'.KU_WEBPATH.'/lib/javascript/protoaculous-compressed.js"></script>
		<link rel="stylesheet" type="text/css" href="'.KU_WEBPATH.'/css/img_global.css" />';
$styles = explode(':', KU_STYLES);
foreach($styles as $style){
	$return .= '<link rel="';
	if($style != KU_DEFAULTSTYLE) $return .= 'alternate ';
	$return .= 'stylesheet" type="text/css" href="'.KU_WEBPATH.'/css/'.$style.'.css" />';
}
$return .= '<script type="text/javascript" src="/lib/javascript/kusaba.js"></script></head><body>';
$return .= navbar();
$return .= '</div>';
$return .= '<div class="logo">'.$obname.'</div>';
$return .= '<style type="text/css">h4 {color:#880000;}</style>';
$return .= '<center><h4><i>'.$obdesc.'</i></h4></center> ';
$page = $_GET['page'];
$page++;
$maxrows = KU_THREADS*$page;
$maxpages = 11;	 
$bot = $maxrows-KU_THREADS;
$results = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "posts` WHERE `IS_DELETED` = 0 AND `parentid` = 0 ORDER BY `stickied` DESC, `bumped` DESC LIMIT ".$bot.", ".$maxrows);
$resmax  = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "posts` WHERE `IS_DELETED` = 0 AND `parentid` = 0 ORDER BY `stickied` DESC, `bumped` DESC");
$numresults = count($results);
$nummax = count($resmax);
$numboards = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "boards`");
$numboards = count($numboards);
if ($numresults > 0) {
	$row = 0;
	if($maxrows > $numresults) $maxrows = $numresults;
	$return .= '<hr /><div class="replymode"><center>Showing '.$maxrows.' threads of '.$nummax.' threads across '.$numboards.' boards.<br /><strong>I am your overboard. Bow before me.</strong></center></div><hr />';
	foreach ($results as $line) {
		$row++;
		if ($row <= $maxrows) {
			$board = $tc_db->GetAll("SELECT * FROM `" . KU_DBPREFIX . "boards` WHERE `id` = ".$line['boardid']." LIMIT 1");
			foreach($board as $lol) $board['name'] = $lol['name'];
			$repliesq = $tc_db->GetAll("SELECT * FROM `".KU_DBPREFIX."posts` WHERE `boardid` = " . $line['boardid'] . " AND `IS_DELETED` = 0 AND `parentid` = ".$line['id']);
			$replies_num = count($repliesq);
			$replies_max = $replies_num;
			$replies_min = $replies_num - $shown_replies;
			$repliesq = $tc_db->GetAll("SELECT * FROM `".KU_DBPREFIX."posts` WHERE `boardid` = " . $line['boardid'] . " AND `IS_DELETED` = 0 AND `parentid` = ".$line['id']." ORDER BY `timestamp` ASC LIMIT ".$replies_min.", ".$replies_max);
			$return .= '<div id="thread'.$line['id'].$board['name'].'">';
			$return .= '<a href="'.KU_BOARDSFOLDER.$board['name'].'/res/' . $line['id'] . '.html">';
			//$return .= 'Thread '.$line['id'].' on board /'.$board['name'].'/<br /></a>';
			$return .= '>>/'.$board['name'].'/'.$line['id'].'<br /></a>';
			if ($line['file'] != '' && $line['file'] != 'removed') {
				$return .= '<span class="filesize">File <a href="/'.$board['name'].'/src/'.$line['file'].'.'.$line['file_type'].'">'.$line['file'].'.'.$line['file_type'].' </a>- ('.$line['file_size_formatted'].', '.$line['image_w'].'x'.$line['image_h'].', '.$line['file_original'].'.'.$line['file_type'].')</span><br />';
				if ($line['file_type'] == 'jpg' || $line['file_type'] == 'png' || $line['file_type'] == 'gif') {
					$return .= '<img src="/'.$board['name'] . '/thumb/' . $line['file'] . 's.' . $line['file_type'] . '" alt="' . $line['id'] . '" border="0" width="'.$line['thumb_w'].'" height="'.$line['thumb_h'].'" class="thumb" />';
				} else $return .= 'Avaa Thread nähdäksesi Filen.';
			} elseif ($line['file'] == 'removed') $return .= 'File deleted';
			$return .= '<label>';
			if ($line['subject'] != '') $return .= '<span class="filetitle">'.$line['subject'].'</span> ';
			if ($line['name'] == '') $line['name'] = 'Anonymous';
			$return .= '<span class="postername">'.$line['name'].'</span>';
			if ($line['tripcode'] != '') $return .= '<span class="postertrip">!'.$line['tripcode'].'</span> ';
			if ($line['timestamp'] != '') $return .= ' '.date('d. m. Y H:i:s', $line['timestamp']);
			$return .= '[<a href="'.KU_BOARDSFOLDER.$board['name'].'/res/' . $line['id'] . '.html">Reply</a>]';
			$return .= '</label> ';
			
			$return .= '<span class="reflink"><a href="'.KU_BOARDSFOLDER.''.$board['name'].'/res/'.$line['id'].'.html#'.$line['id'].'" onclick="return highlight(\''.$line['id'].'\');">No.&nbsp;'.$line['id'].'</a>';
			$return .= '<span class="extrabtns">';
			if($line['locked'] != 0) $return .= '<img style="border: 0;" src="http://www.711chan.org/css/locked.gif" alt="Lukittu">';
			if($line['sticky'] != 0) $return .= '<img style="border: 0;" src="http://www.711chan.org/css/sticky.gif" alt="Nastoitettu">';
			$return .= '</span>';
			$return .= '<br />';
			$return .= '<blockquote>'.$line['message'].'</blockquote>';
			if($replies_num == 1) $repstr = '<span class="omittedposts">'.$replies_num.' reply.</span>';
			elseif($replies_num == 3) $repstr = '';
			elseif($replies_num >= 1) $repstr = '<span class="omittedposts">'.$replies_min.' replies omitted.</span>';
			elseif($replies_num == 0) $repstr = '<span class="omittedposts">Thread has no replies.</span>';
			$return .= '<small>'.$repstr.'</small>';
			// Langan vastaukset
			$return .= '<div id="replies'.$line['id'].$board['name'].'">';
			
			
			if (is_array($repliesq)) {
			foreach($repliesq as $reply){
				$return .= '<table><tbody><tr>';
				$return .= '<td class="doubledash">&gt;&gt;</td>';
				$return .= '<td class="reply" id="reply'.$reply['id'].'">';
				$return .= '<label><input type="checkbox" name="post[]" value="tää ei tee mitään" /> ';
				if ($reply['subject'] != '') $return .= '<span class="filetitle">'.$reply['subject'].'</span> ';
				if ($reply['name'] == '') $reply['name'] = 'Anonymous';
				$return .= '<span class="postername">'.$reply['name'].'</span>';
				if ($reply['tripcode'] != '') $return .= '<span class="postertrip">!'.$reply['tripcode'].'</span> ';
				if ($reply['timestamp'] != '') $return .= ' '.date('d. m. Y H:i:s', $line['timestamp']);
				$return .= '</label> ';
				$return .= '<span class="reflink"><a href="'.KU_BOARDSFOLDER.$board['name'].'/res/'.$line['id'].'.html#'.$reply['id'].'" onclick="return highlight(\''.$reply['id'].'\');">No.&nbsp;'.$reply['id'].'</a></span><br>';
				if ($reply['file'] != '' && $reply['file'] != 'removed') {
					$return .= '<span class="filesize">File <a href="/'.$board['name'].'/src/'.$reply['file'].'.'.$reply['file_type'].'">'.$reply['file'].'.'.$reply['file_type'].' </a>- ('.$reply['file_size_formatted'].', '.$reply['image_w'].'x'.$reply['image_h'].', '.$reply['file_original'].'.'.$reply['file_type'].')</span><br />';
					if ($reply['file_type'] == 'jpg' || $reply['file_type'] == 'png' || $reply['file_type'] == 'gif') {
						$return .= '<span id="thumb'.$reply['id'].'"></span><img src="/'.$board['name'] . '/thumb/' . $reply['file'] . 's.' . $reply['file_type'] . '" alt="' . $reply['id'] . '" border="0" width="'.$reply['thumb_w'].'" height="'.$reply['thumb_h'].'" class="thumb" /></span>';
					} else $return .= 'Open thread to see file.';
				} elseif ($reply['file'] == 'removed') $return .= 'File deleted';
				$return .= '<blockquote>'.$reply['message'].'</blockquote>';
				$return .= '</tr></tbody></table>';
			}
			}
			$return .= '</div>';
			$return .= '</div><hr style="clear: both;" />';
		}
	}
} else {
	$return .= 'No threads.';
}
// Page Navagation
$return .= '<table border="1"><tbody><tr><td>';
$nextpage = $_GET['page'] + 1;
$prevpage = $_GET['page'] - 1;
if($page > 1) $return .= '<form method="get" action="'.KU_WEBPATH.$obpath.'?page='.$prevpage.'/"><input value="Previous" type="submit" /></form>';
else $return .= 'Previous';
	 
$return .= '</td><td>';
$pagearray = Array(0,1,2,3,4,5,6,7,8,9,10);	 // The pages are arrays because hitler :D
$thismax = ceil($nummax/10);
foreach($pagearray as $loldong){
	if($loldong < $thismax){
		if($loldong == $_GET['page']) $return .= '['.$loldong.'] ';
		else $return .= '[<a href="'.KU_WEBPATH.$obpath.'?page='.$loldong.'">'.$loldong.'</a>] ';
	}
}
$return .= '</td><td>';
if($page < 11) $return .= '<form method="get" action="'.KU_WEBPATH.$obpath.'?page='.$nextpage.'/"><input value="Next" type="submit" /></form>';
else $return .= 'Next';
	 
$return .= '</td></tr></tbody></table><br />';
$return .= navbar();
$return .= '<div class="footer" style="clear: both;">
- <a href="http://kusabax.cultnet.net/" target="_top">kusaba x '.KU_VERSION.'</a> -</div>';
$return .= '</body></html>';
echo $return;
?>