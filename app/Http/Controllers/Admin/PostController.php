<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    private string $table;
    private $model;
    public function __construct()
    {
        $this->model = Posts::query();
    }
    public function index(Request $request)
    {
        return $this->model->paginate();
    }
    public function destroy(Request $request)
    {
    }
}
