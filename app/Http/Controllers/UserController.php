<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return view('pages.user.index',['users' => $users]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.user.create',['type' => 'create']);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8',
      'role' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->is_admin = $request->role;
    $user->save();
    
		return redirect(route('petugas.index'))->with('status','Data petugas berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);
		return view('pages.user.show',['user' => $user]);
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
    return view('pages.user.update',['user' => $user,'type' => 'update']);
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
    $this->validate($request,[
      'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255',
      'role' => 'required',
		]);
		
		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->is_admin = $request->role;
		$user->save();

		return redirect(route('petugas.index'))->with('status','Data petugas berhasil diubah');
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

    if ($user->is_admin) {
		  return redirect(route('petugas.index'))->with('alert','Tidak diperbolehkan menghapus data administrator lain !');
    }

    $user->delete();

		return redirect(route('petugas.index'))->with('status','Data petugas berhasil dihapus');
  }

  public function approve($id)
  {
    $user = User::find($id);
    $user->approved = true;
    $user->save();

		return redirect(route('petugas.index'))->with('status','Akun petugas '.$user->name.' berhasil diaktifkan');
  }

  public function disapprove($id)
  {
    $user = User::find($id);
    $user->approved = false;
    $user->save();

		return redirect(route('petugas.index'))->with('status','Akun petugas '.$user->name.' berhasil di non-aktifkan');
  }
}
