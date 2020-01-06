<?php
    $slide_quote_section= get_field('slide_quote_section',$id);
    $background_image = $slide_quote_section['background_image']?$slide_quote_section['background_image']['url']:DF_IMAGE.'/noimage.png';
    $slide_quote =$slide_quote_section['slide_quote'];
?>
<section class="slide-text">
    <div class="slide-text--background-image"><img src="<?php echo $background_image;?>" alt="image-behinde-slide" /></div>
    <div class="slide-text--background-color"></div>
    <div class="container">
        <div class="slide-text--content-big-group">
            <div class="slide-text--cont-icon"><img src="<?php echo DF_IMAGE."/Shape.png;"?>"alt="shape" /></div>
            <div class="slide-text--content-group">
                <?php 
                    foreach($slide_quote as $i=> $item):
                        $i++;
                        $slide_quote_group = $item['slide_quote_group'];
                        $quote = $slide_quote_group['quote'];
                        $writer = $slide_quote_group['writer'];
                        if(!empty($quote)):?>
                            <div class="slide-text--content-slide">
                                <div class="content">
                                    <p><?php echo $quote;?></p>
                                    <div class="slider-author"><?php echo $writer;?></div>
                                </div>
                            </div>
                        <?php endif;
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</section>