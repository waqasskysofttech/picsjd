<style>
    .dashboard-section header .header-links button {
        margin-left: 240px;
        background: #ff8f7b;
        border: #ff8e7b;
        font-size: 20px;
    }

    .my-admin ul {
        display: flex;
    }

    .my-admin ul li a {
        color: #fff;
        font-size: 20px;
    }

    .dashboard-section header .header-links button:active {
        background: #000 !important;
        border: #000 !important;
    }

    .dashboard-section header .header-links button:focus {
        box-shadow: none !important;
    }

</style>
<section class="dashboard-section">
    <header>
        <div class="container-fluid">
            <div class="header-links">
                <!-- <button type="button" id="sidebarCollapse"
                    class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                    <i class="fa fa-bars"></i>
                </button> -->

                <div class="dropdown show user-link my-admin">
                    <!-- <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              <div class="user-info">
                <h4>{{Auth::guard('admin')->user()->name}}</h4>
                <!-- <span>Admin</span> 
              </div>
            </a> -->
                    <ul>
                        <li>
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                class="nav-link dropdown-toggle">
                                <span class="user-profile"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <span class="admin-name">{{Auth::guard('admin')->user()->email}}</span>
                                <span class="author-project-icon adminpro-icon adminpro-down-arrow">
                                <div class="dropdown-menu" >

<a  href="{{route('admin.logout')}}">Logout</a>
</div>
                                </span>
                            </a>

                        </li>
                      
                    </ul>
                   
                </div>

            </div>
        </div>
        <div class="modal fade alert-modal" id="crawl-success-alert-modal-1" tabindex="-1" role="dialog"
            aria-labelledby="alert-modal-1-modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="primary-heading color-dark text-center">
                            <figure class="mc-b-2"><img src="{{asset('admin/images/checkmark-icon.svg')}}"
                                    alt="checkmark-icon"></figure>
                            <h4 class="crawl-success-msg"></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="preloader" style="display:none;">
        <div class="loading">
            <span>Loading...</span>
        </div>
    </div>
