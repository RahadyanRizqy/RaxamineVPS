<div class="main-top">
    <h1>Selamat Datang, {{ Auth::user()->fullname}}!</h1>
</div>
<div class="grid-container">
  @foreach ($services as $s)
      @php
          $os_logo = strtolower($s->versions->operating_systems->name);
      @endphp
      <div class="card cell">
          <div class="card-content" onclick="window.location.href='{{ route('vps.terminal', $s->id) }}'">
              <div class="computer-os-logo">
                  <img src="{{ asset('assets/image/desktop.png')}}" alt="Card image cap" width="100px">
                  <div class="os-logo-container">
                      <img src="{{ asset("assets/image/$os_logo.png")}}" alt="Card image cap" width="35px" height="35px">
                  </div>
              </div>
              <p style="font-size: 15px; font-weight: 500;">{{$s->versions->operating_systems->name}}_vps_id_{{$s->id}}</p>
          </div>
          <div class="ellipsis">
              {{-- <div class="ellipsis-icon" onclick="window.location.href='{{ route('service.show', $s->id) }}'"></div> --}}
              <div class="ellipsis-icon"></div>
              <ul class="ellipsis-option">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Logout</a></li>
              </ul>
          </div>
      </div>   
  @endforeach
  <div class="card cell">
      <div class="card-add" onclick="window.location.href='{{ route('service.order') }}'">
          <img src="{{ asset('assets/image/plus2.png')}}" alt="Card image cap" width="100px">
          <p style="font-size: 15px; font-weight: 500;">Tambah</p>
      </div>
  </div>        
</div>
    {{-- <div class="card">
      <i class="fab fa-wordpress"></i>
      <h3>Wordpress</h3>
      <p>Join over 3 million student</p>
      <button>Get Started</button>
    </div>
    <div class="card">
      <i class="fas fa-palette"></i>
      <h3>Graphic Design</h3>
      <p>Join over 2 million student</p>
      <button>Get Started</button>
    </div>
    <div class="card">
      <i class="fab fa-app-store-ios"></i>
      <h3>IOS dev</h3>
      <p>Join over 1 million student</p>
      <button>Get Started</button>
    </div> --}}
</div>