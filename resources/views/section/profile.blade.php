<div class="container">
  <section class="main">
      <div class="profile">
          <div class="profile-details">
              <h3>Informasi Pribadi</h3>
              <ul>
                  @php
                    $number = $account->balance ?? 0;
                    $formattedNumber = 'Rp' . number_format($number, 0, ',', '.') . ',-';
                  @endphp
                  <li><span>Nama Lengkap:</span>  {{ $account->fullname ?? null }}</li>
                  <li><span>Email:</span> {{ $account->email ?? null }}</li>
                  <li><span>Saldo:</span> {{ $formattedNumber ?? null }}</li>
              </ul>
          </div>
      </div>
      <div class="add-balance">
        <a href="{{ route('payment.form') }}" class="btn">Tambah Saldo</a>
      </div>
      {{-- <a href="{{ url()->previous() }}" class="btn btn-dark">Kembali</a> --}}
  </section>
</div>  