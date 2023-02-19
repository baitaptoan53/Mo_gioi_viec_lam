<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use Illuminate\Http\Request;


class LanguageController extends Controller
{
    use ResponseTrait;
    private $model;
    public function __construct()
    {
        $this->model = Languages::query();
    }
    public function index(Request $request)
    {
        $data = $this->model->where('name', 'like', '%' . $request->get('q'))->get();
        return $this->responseSuccess($data, "Success");
    }
}
