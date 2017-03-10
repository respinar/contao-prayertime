<?php

/**
 * praytimes Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2014-2017, Respinar
 * @author     respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://github.com/respinar/contao-praytimes
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['praytimes']   = '{title_legend},name,headline,type;
                                                               {city_legend},pt_city,pt_timezone,pt_latitude,pt_longitude;
                                                               {methods_legend},pt_CalcMethod,pt_AsrMethod,pt_HighLatsMethod;
                                                               {praytime_legend},pt_praytimes;
                                                               {options_legend},pt_TimeFormat,pt_DateFormat;
                                                               {protected_legend:hide},protected;
                                                               {expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_city'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_city'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_timezone'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_timezone'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => System::getTimeZones(),
	'eval'                    => array('chosen'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_latitude'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_latitude'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit','tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_longitude'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_longitude'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit','tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default '0'"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_CalcMethod'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_CalcMethod'],
	'default'                 => 'Tehran',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('Jafari', 'Karachi', 'ISNA','MWL','Makkah','Egypt','Custom','Tehran'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_AsrMethod'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_AsrMethod'],
	'default'                 => 'Shafii',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('Shafii', 'Hanafi'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_HighLatsMethod'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_HighLatsMethod'],
	'default'                 => 'None',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('None', 'MidNight','OneSeventh','AngleBased'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_TimeFormat'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_TimeFormat'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(16) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_DateFormat'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_DateFormat'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "varchar(128) NOT NULL default 'l d F'"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_praytimes'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_praytimes'],
	'default'                 => array('Fajr','Sunrise','Dhuhr','Sunset','Maghrib'),
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('Fajr','Sunrise','Dhuhr','Asr','Sunset','Maghrib','Isha'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
