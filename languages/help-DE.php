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

// Help file in German
?>
<h3>Hilfe für das Bookmark Module</h3>

<p>Diese Datei enthält die Hilfe über die verschiedenen Optionen des Bookmark Modul. Mit dem Bookmarks Modul können sie ganz leicht eine Linkliste innerhalb ihrer Homepage erzeugen. Diese Modul ist äußerst flexibel sowohl für die Inhalte als auch für das Aussehen.</p>

<p>Die Hilfe ist in 3 Abschnitte unterteilt: <a href="#main_settings"><?php echo $BMTEXT['MNSETTINGS']; ?></a>, <a href="#layout_settings"><?php echo $BMTEXT['LTSETTINGS']; ?></a> und der <a href="#changelog">Changelog</a>. All diese Informationen sind anschließend erläutert.</p>

<a name="main_settings"></a><h4><?php echo $BMTEXT['MNSETTINGS']; ?></h4>
<p>Angaben in diesem Abschnitt sind wichtig für das korrekte Funktionieren des Moduls</p>
<ul>
	<li><code><?php echo $BMTEXT['PIC_LOC']; ?></code> - Der Ort an dem die Bilder (<i>die anstelle von Text für links eingesetzt werden sollen</i>) gespeichert sind.</li>
	<li><code><?php echo $BMTEXT['COLUMS']; ?></code> - Hier können sie festlegen wieviele Links in einer Zeile nebeneinander angezeigt werden sollen.</li>
	<li><code><?php echo $BMTEXT['SORT_GRP_BY']; ?></code> - Hier können sie festlegen, ob die links in alphabetischer Reihenfolge oder in der Reihenfolge wie sie in der Datenbank gespeichert sind, angezeigt werden sollen.</li>
</ul>

<a name="layout_settings"></a><h4><?php echo $BMTEXT['LTSETTINGS']; ?></h4>
<p>Angaben in diesem Abschnitt verändern das Layout</p>
<ul>
	<li><code><?php echo $TEXT['HEADER']; ?></code> - Diese Feld wird oberhalb der eigentlichen Linkliste angezeigt. Man kann es für eine Überschrift oder einen Einführungstext nutzen. Momentan sind dort auch noch die Stylesheets für das Modul zu finden.</li>
	<li><code><?php echo $TEXT['FOOTER']; ?></code> - Dieses Feld wird unterhalb der Linkliste angezeigt. Man kann hier ebenfalls beliebigen Text, der unter der Linkliste erscheinen soll, eintragen.</li>
	<li><code><?php echo $BMTEXT['GPHEADER']; ?></code> - Hier wird der Starttag für die das Linkmodul eingetragen</li>
	<li><code><?php echo $BMTEXT['GPLOOP']; ?></code> - Dies ist die Zeile für die Gruppenüberschriften. Zwei Variablen sind hier von Bedeutung:
		<ul>
			<li><code>[NROFCOLUMNS]</code> - Gibt die Anzahl der nebeneinanderliegenden Links an (<i>so wie sie in den Grundeinstellungen eingestellt ist</i>). Sinnvoll im Zusammenhang mit "colspan" um den Gruppennamen über allen Links anzuzeigen.</li>
			<li><code>[GROUPTITLE]</code> - Die Ausgabe des eigentlichen Gruppentitels.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['GPFOOTER']; ?></code> - Hier wird der Endtag für die für die Linkmodul eingegeben</li>
	<li><code><?php echo $BMTEXT['BMHEADER']; ?></code> - Hier wird der Starttag für die eigentliche Linkliste eingetragen.</li>
	<li><code><?php echo $BMTEXT['BMLOOP']; ?></code> - Hier wird die Ausgabe der einzelnen Links generiert. Diese Zeile wird so oft wiederholt wie in den Grundeinstellungen angegeben. Innerhalb diese Feldes können folgende Variablen benutzt werden:
		<ul>
			<li><code>[BMURL]</code> - Die URL des Links</li>
			<li><code>[BMTARGET]</code> - Wie sich der Link öffnen soll (Optionen: Im gleichen Fenster oder in einem neuen Fenster)</li>
			<li><code>[BMTITLE]</code> - Den Titel des Links</li>
			<li><code>[BMVALUE]</code> - Den Text oder sofern ausgewählt das Bild für den Link</li>
			<li><code>[BMDESCRIPTION]</code> - Die Beschreibung des Links</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['BMFOOTER']; ?></code> - Hier wird der Endtag für die eigentliche Linkliste eingetragen</li>
</ul>