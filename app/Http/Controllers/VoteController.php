<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Vote;

class VoteController extends Controller
{
    public function create($id, Request $request)
    {
        $this->validate($request,
            ['vote' => 'required']
        );

        $teacher = Teacher::findOrFail($id);

        $vote = new Vote();
        $vote->vote = $request->get('vote');

        $teacher->addVote($vote);
        $vote->save();

        return response('', 201);
    }
}
