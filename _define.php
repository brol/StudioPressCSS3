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
if (!defined('DC_RC_PATH')) { return; }

$this->registerModule(
    'StudioPressCSS3',
    'Trois colonnes fixes avec onglets en CSS3',
    'Pierre Van Glabeke',
    '1.0',
    [
        'requires' => [['core', '2.26']],
        'type'     => 'theme',
        'tplset'   => 'mustek',
    ]
);
