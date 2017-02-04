<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PageController extends Controller
{
	public function getHome()
	{
        $posts = Post::orderBy('created_at', 'DESC')->limit(4)->get();
		return view('pages.home')->withPosts($posts);
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
