@if (Auth::user()->Roles[0]['name'] == 'admin')
    <li class="nav-item {{request()->is('admin') ? 'active' : ''}} ">
        <a href="{{route('admin.index')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>    
@endif

@if (Auth::user()->Roles[0]['name'] == 'karyawan')
    <li class="nav-item {{request()->is('karyawan') ? 'active' : ''}} ">
        <a href="{{route('karyawan.index')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>    
@endif

@if (Auth::user()->Roles[0]['name'] == 'keuangan')
    <li class="nav-item {{request()->is('keuangan') ? 'active' : ''}} ">
        <a href="{{route('keuangan.index')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>    
@endif

@if (Auth::user()->Roles[0]['name'] == 'pimpinan')
    <li class="nav-item {{request()->is('pimpinan') ? 'active' : ''}} ">
        <a href="{{route('pimpinan.index')}}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>    
@endif