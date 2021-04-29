<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use Illuminate\Http\Request;
use DB;

class CarrierController extends Controller
{
    
    public function index()
    {
        return view('admin-side.all-carier');
    }
    
    public function showCarier(Request $request)
    {
        $data = DB::select('SELECT c.*, ai.airline_name, ai.airline_code, p.passenger_name, ar.airport_code FROM carriers c JOIN airlines ai JOIN airports ar JOIN passengers p WHERE c.airline_id = ai.id AND c.airport_code = ar.id AND c.passenger_id = p.id');
        return $data;
    }
    
    public function addCarier()
    {
        return view('admin-side.add-carier');
    }
    
    public function storeCarier(Request $request)
    {
        $data = $request->all();
        $res = Carrier::create([
            'airline_id'=>$data['airline_id'],
            'passenger_id'=>$data['passenger_id'],
            'airline_code'=>$data['airline_code'],
            'pnr'=>$data['pnr'],
            'airport_code'=>$data['airport_code'],
            'type'=>$data['type'],
            'purchase'=>$data['purchase'],
            'sale'=>$data['sale'],
            'date'=>$data['date'],
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
    
    public function editCarier(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from carriers where id = '$id'");
        return $data;
    }
    
    public function updateCarier(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('carriers')
                    ->where('id',$id)
                    ->update( [ 'airline_id'=>$data['airline_id'], 'passenger_id'=>$data['passenger_id'],
                    'airline_code'=>$data['airline_code'],
                    'pnr'=>$data['pnr'],
                    'airport_code'=>$data['airport_code'],
                    'type'=>$data['type'],
                    'purchase'=>$data['purchase'],
                    'sale'=>$data['sale'],
                    'date'=>$data['date'],
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
    
    public function deleteCarier(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('carriers')->where('id',$id)->delete();
        return $data;
    }

    
}
