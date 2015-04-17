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

// Get header and footer
$query_content = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_settings WHERE section_id = '$section_id'");
$fetch_content = $query_content->fetchRow();

?>
<style type="text/css">
.newsection {
	border-top: 1px dashed #fff;
}
</style>

<form name="edit" action="<?php echo WB_URL; ?>/modules/bookmarks/save_settings.php" method="post" style="margin: 0;">

	<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
	<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">

	<table class="row_a" cellpadding="2" cellspacing="0" border="0" width="100%">
		<tr>
			<td colspan="2"><strong><?php echo $BMTEXT['MNSETTINGS']; ?></strong></td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $BMTEXT['PIC_LOC']; ?>:</td>
			<td>
				<?php
				$pic_loc1 = stripslashes($fetch_content['pic_loc']);
				if ($pic_loc1 == '') { $pic_loc1 = MEDIA_DIRECTORY.'/bookmarks'; };
				?>
				<input name="pic_loc" type="text" value="<?php echo $pic_loc1; ?>" style="width: 98%;">
			</td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $BMTEXT['COLUMS']; ?>:</td>
			<td>
			<?php $cellcount = stripslashes($fetch_content['cellcount']); ?>
			<?php if ($cellcount == 0) { $cellcount = 1; } ?>
			<select name="cellcount">
				<option value ="1" <?php if ($cellcount == 1) { echo "selected"; } ?> >1</option>
				<option value ="2" <?php if ($cellcount == 2) { echo "selected"; } ?> >2</option>
				<option value ="3" <?php if ($cellcount == 3) { echo "selected"; } ?> >3</option>
				<option value ="4" <?php if ($cellcount == 4) { echo "selected"; } ?> >4</option>
			</select>
		</tr>
		<tr>
			<td><?php echo $BMTEXT['SORT_GRP_BY']; ?>:</td>
			<td>
				<input type="radio" name="sort_grp_name" id="active_false" value="0" <?php if($fetch_content['sort_grp_name'] == 0) { echo ' checked'; } ?> />
				<a href="#" onclick="javascript: document.getElementById('sort_grp_name_false').checked = true;">
				<?php echo $BMTEXT['SORT_BY_ORDER']; ?>
				</a>
				-
				<input type="radio" name="sort_grp_name" id="active_true" value="1" <?php if($fetch_content['sort_grp_name'] == 1) { echo ' checked'; } ?> />
				<a href="#" onclick="javascript: document.getElementById('sort_grp_name_true').checked = true;">
				<?php echo $BMTEXT['SORT_BY_NAME']; ?>
				</a>
			</td>
		</tr>
		<tr>
			<td><?php echo $BMTEXT['SORT_NOGRP_BY']; ?>:</td>
			<td>
				<input type="radio" name="sort_nogrp_links" id="active_false" value="0" <?php if($fetch_content['sort_nogrp_links'] == 0) { echo ' checked'; } ?> />
				<a href="#" onclick="javascript: document.getElementById('sort_nogrp_links_false').checked = true;">
				<?php echo $BMTEXT['SORT_BY_ORDER']; ?>
				</a>
				-
				<input type="radio" name="sort_nogrp_links" id="active_true" value="1" <?php if($fetch_content['sort_nogrp_links'] == 1) { echo ' checked'; } ?> />
				<a href="#" onclick="javascript: document.getElementById('sort_nogrp_links_true').checked = true;">
				<?php echo $BMTEXT['SORT_BY_NAME']; ?>
				</a>
			</td>
		</tr>
	</table>
	
	<table class="row_a" cellpadding="2" cellspacing="0" border="0" width="100%" style="margin-top: 3px;">
		<tr>
			<td colspan="2"><strong><?php echo $BMTEXT['LTSETTINGS']; ?></strong></td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $TEXT['HEADER']; ?>:</td>
			<td>
				<textarea name="header" style="width: 98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['header'])); ?></textarea>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $TEXT['FOOTER']; ?>:</td>
			<td>
				<textarea name="footer" style="width: 98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['footer'])); ?></textarea>
		</tr>
		<tr>
			<td width="30%" valign="top" class="newsection"><?php echo $BMTEXT['GPHEADER']; ?></td>
			<td class="newsection">
				<textarea name="gheader" style="width:98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['gheader'])); ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $BMTEXT['GPLOOP']; ?></td>
			<td>
				<textarea name="gloop" style="width:98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['gloop'])); ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $BMTEXT['GPFOOTER']; ?></td>
			<td>
				<textarea name="gfooter" style="width:98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['gfooter'])); ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="30%" valign="top" class="newsection"><?php echo $BMTEXT['BMHEADER']; ?></td>
			<td class="newsection">
				<textarea name="bheader" style="width:98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['bheader'])); ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $BMTEXT['BMLOOP']; ?></td>
			<td>
				<textarea name="bloop" style="width:98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['bloop'])); ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="30%" valign="top"><?php echo $BMTEXT['BMFOOTER']; ?></td>
			<td>
				<textarea name="bfooter" style="width:98%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['bfooter'])); ?></textarea>
			</td>
		</tr>
	</table>

	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
			<td align="left">
				<input name="save" type="submit" value="<?php echo $TEXT['SAVE']; ?>" style="width: 100px; margin-top: 5px;"></form>
			</td>
			<td align="right">
                <input type="button" value="<?php echo $TEXT['CANCEL']; ?>" onclick="javascript: window.location = '<?php echo ADMIN_URL; ?>/pages/modify.php?page_id=<?php echo $page_id; ?>';" style="width: 100px; margin-top: 5px;" />
			</td>
		</tr>
	</table>

<?php

// Print admin footer
$admin->print_footer();

?>