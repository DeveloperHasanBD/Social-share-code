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

      
    </ul>';
    return $html;
}
