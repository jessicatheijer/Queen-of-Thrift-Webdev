<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i
                                    class="icon fa fa-check"></i>Order Tracking</a></li>
                        <li>
                            @auth
                            <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>Akun Saya</a>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Masuk/Daftar</a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"></a>
                        </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="post" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">
                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"
                                    id="search" name="search" placeholder="Cari Disini..." />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ===== === SHOPPING CART DROPDOWN ===== == -->
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket">
                                    <span class="total-price"> <span class="sign">Rp</span>
                                        <span class="value" id="cartSubTotal"> </span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--   // Mini Cart Start with Ajax -->

                                <div id="miniCart">

                                </div>

                                <!--   // End Mini Cart Start with Ajax -->


                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal"> </span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('mycart') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Keranjang</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->



                    <!-- == === SHOPPING CART DROPDOWN : END=== === -->
                </div>

                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle"
                                        data-toggle="dropdown">
                                        Beranda
                                    </a>
                                </li>

                                <!--   // Get Category Table Data -->
                                @php
                                $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                                @endphp

                                @foreach($categories as $category)
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                        class="dropdown-toggle" data-toggle="dropdown">
                                        {{ $category->category_name }}
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">

                                                    <!--   // Get SubCategory Table Data -->
                                                    @php
                                                    $subcategories =
                                                    App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                    @endphp

                                                    @foreach($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a
                                                            href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
                                                            <h2 class="title">{{ $subcategory->subcategory_name }}
                                                            </h2>
                                                        </a>


                                                        <!--   // Get SubSubCategory Table Data -->
                                                        @php
                                                        $subsubcategories =
                                                        App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
                                                        @endphp

                                                        @foreach($subsubcategories as $subsubcategory)
                                                        <ul class="links">
                                                            <li><a
                                                                    href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug ) }}">
                                                                    {{ $subsubcategory->subsubcategory_name }}
                                                                </a></li>

                                                        </ul>
                                                        @endforeach
                                                        <!-- // End SubSubCategory Foreach -->

                                                    </div>
                                                    <!-- /.col -->
                                                    @endforeach
                                                    <!-- // End SubCategory Foreach -->

                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img
                                                            class="img-responsive"
                                                            src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}"
                                                            alt=""> </div>
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                                <!-- // End Category Foreach -->


                                <li> <a href="{{ route('shop.page') }}">Belanja</a> </li>
                                {{-- <li> <a href="{{ route('shop.page') }}">Tentang</a> </li>
                                <li> <a href="{{ route('shop.page') }}">Kontak</a> </li> --}}
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Promo</a> </li>
                                {{-- <li class="dropdown  navbar-right special-menu"> <a
                                        href="{{ route('home.blog') }}">Blog</a> </li> --}}
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

    <!-- Order Traking Modal -->
    <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lacak Pesanan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label>Nomor Invoice</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Masukkan Kode Invoice">
                        </div>

                        <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Cari </button>

                    </form>


                </div>

            </div>
        </div>
    </div>

</header>

<style>
    .search-area {
        position: relative;
    }

    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>
<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }

    function search_result_show() {
        $("#searchProducts").slideDown();
    }
</script>