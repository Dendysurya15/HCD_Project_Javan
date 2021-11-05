<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMaster;
use App\Models\PersonalInformation;
use App\Models\RelatedInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    //
    public function show()
    {

        $id_employee = Auth::user()->id;
        // dd(Auth::user()->jobtitle);
        $person_info = PersonalInformation::where('id_master', $id_employee)->first();
        $related_info = RelatedInformation::where('id_master', $id_employee)->first();


        //umur
        $ageNow = $person_info->date_of_birth;
        $lcse = $person_info->license_expire_date;
        $format_date_of_birth = Carbon::parse($ageNow)->toFormattedDateString();
        $license_expire_date = Carbon::parse($lcse)->format('d-m-Y');
        $age = Carbon::parse($ageNow)->age;

        return view('employee.profile', compact('person_info', 'age', 'related_info', 'format_date_of_birth', 'license_expire_date'));
    }


    public function edit_person_info($id)
    {
        $person_info = PersonalInformation::find($id);

        return view('employee.edit_person', compact('person_info'));
    }

    public function update_person_info(Request $request, $id)
    {
        // $this->validate($request, [
        //     'employee_id' => 'integer',
        //     'other_id' => 'integer',
        //     'driver_license_number' => 'integer',
        // ]);

        // $original = PersonalInformation::find($id);

        // $original->last_name = $request->last_name;
        // $original->update();

        // dd($input['first_name']->isDirty());
        // if (!empty($request->all())) {
        //     return "ads";
        // } else {
        //     return "kjlkjfasd";
        // }

        $input = $request->all();
        if ($request->hasFile('image')) {
            Storage::delete(public_path('storage/' . $input['image']));
            $input['image'] = $input['image']->store('images', 'public');
        } else {
            $input['image'] = null;
        }

        //update
        PersonalInformation::find($id)->update($input);


        $newUpdate =  PersonalInformation::find($id);

        $employee = EmployeeMaster::find($newUpdate->id_master);
        // dd($input['last_name']);
        $employee->first_name = $input['first_name'];
        $employee->middle_name = $input['middle_name'];
        $employee->last_name = $input['last_name'];
        $employee->update();
        // $person_info = PersonalInformation::find($id);
        // $person_info->first_name = $request->first_name;
        // $person_info->middle_name = $request->middle_name;
        // $person_info->last_name = $request->last_name;
        // $person_info->gender = $request->gender;
        // $person_info->place_of_birth = $request->place_of_birth;
        // $person_info->date_of_birth = $request->date_of_birth;
        // $person_info->marital_status = $request->marital_status;
        // $person_info->nationality = $request->nationality;
        // $person_info->employee_id = $request->employee_id;
        // $person_info->other_id = $request->other_id;
        // $person_info->driver_license_number = $request->driver_license_number;
        // $person_info->license_expire_date = $request->license_expire_date;


        // if ($newUpdate->isDirty()) {
        return redirect('/profile')->with(['success_update_person' => 'The data has been updated!!!']);
        // } else {
        //     return redirect('/profile')->with(['no_update' => 'Finally made it!!']);
        // }
    }



    public function edit_related_info($id)
    {
        $related_info = RelatedInformation::find($id);
        return view('employee.edit_related', compact('related_info'));
    }

    public function update_related_info(Request $request, $id)
    {
        $this->validate($request, [
            'bpjs_kesehatan' => 'integer',
            'bpjs_ketenagakerjaan' => 'integer',
            'no_ijazah' => 'integer',
            'no_kk' => 'integer',
            'npwp' => 'integer',
            'rek_payroll' => 'integer',
        ]);

        $input = $request->all();

        //update
        RelatedInformation::find($id)->update($input);

        // $related_info = RelatedInformation::find(($id));
        // $related_info->telegram = $request->telegram;
        // $related_info->linkedin = $request->linkedin;
        // $related_info->facebook = $request->facebook;
        // $related_info->instagram = $request->instagram;
        // $related_info->bpjs_kesehatan = $request->bpjs_kesehatan;
        // $related_info->bpjs_ketenagakerjaan = $request->bpjs_ketenagakerjaan;
        // $related_info->gol_darah = $request->gol_darah;
        // $related_info->no_ijazah = $request->no_ijazah;
        // $related_info->no_kk = $request->no_kk;
        // $related_info->npwp = $request->npwp;
        // $related_info->rek_payroll = $request->rek_payroll;

        // $related_info->update();

        // if ($related_info->isClean()) {
        return redirect('/profile')->with(['success_update_related' => 'The data has been updated!!!']);
        // }
        // return back()->with('error', 'There some error when update the data!!!');
    }
}
