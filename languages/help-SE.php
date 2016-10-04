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
<h3>Hjälp för Bokmärke Modulen</h3>

<p>Denna fil innehåller hjälp om de olika valen i Bokmärke modulen. Bokmärke modulen ger dig möjlighet att visa en lista av bokmärken på din Website Baker webbplats. Som du kan läsa nedan så är denna modul flexibel och det som visas kan underhållas via dessa inställningar.</p>

<p>Hjälpen är indelad i 3 sektioner: <a href="#main_settings"><?php echo $BMTEXT['MNSETTINGS']; ?></a>, <a href="#layout_settings"><?php echo $BMTEXT['LTSETTINGS']; ?></a> och <a href="#changelog">Changelog</a>. Information om detta beskrivs nedan.</p>
<a name="main_settings"></a><h4><?php echo $BMTEXT['MNSETTINGS']; ?></h4>
<p>Denna sektion innehåller obligatoriska fält som behövs för att denna modul ska fungera korrekt.</p>
<ul>
	<li><code><?php echo $BMTEXT['PIC_LOC']; ?></code> - Detta är sökvägen till där bilderna (<i>som används till dins bokmärken</i>) finns sparade.</li>
	<li><code><?php echo $BMTEXT['COLUMS']; ?></code> - Med detta val så kan du specificera antalet kolumner som ska visas. Funktionen fungerar enligt följande. När du sätter värdet till exempelvis 4 kommer fältet '<?php echo $BMTEXT['BMLOOP']; ?>' att repiteras 4 gånger innan '<?php echo $BMTEXT['BMFOOTER']; ?>' och '<?php echo $BMTEXT['BMHEADER']; ?>' kommer att laddas in igen på sidan.</li>
	<li><code><?php echo $BMTEXT['SORT_GRP_BY']; ?></code> - Här kan du specificera om grupper ska sorteras efter namn eller ordning i databasen.</li>
	<li><code><?php echo $BMTEXT['SORT_NOGRP_BY']; ?></code> - Här kan du specificera om ogrupperade ska sorteras efter namn eller ordning i databasen.</li>
</ul>

<a name="layout_settings"></a><h4><?php echo $BMTEXT['LTSETTINGS']; ?></h4>
<p>Med valen nedan kan du modifiera utseendet på de olika sektioner som finns i Bokmärke modulen.</p>
<ul>
	<li><code><?php echo $TEXT['HEADER']; ?></code> - Detta fält kommer att laddas in på Bokmärke sidan först. Du kan använda den för att inkludera introduktions text eller för så kallade stilmallar element.</li>
	<li><code><?php echo $TEXT['FOOTER']; ?></code> - Detta fält kommer att laddas in på Bokmärke sidan sist. Du kan använda den för exempelvis slut text.</li>
	<li><code><?php echo $BMTEXT['GPHEADER']; ?></code> - Detta fält laddas in först för varje grupp som påbörjas.</li>
	<li><code><?php echo $BMTEXT['GPLOOP']; ?></code> - Detta visas för varje grupp huvud. Inom detta fält så kan du använda följande tillval:
		<ul>
			<li><code>[NROFCOLUMNS]</code> - Detta returnerar antalet kolumner (<i>som specificerades i huvud inställnings sektionen</i>). Du kan använda den för exempelvis hur kolumnspannet i en tabell cell ska se ut.</li>
			<li><code>[GROUPTITLE]</code> - Detta fält returnerar aktuell grupp titel eller namn.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['GPFOOTER']; ?></code> - Detta fält kommer att laddas för varje grupp i slutet.</li>
	<li><code><?php echo $BMTEXT['BMHEADER']; ?></code> - Detta är Bokmärke huvudet. Den kommer att laddas in när en Bokmärke visning startar eller när tillåtet antalet kolumner har nåts.</li>
	<li><code><?php echo $BMTEXT['BMLOOP']; ?></code> - Detta är huvud delen. Med detta fält kan du modifiera utseendet på Bokmärke visningen. I detta fält har du följande tillval:
		<ul>
			<li><code>[BMURL]</code> - URL för Bokmärke</li>
			<li><code>[BMTARGET]</code> - Detta fält anger mål för länken. Valen är: <code> target="_self" </code> eller <code> target="_blank" </code></li>
			<li><code>[BMTITLE]</code> - Detta fält anger titel eller beskrivning för länken. Du kan använda denna för exempelvis titel attribut för ett ankar element.</li>
			<li><code>[BMVALUE]</code> - Detta fält anger antingen text/namn för länken eller anger det img element när valet har specificerats att vara länk till en bild länk.</li>
			<li><code>[BMDESCRIPTION]</code> - Detta fält anger informationen som har skrivits in i '<?php echo $BMTEXT['ABOUTBM']; ?>' fältet.</li>
		</ul>
	</li>
	<li><code><?php echo $BMTEXT['BMFOOTER']; ?></code> - Detta är Bokmärke foten. Detta kommer att visas när Bokmärke visning slutar eller när tillåtet antalet kolumner har nåtts.</li>
</ul>