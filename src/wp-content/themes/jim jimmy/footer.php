<!-- Footer -->
<footer class="footer" id="footer">
    <div class="container">
        <div class="main-footer">
            <div class="footer--cont-logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_field('logo_header_and_footer','option')['logo_pink']?get_field('logo_header_and_footer','option')['logo_pink']['url']:DF_IMAGE. '/logo-pink.png';?>" alt="logo-pink" />
                </a>
            </div>
            <div class="footer--content-information">
            <?php
                $your_informmation = get_field('your_information','option');
                    $name_link_page = $your_informmation['link_name_of_page']['name'];
                    $link_page = $your_informmation['link_name_of_page']['link']['url'];
                    $company_number = $your_informmation['company_number'];
                    $phone_number = $your_informmation['phone_number'];
                    $email = $your_informmation['email'];
                if($name_link_page || $company_number || $phone_number || $email):?>
                    <ul class="row">
                        <li class="col-lg-3 col-md-4 col-sm-12 col-12"><a href="<?php echo $link_page; ?>"><?php echo $name_link_page;?></a></li>
                        <li class="col-lg-3 col-md-4 col-sm-12 col-12"><a><?php echo $company_number; ?></a></li>
                        <li class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <span title = "tell-to" class="phone-to" data-phone ="<?php $delete = array(' ','(',')','+','-');echo str_replace($delete,'',$phone_number);?>">
                                <?php echo $phone_number; ?>
                            </span>
                        </li>
                        <li class="col-lg-3 col-md-4 col-sm-12 col-12">
                            <span class ="mail-to" title="mail-to"  mail = "<?php echo $email; ?>"><?php echo $email; ?></span>
                        </li>
                    </ul>
                <?php endif;?>
            </div>
        </div>
        <div class="footer--copyright">
            <div class="footer--copyright--col-left"> © 2019 by JimJimmy Ltd</div>
            <div class="footer--copyright--col-right">
                <div class="footer--col-right--cont-social-network">
                    <ul>
                        <?php
                        $icon_social_network = get_field('icon_social_network','option');
                            foreach($icon_social_network as $i=> $item):
                                $i++;
                                $content_group = $item['content_group'];
                                $icon_image = $content_group['icon_image']?$content_group['icon_image']['url']:DF_IMAGE. '/noimage.png';
                                $link_url = $content_group['link_url']?$content_group['link_url']:"Null";
                                ?>
                                    <li><a href="<?php echo $link_url; ?>" target="_brank"><img src="<?php echo $icon_image; ?>" alt="icon-social-network" /></a></li>
                                <?php
                            endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</div>
</body>
</html>