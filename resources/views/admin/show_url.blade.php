<!DOCTYPE html>
<html>
  <head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style type="text/css">

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .table_deg
        {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 70px;
        }

        .th_deg
        {
            background-color: white;
        }

    </style>

  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">

      @include('admin.sidebar')
      
      <div class="page-content">

      @if(session()->has('message'))

      <div class="alert alert-danger">

      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

      {{ session()->get('message') }}

      </div>

      @endif

      <h1 class="title_deg">All URL List</h1>

      <table class="table_deg">
        <tr class="th_deg">

            <th>URL Address</th>
            <th>Description</th>
            <th>Create by</th>
            <th>User Type</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Status Accept</th>
            <th>URL Status</th>
            <th>Status Reject</th>

        </tr>

        @foreach($post as $post)

        <tr>
            <td>{{ $post->url }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->name }}</td>
            <td>{{ $post->usertype }}</td>
            <td><a href="{{ url('edit_page',$post->id) }}" class="btn btn-success">Edit</a></td>
            <td><a href="{{ url('delete_url',$post->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a></td>
            <td><a onclick="return confirm('are you sure to accept this URL ?')" href="{{ url('accept_url',$post->id) }}" class="btn btn-secondary">Accept</a></td>
            <td>{{ $post->url_status }}</td>
            <td><a onclick="return confirm('are you sure to reject this URL ?')" href="{{ url('reject_url',$post->id) }}" class="btn btn-primary">Reject</a></td>
        </tr>

        @endforeach

      </table>

      </div>

        @include('admin.footer')

        <script type="text/javascript">

            function confirmation(ev)
            {
                ev.preventDefault();
                var urlToRedirect=ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect)
                swal({
                    title: "Are You Sure to Delete This ",
                    text: "You won't be able to revert this delete ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willCancel)=>
                {
                    if(willCancel)
                    {
                        window.location.href=urlToRedirect
                    }
                }
                );
            }
        </script>
  </body>
</html>