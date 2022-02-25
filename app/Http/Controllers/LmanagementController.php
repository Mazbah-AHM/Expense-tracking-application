<?php

namespace App\Http\Controllers;

use App\Models\Lmanagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LmanagementController extends Controller
{
    public function getLoan()
    {
        return view('pages.loan');
    }


    public function postLoan(Request $request){
        // dd(Auth::id());

        $loan = new Lmanagement();
        $loan->user_id = Auth::id();
        $loan->name = $request->name;
        $loan->cause = $request->cause;
        $loan->amount = $request->amount;
        $loan->duration = $request->duration;
        $loan->save();
        return redirect('dashboard');
    }

    public function RepayLoan(){
        $id = Auth::id();

        $data = Lmanagement::where('user_id',$id)->get();

        return view('pages.repayloan',compact('data'));
    }

    public function PostRepayLoan(Request $request, $id){
        
        $data = Lmanagement::find($id);
        $data->amount = $data->amount - $request->amount;
        if($data->amount<=0){
            $data->status = "paid";
        }
        $data->save();
        return redirect()->back();
    }

    public function Paid(){
        $id = Auth::id();
        $data = Lmanagement::where('user_id',$id)->where('amount', '<=', 0)->get();
        return view('pages.paid',compact('data'));
    }
}
