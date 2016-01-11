<?php
include(TEMPLATEPATH."/includes/theme_options.php");
//顶部导航（菜单）设置
include("includes/theme-postmeta.php");
add_theme_support( 'post-thumbnails' ); 
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
}
//META-BOX 函数
include_once(TEMPLATEPATH.'/metabox/metaboxclass.php');   
include_once(TEMPLATEPATH.'/metabox/metabox.php'); 

// gavatar
function get_ssl_avatar($avatar) {
 $avatar = preg_replace('/http:\/\/([\d])/','https://secure',$avatar);
 return $avatar;
}

add_filter('get_avatar', 'get_ssl_avatar');

//菜单回调函数

if ( function_exists('register_nav_menus') ) {
	register_nav_menus(
  array(
	'h-top-menu' => __( 'ئاساسىي تىزىملىك' ),
	'h-tops-menu' => __( 'قوشۇمچە تىزىملىك' ),
	'h-left-menu' => __( 'يان تىزىملىك' ),
	'h-foot-menu' => __( 'ئاستى تىزىملىك' ),
  'filters-left-menu' => __( 'ئالىي ئىزدەش-ئوڭ-بىر' ),
  )
);
}

//添加形式
	add_theme_support( 'post-formats', array( 
		'aside', 'status','video','audio','gallery','link','chat','image','quote' ) );

//添加小工具

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );



//图片获取
function post_thumbnail_src($width = 100,$height = 80){
      global $post;
  if( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
    $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
    $post_thumbnail_src = $thumbnail_src [0];
  } else {
    $post_thumbnail_src = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $post_thumbnail_src = $matches [1] [0];   //获取该图片 src
    if(empty($post_thumbnail_src)){ //如果日志中没有图片，则显示随机图片
      $random = mt_rand(1, 30);
      $post_thumbnail_src = get_bloginfo('template_url').'/images/icons/'.$random;
      //如果日志中没有图片，则显示默认图片
      //$post_thumbnail_src = get_bloginfo('template_url'). '/images/menzil.png';
    }
  };
  //echo get_bloginfo("template_url").'/timthumb.php?src='.$post_thumbnail_src.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1';
   echo $post_thumbnail_src;
}


// 获得热评文章
function simple_get_most_viewed($posts_num=10, $days=1000){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
       AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><a href= \"".get_permalink($post->ID)."\" target=\"_blank\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >". cut_str($post->post_title,36)."</a></li>";
    }
    echo $output;
}

//浏览次数
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/*加载所需要的PHP文件*/
if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}

///分页函数
function pagenavi($p = 2)
{
    if (is_singular()) {
        return;
    }
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ($max_page == 1) {
		echo'<style>pagebar{display:none;}</style>';
        return;
    }
    if (empty($paged)) {
        $paged = 1;
		
		print "<li >Back</li> ";
		
    }
    
    if ($paged > 1) {
        p_link($paged - 1, 'Back', 'Back');
    }
    if ($paged > $p + 1) {
        p_link(1, 'First');
    }
    if ($paged > $p + 2) {
        echo '<li>...</li>';
    }
    for ($i = $paged - $p; $i <= $paged + $p; $i++) {
        if ($i > 0 && $i <= $max_page) {
			
            $i == $paged ? print " <li >{$i}</li> " : p_link($i);
        }
    }
    if ($paged < ($max_page - $p) - 1) {
         echo '<li >...</li>';
    }
    if ($paged < $max_page - $p) {
        p_link($max_page, ' Last');
    }
    if ($paged < $max_page) {
        p_link($paged + 1, ' Next', 'Next');
    }
}
function p_link($i, $title = '', $linktype = '')
{
    if ($title == '') {
        $title = " {$i} - Page";
    }
    if ($linktype == '') {
        $linktext = $i;
    } else {
        $linktext = $linktype;
    }
    echo '<li><a  href=\'', esc_html(get_pagenum_link($i)), "' title='{$title}'>{$linktext}</a></li> ";
	
}

//All End!
?>