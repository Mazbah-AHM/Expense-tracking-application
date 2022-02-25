<?php

namespace App\Http\Controllers;

use App\Models\Eyearly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EyearlyController extends Controller
{
    public function getYearly()
    {
        $data = Eyearly::all();
        $id = Auth::id();
        $year = $this->CurrentYear();
        $yearly_data = Eyearly::where('user_id','=',$id)->whereYear('created_at',$year)->get();
        return view('pages.yearly', compact('year','yearly_data'));
    }

    Public function CurrentYear(){
        $year = date('Y');
        return $year;
    }


    public function postYearly(Request $request){

        $yearly = new Eyearly();
        $yearly->user_id = Auth::id();
        $yearly->rent = $request->rent;
        $yearly->food = $request->food;
        $yearly->travel = $request->travel;
        $yearly->car = $request->car;
        $yearly->tution = $request->tution;
        $yearly->others = $request->others;
        $yearly->target = $request->target;
        $yearly->save();
        return redirect('dashboard');
    }

    public function YearlyExpense(){
        $year = $this->CurrentYear();
        $id = Auth::user()->id;
        $monthly_data = Eyearly::where('user_id','=',$id)->whereYear('created_at',$year)->get();
        foreach($monthly_data as $key){
            $total_expense_for_year = $key->rent + $key->food + $key->travel + $key->car + $key->tution + $key->others;
            if($total_expense_for_year < $key->target){
                $update = Eyearly::find($key->id);
                $update->y_condition = "Healthy";
                $update->save();
            }elseif($total_expense_for_year == $key->target){
                $update = Eyearly::find($key->id);
                $update->y_condition = "Critical";
                $update->save();
            }elseif($total_expense_for_year > $key->id){
                $update = Eyearly::find($key->id);
                $update->y_condition = "Over Budget";
                $update->save();
            }else{
                $update = Eyearly::find($key->id);
                $update->y_condition = "Pending";
                $update->save();
            }
        }
        $year_data = Eyearly::where('user_id','=',$id)->whereYear('created_at',$year)->get();
        
        return view('pages.yearlyexpense',compact('year','year_data'));
    }
}
