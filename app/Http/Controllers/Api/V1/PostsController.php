<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\IpglobalService;
use Illuminate\Support\Facades\Request;
use App\Models\IpglobalPost;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Exception;

/**
 * @OA\Info(
 *    title="Laravel Api Posts",
 *    version="1.0.0",
 *    description="Documentación de todos los endpoints de un aplicación que consiste en un CRUD de Posts...",
 *  @OA\ExternalDocumentation(
 *    description="Mas informacion",
 *    url="https://github.com/supervisorr/laravel-admin",
 *  ),
 * )
 */
class PostsController extends Controller
{
    protected $ipglobalService = null;

    public function __construct(IpglobalService $ipglobalService)
    {
        $this->ipglobalService = $ipglobalService;
    }

    /**
     * @OA\Get(
     *   path="/api/posts",
     *   tags={"Posts"},
     *   description="Muestra todos los posts en formato JSON",
     *   operationId="getAllPosts",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index()
    {
        $ipglobalPost = new IpglobalPost($this->ipglobalService);
        $postsData = $ipglobalPost->getFormattedTipecodeDb(array());
        return response()->json(PostResource::collection($postsData), 200);
    }

    /**
     * @OA\Post(
     *   path="/api/posts",
     *   tags={"Posts"},
     *   summary="Insertar un post",
     *   description="Insertar el registro de un post nuevo con parametros.",
     *   operationId="addPost"
     *
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=220, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store()
    {
        try {
            Request::validate([
                'title' => ['required', 'max:50'],
                'content' => ['required', 'max:500'],
                'userId' => ['required', 'integer'],
            ]);
        } catch(Exception $e) {
            return response()->json([array($e->getMessage())], 220);
        }

        $res = DB::table('posts')->insertOrIgnore([
            [
                'title' => Request::get('title'),
                'content' => Request::get('content'),
                'user_id' => Request::get('userId'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        return response()->json(array('Post created.'), 201);
    }
}
