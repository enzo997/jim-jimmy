<?php
//============================= GET POST FUNCTION =============================//
//================== Get gallery article ==================//
function get_gallery_article($thisPost){
    $id = $thisPost->ID;
    $title = $thisPost->post_title;
    $image = get_the_post_thumbnail_url($id)?get_the_post_thumbnail_url($id):DF_IMAGE. '/noimage.png';
    $link = get_permalink($id);
    // $terms = get_the_terms( $post->ID, 'publication_category' );
    $data_taxaonomy =  get_the_terms($id, 'categories-gallery');
    ?>
        <div class="gallery--cont-image" data-post_id = "<?php echo $id;?>" data-slug = "<?php echo $data_taxaonomy[0]->slug; ?>">
            <div class="background--hidden"></div>
            <?php 
            $data_taxaonomy =  get_the_terms($thisPost, 'categories-gallery');
                if(check_taxaonomy($data_taxaonomy) == true):
                    ?>
                        <div class="background-360">
                            <div class="content-group">
                                <div class="cont-icon"><img src="<?php echo DF_IMAGE.'/icon-3d.png';?>" alt="icon-3d" /></div>
                                <div class="cont-text">EXPLORE 3D SPACE</div>
                            </div>
                        </div>
                    <?php
                endif;
            ?>
            <a href="<?php echo $link;?>">
                <img src="<?php echo $image;?>" alt="image-work-page"/>
            </a>
        </div>
    <?php
}
//======================= popup ===============================//
//================== AJAX  Fill  ==================//
add_action( 'wp_ajax_fill_by_cat_gallery', 'fill_by_cat_gallery' );
add_action( 'wp_ajax_nopriv_fill_by_cat_gallery', 'fill_by_cat_gallery' );
function fill_by_cat_gallery(){
    $data_term = $_POST['data_term'];
    // $data_limit = $_POST['data_limit'];//common data
    $args = array(
        'post_type'=> 'gallery',
        'orderby'    => 'date',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'order'    => 'DESC',
    );
    if($data_term != 'all'){
        $args['tax_query'] = array( 
            array(
                'taxonomy' => 'categories-gallery',
                'field' => 'slug',
                'terms' => $data_term,
            )
        );
    }
    $posts = get_posts($args);
    if($posts){
        foreach($posts as $key=> $post){
            ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-custom" data = "<?php echo get_the_terms( $post, 'categories-gallery');?>">
            <?php
                get_gallery_article($post);
            ?>
            </div>
            <?php
        }
        // Load more get data form loading_work Function
    //     $count_load = count(get_posts($args));
    //     $args['posts_per_page'] = -1;
    //     $total = count(get_posts($args));
    //     ?>
            <script>
    //         let input = jQuery('.work-page .load-more-ajax');
    //         input.attr('data_page', '2');
    //         if(<?php //echo ($count_load ); ?> >= <?php echo $total; ?>)
    //             input.hide();
    //         else
    //             input.show();
    //     </script>
            <?php
    // }else{
    //     echo 'Not found';
    }
    exit;
}
// AJAX POPUP GALLERY
add_action( 'wp_ajax_fill_by_popup_gallery', 'fill_by_popup_gallery' );
add_action( 'wp_ajax_nopriv_fill_by_popup_gallery', 'fill_by_popup_gallery' );
function fill_by_popup_gallery(){
    $get_id = $_POST['get_id'];
    $get_slug = $_POST['get_slug'];
    $content_gallery = get_field('content_group_gallery',$get_id);
    // var_dump($content_gallery);
    ?>
        <div class="background-black-popup"></div>
        <div class="content-popup">
            <div class="container">
                <div class="content-group-popup">
                    <div class="btn-close-popup"><i class="fas fa-times"></i></div>
                    <div class="content-image-popup">
                    <?php
                    if($get_slug == '360-marquee'){
                        ?>
                            <div id="panorama"></div>
                            <script>
                            pannellum.viewer('panorama', {
                                "type": "equirectangular",
                                "panorama": "https://pannellum.org/images/alma.jpg"
                            });
                            </script>
                        <?php
                    }
                    else{
                        foreach($content_gallery as $i=> $item):
                            $i++;
                            ?>
                                <img src="<?php echo $item['url'];?>" alt="image-post-work"/>
                            <?php
                        endforeach;
                    }?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.btn-close-popup').click(function(){
                $('.popup_ajax').removeClass('show_popup');
            });
            //call slick popup
            $('.popup_ajax .content-image-popup').slick({
                dots: false,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            });
        </script>
    <?php
    exit;
}