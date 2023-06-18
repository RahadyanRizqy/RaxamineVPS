@extends('master')

@section('content')
<section class="col-md-3">
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
</section>
@endsection