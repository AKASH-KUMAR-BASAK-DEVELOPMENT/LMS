<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;
use Module\LMS\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::paginate(15);
        return view('backend.pages.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = RoleModel::get();
        return view('backend.pages.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userService->storeOrUpdate($request, null);
        if (isset($request->submissionForm) && $request->submissionForm == 'frontend-user-create'){
            return redirect()->back()->with('success', 'Your signup request send successfully, wait for approval.');
        }
        return redirect()->route('user.index');
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
        $data['roles'] = RoleModel::get();
        $data['user'] = User::find($id);
        return view('backend.pages.user.edit', $data);
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
        $this->userService->storeOrUpdate($request, $id);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($id == 1){
            return redirect()->back();
        }
        $user->delete();
        return redirect()->back();
    }

    public function statusChange($id){
        if (auth()->user()->id == $id){
            return redirect()->back()->with('error', 'You cannot make you off!');
        }
        $user = User::find($id);
        if ($user->status == 0){
            User::where('id', $id)->update(['status' => 1]);
        }
        else{
            User::where('id', $id)->update(['status' => 0]);
        }
        return redirect()->back()->with('success', 'Status Changed!');
    }
}
