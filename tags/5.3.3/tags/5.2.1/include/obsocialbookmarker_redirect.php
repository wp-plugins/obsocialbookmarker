<?php 
/*
Plugin Name: obsocialbookmarker
Plugin URI: http://www.oraclebrains.com/wordpress/plugin/ob_social_button
Description: Add social book mark icons and links at the bottom of each post: bookmarks options includes del.icio.us, reddit, slashdot it, digg, facebook, technorati, google, stumble, windows live, tailrank, bloglines, furl, netscape, yahoo, blinklist, feed me links, co.mments, bloglines, bookmark.it, ask, diggita, mister wong, backflip, spurl, netvouz, diigo, dropjack, segnalo, stumbleupon, simpy, newsvine, slashdot it,wink, linkagogo, rawsugar, fark, squidoo, blogmarks, blinkbits, connotea, smarking, wists, wykop, webride, thisnext, wirefan, taggly, sphere, fleck, tagglede, linkarena, yigg, mixx, hugg.
Version: 5.2.1
Author: Rajender Singh
Author URI: http://www.oraclebrains.com/

Copyright 2007  Rajender Singh  (email : rajs@oraclebrains.com)
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
	$flag = chdir('..');
	$flag = chdir('..');
	$flag = chdir('..');
	$flag = chdir('..');

	if (empty($wp)) {
		require_once('wp-config.php');
	}
	
	$link = $_REQUEST['link'];
	$title = $_REQUEST['title'];
	
	
	$site = $_REQUEST['site'];


	$social_sites = array(
		'obsocialbookmarkerdelicious' => 'http://del.icio.us/post?url='.$link.'&title='.$title.''
		,'obsocialbookmarkerreddit' => 'http://reddit.com/submit?url='.$link.'&title='.$title.''
		,'obsocialbookmarkerslashdot' => 'http://slashdot.org/bookmark.pl?url='.$link.'&title='.$title.''
		,'obsocialbookmarkerdigg' => 'http://digg.com/submit?phase=2&url='.$link.'&title='.$title.''
		,'obsocialbookmarkerfacebook' => 'http://www.facebook.com/share.php?u='.$link.''
		,'obsocialbookmarkertechnorati' => 'http://technorati.com/faves?add='.$link.''
		,'obsocialbookmarkergoogle' => 'http://www.google.com/bookmarks/mark?op=edit&output=popup&bkmk='.$link.'&title='.$title.''
		,'obsocialbookmarkerstumbleupon' => 'http://www.stumbleupon.com/submit?url='.$link.'&title='.$title.''
		,'obsocialbookmarkerwindowslive' => 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$link.'&title='.$title.'&top=1'
		,'obsocialbookmarkertailrank' => 'http://tailrank.com/share/?link_href='.$link.'&title='.$title
		,'obsocialbookmarkerfurl' => 'http://furl.net/storeIt.jsp?u='.$link.'&t='.$title
		,'obsocialbookmarkernetscape' => ' http://www.netscape.com/submit/?U='.$link.'&T='.$title
		,'obsocialbookmarkeryahoo' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$link.'&t='.$title
		,'obsocialbookmarkerblinklist' => 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$link.'&Title='.$title
		,'obsocialbookmarkerfeedmelinks' => 'http://feedmelinks.com/categorize?from=toolbar&op=submit&name='.$title.'&url='.$link.'&version=0.7'
		,'obsocialbookmarkercomments' => 'http://co.mments.com/track?url='.$link.'&title='.$title
		,'obsocialbookmarkerbloglines' => 'http://www.bloglines.com/sub/'.$link
		,'obsocialbookmarkerbookmark' => 'http://www.bookmark.it/bookmark.php?url='.$link
		,'obsocialbookmarkerask' => 'http://mystuff.ask.com/mysearch/QuickWebSave?v=1.2&t=webpages&title='.$title.'%21&url='.$link
		,'obsocialbookmarkerdiggita' => 'http://www.diggita.it/submit.php?title='.$title.'%21&url='.$link
		,'obsocialbookmarkermisterwong' => 'http://www.mister-wong.com/index.php?action=addurl&bm_url='.$link."&bm_description=".$title 
		,'obsocialbookmarkermisterwongcn' => 'http://www.mister-wong.cn/index.php?action=addurl&bm_url='.$link."&bm_description=".$title 
		,'obsocialbookmarkermisterwongde' => 'http://www.mister-wong.de/index.php?action=addurl&bm_url='.$link."&bm_description=".$title 
		,'obsocialbookmarkermisterwongfr' => 'http://www.mister-wong.fr/index.php?action=addurl&bm_url='.$link."&bm_description=".$title 
		,'obsocialbookmarkermisterwongru' => 'http://www.mister-wong.ru/index.php?action=addurl&bm_url='.$link."&bm_description=".$title 
		,'obsocialbookmarkermisterwonges' => 'http://www.mister-wong.es/index.php?action=addurl&bm_url='.$link."&bm_description=".$title 
		,'obsocialbookmarkernewsvine' => 'http://www.newsvine.com/_tools/seed&save?u='.$link."&h=".$title 
		,'obsocialbookmarkersimpy' => 'http://www.simpy.com/simpy/LinkAdd.do?href='.$link."&title=".$title 
		,'obsocialbookmarkerbackflip' => 'http://www.backflip.com/add_page_pop.ihtml?url='.$link."&title=".$title 
		,'obsocialbookmarkerspurl' => 'http://www.spurl.net/spurl.php? url='.$link."&title=".$title 
		,'obsocialbookmarkernetvouz' => 'http://www.netvouz.com/action/submitBookmark?url='.$link."&title=".$title."&popup=no"
		,'obsocialbookmarkerdiigo' => 'http://www.diigo.com/post?url='.$link."&title=".$title
		,'obsocialbookmarkersegnalo' => 'http://segnalo.com/post.html.php?url='.$link."&title=".$title
		,'obsocialbookmarkerdropjack' => 'http://www.dropjack.com/submit.php?url='.$link
		,'obsocialbookmarkerwink' => 'http://wink.com/_/tag?url='.$link."&doctitle=".$title
		,'obsocialbookmarkerlinkagogo' => 'http://www.linkagogo.com/go/AddNoPopup?url='.$link."&title=".$title
		,'obsocialbookmarkerrawsugar' => 'http://www.rawsugar.com/tagger/?turl='.$link."&tttl=".$title."&editorInitialized=1"
		,'obsocialbookmarkersquidoo' => 'http://www.squidoo.com/lensmaster/bookmark?'.$link
		,'obsocialbookmarkerfark' => 'http://cgi.fark.com/cgi/fark/submit.pl?new_url='.$link."&new_comment=".$title."&linktype="
		,'obsocialbookmarkersmarking' => 'http://smarking.com/editbookmark/?url='.$link
		,'obsocialbookmarkerconnotea' => 'http://www.connotea.org/addpopup?continue=confirm&uri='.$link.'&title='.$title
		,'obsocialbookmarkerwists' => 'http://wists.com/r.php?c=&r='.$link.'&tot;e='.$title
		,'obsocialbookmarkerblinkbits' => ' http://www.blinkbits.com/bookmarklets/save.php?v=1&source_url='.$link
		,'obsocialbookmarkerblogmarks' => 'http://blogmarks.net/my/new.php?mini=1&simple=1&url='.$link.'&title='.$title
		,'obsocialbookmarkerjeqq' => 'http://www.jeqq.com/submit.php?url='.$link.'&title='.$title
		,'obsocialbookmarkerwykop' => 'http://www.wykop.pl/dodaj?url='.$link
		,'obsocialbookmarkerwebride' => 'http://webride.org/discuss/split.php?uri='.$link.'&title='.$title
		,'obsocialbookmarkerthisnext' => 'http://www.thisnext.com/pick/new/submit/sociable/?url='.$link.'&name='.$title
		,'obsocialbookmarkerwirefan' => 'http://www.wirefan.com/grpost.php?u='.$link.'&title='.$title
		,'obsocialbookmarkertaggly' => 'http://www.taggly.com/bookmarks/?action=add&address= '.$link.'&title='.$title
		,'obsocialbookmarkersphere' => 'http://www.sphere.com/search?q=sphereit:'.$link.'&title='.$title
		,'obsocialbookmarkerfleck' => 'http://extension.fleck.com/?v=b.0.804&url='.$link
		,'obsocialbookmarkeradditious' => 'http://www.additious.com/?url='.$link.'&title='.$title
		,'obsocialbookmarkertagglede' => 'http://taggle.de/addLinkDetails?mAddress='.$link.'&title='.$title.'&submitted=Weiter'
		,'obsocialbookmarkerlinkarena' => 'http://www.linkarena.com/linkadd.php?linkName='.$title.'&linkURL='.$link
		,'obsocialbookmarkeryigg' => 'http://yigg.de/neu?exturl='.$link
		,'obsocialbookmarkermixx' => 'http://www.mixx.com/submit?page_url='.$link
		,'obsocialbookmarkerhugg' => 'http://www.hugg.com/node/add/storylink?edit[title]='.$title.'&edit[url]='.$link
	);

	$clicked = get_option($site.'_stat');
	if (empty($clicked)){
		$clicked = 0;
	}
	$clicked = $clicked + 1; 
	update_option($site.'_stat',$clicked);
	header('Location: '.$social_sites[$site]);
?> 