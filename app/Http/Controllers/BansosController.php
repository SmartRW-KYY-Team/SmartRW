<?php

namespace App\Http\Controllers;

use App\DataTables\BansosDataTable;

class BansosController extends Controller
{
    public function index(BansosDataTable $dataTable)
    {
        return $dataTable->render('bansos.index');
    }
}
