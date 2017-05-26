<?php
/**
 * Template Name: Contacts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rara_Journal
 */

$sidebar_layout = rara_journal_sidebar_layout();

get_header(); ?>

<?php 
if(isset($_POST['submit'])){
    $to = get_option("admin_email"); // this is your Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo '<div class="success_msg">' . "Mail Sent. Thank you " . $first_name . ", we will contact you shortly." . '</div>';
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>



<div class="row">
  <div class="col-md-8">
  	<!-- <form class="form-horizontal" role="form" method="post" action="index.php">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="message" class="col-sm-2 control-label">Message</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="4" name="message"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			
		</div>
	</div>
</form> -->

<form action="" method="post">
 <input type="text" class="cnt_input" name="first_name" placeholder="First Name:">
<input type="text" class="cnt_input" name="last_name" placeholder="Company">
<input type="email" class="cnt_input" name="email" placeholder="Email ">
<input type="phone" class="cnt_input" name="email" placeholder="Phone ">
<textarea rows="5" name="message" cols="13" placeholder="Message:" class="cnt_textarea"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

  </div>

<!-- Left Sidebar starts here -->

  <div class="col-md-4 contacts_section">
  	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'template-parts/content', 'page' ); ?>
	<?php endwhile; // End of the loop. ?>

  </div>
</div>

	
<?php 
if( $sidebar_layout == 'right-sidebar' ) get_sidebar(); 
get_footer();