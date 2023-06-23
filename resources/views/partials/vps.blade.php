@extends('master')

@section('title', 'Raxamine VPS')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/css/vps.css')}}">
@endpush

@section('content')

<section id="order-form">
<form action="{{ route('service.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="vps-os">Pilih OS: </label>
        <select name="vps_os" id="vps-os" class="form-select">
            <option value=""> </option>
            @foreach ($oss as $os)
                <option value="{{ $os->id }}" data-price="{{ $os->price }}">{{ $os->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="vps-version">Pilih Versi: </label>
        <select name="vps_version" id="vps-version" class="form-select" disabled>
            <option value=""> </option>
        </select>
    </div>

    <div class="form-group">
        <label for="vps-cpu">Pilih CPU: </label>
        <select name="vps_cpu" id="vps-cpu" class="form-select" disabled>
            <option value=""> </option>
            @foreach ($cpu as $c)
                <option value="{{ $c->id }}" data-price="{{ $c->price }}">{{ $c->cpu_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="vps-core">Pilih Core: </label>
        <select name="vps_core" id="vps-core" class="form-select" disabled>
            <option value="" data-qty=""> </option>
        </select>
    </div>   
    
    <div class="form-group">
        <label for="vps-ram">Pilih Memory: </label>
        <select name="vps_ram" id="vps-ram" class="form-select" disabled>
            <option value="" data-price=""> </option>
            @foreach ($ram as $r)
                <option value="{{ $r->id }}" data-price="{{ $r->memory_price }}">{{ $r->memory_size }}</option>
            @endforeach
        </select>
    </div>  

    <div class="form-group">
        <label for="vps-rom">Pilih Storage: </label>
        <select name="vps_rom" id="vps-rom" class="form-select" disabled>
            <option value="" data-price=""> </option>
            @foreach ($rom as $r)
                <option value="{{ $r->id }}" data-price="{{ $r->memory_price }}">{{ $r->memory_size }}</option>
            @endforeach
        </select>
    </div>   
    
    <div class="form-group">
        <label for="vps-location">Pilih Lokasi: </label>
        <select name="vps_location" id="vps-location" class="form-select" disabled>
            <option value="" data-price=""> </option>
            @foreach ($loc as $l)
                <option value="{{ $l->id }}" data-price="{{ $l->price }}">{{ $l->country }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="vps-bandwidth">Pilih Bandwidth: </label>
        <select name="vps_bandwidth" id="vps-bandwidth" class="form-select" disabled>
            <option value="" data-price=""> </option>
            @foreach ($bdw as $b)
                <option value="{{ $b->id }}" data-price="{{ $b->price }}">{{ $b->value }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="vps-duration">Pilih Durasi (Bulanan): </label>
        <select name="vps_duration" id="vps-duration" class="form-select" disabled>
            @foreach ($dbn as $d)
                <option value="{{ $d }}" data-price="{{ $price[$i] }}">{{ $d }}</option>
                {{ $i++ }}
            @endforeach
        </select>
    </div>


    {{-- SELECTIONS --}}
    <div id="vps_total_price"></div>
    <input type="hidden" name="vps_total_price" id="selections-input">

    
    <div>
        <button type="submit" class="btn form-button btn-success">Pesan</button>
        <a href="{{ url()->previous() }}" class="btn form-button btn-dark">Kembali</a>
    </div>
</form>
</section>

<!-- Include the jQuery library -->
<script>
    $(document).ready(function () {
        $('#vps-os').on('change', function () {
            var os_id = this.value;
            var versionSelected = $(this).val();
            
            if (versionSelected) {
                $('#vps-version').prop('disabled', false);
            } else {
                $('#vps-version').prop('disabled', true);
            }

            $("#vps-version").html('');
            $.ajax({
                url: "{{url('fetch/get-versions')}}",
                type: "POST",
                data: {
                    os_id: os_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#vps-version').html('<option value=""> </option>');
                    $.each(result, function (key, value) {
                        $("#vps-version").append('<option value="' + value['id'] + '">' + value['releases'] + '</option>');
                    });
                }
            });
        });

        $('#vps-cpu').on('change', function () {
            var cpu_id = this.value;
            $("#vps-core").html('');
            $.ajax({
                url: "{{url('fetch/get-cores')}}",
                type: "POST",
                data: {
                    cpu_id: cpu_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#vps-core').html('<option value="" data-qty=""> </option>');
                    $.each(result, function (key, value) {
                        $("#vps-core").append('<option value="' + value['id']+ '" data-price="'+ value['core_price'] +'">' + value['core_qty'] + '</option>');
                    });
                }
            });
        });

        $('#vps-os, #vps-version, #vps-cpu, #vps-core, #vps-ram, #vps-rom, #vps-location, #vps-bandwidth, #vps-duration').on('change', function () {
            var durQty = parseInt($('#vps-duration option:selected').val()) || 1;

            var osPrice = $('#vps-os option:selected').data('price') || 0;
            var cpuPrice = $('#vps-cpu option:selected').data('price') || 0;
            var coreQty = parseInt($('#vps-core option:selected').data('qty')) || 0;
            var corePrice = $('#vps-core option:selected').data('price') || 0;
            var ramPrice = $('#vps-ram option:selected').data('price') || 0;
            var romPrice = $('#vps-rom option:selected').data('price') || 0;
            var locPrice = $('#vps-location option:selected').data('price') || 0;
            var bdwPrice = $('#vps-bandwidth option:selected').data('price') || 0;
            var durPrice = $('#vps-duration option:selected').data('price') || 0;
            var selections = 0;

            if (osPrice || cpuPrice || coreQty || ramPrice || romPrice || locPrice || bdwPrice || durPrice) {
                if (durQty > 1) {
                    var total = ((osPrice + (cpuPrice + corePrice) + ramPrice + romPrice + locPrice + bdwPrice) * durQty)
                    selections = total - (total*(durPrice/100));
                } else {
                    selections = ((osPrice + (cpuPrice + corePrice) + ramPrice + romPrice + locPrice + bdwPrice) * durQty);
                }
            } else {
                selections = 0;
            }

            $('#vps_total_price').text("Harga: " + selections);
            $('#selections-input').val(selections);
        });

        $('#vps-version').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-cpu').prop('disabled', false);
            } else {
                $('#vps-cpu').prop('disabled', true);
        }});

        $('#vps-cpu').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-core').prop('disabled', false);
            } else {
                $('#vps-core').prop('disabled', true);
        }});

        $('#vps-core').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-ram').prop('disabled', false);
            } else {
                $('#vps-ram').prop('disabled', true);
        }});

        $('#vps-ram').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-rom').prop('disabled', false);
            } else {
                $('#vps-rom').prop('disabled', true);
        }});

        $('#vps-rom').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-location').prop('disabled', false);
            } else {
                $('#vps-location').prop('disabled', true);
        }});

        $('#vps-location').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-bandwidth').prop('disabled', false);
            } else {
                $('#vps-bandwidth').prop('disabled', true);
        }});

        $('#vps-bandwidth').on('change', function () {
        var versionSelected = $(this).val();
            if (versionSelected) {
                $('#vps-duration').prop('disabled', false);
            } else {
                $('#vps-duration').prop('disabled', true);
        }});

        // $('.form-select').prop('disabled', false);
    });
</script>
@endsection