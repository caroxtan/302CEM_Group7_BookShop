<?php

namespace App\Http\Controllers;
//call the feedback table from database
use Illuminate\Http\Request;
use App\Models\Feedback;
use DB;

class FeedbackController extends Controller{
    //validations for Feedback Form
    public function validateFeedbackForm(Request $request)
    {
        $request->validate([
            'name' => 'required|min:0|max:255|',
            'email' => 'required|email|min:0|max:255|',
            'service' => 'required|min:0|max:255|',
            'suggestion' => 'required|min:0|max:255|'
        ]);

        $Message = [
        'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $Message);

        //Insert data to database
        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->username = "";
        $feedback->email = $request->email;
        $feedback->service = $request->service;
        $feedback->suggestion = $request->suggestion;
        $feedback->admin_reply = "";
        $res = $feedback->save();

        if ($res){
            return back()->with("success", "Test");
        }else{
            return back()->with("Fail", "Test Fail");
        }

    }

}
