<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-side.all-bank');
    }
    
    public function showBank()
    {
        $data = DB::select('select * from banks');
        return $data;
    }
    
    public function addBank()
    {
        return view('admin-side.add-bank');
    }
    
    public function storeBank(Request $request)
    {
        $data = $request->all();
        $res = Bank::create([
            'bank_name'=>$data['bank_name'],
            'branch_name'=>$data['branch_name'],
            'city'=>$data['city'],
            'bank_code'=>$data['bank_code'],
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
    
    public function EditBank(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from banks where id = '$id'");
        return $data;
    }
    
    public function UpdateBank(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('banks')
                    ->where('id',$id)
                    ->update( [ 'bank_name'=>$data['bank_name'], 'branch_name'=>$data['branch_name'],
                    'city'=>$data['city'],
                    'bank_code'=>$data['bank_code']
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
    
    public function deleteeBank(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('banks')->where('id',$id)->delete();
        if($data)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
