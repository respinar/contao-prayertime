<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Prayertime
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'prayertime',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'prayertime\PrayerTime'       => 'system/modules/prayertime/classes/PrayerTime.php',

	// Modules
	'prayertime\ModulePrayerTime' => 'system/modules/prayertime/modules/ModulePrayerTime.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_prayertime' => 'system/modules/prayertime/templates/module',
));
