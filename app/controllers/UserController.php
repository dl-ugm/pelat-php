<?php
class UserController extends BaseController {

    protected $layout = 'layouts.master';

    public function getIndex()
    {
        return Post::all();
    }
    public function getRegister()
    {
        return View::make('users.register');
    }
    public function postRegister()
    {
        $rules = [
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'alamat' => 'required'
        ];
        $v = Validator::make(Input::all(),$rules);
        if($v->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($v);
        }
        else {
            $member = new Post;
            $member->nama = Input::get('nama');
            $member->email = Input::get('email');
            $member->alamat = Input::get('alamat');
            $member->save();
            return Redirect::to('member');
        }

    }
}