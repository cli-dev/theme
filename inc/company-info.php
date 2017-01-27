<?php 

function companyAddress($address_number){
  $address_rows = get_field('company_address', 'options');
  if($address_rows){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($address_rows as $address_row){
      $address_line_1 = $address_row['address_line_1'];
      $city = $address_row['city'];
      $state = $address_row['state'];
      $post_zip = $address_row['zip'];
      $full_address = $address_line_1 . ' ' . $city . ' ' . $state . ' ' . $post_zip;
      $i++;

      if($address_line_1){
        $addressCode = '<span class="schema-info address1">' . $address_line_1 . '</span>';  
      }
      if($city){
        $cityCode = '<span class="schema-info city">' . $city . ', </span>';  
      }
      if($state){
        $stateCode = '<span class="schema-info state">' . $state . '</span>';  
      }
      if($post_zip){
        $zipCode = '<span class="schema-info zip">' . $post_zip . '</span>';  
      }

      $address_code = '<a href="http://maps.google.com/?q=' . urlencode($full_address) . '" target="_blank" class="schema-info address address-' . $i . '"><div class="address-inner"><div class="schema-info address-line-1">' . $addressCode . '</div><div class="schema-info address-line-2">' . $cityCode . $stateCode . ' ' . $zipCode . '</div></div></a>';

      $all_addresses .= $address_code;

      $addresses += [ 'address_' . $i => strval ($address_code) ];

    }
    if ($address_number !== '') {
      return $addresses['address_' . $address_number];
    } else{
      return $all_addresses;
    }
  }
  else{
    return '';
  }
}

function companyAddressTxt($address_number){
  $address_rows = get_field('company_address', 'options');
  if($address_rows){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($address_rows as $address_row){
      $address_line_1 = $address_row['address_line_1'] . ' ';
      $city = $address_row['city'] . ', ';
      $state = $address_row['state'] . ' ';
      $post_zip = $address_row['zip'];
      $full_address = $address_line_1 . $city . $post_zip;
      $i++;
      $address_code = '<span class="company-address-txt address-' . $i . '">' . $full_address . '</span>';
      $all_addresses .= $address_code;
      $addresses += [ 'address_' . $i => strval ($address_code) ];
    }
    if ($address_number !== '') {
      return $addresses['address_' . $address_number];
    } else{
      return $all_addresses;
    }
  }
  else{
    return '';
  }
}

function companyPhone($phone_number){
  $phone_rows = get_field('company_phone', 'options');
  if($phone_rows){
    $all_phones = '';
    $phones = array();
    $i = 0;
    foreach($phone_rows as $phone_row){    
      $phone_txt = $phone_row['phone'];
      $i++;
      $phone_code = '<div class="schema-info phone phone-' . $i . '"><a href="tel:' . $phone_txt . '">' . $phone_txt . '</a></div>';  
      $all_phones .= $phone_code;
      $phones += [ 'phone_' . $i => strval ($phone_code) ];
    }
    if ($phone_number !== '') {
      return $phones['phone_' . $phone_number];
    } else{
      return $all_phones;
    }
  }
  else{
    return '';
  }
}

function companyPhoneTxt($phone_number){
  $phone_rows = get_field('company_phone', 'options');
  if($phone_rows){
    $all_phones = '';
    $phones = array();
    $i = 0;
    foreach($phone_rows as $phone_row){    
      $phone_txt = $phone_row['phone'];
      $i++;
      $phone_code = '<span class="company-phone phone-' . $i . '">' . $phone_txt . '</span>';  
      $all_phones .= $phone_code;
      $phones += [ 'phone_' . $i => strval ($phone_code) ];
    }
    if ($phone_number !== '') {
      return $phones['phone_' . $phone_number];
    } else{
      return $all_phones;
    }
  }
  else{
    return '';
  }
}

function companyEmail($email_number){
  $email_rows = get_field('company_email', 'options');
  if($email_rows){
    $all_emails = '';
    $emails = array();
    $i = 0;
    foreach($email_rows as $email_row){
      $email_txt = $email_row['email'];
      $i++;
      $email_code = '<div class="schema-info email email-' . $i . '"><a href="mailto:' . $email_txt  . '">' . $email_txt . '</a></div>'; 
      $all_emails .= $email_code;
      $emails += [ 'email_' . $i => strval ($email_code) ];
    }
    if ($email_number !== '') {
      return $emails['email_' . $email_number];
    } else{
      return $all_emails;
    }
  }
  else{
    return '';
  }
}

function companyEmailTxt($email_number){
  $email_rows = get_field('company_email', 'options');
  if($email_rows){
    $all_emails = '';
    $emails = array();
    $i = 0;
    foreach($email_rows as $email_row){
      $email_txt = $email_row['email'];
      $i++;
      $email_code = '<a href="mailto:' . $email_txt  . '" class="company-email email-' . $i . '">' . $email_txt . '</a>';
      $all_emails .= $email_code;
      $emails += [ 'email_' . $i => strval ($email_code) ];
    }
    if ($email_number !== '') {
      return $emails['email_' . $email_number];
    } else{
      return $all_emails;
    }
  }
  else{
    return '';
  }
}

function displayfullAddress($full_address_number) {
  return '<div class="company-address">' . companyAddress($full_address_number) . companyPhone($full_address_number) . companyEmail($full_address_number) . '</div>';
}

function displayAddress($full_address_number) {
  return '<div class="company-address">' . companyAddress($full_address_number) . '</div>';
}

function displayContactInfo($full_address_number) {
  return '<div class="company-address">' . companyPhone($full_address_number) . companyEmail($full_address_number) . '</div>';
}

function displayPhone($full_address_number) {
  return '<div class="company-address">' . companyPhone($full_address_number) .'</div>';
}

function displayEmail($full_address_number) {
  return '<div class="company-address">' . companyEmail($full_address_number) . '</div>';
}

function schemaInfo(){
  $myoptions = get_option( 'themesettings_');
  $logo_img = $myoptions['logo'];
  $logo_img_url = $logo_img['url'];
  $company_logo = '"logo": "' . $logo_img_url . '", "image": "' . $logo_img_url . '", ';
  $company_name = '"name": "' . get_bloginfo('name') . '", ';
  $company_description = '';
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
    } else{
      $company_addresses = '';
    }
  
  // Phone JSON
    $phone_rows = get_field('company_phone', 'options');
    if($phone_rows){
      $phone = '';
      $phoneCode = '';
      foreach($phone_rows as $phone_row){    
        $phone_txt = $phone_row['phone'];
        if($phone_txt){
          $phoneCode .= '"' . $phone_txt . '", ';  
        }
      }
      $jsonPhone = rtrim($phoneCode, ', ');
      $company_phones = '"telephone": [' . $jsonPhone . '], ';
    } else {
      $company_phones = '';
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
      $jsonEmail = rtrim($emailCode, ', ');
      $company_emails = '"email": [' . $jsonEmail . '], ';
    } else {
      $company_emails = '';
    }
    

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