<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ActionController;
use App\Action;
use App\User;
use App\Comment;
use App\Proposal;
use App\Work;
use App\SocialAccount;

class AdminController extends Controller
{
    public function getSettings(){
        $banned_users = User::whereNotNull('ban_reason')->select('name', 'id')->get();
        $data = [
            'actions'       => Action::all()->count(),
            'users'         => User::all()->count(),
            'social_users'  => SocialAccount::all()->count(),
            'banned_users'  => $banned_users->count(),
            'comments'      => Comment::all()->count(),
            'proposals'     => Proposal::all()->count(),
            'works'         => Work::all()->count()
        ];
        return view('admin.settings', compact('data', 'banned_users'));
    }

}
