<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Pentest Report</h1>
            <div class="services_section_2">
               <div class="row">

                  @foreach($post as $post)

                  <div class="col-md-4" style="padding: 30px; border: double;">
                     
                     <h4>URL Address: {{ $post->url }}</h4>

                     <p>Create by <b>{{ $post->name }}</b></p>

                     <div class="btn_main"><a href="{{ url('url_detail',$post->id) }}">More Detail</a></div>

                  </div>
                  
                  @endforeach

               </div>
            </div>
         </div>
      </div>