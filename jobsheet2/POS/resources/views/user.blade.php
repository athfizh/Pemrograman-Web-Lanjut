<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna — PointSales</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg: #080808;
            --bg2: #101010;
            --card: #161616;
            --card2: #1c1c1c;
            --border: #242424;
            --blight: #303030;
            --tp: #f2f2f2;
            --ts: #808080;
            --tm: #484848;
            --green: #22c55e;
            --red: #ef4444;
            --amber: #f59e0b;
        }

        html,
        body {
            height: 100%;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--tp);
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--blight);
            border-radius: 2px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 240px;
            z-index: 100;
            background: var(--bg2);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--tp);
            color: var(--bg);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            font-weight: 900;
            flex-shrink: 0;
        }

        .brand-text strong {
            font-size: .95rem;
            font-weight: 800;
            color: var(--tp);
            display: block;
        }

        .brand-text span {
            font-size: .68rem;
            color: var(--ts);
        }

        .sidebar-section {
            padding: .75rem 1rem .25rem;
        }

        .sidebar-section-label {
            font-size: .62rem;
            font-weight: 700;
            color: var(--tm);
            text-transform: uppercase;
            letter-spacing: .1em;
            padding: 0 .5rem;
            margin-bottom: .35rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: .7rem;
            padding: .55rem .75rem;
            border-radius: 9px;
            color: var(--ts);
            font-size: .83rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .15s;
            margin-bottom: .1rem;
        }

        .nav-item:hover {
            background: var(--card2);
            color: var(--tp);
        }

        .nav-item.active {
            background: var(--tp);
            color: var(--bg);
            font-weight: 700;
        }

        .nav-item .ico {
            width: 16px;
            text-align: center;
            font-size: .82rem;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 1rem;
            border-top: 1px solid var(--border);
        }

        .copyright {
            font-size: .62rem;
            color: var(--tm);
            text-align: center;
            margin-top: .75rem;
            line-height: 1.6;
        }

        /* TOPBAR */
        .topbar {
            position: fixed;
            top: 0;
            left: 240px;
            right: 0;
            height: 60px;
            z-index: 90;
            background: rgba(8, 8, 8, .9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
        }

        .topbar-left h2 {
            font-size: 1rem;
            font-weight: 700;
        }

        .topbar-left p {
            font-size: .72rem;
            color: var(--ts);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .live-clock {
            font-size: .8rem;
            color: var(--ts);
            font-variant-numeric: tabular-nums;
            background: var(--card);
            border: 1px solid var(--border);
            padding: .3rem .75rem;
            border-radius: 7px;
        }

        .topbar-avatar {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--blight);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .8rem;
            border: 1px solid var(--border);
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            padding-top: 60px;
            min-height: 100vh;
        }

        .content {
            padding: 2rem;
            max-width: 1000px;
        }

        /* BREADCRUMB */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .75rem;
            color: var(--tm);
            margin-bottom: 1.75rem;
        }

        .breadcrumb a {
            color: var(--tm);
            transition: color .2s;
        }

        .breadcrumb a:hover {
            color: var(--ts);
        }

        .breadcrumb i {
            font-size: .55rem;
        }

        /* PROFILE HERO */
        .profile-hero {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 2rem;
            position: relative;
            overflow: hidden;
        }

        .profile-hero::after {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, .03) 0%, transparent 70%);
            pointer-events: none;
        }

        .avatar {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: var(--card2);
            border: 2px solid var(--blight);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            position: relative;
            flex-shrink: 0;
        }

        .avatar-badge {
            position: absolute;
            bottom: 3px;
            right: 3px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--green);
            border: 2.5px solid var(--card);
        }

        .profile-info {
            flex: 1;
        }

        .role-tag {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .22rem .65rem;
            border-radius: 99px;
            background: var(--card2);
            border: 1px solid var(--blight);
            font-size: .68rem;
            font-weight: 700;
            color: var(--ts);
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: .65rem;
        }

        .profile-name {
            font-size: 1.9rem;
            font-weight: 900;
            letter-spacing: -.025em;
            margin-bottom: .25rem;
        }

        .profile-sub {
            font-size: .82rem;
            color: var(--ts);
            margin-bottom: 1.1rem;
        }

        .profile-actions {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .45rem 1rem;
            border-radius: 8px;
            font-size: .8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .18s;
            border: 1px solid var(--border);
            background: var(--card2);
            color: var(--ts);
        }

        .btn-action:hover {
            background: var(--blight);
            color: var(--tp);
        }

        .btn-action.primary {
            background: var(--tp);
            color: var(--bg);
            border-color: var(--tp);
        }

        .btn-action.primary:hover {
            background: #d5d5d5;
        }

        /* STATS */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
        }

        .stat-num {
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--tp);
            letter-spacing: -.02em;
        }

        .stat-lbl {
            font-size: .68rem;
            color: var(--tm);
            text-transform: uppercase;
            letter-spacing: .07em;
            margin-top: .25rem;
            font-weight: 600;
        }

        .stat-trend {
            font-size: .72rem;
            color: var(--green);
            margin-top: .25rem;
        }

        /* INFO GRID */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .info-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
        }

        .info-card h4 {
            font-size: .68rem;
            color: var(--tm);
            text-transform: uppercase;
            letter-spacing: .09em;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: .4rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: .6rem 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-label {
            font-size: .78rem;
            color: var(--ts);
        }

        .info-value {
            font-size: .82rem;
            color: var(--tp);
            font-weight: 600;
            text-align: right;
        }

        .info-value.mono {
            font-family: monospace;
            font-size: .75rem;
            background: var(--card2);
            padding: .15rem .5rem;
            border-radius: 5px;
            border: 1px solid var(--border);
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            display: inline-block;
            margin-right: .35rem;
            box-shadow: 0 0 5px #22c55e66;
        }

        /* ACTIVITY */
        .activity-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .activity-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .activity-header h4 {
            font-size: .85rem;
            font-weight: 700;
        }

        .activity-header span {
            font-size: .72rem;
            color: var(--ts);
        }

        .act-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: .75rem 1.5rem;
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }

        .act-item:last-child {
            border-bottom: none;
        }

        .act-item:hover {
            background: var(--card2);
        }

        .act-ico {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: var(--card2);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .82rem;
            color: var(--ts);
            flex-shrink: 0;
        }

        .act-info {
            flex: 1;
        }

        .act-title {
            font-size: .8rem;
            font-weight: 600;
            color: var(--tp);
        }

        .act-time {
            font-size: .68rem;
            color: var(--tm);
            margin-top: .1rem;
        }

        .act-amount {
            font-size: .82rem;
            font-weight: 700;
            color: var(--ts);
            white-space: nowrap;
        }

        .txn-badge {
            display: inline-block;
            padding: .15rem .5rem;
            border-radius: 99px;
            font-size: .65rem;
            font-weight: 700;
        }

        .badge-paid {
            background: rgba(34, 197, 94, .12);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, .2);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fade {
            animation: fadeUp .35s ease both;
        }

        .d1 {
            animation-delay: .07s
        }

        .d2 {
            animation-delay: .14s
        }

        .d3 {
            animation-delay: .21s
        }

        @media(max-width:768px) {
            .sidebar {
                display: none;
            }

            .main,
            .topbar {
                margin-left: 0;
                left: 0;
            }

            .info-grid,
            .stats-row {
                grid-template-columns: 1fr;
            }

            .profile-hero {
                flex-direction: column;
                gap: 1.25rem;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">POS</div>
            <div class="brand-text"><strong>PointSales</strong><span>v2.1 · Sistem Kasir</span></div>
        </div>
        <div class="sidebar-section">
            <div class="sidebar-section-label">Utama</div>
            <a href="/" class="nav-item"><span class="ico"><i class="fa-solid fa-chart-pie"></i></span> Dashboard</a>
            <a href="/sales" class="nav-item"><span class="ico"><i class="fa-solid fa-cash-register"></i></span> Kasir /
                POS</a>
        </div>
        <div class="sidebar-section" style="margin-top:.5rem;">
            <div class="sidebar-section-label">Kategori Produk</div>
            <a href="/category/food-beverage" class="nav-item"><span class="ico">🍔</span> Food &amp; Beverage</a>
            <a href="/category/beauty-health" class="nav-item"><span class="ico">💄</span> Beauty &amp; Health</a>
            <a href="/category/home-care" class="nav-item"><span class="ico">🏠</span> Home Care</a>
            <a href="/category/baby-kid" class="nav-item"><span class="ico">🍼</span> Baby &amp; Kid</a>
        </div>
        <div class="sidebar-section" style="margin-top:.5rem;">
            <div class="sidebar-section-label">Akun</div>
            <a href="/user/1/name/Athaulla Hafizh" class="nav-item active"><span class="ico"><i
                        class="fa-solid fa-circle-user"></i></span> Profil Saya</a>
            <a href="#" class="nav-item" onclick="openModal('settingsModal');return false;"><span class="ico"><i
                        class="fa-solid fa-gear"></i></span> Pengaturan</a>
        </div>
        <div class="sidebar-bottom">
            <div style="background:var(--card);border:1px solid var(--border);border-radius:10px;padding:.85rem;">
                <div
                    style="font-size:.65rem;color:var(--ts);text-transform:uppercase;letter-spacing:.08em;margin-bottom:.3rem;font-weight:600;">
                    Shift Aktif</div>
                <div style="font-size:.8rem;font-weight:700;color:var(--tp);"><span
                        style="width:7px;height:7px;border-radius:50%;background:#22c55e;display:inline-block;margin-right:.4rem;box-shadow:0 0 5px #22c55e88;"></span>Shift
                    Pagi</div>
                <div style="font-size:.72rem;color:var(--ts);">07:00 — 15:00 WIB</div>
            </div>
            <div class="copyright">© 2026 <strong style="color:var(--ts)">Athaulla Hafizh</strong><br>PointSales POS
                System · All rights reserved</div>
        </div>
    </aside>

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-left">
            <h2>Profil Pengguna</h2>
            <p>Informasi akun dan riwayat aktivitas</p>
        </div>
        <div class="topbar-right">
            <div class="live-clock" id="clock">--:--:--</div>
            <a href="/sales"
                style="padding:.35rem .85rem;border-radius:7px;font-size:.78rem;font-weight:600;background:var(--tp);color:var(--bg);border:none;cursor:pointer;display:flex;align-items:center;gap:.4rem;text-decoration:none;"><i
                    class="fa-solid fa-cash-register"></i> Kasir</a>
            <div class="topbar-avatar">🧑</div>
        </div>
    </div>

    <main class="main">
        <div class="content">
            <div class="breadcrumb fade">
                <a href="/"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Profil Pengguna</span>
            </div>

            <!-- HERO -->
            <div class="profile-hero fade">
                <div class="avatar">🧑<div class="avatar-badge"></div>
                </div>
                <div class="profile-info">
                    <div class="role-tag"><i class="fa-solid fa-shield-halved"></i> Supervisor · Level 3</div>
                    <div class="profile-name">{{ $name }}</div>
                    <div class="profile-sub">ID Pengguna: <span
                            style="font-family:monospace;background:var(--card2);padding:.1rem .4rem;border-radius:4px;border:1px solid var(--border);">#{{ $id }}</span>
                        &nbsp;·&nbsp; Terdaftar sejak 1 Januari 2024 &nbsp;·&nbsp; Cabang Pusat Jakarta</div>
                    <div class="profile-actions">
                        <button class="btn-action primary" onclick="openModal('editProfileModal')"><i
                                class="fa-solid fa-pen"></i> Edit Profil</button>
                        <a href="/sales" class="btn-action"><i class="fa-solid fa-cash-register"></i> Buka Kasir</a>
                        <button class="btn-action" onclick="openModal('changePwModal')"><i class="fa-solid fa-key"></i>
                            Ganti Password</button>
                        <button class="btn-action" style="color:var(--red);border-color:rgba(239,68,68,.3);"
                            onclick="openModal('logoutModal')"><i class="fa-solid fa-right-from-bracket"></i> Log
                            Out</button>
                    </div>
                </div>
            </div>

            <!-- STATS -->
            <div class="stats-row fade d1">
                <div class="stat-card">
                    <div class="stat-num">247</div>
                    <div class="stat-lbl">Total Transaksi</div>
                    <div class="stat-trend">↑ +14 transaksi bulan ini</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num" style="font-size:1.3rem;">Rp 12,4jt</div>
                    <div class="stat-lbl">Total Nilai Dikelola</div>
                    <div class="stat-trend">↑ +8% dibanding bulan lalu</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">32</div>
                    <div class="stat-lbl">Hari Aktif (Feb)</div>
                    <div class="stat-trend" style="color:var(--ts);">Rata-rata 7,7 txn/hari</div>
                </div>
            </div>

            <!-- INFO GRID -->
            <div class="info-grid fade d2">
                <div class="info-card">
                    <h4><i class="fa-solid fa-circle-user"></i> Informasi Akun</h4>
                    <div class="info-row"><span class="info-label">ID Pengguna</span><span
                            class="info-value mono">#{{ $id }}</span></div>
                    <div class="info-row"><span class="info-label">Nama Lengkap</span><span
                            class="info-value">{{ $name }}</span></div>
                    <div class="info-row"><span class="info-label">Role</span><span class="info-value"><i
                                class="fa-solid fa-shield-halved"
                                style="font-size:.72rem;margin-right:.3rem;color:var(--ts);"></i>Supervisor</span></div>
                    <div class="info-row"><span class="info-label">Level Akses</span><span class="info-value">Level 3 —
                            Supervisor</span></div>
                    <div class="info-row"><span class="info-label">Status Akun</span><span class="info-value"><span
                                class="status-dot"></span>Aktif</span></div>
                    <div class="info-row"><span class="info-label">Cabang</span><span class="info-value">Pusat
                            Jakarta</span></div>
                </div>
                <div class="info-card">
                    <h4><i class="fa-solid fa-clock"></i> Sesi &amp; Shift</h4>
                    <div class="info-row"><span class="info-label">Shift Aktif</span><span class="info-value">Pagi
                            (07:00–15:00)</span></div>
                    <div class="info-row"><span class="info-label">Login Terakhir</span><span class="info-value">Hari
                            ini, 07:28 WIB</span></div>
                    <div class="info-row"><span class="info-label">Durasi Login</span><span class="info-value"
                            id="loginDuration">—</span></div>
                    <div class="info-row"><span class="info-label">Total Login (Feb)</span><span class="info-value">28
                            sesi</span></div>
                    <div class="info-row"><span class="info-label">IP Terakhir</span><span
                            class="info-value mono">192.168.1.10</span></div>
                    <div class="info-row"><span class="info-label">Perangkat</span><span class="info-value">Windows
                            PC</span></div>
                </div>
            </div>

            <!-- ACTIVITY -->
            <div class="activity-card fade d3">
                <div class="activity-header">
                    <h4><i class="fa-solid fa-clock-rotate-left" style="margin-right:.4rem;color:var(--ts);"></i>
                        Riwayat Aktivitas</h4>
                    <span>Hari ini · Senin, 23 Feb 2026</span>
                </div>
                <div class="act-item">
                    <div class="act-ico"><i class="fa-solid fa-receipt"></i></div>
                    <div class="act-info">
                        <div class="act-title">Transaksi #TXN-247 — Food &amp; Beverage (4 item)</div>
                        <div class="act-time">11:42 WIB · Metode: QRIS</div>
                    </div>
                    <div style="display:flex;flex-direction:column;align-items:flex-end;gap:.3rem;">
                        <div class="act-amount">Rp 128.500</div>
                        <span class="txn-badge badge-paid">Lunas</span>
                    </div>
                </div>
                <div class="act-item">
                    <div class="act-ico"><i class="fa-solid fa-receipt"></i></div>
                    <div class="act-info">
                        <div class="act-title">Transaksi #TXN-246 — Baby &amp; Kid (2 item) · Diskon 10%</div>
                        <div class="act-time">11:15 WIB · Metode: Tunai · Kembalian Rp 55.000</div>
                    </div>
                    <div style="display:flex;flex-direction:column;align-items:flex-end;gap:.3rem;">
                        <div class="act-amount">Rp 180.000</div>
                        <span class="txn-badge badge-paid">Lunas</span>
                    </div>
                </div>
                <div class="act-item">
                    <div class="act-ico"><i class="fa-solid fa-receipt"></i></div>
                    <div class="act-info">
                        <div class="act-title">Transaksi #TXN-245 — Beauty &amp; Health (6 item)</div>
                        <div class="act-time">10:50 WIB · Metode: Debit</div>
                    </div>
                    <div style="display:flex;flex-direction:column;align-items:flex-end;gap:.3rem;">
                        <div class="act-amount">Rp 55.500</div>
                        <span class="txn-badge badge-paid">Lunas</span>
                    </div>
                </div>
                <div class="act-item">
                    <div class="act-ico"><i class="fa-solid fa-boxes-stacked"></i></div>
                    <div class="act-info">
                        <div class="act-title">Update stok — Pampers Prem. M (+50 unit)</div>
                        <div class="act-time">09:35 WIB · Oleh: Athaulla Hafizh</div>
                    </div>
                    <div class="act-amount" style="color:var(--green);">+50 Unit</div>
                </div>
                <div class="act-item">
                    <div class="act-ico"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>
                    <div class="act-info">
                        <div class="act-title">Login ke sistem kasir — Shift Pagi dimulai</div>
                        <div class="act-time">07:28 WIB · IP: 192.168.1.10</div>
                    </div>
                    <div class="act-amount" style="color:var(--ts);">—</div>
                </div>
            </div>
        </div>
    </main>

    <!-- MODALS -->
    <style>
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .85);
            backdrop-filter: blur(12px);
            z-index: 500;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-box {
            background: var(--card);
            border: 1px solid var(--blight);
            border-radius: 18px;
            padding: 2rem;
            width: 420px;
            max-height: 90vh;
            overflow-y: auto;
            animation: popM .25s cubic-bezier(.34, 1.56, .64, 1);
        }

        @keyframes popM {
            from {
                opacity: 0;
                transform: scale(.88)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .modal-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .modal-title i {
            color: var(--ts);
        }

        .field-group {
            margin-bottom: .85rem;
        }

        .field-label {
            font-size: .7rem;
            color: var(--ts);
            text-transform: uppercase;
            letter-spacing: .07em;
            font-weight: 700;
            display: block;
            margin-bottom: .4rem;
        }

        .field-input {
            width: 100%;
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: .55rem .9rem;
            color: var(--tp);
            font-size: .85rem;
            font-family: inherit;
            outline: none;
            transition: border-color .2s;
        }

        .field-input:focus {
            border-color: var(--blight);
        }

        .modal-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .6rem;
            margin-top: 1.25rem;
        }

        .modal-btn {
            padding: .55rem 1rem;
            border-radius: 9px;
            font-size: .82rem;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--ts);
            transition: all .2s;
        }

        .modal-btn:hover {
            background: var(--card2);
            color: var(--tp);
        }

        .modal-btn.primary {
            background: var(--tp);
            color: var(--bg);
            border-color: var(--tp);
        }

        .modal-btn.primary:hover {
            background: #d5d5d5;
        }

        .modal-btn.danger {
            background: rgba(239, 68, 68, .15);
            color: #f87171;
            border-color: rgba(239, 68, 68, .3);
        }

        .modal-btn.danger:hover {
            background: rgba(239, 68, 68, .25);
        }

        .err-msg {
            font-size: .74rem;
            color: #f87171;
            margin-top: .3rem;
            display: none;
        }
    </style>

    <!-- EDIT PROFIL -->
    <div class="modal-overlay" id="editProfileModal" onclick="closeOnBg(event,'editProfileModal')">
        <div class="modal-box">
            <div class="modal-title"><i class="fa-solid fa-pen"></i> Edit Profil</div>
            <div class="field-group"><label class="field-label">Nama Lengkap</label><input id="ep-name"
                    class="field-input" type="text" placeholder="Nama Lengkap"></div>
            <div class="field-group"><label class="field-label">Email</label><input id="ep-email" class="field-input"
                    type="email" placeholder="email@contoh.com"></div>
            <div class="field-group"><label class="field-label">Nomor Telepon</label><input id="ep-phone"
                    class="field-input" type="tel" placeholder="08xx-xxxx-xxxx"></div>
            <div class="field-group"><label class="field-label">Cabang</label><input id="ep-branch" class="field-input"
                    type="text" placeholder="Cabang" value="Pusat Jakarta"></div>
            <div class="modal-actions">
                <button class="modal-btn" onclick="closeModal('editProfileModal')">Batal</button>
                <button class="modal-btn primary" onclick="saveProfile()"><i class="fa-solid fa-floppy-disk"></i>
                    Simpan</button>
            </div>
        </div>
    </div>

    <!-- GANTI PASSWORD -->
    <div class="modal-overlay" id="changePwModal" onclick="closeOnBg(event,'changePwModal')">
        <div class="modal-box">
            <div class="modal-title"><i class="fa-solid fa-key"></i> Ganti Password</div>
            <div class="field-group">
                <label class="field-label">Password Saat Ini</label>
                <input id="pw-old" class="field-input" type="password" placeholder="Password lama">
            </div>
            <div class="field-group">
                <label class="field-label">Password Baru</label>
                <input id="pw-new" class="field-input" type="password" placeholder="Min. 8 karakter">
            </div>
            <div class="field-group">
                <label class="field-label">Konfirmasi Password Baru</label>
                <input id="pw-confirm" class="field-input" type="password" placeholder="Ulangi password baru">
                <div class="err-msg" id="pw-err">Password tidak cocok atau terlalu pendek.</div>
            </div>
            <div class="modal-actions">
                <button class="modal-btn" onclick="closeModal('changePwModal')">Batal</button>
                <button class="modal-btn primary" onclick="changePassword()"><i class="fa-solid fa-lock"></i> Ganti
                    Password</button>
            </div>
        </div>
    </div>

    <!-- LOGOUT -->
    <div class="modal-overlay" id="logoutModal" onclick="closeOnBg(event,'logoutModal')">
        <div class="modal-box" style="text-align:center;">
            <div style="font-size:2.5rem;margin-bottom:.65rem;">👋</div>
            <div class="modal-title" style="justify-content:center;">Konfirmasi Log Out</div>
            <p style="font-size:.83rem;color:var(--ts);line-height:1.65;margin-bottom:1.5rem;">Apakah Anda yakin ingin
                keluar dari sistem?<br>Pastikan semua transaksi sudah selesai diproses.</p>
            <div class="modal-actions">
                <button class="modal-btn" onclick="closeModal('logoutModal')"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</button>
                <button class="modal-btn danger" onclick="doLogout()"><i class="fa-solid fa-right-from-bracket"></i> Log
                    Out</button>
            </div>
        </div>
    </div>

    <!-- SETTINGS -->
    <div class="modal-overlay" id="settingsModal" onclick="closeOnBg(event,'settingsModal')">
        <div class="modal-box">
            <div class="modal-title"><i class="fa-solid fa-gear"></i> Pengaturan Aplikasi</div>
            <div class="field-group"><label class="field-label">Tema</label>
                <select class="field-input" id="st-theme" style="color:var(--tp);">
                    <option value="dark" selected>Dark Mode (Default)</option>
                    <option value="dark">Dark Mode</option>
                </select>
            </div>
            <div class="field-group"><label class="field-label">Nama Toko</label><input id="st-name" class="field-input"
                    type="text"></div>
            <div class="field-group"><label class="field-label">Alamat Toko</label><input id="st-addr"
                    class="field-input" type="text"></div>
            <div class="field-group"><label class="field-label">No. Telepon Toko</label><input id="st-phone"
                    class="field-input" type="text"></div>
            <div class="field-group"><label class="field-label">Tarif PPN (%)</label><input id="st-tax"
                    class="field-input" type="number" min="0" max="100"></div>
            <div class="modal-actions">
                <button class="modal-btn" onclick="closeModal('settingsModal')">Batal</button>
                <button class="modal-btn primary" onclick="saveSettings()"><i class="fa-solid fa-floppy-disk"></i>
                    Simpan</button>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="toast-notif"
        style="position:fixed;bottom:2rem;right:2rem;z-index:999;background:var(--card);border:1px solid var(--blight);border-radius:12px;padding:.75rem 1.1rem;display:flex;align-items:center;gap:.65rem;font-size:.82rem;color:var(--tp);box-shadow:0 20px 40px rgba(0,0,0,.7);transform:translateY(8px);opacity:0;transition:all .28s;pointer-events:none;">
        <i class="fa-solid fa-circle-check" style="color:#22c55e;"></i><span id="toast-msg"></span>
    </div>

    <script>
        function tickClock() {
            document.getElementById('clock').textContent = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        tickClock(); setInterval(tickClock, 1000);

        // Login duration
        function updateDuration() {
            const loginTime = new Date(); loginTime.setHours(7, 28, 0, 0);
            const now = new Date();
            const diff = Math.floor((now - loginTime) / 1000);
            const h = Math.floor(diff / 3600), m = Math.floor((diff % 3600) / 60), s = diff % 60;
            document.getElementById('loginDuration').textContent = `${h}j ${m}m ${s}d`;
        }
        updateDuration(); setInterval(updateDuration, 1000);

        // ── MODAL HELPERS ──
        function openModal(id) { document.getElementById(id).classList.add('open'); }
        function closeModal(id) { document.getElementById(id).classList.remove('open'); }
        function closeOnBg(e, id) { if (e.target === document.getElementById(id)) closeModal(id); }

        function showToast(msg, isErr) {
            const t = document.getElementById('toast-notif');
            const ico = t.querySelector('i');
            document.getElementById('toast-msg').textContent = msg;
            ico.style.color = isErr ? '#f87171' : '#22c55e';
            ico.className = isErr ? 'fa-solid fa-circle-xmark' : 'fa-solid fa-circle-check';
            t.style.opacity = '1'; t.style.transform = 'translateY(0)';
            setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateY(8px)'; }, 2800);
        }

        // ── EDIT PROFIL ──
        function loadProfile() {
            try {
                const p = JSON.parse(localStorage.getItem('pos_profile') || '{}');
                document.getElementById('ep-name').value = p.name || '{{ $name }}';
                document.getElementById('ep-email').value = p.email || 'athaulla@pointsales.id';
                document.getElementById('ep-phone').value = p.phone || '0812-0000-0000';
                document.getElementById('ep-branch').value = p.branch || 'Pusat Jakarta';
            } catch (e) { }
        }
        function saveProfile() {
            const p = {
                name: document.getElementById('ep-name').value.trim(),
                email: document.getElementById('ep-email').value.trim(),
                phone: document.getElementById('ep-phone').value.trim(),
                branch: document.getElementById('ep-branch').value.trim()
            };
            if (!p.name) { showToast('Nama tidak boleh kosong!', true); return; }
            localStorage.setItem('pos_profile', JSON.stringify(p));
            closeModal('editProfileModal');
            showToast('Profil berhasil disimpan!');
        }

        // ── GANTI PASSWORD ──
        function changePassword() {
            const oldPw = document.getElementById('pw-old').value;
            const newPw = document.getElementById('pw-new').value;
            const confirm = document.getElementById('pw-confirm').value;
            const errEl = document.getElementById('pw-err');
            errEl.style.display = 'none';
            if (!oldPw || !newPw || !confirm) { errEl.style.display = 'block'; errEl.textContent = 'Semua kolom harus diisi.'; return; }
            if (newPw.length < 8) { errEl.style.display = 'block'; errEl.textContent = 'Password baru minimal 8 karakter.'; return; }
            if (newPw !== confirm) { errEl.style.display = 'block'; errEl.textContent = 'Password baru tidak cocok.'; return; }
            // Simulate save
            document.getElementById('pw-old').value = '';
            document.getElementById('pw-new').value = '';
            document.getElementById('pw-confirm').value = '';
            closeModal('changePwModal');
            showToast('Password berhasil diperbarui!');
        }

        // ── LOGOUT ──
        function doLogout() {
            localStorage.removeItem('pos_cart');
            closeModal('logoutModal');
            showToast('Berhasil logout. Mengalihkan...');
            setTimeout(() => window.location.href = '/', 1200);
        }

        // ── SETTINGS ──
        function loadSettings() {
            try {
                const s = JSON.parse(localStorage.getItem('pos_settings') || '{}');
                document.getElementById('st-name').value = s.name || 'PointSales Store';
                document.getElementById('st-addr').value = s.addr || 'Jl. Contoh No.1, Jakarta';
                document.getElementById('st-phone').value = s.phone || '(021) 000-0000';
                document.getElementById('st-tax').value = s.tax !== undefined ? s.tax : 11;
            } catch (e) { }
        }
        function saveSettings() {
            const s = {
                name: document.getElementById('st-name').value.trim(),
                addr: document.getElementById('st-addr').value.trim(),
                phone: document.getElementById('st-phone').value.trim(),
                tax: parseFloat(document.getElementById('st-tax').value) || 11
            };
            localStorage.setItem('pos_settings', JSON.stringify(s));
            closeModal('settingsModal');
            showToast('Pengaturan disimpan!');
        }

        loadProfile();
        loadSettings();
    </script>
</body>

</html>