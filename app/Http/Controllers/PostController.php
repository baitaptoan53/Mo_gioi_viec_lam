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
        return $this->model->paginate();
    }
}
