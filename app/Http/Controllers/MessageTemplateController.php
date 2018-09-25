<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageTemplate;

class MessageTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $templates = MessageTemplate::get();
        return view('messages.index',['templates'=>$templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->validate([
                'name' => 'required|unique:message_templates',
                'message' => 'required'
            ]);

        $templates = MessageTemplate::create($data);

        flash('New Message Template created successfully')->success();

        return redirect()->route('message-template.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

            $template = MessageTemplate::find($id);

        return view('messages.show',['template' => $template]);
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
        $data = $request->validate([
                'name' => 'required|unique:message_templates',
                'message' => 'required'
            ]);
        MessageTemplate::where('id',$id)->update($data);

        return view('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MessageTemplate::where('id',$id)->delete();

        flash('Message Template deleted successfully')->success();

        return redirect()->route('message-template.index');
    }
}
