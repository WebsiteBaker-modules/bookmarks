<?php

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2007, Ryan Djurovich

 Website Baker is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 Website Baker is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Website Baker; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// Must include code to stop this file being access directly
if(defined('WB_PATH') == false) { exit("Cannot access this file directly"); }

$WB_URL = WB_URL;

// Load Language file
if(LANGUAGE_LOADED) {
    require_once(WB_PATH.'/modules/bookmarks/languages/EN.php');
    if(file_exists(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php')) {
        require_once(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php');
    }
}

// Get header and footer
$query_content = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_settings WHERE section_id = '$section_id'");
if($query_content->numRows() > 0) {
	$fetch_settings = $query_content->fetchRow();
	$cellcount = stripslashes($fetch_settings['cellcount']);
	$pic_loc = $fetch_settings['pic_loc'];
	$sort_grp_name = $fetch_settings['sort_grp_name'];
	$sort_nogrp_links = $fetch_settings['sort_nogrp_links'];
} else {
	$cellcount = 1;
	$pic_loc = '';
}

if ($cellcount == "" OR $cellcount == 0) { $cellcount = 1; }

// Sorting groups by title or position
if ($sort_grp_name == "1") {
	$sort_grp = "title";
}
else
	$sort_grp = "position";

// Print header
echo stripslashes($fetch_settings['header']);

// Loop through groups
$query_groups = $database->query("SELECT group_id,title,sort_links_name FROM ".TABLE_PREFIX."mod_bookmarks_groups WHERE section_id = '$section_id' AND active = '1' ORDER BY $sort_grp ASC");

if($query_groups->numRows() > 0) {
	
	echo stripslashes($fetch_settings['gheader']);
	
	while($group = $query_groups->fetchRow()) {
		$group_id = $group['group_id'];

		// Sort links by title or position
		$sort_links_name = $group['sort_links_name'];
		if ($sort_links_name == "1") {
			$sort_links = "title";
		}
		else
			$sort_links = "position";
		
		// Query links in this group
		$query_links = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_links WHERE section_id = '$section_id' AND group_id = '$group_id' AND active = '1' ORDER BY $sort_links ASC");
		if($query_links->numRows() > 0) {
			
			$vars = array( '[NROFCOLUMNS]', '[GROUPTITLE]' );
			$values = array ($cellcount, stripslashes($group['title']));

			//output the set based upon $gloop template			
			echo str_replace($vars, $values, stripslashes($fetch_settings['gloop']));
				
			$linkcount = 1;
			
			// Loop through all links in this group
		
			while($link = $query_links->fetchRow()) {
				if ($linkcount == "1") { 
					echo stripslashes($fetch_settings['bheader']);
				}
				
				$bmurl = $link['url'];
				$bmtarget = $link['target'];
				$bmtitle = stripslashes($link['description']);
				if ($link['type_link'] == "0") { 
					$bmvalue = stripslashes($link['title']); 
				} else { 
					$bmvalue = '<img src="' . WB_URL . $pic_loc . '/' . $link['picture'] . '">';
				}
				$bmdescription = stripslashes($link['aboutbm']);
				
				$vars = array( '[BMURL]', '[BMTARGET]', '[BMTITLE]', '[BMVALUE]', '[BMDESCRIPTION]' );
				$values = array ($bmurl, $bmtarget, $bmtitle, $bmvalue, $bmdescription);
	
				//output the set based upon $gloop template			
				echo str_replace($vars, $values, stripslashes($fetch_settings['bloop']));
				
				//Should we print the bookmark footer?
				if ( $linkcount == $cellcount ) { 
					echo stripslashes($fetch_settings['bfooter']);
					$linkcount = 1; 
				} else {
					$linkcount++;
				}
			}
			
			// ??? Should I do something with below section?
			if ( $linkcount !== 1) { 
				echo stripslashes($fetch_settings['bfooter']);
			}
		}
	}
	
	echo stripslashes($fetch_settings['gfooter']);

}

// Now loop through any links not in groups

// Sorting nogroup links by title or position
if ($sort_nogrp_links == "1") {
	$sort_nogrp = "title";
}
else
	$sort_nogrp = "position";

$query_links = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_links WHERE section_id = '$section_id' AND group_id = '0' AND active = '1' ORDER BY $sort_nogrp ASC");

if($query_links->numRows() > 0) {
	
	echo stripslashes($fetch_settings['gheader']);
	
	$gname = $BMTEXT['NOGROUP'];
	
	$vars = array( '[NROFCOLUMNS]', '[GROUPTITLE]' );
	$values = array ($cellcount, $gname);

	//output the set based upon $gloop template			
	echo str_replace($vars, $values, stripslashes($fetch_settings['gloop']));
	
	$linkcount = 1;
	
	while($link = $query_links->fetchRow()) {
		
		if ($linkcount == "1") { 
			echo stripslashes($fetch_settings['bheader']);
		}
		
		$bmurl = $link['url'];
		$bmtarget = $link['target'];
		$bmtitle = stripslashes($link['description']);
		if ($link['type_link'] == "0") { 
			$bmvalue = stripslashes($link['title']); 
		} else { 
			$bmvalue = '<img src="' . WB_URL . $pic_loc . '/' . $link['picture'] . '">';
		}
		$bmdescription = stripslashes($link['aboutbm']);
		
		$vars = array( '[BMURL]', '[BMTARGET]', '[BMTITLE]', '[BMVALUE]', '[BMDESCRIPTION]' );
		$values = array ($bmurl, $bmtarget, $bmtitle, $bmvalue, $bmdescription);

		//output the set based upon $gloop template			
		echo str_replace($vars, $values, stripslashes($fetch_settings['bloop']));
				
		if ( $linkcount == $cellcount ) { 
			echo stripslashes($fetch_settings['bfooter']);
			$linkcount = 1; 
		} else {
			$linkcount++;
		}
	}
	
	if ( $linkcount !== 1) { 
		echo stripslashes($fetch_settings['bfooter']);
	}
	
	echo stripslashes($fetch_settings['gfooter']);
}
?>
<?php

// Print footer
echo stripslashes($fetch_settings['footer']);

?>