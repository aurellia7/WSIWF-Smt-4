<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-briefcase"></i><span>Riwayat Hidup</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('pendidikan') }}">
                        <i class="bi bi-circle"></i><span>Pendidikan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('pengalaman_kerja') }}">
                        <i class="bi bi-circle"></i><span>Pengalaman Kerja</span>
                    </a>
                </li>
            </ul>
        </li> <!-- End Icons Nav -->
    </ul>

</aside><!-- End Sidebar-->