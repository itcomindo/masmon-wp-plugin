window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {

        // call button
        jQuery('.paketcallbtn').click(function () {
            var urlphone = jQuery(this).attr('data-phone');
            window.open('tel:' + urlphone);
        });
        // chat whatsapp button
        jQuery('.paketwabtn').click(function () {
            var namepaket = jQuery(this).closest('[data-paket]').attr('data-paket');
            // replace space with %20
            var namepaket = namepaket.replace(/ /g, '%20');
            var namepaket = 'Hallo%20Mau%20Tanya%20Paket%20TikTok%20' + namepaket + '%20dong';
            var urlphone = jQuery(this).attr('data-wa');
            window.open('https://api.whatsapp.com/send?phone=' + urlphone + '&text=' + namepaket);
        });


        /**
        =========================
        *NAME: play flickity to id #testiphoto
        *=========================
        */

        jQuery('#testiphoto').flickity({
            // options
            cellAlign: 'center',
            contain: true,
            wrapAround: true,
            autoPlay: 3000,
            prevNextButtons: false,
            pageDots: false,
            pauseAutoPlayOnHover: true,
            // enbale lazyload
            lazyLoad: true,
            // enable drag
            draggable: true,
        });



    });
});