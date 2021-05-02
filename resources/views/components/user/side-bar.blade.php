<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    @foreach($list AS $row)
        <a class=" @if($row['label'] == $active)menu active @endif"  width='100%' @if(isset($row['url'])) href="{{ route($row['url']) }}" @endif @if($row['label']=='Transaksi') onclick="sidebarDropdown('Transaksi')" @endif style="cursor: pointer">
            @if($row['label'] == 'Transaksi')
                <i class="{{ $row['icon']  }}"></i><b> {{ $row['label']  }} </b> <i class="fas fa-chevron-right ml-3" style="font-size: 12px"></i>
                <a id="ts1" class="ml-4" style="display: none;cursor: pointer;" href="{{ route('TransaksiUserInput')}}"><i class="fas fa-edit" style="font-size: 14px"></i><b style="font-size: 14px"> input</b></a>
                <a id="ts2" class="ml-4" style="display: none;cursor: pointer;" href="{{ route('TransaksiUserHistory')}}"><i class="fas fa-history" style="font-size: 14px"></i><b style="font-size: 14px"> History Transaksi</b></a>
            @else
                <i class="{{ $row['icon']  }}"></i><b> {{ $row['label']  }}</b>
            @endif
        </a>
    @endforeach
    {{-- <a class="navbar-brand" href="{{ url('/') }}">
        <img class="logo" src="logo/logo.png">
    </a> --}}
</div>
