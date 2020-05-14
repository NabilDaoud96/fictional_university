<?php
    get_header();
    while (have_posts()) {
        the_post();
            pageBanner();
        ?>

        <div class="container container--narrow page-section">

            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <!--if we return to Home page
                    <?php /*$id_frontpage = get_option('page_on_front'); */?>
                    <a class="metabox__blog-home-link" href="<?php /*echo get_permalink($id_frontpage)*/?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to <?php /*echo get_the_title($id_frontpage )*/?>
                    </a>-->

                    <!--if we return to Home blog-->
                    <a class="metabox__blog-home-link" href="<?php echo site_url('/blog')?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to Blog Home
                    </a>
                    <span class="metabox__main">
                        posted by <?php echo get_the_author_posts_link()?>
                        on <?php the_time('j F Y / H:i a')?>
                        in <?php echo get_the_category_list(', ')?>
                    </span>
                </p>
            </div>

            <div class="generic-content">
                <?php the_content() ?>
            </div>

        </div>
    <?php }
    get_footer();

?>