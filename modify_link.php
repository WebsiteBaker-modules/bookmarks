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

// Get id
if(!isset($_GET['link_id']) OR !is_numeric($_GET['link_id'])) {
  header("Location: ".ADMIN_URL."/pages/index.php");
} else {
  $link_id = $_GET['link_id'];
}

// Include WB admin wrapper script
require(WB_PATH.'/modules/admin.php');

// Load Language file
if(LANGUAGE_LOADED) {
	if(!file_exists(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php')) {
		require_once(WB_PATH.'/modules/bookmarks/languages/EN.php');
	} else {
		require_once(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php');
	}
}

$query_content = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_links WHERE link_id = '$link_id'");
$fetch_content = $query_content->fetchRow();

?>
<form name="modify" action="<?php echo WB_URL; ?>/modules/bookmarks/save_link.php" method="post" style="margin: 0;">
	<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
	<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
	<input type="hidden" name="link_id" value="<?php echo $link_id; ?>">
	
	<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr>
  			<td><?php echo $BMTEXT['OPTION']; ?>:</td>
  			<td>
  				<input type="radio" name="type_link" id="type_link_false" value="0" <?php if($fetch_content['type_link'] == 0) { echo ' checked'; } ?> />
  				<a href="javascript: toggle_checkbox('type_link_false');"><?php echo $TEXT['TITLE']; ?></a>
  				&nbsp;<?php echo $BMTEXT['OR']; ?>&nbsp;
  				<input type="radio" name="type_link" id="type_link_true" value="1" <?php if($fetch_content['type_link'] == 1) { echo ' checked'; } ?> />
  				<a href="javascript: toggle_checkbox('type_link_true');"><?php echo $TEXT['IMAGE']; ?></a>
  			</td>
		</tr>
		<tr>
  			<td width="80"><?php echo $TEXT['TITLE']; ?>:</td>
  			<td>
  				<input type="text" name="title" value="<?php echo stripslashes($fetch_content['title']); ?>" style="width: 99%;" maxlength="255" />
  			</td>
		</tr>
		<tr>
  			<td width="80"><?php echo $TEXT['IMAGE']; ?>:</td>
  			<td>
			  <?php
			  // this piece of code scans the given directory and creates the selector
			  $query_content = $database->query("SELECT pic_loc FROM ".TABLE_PREFIX."mod_bookmarks_settings WHERE section_id = '$section_id'");
			  if($query_content->numRows() > 0) {
			    $fetch_settings = $query_content->fetchRow();
			    $pic_loc = $fetch_settings['pic_loc'];
			  }
			  if ($pic_loc == "") { $file_dir = ""; } else { $file_dir= WB_PATH . $pic_loc; }
			  $check_pic_dir=is_dir("$file_dir");
			  if ($check_pic_dir=='1') {
			    $pic_dir=opendir($file_dir);
			    echo "<select name=\"picture\">\n";
			    echo "<option value=\"\">None selected</option>\n";
			    while ($file=readdir($pic_dir)) {
			      if ($file != "." && $file != "..") {
			        if (ereg(".gif|.GIF|.jpg|.JPG|.png|.PNG|.jpeg|.JPEG",$file)) {
			          echo "<option value=\"".$file."\"";
			          if($fetch_content['picture'] == $file) { echo " Selected"; }
			          echo ">".$file."</option>\n";
			        }
			      }
			    }
			    echo "</select>\n";
			  } else { Echo $BMTEXT['DIRECTORY'].$pic_loc.$BMTEXT['NOT_EXIST']; }
			  ?>
			</td>
		</tr>
		<tr>
			<td width="80"><?php echo $TEXT['LINK']; ?>:</td>
			<td>
				<input type="text" name="url" value="<?php echo stripslashes($fetch_content['url']); ?>" style="width: 99%;" />
			</td>
		</tr>
		<tr>
			<td width="80"><?php echo $BMTEXT['PIC_TEXT']; ?>:</td>
			<td>
				<input type="text" name="description" value="<?php echo stripslashes($fetch_content['description']); ?>" style="width: 99%;" />
			</td>
		</tr>
		<tr>
			<td width="80" valign="top"><?php echo $BMTEXT['ABOUTBM']; ?>:</td>
			<td>
				<textarea name="aboutbm" style="width:99%; height: 80px;"><?php echo stripslashes(htmlspecialchars($fetch_content['aboutbm'])); ?></textarea>
			</td>
		</tr>
		<tr>
			<td width="80"><?php echo $TEXT['TARGET']; ?>:</td>
			<td>
				<select name="target" style="width: 25%;">
					<option value="_blank" <?php if($fetch_content['target'] == '_blank') { echo 'selected'; } ?>><?php echo $TEXT['NEW_WINDOW']; ?></option>
					<option value="_self" <?php if($fetch_content['target'] == '_self') { echo 'selected'; } ?>><?php echo $TEXT['SAME_WINDOW']; ?></option>
				</select>
			</td>
		</tr>
		<tr>
	  		<td width="80"><?php echo $TEXT['GROUP']; ?>:</td>
	  		<td>
	  			<select name="group" style="width: 25%;">
				<option value="0"><?php echo $TEXT['NONE']; ?></option>
				<?php
				$query = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_groups WHERE section_id = '$section_id' ORDER BY position ASC");
				if($query->numRows() > 0) {
					// Loop through groups
					while($group = $query->fetchRow()) {
					  ?>
					  <option value="<?php echo $group['group_id']; ?>"<?php if($fetch_content['group_id'] == $group['group_id']) { echo ' selected'; } ?>><?php echo stripslashes($group['title']); ?></option>
					  <?php
					}
				}
				?>
				</select>
	  		</td>
		</tr>
		<tr>
	  		<td><?php echo $TEXT['ACTIVE']; ?>:</td>
	  		<td>
	  			<input type="radio" name="active" id="active_true" value="1" <?php if($fetch_content['active'] == 1) { echo ' checked'; } ?> />
	  			<a href="javascript: toggle_checkbox('active_true');"><?php echo $TEXT['YES']; ?></a>
	  			&nbsp;
	  			<input type="radio" name="active" id="active_false" value="0" <?php if($fetch_content['active'] == 0) { echo ' checked'; } ?> />
	  			<a href="javascript: toggle_checkbox('active_false');"><?php echo $TEXT['NO']; ?></a>
	  		</td>
		</tr>
	</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="left">
	  		<input name="save" type="submit" value="<?php echo $TEXT['SAVE'].' '.$TEXT['LINK']; ?>" style="width: 200px; margin-top: 5px;"></form>
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