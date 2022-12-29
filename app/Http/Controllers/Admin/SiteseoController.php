<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Siteseo;
use Illuminate\Http\Request;

class SiteseoController extends Controller
{
    public function __construct()
    {
       $this->middleware('can:site_seo')->only('index');
        $this->middleware('can:edit_site_seo')->only('edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteseo=Siteseo::all();
       return view('Admin.site.seoindex',compact('siteseo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.site.seoadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'site_title'=>'required|max:191',
            'site_description'=>'required|max:191',
            'site_keyword'=>'max:191',
            'lang'=>'unique:siteseos'
        ]);

        $add=Siteseo::create($request->all());
        return redirect(route('siteseo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siteseo  $siteseo
     * @return \Illuminate\Http\Response
     */
    public function show(Siteseo $siteseo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siteseo  $siteseo
     * @return \Illuminate\Http\Response
     */
    public function edit(Siteseo $siteseo)
    {
        return view('Admin.site.seoedit',compact('siteseo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siteseo  $siteseo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siteseo $siteseo)
    {
       $a= $request->validate([
            'site_title'=>'required|max:191',
            'site_description'=>'required|max:191',
            'site_keyword'=>'max:191',
            'lang'=>'unique:siteseos,lang,'.$siteseo->id,
        ]);

        $siteseo->update($request->all());
        return redirect(route('siteseo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siteseo  $siteseo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siteseo $siteseo)
    {
        //
    }
}
