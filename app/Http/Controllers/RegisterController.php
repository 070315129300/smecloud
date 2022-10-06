<?php


namespace App\Http\Controllers;
use App\Models\User;

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

    public function change(Request $request, $id)
    {
        $product = User::find($id);
        $product->Update($request->all());
        return $product;
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
