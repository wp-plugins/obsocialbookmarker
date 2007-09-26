<?php

/*
Plugin Name: obsocialbookmarker
Plugin URI: http://www.oraclebrains.com/wordpress/plugin/ob_social_button
Description: Add social book mark icons and links at the bottom of each post: bookmarks options includes del.icio.us, reddit, slashdot it, digg, facebook, technorati, google, stumble, windows live, tailrank, bloglines, furl, netscape, yahoo, blinklist, feed me links, co.mments, bloglines, bookmark.it, ask, diggita.
Version: 3.0
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


// action function for above hook
function obsocialbookmarker_add_pages() {
    // Add a new submenu under Options:
    add_options_page('obsocialbookmarker', 'obsocialbookmarker', 'manage_options', _FILE_, 'print_obsocialbookmarker_options_form');
}

function print_obsocialbookmarker_options_form() {
	$bookmark_list = array();
	$bookmark_list['obsocialbookmarkerdelicious'] = 'del.icio.us';
	$bookmark_list['obsocialbookmarkerreddit'] = 'Reddit';
	$bookmark_list['obsocialbookmarkerslashdot'] = 'Slashdot it!';
	$bookmark_list['obsocialbookmarkerdigg'] = 'Digg it!';
	$bookmark_list['obsocialbookmarkerfacebook'] = 'Facebook!';
	$bookmark_list['obsocialbookmarkertechnorati'] = 'Technorati!';
	$bookmark_list['obsocialbookmarkergoogle'] = 'Google!';
	$bookmark_list['obsocialbookmarkerstumble'] = 'Stumble!';
	$bookmark_list['obsocialbookmarkerwindowslive'] = 'Windows Live!';
	$bookmark_list['obsocialbookmarkertailrank'] = 'Tailrank!';
	$bookmark_list['obsocialbookmarkerfurl'] = 'Furl!';
	$bookmark_list['obsocialbookmarkernetscape'] = 'Netscape!';
	$bookmark_list['obsocialbookmarkeryahoo'] = 'Yahoo!';
	$bookmark_list['obsocialbookmarkerblinklist'] = 'BlinkList!';
	$bookmark_list['obsocialbookmarkerfeedmelinks'] = 'Feed Me Links!';
	$bookmark_list['obsocialbookmarkercomments'] = 'co.mments!';
	$bookmark_list['obsocialbookmarkerbloglines'] = 'Bloglines!';
	$bookmark_list['obsocialbookmarkerbookmark'] = 'Bookmark.it!';
	$bookmark_list['obsocialbookmarkerask'] = 'Ask!';
	$bookmark_list['obsocialbookmarkerdiggita'] = 'Diggita!!';

	$ok = false;	

	if ($_REQUEST['submit']){
		foreach ($bookmark_list as $key => $data) {
			if ($_REQUEST[$key]=="1"){
				update_option($key,"1");
				$ok = true;
			}else{
				update_option($key,"0");
				$ok = true;
			}
		}

		if ($ok){
			?><div id="message" class="updated fade">
				<p>Options Saved</p>
				</div> <?php


		}else{
			?><div id="message" class="error fade">
				<p>Faied to Save Options</p>
				</div> <?php
		}
	}

	
	?>
	<div class="wrap">
	<h2><?php _e('obsocialbookmarker Options') ?></h2>
	<form method="post">
	<p class="submit"><input type="submit" name="submit" value="Submit" /></p>
	<ul> <?php 
	if 	(!empty($bookmark_list)){
	foreach ($bookmark_list as $key => $data) {
		?>	
			<li> 
				<label for="<?php echo $key ?>"> 
				<input name="<?php echo $key ?>" type="checkbox" id="<?php echo $key ?>" value="1" <?php checked('1', get_option($key)); ?>/> 
				<?php echo $data ?>
				</label> 
			</li>

			<?php
		}
	}
	?>
	</ul> 
	<p class="submit"><input type="submit" name="submit" value="Submit" /></p>
	</form>
	</div>
	<?
	
}



function obsocialbookmarkerLinks()
{
	
	$link = urlencode(get_permalink());
	$title = urlencode(the_title('', '', false));

	$social_sites = array(
		'delicious' => array(
			'title' => 'Save to del.icio.us'
			, 'link' => 'http://del.icio.us/post?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://del.icio.us/favicon.ico" width="16" height="16" alt="del.icio.us"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdelicious')

		)
		,'reddit' => array(
			'title' => 'Save to Reddit'
			, 'link' => 'http://reddit.com/submit?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://reddit.com/favicon.ico" width="16" height="16" alt="Reddit"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerreddit')
		)
		,'slashdot' => array(
			'title' => 'Slashdot It!'
			, 'link' => 'http://slashdot.org/bookmark.pl?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://slashdot.org/favicon.ico" width="16" height="16" alt="Slashdot"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerslashdot')
		)
		,'digg' => array(
			'title' => 'Digg This Post!'
			, 'link' => 'http://digg.com/submit?phase=2&amp;url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://digg.com/favicon.ico" width="16" height="16" alt="Digg"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdigg')
		)
		,'facebook' => array(
			'title' => 'Share on Facebook!'
			, 'link' => 'http://www.facebook.com/share.php?u='.$link.'"'
			, 'img' => '"http://www.facebook.com/favicon.ico" width="16" height="16" alt="Facebook"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfacebook')
		)
		,'technorati' => array(
			'title' => 'Add to my Technorati Favorites!'
			, 'link' => 'http://technorati.com/faves?add='.$link.''
			, 'img' => '"http://technorati.com/favicon.ico" width="16" height="16" alt="Technorati"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkertechnorati')
		)
		,'google' => array(
			'title' => 'Add to my Google Bookmarks!'
			, 'link' => 'http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk='.$link.'&amp;title='.$title.''
			, 'img' => '"http://www.google.com/favicon.ico" width="16" height="16" alt="Google"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkergoogle')
		)
		,'stumbleupon' => array(
			'title' => 'Stumble it!'
			, 'link' => 'http://www.stumbleupon.com/submit?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://www.stumbleupon.com/favicon.ico" width="16" height="16" alt="StumbleUpon"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerstumble')
		)

		,'windows_live' => array(
			'title' => 'Add to Windows Live!'
			, 'link' => 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$link.'&title='.$title.'&top=1'
			, 'img' => '"http://favorites.live.com/favicon.ico" width="16" height="16" alt="Windows Live"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerwindowslive')
		)
		,'tailrank' => array(
			'title' => 'Add to Tailrank!'
			, 'link' => 'http://tailrank.com/share/?link_href='.$link.'&title='.$title
			, 'img' => '"http://www.oraclebrains.com/download/obsocialbookmarker/images/tailrank.png" width="16" height="16" alt="Tailrank"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkertailrank')
		)

		,'furl' => array(
			'title' => 'Add to Furl'
			, 'link' => 'http://furl.net/storeIt.jsp?u='.$link.'&t='.$title
			, 'img' => '"http://furl.net/i/lil_furl_butt.gif" width="16" height="16" alt="Furl"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfurl')
		)

		,'netscape' => array(
			'title' => 'Add to Netscape'
			, 'link' => ' http://www.netscape.com/submit/?U='.$link.'&T='.$title
			, 'img' => '"http://www.netscape.com/favicon.ico" width="16" height="16" alt="Netscape"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkernetscape')
		)
		,'yahoo' => array(
			'title' => 'Add to Yahoo!'
			, 'link' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$link.'&t='.$title
			, 'img' => '"http://myweb2.search.yahoo.com/favicon.ico" width="16" height="16" alt="Yahoo"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkeryahoo')
		)
		,'blinklist' => array(
			'title' => 'Add to BlinkList!'
			, 'link' => 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$link.'&Title='.$title
			, 'img' => '"http://blinklist.com/favicon.ico" width="16" height="16" alt="BlinkList"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerblinklist')
		)
		,'feedmelinks' => array(
			'title' => 'Add to Feed Me Links!'
			, 'link' => 'http://feedmelinks.com/categorize?from=toolbar&op=submit&name='.$title.'&url='.$link.'&version=0.7'
			, 'img' => '"http://feedmelinks.com/favicon.ico" width="16" height="16" alt="Feed Me Links"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfeedmelinks')
		)
		,'comments' => array(
			'title' => 'Add to co.mments!'
			, 'link' => 'http://co.mments.com/track?url='.$link.'&title='.$title
			, 'img' => '"http://co.mments.com/favicon.ico" width="16" height="16" alt="co.mments"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkercomments')
		)
		,'bloglines' => array(
			'title' => 'Add to Bloglines!'
			, 'link' => 'http://www.bloglines.com/sub/'.$link
			, 'img' => '"http://www.oraclebrains.com/download/obsocialbookmarker/images/bloglines.jpg" width="16" height="16" alt="Bloglines"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerbloglines')
		)
		,'bookmark' => array(
			'title' => 'Bookmark.it!'
			, 'link' => 'http://www.bookmark.it/bookmark.php?url='.$link
			, 'img' => '"http://www.bookmark.it/favicon.ico" width="16" height="16" alt="Bookmark.it"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerbookmark')
		)
		,'ask' => array(
			'title' => 'Ask!'
			, 'link' => 'http://mystuff.ask.com/mysearch/QuickWebSave?v=1.2&t=webpages&title='.$title.'%21&url='.$link
			, 'img' => '"http://www.ask.com/favicon.ico" width="16" height="16" alt="Ask"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerask')
		)
		,'diggita' => array(
			'title' => 'Diggita!'
			, 'link' => 'http://www.diggita.it/submit.php?title='.$title.'%21&url='.$link
			, 'img' => '"http://www.diggita.it/favicon.ico" width="16" height="16" alt="Diggita"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdiggita')
		)

	);

	

	$bookmarker = array();
	unset($bookmarker);
	foreach ($social_sites as $key => $data) {
		if ($data['visible'] == '1'){
			$bookmarker[$key] = '<a href="'.$data['link'].'" target="_blank"'.' title="'.$data['title'].'"'
								.' onclick="'.$data['js'].'"'.'> <img src='.$data['img'].'/></a>';
		}
	}

	return '<p><span>'
		. implode("\n", $bookmarker)
		. "</span></p>";
}

function set_obsocialbookmarker_options(){
	$bookmark_list = array();
	unset($bookmark_list);
	$bookmark_list['obsocialbookmarkerdelicious'] = 'del.icio.us';
	$bookmark_list['obsocialbookmarkerreddit'] = 'Reddit';
	$bookmark_list['obsocialbookmarkerslashdot'] = 'Slashdot it!';
	$bookmark_list['obsocialbookmarkerdigg'] = 'Digg it!';
	$bookmark_list['obsocialbookmarkerfacebook'] = 'Facebook!';
	$bookmark_list['obsocialbookmarkertechnorati'] = 'Technorati!';
	$bookmark_list['obsocialbookmarkergoogle'] = 'Google!';
	$bookmark_list['obsocialbookmarkerstumble'] = 'Stumble!';
	$bookmark_list['obsocialbookmarkerwindowslive'] = 'Windows Live!';
	$bookmark_list['obsocialbookmarkertailrank'] = 'Tailrank!';
	$bookmark_list['obsocialbookmarkerfurl'] = 'Furl!';
	$bookmark_list['obsocialbookmarkernetscape'] = 'Netscape!';
	$bookmark_list['obsocialbookmarkeryahoo'] = 'Yahoo!';
	$bookmark_list['obsocialbookmarkerblinklist'] = 'BlinkList!';
	$bookmark_list['obsocialbookmarkerfeedmelinks'] = 'Feed Me Links!';
	$bookmark_list['obsocialbookmarkercomments'] = 'co.mments!';
	$bookmark_list['obsocialbookmarkerbloglines'] = 'Bloglines!';
	$bookmark_list['obsocialbookmarkerbookmark'] = 'Bookmark.it!';
	$bookmark_list['obsocialbookmarkerask'] = 'Ask!';
	$bookmark_list['obsocialbookmarkerdiggita'] = 'Diggita!!';
	foreach ($bookmark_list as $key => $data) {
		add_option($key,'0',$key);
	}
}

function unset_obsocialbookmarker_options(){
	$bookmark_list = array();
	unset($bookmark_list);
	$bookmark_list['obsocialbookmarkerdelicious'] = 'del.icio.us';
	$bookmark_list['obsocialbookmarkerreddit'] = 'Reddit';
	$bookmark_list['obsocialbookmarkerslashdot'] = 'Slashdot it!';
	$bookmark_list['obsocialbookmarkerdigg'] = 'Digg it!';
	$bookmark_list['obsocialbookmarkerfacebook'] = 'Facebook!';
	$bookmark_list['obsocialbookmarkertechnorati'] = 'Technorati!';
	$bookmark_list['obsocialbookmarkergoogle'] = 'Google!';
	$bookmark_list['obsocialbookmarkerstumble'] = 'Stumble!';
	$bookmark_list['obsocialbookmarkerwindowslive'] = 'Windows Live!';
	$bookmark_list['obsocialbookmarkertailrank'] = 'Tailrank!';
	$bookmark_list['obsocialbookmarkerfurl'] = 'Furl!';
	$bookmark_list['obsocialbookmarkernetscape'] = 'Netscape!';
	$bookmark_list['obsocialbookmarkeryahoo'] = 'Yahoo!';
	$bookmark_list['obsocialbookmarkerblinklist'] = 'BlinkList!';
	$bookmark_list['obsocialbookmarkerfeedmelinks'] = 'Feed Me Links!';
	$bookmark_list['obsocialbookmarkercomments'] = 'co.mments!';
	$bookmark_list['obsocialbookmarkerbloglines'] = 'Bloglines!';
	$bookmark_list['obsocialbookmarkerbookmark'] = 'Bookmark.it!';
	$bookmark_list['obsocialbookmarkerask'] = 'Ask!';
	$bookmark_list['obsocialbookmarkerdiggita'] = 'Diggita!!';
	foreach ($bookmark_list as $key => $data) {
		delete_option($key);
	}
}


function obsocialbookmarker($content)
{

	return "$content\n".obsocialbookmarkerLinks();
}


if (function_exists('add_action')) {
	// Hook for adding admin menus
	add_action('admin_menu', 'obsocialbookmarker_add_pages');
	add_action('the_content', 'obsocialbookmarker');
}


register_activation_hook(_FILE_,'set_obsocialbookmarker_options');
register_deactivation_hook(_FILE_, 'unset_obsocialbookmarker_options')

?>