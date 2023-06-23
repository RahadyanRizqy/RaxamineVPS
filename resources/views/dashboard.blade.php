<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if($section == 'activity')
    <title>Activity</title>
  @elseif($section == 'transaction')
    <title>Transaction</title>
  @elseif($section == 'profile')
    <title>Profile</title>
  @else
    <title>Main Dashboard</title>
  @endif
<link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="{{ asset('assets/image/vps.png') }}" alt="">
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="{{route('section.main')}}">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="{{ route('user.profile') }}">
          <i class="fas fa-user"></i>
          <span class="nav-item">Profile</span></a></li>
          {{-- <li><a href="">
              <i class="fas fa-chart-bar"></i>
              <span class="nav-item">Analis</span>
            </a></li> --}}
        <li><a href="{{ route('section.activity') }}">
            <i class="fas fa-tasks"></i>
            <span class="nav-item">Aktivitas</span>
        </a></li>
        <li><a href="{{ route('section.transaction') }}">
            <i class="fas fa-wallet"></i>
            <span class="nav-item">Transaksi</span>
        </a></li>
            {{-- <li><a href="">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Settings</span>
        </a></li> --}}
        <li><a href="https://wa.me/+6288804897436">
          <i class="fas fa-question-circle"></i>
          <span class="nav-item">Help</span>
        </a></li>
        <li><a href="{{ route('user.logout') }}" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Logout</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
        @if($section == 'activity')
            @include('section.activity')
        @elseif($section == 'transaction')
            @include('section.transaction')
        @elseif($section == 'profile')
            @include('section.profile')
        @else
            @include('section.main')
        @endif
      {{-- <section class="main-course">
        <h1>My courses</h1>
        <div class="course-box">
          <ul>
            <li class="active">In Progress</li>
            <li>Explore</li>
            <li>Incoming</li>
            <li>Finished</li>
          </ul>
          <div class="course">
            <div class="box">
              <h3>HTML</h3>
              <p>80% - progress</p>
              <button>continue</button>
              <i class="fab fa-html5 html"></i>
            </div>
            <div class="box">
              <h3>CSS</h3>
              <p>50% - progress</p>
              <button>continue</button>
              <i class="fab fa-css3-alt css"></i>
            </div>
            <div class="box">
              <h3>JavaScript</h3>
              <p>30% - progress</p>
              <button>continue</button>
              <i class="fab fa-js-square js"></i>
            </div>
          </div>
        </div>
      </section> --}}
    </section>
  </div>
</body>
</html>
