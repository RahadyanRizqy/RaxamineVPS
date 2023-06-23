@extends('master')

@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css')}} ">
@endpush

@section('title', 'Login')

@section('content')
{{-- <section class="col-md-3">
    <h1>Login</h1>
    <?php $value = 'login' ?>
    <form action="{{ route('account.store', 'login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <a href="{{ route('account.create') }}">Register</a>
        <button type="submit" class="btn form-button btn-primary">Login</button>
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
            <form action="{{ route('account.store', 'login') }}" method="post">
                @csrf
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required>
                    {{-- <label for="">Email</label> --}}
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline" id="password-lock"></ion-icon>
                    <input type="password" id="password" name="password" required>
                    {{-- <label for="">Password</label> --}}
                </div>
                <button type="submit">Login</button>
                {{-- <button>Log in</button> --}}
                {{-- <div class="passwordCheck mt-3">
                    <input type="checkbox" id="showPasswordCheckbox"><span style="color: black"> Tampilkan/Sembunyikan password</span><br>  
                </div> --}}
                <div class="register">
                    <p>Tidak punya akun? <a href="{{ route('account.create') }}">Register</a></p>
                </div>
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
    });
</script> 
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection