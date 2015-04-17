<?php

/*

 Website Baker Project <http://www.websitebaker.org/>
 Copyright (C) 2004-2009, Ryan Djurovich
 Copyright (C) 2009-2010, WebsiteBaker Org e.V.

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

-----------------------------------------------------------------------------------------------------------
  Bookmarks module for Website Baker v2.6.x
  Started to track applied changes in info.php from Nov 26, 2007 onwards (doc)
 -----------------------------------------------------------------------------------------------------------

    v2.95 (webbird, July 08, 2014)
        + fix: replaced short open tag (<?) with <?php

	v2.94 (erpe, May 08, 2010)
		+ added IT language file and added guid to info.php
  
    v2.93 (doc.. Christian Sommer; Dec 01, 2007)
		+ included another fix from: http://forum.websitebaker.org/index.php/topic,1733.msg47961.html#msg47961
		  modified line 63 and 81 in view.php to fix problems with sorting of links (group settings)

	v2.92 (doc.. Christian Sommer; Nov 26, 2007)
		+ included bug fix from: http://forum.websitebaker.org/index.php/topic,1733.msg47802.html#msg47802
		  modified line 145 in view.php to fix problems with sorting for ungrouped bookmarks
		  changed: ORDER BY '$sort_nogrp' ASC to ORDER BY $sort_nogrp ASC (thanks to bueno)
 -----------------------------------------------------------------------------------------------------------

*/

$module_directory	= 'bookmarks';
$module_name        = 'Bookmarks';
$module_function    = 'page';
$module_version     = '2.95';
$module_platform    = '2.6.x';
$module_author      = 'Ryan Djurovich, Bennie Wijs, Woudloper, Matthias Gallas, Niclas Brorsson';
$module_license     = 'GNU General Public License';
$module_description = 'This page type is designed for making a bookmarks page, with a list of links and sorting them by name or place in list';
$module_guid		= '82F5D9B7-AE79-4E92-99C2-9DA75337BBD8';
$module_home		= 'http://www.websitebakers.com';
?>