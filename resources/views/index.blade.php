<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="{{Auth::user()->name}}">
            <link rel="icon" href="{{asset('/front/Img/icon-logo.svg')}}" type="image/png">
            <link rel="icon" href="{{asset('/front/Img/icon-logo.svg')}}">
            <link rel="stylesheet" href="{{asset('/front/Css/all.css')}}">
            <link rel="stylesheet" href="{{asset('/front/Css/style.css')}}">
            <title>Business Card</title>
      </head>
      <body id="body" class="theme--dark">
            <input id="menu" type="checkbox">
            <input id="night" type="checkbox">
            <div id="container">
                  <div class="header">
                        <div class="logo"></div>
                        <label class="night-mode" for="night" onclick="enableNight()">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"/></svg>
                        </label>
                  </div>    
                  <section class="left-section">
                      
                        <img class="profile-pic" src="{{asset('images/'. $user->name.'/'.$user->photo)}}"/>
                        
                        <div class="profile-detail">
                              <span class="profile-maps">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/></svg>
                                  {{$user->location}}
                              </span>
                             
                              <p class="profile-name">{{$user->name}}</p>
                              <span class="profile-summary">{{$user->title}}</span>
                              <p class="profile-phone">{{$user->phone_number}}</p>
                              <p class="profile-phone">{{$user->email}}</p>
                             
                        </div>
                        <div class="profile-pils">
                     @foreach($user->links as $link)
                        
                             
                                    <span class="pils"><a href="{{$link->platform_url}}" target="_blank"> <img src="{{asset('images/icons/'. $link->icon->icon)}}"/>    {{$link->platform_name}}</a></span>
                             
                       
                      @endforeach
                    </div> 
                  </section>
                  <div class="front-smooth"></div>
            </div>
            <div class="fixed-logo"><a href="https://new.megatrust.net/" target="_blank"><img src="{{asset('/front/Img/logo-light.svg')}}" alt="logo"></a></div>
            <script src="{{asset('/front/Js/script.js')}}"></script>
      </body>
</html>