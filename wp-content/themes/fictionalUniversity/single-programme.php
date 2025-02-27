<?php
    get_header();
    while (have_posts()) {
        the_post();
            pageBanner();
        ?>

        <div class="container container--narrow page-section">

            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('programme')?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to Programs Home
                    </a>
                    <span class="metabox__main">
                                <?php the_title() ?>
                            </span>
                </p>
            </div>

            <div class="generic-content">
                <?php the_content() ?>
            </div>

            <?php
            $relatedProfessors = new WP_Query(array(
                'post_type' => 'professor ',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"',
                    ),
                ),
            ));
            if ($relatedProfessors->have_posts()) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">' .  get_the_title() . ' Professors </h2>';

                echo '<ul class="professor-cards">';
                while ($relatedProfessors->have_posts()) {
                    $relatedProfessors->the_post(); ?>
                    <li class="professor-card__list-item">
                        <a class="professor-card" href="<?php echo get_the_permalink()?>">
                            <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape') ?>">
                            <span class="professor-card__name"><?php the_title() ?></span>
                        </a>
                    </li>
                <?php }
                echo '</ul>';
            };

            wp_reset_postdata();

            $today = date('Ymd');
            $homePageEvents = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 2,
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric',
                    ),
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"',
                    ),
                ),
            ));
            if ($homePageEvents->have_posts()) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium"> Upcoming ' . get_the_title() . ' Events </h2>';

                while ($homePageEvents->have_posts()) {
                    $homePageEvents->the_post();
                    get_template_part('template-parts/content',get_post_type());
                }
            };

            wp_reset_postdata();

            $relatedCampus = get_field('related_campus');
            if ($relatedCampus) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">' . get_the_title() . 'available at these campuses</h2>';
                echo '<ul class = "link-list min-list">';
                foreach ($relatedCampus as $campus) { ?>
                    <li><a href="<?php echo get_the_permalink($campus)?>"><?php echo get_the_title($campus) ?></a></li>
                <?php }
                echo '</ul>';
            }
            ?>
        </div>
    <?php }
    get_footer();
?>