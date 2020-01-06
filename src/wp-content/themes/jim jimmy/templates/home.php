<?php
/* Template Name: Home page */
$id = get_queried_object()->ID;
get_header();
?>
<main class="home-page">
    <section class="home-page--banner-top">
        <?php
            $Banner_Top = get_field('banner_top', $id);
            $poster_video = $Banner_Top['poster_for_video']?$Banner_Top['poster_for_video']['url']:DF_IMAGE. '/noimage.png';
            $video = $Banner_Top['video']?$Banner_Top['video']['url']:DF_IMAGE. '/Marquee-Homepage-22mb.mp4';
            $title_banner = $Banner_Top['title']?$Banner_Top['title']:"Beautiful Marquees for Hire";
            $Description_banner = $Banner_Top['description']?$Banner_Top['description']:"No Data";
            $btn_view_marquees = $Banner_Top['button_view_marquees'];
        ?>
        <div class="home-page--banner-top--background-full-screen">
            <video playsinline="" autoplay="" muted="" loop="" poster="<?php echo $poster_video;?>">
                <source src="<?php echo $video;?>" type="video/mp4" />
            </video>
            <div class="home-page--banner-top--content">
                <div class="home-page--content-h1">
                    <h1 class="home-page--banner-top--content--title-h1"><?php echo $title_banner;?></h1>
                </div>
                <div class="home-page--banner-top--content--description">
                    <p><?php echo $Description_banner; ?></p>
                </div>
                <div class="btn-view-marquees"> <a href="<?php echo $btn_view_marquees;?>">VIEW MARQUEES</a></div>
            </div>
        </div>
    </section>
    <section class="home-page--about-us">
        <div class="home-page--about-us--image-behinde-section"><img src="<?php echo DF_IMAGE. '/inage-behinde.png'?>" alt="inage-behinde" /></div>
        <div class="container">
            <div class="home-page--about-us--content-group">
                <?php
                    $col_left = get_field('about_us',$id)['col_left'];
                        $title_about = $col_left['title']?$col_left['title']:"About Us";
                        $description_about = $col_left['description']?$col_left['description']:"No Data";
                        $btn_read_more = $col_left['button_read_more']?$col_left['button_read_more']:"Null";
                    $col_right = get_field('about_us',$id)['col_right'];
                        $image_about = $col_right['image_description']?$col_right['image_description']['url']:DF_IMAGE. '/noimage.png';
                ?>
                <div class="home-page--about-us--col-left">
                    <div class="home-page--about-us--cont">
                        <h4 class="home-page--about-us--title-h4"><?php echo $title_about;?></h4>
                        <div class="line-under"></div>
                        <div class="home-page--about-us--description">
                            <p><?php echo $description_about; ?></p>
                        </div><a href="<?php echo $btn_read_more?>">
                            <div class="btn-read-more">READ MORE</div>
                        </a>
                    </div>
                </div>
                <div class="home-page--about-us--col-right">
                    <div class="home-page--about-us--cont-image"><img src="<?php echo $image_about; ?>" alt="about" /></div>
                </div>
            </div>
        </div>
    </section>
    <?php
        $our_marquees = get_field('our_marquees',$id);
        $title_our_marquees = $our_marquees['title'];
        $button_view_all = $our_marquees['button_view_all'];
        // var_dump($button_view_all);
        $Show_post= $our_marquees['the_post_you_want_to_show_or_default'];
        if($Show_post['select_or_default'] == 0){
            $args = array(
                'post_type'   => 'our-marquees',
                'orderby'          => 'date',
                'post_status'      => 'publish',
                'posts_per_page'   => 3,
                'order'            => 'DESC',
            );
            $lang_posts = new WP_Query($args);
            $posts = $lang_posts->posts;
        } else{
            $posts = $Show_post['the_post_you_want_to_show'];
        }  
        // var_dump($posts);
    if(!empty($posts)):?>
        <section class="home-page--our-marquees">
            <div class="home-page--our-marquees--image-behinde-section"><img src="<?php echo DF_IMAGE.'/image-behinde-1.png'?> " alt="inage-behinde" /></div>
            <div class="container">
                <div class="home-page--our-marquees--cont-group">
                    <a href="<?php echo $button_view_all;?>">
                        <div class="btn-view-all">VIEW ALL</div>
                    </a>
                    <h4 class="our-marquees--title-h4"><?php echo $title_our_marquees;?></h4>
                    <div class="line-under"></div>
                    <div class="home-page--our-marquess--slick">
                        <?php
                            foreach($posts as $i=> $post):
                                $i++;
                                $img = get_the_post_thumbnail_url($post->post_id)?get_the_post_thumbnail_url($post->post_id):DF_IMAGE. '/noimage.png';
                                ?>
                                    <div class="row row-custom-<?php echo $i;?> row-custom">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <div class="home-page--our-marquees--cont-image">
                                                <a href="<?php echo get_permalink($post->post_id);?>" title= "<?php echo $post->post_title;?>">
                                                    <img src="<?php echo $img; ?>" alt="wills" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <div class="home-page--our-marquees--cont-group-box">
                                                <h5 class="home-page--our-marquees--title-h5"><?php echo $post->post_title;?></h5>
                                                <div class="home-page--our-marquees--descripton">
                                                    <p><?php echo $post->post_excerpt;?></p>
                                                </div><a href="<?php echo get_permalink($post->post_id);?>">
                                                    <div class="btn-view-detail">VIEW DETAIL</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="gallery">
        <div class="container">
            <h4 class="gallery-title-h4">Gallery</h4>
            <div class="line-under"></div>
            <div class="gallery--main-nav-menu">
                <ul>
                    <li class ="active" data-term = "all">ALL</li>
                    <?php 
                    $args = array(
                        'hide_empty' => false,
                        'orderby'    => "ID",
                        'order'      => 'ASC'
                    );
                    $terms = get_terms('categories-gallery', $args); 
                    if($terms){
                        foreach($terms as $term){
                            echo '<li data-term="'.$term->name.'">'.$term->name.'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php
                $paged =  get_query_var('paged')?get_query_var('paged'):1;
                $args = array(
                    'post_type'=> 'gallery',
                    'orderby'    => 'date',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'order'    => 'DESC',
                    'tax_query' => array( 
                        array(
                            'taxonomy' => 'categories-gallery',
                            'field' => 'term_id',
                            'terms' => 'data-term'
                        )
                    )
                );
                $posts = get_posts($args);
            ?>
            <div class="gallery--content-group">
                <div class="row row-custom">
                <?php
                    foreach($posts as $key=> $post):
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-custom">
                            <?php  get_gallery_article($post); ?>
                        </div>
                    <?php endforeach; ?>
                </div><a href="<?php echo get_field('gallery',$id)['button_view_more'];?>">
                    <div class="btn-view-more">VIEW MORE</div>
                </a>
            </div>
        </div>
    </section>
    <!-- section popup -->
    <section class="popup_ajax">
        <!-- waiting ajax -->
    </section>
    <!-- end section popup -->
    <!-- section slide quote -->
    <?php require THEME_PATH.'/template-parts/slide-quote.php'?>
    <!-- end section slide quote -->

    <!-- section instagram -->
    <?php require THEME_PATH.'/template-parts/Instagram.php'?>
    <!-- end section instagram -->
</main>
<?php get_footer();