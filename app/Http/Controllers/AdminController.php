<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function url_page()
    {
        return view('admin.url_page');
    }

    public function add_url(Request $request)
    {
        $user=Auth()->user();

        $userid = $user->id;

        $name = $user->name;

        $usertype = $user->usertype;

        $post=new Address;

        $post->url = $request->url;

        $post->description = $request->description;

        $post->url_status = 'active';

        $post->user_id = $userid;

        $post->name = $name;

        $post->usertype = $usertype;

        $post->save();

        return redirect()->back()->with('message','URL Added Successfully');
    }

    public function show_url()
    {
        $post = Address::all();

        return view('admin.show_url',compact('post'));
    }

    public function delete_url($id)
    {
        $post = Address::find($id);

        $post->delete();

        return redirect()->back()->with('message','URL Deleted Successfully');
    }

    public function edit_page($id)
    {
        $post = Address::find($id);

        return view('admin.edit_page',compact('post'));
    }

    public function update_url(Request $request,$id)
    {
        $data = Address::find($id);

        $data->url=$request->url;

        $data->description=$request->description;

        $data->save();

        return redirect()->back()->with('message','URL Updated Successfully');
    }

    public function accept_url($id)
    {
        $data = Address::find($id);

        $data->url_status='active';

        $data->save();

        return redirect()->back()->with('message','URL Status changed to Active');
    }

    public function reject_url($id)
    {
        $data = Address::find($id);

        $data->url_status='rejected';

        $data->save();

        return redirect()->back()->with('message','URL Status changed to Rejected');
    }
}
