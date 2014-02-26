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

l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

$core->addBehavior('publicHeadContent','studiopresscss3menu_publicHeadContent');

function studiopresscss3menu_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->studiopresscss3_menu;
	if (!preg_match('/^menufreshy|simplemenu|menu-no$/',$style)) {
		$style = 'simplemenu';
	}

	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
	echo '<link rel="stylesheet" type="text/css" media="projection, screen" href="'.$url."/css/menus/".$style.".css\" />\n";
	echo '<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="projection, screen" href="'.$url."/css/ie9/".$style."-ie9.css\" /><![endif]-->\n";
}

$core->addBehavior('publicHeadContent','studiopresscss3color_publicHeadContent');

function studiopresscss3color_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->studiopresscss3_color;
	if (!preg_match('/^blue|green|orange|red$/',$style)) {
		$style = 'blue';
	}

	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/colors/".$style.".css\" />\n";
	echo '<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="projection, screen" href="'.$url."/css/ie9/".$style."-ie9.css\" /><![endif]-->\n";
}

$core->addBehavior('publicHeadContent','studiopresscss3welcome_publicHeadContent');

function studiopresscss3welcome_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->studiopresscss3_welcome;
	if (!preg_match('/^welcome-yes|welcome-no$/',$style)) {
		$style = 'welcome-yes';
	}

	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/".$style.".css\" />\n";
}

$core->addBehavior('publicHeadContent','studiopresscss3topstories_publicHeadContent');

function studiopresscss3topstories_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->studiopresscss3_topstories;
	if (!preg_match('/^topstories-yes|topstories-no$/',$style)) {
		$style = 'topstories-no';
	}

	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/".$style.".css\" />\n";
}

$core->addBehavior('publicHeadContent','studiopresscss3inserttop_publicHeadContent');

function studiopresscss3inserttop_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->studiopresscss3_inserttop;
	if (!preg_match('/^insert-top-yes|insert-top-no$/',$style)) {
		$style = 'insert-top-yes';
	}

	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/".$style.".css\" />\n";
}

$core->addBehavior('publicHeadContent','studiopresscss3insertright_publicHeadContent');

function studiopresscss3insertright_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->studiopresscss3_insertright;
	if (!preg_match('/^insert-right-yes|insert-right-no$/',$style)) {
		$style = 'insert-right-yes';
	}

	$url = $core->blog->settings->themes_url.'/'.$core->blog->settings->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/inserts/".$style.".css\" />\n";
}
