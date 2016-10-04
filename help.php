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
 
// STEP 1:	Initialize
require('../../config.php');

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Load Language file
if(LANGUAGE_LOADED) {
    require_once(WB_PATH.'/modules/bookmarks/languages/EN.php');
    if(file_exists(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php')) {
        require_once(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php');
    }
}

// Load correct help fil
if(LANGUAGE_LOADED) {
    $help = WB_PATH."/modules/bookmarks/languages/help-EN.php";
    if(file_exists(WB_PATH.'/modules/bookmarks/languages/help-'.LANGUAGE.'.php')) {
        $help = WB_PATH."/modules/bookmarks/languages/help-".LANGUAGE.".php";
    }
}

// STEP 2:	Get actual settings from database
$query_settings = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_settings WHERE section_id = '$section_id'");
$settings = $query_settings->fetchRow();

// STEP 3:	Display the help page.
?>

<style type="text/css">
.setting_name {
	vertical-align: top;
}

.row_a a {
	 border-bottom: 1px dashed #000;
}

.row_a a:hover {
	 border-bottom: 1px solid #000;
}
</style>
<table class="row_a" cellpadding="2" cellspacing="0" border="0" align="center" width="100%">
	<tr>
		<td class="setting_name">
		<?php include($help); // Load help file ?>
			
			<a name="changelog"></a><h4>Changelog</h4>
			<ul>
				<li><strong>Version 2.9.1 (19-05-2007) by Niclas Brorsson</strong>
					<ul>
						<li><strong>Added:</strong> Swedish language support</li>
						<li><strong>Added:</strong> Sorting groups and links by name or order in database</li>
						<li><strong>Fixed:</strong> some issues in CSS</li>
					</ul>
				</li>
				<li><strong>Version 2.9 (15-01-2007) by Matthias Gallas</strong>
					<ul>
						<li><strong>Changed:</strong> Code for multilanguage support</li>
						<li><strong>Fixed:</strong> Deleting a section now also deletes the links and groups of this section</li>
						<li><strong>Fixed:</strong> some issues with the media/bookmarks dir</li>
						<li><strong>Fixed:</strong> soem issues in the language files</li>
					</ul>
				</li>
				<li><strong>Version 2.8 (03-01-2007) by Matthias Gallas</strong>
					<ul>
						<li><strong>Changed:</strong> All copyright notices now includes 2007</li>
						<li><strong>Fixed:</strong> Groups and links with now title couldn't be stored no longer</li>
					</ul>
				</li>
				<li><strong>Version 2.7 (04-12-2006) by Matthias Gallas</strong>
					<ul>
						<li><strong>Fixed:</strong> Added stripslashes Group Title</li>
						<li><strong>Fixed:</strong> Issue in Uninstall script</li>
					</ul>
				</li>
				<li><strong>Version 2.6 (09-11-2006) by Matthias Gallas</strong>
					<ul>
						<li><strong>Changed:</strong> Install script supports now mysql5 strict mode</li>
						<li><strong>Changed:</strong> All files stored unix konform</li>
					</ul>
				</li>
				<li><strong>Version 2.5 (12-28-2005) by Matthias Gallas</strong>
					<ul>
						<li><strong>Added:</strong> New Multilanguage support</li>
						<li><strong>Changed:</strong> Minor layout changes in admin Interface</li>
					</ul>
				</li>
				<li><strong>Version 2.4.2 (11-25-2005) by Matthias Gallas</strong>
					<ul>
						<li><strong>Added:</strong> Language file works with help file</li>
						<li><strong>Added:</strong> Image links are without borders as default</li>
						<li><strong>Changed:</strong> Minor layout changes in admin Interface</li>
						<li><strong>Fixed:</strong> Code cleaning and all files stored UNIX konform</li>
					</ul>
				</li>
				<li><strong>Version 2.4.1 (11-25-2005) by Bennie Wijs</strong>
					<ul>
						<li><strong>Fixed:</strong> Layout of the help.php file within Internet Explorer</li>
					</ul>
				</li>
				<li><strong>Version 2.4.0 (11-12-2005) by Woudloper and Matthias Gallas</strong>
					<ul>
						<li><strong>Added:</strong> Option to modify the layout</li>
						<li><strong>Added:</strong> Option to write down something about a bookmark</li>
						<li><strong>Added:</strong> Help section</li>
						<li><strong>Fixed:</strong> Displaying of quotes within link text</li>
						<li><strong>Fixed:</strong> Language for saving group name on the button</li>
						<li><strong>Fixed:</strong> Wrong target code and html output</li>
					</ul>
				</li>
			</ul>
		</td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td>
			<input type="button" value="<?php echo $TEXT['BACK']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page_id; ?>';" style="width: 100px; margin-top: 5px;" />
		</td>
	</tr>	
</table>