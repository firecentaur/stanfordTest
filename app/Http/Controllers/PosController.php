<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Word;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PosController extends Controller
{


    public function getParts(Request $request)
    {

        $sentence = "The dog sheds a lot";
        $word = new Word();
        $partsOfSpeech = $word->convertSentence($sentence);


        $template = View::make('parts', ['posTags' => $partsOfSpeech]);
        return $template->render();

    }
    public function phpInfo(Request $request)
    {

        phpinfo();

    }

}
