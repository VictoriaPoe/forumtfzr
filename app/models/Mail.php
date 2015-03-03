<?php
$user = array(
'email'=>'viktorijapoe@gmail.com',
'name'=>'Viktorija Filipov'
);

// the data that will be passed into the mail view blade template
$data = array(
'detail'=>'Your awesome detail here',
'name'	=> $user('name'));


// use Mail::send function to send email passing the data and using the $user variable in the closure
Mail::send('emails.welcome', $data, function($message) use ($user)
{
$message->from('http://localhost/forumtfzr/public/', 'Viktorija Filipov');
$message->to($user['email'], $user['name'])->subject('Welcome to My Laravel app!');
});

?>