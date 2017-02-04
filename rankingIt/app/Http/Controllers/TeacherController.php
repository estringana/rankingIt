<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    public function show($id)
    {
        return Teacher::findOrFail($id)->toJson();
    }
}

