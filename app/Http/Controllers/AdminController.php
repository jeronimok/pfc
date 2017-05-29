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

    public function getCreateAction(){
        return view('admin.create_action');
    }

    public function postCreateAction(Request $request){

        $this->validate($request,[
            'title'         => 'required',
            'description'   => 'required',
            'howto'         => 'required',
            'admin_email'   => 'required',
            'avatar'    => 'image|max:500'
            ]);

        if ( Action::where('title', $request->get('title') )->first() ) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'title' => 'Ya existe una acción participativa con ese nombre'
                    ]);
        }
        if ( ! User::where('email', $request->get('admin_email') )->first() ) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'admin_email' => 'No existe ningún usuario con ese email'
                    ]);
        }

        $user = User::where('email', $request->get('admin_email') )->first();

        if ($user->role == 'general'){
            $user->role = 'action_admin';
            $user->save();
        }

        return app('App\Http\Controllers\ActionController')->store($request);

    }
}
