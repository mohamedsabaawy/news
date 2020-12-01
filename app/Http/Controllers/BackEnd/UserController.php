<?php


namespace App\Http\Controllers\BackEnd;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:user show'])->only('index' , 'show');
        $this->middleware(['permission:user edit'])->only('edit' , 'update');
        $this->middleware(['permission:user create'])->only('create' , 'store');
        $this->middleware(['permission:user delete'])->only('destroy');
    }

    public function index(Request $request)
    {
        $rows = User::orderBy('id','DESC')->paginate(5);

        return view('backEnd.users.index',compact('rows'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $roles = Role::pluck('name','name')->all();
        $roles = Role::all();
        $categories = Category::all();
        return view('backEnd.users.create',compact('roles','categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
//            'password' => 'required|same:confirm-password',
//            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);


        $user = User::create($input);
        $user->categories()->attach($request->categories);
        $user->assignRole($request->roles);


        return redirect()->route('user.index')
            ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $categories = Category::all();
        $roles = Role::all();

        return view('backEnd.users.edit',compact('user','categories','roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'email' => 'required|email|unique:users,email,'.$id,
////            'password' => 'same:confirm-password',
//            'roles' => 'required'
//        ]);


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = bcrypt($input['password']);
        }else{
            $input = $request->only(['name','email','categories','roles']);
        }

        $user->update($input);
        $user->categories()->sync($request->categories);
        $user->syncRoles($request->roles);


        return redirect()->route('user.index')
            ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
            ->with('success','User deleted successfully');
    }
}