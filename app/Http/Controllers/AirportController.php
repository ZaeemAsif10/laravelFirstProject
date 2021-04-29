<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;
use DB;

class AirportController extends Controller
{
   
    public function index()
    {
        return view('admin-side.all-airport');
    }
    
    public function showAirport()
    {
        $data = DB::select('select * from airports');
        return $data;
    }
    
    public function addAirport()
    {
        return view('admin-side.add-airport');
    }
    
    public function storeAirport(Request $request)
    {
        $data = $request->all();
        $res = Airport::create([
            'airport_name'=>$data['airport_name'],
            'airport_code'=>$data['airport_code'],
            'airport_country'=>$data['airport_country'],
            'airport_city'=>$data['airport_city'],
        ]);
        
        if($res)
        {
            return back()
                ->with('success','Data Add Succesfully');
        }else{
            return back()
                ->with('success','Record Not Save');
        }
    }
    
    public function editAirport(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from airports where id = '$id'");
        return $data;
    }
    
    public function updateAirport(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('airports')
                    ->where('id',$id)
                    ->update( [ 'airport_name'=>$data['airport_name'], 'airport_code'=>$data['airport_code'],
                    'airport_country'=>$data['airport_country'],
                    'airport_city'=>$data['airport_city']
                    ]);
        
                    if($data)
                    {
                        return back()
                            ->with('success','Data Updated Succesfully');
                    }else{
                        return back()
                            ->with('failed','Record Not Update');
                    }
    }
    
    public function deleteAirport(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('airports')->where('id',$id)->delete();
        return $data;
    }
    
}
