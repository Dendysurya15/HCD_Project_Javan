<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMaster;
use App\Models\LeaveCatergory;
use App\Models\LeaveData;
use Database\Seeders\LeaveCategory;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    //
    public function page_ask_leave()
    {
        $leavecategories =  LeaveCatergory::all();


        $id_emp =  Auth::user()->id;

        $historyleave = LeaveData::with('employeemasters')->where('id_master', $id_emp)->orderBy('created_at', 'desc')->get();


        // app('debugbar')->debug($historyleave->id);
        // Debugbar::debug($historyleave[0]->id_leaveCategories);

        // dd($historyleave->statusreport->first_name);


        return view('employee.ask_leave_page', compact('leavecategories', 'historyleave'));
    }

    public function store_leave(Request $request)
    {

        $input = $request->all();
        $input['id_master'] = Auth::user()->id;

        LeaveData::create($input);
        $id_leaveCtg = $input['id_leaveCategories'];
        $leaveCtg  = LeaveCatergory::where('id', $id_leaveCtg)->first();
        $leaveName = $leaveCtg->name;

        return redirect('/ask_leave_page')->with(['success_leave' =>  $leaveName . ' has been successfully submitted']);
    }
}
