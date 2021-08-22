<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('admin/assets/images/logo.svg')}}" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{ asset(Auth::user()->image) }}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
            <span>Gold Member</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="{{ route('account.setting') }}" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('show.password') }}" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    @if (Auth::user()->category == 1 )
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
          <span class="menu-icon">
            <i class="mdi mdi-book-open-page-variant"></i>
          </span>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('categories') }}">Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('sub.categories') }}">SubCategory</a></li>
          </ul>
        </div>
      </li>
    @endif

    @if (Auth::user()->district == 1 )
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-district" aria-expanded="false" aria-controls="ui-district">
        <span class="menu-icon">
          <i class="mdi mdi-city"></i>
        </span>
        <span class="menu-title">Districts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-district">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('districts') }}">District</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('subdistricts') }}">SubDistrict</a></li>
        </ul>
      </div>
    </li>
    @endif

    @if (Auth::user()->post == 1 )
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-post" aria-expanded="false" aria-controls="ui-post">
        <span class="menu-icon">
          <i class="mdi mdi-newspaper"></i>
        </span>
        <span class="menu-title">Posts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-post">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('add.post') }}">Add Post</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('all.posts') }}">All Post</a></li>
        </ul>
      </div>
    </li>
    @endif

    @if (Auth::user()->setting == 1 )
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
        <span class="menu-icon">
          <i class="mdi mdi-settings"></i>
        </span>
        <span class="menu-title">Settings</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="settings">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('setting.social') }}">Socials Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('setting.seo') }}">SEO Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('setting.prayer') }}">Prayers Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('setting.live.tv') }}">Live TV Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('setting.notice') }}">Notice Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('setting.website') }}">Website Setting</a></li>
        </ul>
      </div>
    </li>
    @endif

    @if (Auth::user()->website == 1 )
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#web" aria-expanded="false" aria-controls="web">
        <span class="menu-icon">
          <i class="mdi mdi-web"></i>
        </span>
        <span class="menu-title">Website</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="web">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('add.web') }}">Add Web</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('all.webs') }}">All Webs</a></li>
        </ul>
      </div>
    </li>
    @endif

    @if (Auth::user()->role == 1 )
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#role" aria-expanded="false" aria-controls="web">
        <span class="menu-icon">
          <i class="mdi mdi-account"></i>
        </span>
        <span class="menu-title">User Roles</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="role">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('add.writer') }}">Add writer</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('all.writer') }}">All writer</a></li>
        </ul>
      </div>
    </li>
    @endif
    
    @if (Auth::user()->gallery == 1 )
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
        <span class="menu-icon">
          <i class="mdi mdi-image"></i>
        </span>
        <span class="menu-title">Gallery</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="gallery">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('all.photos') }}">All Photos</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('all.videos') }}">All Videos</a></li>
        </ul>
      </div>
    </li>
    @endif

    <li class="nav-item menu-items">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
        <span class="menu-icon">
          <i class="mdi mdi-file-document-box"></i>
        </span>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>