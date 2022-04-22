<header id="main-header" class="header"> 
    <div class="header-notice" style="display: none;">
        <div class="container notice-list"> 
            <div class="notice-item"> Giảm <strong>5%</strong> cho tất cả đơn hàng </div> 
            <div class="notice-item"> <strong>Miễn phí vận chuyển</strong> đơn hàng <strong>trên 5tr</strong> </div> 
        </div> 
    </div>
    
    <div class="top-header clearfix">
        <div class="container">
            <div class="box-left">
                <span>Bạn cần giúp đỡ? Hãy gọi: </span>
                <a class="hotline cred" href="tel:{{$web_config->phone}}" title="{{$web_config->phone}}">{{$web_config->phone}}</a>
                <span class="span-or">hoặc</span>
                <a href="mailto:{{$web_config->email}}" title="{{$web_config->email}}">{{$web_config->email}}</a>
            </div>
            <div class="box-right">
                <div class="top-menu">
                    @if (!empty($menu_top))
                        @foreach ($menu_top as $key => $value) 
                            <a href="{{$value->link}}" title="{{$value->name}}" class="{{$value->class}}">{{$value->name}}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="main-header bg-white">
        <nav class="navbar">
            <div id="main-header-container" class="container">
                <div class="header-logo">
                    <a class="logo-wrapper" href="{{route('home')}}"><img src="{{asset('assets/clients/images/logo2.png')}}" class="logo-brand"></a>
                </div>

                <!-- Navbar links -->
                <div id="mainmenu" class="box-mainmenu d-lg-inline-block">
                    <ul class="list-unstyle">
                        <li class="nav-item danh-muc has-childs has-mega">
                            <a href="javascript:void(0)" class="nav-link" title="Danh mục">
                                <svg x="0px" y="0px" viewBox="0 0 384.97 384.97" style="enable-background:new 0 0 384.97 384.97;"><path d="M12.03,120.303h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03 c-6.641,0-12.03,5.39-12.03,12.03C0,114.913,5.39,120.303,12.03,120.303z"></path><path d="M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03 S379.58,180.455,372.939,180.455z"></path><path d="M372.939,264.667H132.333c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h240.606 c6.641,0,12.03-5.39,12.03-12.03C384.97,270.056,379.58,264.667,372.939,264.667z"></path></svg> Danh mục
                            </a>
                            <div class="sub-menu megamenu">
                                <div class="container">
                                    <ul class="level0 list-unstyle">
                                        @if (!empty($product_mega_menu))
                                            @foreach ($product_mega_menu as $item)    
                                                <li class="level1 parent item">
                                                    <a class="hmega" href="{{route('home').'/san-pham/'.$item->alias}}" title="{{$item->title}}">{{$item->title}}</a>
                                                    @if (!empty($item->childs))
                                                        <ul class="level1">
                                                            @foreach ($item->childs as $child)
                                                                @php
                                                                $link1 = route('home').'/san-pham/'.$item->alias.'/'.$child->alias;    
                                                                @endphp
                                                                <li class="level2"><a href="{{$link1}}" title="{{$child->title}}">{{$child->title}}</a> </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{route('khuyen-mai')}}" class="nav-link" title="Danh mục">Khuyến mãi HOT</a></li>
                        <li class="nav-item"><a href="{{route('san-pham-moi').'?sortby=created_on%3Adesc'}}" class="nav-link" title="Danh mục">Hàng mới về</a></li>
                        <li class="nav-item default">
                            <a href="javascript:void(0)" class="nav-link" title="Dịch vụ">Dịch vụ <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="sub-menu nav-dropdown nav-dropdown-default list-unstyle">
                                @if (!empty($categories))
                                    @foreach ($categories as $item)
                                        <li><a href="{{route('home').'/tin-tuc/'.$item->alias}}" title="{{$item->title}}" class="nav-link">{{$item->title}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="box-search-desktop">
                    <div class="wg-header-search">
                        <form action="{{route('tim-kiem')}}" method="GET" class="header-search-form"> 
                            <input type="text" aria-label="Tìm sản phẩm" name="q" class="search-auto form-control" placeholder="Tìm sản phẩm..." autocomplete="off"> 
                            <button class="btn btn-default" type="submit" aria-label="Tìm kiếm"> 
                                <svg class="Icon Icon--search-desktop" viewBox="0 0 21 21"> 
                                    <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square"> 
                                        <path d="M18 18l-5.7096-5.7096"></path> 
                                        <circle cx="7.2" cy="7.2" r="7.2"></circle> 
                                    </g> 
                                </svg> 
                            </button> 
                        </form>
                    </div>
                </div>
                
                <div class="box-cart header-fill">
                    <a href="javascript:void(0)" class="header-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng"> 
                        <svg viewBox="0 0 19 23"> 
                            <path d="M0 22.985V5.995L2 6v.03l17-.014v16.968H0zm17-15H2v13h15v-13zm-5-2.882c0-2.04-.493-3.203-2.5-3.203-2 0-2.5 1.164-2.5 3.203v.912H5V4.647C5 1.19 7.274 0 9.5 0 11.517 0 14 1.354 14 4.647v1.368h-2v-.912z" fill="#222"></path> 
                        </svg> 
                        <span id="count_item_pr" class="count_item_pr">0<?php //echo $__COUNT_CART;?></span> 
                    </a>

                    <!-- Toggler/collapsibe Button -->
                    <a class="d-sm-inline-block d-lg-none menu-icon" href="javascript:void(0)" title="Menu" aria-label="Menu" id="trigger-mobile">
                        <svg height="384pt" viewBox="0 -53 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path></svg>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>