<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IpglobalService
{
    protected static $config = null;

    public function __construct(array $config)
    {
        self::$config = $config;
    }

    // /**
    //  * @TODO !!!!!
    //  * 
    //  * @param $user
    //  * @param $password
    //  * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    //  */
    // public static function getToken($user, $password)
    // {
    // }

    // /**
    //  * @TODO !!!!!
    //  */
    // public static function refreshToken($user, $password)
    // {
    // }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public static function getTipicodeDb($params = array())
    {
        $contentdata = array();

        // $token_type = session()->get('ig_token_type');
        // $access_token = session()->get('ig_access_token');

        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            // 'Authorization' => $token_type . ' ' . $access_token
        ])->get(
            self::$config['tipecodeUrlBase'] . self::$config['myGithubUser'] . self::$config['myGithubPublicRepo'] .
                self::$config['tipecodeResourseDb'] . (count($contentdata) > 0 ? '?' . http_build_query($contentdata) : ''),
            $contentdata
        );
    }

    /**
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public static function getTipicodeUsers($params = array())
    {
        $contentdata = array();

        // $token_type = session()->get('ig_token_type');
        // $access_token = session()->get('ig_access_token');

        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            // 'Authorization' => $token_type . ' ' . $access_token
        ])->get(
            self::$config['tipecodeUrlBase'] . self::$config['myGithubUser'] . self::$config['myGithubPublicRepo'] .
                self::$config['tipecodeResourseUsers'] . (count($contentdata) > 0 ? '?' . http_build_query($contentdata) : ''),
            $contentdata
        );
    }
}
