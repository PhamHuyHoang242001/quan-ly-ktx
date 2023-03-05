<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('assets') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{route('dashboard')}}"><img style="width:100px;display: block; margin-left: auto; margin-right: auto;" src="{{ URL::to('/material/img/logo-dai-hoc-bach-khoa-ha-noi.png') }}" alt="logo"></a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      @if(Auth::user()->hasRole('admin'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="material-icons">perm_identity</i>
            <p> {{ __('Quản lý thông tin ') }} </p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('manager_duyetdk') }}">
            <i class="material-icons">perm_identity</i>
              <p>{{ __('Duyệt đăng ký') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('manager_qlphong') }}">
            <i class="material-icons">perm_identity</i>
              <p>{{ __('Quản lý phòng ở') }}</p>
          </a>
        </li>

      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.profile.index') }}">
            <i class="material-icons">perm_identity</i>
              <p>{{ __('Thông tin cá nhân') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('area_info') }}">
            <i class="material-icons">perm_identity</i>
              <p>{{ __('Đăng ký phòng') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('student_xemdk') }}">
            <i class="material-icons">perm_identity</i>
              <p>{{ __('Trạng thái đăng ký') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('view_managers') }}">
            <i class="material-icons">perm_identity</i>
              <p>{{ __('Cán bộ quản lý') }}</p>
          </a>
        </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ route('changepassword') }}">
          <i class="material-icons">mode_edit</i>
            <p>{{ __('Đổi mật khẩu ') }}</p>
        </a>
      </li>
      
    </ul>
  </div>
</div>
