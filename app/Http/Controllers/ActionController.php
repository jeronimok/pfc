<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Action;
use App\User;
use App\Proposal;
use App\Poll;
use Gate;
use Image;
use Illuminate\Support\Facades\File;
use Validator;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = Action::paginate();

        return view('actions/index', compact('actions'));
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
        $action->howto          = $request->get('howto');
        $action->create_p       = ( $request->get('create_p') == 'on' ? 1 : 0 );
        $action->debate_p       = ( $request->get('debate_p') == 'on' ? 1 : 0 );
        $action->support_p      = ( $request->get('support_p') == 'on' ? 1 : 0 );
        $action->opt_p          = ( $request->get('opt_p') == 'on' ? 1 : 0 );
        $action->audit          = ( $request->get('audit') == 'on' ? 1 : 0 );
        $action->admin_email    = $request->get('admin_email');
        $action->admin_id       = User::where('email', $request->get('admin_email'))->first()->id;

        $action->save(); //to generate the id

        // Avatar 
        if($request->hasFile('avatar')){
            $avatar     = $request->file('avatar');
            $filename   = $action->id . '.' . $avatar->getClientOriginalExtension();
            $path       = '/uploads/actions/' . $filename;
            Image::make($avatar)->resize(600,450)->save( public_path($path));

            $action->avatar = $path;
        }

        $action->save();

        return redirect(route('action', $action->id))
            ->with('alert', 'La acción participativa ha sido creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = Action::findOrFail($id);
        $proposals = $action->proposals()->paginate();
        return view('actions/action', compact('action', 'proposals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = Action::findOrFail($id);

        if (Gate::denies('admin_action', $action->admin_id)) {
            abort(403, 'No autorizado');
        }

        return view('actions/edit', compact('action'));
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
        $validation = Validator::make($request->all(), [
            'title'         => 'required|max:255',
            'description'   => 'required',
            'howto'         => 'required',
            'admin_email'   => 'required'
        ]);

        if ($validation->fails()) {
            $this->throwValidationException(
                $request, $validation
            );
        }

        $action = Action::findOrFail($id);

        if (Gate::denies('admin_action', $action->id)) {
            abort(403, 'No autorizado');
        }

        $action->title          = $request->get('title');
        $action->description    = $request->get('description');
        $action->howto          = $request->get('howto');
        $action->admin_email    = $request->get('admin_email');
        $action->admin_id       = User::where('email', $request->get('admin_email'))->first()->id;
        $action->create_p       = ( $request->get('create_p') == 'on' ? 1 : 0 );
        $action->debate_p       = ( $request->get('debate_p') == 'on' ? 1 : 0 );
        $action->support_p      = ( $request->get('support_p') == 'on' ? 1 : 0 );
        $action->opt_p          = ( $request->get('opt_p') == 'on' ? 1 : 0 );
        $action->audit          = ( $request->get('audit') == 'on' ? 1 : 0 );

        // Avatar 
        if($request->hasFile('avatar')){
            $avatar     = $request->file('avatar');
            $filename   = $action->id . '.' . $avatar->getClientOriginalExtension();
            $path       = '/uploads/actions/' . $filename;
            Image::make($avatar)->resize(600,450)->save( public_path($path));

            $action->avatar = $path;
        }

        $action->save();

        return redirect()->route('action', $action->id)
            ->with('alert', 'La acción participativa ha sido editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $action   = Action::findOrFail($request->get('action_id'));
        $title    = $action->title;
        $action->delete();

        return redirect(route('actions'))
            ->with('alert', "La acción participativa '" . $title . "' ha sido eliminada con éxito.");
    }

    public function getEditAction($id){

        $action = Action::findOrFail($id);

        if (Gate::denies('edit-action', $action)){
            return redirect()->route('home');
        }

        return $action->title;
    }

    public function getCreateProposal($action_id){

        $action = Action::findOrFail($action_id);

        return view('proposals.create_proposal', compact('action'));
    }

    public function postCreateProposal(Request $request){


        $this->validate($request,[
            'title'         => 'required',
            'content'   => 'required'
            ]);

        app('App\Http\Controllers\ProposalController')->store($request);

        return redirect(route('action', $request->get('action_id')))
            ->with('alert', 'La propuesta ha sido creada con éxito');

    }
}
