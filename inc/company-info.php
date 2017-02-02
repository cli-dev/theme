<?php 

function companyAddress($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $address_line_1 = $location['address_line_1'];
      $unit = $location['unit_number'];
      $city = $location['city'];
      $state = $location['region'];
      $post_zip = $location['postal_code'];
      $full_address = $address_line_1 . ' ' . $unit . ' ' . $city . ' ' . $state . ' ' . $post_zip;
      $i++;

      if($address_line_1){
        $addressCode = '<span class="schema-info address1">' . $address_line_1 . ' ' . $unit . '</span>';  
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

      $address_code = '<a href="http://maps.google.com/?q=' . urlencode($full_address) . '" target="_blank" class="schema-info address address-' . $i . '" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><div class="address-inner"><div class="schema-info address-line-1" itemprop="addressLocality">' . $addressCode . '</div><div class="schema-info address-line-2">' . $cityCode . $stateCode . ' ' . $zipCode . '</div></div></a>';

      $all_addresses .= $address_code;

      $addresses += [ 'address_' . $i => strval ($address_code) ];

    }
    if ($location_number !== '') {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
  else{
    return '';
  }
}

function companyAddressTxt($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_addresses = '';
    $addresses = array();
    $i = 0;
    foreach($locations as $location){
      $address_line_1 = $location['address_line_1'];
      $unit = $location['unit_number'];
      $city = $location['city'];
      $state = $location['region'];
      $post_zip = $location['postal_code'];
      $full_address = $address_line_1 . ' ' . $unit . ' ' . $city . ', ' . $state . ' ' . $post_zip;
      $i++;
      $address_code = '<span class="company-address-txt address-' . $i . '">' . $full_address . '</span>';
      $all_addresses .= $address_code;
      $addresses += [ 'address_' . $i => strval ($address_code) ];
    }
    if ($location_number !== '') {
      return $addresses['address_' . $location_number];
    } else{
      return $all_addresses;
    }
  }
  else{
    return '';
  }
}

function companyPhone($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_phones = '';
    $phones = array();
    $i = 0;
    foreach($locations as $location){    
      $phone_txt = $location['phone'];
      $i++;
      $phone_code = '<div class="schema-info phone phone-' . $i . '"><a href="tel:' . $phone_txt . '" itemprop="telephone">' . $phone_txt . '</a></div>';  
      $all_phones .= $phone_code;
      $phones += [ 'phone_' . $i => strval ($phone_code) ];
    }
    if ($location_number !== '') {
      return $phones['phone_' . $location_number];
    } else{
      return $all_phones;
    }
  }
  else{
    return '';
  }
}

function companyPhoneTxt($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_phones = '';
    $phones = array();
    $i = 0;
    foreach($locations as $location){    
      $phone_txt = $location['phone'];
      $i++;
      $phone_code = '<span class="company-phone phone-' . $i . '">' . $phone_txt . '</span>';  
      $all_phones .= $phone_code;
      $phones += [ 'phone_' . $i => strval ($phone_code) ];
    }
    if ($location_number !== '') {
      return $phones['phone_' . $location_number];
    } else{
      return $all_phones;
    }
  }
  else{
    return '';
  }
}

function companyEmail($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_emails = '';
    $emails = array();
    $i = 0;
    foreach($locations as $location){
      $email_txt = $location['email'];
      $i++;
      $email_code = '<div class="schema-info email email-' . $i . '"><a href="mailto:' . $email_txt  . '" itemprop="email">' . $email_txt . '</a></div>'; 
      $all_emails .= $email_code;
      $emails += [ 'email_' . $i => strval ($email_code) ];
    }
    if ($location_number !== '') {
      return $emails['email_' . $location_number];
    } else{
      return $all_emails;
    }
  }
  else{
    return '';
  }
}

function companyEmailTxt($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_emails = '';
    $emails = array();
    $i = 0;
    foreach($locations as $location){
      $email_txt = $location['email'];
      $i++;
      $email_code = '<a href="mailto:' . $email_txt  . '" class="company-email email-' . $i . '">' . $email_txt . '</a>';
      $all_emails .= $email_code;
      $emails += [ 'email_' . $i => strval ($email_code) ];
    }
    if ($location_number !== '') {
      return $emails['email_' . $location_number];
    } else{
      return $all_emails;
    }
  }
  else{
    return '';
  }
}

function companyLogo($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_logos = '';
    $logos = array();
    $i = 0;
    foreach($locations as $location){
      $logo = $location['logo'];
      $logo_url = $logo['url'];
      $i++;
      $logo_code = '<div class="location-logo"><img src="' . $logo_url  . '" itemprop="logo" class="location-logo logo-' . $i . '" /></div>';
      $all_logos .= $logo_code;
      $logos += [ 'logo_' . $i => strval ($logo_code) ];
    }
    if ($location_number !== '') {
      return $logos['logo_' . $location_number];
    } else{
      return $all_logos;
    }
  }
  else{
    return '';
  }
}

function locationType($location_number){
  $locations = get_field('locations', 'options');
  if($locations){
    $all_types = '';
    $types = array();
    $i = 0;
    foreach($locations as $location){
      $type = $location['schema_type'];
      $i++;
      $all_types .= $type;
      $types += [ 'logo_' . $i => strval ($logo_code) ];
    }
    if ($location_number !== '') {
      return $types['type_' . $location_number];
    } else{
      return $all_types;
    }
  }
  else{
    return '';
  }
}

function fullLocationInfo($location, $logo, $name){
  return '<div class="location-info-block" itemscope itemtype=""></div>';
}

function displayfullAddress($location_number) {
  return '<div class="company-address">' . companyAddress($location_number) . companyPhone($location_number) . companyEmail($location_number) . '</div>';
}

function displayAddress($location_number) {
  return '<div class="company-address">' . companyAddress($location_number) . '</div>';
}

function displayContactInfo($location_number) {
  return '<div class="company-address">' . companyPhone($location_number) . companyEmail($location_number) . '</div>';
}

function displayPhone($location_number) {
  return '<div class="company-address">' . companyPhone($location_number) .'</div>';
}

function displayEmail($location_number) {
  return '<div class="company-address">' . companyEmail($location_number) . '</div>';
}

function schemaInfo(){
  $locations = get_field('locations', 'options');
  $myoptions = get_option( 'themesettings_');
  $logo_img = $myoptions['logo'];
  $logo_img_url = $logo_img['url'];
  $company_logo = ($myoptions['company_name']) ? '"logo" : "' . $myoptions['company_logo'] . '", "image" : "' . $myoptions['company_logo'] . '", ' : '"logo" : "' . $logo_img_url . '", "image" : "' . $logo_img_url . '", ' ;
  $company_name = ($myoptions['company_name']) ? '"name" : "' . $myoptions['company_name'] . '", ' : '"name"  "' . get_bloginfo('name') . '", ';
  $company_description = ($myoptions['description']) ? '"description" : "' . $myoptions['description'] . '", ' : '"description" : "' . get_bloginfo('description') . '", ';
  $company_id = '"@id" : "' . esc_url(home_url('/')) . '", ';
  $company_url = '"url" : "' . esc_url(home_url('/')) . '", ';
  $company_addresses = '';
  $company_type = '';

  $all_locations = '';

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

  // Address JSON
    if($locations){
      $location_size = sizeof($locations);
      $location_id = '';
      $type = '';
      $name = '';
      $url = '';
      $logo = '';
      $address = '';
      $phone = '';
      $email = '';
      $hours = '';
      $menu = '';
      if ($location_size > 1) {
        $company_type = '"@type": "Organization", ';
        $all_locations = '"@graph" : [';
        $parent_company_info = $company_id . $company_type . $company_name . $company_url . $company_logo . $company_social;
        $parent_company = '{' . rtrim($parent_company_info, ', ') . '}, ';
        $all_locations .= $parent_company;
        $locations_info = '';
        foreach($locations as $location){
          $type = '"@type" : "' . $location['schema_type'] . '", ';
          $url = $location['url'];
          $menu = $location['menu_url'];
          $address_line_1 = $location['address_line_1'];
          $unit = $location['unit_number'];
          $city = $location['city'];
          $state = $location['region'];
          $logo = $location['logo'];
          $post_zip = $location['postal_code'];
          $full_address = $address_line_1 . ' ' . $unit . ' ' . $city . ' ' . $state . ' ' . $post_zip;
          $phone = $location['phone'];
          $email = $location['email'];
          $hours = $location['hours_of_operation'];
          // Location Name
            if($location['location_name']){
              $nameCode = '"name" : "' . $location['location_name'] . '", ';
              $location_id = '"@id" : "' . esc_url(home_url()) . '#' . seoUrl($location['location_name']) . '", ';
            } elseif ($myoptions['company_name']) {
              $nameCode = '"name" : "' . $myoptions['company_name'] . '" ';
              $location_id = '"@id" : "' . esc_url(home_url()) . '#' . seoUrl($myoptions['company_name']) . '", ';
            } else {
              $nameCode = '"name" : "' . get_bloginfo('name') . '", ';
              $location_id = '"@id" : "' . esc_url(home_url()) . '#' . seoUrl(get_bloginfo('name')) . '", ';
            }
          // Location Address
            if($address_line_1){
              $addressCode = '"streetAddress" :  "' . $address_line_1 . ' ' . $unit . '", ';  
            }
            if($city){
              $cityCode = '"addressLocality" :  "' . $city . '", ';  
            }
            if($state){
              $stateCode = '"addressRegion" :  "' . $state . '", ';  
            }
            if($post_zip){
              $zipCode = '"postalCode" :  "' . $post_zip . '", ';  
            }
            $full_address = $addressCode . $cityCode . $stateCode . $zipCode;
            $jsonAddress = rtrim($full_address, ', ');
            $address = '"address" : {"@type" : "PostalAddress",' . $jsonAddress . '}, ';
          // Location Phone
            if($phone){
              $phoneCode = '"telephone" : "' . $phone . '", ';  
            }
          // Location Email
            if($email){
              $emailCode = '"email" : "' . $email . '", ';  
            }

          // Location Image
            if($logo){
              $logoCode = '"image" : "' . $logo . '", ';  
            }

          // Location URL
            if($url){
              $urlCode = '"url" : "' . $url . '", ';  
            }

          // Menu URL
            if($menu_url){
              $menuurlCode = '"menu" : "' . $menu_url . '", ';  
            }

          // Location hours
            if ($hours) {
              $hoursCode = '"openingHoursSpecification" : [';
              foreach($hours as $hour){
                $jsonhoursCode = '{"@type": "OpeningHoursSpecification",';
                $days = $hour['days_of_the_week'];
                $opening_time = $hour['opening_time'];
                $closing_time = $hour['closing_time'];
                $time = '';
                if ($days) {
                  $time .= '"dayOfWeek": [';
                  $daysCode = '';
                  foreach($days as $day){
                    $daysCode .= '"' . $day . '", ';
                  }
                  $jsonDays = rtrim($daysCode, ', ');
                  $time .= $jsonDays . '], ';
                }

                if ($opening_time) {
                  $openingCode = '"opens" : "' . $opening_time . '", ';
                  $time .= $openingCode;
                }
                
                if ($closing_time) {
                  $closingCode = '"closes" : "' . $closing_time . '", ';
                  $time .= $closingCode;
                }
                $jsonHours = rtrim($time, ', ');
                $jsonhoursCode .= $jsonHours . '}, ';
              }
              
              $hoursCode .= rtrim($jsonhoursCode, ', ') . '],';
            }
        
          $location_info = $type . '"parentOrganization": {' . rtrim($company_name, ', ') . '}, ' . $nameCode . $logoCode . $menu_url . $urlCode . $location_id . $address . $phoneCode . $emailCode . $hoursCode;
          $json_locations = '{' . rtrim($location_info, ', ') . '}, ';
          $locations_info .= $json_locations;
        }
        
        $jsonLocation = rtrim($locations_info, ', ');
        $all_locations .=  $jsonLocation . ']';
      } else {
        $locations_info = '';
        foreach($locations as $location){
          $company_type = '"@type" : "' . $location['schema_type'] . '", ';
          $type = '"@type" : "' . $location['schema_type'] . '", ';
          $address_line_1 = $location['address_line_1'];
          $unit = $location['unit_number'];
          $city = $location['city'];
          $state = $location['region'];
          $menu = $location['menu_url'];
          $post_zip = $location['postal_code'];
          $full_address = $address_line_1 . ' ' . $unit . ' ' . $city . ' ' . $state . ' ' . $post_zip;
          $phone = $location['phone'];
          $email = $location['email'];
          $hours = $location['hours_of_operation'];
          // Location Name
            if($location['location_name']){
              $nameCode = '"name" : "' . $location['location_name'] . '", ';
              $location_id = '"@id" : "' . esc_url(home_url()) . '#' . seoUrl($location['location_name']) . '", ';
            } elseif ($myoptions['company_name']) {
              $nameCode = '"name" : "' . $myoptions['company_name'] . '" ';
              $location_id = '"@id" : "' . esc_url(home_url()) . '#' . seoUrl($myoptions['company_name']) . '", ';
            } else {
              $nameCode = '"name" : "' . get_bloginfo('name') . '", ';
              $location_id = '"@id" : "' . esc_url(home_url()) . '#' . seoUrl(get_bloginfo('name')) . '", ';
            }
          // Location Address
            if($address_line_1){
              $addressCode = '"streetAddress" :  "' . $address_line_1 . ' ' . $unit . '", ';  
            }
            if($city){
              $cityCode = '"addressLocality" :  "' . $city . '", ';  
            }
            if($state){
              $stateCode = '"addressRegion" :  "' . $state . '", ';  
            }
            if($post_zip){
              $zipCode = '"postalCode" :  "' . $post_zip . '", ';  
            }
            $full_address = $addressCode . $cityCode . $stateCode . $zipCode;
            $jsonAddress = rtrim($full_address, ', ');
            $address = '"address" : {"@type" : "PostalAddress",' . $jsonAddress . '}, ';
          // Location Phone
            if($phone){
              $phoneCode = '"telephone" : "' . $phone . '", ';  
            }
          // Location Email
            if($email){
              $emailCode = '"email" : "' . $email . '", ';  
            }
          // Location hours
            if ($hours) {
              $hoursCode = '"openingHoursSpecification" : [';
              foreach($hours as $hour){
                $jsonhoursCode = '{"@type": "OpeningHoursSpecification",';
                $days = $hour['days_of_the_week'];
                $opening_time = $hour['opening_time'];
                $closing_time = $hour['closing_time'];
                $time = '';
                if ($days) {
                  $time .= '"dayOfWeek": [';
                  $daysCode = '';
                  foreach($days as $day){
                    $daysCode .= '"' . $day . '", ';
                  }
                  $jsonDays = rtrim($daysCode, ', ');
                  $time .= $jsonDays . '], ';
                }

                if ($opening_time) {
                  $openingCode = '"opens" : "' . $opening_time . '", ';
                  $time .= $openingCode;
                }
                
                if ($closing_time) {
                  $closingCode = '"closes" : "' . $closing_time . '", ';
                  $time .= $closingCode;
                }
                $jsonHours = rtrim($time, ', ');
                $jsonhoursCode .= $jsonHours . '}, ';
              }
              
              $hoursCode .= rtrim($jsonhoursCode, ', ') . '],';
            }
          // Menu URL
            if($menu_url){
              $menuurlCode = '"menu" : "' . $menu_url . '", ';  
            }
          $location_info = $address . $phoneCode . $emailCode . $hoursCode . $menu_url;
          $json_locations = rtrim($location_info, ', ');
          $locations_info .= $json_locations;
        }
        
        $jsonLocation = rtrim($locations_info, ', ');
        $all_locations .= $jsonLocation;
      }
      
    }

  $combineJson = $company_type . $company_name . $company_logo . $company_description . $company_url . $company_social . $all_locations;
  $cleanJson = rtrim($combineJson, ', ');

  return '<script type="application/ld+json">{"@context": { "@vocab": "http://schema.org/" },' . $cleanJson . '} </script>';
}

?>