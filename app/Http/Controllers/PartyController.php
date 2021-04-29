<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use DB;

class PartyController extends Controller
{
    public function index()
    {
        return view('admin-side.all-party');
    }
    
    public function showParty()
    {
        $data = DB::select('select * from parties');
        return $data;
    }
    
      public function addParty()
    {
        return view('admin-side.add-party');
    }
    
    public function storeParty(Request $request)
    {
        $data = $request->all();
        $res = Party::create([
            'party_name'=>$data['party_name'],
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
    
    public function editParty(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from parties where id = '$id'");
        return $data;
    }
    
    public function updateParty(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('parties')
                    ->where('id',$id)
                    ->update([ 
                    'party_name'=>$data['party_name'], 
                    'description'=>$data['description'],
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
    
    public function deleteParty(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('parties')->where('id',$id)->delete();
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
