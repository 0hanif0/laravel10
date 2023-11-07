<!DOCTYPE html>
<html lang="en">
   <head>

    <base href="/public">

      @include('home.homecss')

      <style type="text/css">

        .div_deg
        {
            text-align: center;
            background-color: black;
        }

        label
        {
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            color: white;
        }

        .input_deg
        {
            padding: 30px;
        }

        .title_deg
        {
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
            color: white;
        }

      </style>

   </head>
   <body>

      @include('home.header')

      <div class="div_deg">

      @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

        </div>

      @endif

        <form action="{{ url('update_url_data',$data->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
            <h1 class="title_deg">Update URL Address</h1>
            <div class="input_deg">
                <label for="">URL Address: </label>
                <input type="text" name="url" value="{{ $data->url }}">
            </div>

            <div class="input_deg">
                <label for="">Description: </label>
                <textarea name="description">{{ $data->description }}</textarea>
            </div>

            <div class="input_deg">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
      </div>

      </div>
   </body>
</html>