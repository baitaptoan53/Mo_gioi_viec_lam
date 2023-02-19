<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    private $model;
    private string $table;
    
    public function __construct()
    {
        $this->model = Company::query();
    }
    public function index()
    {
        $data = $this->model->get();

    }
}
