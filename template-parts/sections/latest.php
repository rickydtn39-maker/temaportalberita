<section class="gn-section gn-latest">

    <header class="gn-section__header">

        <div>

            <h2 class="gn-section__title">

                Berita Terbaru

            </h2>

            <p class="gn-section__description">

                Berita terbaru yang telah diterbitkan.

            </p>

        </div>

        <div class="gn-section__action">

            <a href="#">

                Lihat Semua →

            </a>

        </div>

    </header>

    <div class="gn-grid gn-grid-3">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <article class="gn-card">

                    <a class="gn-card__image" href="<?php the_permalink(); ?>">

                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        }
                        ?>

                    </a>

                    <div class="gn-card__body">

                        <?php
                        $categories = get_the_category();

                        if (!empty($categories)) :
                        ?>

                            <span class="gn-card__badge">

                                <?php echo esc_html($categories[0]->name); ?>

                            </span>

                        <?php endif; ?>

                        <h3 class="gn-card__title">

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h3>

                        <div class="gn-card__meta">

                            <span><?php echo esc_html(get_the_date()); ?></span>

                            <span><?php the_author(); ?></span>

                        </div>

                    </div>

                </article>

            <?php endwhile; ?>

        <?php else : ?>

            <p>Belum ada artikel.</p>

        <?php endif; ?>

    </div>

</section>