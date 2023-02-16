<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PostImport;
use App\Models\Company;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    private string $table;
    private $model;
    public function __construct()
    {
        $this->model = Posts::query();
        $this->table = (new Posts())->getTable();

        View::share("title", ucwords($this->table));
        View::share("table", $this->table);
    }
    public function index()
    {
        return view("admin.posts.index");
    }
    public function create(Request $request)
    {
        $copanies = Company::query()->get(["id", "name"]);
        $selectedCompany = $request->get("company");
        return view("admin.posts.create", [
            "companies" => $copanies,
            "selectedCompany" => $selectedCompany,
        ]);
    }
    public function importCsv(Request $request)
    {
        Excel::import(new PostImport(), $request->file("file"));
    }
}
