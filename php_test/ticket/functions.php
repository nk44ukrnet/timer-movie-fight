<?php
function Login_Attempt($UserName,$Password){
    global $conn;
    $sql = "SELECT * FROM admins WHERE username=:userName AND password=:passWord LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':userName', $Username);
    $stmt->bindValue(':passWord', $Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result==1) {
//        return $Found_Account=$stmt->fetch();
        echo '+++';
    }else {
//        return null;
        echo '---';
    }
}
function Confirm_Login(){
    if (isset($_SESSION["UserId"])) {
        return true;
    }  else {
        $_SESSION["ErrorMessage"]="Login Required !";
        Redirect_to("Login.php");
    }
}

?>