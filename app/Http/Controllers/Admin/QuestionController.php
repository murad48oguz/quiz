<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Quiz $quiz )
    {
        $quiz = Quiz::with('questions')->findOrFail($quiz->id);
        return view('admin.questions.list',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){

        $quiz = Quiz::find($id);
        return view('admin.questions.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $quiz)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.' .$request->image->extension();
            $fileNameWithUpload = 'uploads/'.$fileName;
            $request->image->move(public_path('uploads'),$fileName);
            $request->merge(['image'=>$fileNameWithUpload]);


        }
         Quiz::find($quiz)->questions()->create($request->post());
         return redirect()->route('questions.index',$quiz)->withSuccess('Question created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id,$id)
    {
        return $quiz_id. ' - '. $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz, $question)
    {
        $question = Quiz::findOrFail($quiz)->questions()->whereId($question)->first();
        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id, $question_id)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->question) . "." . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge(['image' => $fileNameWithUpload]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());

        return redirect()->route('questions.index', $quiz_id)->withSuccess('Question Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id, $question_id)
    {
        Quiz::findOrFail($quiz_id)->questions()->whereId($question_id)->delete();
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Question deleted successfully');
    }
}
