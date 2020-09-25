<?php

namespace App\Models;

use App\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StanfordTagger\StanfordTagger;

class Word extends Model
{
    use HasFactory;
    protected $tagger;
    protected $posTags;
    static public function tagger(){
        $tagger = new \StanfordTagger\POSTagger();
        $tagger->setOutputFormat(StanfordTagger::OUTPUT_FORMAT_XML);
        $baseDir = __DIR__.'/../';
        $tagger->setModel($baseDir.'extensions/StanfordTagger/models/english-bidirectional-distsim.tagger');

        $tagger->setJarArchive($baseDir.'extensions/StanfordTagger/stanford-postagger-4.1.0.jar');
        return $tagger;

    }
    static public function getPosAbbreviations(){
        return ["CC" => "Coordinating conjunction",
            "CD" => "Cardinal number",
            "DT" => "Determiner",
            "EX" => "Existential there",
            "FW" => "Foreign word",
            "IN" => "Preposition or subordinating conjunction",
            "JJ" => "Adjective",
            "JJR" => "Adjective, comparative",
            "JJS" => "Adjective, superlative",
            "LS" => "List item marker",
            "MD" => "Modal",
            "NN" => "Noun, singular or mass",
            "NNS" => "Noun, plural",
            "NNP" => "Proper noun, singular",
            "NNPS" => "Proper noun, plural",
            "PDT" => "Predeterminer",
            "POS" => "Possessive ending",
            "PRP" => "Personal pronoun",
            "PRP$" => "Possessive pronoun",
            "RB" => "Adverb",
            "RBR" => "Adverb, comparative",
            "RBS" => "Adverb, superlative",
            "RP" => "Particle",
            "SYM" => "Symbol",
            "TO" => "to",
            "UH" => "Interjection",
            "VB" => "Verb, base form",
            "VBD" => "Verb, past tense",
            "VBG" => "Verb, gerund or present participle",
            "VBN" => "Verb, past participle",
            "VBP" => "Verb, non-3rd person singular present",
            "VBZ" => "Verb, 3rd person singular present",
            "WDT" => "Wh-determiner",
            "WP" => "Wh-pronoun",
            "WP$" => "Possessive wh-pronoun",
            "WRB" => "Wh-adverb"];

    }
    public function getTagger(){
        if (!$this->tagger){
            $this->tagger = Word::tagger();
        }
        return $this->tagger;
    }
    public function parseTags($phrase)
    {
        if (!$this->tagger){
            $this->tagger = Word::tagger();
        }
        $xml = $this->tagger->tag($phrase);
        $p = xml_parser_create();
        xml_parse_into_struct($p, $xml, $vals, $index);
        xml_parser_free($p);
        return $vals;

    }
    public function getPosTags(){
        if (!$this->posTags){
            $this->posTags = Word::getPosAbbreviations();
        }
        return $this->posTags;

    }
    /**
     * returns readble version of the pos tag
     * @param $abbr
     * @return string
     */
    public function convertAbbreviation($abbr)
    {
        if ($this->posTags===null){
            $this->posTags = $this->getPosTags();
        }

        if (isset($this->posTags[$abbr])){
            return $this->posTags[$abbr];
        }else{
            return false;
        }


    }
    public function convertSentence($sentence){
        $posData = $this->parseTags($sentence);
        $rows = [];


        foreach ($posData as $xmlData) {
            if ($xmlData['tag'] === 'WORD') {

                $word = $xmlData['value'];
                $abbr = $xmlData['attributes']['POS'];
                $rows[] = [$word, $this->convertAbbreviation($abbr), $abbr];
            }
        }
        return $rows;

    }

}
