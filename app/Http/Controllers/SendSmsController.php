<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageLog;
use App\ContactTemplate;
use App\MessageTemplate;
use App\AFT\SMSSettings;
use App\Http\Controllers\ContactTemplateController;
use Excel;

class SendSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = MessageLog::all();
        $recipients = ContactTemplate::all();
        $messagetemplates = MessageTemplate::all();

        return view('sms.index',['messages' => $messages,'recipients'=>$recipients,'messagetemplates' => $messagetemplates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'recepient'=> 'required',
                'message'=> 'required',
                'select' => 'nullable'
            ]);

        if(isset($data['select'])){

            if(!$response = $this->sendGroupMessage($request)){

                flash('The africastalking credentials are not correct')->error()->important();

                return redirect()->back();

            }

        } else{
            //validate phone


            if(!$this->validatePhone($request->recepient)){

                flash('You have an invalid Phone number, required number format is +2547.... ')->warning();

                return redirect()->back()->withInput();
            }
            $response = SMSSettings::sendSMS($request->recepient , $request->message);

            if($response == null){

                flash('The africastalking credentials are not correct')->error()->important();

                return redirect()->back();
            }
            foreach($response as $result){
                MessageLog::create([
                    'contact' => $request->recepient,
                    'message' => $request->message,
                    'message_id' => $result->messageId,
                    'status' => $result->status
                ]);
            }


        }
        flash('Message sent successfully')->success();


        return redirect()->route('sms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportSMS()
    {

        return Excel::download(new MessageLog, 'smslog.xlsx');

    }


    public function sendGroupMessage($request)
    {
        $contact = ContactTemplate::where('id',$request->recepient)->first();
        $message = MessageTemplate::where('id',$request->message)->first();

        $response = SMSSettings::sendSMS($contact->phone , $message->message);

        if($response == null){

            return false;
        }

        foreach($response as $result){

            MessageLog::create([
                'name' => $contact->name,
                'contact' => $result->number,
                'message' => $message->message,
                'message_id' => $result->messageId,
                'status' => $result->status
            ]);
        }

        return $response;
    }

    public  function validatePhone($contact)
    {
        $contact = explode(',', $contact);

        foreach($contact as $phone){
            if(!preg_match("/(0|\+?254)7([0-3|7])(\d){7}/",$phone)){

                return false;

            }
        }

        return true;
    }
}
