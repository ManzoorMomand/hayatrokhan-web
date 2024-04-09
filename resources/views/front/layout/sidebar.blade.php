<div class="sidebar">



<!-- <div class="widget">
    <div class="archive-heading">
        <h2>Archive</h2>
    </div>
    <div class="archive">
        <select name="" class="form-select">
            <option value="">Select Month</option>
            <option value="">February 2022</option>
            <option value="">January 2022</option>
            <option value="">December 2021</option>
            <option value="">November 2021</option>
            <option value="">October 2021</option>
            <option value="">September 2021</option>
            <option value="">August 2021</option>
            <option value="">July 2021</option>
        </select>
    </div>
</div> -->
<!-- @foreach($global_live_data as $live)
<div class="widget">
    <div class="live-channel">
       
        <div class="live-channel-heading">

            <h2>{{$live->heading}}</h2>
        </div>
        <div class="live-channel-item">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$live->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      
    </div>
</div>
@endforeach -->
<div class="widget">
    <div class="news">
        <div class="news-heading">
            <h2> All Products</h2>
        </div>           

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent Products</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular Products</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @foreach ($global_recent_news_data as $item)

                @if ($loop->iteration > 5)
                @break
                @endif
          
                <div class="news-item">
                    <div class="left">
                        <img src="{{asset('uploads/'.$item->post_photo)}}" alt="">
                    </div>
                    <div class="right">
                        <div class="category">
                            <!-- <span class="badge bg-success">{{$item->rSubCategory->sub_category_name}}</span> -->
                        </div>
                        <h2 ><a href="{{ route ('post_detail', $item->id)}}">{{$item->post_title}}</a></h2>
                        <div class="date-user">
                            <div class="user">
                            @if ($item->author_id == 0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @if ($user_data)
                                            <a href="">{{ $user_data->name }}</a>
                                        @endif
                                    @endif
                            </div>
                            <div class="date">
                            @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                <a href="">{{ $updated_date }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @foreach ($global_recent_news_data as $item)

            @if ($loop->iteration > 5)
            @break
            @endif
            <div class="news-item">
                    <div class="left">
                        <img src="{{asset('uploads/'.$item->post_photo)}}" alt="">
                    </div>
                    <div class="right">
                        <div class="category">
                            <span class="badge bg-success">{{$item->rSubCategory->sub_category_name}}</span>
                        </div>
                        <h2 dir="rtl"><a href="">{{$item->post_title}}</a></h2>
                        <div class="date-user">
                            <div class="user">
                            @if ($item->author_id == 0)
                                        @php
                                        $user_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                        @endphp
                                        @if ($user_data)
                                            <a href="">{{ $user_data->name }}</a>
                                        @endif
                                    @endif
                              
                            </div>
                            <div class="date">
                            @php
                                    $ts = strtotime($item->updated_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                <a href="">{{ $updated_date }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
             
            </div>
        </div>
    </div>
</div>


</div>
<div class="col-md-3">
    <div class="item">
        <div class="fb-page" 
            data-href="https://www.facebook.com/HayatRokhanLtd"
            data-tabs="timeline"
            data-width="340"  <!-- Adjust the width as needed -->
            data-height="300"  <!-- Adjust the height as needed -->
            data-small-header="false"
            data-adapt-container-width="true"
            data-hide-cover="false"
            data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/HayatRokhanLtd" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/HayatRokhanLtd">momand</a>
            </blockquote>
        </div>
    </div>
</div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml: true,
      version: 'v12.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>



</div>