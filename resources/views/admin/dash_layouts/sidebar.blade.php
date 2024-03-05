<style>

.side-bar .side-bar-links ul li a {display: flex;padding: 10px 10px;font-size: 14px;color: #000;align-items: center;}

.side-bar .side-bar-links ul li i {
    margin-right: 20px;
}
.side-bar .side-bar-content h3 {
    font-size: 16px;
    font-family: 'Poppins';
    font-weight: 600;
    text-align: center;
}
.side-bar .side-bar-links .navigation-list>li.li-dropdown{
	position: relative;
}
.side-bar .side-bar-links .navigation-list>li.li-dropdown>.dropdown-content{
	padding: 20px;
	margin-left: 40px;
	background: #EFF1F7;
	display: none;
}
.side-bar .side-bar-links .navigation-list>li.li-dropdown>.dropdown-content>ul>li>a{
	display: flex;
	align-items: center;
	font-size: 14px;
	font-weight: 500;
	color: #222;
	padding: 5px 0;
}
</style>
<div class="side-bar">
      <div class="side-bar-logo">
        <a  href="{{route('admin.dashboard')}}"><img src="{{asset('admin/images/alogo.png')}}" alt="logo"></a>
       
      </div>
      <div class="side-bar-content">
      <h3>{{Auth::guard('admin')->user()->name}}</h3>
       
      </div>
      
      <div class="side-bar-links">
        <ul class="navigation-list">
        <ul class="nav navbar-nav left-sidebar-menu-pro">
 

          <li class="{{isset($user_menu)?'active':''}}"><a href="{{route('admin.dashboard')}}">
              <figure class="mb-0"> <i class="fa big-icon fa-home"></i></figure> Dashboard
            </a></li>
            <li class="{{isset($user_mgmmenu)?'active':''}}"><a href="{{route('admin.users_listing')}}">
              <figure class="mb-0"><i class="fa big-icon fa-sitemap"></i></figure> Customer Management
            </a></li>
           
            <!-- <li class="{{isset($faq_menu)?'active':''}}"><a href="{{route('admin.faq_listing')}}">
              <figure class="mb-0"> <i class="fa big-icon fa-align-center"></i></figure> Faq Management
            </a></li> -->
            <li class="{{isset($testimonial_menu)?'active':''}}"><a href="{{route('admin.testimonial_listing')}}">
              <figure class="mb-0"><i class="fa big-icon fa-object-group"></i></figure> Testimonial Management
            </a></li>
            <li class="{{isset($reviews_menu)?'active':''}}"><a href="{{route('admin.reviews_listing')}}">
              <figure class="mb-0"><i class="fa big-icon fa-cube"></i></figure> Reviews Management
            </a></li>
            <li class="{{isset($blog_menu)?'active':''}}"><a href="{{route('admin.blog_listing')}}">
              <figure class="mb-0"> <i class="fa big-icon fa-folder-open"></i></figure> Blog Management
            </a></li>
            <!-- <li class="{{isset($team_menu)?'active':''}}"><a href="{{route('admin.team_listing')}}">
              <figure class="mb-0"> <i class="fa big-icon fa-folder-open"></i></figure> Team Management
            </a></li>
            <li class="{{isset($matches_menu)?'active':''}}"><a href="{{route('admin.matches_listing')}}">
              <figure class="mb-0">  <i class="fa big-icon fa-folder-open"></i></figure> Matches Management
            </a></li>-->
              <li class="{{isset($album_menu)?'active':''}}"><a href="{{route('admin.album_listing')}}">
              <figure class="mb-0"> <i class="fa big-icon fa-folder-open"></i></figure> Album Management
            </a></li> 
            <li class="{{isset($photos_menu)?'active':''}}"><a href="{{route('admin.photos_listing')}}">
              <figure class="mb-0">  <i class="fa big-icon fa-envelope"></i></figure> Photos Management
            </a></li>
            <li><a href="{{route('admin.newsletter_listing')}}">
              <figure class="mb-0"><i class="fa big-icon fa-envelope"></i></figure> Newsletter Management
            </a></li>

            <li class="{{isset($category_menu)?'active':''}}"><a href="{{route('admin.category_listing')}}">
              <figure class="mb-0">   <i class="fa big-icon fa-users"></i></figure> Category Management
            </a></li>
            <li class="{{isset($products_menu)?'active':''}}"><a href="{{route('admin.products_listing')}}">
              <figure class="mb-0">  <i class="fa big-icon fa-shopping-cart"></i></figure> Photography Management
            </a></li>
            <!-- <li class="{{isset($merchandise_menu)?'active':''}}"><a href="{{route('admin.merchandise_listing')}}">
              <figure class="mb-0">  <i class="fa big-icon fa-user-plus"></i></figure> Merchandise Management
            </a></li> -->

            <li class="li-dropdown"><a href="javascript:void(0)"> <figure class="mb-0"><i class="fa big-icon fa fa-usd"></i></figure>Sales Report  >  </a>
            <div class="dropdown-content">
            <ul>
                <li><a href="{{route('admin.orders')}}">Orders Management</a></li>
                <li><a href="{{route('admin.pendingorders')}}">Unpaids Orders </a></li>
                <li><a href="{{route('admin.topsale')}}">Top Selling Category </a></li>
                  <li><a href="{{route('admin.totalsale')}}">Total Sale </a></li>
                   <li><a href="{{route('admin.averagesale')}}">Average Sale </a></li>
                
               
            </ul>
            </div>
        </li>



    
            
            
          
            <!-- <li class="{{isset($partner_menu)?'active':''}}"><a href="{{route('admin.partner_listing')}}">
              <figure class="mb-0"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></figure> Sponsor Management
            </a></li>
             -->
          
          <li><a href="{{route('admin.inquiries_listing')}}">
              <figure class="mb-0"><i class="fa fa-users" aria-hidden="true"></i></figure> Inquiries Management
            </a></li> 

          <li class="li-dropdown"><a href="javascript:void(0)">
              <figure class="mb-0"><i class="fa fa-cog" aria-hidden="true"></i></figure> Site Settings  > 
            </a>
            <div class="dropdown-content">
            <ul>
                <li><a href="{{route('admin.showLogo')}}">Logo Management</a></li>
                <li><a href="{{route('admin.socialInfo')}}">Contact / Social Info</a></li>
                <li><a href="{{route('admin.Slider')}}">Home Slider Management</a></li>
                <li><a href="{{route('admin.banner')}}">Banners Management</a></li>
                
               
            </ul>
            </div>
        </li>
        
        </ul>
      </div>
    </div>