<?php

namespace App\Http\Controllers;

use DB;
use App\Employee;
use App\DailyTimeRecord;
use App\Position;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeEntriesController extends Controller
{
    public function index() {
        return view('time-entry');
    }

    public function storeOrUpdate() {
        $credentials = Employee::where(['email_address' => request()->email_address, 'password' => request()->password])->first();
        request()['date'] = date("Y-m-d"); // store current date in the request
        request()['time'] = date("H:i:s"); // store current time in the request
        if($credentials) { // Check if the username and password pair is correct
            $daily_time_record = DailyTimeRecord::where(['employee_id' => $credentials->id, 'date' => request()->date])->first();
            if($daily_time_record) { // If a record in DTR exists based on employee id and date
                if(request()->entry == "in") { // If user chose Time In
                    if($daily_time_record->time_in) { // If user has already timed in
                        $message_extension = " has already timed in at ".$daily_time_record->time_in;
                    } else { // If user hasn't timed in yet
                        $time_in_remarks = $this->getTimeInRemarks($credentials->id,  request()->time); 
                        // Get remarks 
                        $minutes_late = $this->getMinutesLate($credentials->id, request()->time); 
                        // Get minutes_late
                        $daily_time_record->update([
                            'time_in' => request()->time, 
                            'remarks' => $time_in_remarks, 
                            'minutes_late' => $minutes_late
                        ]); // Update time_in, remarks, and minutes_late
                        $message_extension = " successfully timed in at ".request()->time;
                    }
                } else { // If user chose Time Out
                    if(!$daily_time_record->time_in) { // If user hasn't timed in yet
                        $message_extension = " hasn't timed in yet!";
                    } else { // If user has timed in already
                        if ($daily_time_record->time_out){ // If user has already timed out
                            $message_extension = " has already timed out at ".$daily_time_record->time_out;
                        } else { // If user hasn't timed out yet
                            $hours_worked = Carbon::parse(request()->time)->diffInHours(Carbon::parse($daily_time_record->time_in));
                            $daily_time_record->update([
                                'time_out' => request()->time, 
                                'hours_worked' => $hours_worked]); // Update time_out and hours_worked
                            $message_extension = " successfully timed out at ".request()->time;
                        }
                    }
                }
            } else { // If a record in DTR doesn't exist yet
                if(request()->entry == "in") { // If user chose Time In
                    $dtr = new DailyTimeRecord;
                    $dtr->time_in = request()->time;
                    $dtr->date = request()->date;
                    $dtr->employee_id = $credentials->id;
                    // Get the position of the employee to access the shift_start and shift_end
                    $position = Employee::where('employees.id', $credentials->id)
                        ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
                    $dtr->shift_start = $position->shift_start;
                    $dtr->shift_end = $position->shift_end;
                    $dtr->remarks = $this->getTimeInRemarks($dtr->employee_id, $dtr->time_in);
                    $dtr->minutes_late = $this->getMinutesLate($dtr->employee_id, $dtr->time_in);
                    $dtr->save();
                    $message_extension = " successfully timed in at ".request()->time;
                } else { // If user chose Time Out
                    $message_extension = " hasn't timed in yet!";
                }
            }
            return redirect('/time-entry')->with('alert', $credentials->first_name." ".$credentials->last_name.$message_extension);
        } else {
            return redirect('/time-entry')->with('alert', "Incorrect email or password");
        }
    }

    public function getTimeInRemarks($employee_id, $time_in)
    {
        $position = Employee::where('employees.id', $employee_id)
                    ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
        // If time_in is later than shift_start, return 'Late', else, return 'Early'
        return $time_in > $position->shift_start ? 'Late' : 'Early'; 
    }

    public function getMinutesLate($employee_id, $time_in)
    {
        $position = Employee::where('employees.id', $employee_id)
                    ->join('positions', 'employees.position_id', '=', 'positions.id')->first();
        if($time_in > $position->shift_start) { 
            // If time_in is later than shift_start, return minutes_late
            return Carbon::parse($time_in)->diffInMinutes(Carbon::parse($position->shift_start));
        } else {
            return 0;
        }
    }
}
