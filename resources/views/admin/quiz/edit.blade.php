<x-app-layout>

    <x-slot name="header"> Edit this quiz</x-slot>


   
   
    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.update', $quiz->id)}}" method="POST" novalidate>
              @csrf
              @method('PUT')
               <div class="form-group">
                    <label> Quiz title </label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
               </div>
               

               <div class="form-group">
                    <label> Quiz Description </label>
                    <textarea name="description" value="{{$quiz->description}}" class="form-control" rows="4"></textarea>
               </div>

               <div class="form-group">
                <label> Quiz Status </label>
                <select name="status" class="form-control">

                    <option @if($quiz->questions_count<4) disabled @endif @if($quiz->status==='publish') selected @endif value="publish">Publish</option>
                    <option @if($quiz->status==='passive') selected @endif value="passive">Passive</option>
                    <option @if($quiz->status==='draft') selected @endif value="draft">Draft</option>


                </select>
                
           </div>


               <div class="form-group">
                    <input id="isFinished" type="checkbox">
                    <label>Will be finish time?</label>
               </div>


               <div id= "finishedInput" style="display: none" class="form-group">
                    <label> Finish Time </label>
                    <input type="datetime-local" name="finished_at" class="form-control">
               </div>
               <br>


               
                    <button type="submit" class="btn btn-success btn-sm btn-block"> Update Quiz</button>
              
               

                


            </form>
        </div>
    </div>
      <x-slot name="js">
      <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finishedInput').show();
                }else{
                    $('#finishedInput').hide();
                }
            })

      </script>
    </x-slot>  
   

    


</x-app-layout>
