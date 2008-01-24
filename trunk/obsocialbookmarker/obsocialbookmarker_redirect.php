<?php 
/*
Plugin Name: obsocialbookmarker
Plugin URI: http://www.oraclebrains.com/wordpress/plugin/ob_social_button
Description: Add social book mark icons and links at the bottom of each post: bookmarks options includes del.icio.us, reddit, slashdot it, digg, facebook, technorati, google, stumble, windows live, tailrank, bloglines, furl, netscape, yahoo, blinklist, feed me links, co.mments, bloglines, bookmark.it, ask, diggita, mister wong, backflip, spurl, netvouz, diigo, dropjack, segnalo, stumbleupon, simpy, newsvine, slashdot it,wink, linkagogo, rawsugar, fark, squidoo, blogmarks, blinkbits, connotea, smarking, wists, wykop, webride, thisnext, wirefan, taggly, sphere, fleck, tagglede, linkarena, yigg, mixx, hugg.
Version: 5.2.0
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

	if (empty($wp)) {
		require_once('wp-config.php');
	}
	
	$link = urlencode($_REQUEST['link']);
	$title = urlencode($_REQUEST['title']);
	$site = $_REQUEST['site'];


	$social_sites = array(
		'obsocialbookmarkerdelicious' => 'http://del.icio.us/post?url='.$link.'&amp;title='.$title.''
		,'obsocialbookmarkerreddit' => 'http://reddit.com/submit?url='.$link.'&amp;title='.$title.''
		,'obsocialbookmarkerslashdot' => 'http://slashdot.org/bookmark.pl?url='.$link.'&amp;title='.$title.''
		,'obsocialbookmarkerdigg' => 'http://digg.com/submit?phase=2&amp;url='.$link.'&amp;title='.$title.''
		,'obsocialbookmarkerfacebook' => 'http://www.facebook.com/share.php?u='.$link.''
		,'obsocialbookmarkertechnorati' => 'http://technorati.com/faves?add='.$link.''
		,'obsocialbookmarkergoogle' => 'http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk='.$link.'&amp;title='.$title.''
		,'obsocialbookmarkerstumbleupon' => 'http://www.stumbleupon.com/submit?url='.$link.'&amp;title='.$title.''
		,'obsocialbookmarkerwindowslive' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;mkt=en-us&amp;url='.$link.'&amp;title='.$title.'&amp;top=1'
		,'obsocialbookmarkertailrank' => 'http://tailrank.com/share/?link_href='.$link.'&amp;title='.$title
		,'obsocialbookmarkerfurl' => 'http://furl.net/storeIt.jsp?u='.$link.'&amp;t='.$title
		,'obsocialbookmarkernetscape' => ' http://www.netscape.com/submit/?U='.$link.'&amp;T='.$title
		,'obsocialbookmarkeryahoo' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$link.'&amp;t='.$title
		,'obsocialbookmarkerblinklist' => 'http://blinklist.com/index.php?Action=Blink/addblink.php&amp;Url='.$link.'&amp;Title='.$title
		,'obsocialbookmarkerfeedmelinks' => 'http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;name='.$title.'&amp;url='.$link.'&amp;version=0.7'
		,'obsocialbookmarkercomments' => 'http://co.mments.com/track?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerbloglines' => 'http://www.bloglines.com/sub/'.urldecode($link)
		,'obsocialbookmarkerbookmark' => 'http://www.bookmark.it/bookmark.php?url='.$link
		,'obsocialbookmarkerask' => 'http://mystuff.ask.com/mysearch/QuickWebSave?v=1.2&amp;t=webpages&amp;title='.$title.'%21&amp;url='.$link
		,'obsocialbookmarkerdiggita' => 'http://www.diggita.it/submit.php?title='.$title.'%21&amp;url='.$link
		,'obsocialbookmarkermisterwong' => 'http://www.mister-wong.com/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
		,'obsocialbookmarkermisterwongcn' => 'http://www.mister-wong.cn/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
		,'obsocialbookmarkermisterwongde' => 'http://www.mister-wong.de/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
		,'obsocialbookmarkermisterwongfr' => 'http://www.mister-wong.fr/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
		,'obsocialbookmarkermisterwongru' => 'http://www.mister-wong.ru/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
		,'obsocialbookmarkermisterwonges' => 'http://www.mister-wong.es/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
		,'obsocialbookmarkernewsvine' => 'http://www.newsvine.com/_tools/seed&amp;save?u='.$link."&amp;h=".$title 
		,'obsocialbookmarkersimpy' => 'http://www.simpy.com/simpy/LinkAdd.do?href='.$link."&amp;title=".$title 
		,'obsocialbookmarkerbackflip' => 'http://www.backflip.com/add_page_pop.ihtml?url='.$link."&amp;title=".$title 
		,'obsocialbookmarkerspurl' => 'http://www.spurl.net/spurl.php? url='.$link."&amp;title=".$title 
		,'obsocialbookmarkernetvouz' => 'http://www.netvouz.com/action/submitBookmark?url='.$link."&amp;title=".$title."&amp;popup=no"
		,'obsocialbookmarkerdiigo' => 'http://www.diigo.com/post?url='.$link."&amp;title=".$title
		,'obsocialbookmarkersegnalo' => 'http://segnalo.com/post.html.php?url='.$link."&amp;title=".$title
		,'obsocialbookmarkerdropjack' => 'http://www.dropjack.com/submit.php?url='.$link
		,'obsocialbookmarkerwink' => 'http://wink.com/_/tag?url='.$link."&amp;doctitle=".$title
		,'obsocialbookmarkerlinkagogo' => 'http://www.linkagogo.com/go/AddNoPopup?url='.$link."&amp;title=".$title
		,'obsocialbookmarkerrawsugar' => 'http://www.rawsugar.com/tagger/?turl='.$link."&amp;tttl=".$title."&amp;editorInitialized=1"
		,'obsocialbookmarkersquidoo' => 'http://www.squidoo.com/lensmaster/bookmark?'.$link
		,'obsocialbookmarkerfark' => 'http://cgi.fark.com/cgi/fark/submit.pl?new_url='.$link."&amp;new_comment=".$title."&amp;linktype="
		,'obsocialbookmarkersmarking' => 'http://smarking.com/editbookmark/?url='.$link
		,'obsocialbookmarkerconnotea' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri='.$link.'&amp;title='.$title
		,'obsocialbookmarkerwists' => 'http://wists.com/r.php?c=&amp;r='.$link.'&amp;tot;e='.$title
		,'obsocialbookmarkerblinkbits' => ' http://www.blinkbits.com/bookmarklets/save.php?v=1&amp;source_url='.$link
		,'obsocialbookmarkerblogmarks' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerjeqq' => 'http://www.jeqq.com/submit.php?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerwykop' => 'http://www.wykop.pl/dodaj?url='.$link
		,'obsocialbookmarkerwebride' => 'http://webride.org/discuss/split.php?uri='.$link.'&amp;title='.$title
		,'obsocialbookmarkerthisnext' => 'http://www.thisnext.com/pick/new/submit/sociable/?url='.$link.'&amp;name='.$title
		,'obsocialbookmarkerwirefan' => 'http://www.wirefan.com/grpost.php?u='.$link.'&amp;title='.$title
		,'obsocialbookmarkertaggly' => 'http://www.taggly.com/bookmarks/?action=add&amp;address= '.$link.'&amp;title='.$title
		,'obsocialbookmarkersphere' => 'http://www.sphere.com/search?q=sphereit:'.$link.'&amp;title='.$title
		,'obsocialbookmarkerfleck' => 'http://extension.fleck.com/?v=b.0.804&amp;url='.$link
		,'obsocialbookmarkeradditious' => 'http://www.additious.com/?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkertagglede' => 'http://taggle.de/addLinkDetails?mAddress='.$link.'&amp;title='.$title.'&amp;submitted=Weiter'
		,'obsocialbookmarkerlinkarena' => 'http://www.linkarena.com/linkadd.php?linkName='.$title.'&amp;linkURL='.$link
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