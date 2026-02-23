<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — PointSales POS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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
            --accent: #f2f2f2;
            --green: #22c55e;
            --red: #ef4444;
            --amber: #f59e0b;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--tp);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        scrollbar-width: thin;
        scrollbar-color: var(--blight) transparent;

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--blight);
            border-radius: 2px;
        }

        /* ── TOPBAR ── */
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
            color: var(--tp);
        }

        .topbar-left p {
            font-size: .72rem;
            color: var(--ts);
            margin-top: .05rem;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
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

        .notif-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            背景: var(--card);
            background: var(--card);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--ts);
            font-size: .85rem;
            transition: all .2s;
            position: relative;
        }

        .notif-btn:hover {
            color: var(--tp);
            border-color: var(--blight);
        }

        .notif-dot {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #ef4444;
            border: 1.5px solid var(--bg);
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: .6rem;
            cursor: pointer;
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

        .topbar-name {
            font-size: .82rem;
            font-weight: 600;
            color: var(--tp);
        }

        .topbar-role {
            font-size: .68rem;
            color: var(--ts);
        }

        /* ── SIDEBAR ── */
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
            padding: 0;
            overflow: hidden;
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

        .brand-text {
            line-height: 1.2;
        }

        .brand-text strong {
            font-size: .95rem;
            font-weight: 800;
            color: var(--tp);
        }

        .brand-text span {
            font-size: .68rem;
            color: var(--ts);
            display: block;
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

        .nav-item .badge-count {
            margin-left: auto;
            font-size: .65rem;
            background: var(--red);
            color: #fff;
            border-radius: 99px;
            padding: .05rem .4rem;
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 1rem;
            border-top: 1px solid var(--border);
        }

        .shift-box {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .85rem;
        }

        .shift-box .label {
            font-size: .65rem;
            color: var(--ts);
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: .3rem;
            font-weight: 600;
        }

        .shift-box .shift-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .shift-box .shift-name {
            font-size: .8rem;
            font-weight: 700;
            color: var(--tp);
        }

        .shift-box .shift-time {
            font-size: .72rem;
            color: var(--ts);
        }

        .shift-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 5px #22c55e80;
            display: inline-block;
            margin-right: .4rem;
        }

        .copyright {
            font-size: .62rem;
            color: var(--tm);
            text-align: center;
            margin-top: .75rem;
            line-height: 1.6;
        }

        /* ── MAIN ── */
        .main {
            margin-left: 240px;
            padding-top: 60px;
            min-height: 100vh;
        }

        .content {
            padding: 1.75rem 2rem;
        }

        /* ── KPI CARDS ── */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .kpi-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            position: relative;
            overflow: hidden;
            transition: all .2s;
        }

        .kpi-card:hover {
            border-color: var(--blight);
            transform: translateY(-1px);
        }

        .kpi-label {
            font-size: .7rem;
            color: var(--ts);
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 600;
            margin-bottom: .6rem;
        }

        .kpi-value {
            font-size: 1.65rem;
            font-weight: 900;
            color: var(--tp);
            letter-spacing: -.02em;
            margin-bottom: .3rem;
        }

        .kpi-sub {
            font-size: .73rem;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .kpi-sub.up {
            color: var(--green);
        }

        .kpi-sub.down {
            color: var(--red);
        }

        .kpi-sub.neu {
            color: var(--ts);
        }

        .kpi-icon {
            position: absolute;
            right: 1.25rem;
            top: 1.25rem;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: var(--ts);
        }

        /* ── CHARTS ROW ── */
        .charts-row {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .chart-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.5rem;
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .chart-title {
            font-size: .88rem;
            font-weight: 700;
            color: var(--tp);
        }

        .chart-sub {
            font-size: .72rem;
            color: var(--ts);
            margin-top: .15rem;
        }

        .chart-tabs {
            display: flex;
            gap: .25rem;
        }

        .chart-tab {
            padding: .25rem .65rem;
            border-radius: 6px;
            font-size: .72rem;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--ts);
            transition: all .15s;
        }

        .chart-tab.active {
            background: var(--tp);
            color: var(--bg);
            border-color: var(--tp);
        }

        /* Donut */
        .donut-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .donut-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            pointer-events: none;
            margin-top: -20px;
        }

        .donut-center .big {
            font-size: 1.4rem;
            font-weight: 900;
            color: var(--tp);
        }

        .donut-center .small {
            font-size: .68rem;
            color: var(--ts);
        }

        .donut-legend {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .4rem .75rem;
            margin-top: 1rem;
            width: 100%;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .72rem;
            color: var(--ts);
        }

        .legend-dot {
            width: 7px;
            height: 7px;
            border-radius: 2px;
            flex-shrink: 0;
        }

        /* ── BOTTOM ROW ── */
        .bottom-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .panel-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .panel-header {
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-title {
            font-size: .88rem;
            font-weight: 700;
            color: var(--tp);
        }

        .panel-action {
            font-size: .72rem;
            color: var(--ts);
            cursor: pointer;
            transition: color .2s;
        }

        .panel-action:hover {
            color: var(--tp);
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: .65rem 1.25rem;
            text-align: left;
            font-size: .68rem;
            color: var(--tm);
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: .75rem 1.25rem;
            font-size: .8rem;
            color: var(--ts);
            border-bottom: 1px solid var(--border);
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: var(--card2);
        }

        td .name {
            font-weight: 600;
            color: var(--tp);
        }

        td .sub {
            font-size: .68rem;
            color: var(--tm);
            margin-top: .1rem;
        }

        .txn-status {
            display: inline-block;
            padding: .18rem .55rem;
            border-radius: 99px;
            font-size: .67rem;
            font-weight: 700;
        }

        .txn-status.paid {
            background: rgba(34, 197, 94, .12);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, .2);
        }

        .txn-status.pending {
            background: rgba(245, 158, 11, .12);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, .2);
        }

        .txn-status.refund {
            background: rgba(239, 68, 68, .12);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, .2);
        }

        .rank-num {
            font-size: .72rem;
            font-weight: 800;
            color: var(--tm);
            width: 22px;
        }

        .stock-bar {
            height: 4px;
            background: var(--border);
            border-radius: 2px;
            margin-top: .35rem;
            overflow: hidden;
        }

        .stock-fill {
            height: 100%;
            border-radius: 2px;
            background: var(--tp);
        }

        .stock-fill.low {
            background: var(--red);
        }

        .stock-fill.ok {
            background: var(--green);
        }

        /* ── QUICK ACTIONS ── */
        .qa-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .6rem;
            padding: 1.1rem 1.5rem;
        }

        .qa-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: .45rem;
            padding: .9rem .5rem;
            border-radius: 11px;
            background: var(--card2);
            border: 1px solid var(--border);
            cursor: pointer;
            transition: all .2s;
        }

        .qa-btn:hover {
            border-color: var(--blight);
            background: var(--blight);
        }

        .qa-btn .ico {
            font-size: 1.1rem;
        }

        .qa-btn .lbl {
            font-size: .66rem;
            font-weight: 600;
            color: var(--ts);
            text-align: center;
            line-height: 1.3;
        }

        .qa-btn:hover .lbl {
            color: var(--tp);
        }

        /* MISC */
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
            animation-delay: .05s
        }

        .d2 {
            animation-delay: .1s
        }

        .d3 {
            animation-delay: .15s
        }

        .d4 {
            animation-delay: .2s
        }

        @media(max-width:1100px) {
            .kpi-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .charts-row,
            .bottom-row {
                grid-template-columns: 1fr;
            }
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
        }
    </style>
</head>

<body>

    <!-- ── SIDEBAR ── -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">POS</div>
            <div class="brand-text">
                <strong>PointSales</strong>
                <span>v2.1 · Sistem Kasir</span>
            </div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-label">Utama</div>
            <a href="/" class="nav-item active"><span class="ico"><i class="fa-solid fa-chart-pie"></i></span>
                Dashboard</a>
            <a href="/sales" class="nav-item"><span class="ico"><i class="fa-solid fa-cash-register"></i></span> Kasir /
                POS <span class="badge-count">!</span></a>
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
            <a href="/user/1/name/Athaulla Hafizh" class="nav-item"><span class="ico"><i
                        class="fa-solid fa-circle-user"></i></span> Profil Saya</a>
            <a href="#" class="nav-item" onclick="toggleSettings();return false;"><span class="ico"><i
                        class="fa-solid fa-gear"></i></span> Pengaturan</a>
        </div>

        <div class="sidebar-bottom">
            <div class="shift-box">
                <div class="label">Shift Aktif</div>
                <div class="shift-row">
                    <div>
                        <div class="shift-name"><span class="shift-dot"></span>Shift Pagi</div>
                        <div class="shift-time">07:00 — 15:00 WIB</div>
                    </div>
                    <i class="fa-solid fa-clock" style="color:var(--ts);font-size:.8rem;"></i>
                </div>
            </div>
            <div class="copyright">
                © 2026 <strong style="color:var(--ts)">Athaulla Hafizh</strong><br>
                PointSales POS System · All rights reserved
            </div>
        </div>
    </aside>

    <!-- ── TOPBAR ── -->
    <div class="topbar">
        <div class="topbar-left">
            <h2>Selamat Datang, Athaulla 👋</h2>
            <p id="topbarDate">Senin, 23 Februari 2026</p>
        </div>
        <div class="topbar-right">
            <div class="live-clock" id="clock">--:--:--</div>
            <div class="notif-btn" id="notifBtn" onclick="toggleNotif()">
                <i class="fa-solid fa-bell"></i>
                <span class="notif-dot" id="notifDot"></span>
            </div>
            <!-- NOTIFICATION DROPDOWN -->
            <div id="notifPanel"
                style="position:absolute;top:56px;right:160px;width:300px;background:var(--card);border:1px solid var(--blight);border-radius:14px;box-shadow:0 20px 40px rgba(0,0,0,.7);z-index:200;display:none;overflow:hidden;">
                <div
                    style="padding:.9rem 1.1rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
                    <span style="font-size:.82rem;font-weight:700;">Notifikasi</span>
                    <button onclick="clearNotifs()"
                        style="font-size:.68rem;color:var(--ts);background:none;border:none;cursor:pointer;">Hapus
                        Semua</button>
                </div>
                <div id="notifList" style="max-height:260px;overflow-y:auto;"></div>
                <div style="padding:.7rem 1.1rem;border-top:1px solid var(--border);text-align:center;">
                    <a href="/user/1/name/Athaulla Hafizh" style="font-size:.72rem;color:var(--ts);">Lihat Semua
                        Aktivitas →</a>
                </div>
            </div>
            <a href="/user/1/name/Athaulla Hafizh" class="topbar-user">
                <div class="topbar-avatar">🧑</div>
                <div>
                    <div class="topbar-name">Athaulla Hafizh</div>
                    <div class="topbar-role">Supervisor</div>
                </div>
            </a>
        </div>
    </div>

    <!-- ── MAIN ── -->
    <main class="main">
        <div class="content">

            <!-- KPI CARDS -->
            <div class="kpi-grid">
                <div class="kpi-card fade">
                    <div class="kpi-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
                    <div class="kpi-label">Pendapatan Hari Ini</div>
                    <div class="kpi-value" id="kpiRevenue">Rp 0</div>
                    <div class="kpi-sub up"><i class="fa-solid fa-arrow-trend-up"></i> +12.4% vs kemarin</div>
                </div>
                <div class="kpi-card fade d1">
                    <div class="kpi-icon"><i class="fa-solid fa-receipt"></i></div>
                    <div class="kpi-label">Jumlah Transaksi</div>
                    <div class="kpi-value" id="kpiTxn">0</div>
                    <div class="kpi-sub up"><i class="fa-solid fa-arrow-trend-up"></i> +8 dari kemarin</div>
                </div>
                <div class="kpi-card fade d2">
                    <div class="kpi-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                    <div class="kpi-label">Item Terjual</div>
                    <div class="kpi-value" id="kpiItems">0</div>
                    <div class="kpi-sub up"><i class="fa-solid fa-arrow-trend-up"></i> +5.7% vs kemarin</div>
                </div>
                <div class="kpi-card fade d3">
                    <div class="kpi-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="kpi-label">Pelanggan Dilayani</div>
                    <div class="kpi-value" id="kpiCust">0</div>
                    <div class="kpi-sub neu"><i class="fa-solid fa-minus"></i> Sama seperti kemarin</div>
                </div>
            </div>

            <!-- CHARTS -->
            <div class="charts-row">
                <div class="chart-card fade">
                    <div class="chart-header">
                        <div>
                            <div class="chart-title">Grafik Pendapatan</div>
                            <div class="chart-sub">Pendapatan per jam hari ini vs kemarin</div>
                        </div>
                        <div class="chart-tabs">
                            <button class="chart-tab active" onclick="switchChart('hari',this)">Hari</button>
                            <button class="chart-tab" onclick="switchChart('minggu',this)">Minggu</button>
                            <button class="chart-tab" onclick="switchChart('bulan',this)">Bulan</button>
                        </div>
                    </div>
                    <canvas id="revenueChart" height="140"></canvas>
                </div>
                <div class="chart-card fade d1">
                    <div class="chart-header">
                        <div>
                            <div class="chart-title">Penjualan per Kategori</div>
                            <div class="chart-sub">Persentase hari ini</div>
                        </div>
                    </div>
                    <div class="donut-container" style="position:relative;">
                        <canvas id="donutChart" height="180"></canvas>
                        <div class="donut-center">
                            <div class="big">4 Kat.</div>
                            <div class="small">Aktif</div>
                        </div>
                    </div>
                    <div class="donut-legend">
                        <div class="legend-item"><span class="legend-dot" style="background:#e2e8f0;"></span>Food & Bev
                            · 42%</div>
                        <div class="legend-item"><span class="legend-dot" style="background:#94a3b8;"></span>Beauty ·
                            28%</div>
                        <div class="legend-item"><span class="legend-dot" style="background:#475569;"></span>Home Care ·
                            18%</div>
                        <div class="legend-item"><span class="legend-dot"
                                style="background:#1e293b;border:1px solid #303030;"></span>Baby · 12%</div>
                    </div>
                </div>
            </div>

            <!-- QUICK ACTIONS -->
            <div class="panel-card fade" style="margin-bottom:1rem;">
                <div class="panel-header">
                    <div class="panel-title"><i class="fa-solid fa-bolt"
                            style="font-size:.78rem;margin-right:.4rem;color:var(--ts);"></i> Aksi Cepat</div>
                </div>
                <div class="qa-grid">
                    <a href="/sales" class="qa-btn">
                        <span class="ico"><i class="fa-solid fa-cash-register"></i></span>
                        <span class="lbl">Buka Kasir</span>
                    </a>
                    <div class="qa-btn" onclick="openLaporan()">
                        <span class="ico"><i class="fa-solid fa-file-invoice"></i></span>
                        <span class="lbl">Laporan Harian</span>
                    </div>
                    <div class="qa-btn" onclick="openStok()">
                        <span class="ico"><i class="fa-solid fa-boxes-stacked"></i></span>
                        <span class="lbl">Kelola Stok</span>
                    </div>
                    <div class="qa-btn" onclick="exportData()">
                        <span class="ico"><i class="fa-solid fa-file-export"></i></span>
                        <span class="lbl">Ekspor Data</span>
                    </div>
                </div>
            </div>

            <!-- BOTTOM ROW -->
            <div class="bottom-row">
                <!-- Recent Transactions -->
                <div class="panel-card fade">
                    <div class="panel-header">
                        <div class="panel-title">Transaksi Terbaru</div>
                        <a href="/sales" class="panel-action">Buka Kasir →</a>
                    </div>
                    <table id="txnTable">
                        <thead>
                            <tr>
                                <th>No. Struk</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="txnBody"></tbody>
                    </table>
                </div>
                <!-- Top Products -->
                <div class="panel-card fade d1">
                    <div class="panel-header">
                        <div class="panel-title">Produk Terlaris</div>
                        <span class="panel-action">Hari ini</span>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Terjual</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody id="topProdBody"></tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <script>
        // ── CLOCK ──
        function updateClock() {
            const now = new Date();
            document.getElementById('clock').textContent =
                now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        updateClock(); setInterval(updateClock, 1000);

        // ── COUNTER ANIMATION ──
        function animateCount(el, end, prefix = '', suffix = '', dur = 1200) {
            let start = 0, step = end / 60, current = 0;
            const interval = setInterval(() => {
                current = Math.min(current + step, end);
                el.textContent = prefix + (Math.floor(current)).toLocaleString('id-ID') + suffix;
                if (current >= end) clearInterval(interval);
            }, dur / 60);
        }
        animateCount(document.getElementById('kpiRevenue'), 4250000, 'Rp ');
        animateCount(document.getElementById('kpiTxn'), 128);
        animateCount(document.getElementById('kpiItems'), 347);
        animateCount(document.getElementById('kpiCust'), 128);

        // ── REVENUE CHART ──
        const chartData = {
            hari: {
                labels: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'],
                today: [120000, 350000, 480000, 620000, 890000, 1100000, 980000, 750000, 640000, 820000, 900000],
                prev: [95000, 280000, 420000, 590000, 750000, 980000, 870000, 700000, 580000, 760000, 820000]
            },
            minggu: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                today: [3200000, 2800000, 3600000, 4100000, 5200000, 6800000, 4100000],
                prev: [2900000, 2600000, 3100000, 3800000, 4700000, 6200000, 3800000]
            },
            bulan: {
                labels: ['1', '5', '10', '15', '20', '25', 'Feb'],
                today: [18000000, 22000000, 19000000, 24000000, 28000000, 21000000, 26000000],
                prev: [16000000, 20000000, 18000000, 22000000, 25000000, 19000000, 24000000]
            }
        };
        const revCtx = document.getElementById('revenueChart').getContext('2d');
        let revChart = new Chart(revCtx, {
            type: 'line',
            data: {
                labels: chartData.hari.labels,
                datasets: [
                    { label: 'Hari Ini', data: chartData.hari.today, borderColor: '#f2f2f2', backgroundColor: 'rgba(242,242,242,.07)', tension: .4, pointRadius: 3, pointBackgroundColor: '#f2f2f2', fill: true, borderWidth: 2 },
                    { label: 'Kemarin', data: chartData.hari.prev, borderColor: '#383838', backgroundColor: 'transparent', tension: .4, pointRadius: 2, pointBackgroundColor: '#383838', fill: false, borderWidth: 1.5, borderDash: [4, 4] }
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: true, interaction: { mode: 'index', intersect: false },
                plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1c1c1c', borderColor: '#303030', borderWidth: 1, titleFont: { size: 11 }, bodyFont: { size: 11 }, callbacks: { label: c => ' ' + c.dataset.label + ': Rp ' + c.raw.toLocaleString('id-ID') } } },
                scales: { x: { grid: { color: '#1c1c1c' }, ticks: { color: '#484848', font: { size: 10 } } }, y: { grid: { color: '#1c1c1c' }, ticks: { color: '#484848', font: { size: 10 }, callback: v => 'Rp ' + (v / 1000) + 'k' } } }
            }
        });
        function switchChart(period, btn) {
            document.querySelectorAll('.chart-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const d = chartData[period];
            revChart.data.labels = d.labels;
            revChart.data.datasets[0].data = d.today;
            revChart.data.datasets[1].data = d.prev;
            revChart.update();
        }

        // ── DONUT ──
        const donutCtx = document.getElementById('donutChart').getContext('2d');
        new Chart(donutCtx, {
            type: 'doughnut',
            data: { labels: ['Food & Bev', 'Beauty', 'Home Care', 'Baby & Kid'], datasets: [{ data: [42, 28, 18, 12], backgroundColor: ['#e2e8f0', '#94a3b8', '#475569', '#1e293b'], borderColor: '#161616', borderWidth: 3, hoverOffset: 6 }] },
            options: { cutout: '68%', responsive: true, maintainAspectRatio: true, plugins: { legend: { display: false }, tooltip: { backgroundColor: '#1c1c1c', borderColor: '#303030', borderWidth: 1, callbacks: { label: c => c.label + ': ' + c.raw + '%' } } } }
        });

        // ── RECENT TRANSACTIONS ──
        const txns = [
            { id: 'TXN-247', cust: 'Dewi Santika', total: 128500, status: 'paid', pm: 'QRIS' },
            { id: 'TXN-246', cust: 'Budi Prasetyo', total: 265000, status: 'paid', pm: 'Tunai' },
            { id: 'TXN-245', cust: 'Pelanggan Umum', total: 45000, status: 'paid', pm: 'Debit' },
            { id: 'TXN-244', cust: 'Rina Ayu', total: 340000, status: 'paid', pm: 'Transfer' },
            { id: 'TXN-243', cust: 'Pelanggan Umum', total: 17500, status: 'refund', pm: 'Tunai' },
        ];
        const txnBody = document.getElementById('txnBody');
        txnBody.innerHTML = txns.map(t => `
    <tr>
        <td><div class="name">#${t.id}</div><div class="sub">${t.pm}</div></td>
        <td><div class="name">${t.cust}</div></td>
        <td><div class="name">Rp ${t.total.toLocaleString('id-ID')}</div></td>
        <td><span class="txn-status ${t.status}">${t.status === 'paid' ? 'Lunas' : t.status === 'refund' ? 'Refund' : 'Pending'}</span></td>
    </tr>`).join('');

        // ── TOP PRODUCTS ──
        const topProds = [
            { name: 'Indomie Goreng', cat: 'Food', sold: 48, stock: 80, max: 200 },
            { name: 'Pampers Prem. M', cat: 'Baby', sold: 31, stock: 25, max: 100 },
            { name: 'Aqua Galon', cat: 'Food', sold: 27, stock: 60, max: 100 },
            { name: 'Rinso Anti Noda', cat: 'Home', sold: 22, stock: 42, max: 80 },
            { name: 'Handbody Vaseline', cat: 'Beauty', sold: 19, stock: 15, max: 60 },
        ];
        const topBody = document.getElementById('topProdBody');
        topBody.innerHTML = topProds.map((p, i) => {
            const pct = Math.round(p.stock / p.max * 100);
            const cls = pct < 30 ? 'low' : 'ok';
            return `<tr>
        <td><span class="rank-num">${i + 1}</span></td>
        <td><div class="name">${p.name}</div><div class="sub">${p.cat}</div></td>
        <td><div class="name">${p.sold} pcs</div></td>
        <td><div class="name">${p.stock} pcs</div><div class="stock-bar"><div class="stock-fill ${cls}" style="width:${pct}%"></div></div></td>
    </tr>`;
        }).join('');

        // ── NOTIFICATIONS ──
        const NOTIFS = [
            { ico: '⚠️', title: 'Stok Menipis: Pampers Prem. M', sub: 'Tersisa 10 unit — Segera restok', time: '11:55', read: false },
            { ico: '✅', title: 'Transaksi #TXN-247 Lunas', sub: 'Rp 128.500 · QRIS · Dewi Santika', time: '11:42', read: false },
            { ico: '⚠️', title: 'Stok Menipis: Aqua Galon', sub: 'Tersisa 15 unit — Segera restok', time: '10:30', read: true },
            { ico: '🔐', title: 'Login berhasil', sub: 'Shift Pagi dimulai · IP: 192.168.1.10', time: '07:28', read: true },
            { ico: '📋', title: 'Laporan Harian Tersedia', sub: 'Rp 3.245.000 · 31 Transaksi kemarin', time: 'Kemarin', read: true },
        ];
        let notifOpen = false;
        function renderNotifs() {
            const list = document.getElementById('notifList');
            list.innerHTML = NOTIFS.map((n, i) => `<div onclick="markRead(${i})" style="padding:.75rem 1.1rem;border-bottom:1px solid var(--border);display:flex;align-items:flex-start;gap:.7rem;cursor:pointer;background:${n.read ? 'transparent' : 'rgba(242,242,242,.03)'};transition:background .15s;" onmouseover="this.style.background='var(--card2)'" onmouseout="this.style.background='${n.read ? 'transparent' : 'rgba(242,242,242,.03)'}'">
                <div style="font-size:1.1rem;flex-shrink:0;">${n.ico}</div>
                <div style="flex:1;">
                    <div style="font-size:.78rem;font-weight:${n.read ? '500' : '700'};color:${n.read ? 'var(--ts)' : 'var(--tp)'};">${n.title}</div>
                    <div style="font-size:.68rem;color:var(--tm);margin-top:.1rem;">${n.sub}</div>
                    <div style="font-size:.62rem;color:var(--tm);margin-top:.2rem;">${n.time}</div>
                </div>${!n.read ? '<div style="width:6px;height:6px;border-radius:50%;background:var(--tp);flex-shrink:0;margin-top:5px;"></div>' : ''}</div>`).join('') || '<div style="padding:2rem;text-align:center;font-size:.8rem;color:var(--tm);">Tidak ada notifikasi.</div>';
            const unread = NOTIFS.filter(n => !n.read).length;
            document.getElementById('notifDot').style.display = unread > 0 ? 'block' : 'none';
        }
        function markRead(i) { NOTIFS[i].read = true; renderNotifs(); }
        function clearNotifs() { NOTIFS.forEach(n => n.read = true); renderNotifs(); }
        function toggleNotif() {
            notifOpen = !notifOpen;
            document.getElementById('notifPanel').style.display = notifOpen ? 'block' : 'none';
        }
        document.addEventListener('click', e => {
            const panel = document.getElementById('notifPanel');
            const btn = document.getElementById('notifBtn');
            if (notifOpen && panel && !panel.contains(e.target) && btn && !btn.contains(e.target)) {
                notifOpen = false; panel.style.display = 'none';
            }
        });
        renderNotifs();

        // ── SETTINGS ──
        const settingsHTML = `<div id="homeSettingsModal" style="position:fixed;inset:0;background:rgba(0,0,0,.85);backdrop-filter:blur(12px);z-index:500;display:none;align-items:center;justify-content:center;"><div style="background:var(--card);border:1px solid var(--blight);border-radius:18px;padding:2rem;width:420px;"><style>@keyframes popS{from{opacity:0;transform:scale(.88)}to{opacity:1;transform:scale(1)}}</style><div style="animation:popS .25s ease;"><div style="font-size:1rem;font-weight:800;margin-bottom:1.25rem;display:flex;align-items:center;gap:.6rem;"><i class='fa-solid fa-gear' style='color:var(--ts)'></i> Pengaturan Toko</div><div style="margin-bottom:.75rem;"><label style="font-size:.7rem;color:var(--ts);font-weight:700;display:block;margin-bottom:.35rem;text-transform:uppercase;">Nama Toko</label><input id="hst-name" style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;"></div><div style="margin-bottom:.75rem;"><label style="font-size:.7rem;color:var(--ts);font-weight:700;display:block;margin-bottom:.35rem;text-transform:uppercase;">Alamat</label><input id="hst-addr" style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;"></div><div style="margin-bottom:.75rem;"><label style="font-size:.7rem;color:var(--ts);font-weight:700;display:block;margin-bottom:.35rem;text-transform:uppercase;">Telepon</label><input id="hst-phone" style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;"></div><div style="margin-bottom:1rem;"><label style="font-size:.7rem;color:var(--ts);font-weight:700;display:block;margin-bottom:.35rem;text-transform:uppercase;">Tarif PPN (%)</label><input id="hst-tax" type="number" min="0" max="100" style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;"></div><div style="display:grid;grid-template-columns:1fr 1fr;gap:.6rem;"><button onclick="document.getElementById('homeSettingsModal').style.display='none'" style="padding:.55rem;border-radius:9px;font-size:.82rem;font-weight:700;cursor:pointer;border:1px solid var(--border);background:transparent;color:var(--ts);">Batal</button><button onclick="saveHomeSettings()" style="padding:.55rem;border-radius:9px;font-size:.82rem;font-weight:700;cursor:pointer;border:none;background:var(--tp);color:var(--bg);">💾 Simpan</button></div></div></div></div>`;
        document.body.insertAdjacentHTML('beforeend', settingsHTML);
        function toggleSettings() {
            const m = document.getElementById('homeSettingsModal');
            const s = JSON.parse(localStorage.getItem('pos_settings') || '{}');
            document.getElementById('hst-name').value = s.name || 'PointSales Store';
            document.getElementById('hst-addr').value = s.addr || 'Jl. Contoh No.1, Jakarta';
            document.getElementById('hst-phone').value = s.phone || '(021) 000-0000';
            document.getElementById('hst-tax').value = s.tax !== undefined ? s.tax : 11;
            m.style.display = 'flex';
        }
        function saveHomeSettings() {
            const s = { name: document.getElementById('hst-name').value.trim(), addr: document.getElementById('hst-addr').value.trim(), phone: document.getElementById('hst-phone').value.trim(), tax: parseFloat(document.getElementById('hst-tax').value) || 11 };
            localStorage.setItem('pos_settings', JSON.stringify(s));
            document.getElementById('homeSettingsModal').style.display = 'none';
            alert('✅ Pengaturan disimpan!');
        }
    // ── LAPORAN HARIAN ──
        function openLaporan() {
            const now = new Date();
            const tgl = now.toLocaleDateString('id-ID', { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' });
            const el = document.getElementById('laporanModal');
            document.getElementById('laporanTgl').textContent = tgl;
            el.style.display = 'flex';
        }

        // ── KELOLA STOK ──
        const STOK_DATA = [
            { id:'FB003', name:'Indomie Goreng', cat:'Food', stok:200, min:50 },
            { id:'BK002', name:'Pampers Prem. M', cat:'Baby', stok:10, min:20 },
            { id:'FB006', name:'Aqua Galon', cat:'Food', stok:40, min:30 },
            { id:'HC002', name:'Rinso Anti Noda', cat:'Home', stok:55, min:30 },
            { id:'BH001', name:'Handbody Vaseline', cat:'Beauty', stok:15, min:20 },
            { id:'HC008', name:'Baygon Semprot', cat:'Home', stok:8, min:15 },
        ];
        function openStok() {
            const tbody = document.getElementById('stokBody');
            tbody.innerHTML = STOK_DATA.map((p, i) => {
                const low = p.stok <= p.min;
                const cls = p.stok === 0 ? 'color:#f87171' : low ? 'color:#fbbf24' : 'color:#4ade80';
                return `<tr>
                    <td style="font-family:monospace;font-size:.72rem;color:var(--ts);">${p.id}</td>
                    <td style="font-size:.8rem;">${p.name}<br><span style="font-size:.66rem;color:var(--ts);">${p.cat}</span></td>
                    <td><input type="number" value="${p.stok}" min="0" id="stok-${i}" style="width:65px;background:var(--bg2);border:1px solid var(--border);border-radius:6px;padding:.3rem .5rem;color:var(--tp);font-size:.82rem;font-family:inherit;outline:none;text-align:center;"></td>
                    <td style="font-size:.75rem;${cls};">${p.stok===0?'Habis':low?'Menipis':'OK'}</td>
                </tr>`;
            }).join('');
            document.getElementById('stokModal').style.display = 'flex';
        }
        function saveStok() {
            STOK_DATA.forEach((p, i) => {
                const val = parseInt(document.getElementById('stok-' + i).value);
                if (!isNaN(val)) p.stok = val;
            });
            document.getElementById('stokModal').style.display = 'none';
            alert('✅ Stok berhasil diperbarui!');
        }

        // ── EKSPOR DATA ──
        function exportData() {
            const rows = [
                ['No.Struk','Pelanggan','Total','Metode','Status','Tanggal'],
                ['TXN-247','Dewi Santika','128500','QRIS','Lunas','23/02/2026'],
                ['TXN-246','Budi Prasetyo','265000','Tunai','Lunas','23/02/2026'],
                ['TXN-245','Pelanggan Umum','45000','Debit','Lunas','23/02/2026'],
                ['TXN-244','Rina Ayu','340000','Transfer','Lunas','23/02/2026'],
                ['TXN-243','Pelanggan Umum','17500','Tunai','Refund','23/02/2026'],
            ];
            const csv = rows.map(r => r.join(',')).join('\n');
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'laporan-transaksi-' + new Date().toISOString().slice(0,10) + '.csv';
            a.click();
            URL.revokeObjectURL(url);
        }
    </script>

    <!-- LAPORAN HARIAN MODAL -->
    <div id="laporanModal" style="position:fixed;inset:0;background:rgba(0,0,0,.85);backdrop-filter:blur(12px);z-index:500;display:none;align-items:center;justify-content:center;" onclick="if(event.target===this)this.style.display='none'">
        <div style="background:var(--card);border:1px solid var(--blight);border-radius:18px;padding:2rem;width:500px;max-height:85vh;overflow-y:auto;animation:popS .25s cubic-bezier(.34,1.56,.64,1)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;">
                <div>
                    <div style="font-size:1rem;font-weight:800;display:flex;align-items:center;gap:.5rem;"><i class="fa-solid fa-file-invoice" style="color:var(--ts);"></i> Laporan Harian</div>
                    <div id="laporanTgl" style="font-size:.72rem;color:var(--ts);margin-top:.2rem;"></div>
                </div>
                <button onclick="document.getElementById('laporanModal').style.display='none'" style="background:none;border:none;cursor:pointer;color:var(--ts);font-size:1.1rem;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <!-- KPI Summary -->
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:.6rem;margin-bottom:1rem;">
                <div style="background:var(--bg2);border:1px solid var(--border);border-radius:10px;padding:.85rem;text-align:center;">
                    <div style="font-size:1.2rem;font-weight:900;">247</div><div style="font-size:.65rem;color:var(--ts);text-transform:uppercase;margin-top:.2rem;">Transaksi</div>
                </div>
                <div style="background:var(--bg2);border:1px solid var(--border);border-radius:10px;padding:.85rem;text-align:center;">
                    <div style="font-size:1rem;font-weight:900;">Rp 3,24jt</div><div style="font-size:.65rem;color:var(--ts);text-transform:uppercase;margin-top:.2rem;">Pendapatan</div>
                </div>
                <div style="background:var(--bg2);border:1px solid var(--border);border-radius:10px;padding:.85rem;text-align:center;">
                    <div style="font-size:1.2rem;font-weight:900;">Rp 357rb</div><div style="font-size:.65rem;color:var(--ts);text-transform:uppercase;margin-top:.2rem;">PPN 11%</div>
                </div>
            </div>
            <!-- Breakdown -->
            <div style="background:var(--bg2);border:1px solid var(--border);border-radius:12px;overflow:hidden;margin-bottom:1rem;">
                <div style="padding:.7rem 1rem;font-size:.7rem;font-weight:700;color:var(--tm);text-transform:uppercase;border-bottom:1px solid var(--border);">Breakdown per Kategori</div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;border-bottom:1px solid var(--border);"><span>🍔 Food & Beverage</span><span style="font-weight:700;">Rp 1.360.500</span></div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;border-bottom:1px solid var(--border);"><span>💄 Beauty & Health</span><span style="font-weight:700;">Rp 907.200</span></div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;border-bottom:1px solid var(--border);"><span>🏠 Home Care</span><span style="font-weight:700;">Rp 583.800</span></div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;"><span>🍼 Baby & Kid</span><span style="font-weight:700;">Rp 389.500</span></div>
            </div>
            <!-- Metode Bayar -->
            <div style="background:var(--bg2);border:1px solid var(--border);border-radius:12px;overflow:hidden;margin-bottom:1.25rem;">
                <div style="padding:.7rem 1rem;font-size:.7rem;font-weight:700;color:var(--tm);text-transform:uppercase;border-bottom:1px solid var(--border);">Metode Pembayaran</div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;border-bottom:1px solid var(--border);"><span>💵 Tunai</span><span>92 txn · Rp 1.245.000</span></div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;border-bottom:1px solid var(--border);"><span>📱 QRIS</span><span>85 txn · Rp 1.023.500</span></div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;border-bottom:1px solid var(--border);"><span>💳 Debit</span><span>48 txn · Rp 672.000</span></div>
                <div style="padding:.65rem 1rem;display:flex;justify-content:space-between;font-size:.8rem;"><span>🏦 Transfer</span><span>22 txn · Rp 300.500</span></div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.6rem;">
                <button onclick="exportData();document.getElementById('laporanModal').style.display='none'" style="padding:.6rem;border-radius:9px;font-size:.82rem;font-weight:700;cursor:pointer;border:1px solid var(--border);background:transparent;color:var(--ts);">📥 Ekspor CSV</button>
                <button onclick="document.getElementById('laporanModal').style.display='none'" style="padding:.6rem;border-radius:9px;font-size:.82rem;font-weight:700;cursor:pointer;border:none;background:var(--tp);color:var(--bg);">Tutup</button>
            </div>
        </div>
    </div>

    <!-- KELOLA STOK MODAL -->
    <div id="stokModal" style="position:fixed;inset:0;background:rgba(0,0,0,.85);backdrop-filter:blur(12px);z-index:500;display:none;align-items:center;justify-content:center;" onclick="if(event.target===this)this.style.display='none'">
        <div style="background:var(--card);border:1px solid var(--blight);border-radius:18px;padding:2rem;width:520px;max-height:85vh;overflow-y:auto;animation:popS .25s cubic-bezier(.34,1.56,.64,1)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;">
                <div style="font-size:1rem;font-weight:800;display:flex;align-items:center;gap:.5rem;"><i class="fa-solid fa-boxes-stacked" style="color:var(--ts);"></i> Kelola Stok</div>
                <button onclick="document.getElementById('stokModal').style.display='none'" style="background:none;border:none;cursor:pointer;color:var(--ts);font-size:1.1rem;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <p style="font-size:.78rem;color:var(--ts);margin-bottom:1rem;">Edit jumlah stok produk secara manual. Perubahan akan disimpan secara lokal.</p>
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="font-size:.68rem;color:var(--tm);text-transform:uppercase;">
                        <th style="padding:.5rem .7rem;text-align:left;border-bottom:1px solid var(--border);">Kode</th>
                        <th style="padding:.5rem .7rem;text-align:left;border-bottom:1px solid var(--border);">Produk</th>
                        <th style="padding:.5rem .7rem;text-align:center;border-bottom:1px solid var(--border);">Stok</th>
                        <th style="padding:.5rem .7rem;text-align:center;border-bottom:1px solid var(--border);">Status</th>
                    </tr>
                </thead>
                <tbody id="stokBody"></tbody>
            </table>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.6rem;margin-top:1.25rem;">
                <button onclick="document.getElementById('stokModal').style.display='none'" style="padding:.6rem;border-radius:9px;font-size:.82rem;font-weight:700;cursor:pointer;border:1px solid var(--border);background:transparent;color:var(--ts);">Batal</button>
                <button onclick="saveStok()" style="padding:.6rem;border-radius:9px;font-size:.82rem;font-weight:700;cursor:pointer;border:none;background:var(--tp);color:var(--bg);">💾 Simpan Stok</button>
            </div>
        </div>
    </div>
</body>

</html>
