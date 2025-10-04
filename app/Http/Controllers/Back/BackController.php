<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class BackController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        
        return view('back.index', [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ]
        ]);
    }
}
