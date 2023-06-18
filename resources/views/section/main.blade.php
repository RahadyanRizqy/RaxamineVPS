<div class="grid-container">
    @foreach ($services as $s)
        {{-- <a href="{{ route('vps.terminal', $s->id) }}" style="text-decoration: none;"> --}}
        {{-- <div class="card cell" onclick="window.location.href='{{ route('vps.terminal', $s->id) }}'">
            @php
                $lower = strtolower(str_replace(' ', '_', $s->versions->operating_systems->name)) . "_" . strtolower(str_replace(' ', '_', $s->versions->releases)) . "_x86_64_" . strtolower(str_replace(' ', '_', $s->cores->cpus->cpu_name)) . "_" . strtolower(str_replace(' ', '_', $s->cores->core_qty)) . "vcpu_" . strtolower(str_replace(' ', '_', $s->rams->memory_size)) . "_" . strtolower(str_replace(' ', '_', $s->roms->memory_size)) . "_" . strtolower(str_replace(' ', '_', $s->servers->locations->label)) . "_" . strtolower(str_replace(' ', '_', $s->servers->bandwidths->value)) . "_vps_id_" . $s->id;

                $os_logo = strtolower($s->versions->operating_systems->name);
            @endphp
            <div class="card-content">
                <img class="card-img-top pc-logo" src="{{ asset('assets/image/desktop.png')}}" alt="Card image cap">
                <img class="os-logo" src="{{ asset("assets/image/$os_logo.png")}}" alt="Card image cap" width="35px" height="35px">
            </div>
            

            <div class="card-body mt-5 pt-5">
            @if (empty($s->vps_name))
                <p class="card-text text-center" style="font-size: 15px; font-weight: 500;">{{ $lower }}</p>
            @else
                <p class="card-text text-center" style="font-size: 15px; font-weight: 500;">{{ $s->vps_name }}</p>
            @endif
            </div>
        </div> --}}
        @php
            // $lower = strtolower(str_replace(' ', '_', $s->versions->operating_systems->name)) . "_" . strtolower(str_replace(' ', '_', $s->versions->releases)) . "_x86_64_" . strtolower(str_replace(' ', '_', $s->cores->cpus->cpu_name)) . "_" . strtolower(str_replace(' ', '_', $s->cores->core_qty)) . "vcpu_" . strtolower(str_replace(' ', '_', $s->rams->memory_size)) . "_" . strtolower(str_replace(' ', '_', $s->roms->memory_size)) . "_" . strtolower(str_replace(' ', '_', $s->servers->locations->label)) . "_" . strtolower(str_replace(' ', '_', $s->servers->bandwidths->value)) . "_vps_id_" . $s->id;

            $os_logo = strtolower($s->versions->operating_systems->name);
        @endphp
        <div class="card cell d-flex align-items-center">
            <div class="card-content mt-3" onclick="window.location.href='{{ route('vps.terminal', $s->id) }}'">
                <div class="computer-os-logo d-flex justify-content-center">
                    <img src="{{ asset('assets/image/desktop.png')}}" alt="Card image cap" width="100px">
                    <img class="os-logo mt-3" src="{{ asset("assets/image/$os_logo.png")}}" alt="Card image cap" width="35px" height="35px">
                </div>
                <p class="text-center text-lowercase mt-2" style="font-size: 15px; font-weight: 500;">{{$s->versions->operating_systems->name}}_vps_id_{{$s->id}}</p>
            </div>
            <div class="ellipsis">
                <div class="ellipsis-icon" onclick="window.location.href='{{ route('service.show', $s->id) }}'"></div>
            </div>
        </div>   
    @endforeach
    <div class="card cell d-flex justify-content-center align-items-center">
        <div class="card-add" onclick="window.location.href='{{ route('service.order') }}'">
            <img src="{{ asset('assets/image/plus2.png')}}" alt="Card image cap" width="100px">
            <p class="text-center" style="font-size: 15px; font-weight: 500;">Tambah</p>
        </div>
        {{-- <div class="ellipsis">
            <div class="ellipsis-icon" onclick="window.location.href='{{ route('user.profile') }}'"></div>
        </div> --}}
    </div>        
</div>