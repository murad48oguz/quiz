<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
               <form action="{{route('quiz.result',$quiz->slug)}}" method="POST">
                   @csrf
                    @foreach ($quiz->questions as $question)

                                <strong>{{$loop->iteration}}. {{$question->question}}</strong>
                                @if($question->image)
                                        <img src="{{asset($question->image)}}" class="image-responsive" style="width: 50%">
                                @endif

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->name}}" value="answer1" required>
                                    <label class="form-check-label" for="{{$question->name}}">
                                    {{$question->answer1}}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer2" required>
                                    <label class="form-check-label" for="{{$question->id}}">
                                    {{$question->answer2}}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer3" required>
                                    <label class="form-check-label" for="{{$question->id}}">
                                    {{$question->answer3}}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}" value="answer4" required>
                                    <label class="form-check-label" for="{{$question->id}}">
                                    {{$question->answer4}}
                                    </label>
                                </div>


                                <hr>
                    @endforeach
                    <button type="submit" class="btn btn-success btn-sm btn-block">Complete the exam</button>
                </form>
        </div>

    </div>

</x-app-layout>

