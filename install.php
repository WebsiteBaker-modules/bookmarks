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

if(defined('WB_URL')) {
	
	$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_bookmarks_links`");
	$mod_bookmarks = 'CREATE TABLE `'.TABLE_PREFIX.'mod_bookmarks_links` ( '
					 . '`link_id` INT NOT NULL AUTO_INCREMENT,'
					 . '`section_id` INT NOT NULL DEFAULT \'0\','
					 . '`page_id` INT NOT NULL DEFAULT \'0\','
					 . '`group_id` INT NOT NULL DEFAULT \'0\','
					 . '`position` INT NOT NULL DEFAULT \'0\','
					 . '`active` INT NOT NULL DEFAULT \'0\','
					 . '`title` VARCHAR(255) NOT NULL DEFAULT \'\','
					 . '`description` VARCHAR(255) NOT NULL DEFAULT \'\','
					 . '`aboutbm` TEXT NOT NULL,'
					 . '`type_link` INT(11) NOT NULL DEFAULT \'0\','
					 . '`target` VARCHAR(6) NOT NULL DEFAULT \'\','
					 . '`url` TEXT NOT NULL,'
					 . '`picture` VARCHAR(255) NOT NULL DEFAULT \'\','
					 . 'PRIMARY KEY (link_id)'
                . ' )';
	$database->query($mod_bookmarks);

	$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_bookmarks_groups`");
	$mod_bookmarks = 'CREATE TABLE `'.TABLE_PREFIX.'mod_bookmarks_groups` ( '
					 . '`group_id` INT NOT NULL AUTO_INCREMENT,'
					 . '`section_id` INT NOT NULL DEFAULT \'0\','
					 . '`page_id` INT NOT NULL DEFAULT \'0\','
					 . '`position` INT NOT NULL DEFAULT \'0\','
					 . '`active` INT NOT NULL DEFAULT \'0\','
					 . '`title` VARCHAR(255) NOT NULL DEFAULT \'\','
					 . '`sort_links_name` TINYINT(1) NOT NULL DEFAULT \'0\','
					 . 'PRIMARY KEY (group_id)'
                . ' )';
	$database->query($mod_bookmarks);
	
	$database->query("DROP TABLE IF EXISTS `".TABLE_PREFIX."mod_bookmarks_settings`");
	$mod_bookmarks = 'CREATE TABLE `'.TABLE_PREFIX.'mod_bookmarks_settings` ( '
					 . '`section_id` INT NOT NULL DEFAULT \'0\','
					 . '`page_id` INT NOT NULL DEFAULT \'0\','
					 . '`header` TEXT NOT NULL,'
					 . '`footer` TEXT NOT NULL,'
					 . '`gheader` TEXT NOT NULL,'
					 . '`gloop` TEXT NOT NULL,'
					 . '`gfooter` TEXT NOT NULL,'
					 . '`bheader` TEXT NOT NULL,'
					 . '`bloop` TEXT NOT NULL,'
					 . '`bfooter` TEXT NOT NULL,'
					 . '`cellcount` INT NOT NULL DEFAULT \'0\','
					 . '`pic_loc` VARCHAR(255) NOT NULL DEFAULT \'\','
					 . '`sort_grp_name` TINYINT(1) NOT NULL DEFAULT \'0\','
					 . '`sort_nogrp_links` TINYINT(1) NOT NULL DEFAULT \'0\','
					 . 'PRIMARY KEY (section_id)'
                . ' )';
	$database->query($mod_bookmarks);
	
	// Insert info into the search table
	// Module query info
	$field_info = array();
	$field_info['page_id'] = 'page_id';
	$field_info['title'] = 'page_title';
	$field_info['link'] = 'link';
	$field_info = serialize($field_info);
	$database->query("INSERT INTO ".TABLE_PREFIX."search (name,value,extra) VALUES ('module', 'bookmarks', '$field_info')");
	// Query start
	$query_start_code = "SELECT [TP]pages.page_id, [TP]pages.page_title, [TP]pages.link FROM [TP]mod_bookmarks_links, [TP]mod_bookmarks_groups, [TP]mod_bookmarks_settings, [TP]pages WHERE ";
	$database->query("INSERT INTO ".TABLE_PREFIX."search (name,value,extra) VALUES ('query_start', '$query_start_code', 'bookmarks')");

	// Query body
	$query_body_code = "
	[TP]pages.page_id = [TP]mod_bookmarks_links.page_id AND [TP]mod_bookmarks_links.title [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\' OR
	[TP]pages.page_id = [TP]mod_bookmarks_links.page_id AND [TP]mod_bookmarks_links.description [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\' OR
	[TP]pages.page_id = [TP]mod_bookmarks_links.page_id AND [TP]mod_bookmarks_links.url [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\' OR
	[TP]pages.page_id = [TP]mod_bookmarks_groups.page_id AND [TP]mod_bookmarks_groups.title [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\' OR
	[TP]pages.page_id = [TP]mod_bookmarks_settings.page_id AND [TP]mod_bookmarks_settings.header [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\' OR
	[TP]pages.page_id = [TP]mod_bookmarks_settings.page_id AND [TP]mod_bookmarks_settings.footer [O] \'[W][STRING][W]\' AND [TP]pages.searching = \'1\'
	";	
	$database->query("INSERT INTO ".TABLE_PREFIX."search (name,value,extra) VALUES ('query_body', '$query_body_code', 'bookmarks')");

	// Query end
	$query_end_code = "";	

	$database->query("INSERT INTO ".TABLE_PREFIX."search (name,value,extra) VALUES ('query_end', '$query_end_code', 'bookmarks')");
	
	// Insert blank rows (there needs to be at least on row for the search to work)
	$database->query("INSERT INTO ".TABLE_PREFIX."mod_bookmarks_links (section_id,page_id) VALUES ('0', '0')");
	$database->query("INSERT INTO ".TABLE_PREFIX."mod_bookmarks_groups (section_id,page_id) VALUES ('0', '0')");
	$database->query("INSERT INTO ".TABLE_PREFIX."mod_bookmarks_settings (section_id,page_id,cellcount) VALUES ('0', '0', '1')");

	//Add folder for images to media dir
	require_once(WB_PATH.'/framework/functions.php');
	make_dir(WB_PATH.MEDIA_DIRECTORY.'/bookmarks');
	
}

?>