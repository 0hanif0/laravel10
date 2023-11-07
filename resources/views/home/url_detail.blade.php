<!DOCTYPE html>
<html lang="en">
   <head>

   <base href="/public">

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
 
      </div>

      <div class="post_deg">
                     
         <h4 class="title_deg"><b>URL Address: {{ $post->url }}</b></h4>

         <h4 class="des_deg">Description: {{ $post->description }}</h4>

         <p class="des_deg">Create by <b>{{ $post->name }}</b></p>

      </div>

   </body>
</html>