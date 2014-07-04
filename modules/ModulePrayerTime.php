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


/**
 * Namespace
 */
namespace prayertime;


/**
 * Class ModulePrayerTime
 *
 * @copyright  2014
 * @author     Hamid Abbaszadeh
 * @package    Devtools
 */
class ModulePrayerTime extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_prayertime';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['prayertime'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if (TL_MODE == 'FE')
		{
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/prayertime/assets/js/clock.min.js|static';
            $GLOBALS['TL_CSS'][]        = 'system/modules/prayertime/assets/style.css';
        }


		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{

		$objPrayerTime = new \PrayerTime;

		$CalcMethod     = $this->pt_CalcMethod;
		$AsrMethod      = $this->pt_AsrMethod;
		$HighLatsMethod = $this->pt_HighLatsMethod;
		$TimeFormat     = $this->pt_TimeFormat;

		$objPrayerTime->setCalcMethod($objPrayerTime->$CalcMethod);
		$objPrayerTime->setAsrMethod($objPrayerTime->$AsrMethod);
		$objPrayerTime->setHighLatsMethod($objPrayerTime->$HighLatsMethod);
		//$objPrayerTime->setTimeFormat($objPrayerTime->$TimeFormat);


		$currenttime = date('H:i');
		$date    = time();

		$tomarrow = $today + 24*60*60;

		$times = $objPrayerTime->getPrayerTimes($date, $this->pt_latitude, $this->pt_longitude, $this->pt_timezone,deserialize($this->pt_prayertime));
		$day   = 'today';

		if (end($times) < $currenttime)
		{
			$date = $date + 24*60*60;
			$times = $objPrayerTime->getPrayerTimes($date, $this->pt_latitude, $this->pt_longitude, $this->pt_timezone,deserialize($this->pt_prayertime));
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

			if ($this->pt_DateType == 'Jalali')
			{
				$abc = \PersianDate::date($this->pt_TimeFormat,strtotime($value));
			} else {
				$abc = \Date::parse($this->pt_TimeFormat,strtotime($value));
			}
			$result[] = array('name'=>$GLOBALS['TL_LANG']['MSC'][$key],'time'=>$abc,'class'=>$key.' '.$class);
		}

		if ($this->pt_DateType == 'Jalali')
		{
			$this->Template->date = \PersianDate::date($this->pt_DateFormat,$date);
		} else {
			$this->Template->date = \Date::parse($this->pt_DateFormat,$date);
		}

		$this->Template->time  = $currenttime;
		$this->Template->day   = $day;
		$this->Template->times = $result;

	}
}
