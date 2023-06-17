<?php
defined('ABSPATH') || exit;





function show_paket_tiktok()
{
?>
    <div id="paketpr" class="section">
        <div id="paketwr" class="container">
            <div class="paketheadwr">
                <h2>Harga Paket Akun TikTok</h2>
            </div>
            <div id="paketitemwr">
                <?php
                $pakets = carbon_get_theme_option('paket_titktok');
                foreach ($pakets as $paket) {
                    $stok = $paket['stok_paket'];
                    $nama = $paket['nama_paket'];
                    $harga = $paket['harga_paket'];
                    $deskripsi = $paket['deskripsi_paket'];

                    if ($stok) {
                        $thestok = '<span id="readystock" class="thestock">Ready Stock</span>';
                    } else {
                        $thestok = '<span id="outofstock" class="thestock">Out of Stock</span>';
                    }
                ?>
                    <div class="paket" data-paket="<?php echo $nama; ?>">
                        <div class="logotik"><i class="fa-brands fa-tiktok"></i></div>
                        <div class="pakettop paketcol">
                            <i class="fa-brands fa-tiktok"></i>
                            <h3>
                                <?php echo $nama; ?>
                            </h3>
                        </div>
                        <div class="paketbot paketcol">
                            <?php echo $thestok; ?>
                            <div class="paketbotinner">
                                <?php echo $deskripsi; ?>
                            </div>
                            <div class="paketbtnwr">
                                <?php echo masmon_paket_btn_call(); ?>
                                <?php echo masmon_paket_btn_wa(); ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php
}
