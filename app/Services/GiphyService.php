<?php
namespace App\Services;

class GiphyService 
{
  private const APIKEY  = "OpmBrRM0QARKnRKKnuZGa2DTvN2EKam5";
  private const URLBASE = "https://api.giphy.com/v1/gifs/";
  private const LIMIT   = 10;

  private $client;

  public function __construct()
  {
    $this->client = new \GuzzleHttp\Client();
  }

  public function getByID($id) 
  {
    $payload = [
      "api_key" => self::APIKEY
    ];

    $url = $this->encodeParams($payload, "$id");
    $response = $this->client->request('GET', $url);
    $body = $this->validate($response);
    return $this->clean_id($body);
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

    $url = $this->encodeParams($payload, "search");
    $response = $this->client->request('GET', $url);
    $body = $this->validate($response);
    return $this->clean_search($body);
  }

  private function clean_search($rawData)
  {
    $data = json_decode($rawData, true);
    return array_map(function($elem) {
      return [
        "image" => $elem["images"]["downsized"],
        "title"  => $elem["title"],
        "id"    => $elem["id"]
      ];
    }, $data["data"]);
  }

  private function clean_id($rawData)
  {
    $data = json_decode($rawData, true);
    return [
      "image" => $data["data"]["images"]["downsized"],
      "title"  => $data["data"]["title"],
      "id"    => $data["data"]["id"]
    ];
  }

  private function validate($response)
  {
    $status = $response->getStatusCode();
    if($status >= 200 && $status < 300) {
      return $response->getBody();
    }
    throw GuzzleHttp\Exception();
  }


  private function encodeParams(array $payload, $suffix) : string
  {
    $buffer = [];
    foreach($payload as $param => $val) {
      $buffer[] = "$param=$val";
    }
    $buffer = implode("&", $buffer);
    return self::URLBASE . "$suffix?$buffer";
  }
}