<?php  
if(!function_exists('newsjack_frontpage_editor_post_section')):

/**
*
* @since Newsjack
*
*
*/
  function newsjack_frontpage_editor_post_section()
    {

        if(is_front_page() || is_home())
        { 
         $number_of_posts = '2';
         $newsup_editor_news_category = newsup_get_option('select_editor_news_category');
         $newsup_all_posts_main = newsup_get_posts($number_of_posts, $newsup_editor_news_category);
        ?>

        <div class="col-md-3">
            
            
               
                        <?php if ($newsup_all_posts_main->have_posts()) :
                        while ($newsup_all_posts_main->have_posts()) : $newsup_all_posts_main->the_post();
                        global $post;
                        $newsup_url = newsup_get_freatured_image_url($post->ID, 'newsup-slider-full'); ?>
                        <div class="mg-blog-post lg mins back-img mr-bot30" style="background-image: url('<?php echo esc_url($newsup_url); ?>'); ">
                                        <a class="link-div" href="<?php the_permalink(); ?>"> </a>
                                    <article class="bottom">
                                        <div class="mg-blog-category"> <?php newsup_post_categories(); ?> </div>
                                        <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php newsup_post_meta(); ?>
                                    </article>
                                </div>
                        
                        
                            
                        <?php
    endwhile;
endif;
wp_reset_postdata();
?>
                        
                   
        </div>
       <?php }
    }

endif;

add_action('newsjack_action_front_page_editor_section', 'newsjack_frontpage_editor_post_section', 30);


//Front Page Banner
if (!function_exists('newsjack_front_page_banner_section')) :
    /**
     *
     * @since Newsjack
     *
     */
    function newsjack_front_page_banner_section()
    {
        if (is_front_page() || is_home()) {
        $newsup_enable_main_slider = newsup_get_option('show_main_news_section');
        $select_vertical_slider_news_category = newsup_get_option('select_vertical_slider_news_category');
        $vertical_slider_number_of_slides = newsup_get_option('vertical_slider_number_of_slides');
        $all_posts_vertical = newsup_get_posts($vertical_slider_number_of_slides, $select_vertical_slider_news_category);
        if ($newsup_enable_main_slider):  

            $main_banner_section_background_image = newsup_get_option('main_banner_section_background_image');
            $main_banner_section_background_image_url = wp_get_attachment_image_src($main_banner_section_background_image, 'full');
        if(!empty($main_banner_section_background_image)){ ?>
            <section class="mg-fea-area over" style="background-image:url('<?php echo esc_url($main_banner_section_background_image_url[0]); ?>');">
        <?php }else{ ?>
            <section class="mg-fea-area">
        <?php  } ?>
            <div class="overlay">
                <div class="container-fluid">
                    <div class="row">
                        <?php do_action('newsjack_action_front_page_editor_section');?>
                        <div class="col-md-6">
                            <div id="homemain"class="homemain owl-carousel"> 
                                <?php newsup_get_block('list', 'banner'); ?>
                            </div>
                        </div> 
                        <?php do_action('newsjack_action_front_page_trending_section');?>
                    </div>
                </div>
            </div>
        </section>
        <!--==/ Home Slider ==-->
        <?php endif; ?>
        <!-- end slider-section -->
        <?php }
    }
endif;
add_action('newsjack_action_front_page_main_section_1', 'newsjack_front_page_banner_section', 40);

if (!function_exists('newsjack_front_page_top_post_section')) :
    /**
     *
     * @since newsjack
     *
     */
    function newsjack_front_page_top_post_section() { 
    if(is_front_page() || is_home())
    { ?>
<div class="container-fluid">
         <div class="row no-gutter px-3">
      <?php $number_of_posts_slider_recent_post = '4';
            $select_newsjack_top_recent_post = newsup_get_option('select_newsjack_top_recent_post');
            $newsjack_all_posts_main = newsup_get_posts($number_of_posts_slider_recent_post, $select_newsjack_top_recent_post);
  
  if ($newsjack_all_posts_main->have_posts()) :
        $i=1;
        while ($newsjack_all_posts_main->have_posts()) : $newsjack_all_posts_main->the_post();
        global $post;
        $newsup_url = newsup_get_freatured_image_url($post->ID, 'newsup-slider-full'); ?>
      <!-- mg-blog-post -->
     <div class="col-md-3">
        <div class="mg-top-blog-title">
          <article class="small">
              <div class="mg-blog-category"><?php newsup_post_categories(); ?></div>
              <!-- small-post-content -->
            <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        </article>
      </div>
      <!--/ mg-blog-post -->
    </div>
  <?php $i++; endwhile;
endif;
wp_reset_postdata();
?>
  </div>
</div>
<?php } }
endif;
add_action('newsjack_action_front_page_top_post', 'newsjack_front_page_top_post_section', 40);


if(!function_exists('newsjack_frontpage_trending_post_section')):

/**
*
* @since Newsjack
*
*
*/
  function newsjack_frontpage_trending_post_section()
    {

        if(is_front_page() || is_home())
        { 
         $number_of_posts = '4';
         $newsup_trending_news_category = newsup_get_option('select_trending_news_category');
         $newsup_all_posts_main = newsup_get_posts($number_of_posts, $newsup_trending_news_category);
        ?>

        <div class="col-md-3 mg-posts-sec-inner">
            <div class="small-list-post">
                <ul>   
               
                        <?php if ($newsup_all_posts_main->have_posts()) :
                        while ($newsup_all_posts_main->have_posts()) : $newsup_all_posts_main->the_post();
                        global $post;
                        $newsup_url = newsup_get_freatured_image_url($post->ID, 'newsup-slider-full'); ?>
                        
                        <li class="small-post clearfix">
                            <?php if($newsup_url){ ?>
                            <div class="img-small-post">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo esc_url($newsup_url); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <?php } ?>
                        <div class="small-post-content">
                            <div class="mg-blog-category m-0">
                                <?php newsup_post_categories(); ?>
                            </div>
                            <div class="title_small_post">
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                        </div>
                    </li>
                        
                            
                        <?php
    endwhile;
endif;
wp_reset_postdata();
?>
                        
          </ul>
            </div>         
        </div>
       <?php }
    }

endif;

add_action('newsjack_action_front_page_trending_section', 'newsjack_frontpage_trending_post_section', 30);