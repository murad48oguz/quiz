<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
          <p class="card-text">
              <div class="row">

                    <div class="col-md-4">
                        <ul class="list-group">
                            @if($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               Last joining date
                              <span title="{{$quiz->finished_at}}">{{$quiz->finished_at->diffForHumans()}}</span>
                            </li>
                            @endif
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Number of Questions
                              <span class="badge bg-secondary rounded-pill">{{$quiz->questions_count}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                The number of participants
                              <span class="badge bg-secondary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             Average Point
                              <span class="badge bg-secondary rounded-pill">2</span>
                            </li>

                          </ul>
                    </div>
                    <div class="col-md-8">


                        <p>{{$quiz->description}}</p>
                        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Join to Quiz</a>

                    </div>
              </div>
        </div>
      </div>

</x-app-layout>

