
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, ample admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, material design, material dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Ample is powerful and clean admin dashboard template, inpired from Google's Material Design">
    <meta name="robots" content="noindex,nofollow">
    <title>Ethical Research Solution</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/images/favicon.ico')}}">title>Ethical Research Solution</title>
</head>

<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
            <tbody>
            <tr>
                <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="www.ethicalresearchsolution.com" target="_blank"><img src="{{asset('/images/favicon.ico')}}" alt="Logo" style="border:none"><br/>
                        <img src="{{asset('/images/favicon.ico')}}" alt="Eliteadmin Responsive web app kit" style="border:none"></a> </td>
            </tr>
            </tbody>
        </table>
        <div style="padding: 40px; background: #fff;">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr>
                    <td style="border-bottom:1px solid #f6f6f6;">
                        <h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear {{$user->last_name}} {{$user->first_name}},</h1>
                        <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 0 30px 0;">
                        <p>A request to reset your Admin password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p>
                        <center>
                            <a href="{{ route('user.getReset',$user->reset) }}" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;">Reset Password</a>
                        </center>
                        <b>- Thanks Ethical</b> </td>
                </tr>
                <tr>
                    <td style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">If the button above does not work, try copying and pasting the URL into your browser. If you continue to have problems, please feel free to contact us at <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="036a6d656c43776b666e666766706a646d66712d6a6d">[email&#160;protected]</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>

</html>
