<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;

class InstitutionController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request,
            ['name' => 'required']
        );

        $institution = new Institution();
        $institution->name = $request->get('name');
        $institution->save();

        return response('', 201);
    }

    public function all()
    {
        return Institution::all();
    }
}
