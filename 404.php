<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="site-main">

    <div class="container">

        <section class="error-404">

            <span class="error-code">

                404

            </span>

            <h1>

                Halaman Tidak Ditemukan

            </h1>

            <p>

                Maaf, halaman yang Anda cari tidak tersedia atau sudah dipindahkan.

            </p>

            <a class="error-button" href="<?php echo esc_url(home_url('/')); ?>">

                Kembali ke Beranda

            </a>

        </section>

    </div>

</main>

<?php get_footer(); ?>