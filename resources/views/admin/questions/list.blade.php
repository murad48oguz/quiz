<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Questions</x-slot>
    <div class="card">
            
            <div class="card_body">
                <h5 class="card-title float-end">
                    <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary"><i class = "fa fa-plus"></i>Create a Question</a>
                </h5>
                <h5 class="card-title ">
                    <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><i class = "fa fa-arrow-left"></i>Back to Quizzes</a>
                </h5>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">Question</th>
                          <th scope="col">Image</th>
                          <th scope="col">Answer1</th>
                          <th scope="col">Answer2</th>
                          <th scope="col">Answer3</th>
                          <th scope="col">Answer4</th>
                          <th scope="col">Correct Answer</th>
                          <th scope="col" style="width: 90px;">Operations</th>
                        </tr>
                      </thead>
                    <thead>
                        @foreach ($quiz->questions as $question)
                            
                            
                                <tr>
                                <td>{{$question->question}}</td>
                                <td>
                                    @if($question->image)
                                        <a href="{{asset($question->image)}}" target="_blank" class="btn btn-sm btn-light">View the image</a>
                                    @endif
                                </td>
                                <td>{{$question->answer1}}</td>
                                <td>{{$question->answer2}}</td>
                                <td>{{$question->answer3}}</td>
                                <td>{{$question->answer4}}</td>
                                <td class="text-success">{{substr($question->correct_answer,-1)}}.Answer</td>
                                <td>
                                
                                    <a href="{{route('questions.edit',[$quiz->id, $question])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                    <a href="{{route('question.destroy',[$quiz->id, $question])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                                </tr>

                        @endforeach
                    </thead>
                    <tbody>

                        
                     
                    </tbody>
                  </table>
                
            </div>
    

    </div>

    {{--  <div class="alert alert-danger">Bootstrap Message</div>  --}}


</x-app-layout>
