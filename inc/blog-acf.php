<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_586c1bc54babc',
  'title' => 'Blog Page Settings',
  'fields' => array (
    array (
      'multiple' => 0,
      'allow_null' => 1,
      'choices' => array (
        1 => '1',
        2 => '2',
        3 => '3',
      ),
      'default_value' => array (
      ),
      'ui' => 0,
      'ajax' => 0,
      'placeholder' => '',
      'return_format' => 'value',
      'key' => 'field_586c1bdc50a35',
      'label' => 'Post Template',
      'name' => 'post_template',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page_type',
        'operator' => '==',
        'value' => 'posts_page',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'side',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

endif; ?>