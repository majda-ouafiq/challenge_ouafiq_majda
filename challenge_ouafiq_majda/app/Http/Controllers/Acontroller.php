<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Acontroller;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Acontroller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use Illuminate\Support\ServiceProvider;
use App\Models\Question;
use App\Models\Answer;
use View;
use Redirect;

class Acontroller extends Controller
{
    //Function to select a question's list of answers sorted from oldest to newest.
    public function getAnswers($id)
    {
        $Answer = new Answer();
        $answers = $Answer->where('idquestion', '=', $id)->orderBy('id','ASC')->get();
        $Question=new Question();
        $question = $Question->where('id', '=', $id)->first();
        return View::make("/questions")->with(array('question'=>$question,'answers'=>$answers));   
    }

    //Function to add an answer 
    public function storeA(Request $request)
    {
        $validator=$this->validate($request,['answer' => 'required|min:5']);
        if (!is_array($validator)) {
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('post/create')
                        ->withErrors($errors)
                        ->withInput();
        } }
        $Answer = new Answer();
        $Answer->idquestion = $request['idquestion'];
        $Answer->answer = $request['answer'];
        $Answer->save();
        $answers = $Answer->where('idquestion', '=', $request['idquestion'])->orderBy('id','ASC')->get();
        $Question=new Question();        
        $q = $Question->where('id', '=', $request['idquestion'])->first();
        $Question
        ->where('id', '=', $request['idquestion'])
        ->update(['number_answer'   =>  $q->number_answer+1]
                  );
        $question = $Question->where('id', '=', $request['idquestion'])->first();
        return redirect()->back()->with(array('question'=>$question,'answers'=>$answers));     
    }
}
