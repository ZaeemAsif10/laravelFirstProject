<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use DB;

class AirlineController extends Controller
{
    public function index()
    {
        return view('admin-side.all-airline');
    }
    
    public function showAirline()
    {
        $data = DB::select('select * from airlines');
        return $data;
    }
    
    public function addAirline()
    {
        return view('admin-side.add-airline');
    }
    
    public function storeAirline(Request $request)
    {
        $data = $request->all();
        $res = Airline::create([
            'airline_name'=>$data['airline_name'],
            'airline_code'=>$data['airline_code'],
            'airline_country'=>$data['airline_country'],
            'description'=>$data['description'],
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
    
    public function editAirline(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from airlines where id = '$id'");
        return $data;
    }
    
    public function updateAirline(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('airlines')
                    ->where('id',$id)
                    ->update( [ 'airline_name'=>$data['airline_name'], 'airline_code'=>$data['airline_code'],
                    'airline_country'=>$data['airline_country'],
                    'description'=>$data['description']
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
    
    public function deleteAirline(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('airlines')->where('id',$id)->delete();
        return $data;
    }
    
}
