<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Institution;

class TeacherController extends Controller
{
    public function view($id)
    {
        return Teacher::findOrFail($id)->toJson();
    }

    public function create(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'institution_id' => 'required',
            ]
        );

        $institution = Institution::findOrFail($request->get('institution_id'));

        $teacher = new Teacher();
        $teacher->name = $request->get('name');
        $institution->addTeacher($teacher);

        return response('', 201);
    }

    public function all()
    {
        return Teacher::all();
    }
}
