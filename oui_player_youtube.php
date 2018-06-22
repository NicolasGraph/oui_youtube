<?php

/*
 * This file is part of oui_player_youtube,
 * a oui_player v2+ extension to easily embed
 * YouTube customizable video players in Textpattern CMS.
 *
 * https://github.com/NicolasGraph/oui_player_youtube
 *
 * Copyright (C) 2018 Nicolas Morand
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA..
 */

/**
 * Youtube
 *
 * @package Oui\Player
 */

namespace Oui\Player {

    if (class_exists('Oui\Player\Provider')) {

        class Youtube extends Provider
        {
            protected static $patterns = array(
                'video' => array(
                    'scheme' => '#^(http|https)://(www\.)?(youtube\.com/(watch\?v=|embed/|v/)|youtu\.be/)(([^&?/]+)?)#i',
                    'id'     => '5',
                    'glue'   => '&amp;',
                ),
                'list'  => array(
                    'scheme' => '#^(http|https)://(www\.)?(youtube\.com/(watch\?v=|embed/|v/)|youtu\.be/)[\S]+list=([^&?/]+)?#i',
                    'id'     => '5',
                    'prefix' => 'list=',
                ),
            );
            protected static $src = '//www.youtube-nocookie.com/';
            protected static $glue = array('embed/', '?', '&amp;');
            protected static $params = array(
                'autohide'       => array(
                    'default' => '2',
                    'valid'   => array('0', '1', '2'),
                ),
                'autoplay'       => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'cc_load_policy' => array(
                    'default' => '1',
                    'valid'   => array('0', '1'),
                ),
                'color'          => array(
                    'default' => 'red',
                    'valid'   => array('red', 'white'),
                ),
                'controls'       => array(
                    'default' => '1',
                    'valid'   => array('0', '1', '2'),
                ),
                'disablekb'      => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'enablejsapi'    => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'end'            => array(
                    'default' => '',
                    'valid'   => 'number',
                ),
                'fs'             => array(
                    'default' => '1',
                    'valid'   => array('0', '1'),
                ),
                'hl'             => array(
                    'default' => '',
                ),
                'iv_load_policy' => array(
                    'default' => '1',
                    'valid'   => array('1', '3'),
                ),
                'listType'           => array(
                    'default' => '',
                    'valid'   => array('playlist', 'search', 'user_uploads'),
                ),
                'loop'           => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'modestbranding' => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'origin'    => array(
                    'default' => '',
                    'valid'   => 'url',
                ),
                'playlist'    => array(
                    'default' => '',
                ),
                'playsinline'    => array(
                    'default' => '0',
                    'valid'   => array('0', '1'),
                ),
                'rel'            => array(
                    'default' => '1',
                    'valid'   => array('0', '1'),
                ),
                'start'          => array(
                    'default' => '0',
                    'valid'   => 'number',
                ),
                'showinfo'       => array(
                    'default' => '1',
                    'valid'   => array('0', '1'),
                ),
                'theme'          => array(
                    'default' => 'dark',
                    'valid'   => array('dark', 'light'),
                ),
            );

            protected function resetGlue($play)
            {
                self::setGlue(0, $this->infos[$play]['type'] === 'list' ? 'embed?' : 'embed/');
            }
        }
    }
}

namespace {
    function oui_youtube($atts) {
        return oui_player(array_merge(array('provider' => 'youtube'), $atts));
    }

    function oui_if_youtube($atts, $thing) {
        return oui_if_player(array_merge(array('provider' => 'youtube'), $atts), $thing);
    }
}
