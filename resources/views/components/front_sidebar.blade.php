<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header nwsidebar-header">
        <div class="" style="display: none;">
            <svg class="logo-icon-2"  id="logo-38" width="78" height="32" viewBox="0 0 78 32" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M55.5 0H77.5L58.5 32H36.5L55.5 0Z" class="ccustom" fill="#FF7A00"></path> <path d="M35.5 0H51.5L32.5 32H16.5L35.5 0Z" class="ccompli1" fill="#FF9736"></path> <path d="M19.5 0H31.5L12.5 32H0.5L19.5 0Z" class="ccompli2" fill="#FFBC7D"></path> </svg>
        </div>
        <div id="nwmainlogo">
            <img src="{{asset('admin_assets')}}/assets/images/userlogo.svg" alt="EasySEO.AI" class="nwlogo-img">
            <!-- <h4 class="logo-text">
                <span style="color:#ffffff;">easyseo.</span><span style="color: #f47300;">ai</span>
            </h4> -->
        </div>
        <a href="javascript:;" id="nwtoggle" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu nwmetismenu" id="menu">
        <li>
            <a href="{{route('user.dashboard')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('user.template.all')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-list-ol"></i>
                </div>
                <div class="menu-title">Templates</div>
            </a>
        </li>
        <li>
            <a href="{{route('user.editor.all')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-edit"></i>
                </div>
                <div class="menu-title">Editor</div>
            </a>
        </li>
        <li>
            <a href="{{route('user.chat.index')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-chat"></i>
                </div>
                <div class="menu-title">Ezchat</div>
            </a>
        </li>
        <li>
            <a href="{{route('user.keyword-suggestion.index')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-share-alt"></i>
                </div>
                <div class="menu-title">Keyword Suggestions</div>
            </a>
        </li>
        {{-- <li>
            <a href="{{route('user.history.all')}}">
                <div class="parent-icon icon-color-2"><i class="bx bx-history"></i>
                </div>
                <div class="menu-title">History</div>
            </a>
        </li> --}}
        <li>
            <a href="{{route('user.subscription')}}">
                <div class="parent-icon icon-color-2"><i class="fadeIn animated bx bx-package"></i>
                </div>
                <div class="menu-title">Subscription</div>
            </a>
        </li>
        <li>
            <a href="{{route('user.billing.all')}}">
                <div class="parent-icon icon-color-2"><i class="fadeIn animated bx bx-diamond"></i>
                </div>
                <div class="menu-title">Plans & Billing</div>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <br>
        <br>
        <br>
        <br>
        <ul class="metismenu nwmetismenu" id="menu">
            @include('components.sidebar_msg')
            <br>

            <li>
                <a href="{{route('user.settings')}}">
                    <div class="parent-icon icon-color-2">
                        <img src="{{asset('front')}}/assets/images/gear.svg" alt="" class="sdftrbtmimg">
                    </div>
                    <div class="menu-title nwmenu-title">Settings</div>
                </a>
            </li>
            <li>
                <a href="{{route('user.help')}}" >
                    <div class="parent-icon icon-color-2">
                        <img src="{{asset('front')}}/assets/images/mark.svg" alt="" class="sdftrbtmimg">
                    </div>
                    <div class="menu-title nwmenu-title">Help</div>
                </a>
            </li>
        </ul>
    </div>
    <!--end navigation-->
</div>

  <!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h1 class="nwhltitle">Help & Support</h1>
        <h5>Fill out the form and we will contact you shortly:</h5>
        <p class="nwhlmainp">Contact us though this form, if you need to get help <br> and assistance on how to use the platform:</p>
        <form action="">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <input type="text" name="name" class="form-control nwhlinp" placeholder="Name">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <input type="email" name="email" class="form-control nwhlinp" placeholder="Email">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <input type="text" name="phone" class="form-control nwhlinp" placeholder="Phone">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <textarea name="message" id="" width="100%" rows="6" class="form-control nwhlinp" placeholder="Message"></textarea>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <button type="submit" class="nwhlsbmtbtn">Send</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div> -->