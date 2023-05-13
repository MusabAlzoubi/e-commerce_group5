<?php   include "include/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- bootstrap -->
	
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/content.css">


	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="user.php">
					<i class='bx bx-user' style='color:#f54300' ></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-user' style='color:#f54300' ></i>
					<span class="text">Admin</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Product</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bx-cart-alt' style='color:#f54300'  ></i>
					<span class="text">Order</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			
		<h1 style="color:#dc143c; text-align:center;margin:20px;">Admin Dashbord</h1>
    <div class="user-container">
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }

		

// $result = mysqli_query($conn, $sql);

// if ($result) {
//     header("Location: main.php?msg=Data deleted successfully");
// } else {
//     echo "Failed: " . mysqli_error($conn);
// }
        ?>

        <a href="#add" class="btn btn-danger mb-3 " >Add Employees</a>
        <table class="table" >
            <thead style="background-color:black; color:white; ">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `users` where rule = 3" ;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                    <td><?php echo $row["id"] ?></td>
                        <td><?php echo "<img src='/img" . $row['image'] . "' width='50'>"; ?></td>
                        <td><?php echo $row["Name"] ?></td>
                        <td><?php echo $row["Email"] ?></td>
                        <td><?php echo $row["Password"] ?></td>
                        <td><?php echo $row["Mobile"] ?></td>
                        <td><?php echo $row["City"] ?></td>
                        <td><?php echo $row["Address"] ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-file-pen  fs-5 me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
				<?php
				

?>
            </tbody>
        </table>
    </div>
	<?php
// include "connection.php";

if (isset($_POST["submit"])) {
    $name = $_POST['Name'];
	$image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $path = '/img';
    move_uploaded_file($tmp_name, $path.$image);
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$Mobile=$_POST['Mobile'];
	$Address=$_POST['Address'];
    $city = $_POST['city'];

    do
    {
        
    $sql = "INSERT INTO `users`( `Name`, `Email`, `Password`, `Mobile`, `City`, `Address`, `image`,`rule`) VALUES ('$name','$Email','$Password','$Mobile','$Address','$city',' $image',3)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: main.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
    
    } while(false);
} 
?>

				<form action="" method="POST" class=add-user>
					<input class=add-user type="text" name="Name" placeholder="Name">
					<input type="text" name="Email" placeholder="Email">
					<input type="text" name="Password" placeholder="Password">
					<input type="text" name="Mobile" placeholder="Mobile">
					<input type="text" name="Address" placeholder="Address">
					<select name="city" id="">
						<option value="Amman">Amman</option>
						<option value="Salt">Salt</option>
						<option value="Irbid">Irbid</option>
					</select>
					<input type="file" name="image" placeholder="image" >
					<button name="submit">Add</button>







				</form>
    </div>
	
	</section>
	<!-- CONTENT -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	
	<script src="js/script.js"></script>
</body>
</html>