<?php

namespace App\Http\Controllers;

use App\Models\passenger;
use Illuminate\Http\Request;
use DB;

class PassengerController extends Controller
{
    
    public function index()
    {
        return view('admin-side.all-passenger');
    }
    
    public function showPassenger()
    {
        $data = DB::select('select * from  passengers');
        return $data;
    }
    
    public function addPassenger()
    {
        return view('admin-side.add-passenger');
    }
    
    public function storePassenger(Request $request)
    {
        $data = $request->all();
        $res = passenger::create([
            'passenger_name'=>$data['passenger_name'],
            'father_name'=>$data['father_name'],
            'gender'=>$data['gender'],
            'dob'=>$data['dob'],
            'pass_no'=>$data['pass_no'],
            'cnic_no'=>$data['cnic_no'],
            'pass_issue_date'=>$data['pass_issue_date'],
            'pass_expiry_date'=>$data['pass_expiry_date'],
            'phone_no'=>$data['address'],
            'address'=>$data['address'],
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
    
    public function editPassenger(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from passengers where id = '$id'");
        return $data;
    }
    
    public function updatePassenger(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('passengers')
                    ->where('id',$id)
                    ->update( [ 'passenger_name'=>$data['passenger_name'], 'father_name'=>$data['father_name'],
                    'gender'=>$data['gender'],
                    'dob'=>$data['dob'],
                    'pass_no'=>$data['pass_no'],
                    'pass_issue_date'=>$data['pass_issue_date'],
                    'pass_expiry_date'=>$data['pass_expiry_date'],
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
}
