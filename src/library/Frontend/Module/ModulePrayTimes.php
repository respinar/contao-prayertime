<?php

/**
 * praytimes Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2014-2016, Respinar
 * @author     respinar <info@respinar.com>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       https://github.com/respinar/contao-praytimes
 */


/**
 * Namespace
 */
namespace Respinar\PrayTimes\Frontend\Module;

use DateTime,DateTimeZone;
use Respinar\PrayTimes;



/**
 * Class ModulePrayTimes
 *
 * @copyright  2014
 * @author     Hamid Abbaszadeh
 * @package    Devtools
 */
class ModulePrayTimes extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_praytimes';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['praytimes'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if (TL_MODE == 'FE')
		{

            $GLOBALS['TL_CSS'][]        = 'system/modules/praytimes/assets/praytimes.min.css|static';
        }


		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{

		$objPrayTimes = new \Respinar\PrayTimes\PrayTimes;

		$CalcMethod     = $this->pt_CalcMethod;
		$AsrMethod      = $this->pt_AsrMethod;
		$HighLatsMethod = $this->pt_HighLatsMethod;
		$TimeFormat     = $this->pt_TimeFormat;

		$objPrayTimes->setCalcMethod($objPrayTimes->$CalcMethod);
		$objPrayTimes->setAsrMethod($objPrayTimes->$AsrMethod);
		$objPrayTimes->setHighLatsMethod($objPrayTimes->$HighLatsMethod);
		//$objPrayTimes->setTimeFormat($objPrayTimes->$TimeFormat);


		$this_tz = new DateTimeZone($this->pt_timezone);
		$now = new DateTime("now", $this_tz);
		$timeZone = $this_tz->getOffset($now) / 3600;

		$currenttime = date('H:i');
		$date    = time();		

		$times = $objPrayTimes->getPrayerTimes($date, $this->pt_latitude, $this->pt_longitude, $timeZone,deserialize($this->pt_praytimes));
		$day   = 'today';

		if (end($times) < $currenttime)
		{
			$date = $date + 24*60*60;
			$times = $objPrayTimes->getPrayerTimes($date, $this->pt_latitude, $this->pt_longitude, $timeZone,deserialize($this->pt_praytimes));
			$day = 'tomarrow';
		}

		$result = array();
		foreach ($times as $key => $value)
		{

			if ($day == 'today')
				if ($value < $currenttime)
				{
					$class = "past";
				} else if ($class=="past") {
					$class ="next";
				} else {
					$class = "upcoming";
				}
			else
				$class="upcoming";

			$abc = \Date::parse($this->pt_TimeFormat,strtotime($value));
			
			$result[] = array('name'=>$GLOBALS['TL_LANG']['MSC'][$key],'time'=>$abc,'class'=>$key.' '.$class);
		}

		$this->Template->date = \Date::parse($this->pt_DateFormat,$date);

		$this->Template->time  = $currenttime;
		$this->Template->day   = $day;
		$this->Template->times = $result;

	}
}
