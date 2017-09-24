<?php


/**
 * PrayTimes Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2014-2017, Respinar
 * @author     respinar <info@respinar.com>
 * @license    https://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://github.com/respinar/contao-praytimes
 */


/**
 * Register PSR-0 namespaces
 */
 if (class_exists('NamespaceClassLoader')) {
    NamespaceClassLoader::add('Respinar\PrayTimes', 'system/modules/praytimes/library');
}


/**
* Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_praytimes' => 'system/modules/praytimes/templates/module',
));
