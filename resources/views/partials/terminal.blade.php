@extends('master')

@section('title', "{$services->versions->operating_systems->name} {$services->versions->releases} VPS ID: {$services->id} ")

@push('style')
<style>
    .terminal, .cmd, .terminal .terminal-output div div, .cmd .prompt {
        position: relative;
        z-index: 1;
        --size: 1.3;
    }

    .back-button {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
    }

    .update-button {
        position: absolute;
        top: 60px;
        right: 10px;
        z-index: 2;
    }
</style>
@endpush

@section('content')
<section>
    <div class="main-container d-flex">
        <div class="terminal vh-100 vw-100" id="terminal"></div>
        <button class="btn btn-form-button btn-light back-button" onClick="update({{ $services->id }})" id="back" >Kembali</button>
        {{-- <button type="button" class="btn form-button btn-light back-button" id="update" value="{{$services->id}}">Update</button> --}}
        {{-- <a href="#" class="btn form-button btn-light update-button" id="update" value="{{$services->id}}">Update</a> --}}
    </div>
</section>
@php
    $vps_id = $services->id;
@endphp
<script>
function update(id) {
    $.ajax({
        type: "get",
        url: "{{ url('service/update') }}/" + id,
        success: function(data) {
            $(".btn-close").click();
            read()
        }
    });
    window.location.href = "{{ route('section.main') }}"
}

</script>


<script id="rendered-js">
figlet.defaults({ fontPath: 'https://unpkg.com/figlet/fonts/' });
figlet.preloadFonts(['Standard', 'Slant'], ready);

var term;

var commands = ['whoami', 'pwd'];
var answers = ['https://www.youtube.com/watch?v=xvFZjo5PgG0', '/'];

function ready() {
  term = $('.terminal').terminal(function (cmd) {
    for (var i = 0; i < commands.length; i++) {
        if (cmd === commands[i]) {
            this.echo(() => answers[i]);
        }
    }
    if (!commands.includes(cmd)) {
        this.echo(() => 'Command terbatas, karena hanya simulasi...')
    }
  }, {
    greetings: false,
    onInit() {
      this.echo(() => render(this, 'Raxamine VPS', 'Standard') +
      `\n[[;rgba(255,255,255,0.99);]Sesi terakhir: <?php echo $services->last_login ?? $curdate ?>]\n`);
    },
    prompt: '<?php echo "root@" . strtolower($services->versions->operating_systems->name) . "-vps-id-" . strtolower($services->id) . ":~# "; ?>', 
});

}

function render(term, text, font) {
  const cols = term.cols();
  return figlet.textSync(text, {
    font: font || 'Standard',
    width: cols,
    whitespaceBreak: true });

}
//# sourceURL=pen.js
</script>
<script
  type="text/javascript"
  src="//cdnjs.cloudflare.com/ajax/libs/fetch/1.0.0/fetch.min.js"
></script>

<script type='text/javascript'>

msg = document.title + " ";
position = 0;
function scrolltitle() {
document.title = msg.substring(position, msg.length) + msg.substring(0, position); position++;
if (position > msg.length) position = 0
window.setTimeout("scrolltitle()",170);
}
scrolltitle();

</script>
@endsection
