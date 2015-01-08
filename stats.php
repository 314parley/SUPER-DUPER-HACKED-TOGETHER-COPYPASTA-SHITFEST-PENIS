<html>
  <head>
      <style>
		  table,th,td
		  {
		  	border:1px solid black;
		  	border-collapse:collapse;
		  }
		  th,td
		  {
		  	padding:5px;
		  }
		  caption{
		  	/* way too lazy to figure out another way to do this. deal w/ it fgt*/
		  	border-top: 1px solid black;
		  	border-left: 1px solid black;
		  	border-right: 1px solid black;
		  	border-collapse: collapse;
		  	background: tan;
		  }
		  h1{
		  	text-align: center;
		  }
	</style>
  </head>
  <body>
<h1>711chan Statistics</h1>
<?php
	require 'config.php';
	require_once KU_ROOTDIR . 'inc/functions.php';
	$totalposts = array();
	$currentusers = array();
	//posts
	$resultposts = $tc_db->GetAll("SELECT COUNT(*) FROM `" . KU_DBPREFIX . "posts` WHERE `IS_DELETED` = 0");
	foreach ($resultposts as $line){
		$totalposts = $line['COUNT(*)'];
	}
	//banlist
	$resultban = $tc_db->GetAll("SELECT DATE( FROM_UNIXTIME(  `at` ) ) AS visitDate, COUNT( v.id ) FROM banlist v WHERE FROM_UNIXTIME(  `at` ) >= CURDATE( ) - INTERVAL DAYOFWEEK( CURDATE( ) ) +29
DAY AND FROM_UNIXTIME(  `at` ) < CURDATE( ) - INTERVAL DAYOFWEEK( CURDATE( ) ) -1
DAY GROUP BY visitDate");
	$resultppd = $tc_db->GetAll("SELECT DATE( FROM_UNIXTIME(  `timestamp` ) ) AS postDate, COUNT( v.id ) FROM posts v WHERE FROM_UNIXTIME(  `timestamp` ) >= CURDATE( ) - INTERVAL DAYOFWEEK( CURDATE( ) ) +29
DAY AND FROM_UNIXTIME(  `timestamp` ) < CURDATE( ) - INTERVAL DAYOFWEEK( CURDATE( ) ) -1
DAY GROUP BY postDate");
	//current users
	$resultusers = $tc_db->GetAll("SELECT COUNT(DISTINCT `ipmd5`) FROM `" . KU_DBPREFIX . "posts` WHERE `IS_DELETED` = 0");
	foreach ($resultusers as $line){
		$currentusers = $line['COUNT(DISTINCT `ipmd5`)'];
	}
	
	
		$spaceused_res = 0;
		$spaceused_src = 0;
		$spaceused_thumb = 0;
		$spaceused_total = 0;
		$files_res = 0;
		$files_src = 0;
		$files_thumb = 0;
		$files_total = 0;
		
		$results = $tc_db->GetAll("SELECT HIGH_PRIORITY `name` FROM `" . KU_DBPREFIX . "boards` ORDER BY `name` ASC");
		foreach ($results as $line) {
			list($spaceused_board_res, $files_board_res) = recursive_directory_size(KU_BOARDSDIR . $line['name'] . '/res');
			list($spaceused_board_src, $files_board_src) = recursive_directory_size(KU_BOARDSDIR . $line['name'] . '/src');
			list($spaceused_board_thumb, $files_board_thumb) = recursive_directory_size(KU_BOARDSDIR . $line['name'] . '/thumb');
			$spaceused_board_total = $spaceused_board_res + $spaceused_board_src + $spaceused_board_thumb;
			$spaceused_total += $spaceused_board_total;
			$activecontent = ConvertBytes($spaceused_total);
		}
			//misc statistics
			$bans = $tc_db->GetOne("SELECT COUNT(*) FROM `".KU_DBPREFIX."banlist`");
			$wf = $tc_db->GetOne("SELECT COUNT(*) FROM `".KU_DBPREFIX."wordfilter`");
			$news = $tc_db->GetOne("SELECT COUNT(*) FROM `".KU_DBPREFIX."front` WHERE `page` = 0");
			$rules = $tc_db->GetOne("SELECT COUNT(*) FROM `".KU_DBPREFIX."front` WHERE `page` = 2");
			$faq = $tc_db->GetOne("SELECT COUNT(*) FROM `".KU_DBPREFIX."front` WHERE `page` = 1");



//trying shit out
	//most active staff
	//SELECT `by`, COUNT(1) AS `cnt` FROM keywords GROUP BY query
	$resultstaff = $tc_db->GetAll("SELECT `by`, COUNT(1) AS `cnt` FROM `" . KU_DBPREFIX . "banlist` GROUP BY `by` ORDER BY cnt DESC");
	foreach ($resultstaff as $line){
		$staff = $line['COUNT(DISTINCT `by`)'];
	}

		
?>
<pre>
<!--<?
var_dump($resultppd);
?>-->
</pre>
<table border="1" style="width:300px">
<caption>Active Content</caption>
<tr>
  <td><strong>Unique Users</strong></td>
  <td><strong>Active Content</strong></td>
  <td><strong>Active Wordfilters</strong></td>
</tr>
<tr>
  <td><?php echo $currentusers;?></td> 
  <td><?php echo $activecontent;?></td>
  <td><?php echo $wf;?></td>
</tr>
</table>

<br />

<table border="1" style="width:500px">
<caption>Total Numbers</caption>
<tr>
  <td><strong>Total Number of Posts</strong></td>
  <td><strong>Total Number of Banned Users</strong></td>
  <td><strong>Total Number of News Entries</strong></td>
  <td><strong>Total Number of Rules Entries</strong></td>
  <td><strong>Total Number of FAQ Entries</strong></td>
</tr>
<tr>
  <td><?php echo $totalposts;?></td>
  <td><?php echo $bans;?></td>
  <td><?php echo $news;?></td>
  <td><?php echo $rules;?></td>
  <td><?php echo $faq;?></td>
</tr>
</table>

<br />

<table>
<caption>Ban Statistics</caption>
<?php
foreach($resultstaff as $item){
if($item['by']==='board.php'){
	$item['by'] = "autobanned users";
}
	echo "<tr><th>".$item['by']."</th><td>".$item['cnt']."</tr>";
}
?>
</table>
<?

?>
<!-- date("F j, Y, g:i a", $line['at']) -->
<div id="chart_div" style="width: 900px; height: 500px;"></div>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Bans'],
          <?php
          	foreach ($resultban as $line){
			  	echo "['";
			  	print_r($line['visitDate'].'\', 0'.$line['COUNT( v.id )']);
			  	echo "],\n";
			  	//var_dump($line);
			}
          ?>
        ]);
        var users = google.visualization.arrayToDataTable([
        ['Date', 'Users'],
        <?
        foreach ($resultppd as $lines){
			  	echo "['";
			  	print_r($lines['postDate'].'\', 0'.$line['COUNT( v.id )']);
			  	echo "],\n";
        }
        ?>
        ]);

        var options = {
          title: 'Charting stuff',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        var uchart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        //chart.draw(users, options);
      }
    </script>
</body>
</html>