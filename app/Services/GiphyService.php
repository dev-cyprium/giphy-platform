<?php
namespace App\Services;

class GiphyService 
{
  private const APIKEY  = "OpmBrRM0QARKnRKKnuZGa2DTvN2EKam5";
  private const URLBASE = "https://api.giphy.com/v1/gifs/";
  private const LIMIT   = 5;

  private $client;

  public function __construct()
  {
    $this->client = new \GuzzleHttp\Client();
  }

  public function search(string $term)
  {
    $payload = [
      "api_key" => self::APIKEY,
      "q" => $term,
      "limit" => self::LIMIT,
      "offset" => 0,
      "rating" => "G",
      "lang" => "en"
    ];

    $url = $this->encodeParams($payload);
    $response = $this->client->request('GET', $url);
    return $this->validate($response);
  }

  private function clean($rawData)
  {
    $data = json_decode($rawData, true);
    return array_map(function($elem) {
      return $elem["images"]["downsized"];
    }, $data["data"]);
  }

  private function validate($response)
  {
    $status = $response->getStatusCode();
    if($status >= 200 && $status < 300) {
      return $this->clean($response->getBody());
    }
    throw GuzzleHttp\Exception();
  }


  private function encodeParams(array $payload) : string
  {
    $buffer = [];
    foreach($payload as $param => $val) {
      $buffer[] = "$param=$val";
    }
    $buffer = implode("&", $buffer);
    return self::URLBASE . "search?$buffer";
  }
}