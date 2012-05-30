<?php

/*
Plugin Name: obsocialbookmarker
Version: 5.4.0
Author: Rajender Singh
Author URI: http://www.oraclebrains.com/

Copyright 2012  Rajender Singh  (email : rajs@oraclebrains.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

function obsocialbookmarker_bookmark_list($country) {
	$imgurl = '"'.get_option('siteurl').'/wp-content/plugins/obsocialbookmarker/images/';
	$bookmark_list = array();

	if ($country == 'international' || $country == 'ALL' ){

		$bookmark_list['obsocialbookmarkerask'] = array(
			'title' => 'Ask'
			, 'img' => $imgurl.'ask.png" width="16" height="16" alt="Ask"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerask')
		);


		$bookmark_list['obsocialbookmarkeradditious'] = array(
				'title' => 'Additious'
				, 'img' => $imgurl.'additious.gif" width="16" height="16" alt="Additious"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkeradditious')
		);	

		$bookmark_list['obsocialbookmarkerbackflip'] = array(
				'title' => 'Backflip'
				, 'img' => $imgurl.'backflip.png" width="16" height="16" alt="Backflip"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerbackflip')
		);

		$bookmark_list['obsocialbookmarkerbloglines'] = array(
			'title' => 'Bloglines'
			, 'img' => $imgurl.'bloglines.jpg" width="16" height="16" alt="Bloglines"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerbloglines')
		);

		$bookmark_list['obsocialbookmarkerblinklist'] = array(
			'title' => 'BlinkList'
			, 'img' => $imgurl.'blinklist.png" width="16" height="16" alt="BlinkList"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerblinklist')
		);

		$bookmark_list['obsocialbookmarkerblinkbits'] = array(
				'title' => 'Blinkbits'
				, 'img' => $imgurl.'blinkbits.gif" width="16" height="16" alt="Blinkbits"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerblinkbits')
		);

		$bookmark_list['obsocialbookmarkerblogmarks'] = array(
				'title' => 'Blogmarks'
				, 'img' => $imgurl.'blogmarks.gif" width="16" height="16" alt="Blogmarks"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerblogmarks')
		);

		
		$bookmark_list['obsocialbookmarkercomments'] = array(
			'title' => 'co.mments'
			, 'img' => '"http://co.mments.com/favicon.ico" width="16" height="16" alt="co.mments"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkercomments')
		);

		$bookmark_list['obsocialbookmarkerconnotea'] = array(
				'title' => 'Connotea'
				, 'img' => $imgurl.'connotea.gif" width="16" height="16" alt="Connotea"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerconnotea')
		);
		
		
		$bookmark_list['obsocialbookmarkerdropjack'] = array(
				'title' => 'Dropjack'
				, 'img' => $imgurl.'dropjack.gif" width="16" height="16" alt="Dropjack"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerdropjack')
		);

		$bookmark_list['obsocialbookmarkerdiigo'] = array(
				'title' => 'Diigo'
				, 'img' => '"http://www.diigo.com/images/ii_blue.gif" width="16" height="16" alt="Diigo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerdiigo')
		);

		$bookmark_list['obsocialbookmarkerdigg'] = array(
			'title' => 'Digg'
			, 'img' => $imgurl.'digg.png" width="16" height="16" alt="Digg"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdigg')
		);

		$bookmark_list['obsocialbookmarkerfacebook'] = array(
			'title' => 'Facebook'
			, 'img' => $imgurl.'facebook.gif" width="16" height="16" alt="Facebook"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfacebook')
		);

		$bookmark_list['obsocialbookmarkerfark'] = array(
				'title' => 'Fark'
				, 'img' => $imgurl.'fark.png" width="16" height="16" alt="Fark"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfark')
		);

		$bookmark_list['obsocialbookmarkerfurl'] = array(
			'title' => 'Furl'
			, 'img' => $imgurl.'furl.gif" width="16" height="16" alt="Furl"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfurl')
		);

		$bookmark_list['obsocialbookmarkerfeedmelinks'] = array(
			'title' => 'Feed Me Links'
			, 'img' => $imgurl.'feedmelinks.png" width="16" height="16" alt="Feed Me Links"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfeedmelinks')
		);

		$bookmark_list['obsocialbookmarkerfleck'] = array(
				'title' => 'Fleck'
				, 'img' => $imgurl.'fleck.gif" width="16" height="16" alt="Fleck"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfleck')
		);			

		$bookmark_list['obsocialbookmarkergoogle'] = array(
			'title' => 'Google'
			, 'img' => $imgurl.'goog.png" width="16" height="16" alt="Google"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkergoogle')
		);

		$bookmark_list['obsocialbookmarkergabbr'] = array(
			'title' => 'Gabbr'
			, 'img' => $imgurl.'gabbr.gif" width="16" height="16" alt="Gabbr"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkergabbr')
		);

		$bookmark_list['obsocialbookmarkerhugg'] = array(
				'title' => 'Hugg'
				, 'img' => $imgurl.'hugg.gif" width="16" height="16" alt="Hugg"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerhugg')
		);						

		
		$bookmark_list['obsocialbookmarkerjeqq'] = array(
				'title' => 'Jeqq'
				, 'img' => $imgurl.'jeqq.gif" width="16" height="16" alt="Jeqq"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerjeqq')
		);					


		$bookmark_list['obsocialbookmarkerkaboodle'] = array(
				'title' => 'Kaboodle'
				, 'img' => $imgurl.'kaboodle.png" width="16" height="16" alt="Kaboodle"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerkaboodle')
		);					

		$bookmark_list['obsocialbookmarkerlinkagogo'] = array(
				'title' => 'LinkaGoGo'
				, 'img' => $imgurl.'linkagogo.png" width="16" height="16" alt="LinkaGoGo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerlinkagogo')
		);

		$bookmark_list['obsocialbookmarkerlinkatopia'] = array(
				'title' => 'Linkatopia'
				, 'img' => $imgurl.'linkatopia.gif" width="16" height="16" alt="Linkatopia"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerlinkatopia')
		);

		$bookmark_list['obsocialbookmarkermisterwong'] = array(
			'title' => 'Mister Wong'
			, 'img' => $imgurl.'misterwong.gif" width="16" height="16" alt="Mister Wong"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwong')
		);

		$bookmark_list['obsocialbookmarkermixx'] = array(
				'title' => 'Mixx'
				, 'img' => $imgurl.'mixx.png" width="16" height="16" alt="Mixx"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkermixx')
		);						

		
		$bookmark_list['obsocialbookmarkernetvouz'] = array(
				'title' => 'Netvouz'
				, 'img' => '"http://www.netvouz.com/web/images/netvouz16.gif" width="16" height="16" alt="Netvouz"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkernetvouz')
		);

		$bookmark_list['obsocialbookmarkernewsvine'] = array(
			'title' => 'Newsvine'
			, 'img' => $imgurl.'newsvine.png" width="16" height="16" alt="Newsvine"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkernewsvine')
		);

		$bookmark_list['obsocialbookmarkernetscape'] = array(
			'title' => 'Netscape'
			, 'img' => '"http://www.netscape.com/favicon.ico" width="16" height="16" alt="Netscape"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkernetscape')
		);
	
		$bookmark_list['obsocialbookmarkerplugim'] = array(
			'title' => 'PlugIM'
			, 'img' => $imgurl.'plugim.png"  width="16" height="16" alt="PlugIM"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerplugim')
		);
		
		$bookmark_list['obsocialbookmarkerplugim'] = array(
			'title' => 'PlugIM'
			, 'img' => $imgurl.'plugim.png"  width="16" height="16" alt="PlugIM"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerplugim')
		);

		$bookmark_list['obsocialbookmarkerpopcurrent'] = array(
				'title' => 'PopCurrent'
				, 'img' => $imgurl.'popcurrent.png" width="16" height="16" alt="PopCurrent"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerpopcurrent')
		);

		$bookmark_list['obsocialbookmarkerreddit'] = array(
			'title' => 'Reddit'
			, 'img' => $imgurl.'reddit.gif" width="16" height="16" alt="Reddit"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerreddit')
		);

		
		$bookmark_list['obsocialbookmarkerspurl'] = array(
				'title' => 'Spurl'
				, 'img' => $imgurl.'spurl.png" width="16" height="16" alt="Spurl"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerspurl')
		);

		$bookmark_list['obsocialbookmarkersegnalo'] = array(
				'title' => 'Segnalo'
				, 'img' => $imgurl.'segnalo.gif" width="16" height="16" alt="Segnalo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersegnalo')
		);

		$bookmark_list['obsocialbookmarkersphere'] = array(
				'title' => 'Sphere'
				, 'img' => $imgurl.'sphere.png" width="16" height="16" alt="Sphere"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersphere')
		);	
		
		$bookmark_list['obsocialbookmarkertipd'] = array(
				'title' => 'Tipd'
				, 'img' => $imgurl.'tipd.png" width="16" height="16" alt="Tipd"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkertipd')
		);	

		$bookmark_list['obsocialbookmarkerstumble'] = array(
			'title' => 'Stumble it'
			, 'img' => $imgurl.'su.png" width="16" height="16" alt="StumbleUpon"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerstumble')
		);

		$bookmark_list['obsocialbookmarkerslashdot'] = array(
			'title' => 'Slashdot It'
			, 'img' => $imgurl.'slashdot.png" width="16" height="16" alt="Slashdot"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerslashdot')
		);

		$bookmark_list['obsocialbookmarkersimpy'] = array(
				'title' => 'Simpy'
				, 'img' => $imgurl.'simpy.png" width="16" height="16" alt="Simpy"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersimpy')
		);

		$bookmark_list['obsocialbookmarkersquidoo'] = array(
				'title' => 'Squidoo'
				, 'img' => '"http://www.squidoo.com/favicon.ico" width="16" height="16" alt="Squidoo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersquidoo')
		);

		$bookmark_list['obsocialbookmarkersmarking'] = array(
				'title' => 'Smarking'
				, 'img' => $imgurl.'smarking.gif" width="16" height="16" alt="Smarking"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersmarking')
		);

		$bookmark_list['obsocialbookmarkersk-rt'] = array(
				'title' => 'Sk*rt'
				, 'img' => $imgurl.'sk-rt.png" width="16" height="16" alt="Sk*rt"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersk-rt')
		);
		
		$bookmark_list['obsocialbookmarkershoutwire'] = array(
				'title' => 'Shoutwire'
				, 'img' => $imgurl.'shoutwire.png" width="16" height="16" alt="Shoutwire"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkershoutwire')
		);

		$bookmark_list['obsocialbookmarkertechnorati'] = array(
			'title' => 'Technorati'
			, 'img' => $imgurl.'technorati.png" width="16" height="16" alt="Technorati"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkertechnorati')
		);

		$bookmark_list['obsocialbookmarkertailrank'] = array(
			'title' => 'Tailrank'
			, 'img' => $imgurl.'tailrank.png" width="16" height="16" alt="Tailrank"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkertailrank')
		);

		$bookmark_list['obsocialbookmarkerthisnext'] = array(
				'title' => 'ThisNext'
				, 'img' => $imgurl.'thisnext.png" width="16" height="16" alt="ThisNext"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerthisnext')
		);		

		$bookmark_list['obsocialbookmarkertaggly'] = array(
				'title' => 'Taggly'
				, 'img' => $imgurl.'taggly.png" width="16" height="16" alt="Taggly"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkertaggly')
		);

		
		$bookmark_list['obsocialbookmarkerwebride'] = array(
				'title' => 'Webride'
				, 'img' => $imgurl.'webride.png" width="16" height="16" alt="Webride"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwebride')
		);		

		$bookmark_list['obsocialbookmarkerwink'] = array(
				'title' => 'Wink'
				, 'img' => $imgurl.'wink.png" width="16" height="16" alt="Wink"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwink')
		);


		$bookmark_list['obsocialbookmarkerwists'] = array(
				'title' => 'Wists'
				, 'img' => $imgurl.'wists.gif" width="16" height="16" alt="Wists"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwists')
		);

		$bookmark_list['obsocialbookmarkerwirefan'] = array(
				'title' => 'Wirefan'
				, 'img' => $imgurl.'wirefan.gif" width="16" height="16" alt="Wirefan"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwirefan')
		);	

		$bookmark_list['obsocialbookmarkerwindowslive'] = array(
			'title' => 'Windows Live'
			, 'img' => $imgurl.'live.gif" width="16" height="16" alt="Windows Live"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerwindowslive')
		);


		
		$bookmark_list['obsocialbookmarkeryahoo'] = array(
			'title' => 'Yahoo'
			, 'img' => $imgurl.'yahoo-myweb.png" width="16" height="16" alt="Yahoo"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkeryahoo')
		);



		$bookmark_list['obsocialbookmarkerblogmemes'] = array(
				'title' => 'Blogmemes'
				, 'img' => $imgurl.'blogmemes.gif" width="16" height="16" alt="Blogmemes"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerblogmemes')
		);						

		$bookmark_list['obsocialbookmarkerdotnetkicks'] = array(
				'title' => 'DotNetKicks'
				, 'img' => $imgurl.'dotnetkicks.gif" width="16" height="16" alt="DotNetKicks"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerdotnetkicks')
		);						


		$bookmark_list['obsocialbookmarkerdzone'] = array(
				'title' => 'DZone'
				, 'img' => $imgurl.'dzone.gif" width="16" height="16" alt="DZone"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerdzone')
		);						

		$bookmark_list['obsocialbookmarkerfriendsite'] = array(
				'title' => 'FriendSite'
				, 'img' => $imgurl.'friendsite.gif" width="16" height="16" alt="FriendSite"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfriendsite')
		);						

		$bookmark_list['obsocialbookmarkerrojo'] = array(
				'title' => 'Rojo'
				, 'img' => $imgurl.'rojo.gif" width="16" height="16" alt="Rojo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerrojo')
		);	
		
		$bookmark_list['obsocialbookmarkerbumpzee'] = array(
				'title' => 'BUMPzee'
				, 'img' => $imgurl.'bumpzee.png" width="16" height="16" alt="BUMPzee"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerbumpzee')
		);	
		$bookmark_list['obsocialbookmarkerindianpad'] = array(
				'title' => 'IndianPad'
				, 'img' => $imgurl.'indianpad.png" width="16" height="16" alt="IndianPad"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerindianpad')
		);	
		$bookmark_list['obsocialbookmarkerweblinkren'] = array(
				'title' => 'Weblinkr'
				, 'img' => $imgurl.'weblinkr.png" width="16" height="16" alt="Weblinkr"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerweblinkren')
		);	
		$bookmark_list['obsocialbookmarkertwitthis'] = array(
				'title' => 'Twitter'
				, 'img' => $imgurl.'twitter.png" width="16" height="16" alt="Twitter"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkertwitthis')
		);
		$bookmark_list['obsocialbookmarkerlinkedin'] = array(
				'title' => 'Linked in'
				, 'img' => $imgurl.'linkedin.png" width="16" height="16" alt="Linked in"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerlinkedin')
		);		
		$bookmark_list['obsocialbookmarkerbibsonomy'] = array(
				'title' => 'Bibsonomy'
				, 'img' => $imgurl.'bibsonomy.png" width="16" height="16" alt="Bibsonomy"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerbibsonomy')
		);	
		$bookmark_list['obsocialbookmarkerciteulike'] = array(
				'title' => 'CiteULike'
				, 'img' => $imgurl.'citeulike.png" width="16" height="16" alt="CiteULike"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerciteulike')
		);			
		
		
	}
	
	if ($country == 'us' || $country == 'ALL' ){
			$bookmark_list['obsocialbookmarkerdelicious'] = array(
			'title' => 'del.icio.us'
			, 'img' => $imgurl.'delicious.png" width="16" height="16" alt="del.icio.us"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdelicious')
			);

			$bookmark_list['obsocialbookmarkerbluedot'] = array(
				'title' => 'Blue Dot'
				, 'img' => $imgurl.'bluedot.gif" width="16" height="16" alt="Blue Dot"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerbluedot')
			);	
			
			$bookmark_list['obsocialbookmarkeri89'] = array(
				'title' => 'i89'
				, 'img' => $imgurl.'i89.gif" width="16" height="16" alt="i89"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkeri89')
			);	
	}

	if ($country == 'ch' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkermisterwongcn'] = array(
			'title' => 'Mister Wong China'
			, 'img' => $imgurl.'misterwong.gif" width="16" height="16" alt="Mister Wong China"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongcn')
		);
		$bookmark_list['obsocialbookmarkerweblinkrch'] = array(
				'title' => 'Weblinkr'
				, 'img' => $imgurl.'weblinkr.png" width="16" height="16" alt="Weblinkr"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerweblinkrch')
		);	

	}

	if ($country == 'de' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkerlinkarena'] = array(
				'title' => 'Linkarena'
				, 'img' => $imgurl.'linkarena.gif" width="16" height="16" alt="Linkarena"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerlinkarena')
		);	

		$bookmark_list['obsocialbookmarkertagglede'] = array(
				'title' => 'Taggle'
				, 'img' => $imgurl.'taggle.gif" width="16" height="16" alt="Taggle"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkertagglede')
		);											

		$bookmark_list['obsocialbookmarkermisterwongde'] = array(
			'title' => 'Mister Wong Germany'
			, 'img' => $imgurl.'misterwong.gif" width="16" height="16" alt="Mister Wong Germany"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongde')
		);

		$bookmark_list['obsocialbookmarkeryigg'] = array(
				'title' => 'Yigg'
				, 'img' => $imgurl.'yigg.gif" width="16" height="16" alt="Yigg"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkeryigg')
		);
		
		$bookmark_list['obsocialbookmarkerfavoriten'] = array(
				'title' => 'Favoriten.de'
				, 'img' => $imgurl.'favoriten.gif" width="16" height="16" alt="Favoriten.de"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfavoriten')
		);	

		$bookmark_list['obsocialbookmarkernewskick'] = array(
				'title' => 'newskick'
				, 'img' => $imgurl.'newskick.ico" width="16" height="16" alt="newskick"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkernewskick')
		);
		
		$bookmark_list['obsocialbookmarkerweblinkrde'] = array(
				'title' => 'Weblinkr'
				, 'img' => $imgurl.'weblinkr.png" width="16" height="16" alt="Weblinkr"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerweblinkrde')
		);		
		$bookmark_list['obsocialbookmarkerbonitrust'] = array(
				'title' => 'BoniTrust'
				, 'img' => $imgurl.'bonitrust.gif" width="16" height="16" alt="BoniTrust"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerbonitrust')
		);			
		$bookmark_list['obsocialbookmarkernewsider'] = array(
				'title' => 'Newsider'
				, 'img' => $imgurl.'newsider.png" width="16" height="16" alt="Newsider"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkernewsider')
		);
		$bookmark_list['obsocialbookmarkerkledyde'] = array(
				'title' => 'Kledy.de'
				, 'img' => $imgurl.'kledy.png" width="16" height="16" alt="Kledy.de"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerkledyde')
		);		
		$bookmark_list['obsocialbookmarkerseoigg'] = array(
				'title' => 'Seoigg'
				, 'img' => $imgurl.'seoigg.png" width="16" height="16" alt="Seoigg"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerseoigg')
		);		
		$bookmark_list['obsocialbookmarkerreadsterde'] = array(
				'title' => 'Readster'
				, 'img' => $imgurl.'readsterde.gif" width="16" height="16" alt="Readster"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerreadsterde')
		);	
		$bookmark_list['obsocialbookmarkerfavoritende'] = array(
				'title' => 'Favoriten'
				, 'img' => $imgurl.'favoritende.gif" width="16" height="16" alt="Favoriten"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfavoritende')
		);			
	}

	if ($country == 'fr' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkermisterwongfr'] = array(
			'title' => 'Mister Wong France'
			, 'img' => $imgurl.'misterwong.gif" width="16" height="16" alt="Mister Wong France"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongfr')
		);

	}

	if ($country == 'ru' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkermisterwongru'] = array(
			'title' => 'Mister Wong Russia'
			, 'img' => $imgurl.'misterwong.gif" width="16" height="16" alt="Mister Wong Russia"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongru')
		);

	}
	
	if ($country == 'es' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkermisterwonges'] = array(
			'title' => 'Mister Wong Spain'
			, 'img' => $imgurl.'misterwong.gif" width="16" height="16" alt="Mister Wong Spain"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwonges')
		);
		$bookmark_list['obsocialbookmarkerweblinkres'] = array(
				'title' => 'Weblinkr'
				, 'img' => $imgurl.'weblinkr.png" width="16" height="16" alt="Weblinkr"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerweblinkres')
		);
	}

	if ($country == 'pl' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkerwykop'] = array(
				'title' => 'Wykop'
				, 'img' => $imgurl.'wykop.png" width="16" height="16" alt="Wykop"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwykop')
		);		

	}

	if ($country == 'it' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkerbookmark'] = array(
			'title' => 'Bookmark.it'
			, 'img' => $imgurl.'bookmarkit.gif" width="16" height="16" alt="Bookmark.it"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerbookmark')
		);

		$bookmark_list['obsocialbookmarkerdiggita'] = array(
			'title' => 'Diggita'
			, 'img' => $imgurl.'diggitait.gif" width="16" height="16" alt="Diggita"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdiggita')
		);
	}

			
	if ($country == 'br' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkerrec6'] = array(
			'title' => 'Rec6'
			, 'img' => $imgurl.'rec6.gif" width="16" height="16" alt="Rec6"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerrec6')
		);
		
		$bookmark_list['obsocialbookmarkerlinkkbr'] = array(
			'title' => 'Linkk'
			, 'img' => $imgurl.'linkkbr.gif" width="16" height="16" alt="Linkk"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerlinkkbr')
		);

		$bookmark_list['obsocialbookmarkerdomelhor'] = array(
			'title' => 'Domelhor'
			, 'img' => $imgurl.'domelhor.gif" width="16" height="16" alt="Domelhor"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdomelhor')
		);

		$bookmark_list['obsocialbookmarkereucurtibr'] = array(
			'title' => 'Eucurti'
			, 'img' => $imgurl.'eucurtibr.gif" width="16" height="16" alt="Eucurti"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkereucurtibr')
		);

	}

	if ($country == 'no' || $country == 'ALL' ){
		$bookmark_list['obsocialbookmarkerkudosno'] = array(
			'title' => 'Kudos'
			, 'img' => $imgurl.'kudosno.gif" width="16" height="16" alt="Gi Kudos til denne saken"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerkudosno')
		);
	}

	return $bookmark_list;
}
?>