<?php

  namespace App\Services;

  class GravatarService 
  {
    private const URLBASE = "https://www.gravatar.com/avatar/";

    /**
     * Returns the URL for the gravatar image
     */
    public function get(string $email)
    {
      $hash = $this->mailToHash($email);
      $url  = self::URLBASE . $hash;
      return $url;
    }

    /**
     * Get the gravatar email hash
     * 
     * @return string
     */
    private function mailToHash(string $email) : string
    {
      return md5(strtolower(trim($email)));
    }
  }