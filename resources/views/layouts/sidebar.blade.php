
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
    @endif
    </ul>
</section>