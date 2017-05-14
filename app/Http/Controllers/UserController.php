<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Image;
use Illuminate\Support\Facades\File;
use Validator;
use Gate;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all('name', 'email')->toArray();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('edit_profile', $id)) {
            abort(403, 'No autorizado');
        }

        $validation = Validator::make($request->all(), [
            'name'      => 'required|max:255',
            'email'     => 'unique:users,email,'.$id.'|email|required|max:255',
            'avatar'    => 'image|max:500'
        ]);

        if ($validation->fails()) {
            $this->throwValidationException(
                $request, $validation
            );
        }

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        // Change avatar 
        if($request->hasFile('avatar')){
            $avatar     = $request->file('avatar');
            $filename   = $user->id . '.' . $avatar->getClientOriginalExtension();
            $path       = '/uploads/avatars/' . $filename;
            Image::make($avatar)->resize(200,200)->save( public_path($path));

            $user->avatar = $path;
        }

        $user->save();

        return redirect()->back()
            ->with('alert', 'Los cambios han sido guardados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
