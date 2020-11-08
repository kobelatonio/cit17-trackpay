<?php

namespace App\Http\Controllers;

use DB;
use App\Employee;
use App\DailyTimeRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeEntriesController extends Controller
{
    public function index() {
        return view('time-entry');
    }

    public function storeOrUpdate() {
        $credentials = Employee::where(['username' => request()->username, 'password' => request()->password])->first();
        date_default_timezone_set('Asia/Manila');
        request()['date'] = date("Y-m-d");
        request()['time'] = date("H:i:s");
        if($credentials) {
            $dtrUpdate = DailyTimeRecord::where(['employee_id' => $credentials->id, 'date' => request()->date])->first();
            if($dtrUpdate) {
                if($dtrUpdate->time_in) {
                    return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name." has timed in already!");
                } else {
                    if(request()->time > $dtrUpdate->shift_start) {
                        $minutes_late = Carbon::parse(request()->time)->diffInMinutes(Carbon::parse($dtrUpdate->shift_start));
                        $dtrUpdate->update(['time_in' => request()->time, 'remarks' => 'Late', 'minutes_late' => $minutes_late]);
                    } else {
                        $dtrUpdate->update(['time_in' => request()->time, 'remarks' => 'Early', 'minutes_late' => 0]);
                    }
                    return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name." timed in at ".request()->time);
                }
            } else {
                $dtr = new DailyTimeRecord;
                $dtr->time_in = request()->time;
                $dtr->date = request()->date;
                $dtr->employee_id = $credentials->id;
                $position = Employee::where('employees.id', $credentials->id)
                ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
                $dtr->shift_start = $position->shift_start;
                $dtr->shift_end = $position->shift_end;
                $dtr->remarks = request()->time > $position->shift_start ? 'Late' : 'Early';
                $minutes_late = Carbon::parse(request()->time)->diffInMinutes(Carbon::parse($position->shift_start));
                $dtr->minutes_late = $minutes_late;
                $dtr->save();
                return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name." timed in at ".request()->time);
            }
        } else {
            return redirect('/time-entry')->with('alert', "Incorrect username or password");
        }
    }

    public function update() {
        $credentials = Employee::where(['username' => request()->username, 'password' => request()->password])->first();
        date_default_timezone_set('Asia/Manila');
        request()['date'] = date("Y-m-d");
        request()['time'] = date("H:i:s");
        if($credentials) {
            $dtrUpdate = DailyTimeRecord::where(['employee_id' => $credentials->id, 'date' => request()->date])->first();
            if ($dtrUpdate->time_out){
                return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name." has timed out already!");
            } else {
                $hours_worked = Carbon::parse(request()->time)->diffInHours(Carbon::parse($dtrUpdate->time_in));
                $dtrUpdate->update(['remarks' => 'Late', 'time_out' => request()->time, 'hours_worked' => $hours_worked]);
                return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name." timed out at ".request()->time);
            }
        } else {
            return redirect('/time-entry')->with('alert', "Incorrect username or password");
        }
    }
}
