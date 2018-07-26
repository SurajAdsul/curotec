<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SurveysDataTable;
use App\DataTables\SurveysDataTablesEditor;

class SurveyController extends Controller
{
   	public function index(SurveysDataTable $dataTable)
    {
        return $dataTable->render('surveys.index');
    }

    public function store(SurveysDataTablesEditor $editor)
    {
        return $editor->process(request());
    }
}
