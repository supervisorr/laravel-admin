<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Services\IpglobalService;
use Exception;

class AutenticateIpglobal
{
    protected $ipglobalService = null;

    public function __construct(IpglobalService $ipglobalService)
    {
        $this->ipglobalService = $ipglobalService;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws ValidationException
     */
    public function handle($request, Closure $next)
    {
        // //@TODO !!!
        // if (! $request->user()->hasRole($role)) {
        //     // Redirect...
        // }

        //@TODO !!! USER + PASSWORD !!!
        $user_email = (isset($request->toArray()['email']) ? trim($request->toArray()['email']) : '');
        $user_password = (isset($request->toArray()['email']) ? trim($request->toArray()['password']) : '');

        //@TODO !!! USER + PASSWORD !!!
        //@TODO !!! USER + PASSWORD !!!
        //@TODO !!! USER + PASSWORD !!!
        $response = $this->ipglobalService::getToken($user_email, $user_password);

        if ($response->status() <> 200) {
            throw ValidationException::withMessages([
                'email' => "ERROR " . $response->status() . ". " . __('auth.failed'),
            ]);
        }

        $responseBody = json_decode($response->body(), true);

        if (isset($responseBody['access_token'])) {

            $access_token = trim($responseBody['access_token']);
            $token_type = (isset($responseBody['token_type']) ? trim($responseBody['token_type']) : '');
            $refresh_token = (isset($responseBody['refresh_token']) ? trim($responseBody['refresh_token']) : '');
            $scope = (isset($responseBody['scope']) ? explode(" ", trim($responseBody['scope'])) : array());

            /**
             * Guardar en DB 'intento' de login...
             */
            try {
                //@TODO 
                DB::table('ig_login_history')->insert([
                    // 'autenticated_in' => date("Y-m-d H:i:s", time()), // date(DATE_ATOM),
                    'user' => $user_email,
                    'access_token' => $access_token,
                    'token_type' => $token_type,
                    'refresh_token' => $refresh_token,
                    'expires_in' => (isset($responseBody['expires_in']) ? (int)trim($responseBody['expires_in']) : ''),
                    'scope' => (isset($responseBody['scope']) ? trim($responseBody['scope']) : ''),
                    'json_response' => $response->body(),
                ]);
            } catch (Exception $e) {
                throw ValidationException::withMessages([
                    'email' => "ERROR... Algo no ha ido del todo bien :(",
                ]);
            }

            /**
             * Guardar/actualizar en session 'intento' de login...
             */
            // @TODO  

            // $request->session()->put('ig_access_token', $access_token);
            // $request->session()->put('ig_token_type', $token_type);
            // $request->session()->put('ig_refresh_token', $refresh_token);
            // $request->session()->put('ig_login_history_response', $responseBody);

            session([
                'ig_access_token' => $access_token,
                'ig_token_type' => $token_type,
                'ig_refresh_token' => $refresh_token,
                'ig_scope' => $scope,
                'ig_login_history_response' => $responseBody
            ]);
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    /**
     * @param $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
