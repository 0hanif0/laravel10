<!DOCTYPE html>
<html>
  <head> 

    @include('admin.css')

    <style type="text/css">

        .url_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .div_center
        {
            text-align: center;
            padding: 30px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

    </style>

  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">

      @include('admin.sidebar')

      <div class="page-content">

      @if(session()->has('message'))

      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

        {{ session()->get('message') }}
        
      </div>

      @endif

      <h1 class="url_title">Add URL</h1>

      <div>
        <form action="{{ url('add_url') }}" method="POST" enctype="multipart/form-data">

          @csrf

            <div class="div_center">
              <label for="">URL Address: </label>
              <input type="text" name="url">
            </div>

            <div class="div_center">
              <label for="">URL Description: </label>
              <textarea name="description"></textarea>
            </div>

            <div class="div_center">
              <input type="submit" class="btn btn-primary">
            </div>

        </form>

      </div>
      
    </div>

      @include('admin.footer')

  </body>
</html>