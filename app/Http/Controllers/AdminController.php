<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ActionController;
use App\Action;
use App\User;

class AdminController extends Controller
{
    public function getSettings(){
        return view('admin.settings');
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

        app('App\Http\Controllers\ActionController')->store($request);

        return redirect(route('settings'))
            ->with('alert', 'La acción participativa ha sido creada con éxito');

    }
}
