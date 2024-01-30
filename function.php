<!-- Solution #1  -->


<span>Share</span>
<?php

$post_title = urlencode(get_the_title());
$post_url   = urlencode(get_permalink());
$post_thumb = urlencode(get_the_post_thumbnail_url());
// Facebook
$facebook_share_link = "https://www.facebook.com/sharer/sharer.php?u={$post_url}&picture={$post_thumb}";

// Pinterest
$pinterest_share_link = "https://pinterest.com/pin/create/button/?url={$post_url}&media={$post_thumb}&description={$post_title}";
// Gmail
$gmail_subject = get_the_title();
$gmail_body = 'Hey, I thought you might be interested in reading this post: ' . get_the_title() . ' ' . get_permalink();
$gmail_share_link = "mailto:?subject={$gmail_subject}&body={$gmail_body}";
// URL encode the Gmail subject




?>
<img src="<?php echo $post_thumb; ?>" alt="">
<div class="icons">
    <a href="<?php echo  $facebook_share_link; ?>" target="_blank" class="fb_icon">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/facebook.png" alt="facebook">
    </a>
    <a href="<?php echo  $pinterest_share_link; ?>" target="_blank">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/pinterest.png" alt="pinterest">
    </a>
    <a href="<?php echo  $gmail_share_link; ?>" target="_blank">
	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/mail.png" alt="mail">
    </a>
</div>











<!-- Solution #2  -->


function fashmag_social_post_share(){

    if( has_post_thumbnail() ){
        $share_image = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
        $share_image= $share_image[0];
        $share_image_portrait= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
        $share_image_portrait= $share_image_portrait[0];
    }else{
        $share_image= '';
        $share_image_portrait= '';
    }
    $share_excerpt = strip_tags( get_the_excerpt(), '<b><i><strong><a>' );
    $html = '<ul class="social-sharea">
         <li>
         <a href="http://www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'">
             // icon here 
           </a>
        </li>

        <li>
        <a href="http://twitter.com/intent/tweet?text='.rawurlencode( get_the_title() ) .'&amp;url='.rawurlencode( get_the_permalink() ).'">
                // icon here 
            </a>
        </li>

      <li>
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.rawurlencode( get_the_permalink() ).'&amp;title='.rawurlencode( get_the_title() ).'&amp;summary='.rawurlencode ( $share_excerpt ).'&amp;source='.rawurlencode( get_bloginfo('name') ).'">
                // icon here 
            </a>
        </li>

        <li>
	         <a href="https://web.skype.com/share?url=' . rawurlencode(get_the_title()) . '&amp;url=' . rawurlencode(get_the_permalink()) . '">
        	   // icon here 
		 </a>
	 </li>
	 <li>
	     <a href="https://api.whatsapp.com/send?text=**%0A%0A' . rawurlencode(get_the_permalink()) . '">
	       // icon here 
		 </a>
	 </li>

      
    </ul>';
    return $html;
}
