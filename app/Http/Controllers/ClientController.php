<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$clients = Client::orderBy('created_at', 'desc')->get();
        return view('dashboard.clients.list')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $destinationPath = 'uploads_folder/logos'; $filename = null; $path_filename = null;
        if ($request->hasFile('logo')) {
            $file            = $request->file('logo');
            $destinationPath = 'uploads_folder/logos';
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename        = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess   = $file->move($destinationPath, $filename);
            $path_filename = 'uploads_folder/logos/'.$filename;
        }

        $client = new Client;
        $client->fill($request->all());
		$client->client_logo = $path_filename;

        $client->save();
		return redirect()->route('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.clients.form')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->fill($request->all());

        $destinationPath = 'uploads_folder/logos'; $filename = null; $path_filename = null;
        if ($request->hasFile('logo')) {
            $file            = $request->file('logo');
            $destinationPath = 'uploads_folder/logos';
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename        = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess   = $file->move($destinationPath, $filename);
            $path_filename = 'uploads_folder/logos/'.$filename;
            $client->client_logo = $path_filename;
        }

        $client->save();

        return redirect()->route('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients');
    }
}
