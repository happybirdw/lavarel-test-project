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

    public function illustre() {
        $html = '<figure class="image" style="width:500px; height:489px;"><img alt="patisserie-texte.jpg" src="http://www.illustre.ch/sites/default/files/patisserie-texte.jpg" style="width:500px; height:489px; "><br><figcaption>La création des Suisses: un vampire surmontant une croix faisant face à un loup-garou. Le tout en sucre, chocolat et glace. Splendide! Photo: Facebook</figcaption><br></figure>';
        $html_page = file_get_contents('http://www.illustre.ch/news/la-suisse-medaillee-de-bronze-en-patisserie');
        $html = preg_replace('/(src=")(\/sites.+")/i', '$1http://www.illustre.ch$2', $html_page);
        $html = $this->removeImgStyleAttribute($html);
    	return view('pages.illustre')->with([
            'html' => $html,
        ]);
    }

    public function removeImgStyleAttribute($html){ 
        return preg_replace('/(<img[^>]+) style=".*?"/i', '$1', $html);
    } 
}