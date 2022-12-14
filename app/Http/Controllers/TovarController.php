<?php

namespace App\Http\Controllers;

use App\Http\Requests\TovarValidation;
use App\Models\Tovar;
use Illuminate\Http\Request;

class TovarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tovars = Tovar::all();
        return view('tovars.index',compact('tovars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tovars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(TovarValidation $request)
    {
        $requests = $request->validated();
        unset($requests['photo']);
        $photo = $request->file('photo')->store('public');
        $requests['photo']=explode('/',$photo)[1];
        Tovar::create($requests);
        $tovars = Tovar::all();
        return view('tovars.index',compact('tovars'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function show(TovarValidation $request, Tovar $tovar)
    {
        $requests = $request->validated();
        if ($requests['photo']!=null){
            unset($requests['photo']);
            $photo = $request->file('photo')->store('public');
            $requests['photo']=explode('/',$photo)[1];
        }
        else
            unset($requests['photo']);
        $tovar->update($requests);
        $tovars = Tovar::all();
        return view('tovars.index',compact('tovars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function edit(Tovar $tovar)
    {
        return view('tovars.edit',compact('tovar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tovar $tovar)
    {
        $requests = $request->validated();
        if ($requests['photo']!=null){
            unset($requests['photo']);
            $photo = $request->file('photo')->store('public');
            $requests['photo']=explode('/',$photo)[1];
        }
        else
            unset($requests['photo']);
        Tovar::update($requests);
        $tovars = Tovar::all();
        return view('tovars.index',compact('tovars'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tovar  $tovar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tovar $tovar)
    {
        $tovar->delete();
        return back()->with('successDelete',true);
    }
}
