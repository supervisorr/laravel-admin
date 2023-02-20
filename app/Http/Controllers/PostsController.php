<?php

namespace App\Http\Controllers;

use App\Services\IpglobalService;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use App\Models\IpglobalPost;
use App\Models\IpglobalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostsController extends Controller
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
        // $postsData = $ipglobalPost->getFormattedTipecodeDb(array('sDate' => '2021-05-01', 'fDate' => ''));
        $postsData = $ipglobalPost->getFormattedTipecodeDb(array());
        $total = count($postsData);
        $paginatedData = $this->paginator($postsData, $total, 5, Paginator::resolveCurrentPage('page'), [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        return Inertia::render('Posts/Index', [
            'filters' => Request::all('search', 'trashed'),
            'posts' => $paginatedData,
        ]);
    }

    public function create()
    {
        $ipglobalUser = new IpglobalUser($this->ipglobalService);
        $usersData = $ipglobalUser->getFormattedTipecodeUsers(array());

        return Inertia::render('Posts/Create', [
            'users' => $usersData,
            'defaultUser' => [
                'id' => Auth::user()->id,
                'name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
                'email' => Auth::user()->email,
                'owner' => Auth::user()->owner,
                'photo' => Auth::user()->photo_path,
                'created_at' => Auth::user()->created_at,
                'deleted_at' => Auth::user()->deleted_at,
            ],
        ]);
    }

    public function store()
    {
        Request::validate([
            'title' => ['required', 'max:50'],
            'content' => ['required', 'max:500'],
            'userId' => ['required', 'integer'], // , 'max:50', 'email', Rule::unique('users')],
        ]);

        $ipglobalPost = new IpglobalPost($this->ipglobalService);

        DB::table('posts')->insertOrIgnore([
            [
                // 'id' => 1, 
                'title' => Request::get('title'),
                'content' => Request::get('content'),
                'user_id' => Request::get('userId'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        return Redirect::route('posts')->with('success', 'Post created.');
    }

}
