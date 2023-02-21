<?php

namespace App\Http\Controllers;

use App\Services\IpglobalService;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\IpglobalPost;
use App\Models\IpglobalUser;
use Inertia\Inertia;

class PostsapiController extends Controller
{
    protected $ipglobalService = null;

    public function __construct(IpglobalService $ipglobalService)
    {
        $this->ipglobalService = $ipglobalService;
    }

    /**
     * @param $items
     * @param $total
     * @param $perPage
     * @param $currentPage
     * @param $options
     * @return \Illuminate\Pagination\LengthAwarePaginator
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function paginator($items, $total, $perPage, $currentPage, $options)
    {
        $sI = ($currentPage - 1) * $perPage;
        $fI = ($sI + $perPage >= $total) ? $total : $sI + $perPage;

        for($i = $sI; $i < $fI; $i++) {
            $pageData[] = $items[$i];
        }

        $items = $pageData;

        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }

    public function index()
    {
        $ipglobalPost = new IpglobalPost($this->ipglobalService);
        $postsData = $ipglobalPost->getFormattedTipecodeDb(array());
        $total = count($postsData);
        $paginatedData = $this->paginator($postsData, $total, 5, Paginator::resolveCurrentPage('page'), [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        $ipglobalUser = new IpglobalUser($this->ipglobalService);
        $usersData = $ipglobalUser->getFormattedTipecodeUsers(array());

        return Inertia::render('Postsapi/Index', [
            'users' => $usersData,
        ]);
    }

}
