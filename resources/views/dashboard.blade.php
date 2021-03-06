<x-app-layout>
    <x-slot name="header">HomePage</x-slot>

    <div class="row">
        <div class="col-md-8">


            <div class="list-group">
                @foreach ($quizzes as $quiz)

                    <a href="{{route('quiz_detail',$quiz->slug)}}" class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$quiz->title}}</h5>
                            <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : null}}</small>
                        </div>
                        <p class="mb-1">{{$quiz->description}}</p>
                        <small>{{$quiz->questions_count}} question</small>
                    </a>
                    <hr>

                @endforeach

                <div class = "mt-2">
                    {{$quizzes->links()}}
                </div>


            </div>
              <div class="col-md-4">



              </div>
        </div>

    </div>


</x-app-layout>
