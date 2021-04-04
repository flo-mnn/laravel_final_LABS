<?php

namespace App\Http\Controllers;

use App\Models\Flaticon;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isWebmaster');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services',[
            'services'=>Service::all(),
            'currentPage' => 'dashboard',
            'middlePage'=> null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create.services',[
            'services'=>Service::all(),
            'flaticons'=>Flaticon::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'icon'=>'required|max:100',
            'title'=>'required|max:500',
            'text'=>'required|max:1000',
        ]);

        $service = new Service();
        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->text = $request->text;
        $service->save();

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $flaticons =Flaticon::all();

        return view('admin.edit.services', compact('service','flaticons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validate = $request->validate([
            'icon'=>'required|max:100',
            'title'=>'required|max:500',
            'text'=>'required|max:1000',
        ]);

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->text = $request->text;
        $service->save();

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back();
    }
}
