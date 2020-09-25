<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"></div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                {{Auth::user()->nama}}
                                <span class="user-level">{{Auth::user()->level}}</span>
                            </span>
                        </a>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    @include('partials.partials.dash_menu')
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Data Master</h4>
                    </li>
                    @can(['CRUD Asset','CRUD User'])
                    <li class="nav-item {{request()->is('admin/asset') ? 'active' : ''}}">
                        <a href="{{route('asset.index')}}">
                            <i class="fas fa-car"></i>
                            <p>Data Asset</p>
                        </a>
                    </li>
                    @isset($path)
                    <li
                        class="nav-item {{request()->is('admin/user') || $path[0] == 'admin' && $path[1] == 'user' ? 'active' : ''}}">
                        @else
                        <li class="nav-item {{request()->is('admin/user') ? 'active' : ''}}">
                            @endisset
                            <a href="{{route('user.index')}}">
                                <i class="fa fa-users"></i>
                                <p>Data User</p>
                            </a>
                        </li>              
                    @endcan                  
                        @can(['Confirm & Reject Service Request','Confirm & Reject Sparepart Request'])
                            <li class="nav-item {{request()->is('service') ? 'active' : ''}}">
                                <a href="{{route('service.index')}}">
                                    <i class="fa fa-wrench"></i>
                                    <p>Data Service</p>
                                </a>
                            </li>
                            <li class="nav-item {{request()->is('sparepart') ? 'active' : ''}}">
                                <a href="{{route('sparepart.index')}}">
                                    <i class="fa fa-cogs"></i>
                                    <p>Data Sparepart</p>
                                </a>
                            </li>
                        @endcan

                        
                        
                        @can('Report Download')
                            <li class="nav-item {{request()->is('laporan/service') ||  request()->is('laporan/sparepart') ? 'active' : ''}} ">
                                <a data-toggle="collapse" href="#laporan">
                                    <i class="fas fa-table"></i>
                                    <p>Laporan  </p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="laporan">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{route('service.report')}}">
                                                <span class="sub-item">Laporan Service</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('sparepart.report')}}">
                                                <span class="sub-item">Laporan Sparepart</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endcan               
                        @can(['Request Service', 'Request Sparepart'])
                        <li class="nav-item {{request()->is('karyawan/service') || request()->is('karyawan/list-service-request') ? 'active' : ''}} ">
                            <a data-toggle="collapse" href="#laporan">
                                <i class="fas fa-wrench"></i>
                                <p>Service</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="laporan">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('service.request')}}">
                                            <span class="sub-item">Permintaan Service</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('service.listRequest')}}">
                                            <span class="sub-item">List Permintaan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item {{request()->is('karyawan/sparepart') || request()->is('karyawan/list-sparepart-request') ? 'active' : ''}} ">
                            <a data-toggle="collapse" href="#sparepart">
                                <i class="fas fa-cogs"></i>
                                <p>Sparepart</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sparepart">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('sparepart.request')}}">
                                            <span class="sub-item">Permintaan Sparepart</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('sparepart.listRequest')}}">
                                            <span class="sub-item">List Permintaan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endcan    
                    </ul>
                </div>
            </div>
        </div>