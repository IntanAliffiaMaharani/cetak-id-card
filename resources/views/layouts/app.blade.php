<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Cetak ID Card</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

*{
    font-family:'Poppins',sans-serif;
}

body{

    background:#f4f7fb;
    overflow-x:hidden;

}

.sidebar{

    width:260px;
    height:100vh;
    position:fixed;

    left:0;
    top:0;

    background:linear-gradient(180deg,#0b4ea2,#0d6efd);

    color:white;

    box-shadow:5px 0 20px rgba(0,0,0,.08);

}

.sidebar-header{

    padding:30px 20px;
    text-align:center;

}

.sidebar-header img{

    width:120px;

}

.sidebar-title{

    margin-top:15px;
    font-size:23px;
    font-weight:700;

}

.sidebar-menu{

    margin-top:25px;

}

.sidebar-menu a{

    display:flex;
    align-items:center;
    gap:14px;

    color:white;

    text-decoration:none;

    padding:14px 22px;

    margin:8px 15px;

    border-radius:14px;

    transition:.25s;

    font-weight:500;

}

.sidebar-menu a:hover{

    background:rgba(255,255,255,.18);

    transform:translateX(6px);

}

.sidebar-menu a.active{

    background:white;

    color:#0d6efd;

    box-shadow:0 8px 20px rgba(0,0,0,.12);

}
.sidebar-header{

    padding:35px 20px 20px;

    text-align:center;

}

.sidebar-header img{

    width:140px;

    transition:.3s;

}

.sidebar-header img:hover{

    transform:scale(1.05);

}

.sidebar-footer{

    position:absolute;

    bottom:25px;

    width:100%;

    text-align:center;

    color:rgba(255,255,255,.8);

    font-size:13px;

}

.sidebar-menu i{

    font-size:22px;

    width:28px;

}

/* ===========================
        CONTENT
=========================== */

.content{

    margin-left:260px;

}

/* ===========================
        NAVBAR
=========================== */

.topbar{

    height:85px;

    background:#fff;

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:0 35px;

    border-radius:0 0 20px 20px;

    box-shadow:0 10px 25px rgba(0,0,0,.05);

}

.topbar-right{

    display:flex;

    align-items:center;

    gap:18px;

}

.page-title{

    font-size:28px;

    font-weight:700;

    color:#183153;

}

.date-box,
.clock-box{

    background:#F5F7FA;

    padding:12px 18px;

    border-radius:15px;

    font-weight:600;

    color:#4b5563;

}

.profile-btn{

    display:flex;

    align-items:center;

    gap:15px;

    background:white;

    border:none;

    padding:8px 16px;

    border-radius:18px;

    box-shadow:0 8px 20px rgba(0,0,0,.08);

}

.profile-btn:hover{

    background:#eef5ff;

}

.avatar{

    width:50px;

    height:50px;

    border-radius:50%;

    background:#0F4C81;

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:22px;

}

.user-box .btn{

    border-radius:15px;

    padding:10px 16px;

}

.dropdown-menu{

    border:none;

    border-radius:18px;

    box-shadow:0 12px 30px rgba(0,0,0,.1);

}

.dropdown-item{

    padding:12px 18px;

    border-radius:10px;

}

.dropdown-item:hover{

    background:#eef4ff;

}

.user-box{

    display:flex;

    align-items:center;

    gap:15px;

}

/* ===========================
        MAIN
=========================== */

.main{

    padding:30px;

}

/* ===========================
        CARD
=========================== */

.card-custom{

    border:none;

    border-radius:20px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

}

.card-header{

    background:white;

    border:none;

    font-weight:600;

    font-size:18px;

}

.table{

    margin-bottom:0;

}

.btn{

    border-radius:12px;

}

.form-label{

    font-weight:600;

    color:#475569;

}

.form-control,
.form-select{

    height:52px;

    border-radius:14px;

    border:1px solid #E2E8F0;

    transition:.3s;

}

.form-control:focus,
.form-select:focus{

    border-color:#0F4C81;

    box-shadow:0 0 0 .15rem rgba(15,76,129,.15);

}

.btn-primary{

    height:52px;

    border-radius:14px;

    background:#0F4C81;

    border:none;

}

.btn-primary:hover{

    background:#0B3D91;

}

.btn-outline-secondary{

    height:52px;

    border-radius:14px;

}

/* ===========================
        STATISTIC CARD
=========================== */

.stats-card{

    background:#fff;

    border-radius:22px;

    padding:28px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:0 8px 25px rgba(0,0,0,.06);

    transition:.3s;

    border:1px solid #eef2f7;

}

.stats-card:hover{

    transform:translateY(-6px);

    box-shadow:0 18px 35px rgba(0,0,0,.12);

}

.stats-title{

    color:#94A3B8;

    font-size:15px;

    margin-bottom:10px;

}

.stats-number{

    font-size:34px;

    font-weight:700;

    color:#1E293B;

}

.stats-subtitle{

    color:#94A3B8;

}

.stats-icon{

    width:72px;

    height:72px;

    border-radius:20px;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:32px;

}

.bg-primary-soft{

    background:#E7F1FF;

    color:#0F4C81;

}

.bg-success-soft{

    background:#EAFBF3;

    color:#28C76F;

}

.bg-warning-soft{

    background:#FFF4E6;

    color:#FF9F43;

}

.bg-danger-soft{

    background:#FFECEE;

    color:#EA5455;

}
/* ==================================
        FILTER CARD
================================== */

.form-label{

    font-size:14px;

    font-weight:600;

    color:#475569;

}

.form-control,
.form-select{

    height:52px;

    border-radius:14px;

    border:1px solid #E5E7EB;

    background:#fff;

    transition:.3s;

}

.form-control:hover,
.form-select:hover{

    border-color:#0F4C81;

}

.form-control:focus,
.form-select:focus{

    border-color:#0F4C81;

    box-shadow:0 0 0 .15rem rgba(15,76,129,.15);

}

.btn-primary{

    background:#0F4C81;

    border:none;

    border-radius:14px;

    padding:12px 22px;

}

.btn-primary:hover{

    background:#0B3D91;

}

.btn-outline-secondary{

    border-radius:14px;

    padding:12px 22px;

}
    </style>

</head>

<body>

@include('partials.sidebar')

<div class="content">

@include('partials.navbar')

<div class="main">

@yield('content')

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>