
<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    @if (Auth::user()->hasRole('superadmin'))
        @include('layouts.menu_superadmin');
    @elseif(Auth::user()->hasRole('pelanggan'))
        @include('layouts.menu_pelanggan');
    @elseif(Auth::user()->hasRole('petugas_administrasi'))
        @include('layouts.menu_administrasi');
    @elseif(Auth::user()->hasRole('pengawas_teknis'))
        @include('layouts.menu_teknis');
    @elseif(Auth::user()->hasRole('petugas_pengambil_contoh'))
        @include('layouts.menu_petugas_pengambil_contoh');
    @elseif(Auth::user()->hasRole('penyelia'))
        @include('layouts.menu_penyelia');
    @elseif(Auth::user()->hasRole('analis'))
        @include('layouts.menu_analis');
    @elseif(Auth::user()->hasRole('kepala_sub_bagian_tata_usaha'))
        @include('layouts.menu_kepala_sub_bagian_tata_usaha');
    @elseif(Auth::user()->hasRole('kepala_laboratorium'))
        @include('layouts.menu_kepala_laboratorium');
    @else
        @include('layouts.menu_rolelain');
    @endif

    
    </ul>
</section>