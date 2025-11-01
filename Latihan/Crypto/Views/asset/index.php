<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Portfolio Dashboard</title>
    <link rel="stylesheet" href="../views/asset/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php
        $view = isset($_GET['view']) ? $_GET['view'] : '';
    ?>
</head>
<body>
    <header>
        <h1>Crypto Portfolio Dashboard</h1>
    </header>
    
    <main>
        <div class="cards-grid" style="text-decoration: none;">
            <!-- Baris Atas: 3 Cards (merata) -->
            <div class="row-top">
                <a href="index.php?view=exchange" class="card" style="text-decoration: none;">
                    <div class="card-icon">
                    <i class="fas fa-gear   "></i>
                    </div>
                    <h2 style="text-decoration: none;">Exchange</h2>
                    <p style="text-decoration: none;">Kelola data Exchange</p>
                </a>
                
                <a href="index.php?view=portofolios" class="card" style="text-decoration: none;">
                    <div class="card-icon">
                    <i class="fas fa-briefcase"></i>
                    </div>
                    <h2 style="text-decoration: none;">Portfolios</h2>
                    <p style="text-decoration: none;">Kelola portofolio aset</p>
                </a>
                
                <a href="index.php?view=crypto_assets" class="card" style="text-decoration: none;">
                    <div class="card-icon">
                    <i class="fas fa-coins"></i>
                    </div>
                    <h2 style="text-decoration: none;">Crypto Assets</h2>
                    <p style="text-decoration: none;">Kelola aset kripto</p>
                </a>
            </div>
            
            <!-- Baris Bawah: 2 Cards (terpusat di tengah) -->
            <div class="row-bottom">
                <a href="index.php?view=asset_categories" class="card" style="text-decoration: none;">
                    <div class="card-icon">
                    <i class="fas fa-tags"></i>
                    </div>
                    <h2 style="text-decoration: none;">Asset Categories</h2>
                    <p style="text-decoration: none;">Kelola kategori aset</p>
                </a>
                
                <a href="index.php?view=transactions" class="card" style="text-decoration: none;">
                    <div class="card-icon">
                    <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h2 style="text-decoration: none;">Transactions</h2>
                    <p style="text-decoration: none;">Kelola transaksi</p>
                </a>
            </div>
        </div>
    </main>
    
    <footer>
        <p>&copy; 2023 Crypto Portfolio Asset. All rights reserved.</p>
    </footer>
</body>
</html>