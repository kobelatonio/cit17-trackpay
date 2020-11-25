<?php

namespace App\Http\Controllers;

use Auth;
use App\Employee;
use App\DailyTimeRecord;
use App\Position;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeEntriesController extends Controller
{
    public function index() {
        if(count(Employee::get()) == 0) {
            Return back()->withErrors([
                'error' => 'An employee has to be registered first.'
            ]);
        } else {
            return view('time-entry');
        }
    }

    public function storeOrUpdate() {
        $validated_fields = request()->validate([ 
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $employee = Auth::guard('employee')->user(); // Get the authenticated employee
        request()['date'] = date("Y-m-d"); // store current date in the request
        request()['time'] = date("H:i:s"); // store current time in the request
        if(Auth::guard('employee')->attempt($validated_fields)) { 
            // Check if the email and password pair is correct
            if($employee->daily_time_records()->where('date', request()->date)->first()) { 
            // If an employee has a record in DTR based on the date
                $daily_time_record = $employee->daily_time_records()->where('date', request()->date)->first();
                if(request()->entry == "in") { // If user chose Time In
                    if($daily_time_record->time_in) { // If user has already timed in
                        $message_extension = " has already timed in at ".$daily_time_record->formatted_time_in;
                    } else { // If user hasn't timed in yet
                        $time_in_remarks = $this->getTimeInRemarks($employee->id,  request()->time); 
                        // Get remarks 
                        $minutes_late = $this->getMinutesLate($employee->id, request()->time); 
                        // Get minutes_late
                        $daily_time_record->update([
                            'time_in' => request()->time, 
                            'remarks' => $time_in_remarks, 
                            'minutes_late' => $minutes_late
                        ]); // Update time_in, remarks, and minutes_late
                        $message_extension = " successfully timed in at ".$daily_time_record->formatted_time_in;
                    }
                } else { // If user chose Time Out
                    if(!$daily_time_record->time_in) { // If user hasn't timed in yet
                        $message_extension = " hasn't timed in yet!";
                    } else { // If user has timed in already
                        if ($daily_time_record->time_out){ // If user has already timed out
                            $message_extension = " has already timed out at ".$daily_time_record->formatted_time_out;
                        } else { // If user hasn't timed out yet
                            $hours_worked = Carbon::parse(request()->time)->diffInHours(Carbon::parse($daily_time_record->time_in));
                            $daily_time_record->update([
                                'time_out' => request()->time, 
                                'hours_worked' => $hours_worked]); // Update time_out and hours_worked
                            $message_extension = " successfully timed out at ".$daily_time_record->formatted_time_out;
                        }
                    }
                }
            } else { // If a record in DTR doesn't exist yet
                if(request()->entry == "in") { // If user chose Time In
                    $dtr = new DailyTimeRecord;
                    $dtr->time_in = request()->time;
                    $dtr->date = request()->date;
                    $dtr->employee_id = $employee->id;
                    $dtr->shift_start = $employee->position->shift_start;
                    $dtr->shift_end = $employee->position->shift_end;
                    $dtr->remarks = $this->getTimeInRemarks($employee->id, request()->time);
                    $dtr->minutes_late = $this->getMinutesLate($employee->id, request()->time);
                    $dtr->save();
                    $message_extension = " successfully timed in at ".$dtr->formatted_time_in;
                } else { // If user chose Time Out
                    $message_extension = " hasn't timed in yet!";
                }
            }
            Auth::logout(); 
            return redirect('/time-entry')->withErrors(['alert' => $employee->full_name.$message_extension]);
        }        
        Return back()->withErrors([
            'credentials' => 'Incorrect email or password'
        ]);
    }

    public function getTimeInRemarks($employee_id, $time_in)
    {
        return $time_in > Employee::find($employee_id)->position->shift_start ? 'Late' : 'Early'; 
    }

    public function getMinutesLate($employee_id, $time_in)
    {
        if($time_in > Employee::find($employee_id)->position->shift_start) { 
            // If time_in is later than shift_start, return minutes_late
            return Carbon::parse($time_in)->diffInMinutes(Carbon::parse(Employee::find($employee_id)->position->shift_start));
        } else {
            return 0;
        }
    }
}
