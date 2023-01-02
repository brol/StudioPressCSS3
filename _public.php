<?php
# ***** BEGIN LICENSE BLOCK *****
#
#  	StudioPressCSS3
#  	Theme by Pierre Van Glabeke
#   original WP theme: http://www.dailyblogtips.com/wordpress-themes
#   License : http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_RC_PATH')) { return; }

l10n::set(dirname(__FILE__) . '/locales/' . dcCore::app()->lang. '/public');

# appel css menu
dcCore::app()->addBehavior('publicHeadContent','studiopresscss3menu_publicHeadContent');

function studiopresscss3menu_publicHeadContent()
{
	$style = dcCore::app()->blog->settings->themes->studiopresscss3_menu;
	if (!preg_match('/^menufreshy|simplemenu|menu-no$/',$style)) {
		$style = 'simplemenu';
	}

	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/menus/".$style.".css\" />\n";
	echo '<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/ie9/".$style."-ie9.css\" /><![endif]-->\n";
}

# appel css couleur
dcCore::app()->addBehavior('publicHeadContent','studiopresscss3color_publicHeadContent');

function studiopresscss3color_publicHeadContent()
{
	$style = dcCore::app()->blog->settings->themes->studiopresscss3_color;
	if (!preg_match('/^blue|green|orange|red$/',$style)) {
		$style = 'blue';
	}

	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/colors/".$style.".css\" />\n";
	echo '<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/ie9/".$style."-ie9.css\" /><![endif]-->\n";
}

# appel css welcome
if (dcCore::app()->blog->settings->themes->studiopresscss3_welcome)
{
	dcCore::app()->addBehavior('publicHeadContent',
		array('tplStudiopresscss3_welcome','publicHeadContent'));
}

class tplStudiopresscss3_welcome
{
	public static function publicHeadContent()
	{
	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/welcome.css\" />\n";
	}
}

# appel css topstories
if (dcCore::app()->blog->settings->themes->studiopresscss3_topstories)
{
	dcCore::app()->addBehavior('publicHeadContent',
		array('tplStudiopresscss3_topstories','publicHeadContent'));
}

class tplStudiopresscss3_topstories
{
	public static function publicHeadContent()
	{
	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/topstories.css\" />\n";
	}
}

# appel css inserttop
if (dcCore::app()->blog->settings->themes->studiopresscss3_inserttop)
{
	dcCore::app()->addBehavior('publicHeadContent',
		array('tplStudiopresscss3_inserttop','publicHeadContent'));
}

class tplStudiopresscss3_inserttop
{
	public static function publicHeadContent()
	{
	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/inserttop.css\" />\n";
	}
}

# appel css insertright
if (dcCore::app()->blog->settings->themes->studiopresscss3_insertright)
{
	dcCore::app()->addBehavior('publicHeadContent',
		array('tplStudiopresscss3_insertright','publicHeadContent'));
}

class tplStudiopresscss3_insertright
{
	public static function publicHeadContent()
	{
	$url = dcCore::app()->blog->settings->system->themes_url.'/'.dcCore::app()->blog->settings->system->theme;
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/insertright.css\" />\n";
	}
}
