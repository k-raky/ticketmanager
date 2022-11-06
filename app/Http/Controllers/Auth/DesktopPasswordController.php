<?php

namespace App\Http\Controllers\Auth;

use App\DesktopPassword;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesktopPasswordController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user_role = DB::select('select role_id from role_user where user_id = ?', [$user->id]);

        if($user_role[0]->role_id == 1){
            return redirect(route('admin.commandes.index'));
        } else {
            if (session()->has('desktop_token')) {
                return redirect(route('admin.commandes.index'));
            }
            else {
                return view('/auth/login_desktop');
            }

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyPassword(Request $request)
    {
        $password = $request->password;
        $db_password = DesktopPassword::find(1);

        if ($password == $db_password['value']) {
            //remove password from db
            $db_password->value = null;
            $db_password->updated_at = now();
            $db_password->save();

            session(['desktop_token' => 'ok']);

            return redirect(route('admin.commandes.index'));
        }
        else {
            return redirect()->back()->with('message', 'Mot de passe inncorrect' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(DesktopPassword $desktopPassword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DesktopPassword  $desktopPassword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DesktopPassword $desktopPassword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DesktopPassword  $desktopPassword
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesktopPassword $desktopPassword)
    {
        //
    }
}
