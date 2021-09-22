<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lead;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Validator;

class ContactController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'success'=>false,
                'errors'=>$validator->errors()

            ]);
        }
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();
        Mail::to('info@boolpress.com')->send(new SendNewMail($new_lead));
    }
}
