<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                <li><a href="{{route('listproduct')}}"><i class="fa fa-list"></i>Sản phẩm <span ></span></a>
                  <li><a><i class="fa fa-shopping-cart"></i>Đơn hàng<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{route('list_order')}}">Đơn đặt</a></li>
                    <li><a href="{{route('listOrderConfirmed')}}">Đơn đã xác thực</a></li>
                    <li><a href="{{route('listOrderShiping')}}">Đơn đang gửi</a></li>
                    <li><a href="{{route('listOrderPaymented')}}">Đơn đã thanh toán</a></li>
                    <li><a href="{{route('listOrderDistroyed')}}">Đơn đã huỷ</a></li>

                    </ul>
                  </li>
                  <li><a href="{{route('listIO')}}"><i class="fa fa-edit"></i> Đơn nhập hàng<span></span></a>
                    
                  </li>
                  <li><a><i class="fa fa-male"></i> Khách hàng<span ></span></a>
                   
                  </li>
                  <li><a href="{{route('listNcc')}}"><i class="fa fa-table"></i>Nhà cung cấp<span ></span></a>
                   
                  </li>
                  <li><a href="{{route('listAccount')}}"><i class="fa fa-bar-chart-o"></i>Tài khoản<span ></span></a>
                    
                  </li>
                  
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
             

            </div>