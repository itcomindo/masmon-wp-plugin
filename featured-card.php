<?php
defined('ABSPATH') || exit;

function show_featured_card_head()
{
    $fiturcards = carbon_get_theme_option('fiturcard');
    echo '<ul class="fiturcardhead">';
    foreach ($fiturcards as $fiturcard) {
        $fiturcardhead = $fiturcard['fiturcardhead'];
        echo '<li>' . $fiturcardhead . '</li>';
    }
    echo '</ul>';
}


function show_featured_card_lengkap()
{
    $fiturcards = carbon_get_theme_option('fiturcard');
    echo '<div id="fiturcardlengkap" class="section">';
    echo '<div class="container">';
    echo '<div id="fitlengkapwr">';
    foreach ($fiturcards as $fc) {
        $headfit = $fc['fiturcardhead'];
        $contentfit = $fc['fiturcardcontent'];
?>
        <div class="fitlengkap">
            <h3><?php echo $headfit; ?></h3>
            <?php echo $contentfit; ?>
        </div>
    <?php
    }
    echo '</div>';
    ?>
    <div id="btninfeaturedwr">
        <p>Masih ada pertanyaan tentang akun TikTok yang kami tawarkan? Yuk...</p>
        <a href="//api.whatsapp.com/send?phone<?php echo masmon_nomorwa(); ?>&text=Hi%20mau%20tanya%20tentang%20jual%20akun%20TikTok%20dong%20🙏">Chat Aja Dulu 👌</a>
    </div>
<?php
    echo '</div>';
    echo '</div>';
}
