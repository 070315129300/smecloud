<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//        $request->validate([
//            'firstname' => 'required',
//        'lastname' => 'required',
//        'password' => 'required',
//        'email' => 'required',
//        'phone' => 'required'
//        ]);
//        return Registrations::create($request->all());
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        //
//        $update = User::find($id);
//        $update->update($request->all());
//        return $update;
//    }

//    public function change(Request $request, User $user)
//    {
//        $user = User::find(id);
//        $user->Update($request->all());
//        return $user;
//    }

//    public function change(Request $request, $id)
//    {
//        $user = User::find($id);
//        $input = $request->all();
//        $user->update($input);
//        return $user;
//    }

    public function change(Request $request, User $user)
    {
        $request->validate([
            'firstname',
            'lastname',
            'email',
            'phone'
        ]);
        $request->update([
            update([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],

        ]);
        return $user;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        return User::destroy($id);


    }

/* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function search($name)
    {
        //
        return User::where('name', 'like', '%'.$name.'%')->get();


    }
}
