<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proposal;
use App\User;
use App\Action;
use App\Comment;

class ProposalController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proposal = new Proposal;

        $proposal->title        = $request->get('title');
        $proposal->content      = $request->get('content');
        $proposal->action_id    = $request->get('action_id');

        auth()->user()->proposals()->save($proposal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal   = Proposal::findOrFail($id);
        $action     = $proposal->action;
        $creator    = $proposal->user;
        $comments   = $proposal->comments()->paginate();
        $supporters = $proposal->supporters()->lists('user_id')->toArray();

        return view('proposals/proposal', compact('proposal', 'creator', 'action', 'comments', 'supporters'));
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

    public function postComment(Request $request) {
        
        $this->validate($request,[
            'comment'   => 'required'
            ]);

        app('App\Http\Controllers\CommentController')->store($request);


        return redirect(route('proposal', $request->get('proposal_id')))
            ->with('alert', 'El comentario ha sido publicado con éxito');
    }

    public function support(Request $request) {

        $user = auth()->user();
        $proposal   = Proposal::findOrFail($request->get('proposal_id'));
        $supporters = $proposal->supporters()->lists('user_id')->toArray();


        if ( in_array($user->id, $supporters) ) {
            return redirect()->back()
                ->with('warning', 'Ya estás apoyando esta propuesta');
        }

        $user->supportProposal()->attach($proposal->id);

        return redirect(route('proposal', $proposal->id));
    }

    public function unsupport(Request $request) {

        $user = auth()->user();
        $proposal   = Proposal::findOrFail($request->get('proposal_id'));
        $supporters = $proposal->supporters()->lists('user_id')->toArray();

        if ( ! in_array($user->id, $supporters) ) {
            return redirect()->back()
                ->with('warning', 'No estás apoyando esta propuesta');
        }

        $user->supportProposal()->detach($proposal->id);

        return redirect(route('proposal', $proposal->id));
    }
}
