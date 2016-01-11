<?php
include(TEMPLATEPATH."/includes/theme_options.php");
//顶部导航（菜单）设置
include("includes/theme-postmeta.php");
add_theme_support( 'post-thumbnails' ); 
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	
	
}

// gavatar
function get_ssl_avatar($avatar) {
 $avatar = preg_replace('/http:\/\/([\d])/','https://secure',$avatar);
 return $avatar;
}

add_filter('get_avatar', 'get_ssl_avatar');


function asts_slider_image(){

if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'asts_slider' );
}  else { ?>
	<img src="<?php bloginfo('template_directory'); ?>/images/thumb.png" width="830" height="280"/>
<?php
	};
}


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



//META-BOX 函数
include_once(TEMPLATEPATH.'/metabox/metaboxclass.php');   
include_once(TEMPLATEPATH.'/metabox/metabox.php'); 
//菜单回调函数


//添加形式
	add_theme_support( 'post-formats', array( 
		'aside', 'status','video','audio','gallery','link','chat','image','quote' ) );
	
	/*add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',) );*/
//添加小工具
  ///////////////////

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

  ////////////////
  

//添加小工具
    include TEMPLATEPATH . '/widgets/tagcloud.php';
    include TEMPLATEPATH . '/widgets/new_posts.php';
	include TEMPLATEPATH . '/widgets/new_comments.php';
	
    

	
    
//屏蔽默认工具

//添加特色图像
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}




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

//图片获取
function post_icons_src($width = 48,$height = 48){
     global $post;
    $post_icons_src = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $post_icons_src = $matches [1] [0];   //获取该图片 src
    //如果日志中没有图片，则显示随机图片
      $random = mt_rand(1, 30);
      $post_icons_src = get_bloginfo('template_url').'/images/icons/'.$random.'.png';
      //如果日志中没有图片，则显示默认图片
      //$post_icons_src = get_bloginfo('template_url'). '/images/menzil.png';
    
  
  //echo get_bloginfo("template_url").'/timthumb.php?src='.$post_icons_src.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1';
   echo $post_icons_src;
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



//评论回复...
function comment_mail_notify($comment_id) {
    $admin_email = get_bloginfo ('admin_email'); 
    $comment = get_comment($comment_id);
    $comment_author_email = trim($comment->comment_author_email);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
    $spam_confirmed = $comment->comment_approved;
    if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
    $wp_email = 'admin@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
    $subject = 'سىزنىڭ [' . get_option("blogname") . '] دىكى ئىنكاسىڭىزغا جاۋاب قايتۇرۇلدى!';
    $message = '
	<style>
	@font-face{font-family:UKIJ Tuz Tom;src:url('.get_bloginfo('template_url').'/UKIJTuT.eot);src:url('.get_bloginfo('template_url').'/UKIJTuT.eot?#iefix) format(embedded-opentype),url('.get_bloginfo('template_url').'/UKIJTuT.woff) format(woff),url('.get_bloginfo('template_url').'/UKIJTuT.ttf) format(truetype),url('.get_bloginfo('template_url').'/UKIJTuT.svg#UKIJTuzTomRegular) format(svg);font-weight:normal;font-style:normal}
	</style>
    <div style="background-color:#fff; border:1px solid #666666; color:#111; -moz-border-radius:8px; -webkit-border-radius:8px; -khtml-border-radius:8px; border-radius:8px; font-size:12px; width:702px; margin:0 auto; margin-top:10px;">
    <div style=" direction:rtl;background:#666666; width:100%; height:60px; color:white; -moz-border-radius:6px 6px 0 0; -webkit-border-radius:6px 6px 0 0; -khtml-border-radius:6px 6px 0 0; border-radius:6px 6px 0 0; ">
    <span style="height:60px; line-height:60px; margin-right:30px; font-size:20px;font-family:UKIJ Tuz Tom,Alpida Unicode System,Microsoft Uighur,Tahoma,Arial,Helvetica,sans-serif;"> سىزنىڭ<a style="text-decoration:none; color:#ff0;font-weight:600;"> [' . get_option("blogname") . '] </a> دىكى ئىنكاسىڭىزغا جاۋاب قايتۇرۇلدى!</span></div>
    <div style=" direction:rtl;width:90%; margin:0 auto; font-family:UKIJ Tuz Tom,Alpida Unicode System,Microsoft Uighur,Tahoma,Arial,Helvetica,sans-serif; font-size:17px">
      <p> ئەسسالامۇ ئەلەيكۇم، ' . trim(get_comment($parent_id)->comment_author) . '!</p>
      <p>سىزنىڭ «' . get_the_title($comment->comment_post_ID) . '» دېگەن كىتابدىكى ئىنكاسىڭىز:<br />
      <p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;margin: 15px 0;">'. trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' نىڭ سىزگە قايتۇرغان جاۋابى:<br />
      <p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;margin: 15px 0;">'. trim($comment->comment_content) . '</p>
      <p>تولۇق مەزمۇنىنى كۆرمەكچى بولسىڭىز <a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">بۇ يەردىن كىرىپ كۆرۈڭ.</a></p>
      <p>سىزنىڭ بىكىتىمىزگە دائىم كېلىپ تۇرىشىڭىزنى قارشى ئالىمىز! ئادرىسىمىز: <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(ئىلخەت ئاپتوماتىك ئەۋەتىلدى، جاۋاب قايتۇرماڭ.)</p>
    </div></div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    }
  }
  add_action('comment_post', 'comment_mail_notify');

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