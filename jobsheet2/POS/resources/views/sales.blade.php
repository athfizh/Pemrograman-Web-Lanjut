<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir / POS — PointSales</title>
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
            overflow: hidden;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--blight);
            border-radius: 2px;
        }

        /* ── TOPBAR ── */
        .topbar {
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            background: var(--bg2);
            border-bottom: 1px solid var(--border);
            flex-shrink: 0;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: .65rem;
        }

        .brand-icon {
            width: 30px;
            height: 30px;
            background: var(--tp);
            color: var(--bg);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .72rem;
            font-weight: 900;
        }

        .topbar-brand strong {
            font-size: .95rem;
            font-weight: 800;
        }

        .topbar-brand span {
            font-size: .72rem;
            color: var(--ts);
            margin-left: .5rem;
        }

        .topbar-mid {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .session-info {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 7px;
            padding: .3rem .8rem;
            font-size: .75rem;
            color: var(--ts);
            display: flex;
            align-items: center;
            gap: .4rem;
        }

        .live-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 5px #22c55e88;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .4
            }
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .live-clock {
            font-size: .8rem;
            color: var(--ts);
            font-variant-numeric: tabular-nums;
            background: var(--card);
            border: 1px solid var(--border);
            padding: .28rem .7rem;
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
            text-decoration: none;
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
            background: #d8d8d8;
        }

        .btn-top.danger {
            border-color: rgba(239, 68, 68, .3);
            color: var(--red);
        }

        .btn-top.danger:hover {
            background: rgba(239, 68, 68, .1);
        }

        /* ── LAYOUT ── */
        .pos-layout {
            display: grid;
            grid-template-columns: 1fr 400px;
            height: calc(100vh - 58px);
            overflow: hidden;
        }

        /* ── LEFT: PRODUCTS PANEL ── */
        .panel-left {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            border-right: 1px solid var(--border);
        }

        .panel-toolbar {
            padding: .85rem 1.25rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            gap: .6rem;
            flex-wrap: wrap;
            align-items: center;
            background: var(--bg2);
        }

        .search-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: .45rem .85rem;
            flex: 1;
            min-width: 180px;
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

        .cat-tabs {
            display: flex;
            gap: .3rem;
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .cat-tab {
            padding: .35rem .75rem;
            border-radius: 7px;
            font-size: .72rem;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            background: transparent;
            color: var(--ts);
            white-space: nowrap;
            transition: all .15s;
            flex-shrink: 0;
        }

        .cat-tab:hover {
            background: var(--card);
            color: var(--tp);
        }

        .cat-tab.active {
            background: var(--tp);
            color: var(--bg);
            border-color: var(--tp);
        }

        .product-grid-wrap {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(145px, 1fr));
            gap: .65rem;
        }

        .prod-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 11px;
            overflow: hidden;
            cursor: pointer;
            transition: all .18s;
            user-select: none;
        }

        .prod-card:hover {
            border-color: var(--blight);
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, .5);
        }

        .prod-card:active {
            transform: scale(.96);
        }

        .prod-img {
            aspect-ratio: 1;
            background: var(--bg2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            border-bottom: 1px solid var(--border);
            position: relative;
        }

        .prod-sticker {
            position: absolute;
            bottom: .4rem;
            right: .4rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 5px;
            font-size: .6rem;
            font-weight: 700;
            color: var(--tm);
            padding: .1rem .35rem;
        }

        .prod-sticker.low {
            color: var(--amber);
            border-color: rgba(245, 158, 11, .3);
        }

        .prod-sticker.out {
            color: var(--red);
            border-color: rgba(239, 68, 68, .3);
        }

        .prod-info {
            padding: .65rem .75rem;
        }

        .prod-name {
            font-size: .78rem;
            font-weight: 700;
            color: var(--tp);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: .15rem;
        }

        .prod-cat {
            font-size: .62rem;
            color: var(--tm);
            margin-bottom: .45rem;
        }

        .prod-price {
            font-size: .88rem;
            font-weight: 800;
            color: var(--tp);
        }

        .prod-code {
            font-size: .58rem;
            color: var(--tm);
            font-family: monospace;
            margin-top: .1rem;
        }

        /* ── RIGHT: RECEIPT PANEL ── */
        .panel-right {
            display: flex;
            flex-direction: column;
            background: var(--bg2);
        }

        /* Customer bar */
        .cust-bar {
            padding: .75rem 1.25rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .cust-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: .4rem .85rem;
            flex: 1;
            transition: border-color .2s;
        }

        .cust-wrap:focus-within {
            border-color: var(--blight);
        }

        .cust-wrap i {
            color: var(--tm);
            font-size: .78rem;
        }

        .cust-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--tp);
            font-size: .8rem;
            font-family: inherit;
            flex: 1;
        }

        .cust-wrap input::placeholder {
            color: var(--tm);
        }

        .txn-badge {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 7px;
            padding: .35rem .7rem;
            font-size: .7rem;
            color: var(--ts);
            font-family: monospace;
            white-space: nowrap;
            flex-shrink: 0;
        }

        /* Receipt header */
        .receipt-top {
            padding: .75rem 1.25rem .5rem;
            border-bottom: 1px solid var(--border);
        }

        .receipt-cols {
            display: flex;
            justify-content: space-between;
            font-size: .7rem;
            color: var(--tm);
        }

        .receipt-cols strong {
            color: var(--ts);
        }

        /* Cart */
        .cart-wrap {
            flex: 1;
            overflow-y: auto;
        }

        .cart-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            gap: .75rem;
            color: var(--tm);
        }

        .cart-empty .ico {
            font-size: 2.5rem;
        }

        .cart-empty p {
            font-size: .8rem;
            text-align: center;
            line-height: 1.5;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .7rem 1.25rem;
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }

        .cart-item:hover {
            background: var(--card);
        }

        .ci-emoji {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: var(--card2);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .ci-info {
            flex: 1;
            min-width: 0;
        }

        .ci-name {
            font-size: .8rem;
            font-weight: 600;
            color: var(--tp);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ci-unit {
            font-size: .68rem;
            color: var(--tm);
            margin-top: .08rem;
        }

        .ci-subtotal {
            font-size: .8rem;
            font-weight: 700;
            color: var(--tp);
            margin-right: .5rem;
            white-space: nowrap;
        }

        .qty-ctl {
            display: flex;
            align-items: center;
            gap: .3rem;
            flex-shrink: 0;
        }

        .qty-btn {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            background: var(--card2);
            border: 1px solid var(--blight);
            color: var(--tp);
            font-size: .72rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .12s;
        }

        .qty-btn:hover {
            background: var(--blight);
        }

        .qty-btn.del {
            color: var(--red);
        }

        .qty-btn.del:hover {
            background: rgba(239, 68, 68, .15);
            border-color: rgba(239, 68, 68, .4);
        }

        .qty-num {
            font-size: .78rem;
            font-weight: 700;
            min-width: 16px;
            text-align: center;
        }

        /* Discount row */
        .discount-bar {
            padding: .6rem 1.25rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--bg);
        }

        .discount-bar label {
            font-size: .72rem;
            color: var(--ts);
            white-space: nowrap;
        }

        .disc-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: .32rem .7rem;
            flex: 1;
            transition: border-color .2s;
        }

        .disc-wrap:focus-within {
            border-color: var(--blight);
        }

        .disc-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--tp);
            font-size: .8rem;
            font-family: inherit;
            flex: 1;
            width: 100%;
        }

        .disc-wrap input::placeholder {
            color: var(--tm);
        }

        .disc-wrap span {
            font-size: .75rem;
            color: var(--ts);
        }

        .note-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: .32rem .7rem;
            flex: 1.5;
            transition: border-color .2s;
        }

        .note-wrap:focus-within {
            border-color: var(--blight);
        }

        .note-wrap i {
            color: var(--tm);
            font-size: .72rem;
        }

        .note-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--tp);
            font-size: .78rem;
            font-family: inherit;
            flex: 1;
        }

        .note-wrap input::placeholder {
            color: var(--tm);
        }

        /* Summary */
        .summary-wrap {
            padding: .75rem 1.25rem;
            border-top: 1px solid var(--border);
            background: var(--bg);
        }

        .sum-row {
            display: flex;
            justify-content: space-between;
            font-size: .78rem;
            color: var(--ts);
            margin-bottom: .45rem;
        }

        .sum-row.total {
            font-size: 1rem;
            font-weight: 900;
            color: var(--tp);
            padding-top: .6rem;
            margin-top: .3rem;
            border-top: 1px solid var(--border);
            margin-bottom: 0;
        }

        .sum-row.disc-row {
            color: var(--green);
        }

        /* Payment */
        .payment-wrap {
            padding: .75rem 1.25rem;
            border-top: 1px solid var(--border);
            background: var(--bg2);
        }

        .pm-label {
            font-size: .65rem;
            color: var(--tm);
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 700;
            margin-bottom: .5rem;
        }

        .pm-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .35rem;
            margin-bottom: .6rem;
        }

        .pm-btn {
            padding: .5rem .25rem;
            border-radius: 8px;
            font-size: .7rem;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            background: var(--card);
            color: var(--ts);
            text-align: center;
            transition: all .18s;
        }

        .pm-btn:hover {
            border-color: var(--blight);
            color: var(--tp);
        }

        .pm-btn.active {
            background: var(--tp);
            color: var(--bg);
            border-color: var(--tp);
        }

        /* Cash input */
        .cash-row {
            display: none;
            margin-bottom: .65rem;
        }

        .cash-row.show {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .cash-input-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: .45rem .85rem;
            flex: 1;
            transition: border-color .2s;
        }

        .cash-input-wrap:focus-within {
            border-color: var(--blight);
        }

        .cash-input-wrap span {
            font-size: .78rem;
            color: var(--ts);
            flex-shrink: 0;
        }

        .cash-input-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--tp);
            font-size: .88rem;
            font-weight: 700;
            font-family: inherit;
            flex: 1;
            width: 60px;
        }

        .change-badge {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: .45rem .85rem;
            font-size: .78rem;
            color: var(--ts);
            white-space: nowrap;
        }

        .change-badge.ok {
            border-color: rgba(34, 197, 94, .3);
            color: var(--green);
        }

        .change-badge.neg {
            border-color: rgba(239, 68, 68, .3);
            color: var(--red);
        }

        .quick-cash {
            display: flex;
            gap: .3rem;
            flex-wrap: wrap;
            margin-bottom: .65rem;
        }

        .qc-btn {
            padding: .28rem .65rem;
            border-radius: 6px;
            font-size: .68rem;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            background: var(--card);
            color: var(--ts);
            transition: all .15s;
        }

        .qc-btn:hover {
            background: var(--blight);
            color: var(--tp);
        }

        .btn-checkout {
            width: 100%;
            padding: .85rem;
            border-radius: 11px;
            background: var(--tp);
            color: var(--bg);
            font-size: .92rem;
            font-weight: 800;
            cursor: pointer;
            border: none;
            transition: all .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
        }

        .btn-checkout:hover:not(:disabled) {
            background: #d5d5d5;
            transform: translateY(-1px);
        }

        .btn-checkout:disabled {
            opacity: .3;
            cursor: not-allowed;
            transform: none;
        }

        .btn-clear {
            width: 100%;
            padding: .45rem;
            border-radius: 8px;
            background: transparent;
            color: var(--tm);
            font-size: .75rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            margin-top: .4rem;
            transition: color .2s;
        }

        .btn-clear:hover {
            color: var(--red);
        }

        /* ── MODAL ── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .85);
            backdrop-filter: blur(10px);
            z-index: 500;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal {
            background: var(--card);
            border: 1px solid var(--blight);
            border-radius: 18px;
            padding: 2rem;
            width: 360px;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes pop {
            from {
                opacity: 0;
                transform: scale(.88)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .modal {
            animation: pop .25s cubic-bezier(.34, 1.56, .64, 1);
        }

        /* Receipt Print */
        .receipt-print {
            font-family: monospace;
            font-size: .78rem;
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        .rp-center {
            text-align: center;
        }

        .rp-title {
            font-size: .95rem;
            font-weight: 900;
            font-family: 'Inter', sans-serif;
        }

        .rp-divider {
            border: none;
            border-top: 1px dashed var(--blight);
            margin: .6rem 0;
        }

        .rp-row {
            display: flex;
            justify-content: space-between;
            margin: .15rem 0;
            font-size: .72rem;
            color: var(--ts);
        }

        .rp-row.bold {
            color: var(--tp);
            font-weight: 700;
        }

        .rp-row.total-row {
            font-size: .85rem;
            font-weight: 900;
            color: var(--tp);
        }

        .rp-change {
            text-align: center;
            padding: .4rem;
            background: rgba(34, 197, 94, .08);
            border: 1px solid rgba(34, 197, 94, .2);
            border-radius: 6px;
            color: var(--green);
            font-weight: 700;
            font-size: .8rem;
            margin: .4rem 0;
        }

        .rp-footer {
            text-align: center;
            font-size: .65rem;
            color: var(--tm);
            margin-top: .5rem;
        }

        .modal-btns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .5rem;
        }

        .modal-btn {
            padding: .7rem;
            border-radius: 9px;
            font-size: .8rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .2s;
            border: 1px solid var(--blight);
            background: var(--card2);
            color: var(--ts);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
        }

        .modal-btn:hover {
            background: var(--blight);
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

        /* HOLD order */
        .held-badge {
            position: absolute;
            top: .4rem;
            left: .4rem;
            background: rgba(245, 158, 11, .15);
            border: 1px solid rgba(245, 158, 11, .3);
            color: var(--amber);
            font-size: .6rem;
            font-weight: 700;
            padding: .1rem .35rem;
            border-radius: 4px;
        }

        @media(max-width:900px) {
            .pos-layout {
                grid-template-columns: 1fr;
            }

            .panel-right {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 50vh;
                border-top: 1px solid var(--blight);
                z-index: 80;
            }

            .product-grid-wrap {
                padding-bottom: 52vh;
            }
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-brand">
            <div class="brand-icon">POS</div>
            <strong>PointSales</strong>
            <span>· Modul Kasir</span>
        </div>
        <div class="topbar-mid">
            <div class="session-info"><span class="live-dot"></span> Sesi Aktif · Athaulla Hafizh · Shift Pagi</div>
        </div>
        <div class="topbar-right">
            <div class="live-clock" id="clock">--:--:--</div>
            <div class="btn-top" onclick="holdOrder()" title="Tahan Pesanan"><i class="fa-solid fa-pause"></i> Tahan
            </div>
            <a href="/" class="btn-top"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
            <div class="btn-top danger" onclick="endShift()"><i class="fa-solid fa-right-from-bracket"></i> Akhiri Shift
            </div>
        </div>
    </div>

    <div class="pos-layout">

        <!-- ── LEFT: PRODUCTS ── -->
        <div class="panel-left">
            <div class="panel-toolbar">
                <div class="search-wrap">
                    <i class="fa-solid fa-barcode"></i>
                    <input type="text" id="searchInput" placeholder="Cari nama, kode, atau scan barcode…"
                        onkeyup="renderProducts()" autofocus>
                </div>
                <div class="cat-tabs" id="catTabs">
                    <button class="cat-tab active" onclick="setcat('all',this)">Semua</button>
                    <button class="cat-tab" onclick="setcat('food',this)">🍔 Food</button>
                    <button class="cat-tab" onclick="setcat('beauty',this)">💄 Beauty</button>
                    <button class="cat-tab" onclick="setcat('home',this)">🏠 Home</button>
                    <button class="cat-tab" onclick="setcat('baby',this)">🍼 Baby</button>
                </div>
            </div>
            <div class="product-grid-wrap">
                <div class="product-grid" id="prodGrid"></div>
            </div>
        </div>

        <!-- ── RIGHT: RECEIPT ── -->
        <div class="panel-right">
            <!-- Customer -->
            <div class="cust-bar">
                <div class="cust-wrap">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="custName" placeholder="Nama pelanggan (opsional)…">
                </div>
                <div class="txn-badge" id="txnId">#TXN-001</div>
            </div>

            <!-- Receipt header -->
            <div class="receipt-top">
                <div class="receipt-cols">
                    <span>Produk</span>
                    <span>Qty × Harga</span>
                    <span>Subtotal</span>
                    <span>Aksi</span>
                </div>
            </div>

            <!-- Cart -->
            <div class="cart-wrap" id="cartWrap">
                <div class="cart-empty">
                    <div class="ico">🛒</div>
                    <p>Belum ada produk.<br>Klik produk atau scan barcode.</p>
                </div>
            </div>

            <!-- Discount & Note -->
            <div class="discount-bar">
                <label><i class="fa-solid fa-percent"></i> Diskon</label>
                <div class="disc-wrap">
                    <input type="number" id="discInput" placeholder="0" min="0" max="100" oninput="calcSummary()">
                    <span>%</span>
                </div>
                <div class="note-wrap">
                    <i class="fa-solid fa-note-sticky"></i>
                    <input type="text" id="noteInput" placeholder="Catatan…">
                </div>
            </div>

            <!-- Summary -->
            <div class="summary-wrap" id="summaryWrap" style="display:none;">
                <div class="sum-row"><span>Subtotal</span><span id="sumSub">Rp 0</span></div>
                <div class="sum-row disc-row" id="discRow" style="display:none;"><span id="discLabel">Diskon
                        (0%)</span><span id="discAmt">-Rp 0</span></div>
                <div class="sum-row" id="taxRow"><span id="taxLabel">PPN (11%)</span><span id="taxAmt">Rp 0</span></div>
                <div class="sum-row total"><span>Total Bayar</span><span id="sumTotal">Rp 0</span></div>
            </div>

            <!-- Payment -->
            <div class="payment-wrap">
                <div class="pm-label">Metode Pembayaran</div>
                <div class="pm-grid">
                    <div class="pm-btn active" onclick="selectPM(this,'tunai')">💵 Tunai</div>
                    <div class="pm-btn" onclick="selectPM(this,'debit')">💳 Debit</div>
                    <div class="pm-btn" onclick="selectPM(this,'qris')">📱 QRIS</div>
                    <div class="pm-btn" onclick="selectPM(this,'transfer')">🏦 Transfer</div>
                </div>

                <!-- Cash change calculator -->
                <div class="cash-row show" id="cashRow">
                    <div class="cash-input-wrap">
                        <span>Rp</span>
                        <input type="number" id="cashInput" placeholder="0" oninput="calcChange()" style="width:100%;">
                    </div>
                    <div class="change-badge" id="changeBadge">Kembalian: —</div>
                </div>
                <div class="quick-cash" id="quickCash">
                    <span style="font-size:.65rem;color:var(--tm);align-self:center;margin-right:.2rem;">Uang
                        pas:</span>
                    <button class="qc-btn" onclick="setQuickCash(5000)">5K</button>
                    <button class="qc-btn" onclick="setQuickCash(10000)">10K</button>
                    <button class="qc-btn" onclick="setQuickCash(20000)">20K</button>
                    <button class="qc-btn" onclick="setQuickCash(50000)">50K</button>
                    <button class="qc-btn" onclick="setQuickCash(100000)">100K</button>
                </div>

                <button class="btn-checkout" id="checkoutBtn" onclick="openCheckout()" disabled>
                    <i class="fa-solid fa-bolt"></i> Proses Transaksi
                </button>
                <button class="btn-clear" onclick="clearCart()">
                    <i class="fa-solid fa-trash"></i> Kosongkan Struk
                </button>
            </div>
        </div>
    </div>

    <!-- ── RECEIPT MODAL ── -->
    <div class="modal-overlay" id="receiptModal">
        <div class="modal">
            <div class="receipt-print" id="receiptPrint"></div>
            <div class="modal-btns">
                <button class="modal-btn" onclick="printReceipt()"><i class="fa-solid fa-print"></i> Cetak
                    Struk</button>
                <button class="modal-btn primary" onclick="nextTransaction()"><i class="fa-solid fa-forward"></i>
                    Transaksi Baru</button>
            </div>
        </div>
    </div>

    <!-- ── SHIFT SUMMARY MODAL ── -->
    <div class="modal-overlay" id="shiftModal">
        <div class="modal" style="width:420px;">
            <div style="text-align:center;margin-bottom:1.5rem;">
                <div style="font-size:2.5rem;margin-bottom:.5rem;">📋</div>
                <h3 style="font-size:1.15rem;font-weight:900;">Ringkasan Shift</h3>
                <p style="font-size:.78rem;color:var(--ts);margin-top:.25rem;">Shift Pagi · 07:00 – <span
                        id="shiftEndTime"></span> WIB</p>
            </div>
            <div
                style="background:var(--bg2);border:1px solid var(--border);border-radius:12px;padding:1.1rem 1.25rem;margin-bottom:1rem;">
                <div
                    style="display:flex;justify-content:space-between;font-size:.8rem;color:var(--ts);padding:.4rem 0;border-bottom:1px solid var(--border);">
                    <span>Kasir</span><span style="color:var(--tp);font-weight:600;">Athaulla Hafizh</span>
                </div>
                <div
                    style="display:flex;justify-content:space-between;font-size:.8rem;color:var(--ts);padding:.4rem 0;border-bottom:1px solid var(--border);">
                    <span>Total Transaksi</span><span style="color:var(--tp);font-weight:700;"
                        id="shiftTxnCount">0</span>
                </div>
                <div
                    style="display:flex;justify-content:space-between;font-size:.8rem;color:var(--ts);padding:.4rem 0;border-bottom:1px solid var(--border);">
                    <span>Total Item Terjual</span><span style="color:var(--tp);font-weight:700;"
                        id="shiftItemCount">0</span>
                </div>
                <div
                    style="display:flex;justify-content:space-between;font-size:.8rem;color:var(--ts);padding:.4rem 0;border-bottom:1px solid var(--border);">
                    <span>Total Pendapatan</span><span style="color:var(--tp);font-weight:700;" id="shiftRevenue">Rp
                        0</span>
                </div>
                <div
                    style="display:flex;justify-content:space-between;font-size:.8rem;color:var(--ts);padding:.4rem 0;">
                    <span>Total PPN Dikumpulkan</span><span style="color:var(--tp);font-weight:700;" id="shiftTax">Rp
                        0</span>
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
                <button class="modal-btn" onclick="document.getElementById('shiftModal').classList.remove('open')"><i
                        class="fa-solid fa-arrow-left"></i> Kembali</button>
                <button class="modal-btn primary" onclick="confirmEndShift()"><i
                        class="fa-solid fa-right-from-bracket"></i> Akhiri Shift</button>
            </div>
        </div>
    </div>

    <!-- ── SETTINGS MODAL ── -->
    <div class="modal-overlay" id="settingsModal">
        <div class="modal" style="width:400px;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
                <h3 style="font-size:1rem;font-weight:800;"><i class="fa-solid fa-gear"
                        style="margin-right:.4rem;color:var(--ts);"></i>Pengaturan Toko</h3>
                <button onclick="document.getElementById('settingsModal').classList.remove('open')"
                    style="background:none;border:none;cursor:pointer;color:var(--ts);font-size:1.1rem;"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div style="margin-bottom:.85rem;">
                <label
                    style="font-size:.72rem;color:var(--ts);text-transform:uppercase;letter-spacing:.07em;font-weight:700;display:block;margin-bottom:.4rem;">Nama
                    Toko</label>
                <input id="st-name" type="text" value="PointSales Store"
                    style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;">
            </div>
            <div style="margin-bottom:.85rem;">
                <label
                    style="font-size:.72rem;color:var(--ts);text-transform:uppercase;letter-spacing:.07em;font-weight:700;display:block;margin-bottom:.4rem;">Alamat</label>
                <input id="st-addr" type="text" value="Jl. Contoh No.1, Jakarta"
                    style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;">
            </div>
            <div style="margin-bottom:.85rem;">
                <label
                    style="font-size:.72rem;color:var(--ts);text-transform:uppercase;letter-spacing:.07em;font-weight:700;display:block;margin-bottom:.4rem;">Telepon</label>
                <input id="st-phone" type="text" value="(021) 000-0000"
                    style="width:100%;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;">
            </div>
            <div style="margin-bottom:1.1rem;">
                <label
                    style="font-size:.72rem;color:var(--ts);text-transform:uppercase;letter-spacing:.07em;font-weight:700;display:block;margin-bottom:.4rem;">Tarif
                    Pajak (PPN)</label>
                <div style="display:flex;align-items:center;gap:.5rem;">
                    <input id="st-tax" type="number" value="11" min="0" max="100"
                        style="flex:1;background:var(--bg2);border:1px solid var(--border);border-radius:8px;padding:.5rem .85rem;color:var(--tp);font-size:.83rem;font-family:inherit;outline:none;">
                    <span style="font-size:.82rem;color:var(--ts);">%</span>
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem;">
                <button class="modal-btn"
                    onclick="document.getElementById('settingsModal').classList.remove('open')">Batal</button>
                <button class="modal-btn primary" onclick="saveSettings()"><i class="fa-solid fa-floppy-disk"></i>
                    Simpan</button>
            </div>
        </div>
    </div>

    <!-- ── HOLD MODAL ── -->
    <div class="modal-overlay" id="holdModal">
        <div class="modal" style="text-align:center;">
            <div style="font-size:2.5rem;margin-bottom:.75rem;">⏸️</div>
            <h3 style="font-size:1.1rem;font-weight:800;margin-bottom:.4rem;">Pesanan Ditahan</h3>
            <p style="font-size:.82rem;color:var(--ts);margin-bottom:1.25rem;line-height:1.6;">Pesanan saat ini telah
                disimpan sementara. Anda dapat melanjutkan kapan saja.</p>
            <button class="modal-btn primary" style="width:100%;"
                onclick="document.getElementById('holdModal').classList.remove('open')"><i class="fa-solid fa-play"></i>
                Lanjutkan Pesanan</button>
        </div>
    </div>

    <script>
        // ── PRODUCTS DATA ──
        const PRODUCTS = [
            { id: 'FB001', name: 'Teh Botol Sosro', cat: 'food', emoji: '🥤', price: 5000, barcode: '8999999001', stock: 85 },
            { id: 'FB002', name: 'Kopi Good Day', cat: 'food', emoji: '☕', price: 3500, barcode: '8999999002', stock: 120 },
            { id: 'FB003', name: 'Indomie Goreng', cat: 'food', emoji: '🍜', price: 4000, barcode: '8999999003', stock: 200 },
            { id: 'FB004', name: 'Oreo Original', cat: 'food', emoji: '🍪', price: 15000, barcode: '8999999004', stock: 60 },
            { id: 'FB005', name: 'Susu Ultra Milk', cat: 'food', emoji: '🥛', price: 6000, barcode: '8999999005', stock: 95 },
            { id: 'FB006', name: 'Aqua Galon', cat: 'food', emoji: '🌊', price: 22000, barcode: '8999999006', stock: 40 },
            { id: 'FB007', name: 'Chitato Original', cat: 'food', emoji: '🍿', price: 12000, barcode: '8999999007', stock: 55 },
            { id: 'FB008', name: 'SilverQueen Almond', cat: 'food', emoji: '🍫', price: 18000, barcode: '8999999008', stock: 30 },
            { id: 'BH001', name: 'Handbody Vaseline', cat: 'beauty', emoji: '🧴', price: 28000, barcode: '8999998001', stock: 45 },
            { id: 'BH002', name: 'Pepsodent 190gr', cat: 'beauty', emoji: '🪥', price: 15500, barcode: '8999998002', stock: 70 },
            { id: 'BH003', name: 'Sabun Lifebuoy', cat: 'beauty', emoji: '🧼', price: 7000, barcode: '8999998003', stock: 80 },
            { id: 'BH004', name: 'Tolak Angin', cat: 'beauty', emoji: '🌿', price: 3500, barcode: '8999998004', stock: 150 },
            { id: 'BH005', name: 'Paracetamol 500mg', cat: 'beauty', emoji: '💊', price: 5000, barcode: '8999998005', stock: 200 },
            { id: 'BH006', name: "Pond's White Beauty", cat: 'beauty', emoji: '🧽', price: 22000, barcode: '8999998006', stock: 35 },
            { id: 'BH007', name: 'Shampoo Clear Men', cat: 'beauty', emoji: '🫧', price: 19000, barcode: '8999998007', stock: 50 },
            { id: 'HC001', name: 'Sapu Lantai Premium', cat: 'home', emoji: '🧹', price: 35000, barcode: '8999997001', stock: 20 },
            { id: 'HC002', name: 'Rinso Anti Noda', cat: 'home', emoji: '🫧', price: 22500, barcode: '8999997002', stock: 55 },
            { id: 'HC003', name: 'Sunlight Jeruk', cat: 'home', emoji: '✨', price: 16000, barcode: '8999997003', stock: 65 },
            { id: 'HC004', name: 'Wipol Pembersih', cat: 'home', emoji: '🚿', price: 18000, barcode: '8999997004', stock: 40 },
            { id: 'HC005', name: 'Baygon Semprot', cat: 'home', emoji: '🐛', price: 32000, barcode: '8999997005', stock: 28 },
            { id: 'HC006', name: 'Glade Pengharum', cat: 'home', emoji: '🪴', price: 25000, barcode: '8999997006', stock: 35 },
            { id: 'BK001', name: 'Pampers Prem. M', cat: 'baby', emoji: '🧷', price: 95000, barcode: '8999996001', stock: 25 },
            { id: 'BK002', name: "Johnson's Baby Wash", cat: 'baby', emoji: '🛁', price: 32000, barcode: '8999996002', stock: 40 },
            { id: 'BK003', name: 'Botol Susu Pigeon', cat: 'baby', emoji: '🍼', price: 85000, barcode: '8999996003', stock: 18 },
            { id: 'BK004', name: 'Bubur Bayi Cerelac', cat: 'baby', emoji: '🥣', price: 65000, barcode: '8999996004', stock: 30 },
            { id: 'BK005', name: 'Baby Oil Johnson', cat: 'baby', emoji: '🎀', price: 25000, barcode: '8999996005', stock: 50 },
        ];

        let CART = [];
        let currentCat = 'all';
        let txnCounter = 247;
        let selectedPM = 'tunai';
        let totalAmount = 0;
        let TAX_RATE = 11; // PPN %
        // Shift stats
        let shiftTxnCount = 0;
        let shiftItemCount = 0;
        let shiftRevenue = 0;
        let shiftTaxCollected = 0;

        const LS_KEY = 'pos_cart';
        const STOCK_KEY = 'pos_stock';

        // ── STOCK PERSISTENCE ──
        function loadStock() {
            try {
                const saved = JSON.parse(localStorage.getItem(STOCK_KEY) || '{}');
                PRODUCTS.forEach(p => { if (saved[p.id] !== undefined) p.stock = saved[p.id]; });
            } catch (e) { }
        }
        function saveStock() {
            const map = {};
            PRODUCTS.forEach(p => map[p.id] = p.stock);
            localStorage.setItem(STOCK_KEY, JSON.stringify(map));
        }

        function syncCart() {
            localStorage.setItem(LS_KEY, JSON.stringify(
                CART.map(i => ({ id: i.id, qty: i.qty }))
            ));
        }
        function loadCart() {
            try {
                const saved = JSON.parse(localStorage.getItem(LS_KEY) || '[]');
                CART = saved
                    .map(s => { const p = PRODUCTS.find(x => x.id === s.id); return p ? { ...p, qty: s.qty } : null; })
                    .filter(Boolean);
            } catch (e) { CART = []; }
        }

        const fmt = n => 'Rp ' + Math.max(0, n).toLocaleString('id-ID');

        // ── CLOCK ──
        function tickClock() {
            document.getElementById('clock').textContent = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        tickClock(); setInterval(tickClock, 1000);
        document.getElementById('txnId').textContent = '#TXN-' + (++txnCounter).toString().padStart(3, '0');

        // ── RENDER PRODUCTS ──
        function setcat(cat, btn) {
            currentCat = cat;
            document.querySelectorAll('.cat-tab').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            renderProducts();
        }
        function renderProducts() {
            const q = document.getElementById('searchInput').value.toLowerCase().trim();
            const filtered = PRODUCTS.filter(p => {
                const catOk = currentCat === 'all' || p.cat === currentCat;
                const qOk = !q || p.name.toLowerCase().includes(q) || p.barcode.includes(q) || p.id.toLowerCase().includes(q);
                return catOk && qOk;
            });
            const grid = document.getElementById('prodGrid');
            if (!filtered.length) {
                grid.innerHTML = '<p style="color:var(--tm);font-size:.8rem;grid-column:1/-1;text-align:center;padding:2.5rem 1rem;">Produk tidak ditemukan.</p>';
                return;
            }
            grid.innerHTML = filtered.map(p => {
                const low = p.stock <= 20;
                const out = p.stock === 0;
                const stickerCls = out ? 'out' : low ? 'low' : '';
                const stickerTxt = out ? 'Habis' : low ? `Sisa ${p.stock}` : `Stok ${p.stock}`;
                return `<div class="prod-card${out ? ' opacity' : ''}" onclick="${out ? '' : ('addToCart(\'' + p.id + '\')')}" style="${out ? 'opacity:.4;cursor:not-allowed;' : ''}">
            <div class="prod-img">${p.emoji}<span class="prod-sticker ${stickerCls}">${stickerTxt}</span></div>
            <div class="prod-info">
                <div class="prod-name">${p.name}</div>
                <div class="prod-cat">${p.cat}</div>
                <div class="prod-price">${fmt(p.price)}</div>
                <div class="prod-code">${p.barcode}</div>
            </div>
        </div>`;
            }).join('');
        }

        // ── CART ──
        function addToCart(id) {
            const p = PRODUCTS.find(x => x.id === id);
            if (!p || p.stock === 0) return;
            const ex = CART.find(x => x.id === id);
            if (ex) { if (ex.qty < p.stock) ex.qty++; }
            else CART.push({ ...p, qty: 1 });
            syncCart();
            renderCart();
        }
        function changeQty(id, delta) {
            const p = PRODUCTS.find(x => x.id === id);
            const idx = CART.findIndex(x => x.id === id);
            if (idx < 0) return;
            CART[idx].qty = Math.max(0, CART[idx].qty + delta);
            if (CART[idx].qty === 0) CART.splice(idx, 1);
            syncCart();
            renderCart();
        }
        function clearCart() { CART = []; syncCart(); document.getElementById('discInput').value = ''; document.getElementById('noteInput').value = ''; renderCart(); }
        function renderCart() {
            const wrap = document.getElementById('cartWrap');
            if (!CART.length) {
                wrap.innerHTML = '<div class="cart-empty"><div class="ico">🛒</div><p>Belum ada produk.<br>Klik produk atau scan barcode.</p></div>';
                document.getElementById('summaryWrap').style.display = 'none';
                document.getElementById('checkoutBtn').disabled = true;
                calcChange();
                return;
            }
            wrap.innerHTML = CART.map(i => `
        <div class="cart-item">
            <div class="ci-emoji">${i.emoji}</div>
            <div class="ci-info">
                <div class="ci-name">${i.name}</div>
                <div class="ci-unit">${fmt(i.price)} / pcs</div>
            </div>
            <div class="ci-subtotal">${fmt(i.price * i.qty)}</div>
            <div class="qty-ctl">
                <button class="qty-btn del" onclick="changeQty('${i.id}',-1)"><i class="fa-solid fa-minus"></i></button>
                <span class="qty-num">${i.qty}</span>
                <button class="qty-btn" onclick="changeQty('${i.id}',1)"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>`).join('');
            document.getElementById('summaryWrap').style.display = 'block';
            document.getElementById('checkoutBtn').disabled = false;
            calcSummary();
        }
        function calcSummary() {
            const sub = CART.reduce((s, i) => s + i.price * i.qty, 0);
            const disc = Math.min(100, Math.max(0, parseFloat(document.getElementById('discInput').value) || 0));
            const discAmt = Math.round(sub * disc / 100);
            const afterDisc = sub - discAmt;
            const taxAmt = Math.round(afterDisc * TAX_RATE / 100);
            totalAmount = afterDisc + taxAmt;
            document.getElementById('sumSub').textContent = fmt(sub);
            const dr = document.getElementById('discRow');
            if (disc > 0) { dr.style.display = 'flex'; document.getElementById('discLabel').textContent = `Diskon (${disc}%)`; document.getElementById('discAmt').textContent = '-' + fmt(discAmt); }
            else dr.style.display = 'none';
            document.getElementById('taxLabel').textContent = `PPN (${TAX_RATE}%)`;
            document.getElementById('taxAmt').textContent = fmt(taxAmt);
            document.getElementById('sumTotal').textContent = fmt(totalAmount);
            calcChange();
        }
        function calcChange() {
            if (!CART.length) { document.getElementById('changeBadge').textContent = 'Kembalian: —'; document.getElementById('changeBadge').className = 'change-badge'; return; }
            const cash = parseInt(document.getElementById('cashInput').value) || 0;
            const change = cash - totalAmount;
            const el = document.getElementById('changeBadge');
            if (!cash) { el.textContent = 'Kembalian: —'; el.className = 'change-badge'; return; }
            if (change < 0) { el.textContent = `Kurang: ${fmt(Math.abs(change))}`; el.className = 'change-badge neg'; }
            else { el.textContent = `Kembalian: ${fmt(change)}`; el.className = 'change-badge ok'; }
        }
        function setQuickCash(v) {
            const sub = CART.reduce((s, i) => s + i.price * i.qty, 0);
            const disc = parseFloat(document.getElementById('discInput').value) || 0;
            const total = Math.round(sub * (1 - disc / 100));
            let rounded = v;
            while (rounded < total) rounded += v;
            document.getElementById('cashInput').value = rounded;
            calcChange();
        }
        function selectPM(btn, pm) {
            selectedPM = pm;
            document.querySelectorAll('.pm-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const cashRow = document.getElementById('cashRow');
            const quickCash = document.getElementById('quickCash');
            if (pm === 'tunai') { cashRow.classList.add('show'); quickCash.style.display = 'flex'; }
            else { cashRow.classList.remove('show'); quickCash.style.display = 'none'; }
        }

        // ── CHECKOUT ──
        function openCheckout() {
            if (!CART.length) return;
            const sub = CART.reduce((s, i) => s + i.price * i.qty, 0);
            const disc = parseFloat(document.getElementById('discInput').value) || 0;
            const discAmt = Math.round(sub * disc / 100);
            const afterDisc = sub - discAmt;
            const taxAmt = Math.round(afterDisc * TAX_RATE / 100);
            const total = afterDisc + taxAmt;
            const cash = parseInt(document.getElementById('cashInput').value) || 0;
            const change = cash - total;
            const cust = document.getElementById('custName').value.trim() || 'Pelanggan Umum';
            const note = document.getElementById('noteInput').value.trim();
            const nowStr = new Date().toLocaleString('id-ID', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
            const pmLabel = { tunai: 'Tunai', debit: 'Debit', qris: 'QRIS', transfer: 'Transfer' }[selectedPM];
            const settings = JSON.parse(localStorage.getItem('pos_settings') || '{}');
            const storeName = settings.name || 'PointSales Store';
            const storeAddr = settings.addr || 'Jl. Contoh No.1, Jakarta';
            const storePhone = settings.phone || '(021) 000-0000';

            const itemsHtml = CART.map(i => `
        <div class="rp-row">
            <span>${i.name} x${i.qty}</span>
            <span>${fmt(i.price * i.qty)}</span>
        </div>`).join('');

            document.getElementById('receiptPrint').innerHTML = `
        <div class="rp-center">
            <div class="rp-title">${storeName}</div>
            <div style="font-size:.65rem;color:var(--ts);">${storeAddr} · ${storePhone}</div>
            <div style="font-size:.62rem;color:var(--tm);margin-top:.15rem;">Kasir: Athaulla Hafizh · ${pmLabel}</div>
        </div>
        <hr class="rp-divider">
        <div class="rp-row"><span>No. Struk</span><span>${document.getElementById('txnId').textContent}</span></div>
        <div class="rp-row"><span>Pelanggan</span><span>${cust}</span></div>
        <div class="rp-row"><span>Tanggal</span><span>${nowStr}</span></div>
        ${note ? `<div class="rp-row"><span>Catatan</span><span>${note}</span></div>` : ''}
        <hr class="rp-divider">
        ${itemsHtml}
        <hr class="rp-divider">
        <div class="rp-row"><span>Subtotal</span><span>${fmt(sub)}</span></div>
        ${disc > 0 ? `<div class="rp-row" style="color:var(--green)"><span>Diskon (${disc}%)</span><span>-${fmt(discAmt)}</span></div>` : ''}
        <div class="rp-row"><span>PPN (${TAX_RATE}%)</span><span>${fmt(taxAmt)}</span></div>
        <div class="rp-row total-row"><span>TOTAL</span><span>${fmt(total)}</span></div>
        ${selectedPM === 'tunai' ? `
        <hr class="rp-divider">
        <div class="rp-row"><span>Tunai Diterima</span><span>${fmt(cash)}</span></div>
        <div class="rp-change">Kembalian: ${fmt(Math.max(0, change))}</div>
        `: ''}
        <hr class="rp-divider">
        <div class="rp-footer">
            Terima kasih telah berbelanja!<br>
            Powered by PointSales · © 2026 Athaulla Hafizh<br>
            <span style="font-size:.55rem;">Barang yang sudah dibeli tidak dapat dikembalikan.</span>
        </div>`;
            document.getElementById('receiptModal').classList.add('open');
        }
        function printReceipt() {
            const orig = document.body.innerHTML;
            const rp = document.getElementById('receiptPrint').innerHTML;
            document.body.innerHTML = `<div style="font-family:monospace;font-size:12px;padding:16px;max-width:300px;margin:auto;">${rp}</div>`;
            window.print();
            document.body.innerHTML = orig;
            location.reload();
        }
        function nextTransaction() {
            // Accumulate shift stats before clearing
            const sub = CART.reduce((s, i) => s + i.price * i.qty, 0);
            const disc = parseFloat(document.getElementById('discInput').value) || 0;
            const discAmt = Math.round(sub * disc / 100);
            const afterDisc = sub - discAmt;
            const taxAmt = Math.round(afterDisc * TAX_RATE / 100);
            shiftTxnCount++;
            shiftItemCount += CART.reduce((s, i) => s + i.qty, 0);
            shiftRevenue += afterDisc + taxAmt;
            shiftTaxCollected += taxAmt;
            // ── DEDUCT STOCK ──
            CART.forEach(item => {
                const p = PRODUCTS.find(x => x.id === item.id);
                if (p) p.stock = Math.max(0, p.stock - item.qty);
            });
            saveStock();
            document.getElementById('receiptModal').classList.remove('open');
            CART = [];
            syncCart();
            txnCounter++;
            document.getElementById('txnId').textContent = '#TXN-' + txnCounter.toString().padStart(3, '0');
            document.getElementById('custName').value = '';
            document.getElementById('discInput').value = '';
            document.getElementById('noteInput').value = '';
            document.getElementById('cashInput').value = '';
            renderCart();
            renderProducts(); // re-render with updated stock
        }
        function holdOrder() {
            if (!CART.length) { showToast('Tidak ada pesanan untuk ditahan.'); return; }
            localStorage.setItem('pos_held_cart', localStorage.getItem('pos_cart') || '[]');
            document.getElementById('holdModal').classList.add('open');
        }
        function endShift() {
            const now = new Date();
            document.getElementById('shiftEndTime').textContent = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            document.getElementById('shiftTxnCount').textContent = shiftTxnCount;
            document.getElementById('shiftItemCount').textContent = shiftItemCount;
            document.getElementById('shiftRevenue').textContent = fmt(shiftRevenue);
            document.getElementById('shiftTax').textContent = fmt(shiftTaxCollected);
            document.getElementById('shiftModal').classList.add('open');
        }
        function confirmEndShift() {
            document.getElementById('shiftModal').classList.remove('open');
            setTimeout(() => window.location = '/', 400);
        }
        // ── SETTINGS ──
        function loadSettings() {
            try {
                const s = JSON.parse(localStorage.getItem('pos_settings') || '{}');
                if (s.tax !== undefined) { TAX_RATE = s.tax; }
                if (document.getElementById('st-name')) {
                    document.getElementById('st-name').value = s.name || 'PointSales Store';
                    document.getElementById('st-addr').value = s.addr || 'Jl. Contoh No.1, Jakarta';
                    document.getElementById('st-phone').value = s.phone || '(021) 000-0000';
                    document.getElementById('st-tax').value = s.tax !== undefined ? s.tax : 11;
                }
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
            TAX_RATE = s.tax;
            document.getElementById('settingsModal').classList.remove('open');
            if (CART.length) calcSummary();
            alert('✅ Pengaturan disimpan.');
        }

        loadSettings();
        loadStock();
        loadCart();
        renderProducts();
        renderCart();
    </script>
</body>

</html>