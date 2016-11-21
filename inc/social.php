<?php

// Company social profiles
  function displaySocialProfiles($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $facebook= $myoptions['facebook'];
    $twitter = $myoptions['twitter'];
    $google = $myoptions['google'];
    $linkedin = $myoptions['linkedin'];
    $tumblr = $myoptions['tumblr'];
    $pinterest = $myoptions['pinterest'];
    $flickr = $myoptions['flickr'];
    $newswire = $myoptions['newswire'];
    $instagram = $myoptions['instagram'];
    $youtube = $myoptions['youtube'];
    $vimeo = $myoptions['vimeo'];

    $facebookCode = '';
    $twitterCode = '';
    $googleCode = '';
    $linkedinCode = '';
    $tumblrCode = '';
    $pinterestCode = '';
    $flickrCode = '';
    $newswireCode = '';
    $instagramCode = '';
    $youtubeCode = '';
    $vimeoCode = '';
    
    if($facebook){
      if($type_of_icon === 'icon5'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-circle-outline"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon1'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-square-round"></i></a></div>';  
      }
      else{
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook"></i></a></div>';  
      }
      
    }
    
    if($twitter){
      if($type_of_icon === 'icon5'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-circle-outline"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon1'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-square-round"></i></a></div>';  
      }
      else{
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter"></i></a></div>';  
      }

    }
    
    if($google){
      if($type_of_icon === 'icon5'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-square-round"></i></a></div>';  
      }
      else{
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google"></i></a></div>';  
      }

    }
    
    if($linkedin){
      if($type_of_icon === 'icon5'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-square-round"></i></a></div>';  
      }
      else{
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin"></i></a></div>';  
      }

    }
    
    if($tumblr){
      if($type_of_icon === 'icon5'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr"></i></a></div>'; 
      }
      else if ($type_of_icon === 'icon2'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-square"></i></a></div>';  
      }
      else if ($type_of_icon == 'icon3'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-square-round"></i></a></div>';  
      }
      else{
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr"></i></a></div>'; 
      }

    }
    
    if($pinterest){
      if($type_of_icon === 'icon5'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest"></i></a></div>'; 
      }
      else if ($type_of_icon === 'icon2'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-square-round"></i></a></div>';  
      }
      else{
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest"></i></a></div>'; 
      }

    }
    
    if($flickr){
      if($type_of_icon === 'icon5'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-square-round"></i></a></div>';  
      }
      else{
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr"></i></a></div>';  
      }

    }
    
    if($newswire){
      if($type_of_icon === 'icon5'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-square-round"></i></a></div>';  
      }
      else{
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire"></i></a></div>';  
      }

    }
    
    if($instagram){
      if($type_of_icon === 'icon5'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-square-round"></i></a></div>';  
      }
      else{
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram"></i></a></div>';  
      }

    }

    if($youtube){
      if($type_of_icon === 'icon5'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-square-round"></i></a></div>';  
      }
      else{
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube"></i></a></div>';  
      }

    }

    if($vimeo){
      if($type_of_icon === 'icon5'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-square-round"></i></a></div>';  
      }
      else{
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo"></i></a></div>';  
      }

    }

    return '<div class="social social-profiles ' . $type_of_icon . ' ' . $custom_class . '">' . $facebookCode . $twitterCode . $googleCode . $linkedinCode . $tumblrCode  . $pinterestCode  . $flickrCode  . $newswireCode . $instagramCode . $youtubeCode . $vimeoCode .'</div>';
    
  }
  
// Post social share
  function displaySocialShare() {
    $myoptions = get_option( 'themesettings_');
    $type_of_icon = $myoptions['type_of_icon'];
    $facebook= $myoptions['facebook'];
    $twitter = $myoptions['twitter'];
    $google = $myoptions['google'];
    $linkedin = $myoptions['linkedin'];
    $tumblr = $myoptions['tumblr'];
    $pinterest = $myoptions['pinterest'];

    $facebookCode = '';
    $twitterCode = '';
    $googleCode = '';
    $linkedinCode = '';
    $tumblrCode = '';
    $pinterestCode = '';

    if($type_of_icon === 'icon5'){
      $facebookCode = '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" target="_blank"><i class="cli-facebook-circle-outline"></i></a></div>';
      $twitterCode = '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" target="_blank"><i class="cli-twitter-circle-outline"></i></a></div>';  
      $googleCode = '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" target="_blank"><i class="cli-google-circle-outline"></i></a></div>';
      $linkedinCode = '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" target="_blank"><i class="cli-linkedin-circle-outline"></i></a></div>';
      $tumblrCode = '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" target="_blank"><i class="cli-tumblr-circle-outline"></i></a></div>'; 
      $pinterestCode = '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" target="_blank"><i class="cli-pinterest-circle-outline"></i></a></div>'; 
    }
    else if ($type_of_icon === 'icon1'){
      $facebookCode = '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" target="_blank"><i class="cli-facebook"></i></a></div>';
      $twitterCode = '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" target="_blank"><i class="cli-twitter"></i></a></div>';  
      $googleCode = '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" target="_blank"><i class="cli-google"></i></a></div>';
      $linkedinCode = '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" target="_blank"><i class="cli-linkedin"></i></a></div>';
      $tumblrCode = '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" target="_blank"><i class="cli-tumblr"></i></a></div>'; 
      $pinterestCode = '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" target="_blank"><i class="cli-pinterest"></i></a></div>';
    }
    else if($type_of_icon === 'icon2'){
      $facebookCode = '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" target="_blank"><i class="cli-facebook-square"></i></a></div>';
      $twitterCode = '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" target="_blank"><i class="cli-twitter-square"></i></a></div>';  
      $googleCode = '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" target="_blank"><i class="cli-google-square"></i></a></div>';
      $linkedinCode = '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" target="_blank"><i class="cli-linkedin-square"></i></a></div>';
      $tumblrCode = '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" target="_blank"><i class="cli-tumblr-square"></i></a></div>'; 
      $pinterestCode = '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" target="_blank"><i class="cli-pinterest-square"></i></a></div>';
    }
    else if ($type_of_icon === 'icon3'){
      $facebookCode = '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" target="_blank"><i class="cli-facebook-circle"></i></a></div>';
      $twitterCode = '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" target="_blank"><i class="cli-twitter-circle"></i></a></div>';  
      $googleCode = '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" target="_blank"><i class="cli-google-circle"></i></a></div>';
      $linkedinCode = '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" target="_blank"><i class="cli-linkedin-circle"></i></a></div>';
      $tumblrCode = '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" target="_blank"><i class="cli-tumblr-circle"></i></a></div>'; 
      $pinterestCode = '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" target="_blank"><i class="cli-pinterest-circle"></i></a></div>';
    }
    else if ($type_of_icon === 'icon4'){
      $facebookCode = '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" target="_blank"><i class="cli-facebook-square-round"></i></a></div>';
      $twitterCode = '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" target="_blank"><i class="cli-twitter-square-round"></i></a></div>';  
      $googleCode = '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" target="_blank"><i class="cli-google-square-round"></i></a></div>';
      $linkedinCode = '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" target="_blank"><i class="cli-linkedin-square-round"></i></a></div>';
      $tumblrCode = '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" target="_blank"><i class="cli-tumblr-square-round"></i></a></div>'; 
      $pinterestCode = '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" target="_blank"><i class="cli-pinterest-square-round"></i></a></div>';
    }
    else{
      $facebookCode = '<div class="social-icon"><a href="http://www.facebook.com/share.php?u=' . get_permalink()  . '" target="_blank"><i class="cli-facebook"></i></a></div>';
      $twitterCode = '<div class="social-icon"><a href="http://twitter.com/home?status=' . get_permalink()  . '" target="_blank"><i class="cli-twitter"></i></a></div>';  
      $googleCode = '<div class="social-icon"><a href="https://plus.google.com/share?url=' . get_permalink()  . '" target="_blank"><i class="cli-google"></i></a></div>';
      $linkedinCode = '<div class="social-icon"><a href="http://linkedin.com/shareArticle?mini=true&url=' . get_permalink()  . '" target="_blank"><i class="cli-linkedin"></i></a></div>';
      $tumblrCode = '<div class="social-icon"><a href="http://www.tumblr.com/share/link?url=' . get_permalink()  . '" target="_blank"><i class="cli-tumblr"></i></a></div>'; 
      $pinterestCode = '<div class="social-icon"><a href="http://pinterest.com/pin/create/button/?url=' . get_permalink()  . '" target="_blank"><i class="cli-pinterest"></i></a></div>';  
    }

    

    return '<div class="social social-share ' . $type_of_icon . '">' . $facebookCode . $twitterCode . $googleCode . $linkedinCode . $tumblrCode  . $pinterestCode  . '</div>';
    
  }

// Individual Profiles
  function displayFacebookProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $facebook = $myoptions['facebook'];
    $facebookCode = '';
    
    if($facebook){
      if($type_of_icon === 'icon5'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-circle-outline"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon1'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook-square-round"></i></a></div>';  
      }
      else{
        $facebookCode = '<div class="social-icon facebook"><a href="' . $facebook  . '" target="_blank"><i class="cli-facebook"></i></a></div>';  
      }
      
    }

    return $facebookCode;
    
  }

  function displayTwitterProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $twitter = $myoptions['twitter'];
    $twitterCode = '';
    
    if($twitter){
      if($type_of_icon === 'icon5'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-circle-outline"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon1'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter-square-round"></i></a></div>';  
      }
      else{
        $twitterCode = '<div class="social-icon twitter"><a href="' . $twitter  . '" target="_blank"><i class="cli-twitter"></i></a></div>';  
      }

    }

    return $twitterCode;
    
  }

  function displayGoogleProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $google = $myoptions['google'];
    $googleCode = '';
    
    if($google){
      if($type_of_icon === 'icon5'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google-square-round"></i></a></div>';  
      }
      else{
        $googleCode = '<div class="social-icon google"><a href="' . $google  . '" target="_blank"><i class="cli-google"></i></a></div>';  
      }

    }

    return $googleCode;
    
  }

  function displayLinkedInProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $linkedin = $myoptions['linkedin'];
    $linkedinCode = '';
    
    if($linkedin){
      if($type_of_icon === 'icon5'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin-square-round"></i></a></div>';  
      }
      else{
        $linkedinCode = '<div class="social-icon linkedin"><a href="' . $linkedin  . '" target="_blank"><i class="cli-linkedin"></i></a></div>';  
      }

    }

    return $linkedinCode;
    
  }

  function displayTumblrProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $tumblr = $myoptions['tumblr'];
    $tumblrCode = '';
    
    if($tumblr){
      if($type_of_icon === 'icon5'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr"></i></a></div>'; 
      }
      else if ($type_of_icon === 'icon2'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-square"></i></a></div>';  
      }
      else if ($type_of_icon == 'icon3'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr-square-round"></i></a></div>';  
      }
      else{
        $tumblrCode = '<div class="social-icon tumblr"><a href="' . $tumblr  . '" target="_blank"><i class="cli-tumblr"></i></a></div>'; 
      }

    }

    return $tumblrCode;
    
  }

  function displayPinterestProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $pinterest = $myoptions['pinterest'];
    $pinterestCode = '';
    
    if($pinterest){
      if($type_of_icon === 'icon5'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest"></i></a></div>'; 
      }
      else if ($type_of_icon === 'icon2'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest-square-round"></i></a></div>';  
      }
      else{
        $pinterestCode = '<div class="social-icon pinterest"><a href="' . $pinterest  . '" target="_blank"><i class="cli-pinterest"></i></a></div>'; 
      }

    }

    return $pinterestCode;
    
  }

  function displayFlickrProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $flickr = $myoptions['flickr'];
    $flickrCode = '';
    
    if($flickr){
      if($type_of_icon === 'icon5'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr-square-round"></i></a></div>';  
      }
      else{
        $flickrCode = '<div class="social-icon flickr"><a href="' . $flickr  . '" target="_blank"><i class="cli-flickr"></i></a></div>';  
      }

    }

    return $flickrCode;
    
  }

  function displayNewswireProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $newswire = $myoptions['newswire'];
    $newswireCode = '';

    if($newswire){
      if($type_of_icon === 'icon5'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire-square-round"></i></a></div>';  
      }
      else{
        $newswireCode = '<div class="social-icon newswire"><a href="' . $newswire  . '" target="_blank"><i class="cli-newswire"></i></a></div>';  
      }

    }

    return $newswireCode;
    
  }

  function displayInstagramProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $instagram = $myoptions['instagram'];
    $instagramCode = '';
    
    if($instagram){
      if($type_of_icon === 'icon5'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram-square-round"></i></a></div>';  
      }
      else{
        $instagramCode = '<div class="social-icon instagram"><a href="' . $instagram  . '" target="_blank"><i class="cli-instagram"></i></a></div>';  
      }

    }

    return $instagramCode;
    
  }

  function displayYoutubeProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;
    $youtube = $myoptions['youtube'];
    $youtubeCode = '';

    if($youtube){
      if($type_of_icon === 'icon5'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube-square-round"></i></a></div>';  
      }
      else{
        $youtubeCode = '<div class="social-icon youtube"><a href="' . $youtube  . '" target="_blank"><i class="cli-youtube"></i></a></div>';  
      }

    }

    return $youtubeCode;
    
  }

  function displayVimeoProfile($icon_type, $extra_class) {
    $myoptions = get_option( 'themesettings_');
    $custom_class = $extra_class;
    $type_of_icon = $icon_type;

    $vimeo = $myoptions['vimeo'];

    $vimeoCode = '';

    if($vimeo){
      if($type_of_icon === 'icon5'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-circle-outline"></i></a></div>';  
      }
      else if($type_of_icon === 'icon1'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon2'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-square"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon3'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-circle"></i></a></div>';  
      }
      else if ($type_of_icon === 'icon4'){
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo-square-round"></i></a></div>';  
      }
      else{
        $vimeoCode = '<div class="social-icon vimeo"><a href="' . $vimeo  . '" target="_blank"><i class="cli-vimeo"></i></a></div>';  
      }

    }

    return $vimeoCode;
    
  }

// FBR Badges
  function display_verified_fbr_badge(){
    $myoptions = get_option( 'themesettings_');
    $fbr_profile_slug = $myoptions['fbr_profile'];

    $fbr_badge_color = $myoptions['badge_color'];

    $fbr_profile = 'http://www.fairbusinessreport.org/company/' . $fbr_profile_slug . '/profile';

    $fbr_verified = '<div class="fbr-badge fbr-verified"><a href="' . $fbr_profile . '" target="_blank" title="' . get_bloginfo( 'name' ) . '"><img src="' . CDM_ROOT . '/imgs/FBR_Verified_Badge_' . $fbr_badge_color . '.png" alt="' . get_bloginfo( 'name' ) . ' Fair Business Report Profile" /></a></div>';

    return $fbr_verified;
  }

  function display_verified_rating_fbr_badge(){
    $myoptions = get_option( 'themesettings_');
    $fbr_profile_slug = $myoptions['fbr_profile'];

    $fbr_badge_color = $myoptions['badge_color'];

    $fbr_verified_rating = '<div class="fbr-badge fbr-verified-rating"><span id="starbadges"></span><script type="text/javascript" id="my_script_1" src="http://www.fairbusinessreport.org/js/getstarbadges.js?color=' . $fbr_badge_color . '&companyname=' . $fbr_profile_slug . '&height=auto&width=130px"></script></div>';

    return $fbr_verified_rating;
  }

  function display_top_place_badge(){
    $myoptions = get_option( 'themesettings_');
    $fbr_profile_slug = $myoptions['fbr_profile'];

    $fbr_badge_color = $myoptions['badge_color'];

    $fbr_profile = 'http://www.fairbusinessreport.org/company/' . $fbr_profile_slug . '/profile';

    $fbr_top_place = '<div class="fbr-badge fbr-top-place"><a href="' . $fbr_profile . '" target="_blank" title="' . get_bloginfo( 'name' ) . '"><img src="' . CDM_ROOT . '/imgs/FBR_TopPlacesToWork_Badge_' . $fbr_badge_color . '.png" alt="' . get_bloginfo( 'name' ) . ' Fair Business Report Top Place to Work Award" /></a></div>';

    return $fbr_top_place;
  }

  function display_customer_service_badge(){
    $myoptions = get_option( 'themesettings_');
    $fbr_profile_slug = $myoptions['fbr_profile'];

    $fbr_badge_color = $myoptions['badge_color'];

    $fbr_profile = 'http://www.fairbusinessreport.org/company/' . $fbr_profile_slug . '/profile';

    $fbr_customer_service = '<div class="fbr-badge fbr-customer-service"><a href="' . $fbr_profile . '" target="_blank" title="' . get_bloginfo( 'name' ) . '"><img src="' . CDM_ROOT . '/imgs/FBR_TopCustomerService_Badge_' . $fbr_badge_color . '.png" alt="' . get_bloginfo( 'name' ) . ' Fair Business Report Top Customer Service Award" /></a></div>';

    return $fbr_customer_service;
  }

// Twitter Feed
  function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
      $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
  }

  function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
      $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
  }

  function addTweetEntityLinks( $tweet, $add_links) {
    // actual tweet as a string
    $tweetText = $tweet['text'];
   
    // If we want to actually add the links
    if($add_links == 1){
      // create an array to hold urls
      $tweetEntites = array();
     
      // add each url to the array
      foreach( $tweet['entities']['urls'] as $url ) {
        $tweetEntites[] = array (
            'type'    => 'url',
            'curText' => substr( $tweetText, $url['indices'][0], ( $url['indices'][1] - $url['indices'][0] ) ),
            'newText' => '<a href="' . $url['expanded_url'] . '" target="_blank">'.$url['display_url'].'</a>'
          );
      }  // end foreach
     
      // add each user mention to the array
      foreach ( $tweet['entities']['user_mentions'] as $mention ) {
        $string = substr( $tweetText, $mention['indices'][0], ( $mention['indices'][1] - $mention['indices'][0] ) );
        $tweetEntites[] = array (
            'type'    => 'mention',
            'curText' => mb_substr( $tweetText, $mention['indices'][0], ( $mention['indices'][1] - $mention['indices'][0] ), 'UTF-8'),
            'newText' => '<a href="http://twitter.com/' .$mention['screen_name'].'" target="_blank">'.$string.'</a>'
          );
      }  // end foreach
     
      // add each hashtag to the array
      foreach ( $tweet['entities']['hashtags'] as $tag ) {
        $string = substr( $tweetText, $tag['indices'][0], ( $tag['indices'][1] - $tag['indices'][0] ) );
        $tweetEntites[] = array (
            'type'    => 'hashtag',
            'curText' => substr( $tweetText, $tag['indices'][0], ( $tag['indices'][1] - $tag['indices'][0] ) ),
            'newText' => '<a href="http://twitter.com/search?q=%23'.$tag['text'].'&src=hash" target=_blank>'.$string.'</a>'
          );
      }  // end foreach
     
      // replace the old text with the new text for each entity
      foreach ( $tweetEntites as $entity ) {
        $tweetText = str_replace( $entity['curText'], $entity['newText'], $tweetText );
      } // end foreach
     
      return $tweetText;
    } else {
      return $tweetText;
    }
  }

  function returnTweet($screen_name, $number_of_tweets, $add_links, $add_username, $add_author_link){
    $oauth_access_token         = "2296334100-mxbTpDoDNJwkMDsYX4A4QovelYNTBRtArfobWYe";
    $oauth_access_token_secret  = "AYBoR4XzbnxcEZPggRLsx01x6fZ3chfDkbIGg4bVtANBc";
    $consumer_key               = "v3uCcEDNF3CuBblKlHWEWtdYH";
    $consumer_secret            = "kZbHhSsPTalVQfsR9mDxcMHsPrlRCeyf5JbBfsahWpzRUTJh8i";

    $twitter_timeline           = "user_timeline";  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me

    //  create request
    $request = array(
      'screen_name'       => $screen_name,
      'count'             => $number_of_tweets
    );

    $oauth = array(
      'oauth_consumer_key'        => $consumer_key,
      'oauth_nonce'               => time(),
      'oauth_signature_method'    => 'HMAC-SHA1',
      'oauth_token'               => $oauth_access_token,
      'oauth_timestamp'           => time(),
      'oauth_version'             => '1.0'
    );

    //  merge request and oauth to one array
    $oauth = array_merge($oauth, $request);

    //  do some magic
    $base_info              = buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
    $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
    $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature']   = $oauth_signature;

    //  make request
    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array( CURLOPT_HTTPHEADER => $header,
      CURLOPT_HEADER => false,
      CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER => false);

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);

    $tweets = json_decode($json, true);

    $allTweets = '';
    $entities = array();
    foreach($tweets as $tweet){
      $tweetAuthor = ($add_author_link == 1) ? '<a href="https://twitter.com/' . $tweet['user']['screen_name'] . '" target="_blank" class="tweet-user"><i class="fa fa-user"></i> <span>@' . $tweet['user']['screen_name'] . '</span></a>' : '<div class="tweet-user"><i class="fa fa-user"></i> <span>@' . $tweet['user']['screen_name'] . '</span></div>';
      $tweetUSER = ($add_username == 1) ? $tweetAuthor : '';
      $tweetTXT = addTweetEntityLinks( $tweet, $add_links );
      $tweetDATE = time_elapsed_string($tweet['created_at']); 
      $fullTweet = '<div class="tweet"><div class="tweet-inner"><div class="tweet-txt">' . $tweetTXT . '</div>' . $tweetUSER . '<div class="tweet-date"><i class="fa fa-clock-o"></i> <span>' . $tweetDATE . '</span></div></div></div>';
      $allTweets .= $fullTweet;
    }

    return '<div class="twitter-feed">' . $allTweets . '</div>';
  }
