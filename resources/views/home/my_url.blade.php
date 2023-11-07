<!DOCTYPE html>
<html lang="en">
   <head>

      @include('home.homecss')

      <style type="text/css">

        .post_deg
        {
            padding: 30px;
            text-align: center;
            background-color: black;
        }

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }

        .des_deg
        {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }

      </style>

   </head>
   <body>
      
      @include('home.header')

      @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

        </div>

      @endif

      @foreach($data as $data)

      <div class="post_deg">

        <h1 class="title_deg">List URL Address</h1>
        <h4 class="des_deg">URL Address: {{$data->url}}</h4>
        <p class="des_deg">Description: {{$data->description}}</p>

        <a href="{{ url('url_update_page',$data->id) }}" class="btn btn-primary">Update</a>

        <a onClick="return confirm('are you sure to delete this ?')" href="{{ url('my_url_del',$data->id) }}" class="btn btn-danger">Delete</a>

      </div>

        @endforeach

   </body>
</html>