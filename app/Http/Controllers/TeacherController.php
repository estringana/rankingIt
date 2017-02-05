<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    public function view($id)
    {
        return Teacher::findOrFail($id)->toJson();
    }

    public function create(Request $request)
    {
        $this->validate($request,
            ['name' => 'required']
        );

        $teacher = new Teacher();
        $teacher->name = $request->get('name');
        $teacher->save();

        return response('', 201);
    }

    public function all()
    {
        return Teacher::all();
    }
}
