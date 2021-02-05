<?php 
    ob_start();
    if(isset($_COOKIE['session'])){
        $_SESSION['id'] = $_COOKIE['session'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/kineto.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title>Macdoos</title>
    <!-- PushAlert  
        <script type="text/javascript">
                (function(d, t) {
                        var g = d.createElement(t),
                        s = d.getElementsByTagName(t)[0];
                        g.src = "https://cdn.pushalert.co/integrate_f69002401830da8c7972cfb91c1deab6.js";
                        s.parentNode.insertBefore(g, s);
                }(document, "script"));
        </script>
          End PushAlert -->
<!-- GetButton.io widget 
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "105957348044204", // Facebook page ID
            whatsapp: "+201117952435", // WhatsApp number
            call_to_action: "راسلنا", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
/GetButton.io widget --> 
</head> 