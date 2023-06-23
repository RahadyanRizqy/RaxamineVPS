{{-- <h1>Transaksi</h1>
<h1>{{ Auth::user()->fullname ?? 'Null' }}</h1>
<h3>{{ Auth::user()->email ?? 'Null' }}</h3> --}}
<div class="activity">
    <table class="table table-bordered">
        <tr>
            <th>ID Transaksi</th>
            <th>ID VPS Yang Diorder</th>
            <th>Total Harga</th>
            <th>Tanggal / Waktu</th>
        </tr>
        @foreach ($transaction as $t)
        <tr>
            <td>{{$t->id ?? null}}</td>
            <td>{{$t->transactions->id ?? null}}</td>
            <td>Rp{{$t->vps_total_price}}</td>
            <td>{{$t->transactions->ordered_at}}</td>
        </tr>
        @endforeach
    </table>
</div>