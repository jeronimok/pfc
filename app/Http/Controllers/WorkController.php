<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Action;
use App\Work;

class WorkController extends Controller
{
    public function getCreate($action_id){

        $action = Action::findOrFail($action_id);
        
        return view('works/create', compact('action'));
    }

    public function postCreate(Request $request){
        
        $this->validate($request,[
            'title'         => 'required',
            'content'   => 'required'
            ]);

        $work = new Work;
        $work->title = $request->get('title');
        $work->content = $request->get('content');
        $work->action_id = $request->get('action_id');

        $work->save();

        return redirect(route('action', $request->get('action_id')))
            ->with('alert', 'La obra ha sido publicada con éxito');
    }
}
