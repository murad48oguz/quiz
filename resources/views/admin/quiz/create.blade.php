<x-app-layout>

    <x-slot name="header"> Create a Quiz</x-slot>

    <div class="card">
      <div class="card-body">
            <form action="{{route('quizzes.store')}}" method="POST">
                @csrf
  
               <div class="form-group">
                    <label> Quiz title </label>
                    <input type="text" name="title" class="form-control" required>
               </div>

               <div class="form-group">
                    <label> Quiz Description </label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
               </div>

               <div class="form-group">
                    <input id="isFinished" type="checkbox">
                    <label>Will be finish time?</label>
               </div>


               <div id= "finishedInput" style="display: none" class="form-group">
                    <label> Finish Time </label>
                    <input type="datetime-local" name="finished_at" class="form-control" required>
               </div>
               <br>

               <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block"> Create a Quiz</button>
               </div>
               

                


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
