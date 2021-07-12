<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\{User,State,City,Country,Role,UserImages};
use DB;
use File;
use PHPUnit\TextUI\XmlConfiguration\Php;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('cities', 'cities.id', '=', 'users.city_id')
            ->join('countries', 'countries.id', '=', 'users.country_id')
            ->join('states','states.id','=','cities.state_id')
            ->select('users.*', 'cities.name as city_name', 'countries.country_code','states.name as state_name')
            ->get();
        // $users = User::all();
        // $users = User::with('roles');
        // echo "<pre>";print_r($users);die;
        return view('admin.user.view', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        $roles = Role::all();
        // echo "<pre>";print_r($roles->toArray());die;
        return view('admin.user.create', compact(['cities', 'countries', 'states','roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"<pre>";print_r($request->toArray());die;
        if ($request->hasFile('profile')) {
            $profile = $request->profile;
            $imgname = "adminlib/profile/".time().'_'.$profile->getClientOriginalName();
            $imagePath = public_path("adminlib/profile");
            $profile->move($imagePath,$imgname);
        }
        $hobby = implode(',', $request->hobby);
        $user = User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'hobby' => $hobby,
            'dob' => $request->dob,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'status' => $request->status,
            'country_id' => $request->country_id,
            'phone' => $request->phone,
            'profile' => $imgname,
        ));
        
        $user->roles()->attach($request->role_id);

        /**multiple image uploading*/
        if ($request->hasFile('userImages')) {
            foreach ($request->userImages as $image) {
                $userImageName = 'adminlib/userimages/'.time().''.$image->getClientOriginalName();
                $image->move(public_path('adminlib/userimages'),$userImageName);
                UserImages::create([
                    'user_id' =>$user->id,
                    'user_image' =>$userImageName
                ]);
            }
        }
        return redirect('/user');
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
        $user = User::find($id);
        //$roles= $user->roles()->get();
        // echo "<pre>"; print_r($roles->toArray()); die;
        $states = State::all();
        $cities = City::all();
        $roles = Role::all();
        $countries = Country::all();
        return view('admin.user.edit',compact('user','states','cities','roles','countries'));
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
        $user = User::find($id);
        if ($request->hasFile('profile')) {
            if (File::exists(public_path($user->profile))) {
                File::delete(public_path($user->profile));
            }
        }else{
            $imgname = $user->profile;    
        }
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'hobby' => implode(',', $request->hobby),
            'dob' => $request->dob,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'status' => $request->status,
            'country_id' => $request->country_id,
            'phone' => $request->phone,
            'profile' => $imgname,
        ];
        /**remove checked image*/
        if (!empty($request->remove_images)) {
            foreach ($$request->remove_images as $removeImageId) {
                $removeImage = UserImages::find($removeImageId);
                if (File::exists(public_path($removeImageId->user_image))) {
                    File::delete(public_path($removeImageId->user_image));
                }
                $removeImage->delete();
            }
        }
        if ($request->hasFile('userImages')) {
            foreach ($request->userImages as $image) {
                $userImageName = 'adminlib/userimages/'.time().''.$image->getClientOriginalName();
                $image->move(public_path('adminlib/userimages'),$userImageName);
                UserImages::create([
                    'user_id' =>$id,
                    'user_image' =>$userImageName
                ]);
            }
        }
        User::where('id',$id)->update($userData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
