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
        try {
            $messages = Message::paginate(25);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return response()->json($messages);
    }

    public function searchMessages(Request $request)
    {
        try {
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
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return response()->json($messages);
    }
}
