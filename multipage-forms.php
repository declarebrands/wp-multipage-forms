<?php
/**
 * @package Multi-Page Form
 * @version 0.1
 */
/*
Plugin Name: Multi-Page Form
Plugin URI: http://www.magnetsigns.net/wp-multipage-form
Description: A plugin to enable forms that span multiple pages
Author: Chris MacKay
Version: 0.1a
Author URI: http://www.chrismackay.me
*/

if ( !function_exists( 'add_action' ) ) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define('MPF_VERSION', '0.1a');
define('MPF_VERSION', plugin_dir_url( __FILE__ ));

add_shortcode('multipage_form_sc','multipage_form');
function multipage_form(){
  global $wpdb;
  $this_page = $_SERVER['REQUEST_URI'];
  $page = $_POST['page'];

  if ( $page == NULL ) {

    $form_output = '<form action="' . $this_page .'" method="post"><label id="first_name" for="first_name">First Name: </label>';
    $form_output .= '<input id="first_name" type="text" name="first_name" /><br />';
	  $form_output .= '<label id="last_name" for="last_name">Last Name: </label>';
	  $form_output .= '<input id="last_name" type="text" name="last_name" /><br />';
	  $form_output .= '<label id="email" for="email">Email: </label>';
	  $form_output .= '<input id="email" type="text" name="email" /><br />';
	  $form_output .= '<label id="phone" for="phone">Phone: </label>';
	  $form_output .= '<input id="phone" type="text" name="phone" /><br />';
	  $form_output .= '<label id="first_name" for="first_name">Zip/Postal Code: </label>';
	  $form_output .= '<input id="zip_code" type="text" name="zip_code" /><br />';
	  $form_output .= '<input type="hidden" name="page" value="1" />';
	  $form_output .= '<input type="submit" /></form>';
	  print $form_output;

  }//End Page 1 of Form

  // Start Page 2 of Form

  elseif ( $page == 1 ) {

    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $email = $_POST['email'];

    $phone = $_POST['phone'];

    $zip_code = $_POST['zip_code'];

    $page_one_table = 'shopping_preferences';

    $page_one_inputs = array(

      'first_name' => $first_name,

      'last_name' => $last_name,

      'email' => $email,

      'phone' => $phone,

      'zip_code' => $zip_code,

      'page' => $page

    );
		
		print_r($page_one_inputs);

    //$insert_page_one = $wpdb->insert($page_one_table, $page_one_inputs);

    //$form_id = $wpdb->insert_id;

    $form_output = '<form action="' . $this_page .'" method="post">';
		$form_output .= '<label id="gender" for="gender">Gender: </label>';
		$form_output .= '<select name="gender">';
		$form_output .= '<option selected="selected">Select</option>';
		$form_output .= '<option value="female">Female</option>';
		$form_output .= '<option value="male">Male</option>';
		$form_output .= '<option value="other">Other</option>';
		$form_output .= '</select><br />';
		$form_output .= '<label id="age" for="age">Age: </label>';
		$form_output .= '<input id="age" type="text" name="age" /><br />';
		$form_output .= '<label id="education" for="education">Education: </label>';
		$form_output .= '<select name="education">';
		$form_output .= '<option selected="selected">Select</option>';
		$form_output .= '<option value="Some High School">Some High School</option>';
		$form_output .= '<option value="High Scool Diploma / GED">High School Diploma / GED</option>';
		$form_output .= '<option vlaue="Some College">Some College</option>';
		$form_output .= '<option value="College Degree">College Degree</option>';
		$form_output .= '<option value="Some Graduate School">Some Graduate School</option>';
		$form_output .= '<option value="Graduate">Graduate</option>';
		$form_output .= '<option value="Some Post Graduate">Some Post Graduate</option>';
		$form_output .= '<option value="Doctorate">Doctorate</option>';
		$form_output .= '</select><br />';
		$form_output .= '<label id="income" for="income">Income: </label>';
		$form_output .= '<select name="income">';
		$form_output .= '<option selected="selected">Select Income Range</option>';
		$form_output .= '<option value="Less than 10,000">Less than $10,000</option>';
		$form_output .= '<option value="$10,000 - $25,000">$10,000 - $25,000</option>';
		$form_output .= '<option value="$25,000 - $50,000">$25,000 - $50,000</option>';
		$form_output .= '<option value="$50,000 - $75,000">$50,000 - $75,000</option>';
		$form_output .= '<option value="More than $75,000">More than $75,000</option>';
		$form_output .= '</select><br />';
		$form_output .= '<input type="hidden" name="page" value="2" />';
		$form_output .= '<input type="hidden" name="form_id" value="' . $form_id . '" />';
		$form_output .= '<input type="submit" />';
		$form_output .= '</form>';
		print $form_output;


  }// End Page 2 of Form

  // Start Page 3 of Form

  elseif( $page == 2 ) {

    $gender = $_POST['gender'];

    $age = $_POST['age'];

    $education = $_POST['education'];

    $income = $_POST['income'];

    $page = $_POST['page'];

    //$form_id = $_POST['form_id'];
		
		$page_two_table = 'shopping_preferences';

    $page_two_inputs = array(

      'gender' => $gender,

      'age' => $age,

      'education' => $education,

      'income' => $income,

      'page' => $page

    );
		
		print_r($page_two_inputs);

    //$page_two_where = array(

    //  'id' => $form_id

    //);
    //$insert_page_two = $wpdb->update($page_two_table, $page_two_inputs, $page_two_where);

  };// End Page 3 of Form

}// End multipage_form() function

?>
