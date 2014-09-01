<?php

Class PagesController extends BaseController {
	
	/**
	 * show the 'download the app' page
	 * 
	 * @return View
	 */
	public function appDownload()
	{
		return View::make("statics/download-the-app");
	}

	/**
	 * show the about us page
	 * 
	 * @return View
	 */
	public function aboutUs()
	{
		return View::make("statics/about-us");	
	}

	/**
	 * show the advertise page
	 * 
	 * @return View
	 */
	public function advertise()
	{
		return View::make("statics/advertise");	
	}

	/**
	 * show the T&C page
	 * 
	 * @return View
	 */
	public function terms()
	{
		return View::make("statics/terms");	
	}

	/**
	 * show the privacy policy page
	 * 
	 * @return View
	 */
	public function privacy()
	{
		return View::make("statics/privacy");	
	}
}