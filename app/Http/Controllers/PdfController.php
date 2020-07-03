<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pdf = PDF::all();
       return view('pdf.index',compact('pdf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pdf = new Pdf();
        $pdf->pdf = $request->pdf;
        $pdf->name = $request->name;
        if ($request->hasFile('epub')) {
         $pdf->pdf = $request->file('epub')->store('uploads', 's3');
        //$path = $request->file('epub')->store('uploads','s3');
        Storage::disk('s3')->setVisibility($pdf->pdf,'public');
        $urlAmazon = Storage::disk('s3')->url($pdf->pdf);
        }
        $pdf->save();
        //return $urlAmazon;
        return redirect()->route('pdf.index',$pdf->id)->with('info','Libro guardado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pdf $pdf)
    {
        //$pdf = Storage::disk('s3')->response($pdf->pdf);
        //$pdf = Storage::disk('s3')->url($pdf->pdf);
        //return  dd($pdf);
        return view('pdf.show', compact('pdf'));
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
}
