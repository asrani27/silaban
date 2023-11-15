
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
    @else
        @include('layouts.menu_rolelain');
    @endif
    </ul>
</section>