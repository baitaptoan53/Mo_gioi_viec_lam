<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;
class UserController extends Controller
{
    private $model;
    private string $table;

    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();
        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }
    public function index()
    {
        $data = $this->model->get();
        dd($data);
        return view("admin.$this->table.index",[
            'data' => $data
        ]);
    }
}
