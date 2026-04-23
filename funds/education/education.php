<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='/projectd/funds/health/health.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education</title>
</head>
<body>
    <h2 style="text-align: center;">Education</h2>

    <div id='search'>
    <form id="search-input">
        <input type="search" name='search' id="search-box" placeholder="Search..." aria-label="Search through site content">
        <button type="submit" id='search-btn'><img src='/projectd/search.png' width='15px' height='15px'></button>
    </form>
    </div><br><br>

    <?php
			
			$conn = new mysqli("localhost" , "root" , "", "projectd");

			if($conn->connect_error){
    			die('Connection Error');
			}

            if (isset($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
    
    
        $sql = "SELECT * FROM newfund WHERE organisation OR description LIKE '%$search%'";
        $result = $conn->query($sql);

    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["category"] == "Education"){
                $donatepage = "/projectd/donate/donate.php?id=".$row['id'];
				$photoname = $row["photo"];
				$imagepath = "../fuploads/photos/".$photoname;
                $amount = $row['amount'];
                $amountraised = $row['amountraised'];
                echo "<div id='orgbox'>
		            <div id='orgimg'><img src='$imagepath' height=128px width=128px></div><h3 style=' margin-left=1000px;margin-top=-60px '>". $row["organisation"] ."</h3><p>". $row["description"] ."<div id='bar'>";
                    if(!($amountraised>=$amount)){
                        echo "Amount Raised: &#8377;$amountraised";
                        }else{
                            echo "Thank You";
                        }
                           echo "<progress value='$amountraised' max='$amount'></progress></div></p><button id='donate'><a href='/projectd/donate/donate.php?id=".$row['id']."'>Donate</a></button>
	                </div><br>";
                }
            }
        } else {
            echo "No results found.";
        }
    }else{
			$r = $conn->query("SELECT * FROM newfund");

			while($row = $r->fetch_assoc()){
                if($row["category"] == "Education"){
                $donatepage = "/projectd/donate/donate.php?id=".$row['id'];
				$photoname = $row["photo"];
				$imagepath = "../fuploads/photos/".$photoname;
                $amount = $row['amount'];
                $amountraised = $row['amountraised'];
                echo "<div id='orgbox'>
		            <div id='orgimg'><img src='$imagepath' height=128px width=128px></div><h3 style=' margin-left=1000px;margin-top=-60px '>". $row["organisation"] ."</h3><p>". $row["description"] ."<div id='bar'>";
                    if(!($amountraised>=$amount)){
                        echo "Amount Raised: &#8377;$amountraised";
                        }else{
                            echo "Thank You";
                        }
                           echo "<progress value='$amountraised' max='$amount'></progress></div></p><button id='donate'><a href='/projectd/donate/donate.php?id=".$row['id']."'>Donate</a></button>
	                </div><br>";
                }
			}
    }
    ?>
</body>
</html>