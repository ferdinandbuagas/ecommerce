<?php 
require '/../config.php';


/*This will trigger email to Seller/Clients*/
function emailSeller(){

$post = array(
	'author' => 'iSYS 6',
	'title' => 'Your Title here',
	'body' => 'Your Body here',
	'publish-date' => 'Publish Date Here',
	'category' => 'Category Here' 
);

extract($post);
$email = <<<EOT

<h4>$title</h1>
<p>By: $author</p>
<div>$body</div>
EOT;

return $email;
}

/*This will trigger email to Members*/
function emailMembers(){

$post = array(
	'author' => 'iSYS 6',
	'title' => 'Your Title here',
	'body' => 'Your Body here',
	'publish-date' => 'Publish Date Here',
	'category' => 'Category Here' 
);

extract($post);
$email = <<<EOT

<h4>$title</h1>
<p>By: $author</p>
<div>$body</div>
EOT;

return $email;
}







	

?>