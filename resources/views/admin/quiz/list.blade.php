<x-app-layout>
    <x-slot name="header">Quizzes</x-slot>
   
    <div class="card">
        
            
            <div class="card_body">
                <br>
                <h5 class="card-title float-end">
                    <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class = "fa fa-plus"></i>Create a Quiz</a>
                </h5>

                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-2">
                            <input type = "text" name = "title" value="{{request()->get('title')}}" placeholder="Quiz name" class="form-control">

                        </div>

                        <div class="col-md-2">
                            <select class="form-control" onchange="this.form.submit()" name="status">
                                <option value=""> Choose a case </option>
                                <option @if(request()->get('status')==='publish') selected @endif value="publish">Publish</option>
                                <option @if(request()->get('status')==='passive') selected @endif value="passive">Passive</option>
                                <option @if(request()->get('status')==='draft')   selected @endif value="draft">Draft</option>


                            </select>

                        </div>
                        @if(request()->get('title') || request()->get('title'))
                            <div class="col-md-2">
                                <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Reset</a>

                            </div>
                        @endif


                    </div>



                </form>
                

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Question Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Finished at</th>
                        <th scope="col">Operations</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz)
                            
                       
                      <tr>
                        <td scope="row">{{$quiz->title}}</td>
                        <td>{{$quiz->questions_count}}</td>
                        <td>

                               


                                @switch($quiz->status)
                                    @case('publish')
                                        
                                        <span class="badge bg-success">Published</span>
                                    
                                    @break
                                    @case('passive')
                                        <span class="badge bg-danger">Passive</span>
                                    @break
                                    @case('draft')
                                        <span class="badge bg-warning">Draft</span>
                                    @break
                                @endswitch  

                        </td>
                        <td>
                            <span title="{{$quiz->finished_at}}">
                                {{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}} 
                            </span>
                        
                        </td>
                        <td>
                           <a href="{{route('questions.index',$quiz)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                           <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                           <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$quizzes->withQueryString()->links()}}

            </div>
    

    </div>

    <div class="alert alert-danger">Bootstrap Message</div>


</x-app-layout>
