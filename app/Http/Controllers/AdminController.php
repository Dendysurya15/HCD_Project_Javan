<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMaster;
use App\Models\Jobtitle;
use App\Models\LeaveCatergory;
use App\Models\LeaveData;
use App\Models\PersonalInformation;
use App\Models\RelatedInformation;
use App\Models\StatusEmployee;
use App\Models\SubUnit;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function employee()
    {
        // $employee = EmployeeMaster::with('Supervisor')->orderBy('created_at', 'desc')->get();
        // dd($employee = EmployeeMaster::find(2)->jobtitle);
        // $employee = EmployeeMaster::with(['Jobtitle'])->first();
        // dd($employee->jobtitle->jobtitle_name);
        // $employee = EmployeeMaster::all();
        $employee = EmployeeMaster::with('supervisor', 'jobtitle', 'statusemployee', 'subunit')->get();

        // $employee = EmployeeMaster::where('id', 2)->with('supervisor', 'jobtitle', 'statusemployee', 'subunit')->get();
        return view('admin.employee', compact('employee'));
    }

    public function show_add()
    {

        $status = StatusEmployee::all();
        $jobtitle = Jobtitle::all();
        $supervisor = Supervisor::all();
        $subUnit = SubUnit::all();
        return view('admin.add', compact('status', 'jobtitle', 'supervisor', 'subUnit'));
    }

    public function store_employee(Request $request)
    {
        //code mislakn last 2 digit tahun berdiri javan
        $code_default = "08";
        //date now
        $time_now = Carbon::now();
        //get year
        $year =  Carbon::createFromFormat('Y-m-d H:i:s', $time_now)->year;
        //get last 2 digit year
        $code_year = substr($year, -2);


        $employee_count = EmployeeMaster::all()->count();
        $input = $request->all();
        $input['email'] = $input['first_name'] . $code_year . $employee_count . '@' . 'javan.corp';
        $input['password'] =  Hash::make($code_default . $code_year . $employee_count);

        $newEmployee = EmployeeMaster::create($input);

        //create personal_information
        $prs_info = new PersonalInformation;
        $prs_info->id_master =  $newEmployee->id;
        $prs_info->first_name = $input['first_name'];
        $prs_info->middle_name = $input['middle_name'];
        $prs_info->last_name = $input['last_name'];
        $prs_info->save();

        //create related information
        $rel_info = new RelatedInformation;
        $rel_info->id_master = $newEmployee->id;
        $rel_info->save();

        return redirect('/employee')->with(['success_add' => 'Employee added successfully!!!']);
    }


    public function show_edit($id)
    {

        $status = StatusEmployee::all();
        $jobtitle = Jobtitle::all();
        $supervisor = Supervisor::all();
        $subUnit = SubUnit::all();
        $employee = EmployeeMaster::find($id);
        return view('admin.edit', compact('employee', 'status', 'jobtitle', 'supervisor', 'subUnit'));
    }

    public function update_employee(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'employee_id' => 'required',
            'status_id' => 'required',
            'supervisor_id' => 'required',
            'job_title_id' => 'required',
            'sub_unit_id' => 'required',
        ]);

        $input = $request->all();
        $currentEmployee = EmployeeMaster::find($id);
        EmployeeMaster::find($id)->update($input);

        $prs_info = PersonalInformation::where('id_master', $id)->first();
        $prs_info->first_name = $input['first_name'];
        $prs_info->middle_name = $input['middle_name'];
        $prs_info->last_name = $input['last_name'];
        $prs_info->update();

        return redirect('/employee')->with(['success_edit' => 'Employee ID ' . $currentEmployee->employee_id . ' edit successfully!!!']);
    }


    public function leave_list()
    {

        $leave_data = LeaveData::orderBy('created_at', 'desc')->get();
        return view('admin.leave_list', compact('leave_data'));
    }

    public function deactived_account($id)
    {
        $employee = EmployeeMaster::find($id);
        $employee->status_account = 0;
        $employee->update();

        return redirect('/employee')->with(['deactived_account' => 'Employee ID ' . $employee->employee_id . ' account successfully deactivated!!!']);
    }

    public function actived_account($id)
    {
        $employee = EmployeeMaster::find($id);
        $employee->status_account = 1;
        $employee->update();

        return redirect('/employee')->with(['actived_account' => 'Employee ID ' . $employee->employee_id . ' account successfully activated!!!']);
    }

    public function accepted_leave($id)
    {
        $leave_data = LeaveData::find($id);
        $leave_data->id_status_report = 2;
        $leave_data->update();

        $leave_data_id = $leave_data->id_leaveCategories;
        $leaveCtg  = LeaveCatergory::where('id', $leave_data_id)->first();
        $leaveName = $leaveCtg->name;

        return redirect('/leavepage')->with(['accept_leave' => $leaveName . ' applications are accepted ']);
    }

    public function rejected_leave($id)
    {
        $leave_data = LeaveData::find($id);
        $leave_data_id = $leave_data->id_leaveCategories;
        $leave_data->id_status_report = 3;
        $leave_data->update();

        $leaveCtg  = LeaveCatergory::where('id', $leave_data_id)->first();
        $leaveName = $leaveCtg->name;

        return redirect('/leavepage')->with(['reject_leave' => $leaveName . ' applications are rejected ']);
    }
}
