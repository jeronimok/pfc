<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Action;
use App\User;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = new Action;

        $action->title          = $request->get('title');
        $action->description    = $request->get('description');
        $action->create_p       = ( $request->get('create_p') == 'on' ? 1 : 0 );
        $action->debate_p       = ( $request->get('debate_p') == 'on' ? 1 : 0 );
        $action->support_p      = ( $request->get('support_p') == 'on' ? 1 : 0 );
        $action->opt_p          = ( $request->get('opt_p') == 'on' ? 1 : 0 );
        $action->audit          = ( $request->get('audit') == 'on' ? 1 : 0 );
        $action->admin_email    = $request->get('admin_email');
        $action->admin_id       = User::where('email', $request->get('admin_email'))->first()->id;

        $action->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
