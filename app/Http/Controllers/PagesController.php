<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function about()
    {
    	// 1. one parameter
    	// $name = 'Weiqi';
    	// return view('pages.about')->with('name', $name);

    	// 2. multiple parameters
    	// return view('pages.about')->with([
    	//     'first' => 'Weiqi',
    	//     'last' => 'Z'
    	// ]);

    	// 3. pasing $data
    	// $data = [];
    	// $data['first'] = 'Weiqi';
    	// $data['last'] = 'Z';
    	// return view('pages.about', $data);

    	// 4. pasing compact variables
   		$first = 'Weiqi';
    	$last = 'Zh';
    	return view('pages.about', compact('first', 'last'));    

    }

    public function contact() {
    	return view('pages.contact');
    }
}