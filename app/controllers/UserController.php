<?php

class UserController extends BaseController
{
    //gets the view for the register page
    public function getCreate()
    {
        return View::make('user.register');

    }

    //gets the view for the login page
    public function getLogin()
    {
        return View::make('user.login');
    }

    public function postCreate()
    {
        $validate = Validator::make(Input::all(), array(
            'username' => 'required|unique:users|min:4',
            'email' => 'required|unique:users',
            'pass1' => 'required|min:6',
            'pass2' => 'required|same:pass1',

        ));

        if ($validate->fails()) {
            return Redirect::route('getCreate')->withErrors($validate)->withInput();
        } else {
            $user = new User();
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('pass1'));


            if ($user->save()) {
                return Redirect::route('home')->with('success', 'Uspešno ste se registrovali.');
            } else {
                return Redirect::route('home')->with('fail', 'Greška u kreiranju korisničkog profila. Molimo Vas pokušajte ponovo.');
            }
        }
    }

    public function postLogin()
    {
        $validator = Validator::make(Input::all(), array(
            'username' => 'required',
            'email' => 'required',
            'pass1' => 'required'
        ));

        if ($validator->fails()) {
            return Redirect::route('getLogin')->withErrors($validator)->withInput();
        } else {
            $remember = (Input::has('remember')) ? true : false;

            $auth = Auth::attempt(array(
                'username' => Input::get('username'),
                'email' => Input::get('email'),
                'password' => Input::get('pass1')
            ), $remember);

            if ($auth) {
                return Redirect::intended('/');
            } else {
                return Redirect::route('getLogin')->with('fail', 'Uneli ste pogrešne podatke, molimo Vas pokušajte ponovo!');
            }
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('home');
    }

}