<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PostCurrencySalaryEnum;
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
        $selectCurency = $request->get("currency_salary");
        $curencies = PostCurrencySalaryEnum::asArray();
        return view("admin.posts.create", [
            "curencies" => $curencies,
            "companies" => $copanies,
            "selectedCompany" => $selectedCompany,
            "selectCurency" => $selectCurency,
        ]);
    }
    public function importCsv(Request $request)
    {
        Excel::import(new PostImport(), $request->file("file"));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "company" => "required",
            "language" => "required",
            "requirement" => "required",
            "city" => "required",
            "district" => "required",
            "max_salary" => "required",
            "min_salary" => "required",
            "curency" => "required",
            "from_date_alt"=>"required",
            "to_date_alt"=>"required", 
        ]);
        $post = new Posts();
        $post->company_id = $request->company;
        $post->language_id = $request->language;
        $post->requirement = $request->requirement;
        $post->city = $request->city;
        $post->district = $request->district;
        $post->max_salary = $request->max_salary;
        $post->min_salary = $request->min_salary;
        $post->currency_salary_code = $request->curency;
        $post->from_date = $request->from_date_alt;
        $post->to_date = $request->to_date_alt;
        $post->save();

        return redirect()->route("admin.posts.index");
        


    }
}
