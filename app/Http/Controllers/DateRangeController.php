<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateRangeController extends Controller
{
  function index()
    {
     return view('date_range');
    }
  function fetch_data(Request $request)
 {
  if($request->ajax())
  {
   if($request->from_date != '' && $request->to_date != '')
   {
    $data = \App\Karyawan::all()
      ->whereBetween('created_at', array($request->from_date, $request->to_date))
      ->get();
   }
   else
   {
    $data = \App\Karyawan::all()->orderBy('created_at', 'desc')->get();
   }
   echo json_encode($data);
  }
 }
}
