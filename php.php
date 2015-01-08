<?php
/* 
	ihatecaptchas
	Written by: anon
	For: solving ihatemen's math problem on their login page, but can be expanded to anywhere.
	Version: 1.0
	
*/
#make the HTML plaintext
header('Content-Type: text/plain');
#the URL we're targeting
$url = "http://www.ihatemen.org/wp-login.php";
#get file contents, and assign to str
$str = file_get_contents($url);
#elegant way of splitting each line of the html
$lines = explode(PHP_EOL, $str);
#for each line of the html, assign to $line
foreach($lines as $line) {
	#if something from the line matches "What is"...
    if(strpos($line, 'What is') !== FALSE) {
    	#strip the HTML tags, and assign the string to question
        $question = strip_tags($line);
        #strip the extra spaces... this is hacky, but it works
        $question = trim(preg_replace('/\s+/',' ', $question));
    }
}
#Server's question
echo $question."\n";
# strip "What is" from the string, and call it problem
$problem = str_replace('What is ', '', $question);
#if there is a match for a math problem (ignore the complexity, I literally copypasta'd it)
if(preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $problem, $matches) !== FALSE){
    $operator = $matches[2];
	#solve that bitch!
    switch($operator){
        case '+':
            $answer = $matches[1] + $matches[3];
            break;
        case '-':
            $answer = $matches[1] - $matches[3];
            break;
        case '*':
            $answer = $matches[1] * $matches[3];
            break;
        case '/':
            $answer = $matches[1] / $matches[3];
            break;
    }
}
echo $answer;
?>