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
        request()['date'] = date("Y-m-d");
        request()['time'] = date("H:i:s");
        if($credentials) {
            $dtrUpdate = DailyTimeRecord::where(['employee_id' => $credentials->id, 'date' => request()->date])->first();
            // does dtr exists
            if($dtrUpdate) {
                // has time in
                if($dtrUpdate->time_in) {
                    $message_extension = " has timed in already at ".request()->time;
                } else {
                    $time_in_remarks = $this->getTimeInRemarks($credentials->employee_id,  request()['time']);
                    $minutes_late = $this->getMinutesLate($credentials->employee_id, request()->time);
                    $dtrUpdate->update(['time_in' => request()->time, 
                        'remarks' => $time_in_remarks, 
                        'minutes_late' => $minutes_late
                    ]);
                    $message_extension = " has timed in at ".request()->time;
                }
                return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name.$message_extension);
            } else {
                $dtr = new DailyTimeRecord;
                $dtr->time_in = request()->time;
                $dtr->date = request()->date;
                $dtr->employee_id = $credentials->id;
                $position = Employee::where('employees.id', $credentials->id)
                    ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
                $dtr->shift_start = $position->shift_start;
                $dtr->shift_end = $position->shift_end;

                $dtr->remarks = $this->getTimeInRemarks($dtr->employee_id, $dtr->time_in);
                $dtr->minutes_late = $this->getMinutesLate($dtr->employee_id, $dtr->time_in);
                
                $dtr->save();
                return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name." timed in at ".request()->time);
            }
        } else {
            return redirect('/time-entry')->with('alert', "Incorrect username or password");
        }
    }

    public function getTimeInRemarks($employee_id, $time_in)
    {
        $position = Employee::where('employees.id', $employee_id)
                    ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
        return $time_in > $position->shift_start ? 'Late' : 'Early';
    }

    public function getMinutesLate($employee_id, $time_in)
    {
        $position = Employee::where('employees.id', $employee_id)
                    ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
        $minutes_late = Carbon::parse($time_in)->diffInMinutes(Carbon::parse($position->shift_start));
        if($minutes_late > 0) {
            return $minutes_late;
        }
        return 0;
    }

    public function update() {
        $credentials = Employee::where(['username' => request()->username, 'password' => request()->password])->first();
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
