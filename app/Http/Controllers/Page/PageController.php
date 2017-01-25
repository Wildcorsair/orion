<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
	public function getHome()
	{
		return view('pages.home');
	}
	public function getAbout()
	{
		$data = [
			'first_name' => 'Vladimir',
			'last_name'  => 'Zakharchenko'
		];

		return view('pages.about')->with('data', $data);
	}

	public function getContact()
	{
		return view('pages.contact');
	}

}
