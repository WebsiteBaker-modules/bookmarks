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

require_once('../../config.php');
require_once(WB_PATH.'/framework/functions.php');

$database = new database(DB_URL);

// Adding the new fields to the database table mod_bookmarks_settings and mod_bookmarks_groups
echo "<BR><B>Adding new fields to database table mod_bookmarks_settings</B><BR>";
if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_bookmarks_settings` ADD `sort_grp_name` TINYINT(1) NOT NULL DEFAULT '0' AFTER `pic_loc`")) {
        echo 'Database Field sort_grp_name added successfully<br />';
}


if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_bookmarks_settings` ADD `sort_nogrp_links` TINYINT(1) NOT NULL DEFAULT '0' AFTER `sort_grp_name`")) {
        echo 'Database Field sort_nogrp_links added successfully<br />';
}


echo "<BR><B>Adding new field to database table mod_bookmarks_groups</B><BR>";
if($database->query("ALTER TABLE `".TABLE_PREFIX."mod_bookmarks_groups` ADD `sort_links_name` TINYINT(1) NOT NULL DEFAULT '0' AFTER `title`")) {
        echo 'Database Field sort_links_name added successfully<br />';
}


        echo 'Your Bookmark module is updated!<br />';

?>