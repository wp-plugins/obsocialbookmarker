<?php 
/*
Plugin Name: obsocialbookmarker
Author: Rajender Singh
Version: 5.4.0
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
		,'obsocialbookmarkerstumble' => 'http://www.stumbleupon.com/submit?url='.$link.'&title='.$title.''
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
		,'obsocialbookmarkerdotnetkicks' => 'http://www.dotnetkicks.com/kick/?url='.$link.'&title='.$title
		,'obsocialbookmarkerblogmemes' => 'http://www.blogmemes.net/post.php?url='.$link.'&title='. $title
		,'obsocialbookmarkerbluedot' => 'http://bluedot.us/Authoring.aspx?u='.$link.'&t='.$title
		,'obsocialbookmarkerdzone' => 'http://www.dzone.com/links/add.html?description='.$title.'&url='.$link.'&title='.$title
		,'obsocialbookmarkerfriendsite' => 'http://friendsite.com/users/bookmark/?u='.$link.'&t='.$title
		,'obsocialbookmarkerrojo' => 'http://www.rojo.com/add-subscription/?resource='.$link
		,'obsocialbookmarkerrec6' => 'http://www.syxt.com.br/rec6/link.php?url='.$link
		,'obsocialbookmarkerbumpzee' => 'http://www.bumpzee.com/bump.php?u='.$link
		,'obsocialbookmarkerindianpad' => 'http://www.indianpad.com/submit.php?url='.$link
		,'obsocialbookmarkerlinkkbr' => 'http://www.linkk.com.br/submit.php?url='.$link.'&titulo='.$title
		,'obsocialbookmarkerdomelhor' => 'http://domelhor.net/login.php?return=/submit.php?url='.$link.'&titulo='.$title
		,'obsocialbookmarkereucurtibr' => 'http://www.eucurti.com.br/submit.php?url='.$link.'&titulo='.$title
		,'obsocialbookmarkerkudosno' => 'http://www.kudos.no/giKudos.php?tittel='.$title.'&url=='.$link
		,'obsocialbookmarkerkaboodle' => 'http://www.kaboodle.com/za/selectpage?p_pop=false&pa=url&u='.$link
		,'obsocialbookmarkerplugim' => 'http://www.plugim.com/submit?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerpopcurrent' => 'http://popcurrent.com/submit?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkersk-rt' => 'http://www.sk-rt.com/submit.php?url='.$link
		,'obsocialbookmarkershoutwire' => 'http://www.shoutwire.com/?p=submit&amp;link='.$link
		,'obsocialbookmarkergabbr' => 'http://www.gabbr.com/submit.php?url='.$link
		,'obsocialbookmarkeri89' => 'http://www.i89.us/bookmark.php?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerlinkatopia' => 'http://linkatopia.com/add?uri='.$link.';title='.$title
		,'obsocialbookmarkertipd' => 'http://tipd.com/submit.php?url='.$link
		,'obsocialbookmarkerfavoriten' => 'http://www.favoriten.de/url-hinzufuegen.html?bm_url='.$link.'&amp;bm_title='.$title
		,'obsocialbookmarkernewskick' => 'http://www.newskick.de/submit.php?url='.$link
		,'obsocialbookmarkerweblinkren' => 'http://weblinkr.com/add/?popup=1&address='.$link.'&amp;title='.$title
		,'obsocialbookmarkerweblinkrch' => 'http://weblinkr.com/add/?popup=1&address='.$link.'&amp;title='.$title
		,'obsocialbookmarkerweblinkrde' => 'http://weblinkr.com/add/?popup=1&address='.$link.'&amp;title='.$title
		,'obsocialbookmarkerweblinkres' => 'http://weblinkr.com/add/?popup=1&address='.$link.'&amp;title='.$title
		,'obsocialbookmarkertwitthis' => 'http://twitthis.com/twit?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerlinkedin' => 'http://www.linkedin.com/shareArticle?mini=true&url='.$link.'&amp;title='.$title.'&amp;ro=false'
		,'obsocialbookmarkerbibsonomy' => 'http://www.bibsonomy.org/editBookmark?url='.$link.'&amp;description='.$title
		,'obsocialbookmarkerbonitrust' => 'http://www.bonitrust.de/account/bookmark/?bookmark_url='.$link
		,'obsocialbookmarkerciteulike' => 'http://www.citeulike.org/posturl?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkernewsider' => 'http://www.newsider.de/submit.php?url='.$link
		,'obsocialbookmarkerkledyde' => 'http://www.kledy.de/submit.php?url='.$link
		,'obsocialbookmarkerseoigg' => 'http://www.seoigg.de/node/add/storylink?edit[url]='.$link.'&amp;edit[title]='.$title
		,'obsocialbookmarkerreadsterde' => 'http://www.readster.de/submit/?url='.$link.'&amp;title='.$title
		,'obsocialbookmarkerfavoritende' => 'http://www.favoriten.de/url-hinzufuegen.html?bm_url='.$link.'&amp;bm_title='.$title
		
);

	$clicked = get_option($site.'_stat');
	if (empty($clicked)){
		$clicked = 0;
	}
	$clicked = $clicked + 1; 
	update_option($site.'_stat',$clicked);
	header('Location: '.$social_sites[$site]);
?> 