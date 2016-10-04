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

// Help file in English
?>
<h3>Help about Bookmark Module</h3>

<p>This file contains help about the different option for the bookmark module. The Bookmarks module provides you the possibility to display a list of bookmarks within your Website Baker website. As can be read down below this module is very flexible and the output can be maintained via the settings.</p>

<p>The help is divided in 3 sections: <a href="#main_settings"><?php echo $BMTEXT['MNSETTINGS']; ?></a>, <a href="#layout_settings"><?php echo $BMTEXT['LTSETTINGS']; ?></a> and the <a href="#changelog">changelog</a>. All this information is described down below.</p>

<a name="main_settings"></a><h4><?php echo $BMTEXT['MNSETTINGS']; ?></h4>
<p>This section contains the required fields that are neccasery to get this module to work.</p>
<ul>
	<li><code><?php echo $BMTEXT['PIC_LOC']; ?></code> - This is the location where the images (<i>that are being used for the bookmarks</i>) are being stored.</li>
	<li><code><?php echo $BMTEXT['COLUMS']; ?></code> - With this option you can specify the number of columns you would like to show. This functionality basically works as followed. When you set the value e.g. to 4 the field 'bookmark loop' will be repeated 4 times before the 'bookmarks footer' and 'bookmarks header' will be loaded again on the frontend.</li>
	<li><code><?php echo $BMTEXT['SORT_GRP_BY']; ?></code> - Here you specify if groups should be sorted by names or order in databas.</li>
	</ul>

<a name="layout_settings"></a><h4><?php echo $BMTEXT['LTSETTINGS']; ?></h4>
<p>With the options down below you can modify the layout of the different sections for the bookmark module.</p>
<ul>
	<li><code><?php echo $TEXT['HEADER']; ?></code> - This field will be loaded on the frontend bookmarks page as first. You can use this to include a intro text or use it for e.g. the stylesheet elements.</li>
	<li><code><?php echo $TEXT['FOOTER']; ?></code> - This field will be loaded as last on the frontend bookmarks page. You can use this for e.g. a trailer text.</li>
	<li><code><?php echo $BMTEXT['GPHEADER']; ?></code> - This field will be loaded for each group that will start.</li>
	<li><code><?php echo $BMTEXT['GPLOOP']; ?></code> - This is a loop that is loaded for each group header. Within this field you can work with the following options:
		<ul>
			<li><code>[NROFCOLUMNS]</code> - This returns the number of columns (<i>as specified in the main settings section</i>). You can use this for e.g. the colspan in a table cell.</li>
			<li><code>[GROUPTITLE]</code> - This field returns the actual group title or name.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['GPFOOTER']; ?></code> - This filed will be loaded for each group at the end.</li>
	<li><code><?php echo $BMTEXT['BMHEADER']; ?></code> - This is the bookmarks loop header. It will be loaded on the frontend when a bookmark loop starts or when the number of columns have been reached.</li>
	<li><code><?php echo $BMTEXT['BMLOOP']; ?></code> - This is the main part. With this field you can modify the output of the bookmark loop. Within this field you have the following options:
		<ul>
			<li><code>[BMURL]</code> - The actual URL of the bookmark</li>
			<li><code>[BMTARGET]</code> - This field will return the target of the link. Options are: <code> target="_self" </code> or <code> target="_blank" </code></li>
			<li><code>[BMTITLE]</code> - This field returns the title or description of the link. You can use this e.g. for the title attribute within a anchor element.</li>
			<li><code>[BMVALUE]</code> - This field will return either the text/name of a link or it will return a img element when the option has been specified that the link is a image link.</li>
			<li><code>[BMDESCRIPTION]</code> - This field returns information that has been written down in the 'About Bookmark' field.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['BMFOOTER']; ?></code> - This is the bookmarks loop footer. It will be loaded on the frontend when a bookmark loop ends or when the number of columns have been reached.</li>
</ul>