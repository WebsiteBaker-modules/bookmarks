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

// Help file in Swedish
?>
<h3>Hj�lp f�r Bokm�rke Modulen</h3>

<p>Denna fil inneh�ller hj�lp om de olika valen i Bokm�rke modulen. Bokm�rke modulen ger dig m�jlighet att visa en lista av bokm�rken p� din Website Baker webbplats. Som du kan l�sa nedan s� �r denna modul flexibel och det som visas kan underh�llas via dessa inst�llningar.</p>

<p>Hj�lpen �r indelad i 3 sektioner: <a href="#main_settings"><?php echo $BMTEXT['MNSETTINGS']; ?></a>, <a href="#layout_settings"><?php echo $BMTEXT['LTSETTINGS']; ?></a> och <a href="#changelog">Changelog</a>. Information om detta beskrivs nedan.</p>
<a name="main_settings"></a><h4><?php echo $BMTEXT['MNSETTINGS']; ?></h4>
<p>Denna sektion inneh�ller obligatoriska f�lt som beh�vs f�r att denna modul ska fungera korrekt.</p>
<ul>
	<li><code><?php echo $BMTEXT['PIC_LOC']; ?></code> - Detta �r s�kv�gen till d�r bilderna (<i>som anv�nds till dins bokm�rken</i>) finns sparade.</li>
	<li><code><?php echo $BMTEXT['COLUMS']; ?></code> - Med detta val s� kan du specificera antalet kolumner som ska visas. Funktionen fungerar enligt f�ljande. N�r du s�tter v�rdet till exempelvis 4 kommer f�ltet '<?php echo $BMTEXT['BMLOOP']; ?>' att repiteras 4 g�nger innan '<?php echo $BMTEXT['BMFOOTER']; ?>' och '<?php echo $BMTEXT['BMHEADER']; ?>' kommer att laddas in igen p� sidan.</li>
	<li><code><?php echo $BMTEXT['SORT_GRP_BY']; ?></code> - H�r kan du specificera om grupper ska sorteras efter namn eller ordning i databasen.</li>
	<li><code><?php echo $BMTEXT['SORT_NOGRP_BY']; ?></code> - H�r kan du specificera om ogrupperade ska sorteras efter namn eller ordning i databasen.</li>
</ul>

<a name="layout_settings"></a><h4><?php echo $BMTEXT['LTSETTINGS']; ?></h4>
<p>Med valen nedan kan du modifiera utseendet p� de olika sektioner som finns i Bokm�rke modulen.</p>
<ul>
	<li><code><?php echo $TEXT['HEADER']; ?></code> - Detta f�lt kommer att laddas in p� Bokm�rke sidan f�rst. Du kan anv�nda den f�r att inkludera introduktions text eller f�r s� kallade stilmallar element.</li>
	<li><code><?php echo $TEXT['FOOTER']; ?></code> - Detta f�lt kommer att laddas in p� Bokm�rke sidan sist. Du kan anv�nda den f�r exempelvis slut text.</li>
	<li><code><?php echo $BMTEXT['GPHEADER']; ?></code> - Detta f�lt laddas in f�rst f�r varje grupp som p�b�rjas.</li>
	<li><code><?php echo $BMTEXT['GPLOOP']; ?></code> - Detta visas f�r varje grupp huvud. Inom detta f�lt s� kan du anv�nda f�ljande tillval:
		<ul>
			<li><code>[NROFCOLUMNS]</code> - Detta returnerar antalet kolumner (<i>som specificerades i huvud inst�llnings sektionen</i>). Du kan anv�nda den f�r exempelvis hur kolumnspannet i en tabell cell ska se ut.</li>
			<li><code>[GROUPTITLE]</code> - Detta f�lt returnerar aktuell grupp titel eller namn.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['GPFOOTER']; ?></code> - Detta f�lt kommer att laddas f�r varje grupp i slutet.</li>
	<li><code><?php echo $BMTEXT['BMHEADER']; ?></code> - Detta �r Bokm�rke huvudet. Den kommer att laddas in n�r en Bokm�rke visning startar eller n�r till�tet antalet kolumner har n�ts.</li>
	<li><code><?php echo $BMTEXT['BMLOOP']; ?></code> - Detta �r huvud delen. Med detta f�lt kan du modifiera utseendet p� Bokm�rke visningen. I detta f�lt har du f�ljande tillval:
		<ul>
			<li><code>[BMURL]</code> - URL f�r Bokm�rke</li>
			<li><code>[BMTARGET]</code> - Detta f�lt anger m�l f�r l�nken. Valen �r: <code> target="_self" </code> eller <code> target="_blank" </code></li>
			<li><code>[BMTITLE]</code> - Detta f�lt anger titel eller beskrivning f�r l�nken. Du kan anv�nda denna f�r exempelvis titel attribut f�r ett ankar element.</li>
			<li><code>[BMVALUE]</code> - Detta f�lt anger antingen text/namn f�r l�nken eller anger det img element n�r valet har specificerats att vara l�nk till en bild l�nk.</li>
			<li><code>[BMDESCRIPTION]</code> - Detta f�lt anger informationen som har skrivits in i '<?php echo $BMTEXT['ABOUTBM']; ?>' f�ltet.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['BMFOOTER']; ?></code> - Detta �r Bokm�rke foten. Detta kommer att visas n�r Bokm�rke visning slutar eller n�r till�tet antalet kolumner har n�tts.</li>
</ul>