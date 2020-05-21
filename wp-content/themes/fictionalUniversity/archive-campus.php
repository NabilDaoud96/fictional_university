<?php
get_header();
pageBanner(array(
    'title' => 'All Campuses',
    'subtitle' => 'We have serval conveniently located campuses.',
))
?>

    <div class="container container--narrow page-section">
        <div class="acf-map">
            <?php while (have_posts()) {
                the_post();
                $mapLocation = get_field('map_location')
            ?>
                <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                <div <?php echo $mapLocation ?>></div>
            <?php }
            ?>
        </div>
    </div>
<?php get_footer();
?>