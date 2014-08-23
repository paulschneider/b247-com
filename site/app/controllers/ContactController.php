<?php

Class ContactController extends BaseController {

	public function showContactForm()
	{
		return View::make('contact.index');
	}

}