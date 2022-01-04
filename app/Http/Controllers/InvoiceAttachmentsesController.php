<?php

namespace App\Http\Controllers;

use App\invoice_attachmentses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class InvoiceAttachmentsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);
            
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
    
            $attachmentses =  new invoice_attachmentses();
            $attachmentses->file_name = $file_name;
            $attachmentses->invoice_number = $request->invoice_number;
            $attachmentses->invoice_id = $request->invoice_id;
            $attachmentses->Created_by = Auth::user()->name;
            $attachmentses->save();
               
            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachmentses/'. $request->invoice_number), $imageName);
            
            session()->flash('Add', 'تم اضافة المرفق بنجاح');
            return back();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoice_attachmentses  $invoice_attachmentses
     * @return \Illuminate\Http\Response
     */
    public function show(invoice_attachmentses $invoice_attachmentses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoice_attachmentses  $invoice_attachmentses
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice_attachmentses $invoice_attachmentses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoice_attachmentses  $invoice_attachmentses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice_attachmentses $invoice_attachmentses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoice_attachmentses  $invoice_attachmentses
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice_attachmentses $invoice_attachmentses)
    {
        //
    }
}
