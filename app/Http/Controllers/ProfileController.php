<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        return view('pages.profile',[
            'user'=>$user
        ]);
    }
}
