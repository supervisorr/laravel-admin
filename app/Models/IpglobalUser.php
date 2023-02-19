<?php

namespace App\Models;

use App\Services\IpglobalService;

class IpglobalUser extends User
{
    protected $_ipglobalService = null;

    public function __construct(IpglobalService $ipglobalService)
    {
        $this->_ipglobalService = $ipglobalService;
    }

    /**
     * @param $params
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function getTipicodeUsers($params=array())
    {
        return $this->_ipglobalService::getTipicodeUsers($params);
    }

    /**
     *
     * @param array $params
     */
    public function getFormattedTipecodeUsers(array $params)
    {

        $sDate = (isset($params['sDate']) ? $params['sDate'] : '');
        $fDate = (isset($params['fDate']) ? $params['fDate'] : '');

        $response = $this->getTipicodeUsers(array('sDate' => $sDate, 'fDate' => $fDate)); 

        $responseBody = json_decode($response->body(), true);

        $usersData = array();

        foreach ($responseBody as $user) {

            $usersData[] = array(
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'owner' => $user['owner'],
                'photo' => $user['photo'],
                'createdAt' => $user['created_at'],
                'deletedAt' => $user['deleted_at'],
            );
        }

        return $usersData;
    }

}
