<?php

namespace App\Models;

use App\Services\IpglobalService;

class IpglobalPost extends Post
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
    public function getTipicodeDb($params=array())
    {
        return $this->_ipglobalService::getTipicodeDb($params);
    }

    /**
     *
     * @param array $params
     */
    public function getFormattedTipecodeDb(array $params)
    {

        $sDate = (isset($params['sDate']) ? $params['sDate'] : '');
        $fDate = (isset($params['fDate']) ? $params['fDate'] : '');

        $response = $this->getTipicodeDb(array('sDate' => $sDate, 'fDate' => $fDate)); 

        $responseBody = json_decode($response->body(), true);

        $postsData = array();

        if(isset($responseBody["posts"])) {

            $usersData = (isset($responseBody["users"]) ? $responseBody["users"] : array());

            foreach ($responseBody["posts"] as $post) {

                $userName = $post['user_id'];
                $userData = array();

                foreach($usersData as $user) {
                    if($post['user_id'] == $user['id']) {
                        $userName = $user['name'];
                        $userData = $user;
                        break;
                    }
                }

                $postsData[] = array(
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'content' => $post['content'],
                    'userId' => $post['user_id'],
                    'author' => $userName,
                    'user' => $userData,
                    'createdAt' => $post['created_at'],
                    'deletedAt' => $post['deleted_at'],
                );
            }
        }

        return $postsData;
    }

}
