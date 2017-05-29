<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Action;
use App\Newvent;
use Gate;

class NewventController extends Controller
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
    public function publishEvent($action_id)
    {
        $action = Action::findOrFail($action_id);

        if (Gate::denies('admin_action', $action->admin_id)) {
            abort(403, 'No autorizado');
        }

        return view('newvents/publish_event', compact('action'));
    }

    public function publishNew()
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
        $this->validate($request,[
            'title' => 'required',
            'date'  => 'required',
            'link'  => 'required',
            'type'  => 'required',
            'action_id' => 'required'
            ]);

        $newvent = new Newvent;
        $newvent->title = $request->get('title');
        $newvent->link = $request->get('link');
        $newvent->date = $request->get('date');
        $newvent->action_id = $request->get('action_id');

        $newvent->save();

        return redirect(route('action', $request->get('action_id')))
            ->with('alert', 'Se ha publicado con éxito');
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
