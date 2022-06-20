<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use EllipseSynergie\ApiResponse\Contracts\Response;

class UserController extends Controller
{
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
    
    public function index()
    {
        try {
            $users = User::all();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return response()->json($users);
    }
}
