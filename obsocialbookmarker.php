<?php
/*
Plugin Name: obsocialbookmarker
Plugin URI: http://www.oraclebrains.com/wordpress/plugin/ob_social_button
Description: Add social book barker icons and links at the bottom of each post: Digg, del.icio.us, etc.
Author: Rajender Singh
Author URI: http://www.oraclebrains.com/
Version: 2.0.0
*/


function obsocialbookmarkerLinks()
{
	
	$link = urlencode(get_permalink());
	$title = urlencode(the_title('', '', false));

	$social_sites = array(
		'delicious' => array(
			'title' => 'Save to del.icio.us'
			, 'link' => 'http://del.icio.us/post?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://del.icio.us/favicon.ico" width="16" height="16" alt="[del.icio.us]"'
			, 'js' =>  ''
		)
		,'reddit' => array(
			'title' => 'Save to Reddit'
			, 'link' => 'http://reddit.com/submit?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://reddit.com/favicon.ico" width="16" height="16" alt="[Reddit]"'
			, 'js' =>  ''
		)
		,'slashdot' => array(
			'title' => 'Slashdot It!'
			, 'link' => 'http://slashdot.org/bookmark.pl?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://slashdot.org/favicon.ico" width="16" height="16" alt="[Slashdot]"'
			, 'js' =>  ''
		)
		,'digg' => array(
			'title' => 'Digg This Post!'
			, 'link' => 'http://digg.com/submit?phase=2&amp;url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://digg.com/favicon.ico" width="16" height="16" alt="[Digg]"'
			, 'js' =>  ''
		)
		,'facebook' => array(
			'title' => 'Share on Facebook!'
			, 'link' => 'http://www.facebook.com/share.php?u='.$link.'"'
			, 'img' => '"http://www.facebook.com/favicon.ico" width="16" height="16" alt="[Facebook]"'
			, 'js' =>  ''
		)
		,'technorati' => array(
			'title' => 'Add to my Technorati Favorites!'
			, 'link' => 'http://technorati.com/faves?add='.$link.''
			, 'img' => '"http://technorati.com/favicon.ico" width="16" height="16" alt="[Technorati]"'
			, 'js' =>  ''
		)
		,'google' => array(
			'title' => 'Add to my Google Bookmarks!'
			, 'link' => 'http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk='.$link.'&amp;title='.$title.''
			, 'img' => '"http://www.google.com/favicon.ico" width="16" height="16" alt="[Google]"'
			, 'js' =>  ''
		)
		,'stumbleupon' => array(
			'title' => 'Stumble it!'
			, 'link' => 'http://www.stumbleupon.com/submit?url='.$link.'&amp;title='.$title.''
			, 'img' => '"http://www.stumbleupon.com/favicon.ico" width="16" height="16" alt="[StumbleUpon]"'
			, 'js' =>  ''
		)

		,'windows_live' => array(
			'title' => 'Add to Windows Live!'
			, 'link' => 'https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.$link.'&title='.$title.'&top=1'
			, 'img' => '"http://favorites.live.com/favicon.ico" width="16" height="16" alt="[Windows Live]"'
			, 'js' =>  ''
		)
		,'tailrank' => array(
			'title' => 'Add to Tailrank!'
			, 'link' => 'http://tailrank.com/share/?link_href='.$link.'&title='.$title
			, 'img' => '"http://www.tailrank.com/favicon.ico" width="16" height="16" alt="[Tailrank]"'
			, 'js' =>  ''
		)

		,'furl' => array(
			'title' => 'Add to Furl'
			, 'link' => 'http://furl.net/storeIt.jsp?u='.$link.'&t='.$title
			, 'img' => '"http://furl.net/i/lil_furl_butt.gif" width="16" height="16" alt="[Furl]"'
			, 'js' =>  ''
		)

		,'netscape' => array(
			'title' => 'Add to Netscape'
			, 'link' => ' http://www.netscape.com/submit/?U='.$link.'&T='.$title
			, 'img' => '"http://www.netscape.com/favicon.ico" width="16" height="16" alt="[Netscape]"'
			, 'js' =>  ''
		)
		,'yahoo' => array(
			'title' => 'Add to Yahoo!'
			, 'link' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$link.'&t='.$title
			, 'img' => '"http://myweb2.search.yahoo.com/favicon.ico" width="16" height="16" alt="[Yahoo]"'
			, 'js' =>  ''
		)
		,'blinklist' => array(
			'title' => 'Add to BlinkList!'
			, 'link' => 'http://blinklist.com/index.php?Action=Blink/addblink.php&Url='.$link.'&Title='.$title
			, 'img' => '"http://blinklist.com/favicon.ico" width="16" height="16" alt="[BlinkList]"'
			, 'js' =>  ''
		)

	);
	$bookmarker = array();
	foreach ($social_sites as $key => $data) {
		$bookmarker[$key] = '<a href="'.$data['link'].'" target="_blank"'.' title="'.$data['title'].'"'
							.' onclick="'.$data['js'].'"'.' <img src='.$data['img'].'/></a>';
	}

	return '<span class="obsocialbookmarker">'
		. implode("\n", $bookmarker)
		. "</span>";
}

function obsocialbookmarker($content)
{
	return "$content\n".obsocialbookmarkerLinks();
}

if (function_exists('add_action')) {
	add_action('the_content', 'obsocialbookmarker');
}

?>
