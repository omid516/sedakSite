<?php
        $tempstr='';
        $i = 0;
if($_POST){
   if (!preg_match('/^[پچجحخهعغآآفقثصضشسیبلاتنمکگوئدذرزطظژ!!ؤإأءًٌٍَُِّ a-zA-Z\s]+$/u',$_POST["name"]) | $_POST["name"]=="" ) {
       $tempstr = $tempstr . '<div class="alert alert-danger">درج نام الزامی است.فقط از حروف الفبای فارسی یا انگلیسی استفاده کنید !</div>';
       $i++; 
       }
   if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) | $_POST["email"]=="") {
      $tempstr = $tempstr . '<div class="alert alert-danger">لطفا یک ایمیل معتبر وارد کنید</div>'; 
      $i++;
       }    
      if ( $_POST["message"]=="" ) {
       $tempstr = $tempstr . '<div class="alert alert-danger">درج پیام الزامی است !</div>'; 
       $i++;
       }
if ($i == 0){
	extract($_POST);
	$to = "sub7omid@gmail.com";
	$subject = "اطلاعات فرم ارسالی از سایت";
    $from = "info@sedak.ir";

    //begin of HTML message
    $message = '
<html>
<body>
	<table align="center" class="tbl" dir="rtl" >
	' ;
	$message .= '	
		<tr>
			<td style="font-family:tahoma;width:200px;background-color: #5CAAE6;">نام فرستنده</td>
			<td style="font-family:tahoma;font-weight:bold;background-color: #5CAAE6;">'.$_POST["name"].'</td>
		</tr>
		<tr>
			<td style="font-family:tahoma;width:200px;background-color: #C0C0C0;">ایمیل</td>
			<td style="font-family:tahoma;font-weight:bold;background-color: #C0C0C0;">'.$_POST["email"].'</td>
		</tr>
		<tr>
			<td style="font-family:tahoma;width:200px;background-color: #C0C0C0;">پیغام</td>
			<td style="font-family:tahoma;font-weight:bold;background-color: #C0C0C0;">'.$_POST["message"].'</td>
		</tr> ';
	$message .= '

	</table>

  </body>
</html>
' ;
   //end of message
    $headers  = "From: $from\r\n";
    $headers .= 'Content-type: text/html; charset="utf-8"\r\n';

    
    // now lets send the email.
    if(mail($to, $subject, $message, $headers))
        {echo '<div class="alert alert-success">با تشکر از شما.پیام شما ثبت شد<script>$(".contact-form")[0].reset();</script></div>'; exit();}
    else { echo '<div class="alert alert-danger">مشکلی در ثبت پیام وجود دارد</div>'; exit();}
}
else {echo $tempstr; exit();}
}
	
?>
