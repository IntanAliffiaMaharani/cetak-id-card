<div class="sidebar">

    <div class="sidebar-header">

        <img src="{{ asset('img/logo.png') }}" alt="PERURI">

    </div>

    <div class="sidebar-menu">

        <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>

            Dashboard

        </a>

        <a href="{{ route('idcards.create') }}"
            class="{{ request()->routeIs('idcards.create') ? 'active' : '' }}">

            <i class="bi bi-folder-plus"></i>

            Input Data

        </a>

        <a href="{{ route('idcards.index') }}"
            class="{{ request()->routeIs('idcards.index') ? 'active' : '' }}">

            <i class="bi bi-table"></i>

            Data ID Card

        </a>

        <a href="{{ route('laporan.index') }}"
            class="{{ request()->routeIs('laporan.index') ? 'active' : '' }}">

            <i class="bi bi-bar-chart-line"></i>

            Laporan

        </a>

    </div>

    <div class="sidebar-footer">

        <div class="admin-box">

            <div class="avatar">

                <i class="bi bi-person-fill"></i>

            </div>

            <div>

                <strong>Administrator</strong>

                <br>

                <small>PERURI</small>

            </div>

        </div>

        <hr>

        <small>Version 1.0</small>

    </div>

</div>