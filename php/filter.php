<?php
	require_once "config.php";

	if(isset($_POST['action'])){
		$sql = "select mid,mname,image,rating,lang,group_concat(genre) as genre from movies join movie_genre using(mid) ";
		if(isset($_POST['lang']) && isset($_POST['genre'])){
			$lang = implode("','", $_POST['lang']);
			$genre = implode("','", $_POST['genre']);
			$sql.="where lang in('".$lang."') and mid in (select mid from movie_genre where genre in('".$genre."'))";
		}elseif (isset($_POST['lang'])) {
			$lang = implode("','", $_POST['lang']);
			$sql.="where lang in('".$lang."')";
		}elseif(isset($_POST['genre'])){
			$genre = implode("','", $_POST['genre']);
			$sql.="where mid in (select mid from movie_genre where genre in('".$genre."'))";
		}
		$sql.=" group by mid";
		mysqli_query($conn,$sql) or die($sql);
		$result = mysqli_query($conn,$sql);
		$output = '';	

		if($result->num_rows > 0){
			while($row = mysqli_fetch_array($result)){
				$output.='<div class="card"><image src=" ' .$row['image']. '" height ="400" width ="300"> 
					<a href="movies.php?id=' .$row['mid']. '"><pre style="font-size:18px">' .$row['mname']. '</pre></a>
					<a href="search-misc.php?key=rating&val=' .$row['rating'].'"><pre style="color: #808080;font-size:12px;display: inline;">' .$row['rating']. '</pre></a>
					<a href="search-misc.php?key=genre&val=' .$row['genre'].'"><pre style="color:#808080;font-size:12px;display: inline;">|' .$row['genre']. '</pre></a>
					<a href="search-misc.php?key=lang&val=' .$row['lang'].'"><pre style="color: #808080;font-size:12px;display: inline;">|' .$row['lang']. '</pre></a></div><br/>';
			}
		}
	}else{
		$output .= "<h2>No results found!</h2>";
	}
	echo $output;

	//close connection
	mysqli_close($conn);
?>