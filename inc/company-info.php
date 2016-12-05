<?php 

function companyAddress(){
  $address_rows = get_field('company_address', 'options');
  if($address_rows){
    $address = '';
    $i = 0;
    foreach($address_rows as $address_row){
      $address_line_1 = $address_row['address_line_1'];
      $city = $address_row['city'];
      $state = $address_row['state'];
      $post_zip = $address_row['zip'];
      $full_address = $address_line_1 . ' ' . $city . ' ' . $state . ' ' . $post_zip;
      $i++;

      if($address_line_1){
        $addressCode = '<span class="schema-info address1" itemprop="streetAddress">' . $address_line_1 . '</span>';  
      }
      if($city){
        $cityCode = '<span class="schema-info city" itemprop="addressLocality">' . $city . ', </span>';  
      }
      if($state){
        $stateCode = '<span class="schema-info state" itemprop="addressRegion">' . $state . '</span>';  
      }
      if($post_zip){
        $zipCode = '<span class="schema-info zip" itemprop="postalCode">' . $post_zip . '</span>';  
      }

      $address .= '<a href="http://maps.google.com/?q=' . urlencode($full_address) . '" target="_blank" class="schema-info address address-' . $i . '" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><div class="address-inner"><div class="schema-info address-line-1">' . $addressCode . '</div><div class="schema-info address-line-2">' . $cityCode . $stateCode . ' ' . $zipCode . '</div></div></a>';
    }
    return $address;
  }
}

function companyAddressTxt(){
  $address_rows = get_field('company_address', 'options');
  if($address_rows){
    $address = '';
    $i = 0;
    foreach($address_rows as $address_row){
      $address_line_1 = $address_row['address_line_1'] . ' ';
      $city = $address_row['city'] . ', ';
      $state = $address_row['state'] . ' ';
      $post_zip = $address_row['zip'];
      $full_address = $address_line_1 . $city . $post_zip;
      $i++;
      $address .= '<span class="company-address-txt address-' . $i . '">' . $full_address . '</span>';
    }
    return $address;
  }
}

function companyPhone(){
  $phone_rows = get_field('company_phone', 'options');
  if($phone_rows){
    $phone = '';
    $i = 0;
    foreach($phone_rows as $phone_row){    
      $phone_txt = $phone_row['phone'];
      $i++;
      if($phone_txt){
        $phone .= '<div class="schema-info phone phone-' . $i . '"><a href="tel:' . $phone_txt . '" itemprop="telephone">' . $phone_txt . '</a></div>';  
      }
    }
    return $phone;
  }
}

function companyPhoneTxt(){
  $phone_rows = get_field('company_phone', 'options');
  if($phone_rows){
    $phone = '';
    $i = 0;
    foreach($phone_rows as $phone_row){    
      $phone_txt = $phone_row['phone'];
      $i++;
      if($phone_txt){
        $phone .= '<span class="company-phone phone-' . $i . '">' . $phone_txt . '</span>';  
      }
    }
    return $phone;
  }
}

function companyEmail(){
  $email_rows = get_field('company_email', 'options');
  if($email_rows){
    $email = '';
    $i = 0;
    foreach($email_rows as $email_row){
      $email_txt = $email_row['email'];
      $i++;
      if($email_txt){
        $email .= '<div class="schema-info email email-' . $i . '"><a href="mailto:' . $email_txt  . '" itemprop="email">' . $email_txt . '</a></div>';  
      }
    }
    return $email;
  }
}

function companyEmailTxt(){
  $email_rows = get_field('company_email', 'options');
  if($email_rows){
    $email = '';
    $i = 0;
    foreach($email_rows as $email_row){
      $email_txt = $email_row['email'];
      $i++;
      if($email_txt){
        $email .= '<a href="mailto:' . $email_txt  . '" class="company-email email-' . $i . '">' . $email_txt . '</a>';  
      }
    }
    return $email;
  }
}

function displayfullAddress() {
  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . companyAddress() . companyPhone() . companyEmail() . '</div>';
}

function displayAddress() {
  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . companyAddress() . '</div>';
}

function displayContactInfo() {
  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . companyPhone() . companyEmail() . '</div>';
}

function displayPhone() {
  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . companyPhone() .'</div>';
}

function displayEmail() {
  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . companyEmail() . '</div>';
}

function schemaInfo(){
  $myoptions = get_option( 'themesettings_');
  $logo = $myoptions['logo'];
  if($logo){
    $company_logo = '"logo": "' . $logo . '", "image": "' . $logo . '", ';
  }
  $company_name = '"name": "' . get_bloginfo('name') . '", ';
  $tagline = get_bloginfo( 'description' );
  if($tagline){
    $company_description = '"description": "' . $tagline . '", ';
  } 
  $company_url = '"url": "' . esc_url(home_url('/')) . '", ';

  // Address JSON
    $address_rows = get_field('company_address', 'options');
    if($address_rows){
      $address = '';
      foreach($address_rows as $address_row){
        $address_line_1 = $address_row['address_line_1'];
        $city = $address_row['city'];
        $state = $address_row['state'];
        $post_zip = $address_row['zip'];
        $full_address = $address_line_1 . ' ' . $city . ' ' . $state . ' ' . $post_zip;
        if($address_line_1){
          $addressCode = '"streetAddress": "' . $address_line_1 . '", ';  
        }
        if($city){
          $cityCode = '"addressLocality": "' . $city . '", ';  
        }
        if($state){
          $stateCode = '"addressRegion": "' . $state . '", ';  
        }
        if($post_zip){
          $zipCode = '"postalCode": "' . $post_zip . '", ';  
        }
        $full_address = $addressCode . $cityCode . $stateCode . $zipCode;
        $jsonAddress = rtrim($full_address, ', ');
        $address .= '{"@type": "PostalAddress",' . $jsonAddress . '}, ';
      }
      $jsonAddresses = rtrim($address, ', ');
      $company_addresses = '"address": [' . $jsonAddresses . '], ';
    }
  
  // Phone JSON
    $phone_rows = get_field('company_phone', 'options');
    if($phone_rows){
      $phone = '';
      foreach($phone_rows as $phone_row){    
        $phone_txt = $phone_row['phone'];
        if($phone_txt){
          $phoneCode .= '"' . $phone_txt . '", ';  
        }
      }
      $jsonPhone = rtrim($phoneCode, ', ');
      $company_phones = '"telephone": [' . $jsonPhone . '], ';
    }

  // Email JSON
    $email_rows = get_field('company_email', 'options');
    if($email_rows){
      foreach($email_rows as $email_row){
        $email_txt = $email_row['email'];
        if($email_txt){
          $emailCode .= '"mailto:' . $email_txt . '", ';
        }
      }
    }
    $jsonEmail = rtrim($emailCode, ', ');
    $company_emails = '"email": [' . $jsonEmail . '], ';

  // Social JSON

    $social_links = '';
    $facebook = $myoptions['facebook'];
    $twitter = $myoptions['twitter'];
    $google = $myoptions['google'];
    $linkedin = $myoptions['linkedin'];
    $tumblr = $myoptions['tumblr'];
    $pinterest = $myoptions['pinterest'];
    $instagram = $myoptions['instagram'];
    $youtube = $myoptions['youtube'];

    if($facebook){
      $social_links .= '"' . $facebook . '", ';
    }
    if($twitter){
      $social_links .= '"' . $twitter . '", ';
    }
    if($linkedin){
      $social_links .= '"' . $linkedin . '", ';
    }
    if($tumblr){
      $social_links .= '"' . $tumblr . '", ';
    }
    if($pinterest){
      $social_links .= '"' . $pinterest . '", ';
    }
    if($instagram){
      $social_links .= '"' . $instagram . '", ';
    }
    if($google){
      $social_links .= '"' . $google . '", ';
    }
    if($youtube){
      $social_links .= '"' . $youtube . '", ';
    }

    $jsonLinks = rtrim($social_links, ', ');
    $company_social = '"sameAs" : [' . $jsonLinks . '], ';

  $combineJson = $company_name . $company_logo . $company_description . $company_url . $company_addresses . $company_phones . $company_emails . $company_social;
  $cleanJson = rtrim($combineJson, ', ');

  return '<script type="application/ld+json">{"@context": "http://schema.org","@type": "LocalBusiness", ' . $cleanJson . '} </script>';
}

?>