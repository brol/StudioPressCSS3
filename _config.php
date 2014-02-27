<?php
# ***** BEGIN LICENSE BLOCK *****
#
#  	StudioPressCSS3
#  	Theme by Pierre Van Glabeke
#   original WP theme: http://www.dailyblogtips.com/wordpress-themes
#   License : http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_CONTEXT_ADMIN')) { return; }

// chargement de la traduction
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

// affichage du type de menu
$studiopresscss3_menus = array(
	__('simpleMenu') => 'simplemenu',
	__('menuFreshy or menu (Adjaya)') => 'menufreshy',
	__('none') => 'menu-no'
);

if (!$core->blog->settings->themes->studiopresscss3_menu) {
	$core->blog->settings->themes->studiopresscss3_menu = 'simplemenu';
}

if (!empty($_POST['studiopresscss3_menu']) && in_array($_POST['studiopresscss3_menu'],$studiopresscss3_menus))
{
	$core->blog->settings->themes->studiopresscss3_menu = $_POST['studiopresscss3_menu'];
	$core->blog->settings->addNamespace('themes');
	$core->blog->settings->themes->put('studiopresscss3_menu',$core->blog->settings->themes->studiopresscss3_menu,'string','Menu to display',true);
	$core->blog->triggerBlog();

	dcPage::success(__('Theme configuration has been successfully updated.'));
}

echo
'<div class="fieldset"><h4>'.__('Customizations').'</h4>'.
'<p class="info">'.__('Plugins menu allowed: menuFreshy (or the <a href="http://aiguebrun.adjaya.info/post/20090202/Telegarger-le-Plugin-Menu-pour-Dotclear2-Download">Adjaya menu</a> plugin), or simpleMenu.').'</p>'.
'<p class="field"><label>'.__('Menu to display:').'</label>'.
form::combo('studiopresscss3_menu',$studiopresscss3_menus,$core->blog->settings->themes->studiopresscss3_menu).
'</p>';

#choix couleur
$studiopresscss3_colors = array(
	__('blue') => 'blue',
	__('green') => 'green',
	__('orange') => 'orange',
	__('red') => 'red'
);

if (!$core->blog->settings->themes->studiopresscss3_color) {
	$core->blog->settings->themes->studiopresscss3_color = 'blue';
}

if (!empty($_POST['studiopresscss3_color']) && in_array($_POST['studiopresscss3_color'],$studiopresscss3_colors))
{
	$core->blog->settings->themes->studiopresscss3_color = $_POST['studiopresscss3_color'];
	$core->blog->settings->addNamespace('themes');
	$core->blog->settings->themes->put('studiopresscss3_color',$core->blog->settings->themes->studiopresscss3_color,'string','Color display',true);
	$core->blog->triggerBlog();
}

echo
'<p class="field"><label>'.__('Color display:').'</label>'.
form::combo('studiopresscss3_color',$studiopresscss3_colors,$core->blog->settings->themes->studiopresscss3_color).
'</p>';

#afficher welcome
$welcome = $core->blog->settings->themes->studiopresscss3_welcome;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('studiopresscss3_welcome',
			!empty($_POST['studiopresscss3_welcome']),
			'boolean', 'Display Welcome');

	# update setting
	$welcome = (!empty($_POST['studiopresscss3_welcome']));

	$core->blog->triggerBlog();
}

echo '<p>'.
	form::checkbox('studiopresscss3_welcome',1,$welcome).
	'<label class="classic" for="studiopresscss3_welcome">'.
		__('Display Welcome').
	'</label>'.
'</p>';

#insert welcome
$html_filewelcome = path::real($core->blog->themes_path).'/'.$core->blog->settings->system->theme.'/tpl/inc-welcome.html';

if (!is_file($html_filewelcome) && !is_writable(dirname($html_filewelcome))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_filewelcome,dirname($html_filewelcome))
	);
}

if (isset($_POST['welcome']))
{
	@$fp = fopen($html_filewelcome,'wb');
	fwrite($fp,$_POST['welcome']);
	fclose($fp);
}

$html_contentwelcome = is_file($html_filewelcome) ? file_get_contents($html_filewelcome) : '';

echo
'<p class="area"><label for="welcome">'.__('Welcome text:').' '.
form::textarea('welcome',60,10,html::escapeHTML($html_contentwelcome)).'</label></p>';

#afficher topstories
$topstories = $core->blog->settings->themes->studiopresscss3_topstories;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('studiopresscss3_topstories',
			!empty($_POST['studiopresscss3_topstories']),
			'boolean', 'Display Top Stories');

	# update setting
	$topstories = (!empty($_POST['studiopresscss3_topstories']));

	$core->blog->triggerBlog();
}

echo '<p class="info">'.__('<a href="http://plugins.dotaddict.org/dc2/details/listImages">listimages</a> Plugin required to display thumbnails in "Top Stories".').'</p>'.
'<p>'.
	form::checkbox('studiopresscss3_topstories',1,$topstories).
	'<label class="classic" for="studiopresscss3_topstories">'.
		__('Display Top Stories').
	'</label>'.
'</p>';

#insert topstories
$html_filetopstories = path::real($core->blog->themes_path).'/'.$core->blog->settings->system->theme.'/tpl/inc-topstories.html';

if (!is_file($html_filetopstories) && !is_writable(dirname($html_filetopstories))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_filetopstories,dirname($html_filetopstories))
	);
}

if (isset($_POST['topstories']))
{
	@$fp = fopen($html_filetopstories,'wb');
	fwrite($fp,$_POST['topstories']);
	fclose($fp);
}

$html_contenttopstories = is_file($html_filetopstories) ? file_get_contents($html_filetopstories) : '';

echo
'<p class="area"><label for="topstories">'.__('Top Stories:').' '.
form::textarea('topstories',60,10,html::escapeHTML($html_contenttopstories)).'</label></p>';

#afficher inserttop
$inserttop = $core->blog->settings->themes->studiopresscss3_inserttop;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('studiopresscss3_inserttop',
			!empty($_POST['studiopresscss3_inserttop']),
			'boolean', 'Display Insert Top');

	# update setting
	$inserttop = (!empty($_POST['studiopresscss3_inserttop']));

	$core->blog->triggerBlog();
}

echo '<p class="info">'.__('Dimensions of inserts (for the record): top insert: 468x60px - right insert: 336x280px.').'</p>'.
'<p>'.
	form::checkbox('studiopresscss3_inserttop',1,$inserttop).
	'<label class="classic" for="studiopresscss3_inserttop">'.
		__('Display Insert Top').
	'</label>'.
'</p>';

#top insert
$html_filetop = path::real($core->blog->themes_path).'/'.$core->blog->settings->system->theme.'/tpl/inc-inserttop.html';

if (!is_file($html_filetop) && !is_writable(dirname($html_filetop))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_filetop,dirname($html_filetop))
	);
}

if (isset($_POST['topinsert']))
{
	@$fp = fopen($html_filetop,'wb');
	fwrite($fp,$_POST['topinsert']);
	fclose($fp);
}

$html_contenttop = is_file($html_filetop) ? file_get_contents($html_filetop) : '';

echo
'<p class="area"><label for="topinsert">'.__('Top insert:').' '.
form::textarea('topinsert',60,10,html::escapeHTML($html_contenttop)).'</label></p>';

#afficher insertright
$insertright = $core->blog->settings->themes->studiopresscss3_insertright;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('studiopresscss3_insertright',
			!empty($_POST['studiopresscss3_insertright']),
			'boolean', 'Display Insert Right');

	# update setting
	$insertright = (!empty($_POST['studiopresscss3_insertright']));

	$core->blog->triggerBlog();
}

echo '<p>'.
	form::checkbox('studiopresscss3_insertright',1,$insertright).
	'<label class="classic" for="studiopresscss3_insertright">'.
		__('Display Insert Right').
	'</label>'.
'</p>';

#right insert
$html_fileright = path::real($core->blog->themes_path).'/'.$core->blog->settings->system->theme.'/tpl/inc-insertright.html';

if (!is_file($html_fileright) && !is_writable(dirname($html_fileright))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_fileright,dirname($html_fileright))
	);
}

if (isset($_POST['rightinsert']))
{
	@$fp = fopen($html_fileright,'wb');
	fwrite($fp,$_POST['rightinsert']);
	fclose($fp);
}

$html_contentright = is_file($html_fileright) ? file_get_contents($html_fileright) : '';

echo
'<p class="area"><label for="rightinsert">'.__('Right insert:').' '.
form::textarea('rightinsert',60,10,html::escapeHTML($html_contentright)).'</label></p>'.
'<p class="warn">'.__('Small bug: during the first recording customizations, please click on the save button twice.').'</p>'.
'</div>';
