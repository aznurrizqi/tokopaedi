<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tokopaedi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
                if (!Yii::$app->user->isGuest) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Dashboard',  'icon' => 'chart-bar', 'url' => ['dashboard/index']],
                            ['label' => 'Data Master', 'header' => true],
                            ['label' => 'Barang',  'icon' => 'boxes', 'url' => ['product/index']],
                            ['label' => 'Pemasok',  'icon' => 'users', 'url' => ['supplier/index']],
                            ['label' => 'Pelanggan', 'icon' => 'users', 'url' => ['customer/index']],
                            ['label' => 'Transaksi', 'header' => true],
                            ['label' => 'Pembelian', 'icon' => 'shopping-cart', 'url' => ['purchase/index']],
                            ['label' => 'Penjualan', 'icon' => 'shopping-cart', 'url' => ['sale/index']],
                        ],
                    ]);
                }
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>