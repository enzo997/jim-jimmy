<?php
/* Template Name: Gallery page */
$id = get_queried_object()->ID;
get_header();
?>
<main class="gallery-page">
    <!-- section banner-common -->
    <?php require THEME_PATH.'/template-parts/Banner-common.php'?>
    <!-- end section banner-common -->

</main>
<?php get_footer();