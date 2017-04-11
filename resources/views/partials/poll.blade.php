<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel">
            <div class="panel-heading">
                <h3>{{$action->poll->question}}</h3>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('vote') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($action->poll->options as $option)
                            <li class="list-group-item">
                                @if(Gate::allows('vote', $action->poll->id))
                                    <div class="radio">
                                      <label><input type="radio" name="selected_option" value="{{$option->id}}">{{$option->proposal->title}}</label>
                                    </div>
                                @else
                                    @if($action->poll->num_votes()==0)
                                        <h5>
                                            {{$option->proposal->title}}
                                            (0%)
                                        </h5>
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"  style="width:0%">
                                          </div>
                                        </div>
                                    @else
                                        <h5>
                                            {{$option->proposal->title}}
                                            ({{ round(100*count($option->voters)/$action->poll->num_votes(), 2) }}%)
                                        </h5>
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"  style="width: {{ 100*count($option->voters)/$action->poll->num_votes() }}%">
                                            
                                          </div>
                                        </div>
                                    @endif
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class=" text-center">
                    <button type="submit" name="btn_vote" class="btn btn-success btn-lg">
                        Votar</button>
                </div>
            </form>
        </div>
    </div>
</div>
