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
if(!defined('WB_PATH')) { exit("Cannot access this file directly"); }

// Load Language file
if(LANGUAGE_LOADED) {
        if(!file_exists(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php')) {
                require_once(WB_PATH.'/modules/bookmarks/languages/EN.php');
        } else {
                require_once(WB_PATH.'/modules/bookmarks/languages/'.LANGUAGE.'.php');
        }
}

//Delete all links and groups with no title
$database->query("DELETE FROM ".TABLE_PREFIX."mod_bookmarks_links  WHERE page_id = '$page_id' and section_id = '$section_id' and title=''");
$database->query("DELETE FROM ".TABLE_PREFIX."mod_bookmarks_groups  WHERE page_id = '$page_id' and section_id = '$section_id' and title=''");

// Get information on what groups and ungrouped links are sorted by
$query_sort_grp_name = $database->query("SELECT * FROM ".TABLE_PREFIX."mod_bookmarks_settings WHERE section_id = '$section_id'");
$sorting = $query_sort_grp_name->fetchRow()
// $query_sort_nogrp_links = $database->query("SELECT sort_nogrp_links FROM ".TABLE_PREFIX."mod_bookmarks_settings WHERE section_id = '$section_id'");

?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
        <td align="left" width="25%">
                <input type="button" value="<?php echo $TEXT['ADD'].' '.$TEXT['LINK']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/bookmarks/add_link.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
        </td>
        <td align="center" width="25%">
                <input type="button" value="<?php echo $TEXT['ADD'].' '.$TEXT['GROUP']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/bookmarks/add_group.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
        </td>
        <td align="right" width="25%">
                <input type="button" value="<?php echo $TEXT['SETTINGS']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/bookmarks/modify_settings.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
        </td>
        <td align="right" width="25%">
                <input type="button" value="<?php echo $MENU['HELP']; ?>" onclick="javascript: window.location = '<?php echo WB_URL; ?>/modules/bookmarks/help.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>';" style="width: 100%;" />
        </td>
</tr>
</table>

<br />

<h2><?php echo $TEXT['MODIFY'].'/'.$TEXT['DELETE'].' '.$TEXT['LINK']; ?></h2>

<?php

// Loop through existing links
$query_links = $database->query("SELECT * FROM `".TABLE_PREFIX."mod_bookmarks_links` WHERE section_id = '$section_id' ORDER BY position ASC");
if($query_links->numRows() > 0) {
        $row = 'a';
        ?>
        <table cellpadding="2" cellspacing="0" border="0" width="100%">
        <?php
        while($link = $query_links->fetchRow()) {
                ?>
                <tr class="row_<?php echo $row; ?>" height="20">
                        <td width="20">
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/modify_link.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&link_id=<?php echo $link['link_id']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/modify_16.png" border="0" alt="Modify" />
                                </a>
                        </td>
                        <td>
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/modify_link.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&link_id=<?php echo $link['link_id']; ?>">
                                        <?php echo stripslashes($link['title']); ?>
                                </a>
                        </td>
                        <td width="220">
                                <?php echo $TEXT['GROUP'].': ';
                                // Get group title
                                $query_title = $database->query("SELECT title FROM ".TABLE_PREFIX."mod_bookmarks_groups WHERE group_id = '".$link['group_id']."'");
                                if($query_title->numRows() > 0) {
                                        $fetch_title = $query_title->fetchRow();
                                        echo stripslashes($fetch_title['title']);
                                } else {
                                        echo $TEXT['NONE'];
                                }
                                ?>
                        </td>
                        <td width="80">
                                <?php echo $TEXT['ACTIVE'].': '; if($link['active'] == 1) { echo $TEXT['YES']; } else { echo $TEXT['NO']; } ?>
                        </td>
                        <td width="20">
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/move_up.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&link_id=<?php echo $link['link_id']; ?>" title="<?php echo $TEXT['MOVE_UP']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/up_16.png" border="0" alt="^" />
                                </a>
                        </td>
                        <td width="20">
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/move_down.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&link_id=<?php echo $link['link_id']; ?>" title="<?php echo $TEXT['MOVE_DOWN']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/down_16.png" border="0" alt="v" />
                                </a>
                        </td>
                        <td width="20">
                                <a href="#" onclick="javascript: confirm_link('<?php echo $TEXT['ARE_YOU_SURE']; ?>', '<?php echo WB_URL; ?>/modules/bookmarks/delete_link.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&link_id=<?php echo $link['link_id']; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/delete_16.png" border="0" alt="<?php echo $TEXT['DELETE']; ?>" />
                                </a>
                        </td>
                </tr>
                <?php
                // Alternate row color
                if($row == 'a') {
                        $row = 'b';
                } else {
                        $row = 'a';
                }
        }
        ?>
        </table>
        <?php
} else {
        echo $TEXT['NONE_FOUND'];
}

?>


<br />

<h2><?php echo $TEXT['MODIFY'].'/'.$TEXT['DELETE'].' '.$TEXT['GROUP']; ?></h2>


<?php

// Loop through existing groups
$query_groups = $database->query("SELECT * FROM `".TABLE_PREFIX."mod_bookmarks_groups` WHERE section_id = '$section_id' ORDER BY position ASC");
if($query_groups->numRows() > 0) {
        $row = 'a';
        ?>
        <table cellpadding="2" cellspacing="0" border="0" width="100%">
        <?php
        while($group = $query_groups->fetchRow()) {
                ?>
                <tr class="row_<?php echo $row; ?>" height="20">
                        <td width="20">
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/modify_group.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&group_id=<?php echo $group['group_id']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/modify_16.png" border="0" alt="Modify - " />
                                </a>
                        </td>
                        <td>
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/modify_group.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&group_id=<?php echo $group['group_id']; ?>">
                                        <?php echo stripslashes($group['title']); ?>
                                </a>
                        </td>
                        <td width="220">
                                <?php echo $BMTEXT['SORT_BY'].': '; if($group['sort_links_name'] == 0) { echo $BMTEXT['SORT_BY_ORDER']; } else { echo $BMTEXT['SORT_BY_NAME']; } ?>
                        </td>
                        <td width="80">
                                <?php echo $TEXT['ACTIVE'].': '; if($group['active'] == 1) { echo $TEXT['YES']; } else { echo $TEXT['NO']; } ?>
                        </td>
                        <td width="20">
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/move_up.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&group_id=<?php echo $group['group_id']; ?>" title="<?php echo $TEXT['MOVE_UP']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/up_16.png" border="0" alt="^" />
                                </a>
                        </td>
                        <td width="20">
                                <a href="<?php echo WB_URL; ?>/modules/bookmarks/move_down.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&group_id=<?php echo $group['group_id']; ?>" title="<?php echo $TEXT['MOVE_DOWN']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/down_16.png" border="0" alt="v" />
                                </a>
                        </td>
                        <td width="20">
                                <a href="#" onclick="javascript: confirm_link('<?php echo $TEXT['ARE_YOU_SURE']; ?>', '<?php echo WB_URL; ?>/modules/bookmarks/delete_group.php?page_id=<?php echo $page_id; ?>&section_id=<?php echo $section_id; ?>&group_id=<?php echo $group['group_id']; ?>');" title="<?php echo $TEXT['DELETE']; ?>">
                                        <img src="<?php echo ADMIN_URL; ?>/images/delete_16.png" border="0" alt="X" />
                                </a>
                        </td>
                </tr>
                <?php
                // Alternate row color
                if($row == 'a') {
                        $row = 'b';
                } else {
                        $row = 'a';
                }
        }
        ?>
        </table>
        <?php
} else {
        echo $TEXT['NONE_FOUND'];
}

?>