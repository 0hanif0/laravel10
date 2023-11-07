<!DOCTYPE html>
<html lang="en">
   <head>

      <style type="text/css">

        .div_deg
        {
            text-align: center;
        }

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
        }

        label
        {
            display: inline-block;
            width: 200px;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .field_deg
        {
            padding: 25px;

        }

      </style>

      @include('home.homecss')

   </head>
   <body>

      @include('sweetalert::alert')
      
      @include('home.header')

      <div class="div_deg">

      <h3 class="title_deg">Add New URL</h3>
        <form action="{{ url('user_url') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field_deg">
                <label for="">URL Address: </label>
                <input type="text" name="url">
            </div>

            <div class="field_deg">
                <label for="">Description: </label>
                <textarea name="description"></textarea>
            </div>

            <div class="field_deg">
                <input type="submit" value="Add New URL" class="btn btn-primary">
            </div>

        </form>

      </div>

   </body>
</html>