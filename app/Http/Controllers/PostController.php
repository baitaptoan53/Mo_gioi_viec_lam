<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\JsonResponse;
use Termwind\Components\Dd;

class PostController extends Controller
{
    use ResponseTrait;
    private $model;
    public function __construct()
    {
        $this->model = Posts::query();
    }
    public function index(): JsonResponse
    {
        $data = $this->model->paginate();
        foreach ($data as $item) {
            $item->currency_salary = $item->currency_salary_code;
            $item->status = $item->status_name;
            // append curency_salary
            // $item->append('currency_salary_code');
        }
        $arr['data'] = $data->getCollection();
        $arr['pagination'] = $data->linkCollection();
        return  $this->responseSuccess($data, "Success");
    }
}
