<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = Posts::query();
    }
    public function index(Request $request)
    {
        $data = $this->model->paginate();
        // append curency_salary 
        foreach ($data as $item) {
            $item->currency_salary = $item->currency_salary_code;
            // $item->append('currency_salary_code');
        }
        return $data;
    }
}
