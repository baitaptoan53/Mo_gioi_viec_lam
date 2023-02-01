<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;
class UserController extends Controller
{
    private $model;
    private string $table;

    public function __construct()
    {
        $this->model = User::query();
        $this->table = $this->model->getTable();
    }
    public function index()
    {
        $data=$this->model->all();
        return view("admin.$this->table.index", compact('data'));
    }
}
