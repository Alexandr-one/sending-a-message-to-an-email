<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index(){
        $message = session()->get('message');
    	return view('index',compact('message'));
    }
    public function send(Request $request)
    {
        $this->validate($request,[
            'sendEmail' => 'required|email',
            'sendText' => 'required|min:5',
            'sendName' => 'required|min:5',
            'sendTitle' => 'required|min:5',
        ]);
        $mail = $request->get('sendEmail');
        $posts = $request->get('sendText');
        $name = $request->get('sendName');
        $title = $request->get('sendTitle');
        Mail::raw($posts,function($message) use ($mail,$name,$title){
            $message->to($mail , 'To web dev blog')->subject($title);
            $message->from('2004sasharyzhakov@gmail.com',$name);
        });
        session()->flash('message','Вы отправили сообщение на почту '.$mail);
        return redirect()->back();
    }
}
