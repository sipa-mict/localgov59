<?php
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post')
{
	?>
	<html>
		<head>
			<title>Wordpress replace value in database.</title>
		</head>
		<body>
<pre>
<form action="#" method="post">
1. Set your browser's encoding same as database encoding.
2. Token: <input type="text" name="token" value="demo.localgov59.in.th"/>
3. Replacement: <input type="text" name="replacement" value="<?php echo $_SERVER['SERVER_NAME']; ?>"/>
<input type="submit" value="Start!" />
</form>
</pre>
		</body>
	</html>
	<?
	exit;
}

$token = $_POST['token'];
$replacement = $_POST['replacement'];

if (empty($token)) {
	die("empty token");
}


require "wp-config.php";
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);
if(defined('DB_CHARSET'))
	mysql_query("SET NAMES ".DB_CHARSET);

$affected_rows = array();
$result = mysql_query("SHOW TABLES FROM `".DB_NAME."`") or die(mysql_errno());
while($row = mysql_fetch_row($result)) {
	$tablename = $row[0];

	$search_fields = array();
	$primary_fields = array();

	$result2 = mysql_query("SHOW COLUMNS FROM `{$tablename}`") or die(mysql_errno());
	while($row2 = mysql_fetch_assoc($result2)) {
		$fieldname = $row2['Field'];
		if(strpos(($tmp_inline=strtolower($row2['Type'])), "varchar")!==FALSE || strpos($tmp_inline, "text")!==FALSE) {
			$search_fields[] = $fieldname;
		}
		if($row2['Key']=='PRI') {
			$primary_fields[] = $fieldname;
		}
	}
	mysql_free_result($result2);

	$sql = "SELECT * FROM `{$tablename}` WHERE ";
	for($i=0,$j=count($search_fields); $i<$j; $i++) {
		$sql .= "`{$search_fields[$i]}` LIKE '%{$token}%'";
		if($i+1<$j) $sql .= " OR ";
	}
	if(count($search_fields)) {
		$result3 = mysql_query($sql) or die(mysql_errno());
		while($record = mysql_fetch_assoc($result3)) {
			$update_keys = array();
			foreach($record as $key=>$val) {
				if(strpos($val, $token)!==FALSE) {
					if(($tmp_inline=unserialize($val))) {
						if(is_array($tmp_inline)) {
							foreach($tmp_inline as $a=>$b) {
								if(is_string($b))
									$tmp_inline[$a] = str_replace($token, $replacement, $b);
							}
							$tmp_inline = serialize($tmp_inline);
						}
						elseif(is_object($tmp_inline) && strtolower(get_class($tmp_inline))=='stdclass') {
							$tmp_inline = get_object_vars($tmp_inline);
							$tmp_object = new stdClass();
							foreach($tmp_inline as $a=>$b)
								$tmp_object->$a = str_replace($token, $replacement, $b);
							$tmp_inline = serialize($tmp_object);
						}
						else
							$tmp_inline = $val;
					}
					elseif($tmp_inline=json_decode($val)) {
						if(is_array($tmp_inline)) {
							foreach($tmp_inline as $a=>$b) {
								if (!is_string($b))
									continue;
								$tmp_inline[$a] = str_replace($token, $replacement, $b);
							}
						}
						elseif(is_object($tmp_inline) && strtolower(get_class($tmp_inline))=='stdclass') {
							$tmp_inline = get_object_vars($tmp_inline);
							$tmp_object = new stdClass();
							foreach($tmp_inline as $a=>$b) {
								if (is_string($b))
									$tmp_object->$a = str_replace($token, $replacement, $b);
							}
						}
						$tmp_inline = json_encode($tmp_inline);
					}
					else {
						$tmp_inline = str_replace($token, $replacement, $val);
					}
					$update_keys[] =  $key;
					$record[$key] = $tmp_inline;
				}
			}
			// -- update record --
			if(count($update_keys)) {
				$sql = "UPDATE `{$tablename}` SET ";
				foreach($update_keys as $key)
					$sql .= "`{$key}`='".addslashes($record[$key])."',";
				$sql = substr($sql,0,-1) . " "; // remove-last ,
				$sql.= "WHERE ";
				foreach($primary_fields as $key)
					$sql .= "`{$key}`='".addslashes($record[$key])."' AND";
				$sql = substr($sql,0,-3) . " "; // remove-last AND

				mysql_query($sql);
				if(empty($affected_rows[$tablename]))
					$affected_rows[$tablename] = 0;
				$affected_rows[$tablename] += mysql_affected_rows();
			}
			// -------------------
		}
		mysql_free_result($result3);
	}
}
mysql_free_result($result);
mysql_close();

echo "<pre>";
echo "token: {$token}\n";
echo "replacement: {$replacement}\n";
echo "<b>Affected Rows</b>\n";
echo "----------------------------------\n";
print_r($affected_rows);
echo "</pre>";

// -------------------
function escape_fields(&$item1, $key) {
	$item1 = "`{$item1}`";
}