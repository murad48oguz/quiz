<x-app-layout>
    <x-slot name="header">{{$quiz->title}} <span>Results</span></x-slot>
    <div class="card">
        <div class="card-body">
            <h3>Your Point : <strong>{{$quiz->my_result->point}}</strong></h3>


                    @foreach ($quiz->questions as $question)

                              <small>This question was answered <strong>{{$question->true_percent}}%</strong> true</small><br>
                               @if($question->correct_answer == $question->my_answer->answer)

                                  <i class="fa fa-check text-success"></i>

                               @else

                                   <i class="fa fa-times text-danger"></i>

                               @endif


                                <strong>{{$loop->iteration}}. {{$question->question}}</strong>
                                @if($question->image)
                                        <img src="{{asset($question->image)}}" class="image-responsive" style="width: 50%">
                                @endif

                                <div class="form-check mt-2">
                                    @if('answer1' == $question->correct_answer)

                                        <i class="fa fa-check text-success"></i>

                                    @elseif('answer1' == $question->my_answer->answer)

                                           <i class = "fa fa-xmark"></i>

                                    @endif

                                    <label class="form-check-label" for="{{$question->name}}">
                                    {{$question->answer1}}
                                    </label>
                                </div>
                                <div class="form-check">

                                 @if('answer2' == $question->correct_answer)

                                        <i class="fa fa-check text-success"></i>

                                 @elseif('answer2' == $question->my_answer->answer)

                                           <i class = "fa fa-xmark"></i>
                                 @endif

                                    <label class="form-check-label" for="{{$question->id}}">
                                    {{$question->answer2}}
                                    </label>
                                </div>

                                <div class="form-check">
                                    @if('answer3' == $question->correct_answer)

                                        <i class="fa fa-check text-success"></i>

                                    @elseif('answer3' == $question->my_answer->answer)

                                           <i class = "fa fa-xmark"></i>

                                    @endif

                                    <label class="form-check-label" for="{{$question->id}}">
                                    {{$question->answer3}}
                                    </label>
                                </div>

                                <div class="form-check">
                                   @if('answer4' == $question->correct_answer)

                                        <i class="fa fa-check text-success"></i>

                                    @elseif('answer4' == $question->my_answer->answer)

                                           <i class = "fa fa-xmark"></i>

                                   @endif

                                    <label class="form-check-label" for="{{$question->id}}">
                                    {{$question->answer4}}
                                    </label>
                                </div>


                                <hr>
                    @endforeach

        </div>

    </div>

</x-app-layout>

