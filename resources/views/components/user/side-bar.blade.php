<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    @foreach($list AS $row)
        <a class=" @if($row['label'] == $active)menu active @endif"  width='100%' href="{{ route($row['url']) }}">
            <b>{{ $row['label']  }}</b>
        </a>
    @endforeach
    {{-- <a class="navbar-brand" href="{{ url('/') }}">
        <img class="logo" src="logo/logo.png">
    </a> --}}
</div>
