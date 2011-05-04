<?php /***************** vi: set fenc=utf-8 ts=4 sw=4 et: ******************
 *
 *   Copyright : (C) 2011 Nicolas Grekas. All rights reserved.
 *   Email     : p@tchwork.org
 *   License   : http://www.gnu.org/licenses/agpl.txt GNU/AGPL
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as
 *   published by the Free Software Foundation, either version 3 of the
 *   License, or (at your option) any later version.
 *
 ***************************************************************************/


class jquery
{
    protected static

    $uiLoad = '',
    $uiTheme = 'base',

    $uiDependency = array(
        'ui.accordion'      => 'ui.core ui.widget',
        'ui.autocomplete'   => 'ui.core ui.widget ui.position',
        'ui.button'         => 'ui.core ui.widget',
        'ui.core'           => '',
        'ui.datepicker'     => 'ui.core',
        'ui.dialog'         => 'ui.core ui.widget ui.button ui.draggable ui.mouse ui.position ui.resizable',
        'ui.draggable'      => 'ui.core ui.mouse ui.widget',
        'ui.droppable'      => 'ui.core ui.mouse ui.widget ui.draggable',
        'ui.mouse'          => 'ui.widget',
        'ui.position'       => '',
        'ui.progressbar'    => 'ui.core ui.widget',
        'ui.resizable'      => 'ui.core ui.mouse ui.widget',
        'ui.selectable'     => 'ui.core ui.mouse ui.widget',
        'ui.slider'         => 'ui.core ui.mouse ui.widget',
        'ui.sortable'       => 'ui.core ui.mouse ui.widget',
        'ui.tabs'           => 'ui.core ui.widget',
        'ui.widget'         => '',

        'effects.core'      => '',
        'effects.blind'     => 'effects.core',
        'effects.bounce'    => 'effects.core',
        'effects.clip'      => 'effects.core',
        'effects.drop'      => 'effects.core',
        'effects.explode'   => 'effects.core',
        'effects.fade'      => 'effects.core',
        'effects.fold'      => 'effects.core',
        'effects.highlight' => 'effects.core',
        'effects.pulsate'   => 'effects.core',
        'effects.scale'     => 'effects.core',
        'effects.shake'     => 'effects.core',
        'effects.slide'     => 'effects.core',
        'effects.transfer'  => 'effects.core',
    ),

    // Default lang is en-US
    $langAvail = 'af ar-DZ ar az bg bs ca cs da de el en-AU en-GB en-NZ eo es et eu fa fi fo fr-CH fr gl he hr hu hy id is it ja ko kz lt lv ml ms nl no pl pt pt-BR rm ro ru sk sl sq sr sr-SR sv ta th tj tr uk vi zh-CN zh-HK zh-TW',
    $langMap   = array(
        'zh' => 'zh-CN',
    );

    static function compose($o)
    {
        $o->jquery_ui_theme = self::$uiTheme;

        $uiLoad = trim(self::$uiLoad);

        if ('' !== $uiLoad)
        {
            $uiLoad = explode(' ', $uiLoad);

            while (list(,$v) = each($uiLoad))
            {
                $o->{strtr($v, '.', '_')} = 1;

                if (isset(self::$uiDependency[$v]))
                {
                    $v = self::$uiDependency[$v];
                    foreach (explode(' ', $v) as $v) $v && $uiLoad[] = $v;
                }
            }
        }

        if (!empty($o->ui_datepicker))
        {
            $lang = Patchwork::__LANG__();

            if (isset(self::$langMap[$lang]))
            {
                $lang = self::$langMap[$lang];
            }
            else if (!in_array($lang, explode(' ', self::$langAvail)))
            {
                $lang = substr($lang, 0, 2);

                if (!in_array($lang, explode(' ', self::$langAvail))) $lang = '';
            }

            $lang && $o->ui_datepicker_lang = $lang;
        }

        return $o;
    }
}
