<?php // Creating the widget 
class acli_company_info_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      // Base ID of your widget
      'acli_company_info_widget', 

      // Widget name will appear in UI
        __('Company Info Widget', 'acli_company_info_widget_domain'), 

      // Widget description
      array( 'description' => __( 'Displays company info set in company info options page', 'acli_company_info_widget_domain' ), ) 
    );
  }

  // Creating widget front-end
  // This is where the action happens
  public function widget( $args, $instance ) {
  
    $title = apply_filters( 'widget_title', $instance['title'] );
    $address = $instance['address']; 
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) ){echo $args['before_title'] . $title . $args['after_title'];}
    if ( ! empty( $address ) ){echo displayAddress($instance[ 'address' ]);}  

      // This is where you run the code and display the output
    echo __( 'Hello, World!', 'acli_company_info_widget_domain' );
    echo $args['after_widget'];
  }
    
  // Widget Backend 
    public function form( $instance ) {
      if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
      }
      if ( isset( $instance[ 'address' ] ) ) {
        $address = $instance[ 'address' ];
      }
      else {
        $title = __( 'New title', 'acli_company_info_widget_domain' );
        $address = '';
      }
  // Widget admin form
?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
      </p>
      <p>
        <input type="checkbox" checked id="<?php echo $this->get_field_id( 'address_parts_all' ); ?>" name="<?php echo $this->get_field_name( 'address_parts_all' ); ?>" value="showAll">
        <label for="<?php echo $this->get_field_id( 'address_parts_all' ); ?>"><?php _e( 'Show All' ); ?></label> 

        <input type="checkbox" checked id="<?php echo $this->get_field_id( 'address_parts_address' ); ?>" name="<?php echo $this->get_field_name( 'address_parts_address' ); ?>" value="showAll">
        <label for="<?php echo $this->get_field_id( 'address_parts_address' ); ?>"><?php _e( 'Show Address' ); ?></label> 

        <input type="checkbox" id="<?php echo $this->get_field_id( 'address_parts_phone' ); ?>" name="<?php echo $this->get_field_name( 'address_parts_phone' ); ?>" value="showAll">
        <label for="<?php echo $this->get_field_id( 'address_parts_phone' ); ?>"><?php _e( 'Show Phone' ); ?></label> 

        <input type="checkbox" id="<?php echo $this->get_field_id( 'address_parts_email' ); ?>" name="<?php echo $this->get_field_name( 'address_parts_email' ); ?>" value="showAll">
        <label for="<?php echo $this->get_field_id( 'address_parts_email' ); ?>"><?php _e( 'Show Email' ); ?></label> 
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address Number:' ); ?></label> 
          <?php 
            $address_rows = get_field('company_address', 'options');
            if($address_rows){
              $i = 0;
              echo '<select id="' . $this->get_field_id( 'address' ) . '" name="' . $this->get_field_name( 'address' ) . '">';
              foreach($address_rows as $address_row){
                $i++;
                echo '<option value="' . $i . '">' . $i . '</option>' ;
              }
              echo '</select>';
            }
            else{
              return '<span>You have no addresses registered</span>';
            } 
          ?>
      </p>
<?php 
  }
  
  // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? $new_instance['address'] : '';
      return $instance;
    }
  } // Class acli_company_info_widget ends here

// Register and load the widget
function wpb_load_widget() {
  register_widget( 'acli_company_info_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' ); ?>