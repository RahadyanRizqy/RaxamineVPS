<div class="activity">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Aktivitas</th>
            <th>Tanggal / Waktu</th>
        </tr>
        {{-- {{ $i = 0 }} --}}
        @foreach ($activities as $a)    
        <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->detail}}</td>
            <td>{{$a->activity_at}}</td>
        </tr>
        @endforeach
    </table>
</div>