<?php

namespace App\Http\Controllers;

use App\Models\Emonthly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EyearlyController;


class EmonthlyController extends Controller
{
    public function getMonthly()
    {
        $data = Emonthly::all();
        $id = Auth::id();
        $month_int = date('m');

        $monthly_data = Emonthly::where('user_id','=',$id)->whereMonth('created_at',$month_int)->get();

        $month = $this->CurrentMonth();
        return view('pages.monthly', compact('month','monthly_data'));
    }

    public function CurrentMonth(){
        $mnth = date('m');


        if ($mnth == 1) {
            $month = "January";
        } elseif($mnth == 2) {
            $month = "February";
        } elseif($mnth == 3) {
            $month = "March";
        } elseif($mnth == 4) {
            $month = "April";
        } elseif($mnth == 5) {
            $month = "May";
        } elseif($mnth == 6) {
            $month = "June";
        } elseif($mnth == 7) {
            $month = "July";
        } elseif($mnth == 8) {
            $month = "August";
        } elseif($mnth == 9) {
            $month = "September";
        } elseif($mnth == 10) {
            $month = "October";
        } elseif($mnth == 11) {
            $month = "November";
        } elseif($mnth == 12) {
            $month = "December";
        }else{
            $month = "Unknown";
        }
        return $month;
    }


    public function postMonthly(Request $request){
        // dd(Auth::id());

        $monthly = new Emonthly();
        $monthly->user_id = Auth::id();
        $monthly->rent = $request->rent;
        $monthly->food = $request->food;
        $monthly->travel = $request->travel;
        $monthly->car = $request->car;
        $monthly->tution = $request->tution;
        $monthly->others = $request->others;
        $monthly->target = $request->target;
        $monthly->save();
        return redirect('dashboard');
    }

    public function Expenses(){
        $month = $this->CurrentMonth();
        $month_int = date('m');
        $data = new EyearlyController;
        $year = $data->CurrentYear();
        $id = Auth::user()->id;

        $monthly_data = Emonthly::where('user_id','=',$id)->whereMonth('created_at',$month_int)->get();
        foreach($monthly_data as $key){
            $total_expense_for_month = $key->rent + $key->food + $key->travel + $key->car + $key->tution + $key->others;
            if($total_expense_for_month < $key->target){
                $update = Emonthly::find($key->id);
                $update->m_condition = "Healthy";
                $update->save();
            }elseif($total_expense_for_month == $key->target){
                $update = Emonthly::find($key->id);
                $update->m_condition = "Critical";
                $update->save();
            }elseif($total_expense_for_month > $key->id){
                $update = Emonthly::find($key->id);
                $update->m_condition = "Over Budget";
                $update->save();
            }else{
                $update = Emonthly::find($key->id);
                $update->m_condition = "Pending";
                $update->save();
            }
        }
        $month_data = Emonthly::where('user_id','=',$id)->whereMonth('created_at',$month_int)->get();


        return view('pages.expenses',compact('month','year','month_data'));
    }

}
