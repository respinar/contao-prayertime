<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   prayertime
 * @author    Hamid Abbaszadeh
 * @license   GNU/LGPL
 * @copyright 2014
 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['prayertime']   = '{title_legend},name,headline,type;
                                                               {city_legend},pt_city,pt_timezone,pt_latitude,pt_longitude;
                                                               {methods_legend},pt_CalcMethod,pt_AsrMethod,pt_HighLatsMethod;
                                                               {prayer_legend},pt_prayertime;
                                                               {options_legend},pt_DateType,pt_TimeFormat,pt_DateFormat;
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
	'inputType'               => 'text',
	'eval'                    => array('rgxp'=>'digit','tl_class'=>'w50'),
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
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_DateType'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_DateType'],
	'default'                 => 'Jalali',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('Jalali', 'Julian'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'eval'                    => array(),
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
$GLOBALS['TL_DCA']['tl_module']['fields']['pt_prayertime'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['pt_prayertime'],
	'default'                 => array('Fajr','Sunrise','Dhuhr','Sunset','Maghrib'),
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('Fajr','Sunrise','Dhuhr','Asr','Sunset','Maghrib','Isha'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
