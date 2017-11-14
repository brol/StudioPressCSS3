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

$this->registerModule(
	/* Name */			    "StudioPressCSS3",
	/* Description*/		"Trois colonnes fixes avec onglets en CSS3",
	/* Author */			  "Pierre Van Glabeke",
	/* Version */			  '0.7',
	array(
		'type'	 =>	'theme',
		'tplset' => 'mustek',
		'dc_min' => '2.9'
	)
);