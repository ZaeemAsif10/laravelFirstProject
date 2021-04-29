<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{
    
    public function index()
    {
        return view('admin-side.all-transection');
    }
    
    public function showTransection()
    {
        $data = DB::select('SELECT tr.*, b.bank_name,b.branch_name,p.party_name FROM transactions tr  JOIN banks b JOIN parties p  WHERE tr.bank_id = b.id AND tr.party_id = p.id');
        return $data;
    }
    
    public function addTransection()
    {
        return view('admin-side.add-transection');
    }
    
    public function storeTransection(Request $request)
    {
        $data = $request->all();
        $res = Transaction::create([
            'trans_type'=>$data['trans_type'],
            'bank_id'=>$data['bank_id'],
            'branch_id'=>$data['branch_id'],
            'party_id'=>$data['party_id'],
            'cheq_no'=>$data['cheq_no'],
            'amount'=>$data['amount'],
            'des'=>$data['des'],
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
    
    public function editTransection(Request $request)
    {
        $id = $request->input('id');
        $data = DB::select("select * from transactions where id = '$id'");
        return $data;
    }
    
    public function updateTransection(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        $data = DB::table('transactions')
                    ->where('id',$id)
                    ->update( [ 'trans_type'=>$data['trans_type'], 
                    'bank_id'=>$data['bank_id'],
                    'branch_id'=>$data['branch_id'],
                    'party_id'=>$data['party_id'],
                    'cheq_no'=>$data['cheq_no'],
                    'amount'=>$data['amount'],
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
    
    public function deleteTransection(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('transactions')->where('id',$id)->delete();
        return $data;
    }

}
