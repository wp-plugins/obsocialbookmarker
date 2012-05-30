<?php

/*
Plugin Name: obsocialbookmarker
Plugin URI: http://www.oraclebrains.com/wordpress-plugins/
Description: Add social book mark icons and links at the bottom of each post: bookmarks options includes del.icio.us, reddit, slashdot it, digg, facebook, technorati, google, stumble, windows live, tailrank, bloglines, furl, netscape, yahoo, blinklist, feed me links, co.mments, bloglines, bookmark.it, ask, diggita, mister wong, backflip, spurl, netvouz, diigo, dropjack, segnalo, stumbleupon, simpy, newsvine, slashdot it,wink, linkagogo, rawsugar, fark, squidoo, blogmarks, blinkbits, connotea, smarking, wists, wykop, webride, thisnext, wirefan, taggly, sphere, fleck, tagglede, linkarena, yigg, mixx, hugg, dotnetkicks, blogmemes, bluedot, dzone, friendsite, rojo, bumpzee, indianpad, rec6, linkk, domelhor, eucurti, kudos, popcurrent, kaboodle, plugim, sk*rt, shoutwire, Gabbr, i89, Linkatopia, tipd, favoriten, newskick, weblinkr, Twitter,Linked in, Bibsonomy, CiteULike, BoniTrust, Favoriten, Readster, Seoigg, Kledy.de, Newsider.
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

include "include/obsocialbookmarker_db.inc";

function obsocialbookmarker_get_version() {
	return '5.4.0';	
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

		if ($_REQUEST['obsocialbookmarker_blindseffect']=="1"){
			update_option('obsocialbookmarker_blindseffect',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_blindseffect',"0");
			$ok = true;
		}

		if ($_REQUEST['obsocialbookmarker_blindseffect_intialdown']=="1"){
			update_option('obsocialbookmarker_blindseffect_intialdown',"1");
			$ok = true;
		}else{
			update_option('obsocialbookmarker_blindseffect_intialdown',"0");
			$ok = true;
		}


		update_option('obsocialbookmarker_blindseffect_uplabel',$_REQUEST['obsocialbookmarker_blindseffect_uplabel']);
		update_option('obsocialbookmarker_blindseffect_downlabel',$_REQUEST['obsocialbookmarker_blindseffect_downlabel']);

		update_option('obsocialbookmarker_blindseffect_uplabel_style',$_REQUEST['obsocialbookmarker_blindseffect_uplabel_style']);
		update_option('obsocialbookmarker_blindseffect_downlabel_style',$_REQUEST['obsocialbookmarker_blindseffect_downlabel_style']);


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

		<BR>
		<li> 
			<label for="obsocialbookmarker_blindseffect"> 
			Enable Blind Ajax Effect
			<input name="obsocialbookmarker_blindseffect" type="checkbox" id="obsocialbookmarker_blindseffect" value="1" <?php checked('1', get_option('obsocialbookmarker_blindseffect')); ?>/> 
			</label> 
		</li>
		<li> 
			<label for="obsocialbookmarker_blindseffect_intialdown"> 
			Start with Down Effect
			<input name="obsocialbookmarker_blindseffect_intialdown" type="checkbox" id="obsocialbookmarker_blindseffect_intialdown" value="1" <?php checked('1', get_option('obsocialbookmarker_blindseffect_intialdown')); ?>/> 
			</label> 
		</li>


		
		<?php
		$obsocialbookmarker_blindseffect_uplabel = get_option('obsocialbookmarker_blindseffect_uplabel');
		$obsocialbookmarker_blindseffect_downlabel = get_option('obsocialbookmarker_blindseffect_downlabel');

		$obsocialbookmarker_blindseffect_uplabel_style = get_option('obsocialbookmarker_blindseffect_uplabel_style');
		$obsocialbookmarker_blindseffect_downlabel_style = get_option('obsocialbookmarker_blindseffect_downlabel_style');

		if (empty($obsocialbookmarker_blindseffect_uplabel)){
			$obsocialbookmarker_blindseffect_uplabel = 'Hide Bookmarks';
		}

		if (empty($obsocialbookmarker_blindseffect_downlabel)){
			$obsocialbookmarker_blindseffect_downlabel = 'Share this post';
		}
		
		if (empty($obsocialbookmarker_blindseffect_uplabel_style)){
			$obsocialbookmarker_blindseffect_uplabel_style = '';
		}

		if (empty($obsocialbookmarker_blindseffect_downlabel_style)){
			$obsocialbookmarker_blindseffect_downlabel_style = 'color:#234B7B;text-decoration:none;';
		}
		?>
		
		<li> 
			<label for="obsocialbookmarker_blindseffect_downlabel"> 
			Blind Down Label
			<input name="obsocialbookmarker_blindseffect_downlabel" type="text" id="obsocialbookmarker_blindseffect_downlabel" value="<?php echo $obsocialbookmarker_blindseffect_downlabel ?>"> 
			
			</label> 
		</li>

		<li> 
			<label for="obsocialbookmarker_blindseffect_downlabel_style"> 
			Blind Down Label Style
			<input name="obsocialbookmarker_blindseffect_downlabel_style" type="text" id="obsocialbookmarker_blindseffect_downlabel_style" value="<?php echo $obsocialbookmarker_blindseffect_downlabel_style ?>"> 
			
			</label> 
		</li>

		<li> 
			<label for="obsocialbookmarker_blindseffect_uplabel"> 
			Blind Up Label
			<input name="obsocialbookmarker_blindseffect_uplabel" type="text" id="obsocialbookmarker_blindseffect_uplabel" value="<?php echo $obsocialbookmarker_blindseffect_uplabel ?>"> 
			
			</label> 
		</li>	

		<li> 
			<label for="obsocialbookmarker_blindseffect_uplabel"> 
			Blind Up Label Style
			<input name="obsocialbookmarker_blindseffect_uplabel_style" type="text" id="obsocialbookmarker_blindseffect_uplabel_style" value="<?php echo $obsocialbookmarker_blindseffect_uplabel_style ?>"> 
			
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
					<option value="br" <?php echo ob_country_selected($ob_p_country, 'br') ?>>Brazil</option>;
					<option value="ch" <?php echo ob_country_selected($ob_p_country, 'ch') ?>>China</option>;
					<option value="fr" <?php echo ob_country_selected($ob_p_country, 'fr') ?>>France</option>;
					<option value="de" <?php echo ob_country_selected($ob_p_country, 'de') ?>>Germany</option>;
					<option value="international" <?php echo ob_country_selected($ob_p_country, 'international') ?>>International</option>;
					<option value="it" <?php echo ob_country_selected($ob_p_country, 'it') ?>>Itay</option>;
					<option value="no" <?php echo ob_country_selected($ob_p_country, 'no') ?>>Norwegian</option>;
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
					<?php echo $data['title'] ?>
					(&nbsp;<?php $obsocialbookmarker_hits = get_option($key.'_stat'); if (empty($obsocialbookmarker_hits)) echo '0'; else echo $obsocialbookmarker_hits; ?> - Clicks&nbsp;)
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
		<p class="submit"><input type="submit" name="bookmark" value="Submit" /></p>
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



function obsocialbookmarkerLinks($pos)
{
	$link = urlencode(get_permalink());
	$title = urlencode(the_title('', '', false));
	$imgurl = '"'.get_option('siteurl').'/wp-content/plugins/obsocialbookmarker/images/';
	$plugin_url = '/wp-content/plugins/obsocialbookmarker/include/obsocialbookmarker_redirect.php';
	$social_sites = obsocialbookmarker_bookmark_list('ALL');

	$bookmarker = array();
	unset($bookmarker);
	
	$l_fade = '';
	
	if (get_option('obsocialbookmarker_fadeimage') == '1'){
		$l_fade = 'style="-moz-opacity:0.5;filter:alpha(opacity=50);" onmouseover="this.style.MozOpacity=1; this.filters.alpha.opacity=100" onmouseout="this.style.MozOpacity=0.5; this.filters.alpha.opacity=50"';
	}
	
	foreach ($social_sites as $key => $data) {
		if ($data['visible'] == '1'){
			$obsocialbookmarker_link = get_option('siteurl').$plugin_url.'?site='.$key.'&amp;link='.$link.'&amp;title='.$title.'';
			if ($key == 'obsocialbookmarkerbloglines'){
				$obsocialbookmarker_link =  get_option('siteurl').$plugin_url.'?site='.$key.'&amp;link='.urldecode($link).'&amp;title='.$title.'';
			}
			$bookmarker[$key] = '<a href="'.$obsocialbookmarker_link.'" target="_blank"'.' title="'.$data['title'].'"> <img '.$l_fade.' src='.$data['img'].'/></a>';
		}
	}
	
	if (empty($bookmarker)){
		return '';
	}else{
		$obsocialbookmarker_blindseffect = get_option('obsocialbookmarker_blindseffect');
		$obsocialbookmarker_blindseffect_intialdown = get_option('obsocialbookmarker_blindseffect_intialdown');

		$obsocialbookmarker_blindseffect_uplabel = get_option('obsocialbookmarker_blindseffect_uplabel');
		$obsocialbookmarker_blindseffect_downlabel = get_option('obsocialbookmarker_blindseffect_downlabel');
		
		$obsocialbookmarker_blindseffect_uplabel_style = get_option('obsocialbookmarker_blindseffect_uplabel_style');
		$obsocialbookmarker_blindseffect_downlabel_style = get_option('obsocialbookmarker_blindseffect_downlabel_style');

		if (empty($obsocialbookmarker_blindseffect)){
			$obsocialbookmarker_blindseffect = '0';
		}

		if (empty($obsocialbookmarker_blindseffect_intialdown)){
			$obsocialbookmarker_blindseffect_intialdown = '0';
		}
		
		if (empty($obsocialbookmarker_blindseffect_uplabel)){
			$obsocialbookmarker_blindseffect_uplabel = 'Hide Bookmarks';
		}
		if (empty($obsocialbookmarker_blindseffect_downlabel)){
			$obsocialbookmarker_blindseffect_downlabel = 'Share this post';
		}
			

		if (empty($obsocialbookmarker_blindseffect_uplabel_style)){
			$obsocialbookmarker_blindseffect_uplabel_style = '';
		}
		if (empty($obsocialbookmarker_blindseffect_downlabel_style)){
			$obsocialbookmarker_blindseffect_downlabel_style = 'color:#234B7B;text-decoration:none;';
		}
			

		$temp1 = 'overflow: visible;';
		$temp2 = 'overflow: visible;';

		if ($pos == 'C' || $pos == 'D'){
			$obsocialbookmarker_blindseffect = '0';
		}

		if ($obsocialbookmarker_blindseffect == '1'){
			if ($obsocialbookmarker_blindseffect_intialdown == '1'){
				$temp1 = $temp1.' display: none;';
			}else{
				$temp2 = $temp2.' display: none;';
			}

			return '<div id="obsocialbookmark_baropen'.$pos.'" style="'.$temp1.'" ><a id="obsocialbookmark_baropenlink'.$pos.'" style="'.$obsocialbookmarker_blindseffect_downlabel_style.'" href="#" onclick="slideDown(\'obsocialbookmark_bar'.$pos.'\'); slideUp(\'obsocialbookmark_baropen'.$pos.'\'); return false;">'.$obsocialbookmarker_blindseffect_downlabel.'</a></div><br><div id="obsocialbookmark_bar'.$pos.'" style="'.$temp2.'" ><p><span>'
				. implode("\n", $bookmarker)
				. '</span></p> <a id="obsocialbookmark_barcloselink'.$pos.'" style="'.$obsocialbookmarker_blindseffect_uplabel_style.'" href="#" onclick="slideUp(\'obsocialbookmark_bar'.$pos.'\'); slideDown(\'obsocialbookmark_baropen'.$pos.'\'); return false;">'.$obsocialbookmarker_blindseffect_uplabel.'</a></div> ';
		}

		return '<div id="obsocialbookmark_bar'.$pos.'" ><p><span>'
			. implode("\n", $bookmarker)
			. '</span></p></div> ';

	}
}

function set_obsocialbookmarker_options(){
	add_option('obsocialbookmarker_excpglstopt','','obsocialbookmarker_excpglstopt');
}

function unset_obsocialbookmarker_options(){
	$bookmark_list = array();
	unset($bookmark_list);
	$bookmark_list = obsocialbookmarker_bookmark_list('ALL');
	foreach ($bookmark_list as $key => $data) {
		delete_option($key);
		delete_option($key.'_stat');					
	}

	$ob_option_list = array();
	unset($ob_option_list);
	$ob_option_list = obsocialbookmarker_option_list();
	foreach ($ob_option_list as $key => $data) {
		delete_option($key);
	}

	delete_option('obsocialbookmarker_excpglstopt');
	delete_option('obsocialbookmarker_blindseffect');
	delete_option('obsocialbookmarker_blindseffect_uplabel');
	delete_option('obsocialbookmarker_blindseffect_downlabel');
}


function obsocialbookmarker_c($content)
{
	global $post;
	$final_content = $content;

	if (get_option('obsocialbookmarker_content_a')=='1')
		$final_content =  $final_content."\n".obsocialbookmarkerLinks($post->ID);

	if (get_option('obsocialbookmarker_content_b')=='1')
		$final_content =  obsocialbookmarkerLinks($post->ID)."\n".$final_content;

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
	global $post;
	$final_excerpt = $excerpt;

	if (get_option('obsocialbookmarker_excerpt_a')=='1')
		$final_excerpt =  $final_excerpt."\n".obsocialbookmarkerLinks($post->ID);

	if (get_option('obsocialbookmarker_excerpt_b')=='1')
		$final_excerpt =  obsocialbookmarkerLinks($post->ID)."\n".$final_excerpt;

	if(!is_feed()){
		return $final_excerpt."\n";
	}else{
		return "$excerpt\n";
	}
}


function obsocialbookmarker_header()
{
	$imgurl = '"'.get_option('siteurl').'/wp-content/plugins/obsocialbookmarker/images/';
	$plugin_url = '';
	wp_enqueue_script('jquery');
	echo '<script type="text/javascript"> function slideUp(divid1) { jQuery(\'#\'+divid1).slideUp("slow"); return false; }  function slideDown(divid1) { jQuery(\'#\'+divid1).slideDown("slow"); return false; } </script>';
}


function obsocialbookmarker_button()
{
	echo obsocialbookmarkerLinks('E');
}


if (function_exists('add_action')) {
	// Hook for adding admin menus
	add_action('admin_menu', 'obsocialbookmarker_add_pages');
	add_action('the_content', 'obsocialbookmarker_c');
	add_action('the_excerpt', 'obsocialbookmarker_e');
	add_action('wp_head', 'obsocialbookmarker_header');
}

if (function_exists('register_activation_hook')) {
	register_activation_hook(__FILE__,'set_obsocialbookmarker_options');
}

if (function_exists('register_deactivation_hook')) {
	register_deactivation_hook(__FILE__, 'unset_obsocialbookmarker_options');
}
?>