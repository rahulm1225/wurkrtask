<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\MessageResource;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        $messages = Message::paginate(10);

        return view('home')->with(['users' => $users, 'messages' => $messages]);
    }

    public function searchMessages(Request $request)
    {
        $users = User::all();
        
        $messages = Message::when(request()->has('term'), function($q){
            $q->where('message', 'LIKE', '%'. request('term'). '%');
        })
        ->when(request()->has('fromuser'), function($q){
            $q->where('from_user_id', request('fromuser'));
        })
        ->when(request()->has('touser'), function($q){
            $q->where('to_user_id', request('touser'));
        })
        ->paginate(10);

        dd($request->all(), $users[0]['_id']);

        return view('home')->with(['users' => $users, 'messages' => $messages]);
    }
}
