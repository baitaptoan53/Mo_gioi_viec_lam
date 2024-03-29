<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    private $model;
    private string $table;
    use ResponseTrait;

    public function __construct()
    {
        $this->model = Company::query();
    }
    public function index(Request $request): JsonResponse
    {
        $data = $this->model->where('name', 'like', '%' . $request->get('q'))->get();
        return $this->responseSuccess($data, "Success");
    }
}
