<?
session_start();

if(!isset(        $_POST["username"]))  {
    showlogin();
}
else
{
    include_once("dbinit.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userid= AuthenticateUserPass($username,$password);
  //  echo "userid=".$userid;


    if ( $userid >= 0)
    {
        $_SESSION['userID']=$userid;
        $user=get_user($_SESSION['userID']);
        //pr_dump("user",$user);
        //echo "usertype=". $user[0]['usertypeid'];
        if($user[0]['username']=="admin"){$URL="adminhome.php";
            ?>
            <script type="text/javascript">document.location.href="<?=$URL?>";</script>;

        <?
        }
        else{
            $URL="agenthome.php";
            ?><script type='text/javascript'>document.location.href="<?=$URL?>";</script>";
            <?


        }
    }
    else
        showlogin();
}
function showlogin(){
    global $userid;  ?>

    <link href="./cPanel Login_files/open_sans.min.css" rel="stylesheet" type="text/css">
    <link href="./cPanel Login_files/style_v2_optimized.css" rel="stylesheet" type="text/css">



    <div style="height:100px;position:relative;"></div>
    <div id="content-container">
        <div id="login-container">

            <div id="login-sub-container">
                <div id="login-sub-header" style="position:relative;padding:20px;">

                    <img class="" src="./images/logo1.png" alt="logo" style="width: 250px;">

                </div>
                <div id="login-sub" style="position:relative;">
                    <div id="clickthrough_form" style="visibility:hidden">
                        <form action="javascript:void(0)">
                            <div class="notices"></div>
                            <button type="submit" class="clickthrough-cont-btn">Continue</button>
                        </form>
                    </div>
                    <div id="forms">
                        <form id="loginform" method="post" action="#" target="_top" style="visibility:">
                            <div class="input-req-login"><label for="user">Username</label></div>
                            <div class="input-field-login icon username-container">
                                <input name="username" id="user" autofocus="autofocus" value="" placeholder="Enter your username." class="std_textbox"  <?if($userid==-1) echo"style='border:red solid 1px;'";?> type="text" tabindex="1" required="">
                            </div>
                            <div class="input-req-login login-password-field-label"><label for="pass">Password</label></div>
                            <div class="input-field-login icon password-container">
                                <input name="password"<?if($userid==-2) echo"style='border:red solid 1px;'";?> id="pass" placeholder="Enter your account password." class="std_textbox" type="password" tabindex="2" required="">
                            </div>
                            <div class="controls">
                                <div class="login-btn">
                                    <button name="login" type="submit" id="login_submit" tabindex="3">Log in</button>
                                </div>

                            </div>
                            <div class="clear" id="push"></div>
                        </form>
                        <!--CLOSE forms -->
                    </div>
                    <!--CLOSE login-sub -->
                </div>


                <!--CLOSE wrapper -->
            </div>
            <!--CLOSE login-sub-container -->
        </div>
        <!--CLOSE login-container -->
    </div>
















<?
}

?>



</body>
</Html>

