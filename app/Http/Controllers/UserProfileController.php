<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    use FileSaver;
    public function userProfile($id){
        if (Auth::id() == $id){
            $user = User::find($id);
            return view('frontend.pages.user-profile.edit', compact('user'));
        }
        return redirect('/');
    }

    public function userUpdate(Request $request){
        if($request->password == null){
            $user = User::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'name' => $request->name,
                ]
            );
            $this->upload_file($request->image, $user, 'image', 'upload/user_image');
        }
        else{
            $user = User::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                ]
            );
            $this->upload_file($request->image, $user, 'image', 'upload/user_image');
        }
        return redirect()->back();
    }
}
