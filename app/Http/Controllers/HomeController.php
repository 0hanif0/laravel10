<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $post = Address::where('url_status','=','active')->get();

            $usertype=Auth()->user()->usertype;

            if($usertype=='user')
            {
                return view('home.homepage',compact('post'));
            }

            else if($usertype=='admin')
            {
                return view('admin.adminhome');
            }

            else
            {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        $post = Address::where('url_status','=','active')->get();

        return view('home.homepage',compact('post'));
    }

    public function url_detail($id)
    {
        $post = Address::find($id);

        return view('home.url_detail',compact('post'));
    }

    public function create_url()
    {
        return view('home.create_url');
    }

    public function user_url(Request $request)
    {
        $user=Auth()->user();

        $userid=$user->id;

        $username=$user->name;

        $usertype=$user->usertype;

        $post = new Address;

        $post->url = $request->url;

        $post->description = $request->description;

        $post->url_status = 'pending';

        $post->user_id=$userid;

        $post->name=$username;

        $post->usertype=$usertype;

        $post->save();

        Alert::success('Congrats','You have Added the data Successfully');

        return redirect()->back();
    }

    public function my_url()
    {
        $user=Auth::user();

        $userid=$user->id;

        $data = Address::where('user_id','=',$userid)->get();

        return view('home.my_url',compact('data'));
    }

    public function my_url_del($id)
    {
        $data = Address::find($id);

        $data->delete();

        return redirect()->back()->with('message','URL deleted Successfully');
    }

    public function url_update_page($id)
    {
        $data = Address::find($id);

        return view('home.url_page',compact('data'));
    }

    public function update_url_data(Request $request,$id)
    {
        $data = Address::find($id);

        $data->url=$request->url;

        $data->description=$request->description;

        $data->save();

        return redirect()->back()->with('message','URL Updated Successfully');
    }
}
