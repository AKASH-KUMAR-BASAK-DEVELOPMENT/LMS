<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Module\LMS\Services\CompanyService;
use Module\LMS\Services\RoleService;
use Module\LMS\Services\UserService;

class CompanyController extends Controller
{
    use FileSaver;
    protected $companyService;
    protected $roleService;
    protected $userService;

    public function __construct(CompanyService $companyService, RoleService $roleService, UserService $userService)
    {
        $this->companyService = $companyService;
        $this->roleService = $roleService;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = CompanyModel::paginate(10);
        return view('backend.pages.company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){
            $company = $this->companyService->storeOrUpdate($request, null);
            $role = $this->roleService->insertDefaultRole($company);
            $this->userService->insertDefaultUser($company, $role);
        });
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = CompanyModel::find($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
