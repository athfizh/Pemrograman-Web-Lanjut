<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby &amp; Kid — PointSales</title>
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

        .btn-top {
            padding: .35rem .85rem;
            border-radius: 7px;
            font-size: .78rem;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--ts);
            transition: all .2s;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
        }

        .btn-top:hover {
            background: var(--card2);
            color: var(--tp);
        }

        .btn-top.primary {
            background: var(--tp);
            color: var(--bg);
            border-color: var(--tp);
        }

        .btn-top.primary:hover {
            background: #d5d5d5;
        }

        .main {
            margin-left: 240px;
            padding-top: 60px;
            min-height: 100vh;
        }

        .content {
            padding: 1.75rem 2rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: .5rem;
            font-size: .75rem;
            color: var(--tm);
            margin-bottom: 1.5rem;
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

        .page-h {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .page-h-left h1 {
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: -.025em;
            margin-bottom: .3rem;
        }

        .page-h-left p {
            font-size: .82rem;
            color: var(--ts);
        }

        .page-h-badges {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-top: .75rem;
            flex-wrap: wrap;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .25rem .65rem;
            border-radius: 99px;
            background: var(--card2);
            border: 1px solid var(--blight);
            font-size: .7rem;
            color: var(--ts);
            font-weight: 500;
        }

        .badge .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
        }

        .page-h-right {
            display: flex;
            gap: .5rem;
        }

        .toolbar {
            display: flex;
            align-items: center;
            gap: .6rem;
            flex-wrap: wrap;
            margin-bottom: 1.25rem;
        }

        .search-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .5rem 1rem;
            flex: 1;
            min-width: 200px;
            transition: border-color .2s;
        }

        .search-wrap:focus-within {
            border-color: var(--blight);
        }

        .search-wrap i {
            color: var(--tm);
            font-size: .8rem;
        }

        .search-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--tp);
            font-size: .83rem;
            font-family: inherit;
            flex: 1;
        }

        .search-wrap input::placeholder {
            color: var(--tm);
        }

        .toolbar-actions {
            display: flex;
            gap: .4rem;
        }

        .stats-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 1.25rem;
        }

        .stat-cell {
            background: var(--card);
            padding: 1rem 1.25rem;
        }

        .stat-cell .num {
            font-size: 1.4rem;
            font-weight: 900;
            color: var(--tp);
        }

        .stat-cell .lbl {
            font-size: .65rem;
            color: var(--tm);
            text-transform: uppercase;
            letter-spacing: .07em;
            margin-top: .2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: .85rem;
        }

        .prod-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 13px;
            overflow: hidden;
            transition: all .2s;
            cursor: pointer;
        }

        .prod-card:hover {
            border-color: var(--blight);
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, .55);
        }

        .prod-img {
            aspect-ratio: 1;
            background: var(--bg2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.25rem;
            border-bottom: 1px solid var(--border);
            position: relative;
        }

        .prod-cat-label {
            position: absolute;
            top: .5rem;
            left: .5rem;
            padding: .18rem .5rem;
            border-radius: 5px;
            background: var(--card);
            border: 1px solid var(--border);
            font-size: .6rem;
            font-weight: 700;
            color: var(--tm);
            text-transform: uppercase;
        }

        .stock-pill {
            position: absolute;
            bottom: .5rem;
            right: .5rem;
            padding: .18rem .5rem;
            border-radius: 5px;
            font-size: .6rem;
            font-weight: 700;
        }

        .stock-ok {
            background: rgba(34, 197, 94, .12);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, .2);
        }

        .stock-low {
            background: rgba(245, 158, 11, .12);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, .2);
        }

        .stock-out {
            background: rgba(239, 68, 68, .12);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, .2);
        }

        .prod-body {
            padding: .85rem;
        }

        .prod-code {
            font-size: .6rem;
            color: var(--tm);
            font-family: monospace;
            margin-bottom: .3rem;
        }

        .prod-name {
            font-size: .85rem;
            font-weight: 700;
            color: var(--tp);
            margin-bottom: .15rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .prod-desc {
            font-size: .7rem;
            color: var(--tm);
            margin-bottom: .7rem;
        }

        .prod-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .prod-price {
            font-size: .92rem;
            font-weight: 800;
            color: var(--tp);
        }

        .btn-add {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: var(--tp);
            color: var(--bg);
            border: none;
            cursor: pointer;
            font-size: .78rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .15s;
        }

        .btn-add:hover {
            background: #d5d5d5;
            transform: scale(1.1);
        }

        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 999;
            background: var(--card);
            border: 1px solid var(--blight);
            border-radius: 12px;
            padding: .75rem 1.1rem;
            display: flex;
            align-items: center;
            gap: .65rem;
            font-size: .82rem;
            color: var(--tp);
            box-shadow: 0 20px 40px rgba(0, 0, 0, .7);
            transform: translateY(8px);
            opacity: 0;
            transition: all .28s;
            pointer-events: none;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast i {
            color: var(--green);
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

        footer {
            border-top: 1px solid var(--border);
            padding: 1.2rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .75rem;
        }

        footer p {
            font-size: .72rem;
            color: var(--tm);
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

            .content {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
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
            <a href="/category/baby-kid" class="nav-item active"><span class="ico">🍼</span> Baby &amp; Kid</a>
        </div>
        <div class="sidebar-section" style="margin-top:.5rem;">
            <div class="sidebar-section-label">Akun</div>
            <a href="/user/1/name/Athaulla Hafizh" class="nav-item"><span class="ico"><i
                        class="fa-solid fa-circle-user"></i></span> Profil Saya</a>
            <a href="#" class="nav-item"><span class="ico"><i class="fa-solid fa-gear"></i></span> Pengaturan</a>
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
    <div class="topbar">
        <div class="topbar-left">
            <h2>🍼 Baby &amp; Kid</h2>
            <p>Manajemen produk perlengkapan bayi dan anak</p>
        </div>
        <div class="topbar-right">
            <div class="live-clock" id="clock">--:--:--</div><a href="/sales" class="btn-top primary"><i
                    class="fa-solid fa-cash-register"></i> Buka Kasir</a>
        </div>
    </div>
    <main class="main">
        <div class="content">
            <div class="breadcrumb fade"><a href="/"><i class="fa-solid fa-chart-pie"></i> Dashboard</a><i
                    class="fa-solid fa-chevron-right"></i><span>Kategori</span><i
                    class="fa-solid fa-chevron-right"></i><span>Baby &amp; Kid</span></div>
            <div class="page-h fade">
                <div class="page-h-left">
                    <h1>🍼 Baby &amp; Kid</h1>
                    <p>Perlengkapan bayi, kebutuhan anak, dan produk tumbuh kembang si kecil.</p>
                    <div class="page-h-badges">
                        <span class="badge"><span class="dot"></span> Stok Aktif</span>
                        <span class="badge"><i class="fa-solid fa-boxes-stacked"></i> 78 SKU</span>
                        <span class="badge" style="color:var(--amber);border-color:rgba(245,158,11,.3);"><i
                                class="fa-solid fa-triangle-exclamation"></i> 2 Stok Menipis</span>
                    </div>
                </div>
                <div class="page-h-right">
                    <button class="btn-top" onclick="showToast('Fitur tambah produk segera hadir!')"><i
                            class="fa-solid fa-plus"></i> Tambah Produk</button>
                    <button class="btn-top" onclick="showToast('Fitur export segera hadir!')"><i
                            class="fa-solid fa-file-export"></i> Export</button>
                </div>
            </div>
            <div class="stats-strip fade">
                <div class="stat-cell">
                    <div class="num">78</div>
                    <div class="lbl">Total SKU</div>
                </div>
                <div class="stat-cell">
                    <div class="num">226</div>
                    <div class="lbl">Total Stok</div>
                </div>
                <div class="stat-cell">
                    <div class="num">Rp 580rb</div>
                    <div class="lbl">Penjualan Hari Ini</div>
                </div>
                <div class="stat-cell">
                    <div class="num">18</div>
                    <div class="lbl">Item Terjual Hari Ini</div>
                </div>
            </div>
            <div class="toolbar fade">
                <div class="search-wrap"><i class="fa-solid fa-magnifying-glass"></i><input type="text" id="searchInput"
                        placeholder="Cari produk, kode, atau barcode…" onkeyup="filterProds()"></div>
                <div class="toolbar-actions">
                    <button class="btn-top" onclick="sortProds()"><i class="fa-solid fa-arrow-up-z-a"></i> Urut
                        A–Z</button>
                    <button class="btn-top" onclick="filterStock()"><i class="fa-solid fa-filter"></i> Stok
                        Menipis</button>
                </div>
            </div>
            <div class="product-grid fade" id="prodGrid"></div>
        </div>
        <footer>
            <p>© 2026 <strong style="color:var(--ts);">Athaulla Hafizh</strong> · PointSales POS System · Kategori Baby
                &amp; Kid</p><a href="/" style="font-size:.72rem;color:var(--tm);"
                onmouseover="this.style.color='#808080'" onmouseout="this.style.color='#484848'">← Dashboard</a>
        </footer>
    </main>
    <div class="toast" id="toast"><i class="fa-solid fa-circle-check"></i><span id="toastMsg"></span></div>
    <script>
        const PRODS = [
            { id: 'BK001', name: 'Botol Susu Pigeon', desc: '240ml · Botol Bayi', price: 85000, emoji: '🍼', stock: 18, cat: 'Bayi' },
            { id: 'BK002', name: 'Pampers Prem. M', desc: 'M-20pcs · Popok Bayi', price: 95000, emoji: '🧷', stock: 10, cat: 'Popok' },
            { id: 'BK003', name: "Johnson's Baby Wash", desc: '200ml · Sabun Bayi', price: 32000, emoji: '🛁', stock: 40, cat: 'Mandi' },
            { id: 'BK004', name: 'Bubur Bayi Cerelac', desc: '600gr · MPASI Bayi', price: 65000, emoji: '🥣', stock: 30, cat: 'MPASI' },
            { id: 'BK005', name: "Baby Oil Johnson's", desc: '100ml · Minyak Bayi', price: 25000, emoji: '🎀', stock: 50, cat: 'Perawatan' },
            { id: 'BK006', name: 'Mainan Edukasi Puzzle', desc: '1 set · Usia 2-5 Tahun', price: 45000, emoji: '🧸', stock: 25, cat: 'Mainan' },
            { id: 'BK007', name: 'Detergent Bayi Sleek', desc: '900ml · Deterjen Bayi', price: 37000, emoji: '🧺', stock: 35, cat: 'Pakaian' },
            { id: 'BK008', name: 'Termometer Digital', desc: '1pcs · Alat Kesehatan', price: 75000, emoji: '🌡️', stock: 12, cat: 'Kesehatan' },
        ];
        let showLowOnly = false, sortAZ = false, currentData = [...PRODS];
        const fmt = n => 'Rp ' + n.toLocaleString('id-ID');
        function render() { const q = document.getElementById('searchInput').value.toLowerCase(); let data = currentData.filter(p => !q || p.name.toLowerCase().includes(q) || p.id.toLowerCase().includes(q)); if (showLowOnly) data = data.filter(p => p.stock <= 20); document.getElementById('prodGrid').innerHTML = data.map(p => { const cls = p.stock === 0 ? 'stock-out' : p.stock <= 20 ? 'stock-low' : 'stock-ok'; const txt = p.stock === 0 ? 'Habis' : p.stock <= 20 ? `Sisa ${p.stock}` : `Stok ${p.stock}`; return `<div class="prod-card"><div class="prod-img"><span class="prod-cat-label">${p.cat}</span>${p.emoji}<span class="stock-pill ${cls}">${txt}</span></div><div class="prod-body"><div class="prod-code">${p.id}</div><div class="prod-name">${p.name}</div><div class="prod-desc">${p.desc}</div><div class="prod-footer"><span class="prod-price">${fmt(p.price)}</span><button class="btn-add" onclick="addToCartLS('${p.id}','${p.name.replace(/'/g, "\\'")}',${p.price},'${p.emoji}')"${p.stock === 0 ? ' disabled style="opacity:.4;cursor:not-allowed;"' : ''}><i class="fa-solid fa-cart-plus"></i></button></div></div></div>`; }).join('') || '<p style="color:var(--tm);font-size:.82rem;grid-column:1/-1;text-align:center;padding:3rem;">Produk tidak ditemukan.</p>'; }
        function filterProds() { render(); }
        function sortProds() { sortAZ = !sortAZ; currentData.sort((a, b) => sortAZ ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name)); render(); }
        function filterStock() { showLowOnly = !showLowOnly; render(); }
        function showToast(msg) { const t = document.getElementById('toast'); document.getElementById('toastMsg').textContent = msg; t.classList.add('show'); setTimeout(() => t.classList.remove('show'), 2800); }
        function addToCartLS(id, name, price, emoji) { const K = 'pos_cart'; let c = []; try { c = JSON.parse(localStorage.getItem(K) || '[]'); } catch (e) { } const i = c.findIndex(x => x.id === id); if (i >= 0) c[i].qty++; else c.push({ id, qty: 1 }); localStorage.setItem(K, JSON.stringify(c)); const tot = c.reduce((s, x) => s + x.qty, 0); showToast(`${emoji} ${name} ditambahkan ke kasir! (${tot} item di keranjang)`); }
        function tickClock() { document.getElementById('clock').textContent = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }); }
        // ── LOAD STOCK FROM POS ──
        (function () {
            try {
                const saved = JSON.parse(localStorage.getItem('pos_stock') || '{}');
                currentData.forEach(p => { if (saved[p.id] !== undefined) p.stock = saved[p.id]; });
            } catch (e) { }
        })();
        tickClock(); setInterval(tickClock, 1000); render();
    </script>
</body>

</html>