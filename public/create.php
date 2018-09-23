<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>
<style>
body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
</style>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading"><a href="index.php">App Addition Form</a></h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Details Form</h2>
   <p>Please enter the details</p>
   </div>
<?php
if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        
        $new_user = array(
             "name"     => $_POST['name'],
            "email"     => $_POST['email'],
            "username"  => $_POST['username'],
            "mobile"    => $_POST['mobile'],
            "password"  => $_POST['password']
            
        );

        $sql = sprintf( 
                "INSERT INTO %s (%s) values (%s)",
                "apps",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );
        
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>



<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['name']; ?> successfully added.</blockquote>
<?php } ?>

<form id="user" method="post">
        <div class="form-group">
            <input type="name" class="form-control" name="name" id="inputEmail" placeholder="App Name">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email Address">
        </div>

        <div class="form-group">
            <input type="username" class="form-control" name="username" id="inputusername" placeholder="User Name">
        </div>

        <div class="form-group">
            <input type="mobile" class="form-control" name="mobile" id="inputmobile" placeholder="Mobile Number">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
        </div>
        <div class="forgot">
        <a href="#">Forgot password?</a>
</div>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>

    </form>
    </div>
<p class="botto-text"> Designed by Ankur Agarwal</p>
</div></div></div>


</body>
</html>
