<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="footer__about">
                    <a href="{{route('home')}}" class="footer__logo">
                        JDpics
                    </a>

                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quia, praesentium accusamus
                        incidunt ratione obcaecati.','FOOTERAVOUTTXT');?>

                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="footer__links">
                    <h6>Quick Links</h6>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('photography')}}">My Photography</a></li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                         <li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('refund.policy')}}">Refund Policy</a></li>
                        <li><a href="{{route('shipping.policy')}}">Shipping Policy</a></li>
                        <li><a href="{{route('terms.conditions')}}">Term & Conditions</a></li> 
                    
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="footer__links">
                    <h6>Contact Links</h6>
                    <ul>
                        <li><a href="#">{{$config['COMPANYPHONE']}}</a></li>
                        <li><a href="#">{{$config['COMPANYEMAIL']}}</a></li>
                        <!--<li>-->
                        <!--    <address>{{$config['COMPANYADDRESS']}}</address>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="footer__newsletter">
                    <h6>Newsletter</h6>
                    <form id="newsletterform">
                        <i class='bx bx-envelope bx-sm'></i>
                        <input type="text" name="email" placeholder="Enter Email">
                        <button id="newsletter" type="button"><i class='bx bx-send bx-sm'></i></button>
                    </form>
                </div>
                <ul class="footer__social">
                    <li><a href="{{$config['FACEBOOK']}}"><i class='bx bx-sm bxl-facebook'></i></a></li>
                    <li><a href="{{$config['TWITTER']}}"><i class='bx bx-sm bxl-twitter'></i></a></li>
                    <li><a href="{{$config['INSTAGRAM']}}"><i class='bx bx-sm bxl-instagram'></i></a></li>
                    <li><a href="{{$config['LINKDIN']}}"><i class='bx bx-sm bxl-linkedin'></i></a></li>
                </ul>
            </div>
            <div class="col-12">
                <div class="footer__copyright">
                   
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],' Copyright © 2024 Company Name. All Rights Reserved.','FOOTERTXT1');?>
                
                </div>
            </div>
        </div>
    </div>
</footer>


</body>


</html>