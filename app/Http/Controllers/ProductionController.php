<?php

namespace App\Http\Controllers;

use App\Production;
use App\Order;
use App\Thread;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productions = Production::all();
        return view('dashboard.productions.list')->with('productions',$productions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        $threads = Thread::all();
        return view('dashboard.productions.form')
                ->with('orders',$orders)
                ->with('threads',$threads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destinationPath = 'uploads_folder/production_logo'; $filename = null; $path_filename = null;
        if ($request->hasFile('production_logo')) {
            $file            = $request->file('production_logo');
            $destinationPath = 'uploads_folder/production_logo';
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename        = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess   = $file->move($destinationPath, $filename);
            $path_filename = 'uploads_folder/production_logo/'.$filename;

        }

        $production = new Production;
        $production->fill($request->all());

        $production->production_logo = $path_filename;
        $production->save();

        $production->production_thread()->attach($request->fk_thread_id);

        return redirect()->route('productions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        $orders = Order::all();
        $threads = Thread::all();
        return view('dashboard.productions.form')
                ->with('orders',$orders)
                ->with('production',$production)
                ->with('threads',$threads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        $production->production_thread()->detach($production->fk_thread_id);

        $production->fill($request->all());

        $destinationPath = 'uploads_folder/production_logo'; $filename = null; $path_filename = null;
        if ($request->hasFile('production_logo')) {
            $file            = $request->file('production_logo');
            $destinationPath = 'uploads_folder/production_logo';
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename        = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess   = $file->move($destinationPath, $filename);
            $path_filename = 'uploads_folder/production_logo/'.$filename;
            $production->production_logo = $path_filename;

        }

        $production->save();

        $production->production_thread()->attach($request->fk_thread_id);

        return redirect()->route('productions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        //
    }
}
