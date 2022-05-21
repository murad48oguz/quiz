<x-app-layout>

    <x-slot name="header"> Create new question for {{$quiz->title}} </x-slot>


   
   
    <div class="card">
        <div class="card-body">
            <form action="{{route('questions.store', $quiz)}}" method="POST" enctype="multipart/form-data" >
              @csrf
               <div class="form-group">
                    <label> Question </label>
                   
                    <textarea name="question" class="form-control" rows="4">{{old('question')}}</textarea>
               </div>
               

               <div class="form-group">
                    <label> Image </label>
                    <input type="file" name="image" class="form-control" >
               </div>

               <div class="row">

                        <div class="col-md-6">
                            
                            <div class="form-group">
                            
                                <label>Answer 1</label>
                                <textarea name="answer1" class="form-control" rows="4">{{old('answer1')}}</textarea>


                            </div>
                            
                        </div> 

                        <div class="col-md-6">
                            
                            <div class="form-group">
                            
                                <label>Answer 2</label>
                                <textarea name="answer2" class="form-control" rows="4">{{old('answer2')}}</textarea>


                            </div>
                            
                        </div> 

                </div>


               <div class="row">

                        <div class="col-md-6">
                            
                            <div class="form-group">
                            
                                <label>Answer 3</label>
                                <textarea name="answer3" class="form-control" rows="4">{{old('answer3')}}</textarea>


                            </div>
                            
                        </div> 

                        <div class="col-md-6">
                            
                            <div class="form-group">
                            
                                <label>Answer 4</label>
                                <textarea name="answer4" class="form-control" rows="4">{{old('answer4')}}</textarea>


                            </div>
                            
                        </div> 

                </div>


               <div class="form-group">
                   <label> Correct Answer </label>
                   <select name="correct_answer" class="form-control">
                          <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">Answer 1</option>
                          <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">Answer 2</option>
                          <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">Answer 3</option>
                          <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">Answer 4</option>

                   </select>
                    
               </div>

             
               <button type="submit" class="btn btn-success btn-sm btn-block"> Create a Question</button>
              

            </form>
        </div>
    </div>



</x-app-layout>
