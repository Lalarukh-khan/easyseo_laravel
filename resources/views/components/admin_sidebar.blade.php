<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('admin.home') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg class="logo-icon-2"  id="logo-38" width="78" height="32" viewBox="0 0 78 32" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M55.5 0H77.5L58.5 32H36.5L55.5 0Z" class="ccustom" fill="#FF7A00"></path> <path d="M35.5 0H51.5L32.5 32H16.5L35.5 0Z" class="ccompli1" fill="#FF9736"></path> <path d="M19.5 0H31.5L12.5 32H0.5L19.5 0Z" class="ccompli2" fill="#FFBC7D"></path> </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">easyseo.<span style="color: #f47300;">ai</span></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{route('admin.home')}}" class="menu-link">
                    <div data-i18n="Analytics">Analytics</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Templates -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Dashboards">Templates</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{route('admin.template.category.all')}}" class="menu-link">
                    <div data-i18n="Categories">Categories</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('admin.template.all')}}" class="menu-link">
                    <div data-i18n="Templates">Templates</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Reports">Reports</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.report.requests')}}" class="menu-link">
                    <div data-i18n="Requests">Requests</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Settings -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-check-shield"></i>
                <div data-i18n="Setting">Setting</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.setting.add')}}" class="menu-link">
                    <div data-i18n="API">API Key</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Blog -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-carousel"></i>
                <div data-i18n="Blog">Blog</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.blog.category.all')}}" class="menu-link">
                    <div data-i18n="API">Categories</div>
                  </a>
                </li>
              </ul>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.blog.all')}}" class="menu-link">
                    <div data-i18n="API">All Blogs</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li>
            <li class="menu-item">
              <a href="{{route('admin.admin-users.all')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Email">Admin User</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('admin.user.all')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Email">Users</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('admin.contact_list')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Invoice">Contact</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->