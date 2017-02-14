<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Session;
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

	public function postContact(Request $request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        $data = [
            'email'   => $request->email,
            'subject' => $request->subject,
            'body'    => $request->message
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('hello@orion.dev');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent successfully!');

        return redirect()->route('contactPage');
    }

}
