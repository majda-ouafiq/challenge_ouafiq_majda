<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Qcontroller;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Qcontroller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use Illuminate\Support\ServiceProvider;
use App\Models\Question;
use App\Models\Answer;
use View;
use Redirect;

class Qcontroller extends Controller
{
    //Function to select The list of questions sorted from newest to oldest.
    public function getQuestions()
    {
        $Question=new Question();
        $questions = $Question->orderBy('id','DESC')->get();
        if ($questions->isEmpty()) {
            $id=1;
        }
        else {
            $id=$Question->orderBy('id','DESC')->first()->id+1;
        }
        return View::make("/welcome")->with(array('questions'=>$questions,'id'=>$id));      
    }

    //Function to add a question 
    public function storeQ(Request $request)
    {
        $validator=$this->validate($request,['question' => 'required|min:5|ends_with:?']);
        if (!is_array($validator)) {
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('post/create')
                        ->withErrors($errors)
                        ->withInput();
        } }
        $Question = new Question();
        $Question->question = $request['question'];
        $Question->number_answer = 0;
        $Question->save();
        $question = $Question->orderBy('id','DESC')->first();
        $Answer = new Answer();
        $answers = $Answer->where('idquestion', '=', $question->id)->orderBy('id','ASC')->get();
        return View::make("/questions")->with(array('question'=>$question,'answers'=>$answers));     
    }
}
