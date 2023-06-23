@extends('master')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/register.css')}}">
@endpush

@section('title', 'Register')

@section('content')
{{-- <section class="col-md-3">
    <h1>Register</h1>
    <?php $value = 'register' ?>
    <form action="{{ route('account.store', 'register') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <a href="{{ route('account.index') }}">Login</a>
        <button type="submit" class="btn form-button btn-primary">Register</button>
        <input type="checkbox" id="showPasswordCheckbox"><span style="color: black"> Tampilkan/Sembunyikan password</span><br>
        <script>
            $(document).ready(function() {
                $('#showPasswordCheckbox').change(function() {
                    var passwordField = $('#password');
                    var isChecked = $(this).is(':checked');
                    
                    if (isChecked) {
                        passwordField.attr('type', 'text');
                    } else {
                        passwordField.attr('type', 'password');
                    }
                    });
                });
        </script>   
    </form>
</section> --}}
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="{{ route('account.store', 'register') }}" method="post">
                @csrf
                <h2>Daftar</h2>
                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="fullname" placeholder="Nama Lengkap" required>
                    {{-- <label for="">Username</label> --}}
                </div>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" placeholder="Email" required>
                    {{-- <label for="">Email</label> --}}
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline" id="password-lock"></ion-icon>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    {{-- <label for="">Password</label> --}}
                </div>
                <div class="inputbox">
                    <ion-icon name="card"></ion-icon>
                    <input type="text" name="ccnum" placeholder="CC cth: 1234-XXXX-XXXX-XXXX"required>
                    {{-- <label for="">Email</label> --}}
                </div>
                <div class="inputbox">
                    <input type="number" name="cvv" placeholder="CVV cth: 273"required>
                    {{-- <label for="">Email</label> --}}
                </div>
                <div class="inputbox">
                    <input type="text" name="card_exp" placeholder="EXP cth: 2024/06"required>
                    {{-- <label for="">Email</label> --}}
                </div>
                {{-- <div class="passwordCheck mt-3">
                    <input type="checkbox" id="showPasswordCheckbox"><span style="color: black"> Tampilkan/Sembunyikan password</span><br>  
                </div> --}}
                <div class="register">
                    <p style="color: black;">Sudah punya akun? <a href="{{ route('account.index') }}">Login</a></p>
                </div>
              <button type="submit">Daftar</button>
            </form>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#showPasswordCheckbox').change(function() {
            var passwordField = $('#password');
            var isChecked = $(this).is(':checked');
            
            if (isChecked) {
                passwordField.attr('type', 'text');
            } else {
                passwordField.attr('type', 'password');
            }
            });
        });

        $('#password-lock').click(function() {
            var passwordField = $('#password');
            var icon = $(this);

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                icon.attr('name', 'lock-open-outline');
            } else {
                passwordField.attr('type', 'password');
                icon.attr('name', 'lock-closed-outline');
            }
        });
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection