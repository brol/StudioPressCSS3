<?php
/**
 * @brief StudioPressCSS3, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Theme
 *
 * @author Pierre Van Glabeke
 * @original WP theme: https://www.dailyblogtips.com/wordpress-themes
 * @copyright https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if (!defined('DC_CONTEXT_ADMIN')) { return; }

//PARAMS

# Translations
l10n::set(__DIR__ . '/locales/' . dcCore::app()->lang . '/main');

# Default values
$default_menu = 'simplemenu';
$default_color = 'blue';
$default_welcome = false;
$default_topstories = false;
$default_inserttop = false;
$default_insertright = false;

# Settings
$my_menu = dcCore::app()->blog->settings->themes->studiopresscss3_menu;
$my_color = dcCore::app()->blog->settings->themes->studiopresscss3_color;
$my_welcome = dcCore::app()->blog->settings->themes->studiopresscss3_welcome;
$my_topstories = dcCore::app()->blog->settings->themes->studiopresscss3_topstories;
$my_inserttop = dcCore::app()->blog->settings->themes->studiopresscss3_inserttop;
$my_insertright = dcCore::app()->blog->settings->themes->studiopresscss3_insertright;

# Menu type
$studiopresscss3_menu_combo = array(
	__('simpleMenu') => 'simplemenu',
	__('Menu') => 'menufreshy',
	__('none') => 'menu-no'
);

# Color scheme
$studiopresscss3_color_combo = array(
	__('blue') => 'blue',
	__('green') => 'green',
	__('orange') => 'orange',
	__('red') => 'red'
);

# Welcome
$html_filewelcome = path::real(dcCore::app()->blog->themes_path).'/'.dcCore::app()->blog->settings->system->theme.'/tpl/inc-welcome.html';

if (!is_file($html_filewelcome) && !is_writable(dirname($html_filewelcome))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_filewelcome,dirname($html_filewelcome))
	);
}

# Top stories
$html_filetopstories = path::real(dcCore::app()->blog->themes_path).'/'.dcCore::app()->blog->settings->system->theme.'/tpl/inc-topstories.html';

$topstories = dcCore::app()->blog->settings->themes->studiopresscss3_topstories;

if (!is_file($html_filetopstories) && !is_writable(dirname($html_filetopstories))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_filetopstories,dirname($html_filetopstories))
	);
}

# Insert top
$html_filetop = path::real(dcCore::app()->blog->themes_path).'/'.dcCore::app()->blog->settings->system->theme.'/tpl/inc-inserttop.html';

if (!is_file($html_filetop) && !is_writable(dirname($html_filetop))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_filetop,dirname($html_filetop))
	);
}

# Insert right
$html_fileright = path::real(dcCore::app()->blog->themes_path).'/'.dcCore::app()->blog->settings->system->theme.'/tpl/inc-insertright.html';


if (!is_file($html_fileright) && !is_writable(dirname($html_fileright))) {
	throw new Exception(
		sprintf(__('File %s does not exist and directory %s is not writable.'),
		$css_fileright,dirname($html_fileright))
	);
}

// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		dcCore::app()->blog->settings->addNamespace('themes');

		# Menu type
		if (!empty($_POST['studiopresscss3_menu']) && in_array($_POST['studiopresscss3_menu'],$studiopresscss3_menu_combo))
		{
			$my_menu = $_POST['studiopresscss3_menu'];

		} elseif (empty($_POST['studiopresscss3_menu']))
		{
			$my_menu = $default_menu;

		}
		dcCore::app()->blog->settings->themes->put('studiopresscss3_menu',$my_menu,'string','Menu to display',true);

		# Color scheme
		if (!empty($_POST['studiopresscss3_color']) && in_array($_POST['studiopresscss3_color'],$studiopresscss3_color_combo))
		{
			$my_color = $_POST['studiopresscss3_color'];


		} elseif (empty($_POST['studiopresscss3_color']))
		{
			$my_color = $default_color;

		}
		dcCore::app()->blog->settings->themes->put('studiopresscss3_color',$my_color,'string','Color display',true);

		# Welcome
		if (!empty($_POST['studiopresscss3_welcome']))
		{
			$my_welcome = $_POST['studiopresscss3_welcome'];


		} elseif (empty($_POST['studiopresscss3_welcome']))
		{
			$my_welcome = $default_welcome;

		}
		dcCore::app()->blog->settings->themes->put('studiopresscss3_welcome',$my_welcome,'boolean', 'Display Welcome',true);

		if (isset($_POST['welcome']))
		{
			@$fp = fopen($html_filewelcome,'wb');
			fwrite($fp,$_POST['welcome']);
			fclose($fp);
		}

		# Top stories
		if (!empty($_POST['studiopresscss3_topstories']))
		{
			$my_topstories = $_POST['studiopresscss3_topstories'];

		} elseif (empty($_POST['studiopresscss3_topstories']))
		{
			$my_topstories = $default_topstories;

		}
		dcCore::app()->blog->settings->themes->put('studiopresscss3_topstories',$my_topstories,'boolean', 'Display Top Stories',true);

		if (isset($_POST['topstories']))
		{
			@$fp = fopen($html_filetopstories,'wb');
			fwrite($fp,$_POST['topstories']);
			fclose($fp);
		}

		# Insert top
		if (!empty($_POST['studiopresscss3_inserttop']))
		{
			$my_inserttop = $_POST['studiopresscss3_inserttop'];

		} elseif (empty($_POST['studiopresscss3_inserttop']))
		{
			$my_inserttop = $default_inserttop;

		}
		dcCore::app()->blog->settings->themes->put('studiopresscss3_inserttop',$my_inserttop,'boolean', 'Display Insert Top',true);

		if (isset($_POST['topinsert']))
		{
			@$fp = fopen($html_filetop,'wb');
			fwrite($fp,$_POST['topinsert']);
			fclose($fp);
		}
		# Insert right
		if (!empty($_POST['studiopresscss3_insertright']))
		{
			$my_insertright = $_POST['studiopresscss3_insertright'];

		} elseif (empty($_POST['studiopresscss3_insertright']))
		{
			$my_insertright = $default_insertright;

		}
		dcCore::app()->blog->settings->themes->put('studiopresscss3_insertright',$my_insertright,'boolean', 'Display Insert Right',true);

		if (isset($_POST['rightinsert']))
		{
			@$fp = fopen($html_fileright,'wb');
			fwrite($fp,$_POST['rightinsert']);
			fclose($fp);
		}

		// Blog refresh
		dcCore::app()->blog->triggerBlog();

		// Template cache reset
		dcCore::app()->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'),true,true);
	}
	catch (Exception $e)
	{
		dcCore::app()->error->add($e->getMessage());
	}
}

$html_contentwelcome = is_file($html_filewelcome) ? file_get_contents($html_filewelcome) : '';
$html_contenttopstories = is_file($html_filetopstories) ? file_get_contents($html_filetopstories) : '';
$html_contenttop = is_file($html_filetop) ? file_get_contents($html_filetop) : '';
$html_contentright = is_file($html_fileright) ? file_get_contents($html_fileright) : '';

// DISPLAY

# Menu type
echo
'<div class="fieldset"><h4>'.__('Menu').'</h4>'.
'<p class="field"><label>'.__('Menu to display:').'</label>'.
form::combo('studiopresscss3_menu',$studiopresscss3_menu_combo,$my_menu).
'</p>'.
'<p class="info">'.__('Plugins menu allowed: Menu or simpleMenu.').'</p>'.
'</div>';

# Color scheme
echo
'<div class="fieldset"><h4>'.__('Colors').'</h4>'.
'<p class="field"><label>'.__('Color display:').'</label>'.
form::combo('studiopresscss3_color',$studiopresscss3_color_combo,$my_color).
'</p>'.
'</div>';

# Welcome
echo
'<div class="fieldset"><h4>'.__('Welcome').'</h4>'.
'<p>'.
	form::checkbox('studiopresscss3_welcome',1,$my_welcome).
	'<label class="classic" for="studiopresscss3_welcome">'.
		__('Display Welcome').
	'</label>'.
'</p>';

echo
'<p class="area"><label for="welcome">'.__('Code:').' '.
form::textarea('welcome',60,10,html::escapeHTML($html_contentwelcome)).'</label></p>'.
'</div>';

# Top stories
echo
'<div class="fieldset"><h4>'.__('Top Stories').'</h4>'.
'<p>'.
	form::checkbox('studiopresscss3_topstories',1,$my_topstories).
	'<label class="classic" for="studiopresscss3_topstories">'.
		__('Display Top Stories').
	'</label>'.
'</p>';

echo
'<p class="area"><label for="topstories">'.__('Code:').' '.
form::textarea('topstories',60,10,html::escapeHTML($html_contenttopstories)).'</label></p>'.
'<p class="info">'.__('<a href="http://plugins.dotaddict.org/dc2/details/listImages">listimages</a> Plugin required to display thumbnails in "Top Stories".').'</p>'.
'</div>';

# Insert top
echo
'<div class="fieldset"><h4>'.__('Top insert').'</h4>'.
'<p>'.
	form::checkbox('studiopresscss3_inserttop',1,$my_inserttop).
	'<label class="classic" for="studiopresscss3_inserttop">'.
		__('Display the insert').
	'</label>'.
'</p>';

echo
'<p class="area"><label for="topinsert">'.__('Code:').' '.
form::textarea('topinsert',60,10,html::escapeHTML($html_contenttop)).'</label></p>'.
'<p class="info">'.__('Dimensions of the insert (for the record): 468x60px.').'</p>'.
'</div>';

# Insert right
echo
'<div class="fieldset"><h4>'.__('Right insert').'</h4>'.
'<p>'.
	form::checkbox('studiopresscss3_insertright',1,$my_insertright).
	'<label class="classic" for="studiopresscss3_insertright">'.
		__('Display the insert').
	'</label>'.
'</p>';

echo
'<p class="area"><label for="rightinsert">'.__('Code:').' '.
form::textarea('rightinsert',60,10,html::escapeHTML($html_contentright)).'</label></p>'.
'<p class="info">'.__('Dimensions of the insert (for the record): 336x280px.').'</p>'.
'</div>';
