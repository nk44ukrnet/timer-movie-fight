<?php
function Redirect_to($New_Location) {
header("Location: " . $New_Location);
//exit();
}

function Login_Attempt ($Uname, $Upassword) {
    global $ConnectingDB;
    $sql = "SELECT * FROM admin WHERE name=:userName AND pass=:userPassword LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName', $Uname);
    $stmt->bindValue(':userPassword', $Upassword);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if($Result==1) {
        return $Found_Account=$stmt->fetch();
    } else {
        return null;
    }
}
?>