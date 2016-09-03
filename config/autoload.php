<?php


/**
 * PrayTimes Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2014-2016, Respinar
 * @author     respinar <info@respinar.com>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://github.com/respinar/contao-praytimes
 */



/**
* Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Respinar/PrayTimes',
));



/**
* Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Respinar\PrayTimes\PrayTimes'       => 'system/modules/praytimes/library/Respinar/PrayTimes/PrayTimes.php',

// Modules
	'Respinar\PrayTimes\ModulePrayTimes'  => 'system/modules/praytimes/library/Respinar/PrayTimes/FrontendModule/ModulePrayTimes.php',
));



/**
* Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_praytimes' => 'system/modules/praytimes/templates/module',
));
