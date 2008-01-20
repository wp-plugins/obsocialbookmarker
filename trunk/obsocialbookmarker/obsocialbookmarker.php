<?php

/*
Plugin Name: obsocialbookmarker
Plugin URI: http://www.oraclebrains.com/wordpress/plugin/ob_social_button
Description: Add social book mark icons and links at the bottom of each post: bookmarks options includes del.icio.us, reddit, slashdot it, digg, facebook, technorati, google, stumble, windows live, tailrank, bloglines, furl, netscape, yahoo, blinklist, feed me links, co.mments, bloglines, bookmark.it, ask, diggita, mister wong, backflip, spurl, netvouz, diigo, dropjack, segnalo, stumbleupon, simpy, newsvine, slashdot it,wink, linkagogo, rawsugar, fark, squidoo, blogmarks, blinkbits, connotea, smarking, wists, wykop, webride, thisnext, wirefan, taggly, sphere, fleck.
Version: 5.1.8
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

function obsocialbookmarker_get_version() {
	return '5.1.8';	
}


function obsocialbookmarker_option_list() {
	$ob_option_list = array();
	$ob_option_list['obsocialbookmarker_content_b'] = '0';
	$ob_option_list['obsocialbookmarker_content_a'] = '0';
	$ob_option_list['obsocialbookmarker_excerpt_b'] = '0';
	$ob_option_list['obsocialbookmarker_excerpt_a'] = '0';
	$ob_option_list['obsocialbookmarker_fadeimage'] = '0';
	return $ob_option_list;
}

function obsocialbookmarker_exist_in_array($str, $array){
    $str = strtolower($str);
    foreach ($array as $key => $value) if (strtolower($value) == $str) return true;
    return false;
}


function obsocialbookmarker_get_excpglstopt_list(){
	$obsocialbookmarker_excpglstopt = get_option('obsocialbookmarker_excpglstopt');
	$obsocialbookmarker_excpglstopt_a = array();
	if 	(!empty($obsocialbookmarker_excpglstopt)){
		$obsocialbookmarker_excpglstopt_a = explode(",", $obsocialbookmarker_excpglstopt);
	}
	return $obsocialbookmarker_excpglstopt_a;
}

function obsocialbookmarker_put_excpglstopt_list($new_page){
	$obsocialbookmarker_excpglstopt = get_option('obsocialbookmarker_excpglstopt');
	$obsocialbookmarker_excpglstopt_a = array();
	if 	(!empty($obsocialbookmarker_excpglstopt)){
		$obsocialbookmarker_excpglstopt_a = explode(",", $obsocialbookmarker_excpglstopt);
	}
	if (!empty($obsocialbookmarker_excpglstopt_a)){
		$count = count($obsocialbookmarker_excpglstopt_a);
	}else{
		$count = 0;
	}
	$obsocialbookmarker_excpglstopt_a[$count] = $new_page;
	$obsocialbookmarker_excpglstopt = implode(",", $obsocialbookmarker_excpglstopt_a);
	update_option('obsocialbookmarker_excpglstopt',$obsocialbookmarker_excpglstopt);
}

function obsocialbookmarker_take_excpglstopt_list($minus_page){
	$obsocialbookmarker_excpglstopt = get_option('obsocialbookmarker_excpglstopt');
	$obsocialbookmarker_excpglstopt_a = array();
	$obsocialbookmarker_excpglstopt_b = array();

	if 	(!empty($obsocialbookmarker_excpglstopt)){
		$obsocialbookmarker_excpglstopt_a = explode(",", $obsocialbookmarker_excpglstopt);
	}
	if (!empty($obsocialbookmarker_excpglstopt_a)){
		foreach ($obsocialbookmarker_excpglstopt_a as $obsocialbookmarker_excpglstopt_s) {
			if ($obsocialbookmarker_excpglstopt_s != $minus_page){
				$obsocialbookmarker_excpglstopt_b[count($obsocialbookmarker_excpglstopt_b)] = $obsocialbookmarker_excpglstopt_s;
			}
		}
	}
	$obsocialbookmarker_excpglstopt = implode(",", $obsocialbookmarker_excpglstopt_b);
	update_option('obsocialbookmarker_excpglstopt',$obsocialbookmarker_excpglstopt);
}


function obsocialbookmarker_exist_excpglstopt_list($page){
	if (empty($page)){
		return false;
	}
	$obsocialbookmarker_excpglstopt = get_option('obsocialbookmarker_excpglstopt');
	$obsocialbookmarker_excpglstopt_a = array();
	if 	(!empty($obsocialbookmarker_excpglstopt)){
		$obsocialbookmarker_excpglstopt_a = explode(",", $obsocialbookmarker_excpglstopt);
	}

	if (obsocialbookmarker_exist_in_array($page, $obsocialbookmarker_excpglstopt_a)){
		return true;
	}

	return false;
}


function obsocialbookmarker_bookmark_list($country) {
	$bookmark_list = array();

	if ($country == 'international'){

		$bookmark_list['obsocialbookmarkerask'] = 'Ask';
		$bookmark_list['obsocialbookmarkeradditious'] = 'Additious';
		
		$bookmark_list['obsocialbookmarkerbackflip'] = 'Backflip';
		$bookmark_list['obsocialbookmarkerbloglines'] = 'Bloglines!';
		
		$bookmark_list['obsocialbookmarkerblinklist'] = 'BlinkList!';
		$bookmark_list['obsocialbookmarkerblinkbits'] = 'Blinkbits!';
		$bookmark_list['obsocialbookmarkerblogmarks'] = 'Blogmarks!';
		
		$bookmark_list['obsocialbookmarkercomments'] = 'co.mments!';
		$bookmark_list['obsocialbookmarkerconnotea'] = 'Connotea!';
		
		

	
		$bookmark_list['obsocialbookmarkerdropjack'] = 'Dropjack';
		$bookmark_list['obsocialbookmarkerdiigo'] = 'Diigo';
		$bookmark_list['obsocialbookmarkerdigg'] = 'Digg it';

		$bookmark_list['obsocialbookmarkerfacebook'] = 'Facebook';
		$bookmark_list['obsocialbookmarkerfark'] = 'Fark';	
		$bookmark_list['obsocialbookmarkerfurl'] = 'Furl';
		$bookmark_list['obsocialbookmarkerfeedmelinks'] = 'Feed Me Links!';
		$bookmark_list['obsocialbookmarkerfleck'] = 'Fleck!';
		
		$bookmark_list['obsocialbookmarkergoogle'] = 'Google';
		
		$bookmark_list['obsocialbookmarkerjeqq'] = 'Jeqq!';

		$bookmark_list['obsocialbookmarkerlinkagogo'] = 'LinkaGoGo!';

		$bookmark_list['obsocialbookmarkermisterwong'] = 'Mister Wong!!';
		
		$bookmark_list['obsocialbookmarkernetvouz'] = 'Netvouz';
		$bookmark_list['obsocialbookmarkernewsvine'] = 'Newsvine';
		$bookmark_list['obsocialbookmarkernetscape'] = 'Netscape!';	
		
		$bookmark_list['obsocialbookmarkerrawsugar'] = 'Rawsugar';
		$bookmark_list['obsocialbookmarkerreddit'] = 'Reddit';
		
		$bookmark_list['obsocialbookmarkerspurl'] = 'Spurl';
		$bookmark_list['obsocialbookmarkersegnalo'] = 'Segnalo';
		$bookmark_list['obsocialbookmarkersphere'] = 'Sphere!';
		$bookmark_list['obsocialbookmarkerstumble'] = 'StumbleUpon';
		$bookmark_list['obsocialbookmarkerslashdot'] = 'Slashdot it';
		$bookmark_list['obsocialbookmarkersimpy'] = 'Simpy';
		$bookmark_list['obsocialbookmarkersquidoo'] = 'Squidoo';
		$bookmark_list['obsocialbookmarkersmarking'] = 'Smarking!';

		$bookmark_list['obsocialbookmarkertechnorati'] = 'Technorati';
		$bookmark_list['obsocialbookmarkertailrank'] = 'Tailrank!';
		$bookmark_list['obsocialbookmarkerthisnext'] = 'ThisNext!';
		$bookmark_list['obsocialbookmarkertaggly'] = 'Taggly!';
		
		$bookmark_list['obsocialbookmarkerwebride'] = 'Webride!';		
		$bookmark_list['obsocialbookmarkerwink'] = 'Wink!';
		$bookmark_list['obsocialbookmarkerwists'] = 'Wists!';
		$bookmark_list['obsocialbookmarkerwirefan'] = 'Wirefan!';
		$bookmark_list['obsocialbookmarkerwindowslive'] = 'Windows Live!';

		
		$bookmark_list['obsocialbookmarkeryahoo'] = 'Yahoo';
	}
	
	if ($country == 'us'){
			$bookmark_list['obsocialbookmarkerdelicious'] = 'Del.icio.us';
	}

	if ($country == 'ch'){
		$bookmark_list['obsocialbookmarkermisterwongcn'] = 'Mister Wong China!!';
	}

	if ($country == 'de'){
	
		$bookmark_list['obsocialbookmarkermisterwongde'] = 'Mister Wong Germany!!';
	}
	if ($country == 'fr'){
		$bookmark_list['obsocialbookmarkermisterwongfr'] = 'Mister Wong France!!';
	}

	if ($country == 'ru'){
		$bookmark_list['obsocialbookmarkermisterwongru'] = 'Mister Wong Russia!!';
	}
	
	if ($country == 'es'){
		$bookmark_list['obsocialbookmarkermisterwonges'] = 'Mister Wong Spain!!';
	}

	if ($country == 'pl'){
		$bookmark_list['obsocialbookmarkerwykop'] = 'Wykop!';
	}

	if ($country == 'it'){
		$bookmark_list['obsocialbookmarkerbookmark'] = 'Bookmark.it!';
		$bookmark_list['obsocialbookmarkerdiggita'] = 'Diggita!';
	}

			
	return $bookmark_list;
}

// action function for above hook
function obsocialbookmarker_add_pages() {
    // Add a new submenu under Options:
    add_options_page('obsocialbookmarker', 'obsocialbookmarker', 'manage_options', _FILE_, 'print_obsocialbookmarker_options_form');
}

function print_obsocialbookmarker_options_form() {
	$obsocialbookmarker_version = obsocialbookmarker_get_version();


	$ok = false;	
	
	
	$ob_menu = '';
	$ob_submit_button = '';
	$ob_other_option1 = '';


	if ($_REQUEST['ob_menu']){
		$ob_menu = $_REQUEST['ob_menu'];
	}
	
	
	if ($_REQUEST['position']){
		$ob_submit_button = 'position';
	}


	if ($_REQUEST['bookmark_filter']){
		$ob_submit_button = 'bookmark_filter';
		$ob_other_option1 = 'international';
		if ($_REQUEST['ob_country']){
			$ob_other_option1 = $_REQUEST['ob_country'];
		}
	}

	if ($_REQUEST['bookmark']){
		$ob_submit_button = 'bookmark';
		$ob_other_option1 = 'international';
		if ($_REQUEST['ob_country']){
			$ob_other_option1 = $_REQUEST['ob_country'];
		}
	}
	
	if ($_REQUEST['excp_pge_in']){
		$ob_submit_button = 'excp_pge_in';
		$ob_other_option1 = '';
		if ($_REQUEST['add_page']){
			$ob_other_option1 = $_REQUEST['add_page'];
		}
	}

	if ($_REQUEST['excp_pge_out']){
		$ob_submit_button = 'excp_pge_out';
		$ob_other_option1 = '';
		if ($_REQUEST['minus_page']){
			$ob_other_option1 = $_REQUEST['minus_page'];
		}
	}


	if ($ob_submit_button == 'bookmark'){
		$bookmark_list = array();
		unset($bookmark_list);
		$bookmark_list = obsocialbookmarker_bookmark_list($ob_other_option1);

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
	
	if ($ob_submit_button == 'position'){
		if ($_REQUEST['obsocialbookmarker_content_b']=="1"){
			update_option('obsocialbookmarker_content_b',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_content_b',"0");
			$ok = true;
		}

		if ($_REQUEST['obsocialbookmarker_content_a']=="1"){
			update_option('obsocialbookmarker_content_a',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_content_a',"0");
			$ok = true;
		}

		if ($_REQUEST['obsocialbookmarker_excerpt_b']=="1"){
			update_option('obsocialbookmarker_excerpt_b',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_excerpt_b',"0");
			$ok = true;
		}

		if ($_REQUEST['obsocialbookmarker_excerpt_a']=="1"){
			update_option('obsocialbookmarker_excerpt_a',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_excerpt_a',"0");
			$ok = true;
		}

		if ($_REQUEST['obsocialbookmarker_fadeimage']=="1"){
			update_option('obsocialbookmarker_fadeimage',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_fadeimage',"0");
			$ok = true;
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

	if ( $ob_menu == '3'){
			if ( $ob_submit_button == 'excp_pge_in'){
				obsocialbookmarker_put_excpglstopt_list($ob_other_option1);
			}

			if ( $ob_submit_button == 'excp_pge_out'){
				obsocialbookmarker_take_excpglstopt_list($ob_other_option1);
			}

	}


	if (ini_get('allow_url_fopen') == '1') {
		if ($handle = fopen("http://svn.wp-plugins.org/obsocialbookmarker/trunk/obsocialbookmarker/obsocialbookmarker.info", "r")){
			$obsocialbookmarker_new_version = 0;
			while (!feof($handle)) {
				$buffer = fgets($handle);
				if ( (substr($buffer,0, 7)) == 'Version'){
					$buffer = split(':',$buffer);
					if (trim($buffer[1]) <> $obsocialbookmarker_version){
						$obsocialbookmarker_new_version = 1;
					?>
						<div class="wrap">
						<h2><?php _e('New Version Available') ?></h2>
							<label for="obsocialbookmarker_updation"> 
								Newer Version <b><?php echo $buffer[1] ?> </b>Available, Please Upgrade to newer version to get best of obsocialbookmarker plugin. Click <a href="http://downloads.wordpress.org/plugin/obsocialbookmarker.zip">here</a> to download.<BR><BR>
					<?php

					}
				}
				if ( ((substr($buffer,0, 3)) == 'Msg')&& ($obsocialbookmarker_new_version == 1) ){
					$buffer = split(':',$buffer);
					?>
						<b>New Features<BR></b><?php echo $buffer[1] ?> 
					</label> 
					</div>
					<?php 

				}
			}
			fclose($handle);
		}
	}

	?>
	<div class="wrap">

	<p class="submit">
		<h2><?php _e('OBSocialbookmark Menu') ?></h2>
		<table>
		<tr>
			<td>
				<form method="post"> 
					<input type="hidden" name="ob_menu" value="1"/>
					<input type="submit" name="obform" value="General Settings" />
				</form>
			</td>
			<td>
				<form method="post"> 
					<input type="hidden" name="ob_menu" value="2"/>
					<input type="submit" name="obform" value="Select Bookmarks" />
				</form>
			</td>
			<td>
				<form method="post"> 
					<input type="hidden" name="ob_menu" value="3"/>
					<input type="submit" name="obform" value="Exception Pages" />
				</form>
			</td>
			<td>
		</tr>
		</table>			
	</p>
	</div>
	<?php 

		if ($_REQUEST['ob_menu']=="1"){
			print_obsocialbookmarker_global_pos_options_form();
		}
		
		if ($_REQUEST['ob_menu'] == "2" || $ob_submit_button == 'bookmark_filter'){
			if ($ob_submit_button == ''){
				$ob_other_option1 = 'international';			
			}
			print_obsocialbookmarker_global_bookmark_options_form($ob_other_option1);
		}
		
		if ($_REQUEST['ob_menu']=="3"){
			print_obsocialbookmarker_exception_pages_options_form(); 
		}
}


function print_obsocialbookmarker_global_pos_options_form() {
	?>
	<div class="wrap">
	<h2><?php _e("General Bookmark's Options") ?></h2>
	<form method="post">
	<ul> 
		<li> 
			<label for="obsocialbookmarker_content_b"> 
			<input name="obsocialbookmarker_content_b" type="checkbox" id="obsocialbookmarker_content_b" value="1" <?php checked('1', get_option('obsocialbookmarker_content_b')); ?>/> 
			Place Before Each Post
			</label> 
		</li>
		<li> 
			<label for="obsocialbookmarker_content_a"> 
			<input name="obsocialbookmarker_content_a" type="checkbox" id="obsocialbookmarker_content_a" value="1" <?php checked('1', get_option('obsocialbookmarker_content_a')); ?>/> 
			Place After Each Post
			</label> 
		</li>
		<li> 
			<label for="obsocialbookmarker_excerpt_b"> 
			<input name="obsocialbookmarker_excerpt_b" type="checkbox" id="obsocialbookmarker_excerpt_b" value="1" <?php checked('1', get_option('obsocialbookmarker_excerpt_b')); ?>/> 
			Place Before Each Excerpt
			</label> 
		</li>
		<li> 
			<label for="obsocialbookmarker_excerpt_a"> 
			<input name="obsocialbookmarker_excerpt_a" type="checkbox" id="obsocialbookmarker_excerpt_a" value="1" <?php checked('1', get_option('obsocialbookmarker_excerpt_a')); ?>/> 
			Place After Each Excerpt
			</label> 
		</li>
		<BR>
		<li> 
			<label for="obsocialbookmarker_fadeimage"> 
			<input name="obsocialbookmarker_fadeimage" type="checkbox" id="obsocialbookmarker_fadeimage" value="1" <?php checked('1', get_option('obsocialbookmarker_fadeimage')); ?>/> 
			Add Fading Effects to Bookmark's Image Icon
			</label> 
		</li>

	</ul> 
	<p class="submit"><input type="submit" name="position" value="Submit" /></p>
	</form>
	</div>
	<?php
}

function ob_country_selected($ob_p_selected, $ob_p_current){
	if ($ob_p_selected == $ob_p_current){
		return 'selected="selected"';
	}else{
		return '';
	}
	return '';
}

function print_obsocialbookmarker_global_bookmark_options_form($ob_p_country) {
	$bookmark_list = array();
	unset($bookmark_list);
	$bookmark_list = obsocialbookmarker_bookmark_list($ob_p_country);
	$col_no = 5;
	?>
		<div class="wrap">
		<form method="post">
		<table class="editform" width="100%" cellspacing="2" cellpadding="5">	
			<tr valign="top">
				<td>
				<label for="Country"> <b>Country&nbsp;</b>
				<select name="ob_country" id="ob_country">					
					<option value="ch" <?php echo ob_country_selected($ob_p_country, 'ch') ?>>China</option>;
					<option value="fr" <?php echo ob_country_selected($ob_p_country, 'fr') ?>>France</option>;
					<option value="de" <?php echo ob_country_selected($ob_p_country, 'de') ?>>Germany</option>;
					<option value="international" <?php echo ob_country_selected($ob_p_country, 'international') ?>>International</option>;
					<option value="it" <?php echo ob_country_selected($ob_p_country, 'it') ?>>Itay</option>;
					<option value="pl" <?php echo ob_country_selected($ob_p_country, 'pl') ?>>Poland</option>;
					<option value="ru" <?php echo ob_country_selected($ob_p_country, 'ru') ?>>Russia</option>;
					<option value="es" <?php echo ob_country_selected($ob_p_country, 'es') ?>>Spain</option>;					
					<option value="us" <?php echo ob_country_selected($ob_p_country, 'us') ?>>USA</option>;
				</select>
				</label> 
				<input type="hidden" name="ob_menu" value="2"/>
				<input type="submit" name="bookmark_filter" value="Filter" />
				</td>
			</tr>
		</table>
		</form>
		<h2><?php _e('Select Bookmarks to be included') ?></h2>
		<form method="post">
		<p class="submit"><input type="submit" name="bookmark" value="Submit" /></p>
		<input type="hidden" name="ob_country" value="<?php echo $ob_p_country ?>" />
		
		<ul> <?php 
		if 	(!empty($bookmark_list)){
		?><table cellpadding="10"><?php
		$i = 0;
		foreach ($bookmark_list as $key => $data) {
				if ($i == 5) {
					$i = 0;
				}
				if ($i == 0 ){
					echo "<tr>";
				}
			?>	

				<td >

				<li> 
					<label for="<?php echo $key ?>"> 
					<input name="<?php echo $key ?>" type="checkbox" id="<?php echo $key ?>" value="1" <?php checked('1', get_option($key)); ?>/> 
					<?php echo $data ?>
					</label> 
				</li>
				</td>
				<?php
				
				$i = $i + 1;
				if ($i == 5 ){
					echo "</tr>";
				}
			}
		?></table><?php
		}
		?>
		</ul> 
		<p class="submit"><input type="submit" name="submit" value="Submit" /></p>
		</form>
		</div>
	<?php
}

function print_obsocialbookmarker_exception_pages_options_form() {
	$exc_pg_lst_opt = array();
	unset($exc_pg_lst_opt);

	?>
		<div class="wrap">
		<h2><?php _e('Exception Pages Listing') ?></h2>
		
			<table class="editform" width="100%" cellspacing="0" cellpadding="0">	
				<tr valign="top">
					
					<form method="post">

					<td>
						<label for="add_page_lb"> 
						Other Pages
						<select name="add_page" id="add_page">
					<?php
						$obsocialbookmarker_excpglstopt = get_option('obsocialbookmarker_excpglstopt');
						$pages = get_pages('exclude='.$obsocialbookmarker_excpglstopt);
						foreach ($pages as $page) {
							echo '\n\t<option value="'.$page->ID.'">'.get_the_title($page->ID).'</option>';
						}
					?>
						
					</select>
					</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="hidden" name="ob_menu" value="3"/>					
					<input type="submit" name="excp_pge_in" value=">>" />

					</td>
					</form>

					<form method="post">
					<td>
						<input type="hidden" name="ob_menu" value="3"/>
						<input type="submit" name="excp_pge_out" value="<<" />
						<label for="minus_page_lb"> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Exception Pages
						<select name="minus_page" id="minus_page">
					<?php
						$pages_list = obsocialbookmarker_get_excpglstopt_list();
						foreach ($pages_list as $page) {
							echo '\n\t<option value="'.$page.'">'.get_the_title($page).'</option>';
						}
					?>
						
					</select>
					</label>
					</td>
					</form>

				</tr>
			</table>
		</div>

							
	
	<?php
}



function obsocialbookmarkerLinks()
{
	
	$link = urlencode(get_permalink());
	$title = urlencode(the_title('', '', false));
	$imgurl = '"'.get_settings('siteurl').'/wp-content/plugins/obsocialbookmarker/images/';

	$social_sites = array(
		'delicious' => array(
			'title' => 'Save to del.icio.us'
			, 'link' => 'http://del.icio.us/post?url='.$link.'&amp;title='.$title.''
			, 'img' => $imgurl.'delicious.png" width="16" height="16" alt="del.icio.us"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdelicious')

		)
		,'reddit' => array(
			'title' => 'Save to Reddit'
			, 'link' => 'http://reddit.com/submit?url='.$link.'&amp;title='.$title.''
			, 'img' => $imgurl.'reddit.gif" width="16" height="16" alt="Reddit"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerreddit')
		)
		,'slashdot' => array(
			'title' => 'Slashdot It!'
			, 'link' => 'http://slashdot.org/bookmark.pl?url='.$link.'&amp;title='.$title.''
			, 'img' => $imgurl.'slashdot.png" width="16" height="16" alt="Slashdot"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerslashdot')
		)
		,'digg' => array(
			'title' => 'Digg This Post!'
			, 'link' => 'http://digg.com/submit?phase=2&amp;url='.$link.'&amp;title='.$title.''
			, 'img' => $imgurl.'digg.png" width="16" height="16" alt="Digg"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdigg')
		)
		,'facebook' => array(
			'title' => 'Share on Facebook!'
			, 'link' => 'http://www.facebook.com/share.php?u='.$link.''
			, 'img' => $imgurl.'facebook.gif" width="16" height="16" alt="Facebook"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfacebook')
		)
		,'technorati' => array(
			'title' => 'Add to my Technorati Favorites!'
			, 'link' => 'http://technorati.com/faves?add='.$link.''
			, 'img' => $imgurl.'technorati.png" width="16" height="16" alt="Technorati"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkertechnorati')
		)
		,'google' => array(
			'title' => 'Add to my Google Bookmarks!'
			, 'link' => 'http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk='.$link.'&amp;title='.$title.''
			, 'img' => $imgurl.'goog.png" width="16" height="16" alt="Google"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkergoogle')
		)
		,'stumbleupon' => array(
			'title' => 'Stumble it!'
			, 'link' => 'http://www.stumbleupon.com/submit?url='.$link.'&amp;title='.$title.''
			, 'img' => $imgurl.'su.png" width="16" height="16" alt="StumbleUpon"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerstumble')
		)

		,'windows_live' => array(
			'title' => 'Add to Windows Live!'
			, 'link' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;mkt=en-us&amp;url='.$link.'&amp;title='.$title.'&amp;top=1'
			, 'img' => $imgurl.'live.gif" width="16" height="16" alt="Windows Live"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerwindowslive')
		)
		,'tailrank' => array(
			'title' => 'Add to Tailrank!'
			, 'link' => 'http://tailrank.com/share/?link_href='.$link.'&amp;title='.$title
			, 'img' => $imgurl.'tailrank.png" width="16" height="16" alt="Tailrank"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkertailrank')
		)

		,'furl' => array(
			'title' => 'Add to Furl'
			, 'link' => 'http://furl.net/storeIt.jsp?u='.$link.'&amp;t='.$title
			, 'img' => $imgurl.'furl.gif" width="16" height="16" alt="Furl"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfurl')
		)

		,'netscape' => array(
			'title' => 'Add to Netscape'
			, 'link' => ' http://www.netscape.com/submit/?U='.$link.'&amp;T='.$title
			, 'img' => '"http://www.netscape.com/favicon.ico" width="16" height="16" alt="Netscape"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkernetscape')
		)
		,'yahoo' => array(
			'title' => 'Add to Yahoo!'
			, 'link' => 'http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$link.'&amp;t='.$title
			, 'img' => $imgurl.'yahoo-myweb.png" width="16" height="16" alt="Yahoo"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkeryahoo')
		)
		,'blinklist' => array(
			'title' => 'Add to BlinkList!'
			, 'link' => 'http://blinklist.com/index.php?Action=Blink/addblink.php&amp;Url='.$link.'&amp;Title='.$title
			, 'img' => $imgurl.'blinklist.png" width="16" height="16" alt="BlinkList"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerblinklist')
		)
		,'feedmelinks' => array(
			'title' => 'Add to Feed Me Links!'
			, 'link' => 'http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;name='.$title.'&amp;url='.$link.'&amp;version=0.7'
			, 'img' => $imgurl.'feedmelinks.png" width="16" height="16" alt="Feed Me Links"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerfeedmelinks')
		)
		,'comments' => array(
			'title' => 'Add to co.mments!'
			, 'link' => 'http://co.mments.com/track?url='.$link.'&amp;title='.$title
			, 'img' => '"http://co.mments.com/favicon.ico" width="16" height="16" alt="co.mments"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkercomments')
		)
		,'bloglines' => array(
			'title' => 'Add to Bloglines!'
			, 'link' => 'http://www.bloglines.com/sub/'.urldecode($link)
			, 'img' => $imgurl.'bloglines.jpg" width="16" height="16" alt="Bloglines"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerbloglines')
		)
		,'bookmark' => array(
			'title' => 'Bookmark.it!'
			, 'link' => 'http://www.bookmark.it/bookmark.php?url='.$link
			, 'img' => $imgurl.'bookmarkit.gif" width="16" height="16" alt="Bookmark.it"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerbookmark')
		)
		,'ask' => array(
			'title' => 'Ask!'
			, 'link' => 'http://mystuff.ask.com/mysearch/QuickWebSave?v=1.2&amp;t=webpages&amp;title='.$title.'%21&amp;url='.$link
			, 'img' => $imgurl.'ask.png" width="16" height="16" alt="Ask"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerask')
		)
		,'diggita' => array(
			'title' => 'Diggita!'
			, 'link' => 'http://www.diggita.it/submit.php?title='.$title.'%21&amp;url='.$link
			, 'img' => $imgurl.'diggitait.gif" width="16" height="16" alt="Diggita"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkerdiggita')
		)
		,'misterwong' => array(
			'title' => 'Mister Wong!'
			, 'link' => 'http://www.mister-wong.com/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
			, 'img' => $imgurl.'misterwong.png" width="16" height="16" alt="Mister Wong"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwong')
		)
		,'misterwongcn' => array(
			'title' => 'Mister Wong China!'
			, 'link' => 'http://www.mister-wong.cn/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
			, 'img' => $imgurl.'misterwong.png" width="16" height="16" alt="Mister Wong China"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongcn')
		)
		,'misterwongde' => array(
			'title' => 'Mister Wong Germany!'
			, 'link' => 'http://www.mister-wong.de/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
			, 'img' => $imgurl.'misterwong.png" width="16" height="16" alt="Mister Wong Germany"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongde')
		)
		,'misterwongfr' => array(
			'title' => 'Mister Wong France!'
			, 'link' => 'http://www.mister-wong.fr/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
			, 'img' => $imgurl.'misterwong.png" width="16" height="16" alt="Mister Wong France"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongfr')
		)
		,'misterwongru' => array(
			'title' => 'Mister Wong Russia!'
			, 'link' => 'http://www.mister-wong.ru/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
			, 'img' => $imgurl.'misterwong.png" width="16" height="16" alt="Mister Wong Russia"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwongru')
		)
		,'misterwonges' => array(
			'title' => 'Mister Wong Spain!'
			, 'link' => 'http://www.mister-wong.es/index.php?action=addurl&amp;bm_url='.$link."&amp;bm_description=".$title 
			, 'img' => $imgurl.'misterwong.png" width="16" height="16" alt="Mister Wong Spain"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkermisterwonges')
		)
		,'newsvine' => array(
			'title' => 'Newsvine'
			, 'link' => 'http://www.newsvine.com/_tools/seed&amp;save?u='.$link."&amp;h=".$title 
			, 'img' => $imgurl.'newsvine.png" width="16" height="16" alt="Newsvine"'
			, 'js' =>  ''
			, 'visible' => get_option('obsocialbookmarkernewsvine')
		)
		,'simpy' => array(
				'title' => 'Simpy'
				, 'link' => 'http://www.simpy.com/simpy/LinkAdd.do?href='.$link."&amp;title=".$title 
				, 'img' => $imgurl.'simpy.png" width="16" height="16" alt="Simpy"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersimpy')
			)
		,'backflip' => array(
				'title' => 'Backflip'
				, 'link' => 'http://www.backflip.com/add_page_pop.ihtml?url='.$link."&amp;title=".$title 
				, 'img' => $imgurl.'backflip.png" width="16" height="16" alt="Backflip"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerbackflip')
			)
		,'spurl' => array(
				'title' => 'Backflip'
				, 'link' => 'http://www.spurl.net/spurl.php? url='.$link."&amp;title=".$title 
				, 'img' => $imgurl.'spurl.png" width="16" height="16" alt="Spurl"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerspurl')
			)
		,'netvouz' => array(
				'title' => 'Netvouz'
				, 'link' => 'http://www.netvouz.com/action/submitBookmark?url='.$link."&amp;title=".$title."&amp;popup=no"
				, 'img' => '"http://www.netvouz.com/web/images/netvouz16.gif" width="16" height="16" alt="Netvouz"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkernetvouz')
			)
		,'diigo' => array(
				'title' => 'Diigo'
				, 'link' => 'http://www.diigo.com/post?url='.$link."&amp;title=".$title
				, 'img' => '"http://www.diigo.com/images/ii_blue.gif" width="16" height="16" alt="Diigo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerdiigo')
			)

		,'segnalo' => array(
				'title' => 'Segnalo'
				, 'link' => 'http://segnalo.com/post.html.php?url='.$link."&amp;title=".$title
				, 'img' => $imgurl.'segnalo.gif" width="16" height="16" alt="Segnalo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersegnalo')
			)
		,'dropjack' => array(
				'title' => 'Dropjack'
				, 'link' => 'http://www.dropjack.com/submit.php?url='.$link
				, 'img' => $imgurl.'dropjack.gif" width="16" height="16" alt="Dropjack"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerdropjack')
			)
		,'wink' => array(
				'title' => 'Wink'
				, 'link' => 'http://wink.com/_/tag?url='.$link."&amp;doctitle=".$title
				, 'img' => $imgurl.'wink.png" width="16" height="16" alt="Wink"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwink')
			)
		,'linkagogo' => array(
				'title' => 'LinkaGoGo'
				, 'link' => 'http://www.linkagogo.com/go/AddNoPopup?url='.$link."&amp;title=".$title
				, 'img' => $imgurl.'linkagogo.png" width="16" height="16" alt="LinkaGoGo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerlinkagogo')
			)
		,'rawsugar' => array(
				'title' => 'Rawsugar'
				, 'link' => 'http://www.rawsugar.com/tagger/?turl='.$link."&amp;tttl=".$title."&amp;editorInitialized=1"
				, 'img' => $imgurl.'rawsugar.png" width="16" height="16" alt="Rawsugar"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerrawsugar')
			)
		,'squidoo' => array(
				'title' => 'Squidoo'
				, 'link' => 'http://www.squidoo.com/lensmaster/bookmark?'.$link
				, 'img' => '"http://www.squidoo.com/favicon.ico" width="16" height="16" alt="Squidoo"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersquidoo')
			)
		,'fark' => array(
				'title' => 'Fark'
				, 'link' => 'http://cgi.fark.com/cgi/fark/submit.pl?new_url='.$link."&amp;new_comment=".$title."&amp;linktype="
				, 'img' => $imgurl.'fark.png" width="16" height="16" alt="Fark"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfark')
			)
		,'smarking' => array(
				'title' => 'Smarking'
				, 'link' => 'http://smarking.com/editbookmark/?url='.$link
				, 'img' => $imgurl.'smarking.gif" width="16" height="16" alt="Smarking"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersmarking')
			)
		,'connotea' => array(
				'title' => 'Connotea'
				, 'link' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri='.$link.'&amp;title='.$title
				, 'img' => $imgurl.'connotea.gif" width="16" height="16" alt="Connotea"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerconnotea')
			)
		,'wists' => array(
				'title' => 'Wists'
				, 'link' => 'http://wists.com/r.php?c=&amp;r='.$link.'&amp;tot;e='.$title
				, 'img' => $imgurl.'wists.gif" width="16" height="16" alt="Wists"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwists')
			)
		,'blinkbits' => array(
				'title' => 'Blinkbits'
				, 'link' => ' http://www.blinkbits.com/bookmarklets/save.php?v=1&amp;source_url='.$link
				, 'img' => $imgurl.'blinkbits.gif" width="16" height="16" alt="Blinkbits"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerblinkbits')
			)
		,'blogmarks' => array(
				'title' => 'Blogmarks'
				, 'link' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url='.$link.'&amp;title='.$title
				, 'img' => $imgurl.'blogmarks.gif" width="16" height="16" alt="Blogmarks"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerblogmarks')
			)
		,'jeqq' => array(
				'title' => 'Jeqq'
				, 'link' => 'http://www.jeqq.com/submit.php?url='.$link.'&amp;title='.$title
				, 'img' => $imgurl.'jeqq.gif" width="16" height="16" alt="Jeqq"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerjeqq')
			)					
		,'wykop' => array(
				'title' => 'Wykop'
				, 'link' => 'http://www.wykop.pl/dodaj?url='.$link
				, 'img' => $imgurl.'wykop.png" width="16" height="16" alt="Wykop"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwykop')
			)		
		,'webride' => array(
				'title' => 'Webride'
				, 'link' => 'http://webride.org/discuss/split.php?uri='.$link.'&amp;title='.$title
				, 'img' => $imgurl.'webride.png" width="16" height="16" alt="Webride"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwebride')
			)		
		,'thisnext' => array(
				'title' => 'ThisNext'
				, 'link' => 'http://www.thisnext.com/pick/new/submit/sociable/?url='.$link.'&amp;name='.$title
				, 'img' => $imgurl.'thisnext.png" width="16" height="16" alt="ThisNext"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerthisnext')
			)		
		,'wirefan' => array(
				'title' => 'Wirefan'
				, 'link' => 'http://www.wirefan.com/grpost.php?u='.$link.'&amp;title='.$title
				, 'img' => $imgurl.'wirefan.gif" width="16" height="16" alt="Wirefan"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerwirefan')
			)	
					
		,'taggly' => array(
				'title' => 'Taggly'
				, 'link' => 'http://www.taggly.com/bookmarks/?action=add&amp;address= '.$link.'&amp;title='.$title
				, 'img' => $imgurl.'taggly.png" width="16" height="16" alt="Taggly"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkertaggly')
			)
		,'sphere' => array(
				'title' => 'Sphere'
				, 'link' => 'http://www.sphere.com/search?q=sphereit:'.$link.'&amp;title='.$title
				, 'img' => $imgurl.'sphere.png" width="16" height="16" alt="Sphere"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkersphere')
			)	
		,'fleck' => array(
				'title' => 'Fleck'
				, 'link' => 'http://extension.fleck.com/?v=b.0.804&amp;url='.$link
				, 'img' => $imgurl.'fleck.gif" width="16" height="16" alt="Fleck"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkerfleck')
			)			
		,'additious' => array(
				'title' => 'Additious'
				, 'link' => 'http://www.additious.com/?url='.$link.'&amp;title='.$title
				, 'img' => $imgurl.'additious.gif" width="16" height="16" alt="Additious"'
				, 'js' =>  ''
				, 'visible' => get_option('obsocialbookmarkeradditious')
			)			

);

	$bookmarker = array();
	unset($bookmarker);
	
	$l_fade = '';
	
	if (get_option('obsocialbookmarker_fadeimage') == '1'){
		$l_fade = 'style="-moz-opacity:0.5;filter:alpha(opacity=50);" onmouseover="this.style.MozOpacity=1; this.filters.alpha.opacity=100" onmouseout="this.style.MozOpacity=0.5; this.filters.alpha.opacity=50"';
	}

	foreach ($social_sites as $key => $data) {
		if ($data['visible'] == '1'){
			$bookmarker[$key] = '<a href="'.$data['link'].'" target="_blank"'.' title="'.$data['title'].'"> <img '.$l_fade.' src='.$data['img'].'/></a>';
		}
	}
	
	if (empty($bookmarker)){
		return '';
	}else{
		return '<p><span>'
			. implode("\n", $bookmarker)
			. "</span></p>";
	}
}

function set_obsocialbookmarker_options(){
	$bookmark_list = array();
	$country_list = array('international','ch','fr','de','it','pl','ru','es','us');

	

	foreach ($country_list as $country_key => $country_data) {
		unset($bookmark_list);
		$bookmark_list =  obsocialbookmarker_bookmark_list($country_data);
		foreach ($bookmark_list as $key => $data) {
			add_option($key,'0',$key);
		}
	}

	$ob_option_list = array();
	unset($ob_option_list);
	$ob_option_list = obsocialbookmarker_option_list();
	foreach ($ob_option_list as $key => $data) {
		add_option($key,'0',$key);
	}

	add_option('obsocialbookmarker_excpglstopt','','obsocialbookmarker_excpglstopt');
}

function unset_obsocialbookmarker_options(){
	$bookmark_list = array();
	$country_list = array('international','ch','fr','de','it','pl','ru','es','us');

	foreach ($country_list as $country_key => $country_data) {
		unset($bookmark_list);
		$bookmark_list = obsocialbookmarker_bookmark_list($country_data);
		foreach ($bookmark_list as $key => $data) {
			delete_option($key);
		}
	}

	
	$ob_option_list = array();
	unset($ob_option_list);
	$ob_option_list = obsocialbookmarker_option_list();
	foreach ($ob_option_list as $key => $data) {
		delete_option($key);
	}

	delete_option('obsocialbookmarker_excpglstopt');

}


function obsocialbookmarker_c($content)
{
	global $post;
	$final_content = $content;

	if (get_option('obsocialbookmarker_content_a')=='1')
		$final_content =  $final_content."\n".obsocialbookmarkerLinks();

	if (get_option('obsocialbookmarker_content_b')=='1')
		$final_content =  obsocialbookmarkerLinks()."\n".$final_content;

	if(!is_feed()){
		if (is_page()){
			if (obsocialbookmarker_exist_excpglstopt_list($post->ID)){
				return "$content\n";	
			}
		}
		return $final_content."\n";
	}else{
		return "$content\n";
	}
}


function obsocialbookmarker_e($excerpt)
{
	$final_excerpt = $excerpt;

	if (get_option('obsocialbookmarker_excerpt_a')=='1')
		$final_excerpt =  $final_excerpt."\n".obsocialbookmarkerLinks();

	if (get_option('obsocialbookmarker_excerpt_b')=='1')
		$final_excerpt =  obsocialbookmarkerLinks()."\n".$final_excerpt;

	if(!is_feed()){
		return $final_excerpt."\n";
	}else{
		return "$excerpt\n";
	}
}

function obsocialbookmarker_button()
{
	echo obsocialbookmarkerLinks();
}


if (function_exists('add_action')) {
	// Hook for adding admin menus
	add_action('admin_menu', 'obsocialbookmarker_add_pages');
	add_action('the_content', 'obsocialbookmarker_c');
	add_action('the_excerpt', 'obsocialbookmarker_e');
}

if (function_exists('register_activation_hook')) {
	register_activation_hook(__FILE__,'set_obsocialbookmarker_options');
}

if (function_exists('register_deactivation_hook')) {
	register_deactivation_hook(__FILE__, 'unset_obsocialbookmarker_options');
}
?>