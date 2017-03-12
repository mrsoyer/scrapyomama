<?php
require __DIR__ . '/../vendor/php-ovh/vendor/autoload.php';
use \Ovh\Api;

class OvhApi extends Controller
{
    public $name = 'cards';

    public function index($e)
    {
      echo '
///////////////////////////////////////////////////////////////////////////////|
//                                           __________  __   __   __    __   ||
//  Cards.php                              / _________/ | |  / /  /  |  /  |  ||
//                                        / /_______    | | / /  /   | /   |  ||
//                                        \______   \   | |/ /  / /| |/ /| |  ||
//  Created: 2015/10/29 12:30:05         ________/  /   |   /  / / |   / | |  ||
//  Updated: 2015/10/29 21:45:22        /__________/    /  /  /_/  |__/  |_|  ||
//                                      ScrapYoMama    /__/    by barney.im   ||
//____________________________________________________________________________||
//-----------------------------------------------------------------------------*
    ';
    }

    public function sayHello($params)
    {
        echo ("Les paramertres sont : ". $params[0]. " et ".$params[1]);
    }

    public function test()
    {
      $ovh = $this->ovhapi();
      $result = $ovh->get('/email/domain');

      print_r( $result );
    }
    public function ovhapi()
    {
//{"validationUrl":"https://eu.api.ovh.com/auth/?credentialToken=WjIIQwyWLVPpUWiCfjRnFSgBaByV8ILfJYWJHDjdXbGY15hYvPqCThnLjQWEZFKN","consumerKey":"pGUPP5VUGd2FNY7CpgYa9bp7YjmNdTw4","state":"pendingValidation"}%

    //  $test = new \Ovh\Api;
      return new Api( 'A9KYnddIUDFVhnpZ',  // Application Key
                      'kTKnO8QFbovvT4lO622V7aMdBCDjB4Un',  // Application Secret
                      'ovh-eu',      // Endpoint of API OVH Europe (List of available endpoints)
                      '70FgfGdcttIcfYhH6dbCtu1NrKvDgqaQ'); // Consumer Key


    }

    public function listMail($dom)
    {
      $ovh = $this->ovhapi();
      $result = $ovh->get('/email/domain/'.$dom.'/account');
      print_r( $result );
      return($result);
    }

    public function deleteMail($dom,$account)
    {
      $ovh = $this->ovhapi();
      $result = $ovh->delete('/email/domain/'.$dom.'/account/'.$account);
      print_r( $result );
      return($result);
    }

    public function createMail($dom,$account)
    {
      $ovh = $this->ovhapi();
      $result = $ovh->post('/email/domain/'.$dom.'/account', array(
          'accountName' => $account, // Required: Account name (type: string)
          'description' => $dom, // Description Account (type: string)
          'password' => 'tomylyjon', // Required: Account password (type: password)
      ));

      print_r( $result );
      return($result);
    }
}