<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
          <p class="card-text">
              <div class="row">

                    <div class="col-md-4">
                        <ul class="list-group">
                            @if($quiz->my_rank)

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Order
                                    <span class="badge bg-primary rounded-pill">{{ $quiz->my_rank }}</span>
                                </li>

                            @endif

                            @if($quiz->my_result)


                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Point
                                    <span class="badge bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
                                </li>



                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Correct / Wrong
                                    <div class="float-right">
                                        <span class="badge bg-success rounded-pill">{{ $quiz->my_result->correct }}
                                            Correct</span>
                                        <span class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong }}
                                            Wrong</span>
                                    </div>
                                </li>

                            @endif

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
                            @if($quiz->details)


                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    The number of participants
                                <span class="badge bg-secondary rounded-pill">{{$quiz->details['joiner_count']}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Average Point
                                <span class="badge bg-secondary rounded-pill">{{$quiz->details['average']}}</span>
                                </li>

                            @endif


                          </ul>

                          <div class="card mt-3">

                                <div class="card-body">

                                    <h5 class="card-title"> First 10</h5>

                                        <ul class="list-group">

                                            @foreach ($quiz->topTen as $result)

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="h6">{{ $loop->iteration."." }}</strong>
                                                <img src="{{ $result->user->profile_photo_url }}" class="w-8 rounded-full" alt="{{ $result->user->name }}">
                                                <span @if(auth()->user()->id == $result->user_id) class="text-warning" @endif>{{ $result->user->name }}</span>
                                                <span class="badge badge-info badge-pill">{{ $result->point }}</span>
                                            </li>
                                        @endforeach

                                        </ul>



                                </div>



                          </div>


                    </div>
                    <div class="col-md-8">


                        <p>{{$quiz->description}}</p>

                        @if($quiz->my_result)

                            <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-secondary btn-block btn-sm">Show Quiz</a>

                        @else
                                <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-block btn-sm">Join to Quiz</a>
                        @endif
                    </div>
              </div>
        </div>
      </div>

</x-app-layout>

