<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{


    public function store()
    {

        $this->validate(request(), [
            'name' => 'required',
            'desc' => 'required'
        ]);

        DB::table('projects')->insert([
            ['name' => request('name'), 'desc' => request('desc')],
        ]);

        return ['message' => 'project created'];

    }

}
