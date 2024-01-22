<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="navbar navbar-expand-md navbar-dark " >
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md ">
 				</div>
	
			<div class="navbar-brand navbar-brand-xs ">
				<a href="index.html" class="d-inline-block">
					<img src="{{ asset('Limitless_2_3/Documentation/assets/images/logo_icon_light.png') }}" alt="">
				</a>
			</div>
		</div>

		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="assets/images/logo_dark.png" alt="">
				</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-component-toggle" type="button">
				<i class="icon-unfold"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-hide d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-md-auto">
				<li class="">
                    <div class="">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                <form method="POST" action="{{ route('logout') }}" class="navbar-form">
									@csrf
								
									<div class="btn-group">
										<button type="submit" class="btn bg-white">
											Logout
										</button>
									</div>
								</form>								
                                @else
                                    <a href="{{ route('login') }}" class="">Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif				
				</li>
			</ul>
		</div>
	</div>