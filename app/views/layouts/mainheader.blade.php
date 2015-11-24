<header class="main">
        <div class="container">
            <div class="row">
                <div class="span2">
                    <a href="{{URL::to('/')}}">
                        <img src="{{URL::to('/')}}/assets/front/img/logo-small.png" alt="logo" title="logo" class="logo">
                    </a>
                </div>
                <div class="span8">
                    <!-- MAIN NAVIGATION -->
                    <div class="flexnav-menu-button" id="flexnav-menu-button">Menu</div>
                    <nav>
                        <ul class="nav nav-pills flexnav" id="flexnav" data-breakpoint="800">
                            <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{URL::to('/')}}">Home</a>
                                
                            </li>
                            <li {{ Request::segment(1)=='category' ? 'class="active"' : ''}}><a href="#">Categories</a>
                                <ul>
                                @foreach($allCategories as $cat)
                                    <li><a href="{{URL::to('/category')."/".$cat->category_slug}}">{{ucwords($cat->category_name)}}</a>
                                    </li>
                                @endforeach
                                    
                                </ul>
                            </li>
                            <li {{ Request::segment(1)=='store' ? 'class="active"' : ''}}><a href="#">Online Stores</a>
                                <ul>
                                @foreach($allStores as $store)
                                    <li><a href="{{URL::to('/store')."/".$store->store_slug}}">{{ucwords($store->store_name)}}</a>
                                    </li>
                                @endforeach
                                </ul>
                            </li>
                            
                            <li><a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- END MAIN NAVIGATION -->
                </div>
                <div class="span2">
                    <!-- LOGIN REGISTER LINKS -->
                    <ul class="login-register">
                        <li><a class="popup-text" href="#login-dialog" data-effect="mfp-move-from-top"><i class="icon-signin"></i>Sign in</a>
                        </li>
                        <li><a class="popup-text" href="#register-dialog" data-effect="mfp-move-from-top"><i class="icon-edit"></i>Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- LOGIN REGISTER LINKS CONTENT -->
    <div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
        <i class="icon-signin dialog-icon"></i>
        <h3>Member Login</h3>
        <h5>Welcome back, friend. Login to get started</h5>
        <div class="row-fluid">
            <form class="dialog-form">
                <label>E-mail</label>
                <input type="text" placeholder="email@domain.com" class="span12">
                <label>Password</label>
                <input type="password" placeholder="My secret password" class="span12">
                <label class="checkbox">
                    <input type="checkbox">Remember me
                </label>
                <input type="submit" value="Sign in" class="btn btn-primary">
            </form>
        </div>
        <ul class="dialog-alt-links">
            <li><a class="popup-text" href="#register-dialog" data-effect="mfp-zoom-out">Not member yet</a>
            </li>
            <li><a class="popup-text" href="#password-recover-dialog" data-effect="mfp-zoom-out">Forgot password</a>
            </li>
        </ul>
    </div>


    <div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
        <i class="icon-edit dialog-icon"></i>
        <h3>Member Register</h3>
        <h5>Ready to get best offers? Let's get started!</h5>
        <div class="row-fluid">
            <form class="dialog-form">
                <label>E-mail</label>
                <input type="text" placeholder="email@domain.com" class="span12">
                <label>Password</label>
                <input type="password" placeholder="My secret password" class="span12">
                <label>Repeat Password</label>
                <input type="password" placeholder="Type your password again" class="span12">
                <div class="row-fluid">
                    <div class="span8">
                        <label>Your Area</label>
                        <input type="password" placeholder="Boston" class="span12">
                    </div>
                    <div class="span4">
                        <label>Postal/Zip</label>
                        <input type="password" placeholder="12345" class="span12">
                    </div>
                </div>
                <label class="checkbox">
                    <input type="checkbox">Get hot offers via e-mail
                </label>
                <input type="submit" value="Sign up" class="btn btn-primary">
            </form>
        </div>
        <ul class="dialog-alt-links">
            <li><a class="popup-text" href="#login-dialog" data-effect="mfp-zoom-out">Already member</a>
            </li>
        </ul>
    </div>


    <div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
        <i class="icon-retweet dialog-icon"></i>
        <h3>Password Recovery</h3>
        <h5>Fortgot your password? Don't worry we can deal with it</h5>
        <div class="row-fluid">
            <form class="dialog-form">
                <label>E-mail</label>
                <input type="text" placeholder="email@domain.com" class="span12">
                <input type="submit" value="Request new password" class="btn btn-primary">
            </form>
        </div>
    </div>
    <!-- END LOGIN REGISTER LINKS CONTENT -->