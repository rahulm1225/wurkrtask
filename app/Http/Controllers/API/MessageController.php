<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(25);

        return response()->json($messages);
    }

    public function searchMessages(Request $request)
    {
        $messages = Message::when(request()->has('term'), function($q){
            $q->where('message', 'LIKE', '%'. request('term'). '%');
        })
        ->when(request()->has('fromuser'), function($q){
            $q->where('from_user_id', request('fromuser'));
        })
        ->when(request()->has('touser'), function($q){
            $q->where('to_user_id', request('touser'));
        })
        ->paginate(25);

        return MessageResource::collection($messages);
    }
}
