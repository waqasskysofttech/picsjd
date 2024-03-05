@php
use App\Http\Controllers\IndexController;
$albums = IndexController::get_albums();
@endphp

<!-- Header -->
<div class="headerWrapper">
    <form action="{{route('search')}}" method="get" class="header__search">
        <input type="text" name="search" placeholder="Search here...">
        <button type="button" class="closeSearch"><i class='bx bx-md bx-x'></i></button>
        <button type="submit"><i class='bx bx-md bx-search'></i></button>
    </form>
        <div class="container">
            <header class="header">
                <a href="{{route('home')}}" class="header__logo">
                    JDpics
                </a>
                <ul class="header__nav">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About Me</a></li>
                    <li class="header_dropdown"><a href="{{route('photography')}}">Photography</a>
                        <ul class="dropdown_menu">
                            @foreach($albums as $value)
                            <li><a href="{{url('gallery/'. $value->id) }}">{{$value->name}}</a></li>
                            @endforeach 
                        </ul>
                    </li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><a href="{{route('contact-us')}}">Contact Us</a></li>
            
                </ul>
                <ul class="header__links">
                   {{-- <li><a href="javascript:void(0);" class="openSearch"><i class='bx bx-sm bx-search'></i></a></li>
                    <li><a href="{{route('dashboard.myWishlist')}}"><i class='bx bx-sm bx-heart'></i></a></li>
                    <li><a href="{{route('cart')}}"><i class='bx bx-sm bx-shopping-bag'></i></a></li>--}}
                    @if(Auth::check())
                  <li><a href="{{route('dashboard.myProfile')}}"><i class='bx bx-sm bx-user'></i></a>
           
                </li>
                  @else
                  <!-- <li><a href="{{route('sign-in')}}"><i class='bx bx-sm bx-user'></i></a></li> -->
                  <li><a href="{{route('signout')}}"><i class='bx bx-sm bx-user'></i></a></li>
                  @endif
                

                </ul>
            </header>
        </div>
    </div>