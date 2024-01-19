<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function crawler()
    {
         $baseurl = "https://quotes.toscrape.com/page/";
         $output = [];
         
         $client = new Client();
         $pagenb = 1;
         $isDone = false;
         while (!$isDone) {
             $url = "";
             $url =  $baseurl . $pagenb;
 
             $crawler = $client->request('GET', $url);
             $page = $crawler->filter('div.quote')->each(function ($node){
                 $tags = "";
             
                 $citation = $node->filter('span.text')->text();
                 $author = $node->filter('small.author')->text();
                 $tags = implode(", ",$node->filter('a.tag')->each(function ($tags){
                     return $tags->filter('a')->text();
                 }));
                 $out = ["citation"=>$citation,"author"=>$author,"tags"=>$tags];
     
                 return $out;
             });
             if(empty($page))$isDone=true;
             $pagenb++;
             $output = [...$output,...$page];
         }
         $output = array_filter($output);

         return view('crawler', ['data' => $output]);
    }

    public function scrapeAndCreateDataFrame()
    {
        $baseurl = "https://quotes.toscrape.com/page/";
        $output = [];
        
        $client = new Client();
        $pagenb = 1;
        $isDone = false;
        while (!$isDone) {
            $url = "";
            $url =  $baseurl . $pagenb;

            $crawler = $client->request('GET', $url);
            $page = $crawler->filter('div.quote')->each(function ($node){
            
                $citation[] = $node->filter('span.text')->text();
                $author[] = $node->filter('small.author')->text();
                $tags = $node->filter('a.tag')->each(function ($tags){
                    return $tags->filter('a')->text();
                });
                $out = ["citation"=>$citation,"author"=>$author,"tags"=>$tags];
    
                return $out;
            });
            if(empty($page))$isDone=true;
            $pagenb++;
            $output = array_merge_recursive($output,...$page);
        }
        $output = array_filter($output);
        foreach ($output as $key => $value) {
            array_unique($output[$key]);
        }
        dd($output);
    }
}
