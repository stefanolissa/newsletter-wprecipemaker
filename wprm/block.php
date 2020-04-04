<?php
/*
 * Name: Custom Post Type
 * Section: content
 * Description: Extracts custom post types
 * Type: dynamic
 * 
 */

/* @var $options array */
/* @var $wpdb wpdb */

$default_options = array(
    'max' => 10,
    'image' => 1,
    'date' => 1,
    'description' => 1,
    'title_font_family' => 'Helvetica, Arial, sans-serif',
    'title_font_size' => 24,
    'title_font_color' => '#000000',
    'font_family' => 'Helvetica, Arial, sans-serif',
    'font_size' => 16,
    'font_color' => '#000000',
    'block_padding_left' => 15,
    'block_padding_right' => 15,
    'block_padding_top' => 15,
    'block_padding_bottom' => 15,
    'block_background' => '#ffffff'
);

$options = array_merge($default_options, $options);

$filters = array('post_type' => 'wprm_recipe', 'posts_per_page' => $options['max'], 'post_status'=>'draft');

// Add taxonomy filters (we have examples to share)

$posts = get_posts($filters);

$text_align = 'left';
if (is_rtl())
    $text_align = 'right';

//remove_all_filters('excerpt_more');
?>

<style>
    .wprm {
        margin-bottom: 20px;
        text-align: center;
    }

    .title {
        font-size: <?php echo $options['title_font_size'] ?>px; 
        font-family: <?php echo $options['title_font_family'] ?>;
        color: <?php echo $options['title_font_color'] ?>;
        margin-bottom: 15px;
        line-height: normal;
        font-weight: normal;
        text-align: <?php echo $text_align ?>;
    }
    .title-a {
        font-size: <?php echo $options['title_font_size'] ?>px; 
        font-family: <?php echo $options['title_font_family'] ?>;
        color: <?php echo $options['title_font_color'] ?>;
        font-weight: normal;
        text-decoration: none;
    }
    .excerpt {
        font-size: <?php echo $options['font_size'] ?>px; 
        font-family: <?php echo $options['font_family'] ?>;
        color: <?php echo $options['font_color'] ?>;
        margin-bottom: 15px;
        line-height: normal;
        font-weight: normal;
        text-align: <?php echo $text_align ?>;
    }
    .excerpt-a {
        font-size: <?php echo $options['font_size'] ?>px; 
        font-family: <?php echo $options['font_family'] ?>;
        color: <?php echo $options['font_color'] ?>;
        line-height: normal;
        font-weight: normal;
        text-decoration: none;
    }
    .image {
        margin-bottom: 15px;
        max-width: 100%;
        border: 0;
    }
</style>


<?php foreach ($posts as $p) { ?>
    <?php
    /* @var $p WP_Post */
    $post_id = $p->ID;
    $title = get_the_title($post_id);
    $excerpt = get_the_excerpt($post_id);
    $url = get_permalink($post_id);
    $image = null;
    if ($options['image']) {
        $media_id = TNP_Composer::get_post_thumbnail_id($post_id);
        if ($media_id) {
            $image = tnp_resize($media_id, array(600, 0, true));
        }
    }
    ?>
    <div inline-class="post">
        <div inline-class="title">
            <a href="<?php echo $url ?>" target="_blank" inline-class="title-a"><?php echo $title ?></a>
        </div>

        <?php if (!empty($image)) { ?>
            <a href="<?php echo $url ?>" target="_blank"><img inline-class="image" src="<?php echo $image->url ?>" width="<?php echo $image->width ?>" alt="<?php echo esc_attr($image->alt) ?>"></a>
        <?php } ?>


        <div inline-class="excerpt">
            <a href="<?php echo $url ?>" target="_blank" inline-class="excerpt-a"><?php echo $excerpt ?></a>
        </div>
    </div>
<?php } ?>
