<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* URL'den sidebar için yolu almak */
if ( ! function_exists('getURL'))
{
  function getURL()
  {
    $adres = uri_string();

    $adres = explode('/', $adres);

    if(count($adres)==1){

      return $adres[0];
    }else if(count($adres)==2 || count($adres)==3 || count($adres)==4 ){
    
      return $adres[1];
    }
  }   
}

/* Recaptcha olayı için curl fonksiyon */
if ( ! function_exists('getCurlData'))
{
  function getCurlData($url)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
  }
}

/* Düzenli tarih olayı için  fonksiyon */
if ( ! function_exists('getDateProper'))
{
  /* Tarihleri düzenli bir sırayla gösteren fonksiyon */
  function getDateProper($date){

    $new_date = substr($date, 0,10);
    $new_date = explode("-", $new_date);
    return $new_date[2].'-'.$new_date[1].'-'.$new_date[0];
  }
}

/* Düzenli tarih olayı için  fonksiyon */
if ( ! function_exists('getDateProper2'))
{
  /* Tarihleri düzenli bir sırayla gösteren fonksiyon */
  function getDateProper2($date){
    $new_date = substr($date, 0,10);
    $new_date = explode("-", $new_date);
    $date1 = $new_date[2].'-'.$new_date[1].'-'.$new_date[0];
    $new_date2 = explode(' ',$date);
    return $date1.' '.$new_date2[1];
  }
}