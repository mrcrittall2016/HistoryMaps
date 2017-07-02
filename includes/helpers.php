<?php
    
    //require_once("config.php");
    
    // library for emailing client
    //require("libphp-phpmailer/class.phpmailer.php");
    require(__DIR__ . "/../phpmailer/PHPMailer-phpmailer-5.2.0/class.phpmailer.php");
    
    
    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
    
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view 
            require("views/{$view}");
          
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
    
    // Second argument inserted by MRC (href) to allow user to determine where to redirect to after message is shown
    function apologize($message, $href)
    {
        render("apology.php", ["message" => $message, "link" => $href]);
    }
    
    
    // Function to encode non-UTF-8 characters in SQL table hence avoiding json_encode failures
    function utf8_encode_recursive ($array)
    {
        $result = array();
        
        foreach ($array as $key => $value)
        {
            if (is_array($value))
            {
                $result[$key] = utf8_encode_recursive($value);
            }
            else if (is_string($value))
            {
                $result[$key] = utf8_encode($value);
            }
            else
            {
                $result[$key] = $value;
            }
        }
        return $result;
    }
    
    // mail function added by MRC. Note, need $mail->MsgHTML($body) to send HTML links
    function email($address, $subject, $body)
    {
        $mail = new PHPMailer();
        
        // use SMTP
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Password = "crimson50";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Username = "jharvard@cs50.net";
        $mail->MsgHTML($body);
          
        // set From:
        $mail->SetFrom("jharvard@cs50.net");
          
        // set To:
        $mail->AddAddress("$address");

        // set Subject:
        $mail->Subject = "$subject";
             
        // set body
        $mail->Body = 
            "$body\n\n";
            
        // send mail
        if ($mail->Send() == false)
        {
            print($mail->ErrInfo);
            exit;
        }
        /*
        else
        {
            echo "Mail sent successfully.";
        }*/
    }
    
    // function to get username from SQL table 
    function get_user()
    {
        $rows = Database::query("SELECT username FROM `history_maps` . `users` WHERE id = ?", $_SESSION["id"]);
        $username = $rows[0]["username"];
        return $username;
    }
    
    // function to obtain current battle index for that username
    function battle_index($username)
    {
        $rows = Database::query("SELECT * FROM `history_maps`. `scores` WHERE username = ? ORDER BY battle_index DESC LIMIT 1", $username);
        $battle_index = $rows[0]["battle_index"];
        return $battle_index; 
    }
    
    
    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }
?>