<div class="topbar">

    <div>

        <h3 class="page-title mb-0">
            Dashboard
        </h3>

        <small class="text-muted">
            ID Card Management System - PERURI
        </small>

    </div>

    <div class="topbar-right">

        <div class="date-box">

            <i class="bi bi-calendar3"></i>

            <span id="tanggal"></span>

        </div>

        <div class="clock-box">

            <i class="bi bi-clock"></i>

            <span id="jam"></span>

        </div>

        <div class="dropdown">

            <button
                class="btn profile-btn dropdown-toggle"
                data-bs-toggle="dropdown">

                <div class="avatar">

                    <i class="bi bi-person-fill"></i>

                </div>

                <div class="text-start">

                    <strong>Administrator</strong>

                    <br>

                    <small>PERURI</small>

                </div>

            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>

                    <a class="dropdown-item" href="#">

                        <i class="bi bi-person"></i>

                        Profile

                    </a>

                </li>

                <li>

                    <a class="dropdown-item" href="#">

                        <i class="bi bi-gear"></i>

                        Pengaturan

                    </a>

                </li>

                <li><hr class="dropdown-divider"></li>

                <li>

                    <a class="dropdown-item text-danger" href="#">

                        <i class="bi bi-box-arrow-right"></i>

                        Logout

                    </a>

                </li>

            </ul>

        </div>

    </div>

</div>

<script>

function updateClock(){

    const now=new Date();

    document.getElementById('jam').innerHTML=
    now.toLocaleTimeString('id-ID');

    document.getElementById('tanggal').innerHTML=
    now.toLocaleDateString('id-ID',{
        weekday:'long',
        day:'numeric',
        month:'long',
        year:'numeric'
    });

}

updateClock();

setInterval(updateClock,1000);

</script>