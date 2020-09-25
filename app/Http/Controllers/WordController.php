<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use StanfordTagger\StanfordTagger;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Session;


class WordController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

//    public function parts(Request $request){
//        echo 'test'; die();
//        $tagger = Word::tagger(     );
//        $posTags = Word::getPosAbbreviations();
//        $sentence = "The dog sheds a lot";
//        $word = new Word();
//        $partsOfSpeech = $word->convertSentence($sentence);
//        return view('partsOfSpeech', ['data' =>$partsOfSpeech]);
//
//    }
}
