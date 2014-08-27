<?php

Class SearchController extends BaseController {

	/**
	 * show the search results page
	 * 
	 * @param  array $data [the results of a search]
	 * @return View
	 */
	public function showResultsPage($data = [])
	{
		return View::make('search.index', $data);	
	}

	/**
	 * search the API for a specified search string
	 * 
	 * @return mixed
	 */
	public function search($page = 1)
	{
		# if the search field was typed into, use that
		if(Input::get("search")) {			
			$search = Input::get("search");

			# store this search in the session
			Session::put('lastSearchTerm', Input::get("search"));
		}
		# otherwise we're probably navigating the pagination where we don't have access
		# to the search string
		else if(Session::has('lastSearchTerm')) {

			$search = Session::get('lastSearchTerm');	
		}
		# if there's nothing to search by then we probably don't want to be here
		else {
			return Redirect::to('/');
		}

		# call the API
		$response = App::make('ApiClient')->get('search', ['q' => $search, 'page' => $page]);

		# the API call should always be successful even if it returns zero results
		if(isset($response['success']))
		{
			# grab the main data object from the response
			$data = $response['success']['data'];				
		}

		# define the route for the view
		$data['route'] = "/search";

		# ... and show the view
		return self::showResultsPage($data);		
	}
}