<?php
namespace App\Helpers;
// use App\Models\user\Metricscore;
// use App\Models\User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * @name        Helper
 * @type        Helper
 * @project     
 * @author      B M A KAYUM
 * @contributor B M A KAYUM
 * @created     05th January, 2024
 * @modified    25th January, 2024
 * @location    Root/app/Helpers/Helper.php
 * @desc        This helper manages all helping method.
 */
class AppHelper
{
   

    /* @method  date_between_months
     * @param   startDate, endDate
     * @return  months
     * @access
     * @desc   Generate months between two dates.
     */
    public static  function date_between_months($startDate, $endDate){
        $months = array();
        while (strtotime($startDate) <= strtotime($endDate)) {
            $months[] = array('year' => date('Y', strtotime($startDate)), 'month' => date('m', strtotime($startDate)), );
            $startDate = date('01 M Y', strtotime($startDate.
                '+ 1 month')); // Set date to 1 so that new month is returned as the month changes.
        }
        foreach ($months as $month){
            $mm[] = $month['month'];
        }
        return $mm;
    }

    /* @method  date_between_days
     * @param   startDate, endDate
     * @return  total days
     * @access
     * @desc   Generate total days between two dates.
     */
     public static  function date_between_days($startDate, $endDate){
        $year = date('Y', strtotime($startDate));
        $months = array();
        while (strtotime($startDate) <= strtotime($endDate)) {
            $months[] = array('year' => date('Y', strtotime($startDate)), 'month' => date('m', strtotime($startDate)), );
            $startDate = date('01 M Y', strtotime($startDate.
                '+ 1 month')); // Set date to 1 so that new month is returned as the month changes.
        }
        foreach ($months as $month){
            if(Helper::check_leapyear($year) == true){
                $options = ['01'=>'31','02'=>'29','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31',];
            }else{
                $options = ['01'=>'31','02'=>'28','03'=>'31','04'=>'30','05'=>'31','06'=>'30','07'=>'31','08'=>'31','09'=>'30','10'=>'31','11'=>'30','12'=>'31',];
            }
            $days[] = $options[$month['month']];
        }
        return array_sum($days);
    }

    /* @method  check_leapyear
     * @param   year
     * @return  true or false
     * @access
     * @desc   Check this year whether leapyear
     */
    public  static function check_leapyear($year){
        if ($year % 400 == 0)
            return true;
        if ($year % 4 == 0)
            return true;
        else if ($year % 100 == 0)
            return false;
        else
            return false;
    }

    /* @method  slug
     * @param   title
     * @return  slug
     * @access
     * @desc   Slug this title
     */
    public static function slug($title){
        $slug = str_replace(' ', '_', strtolower($title));
        return $slug;
    }

    /* @method  checkEmail
     * @param   email
     * @return  true or false
     * @access
     * @desc    Check exits mail in user table
     */
    public static function checkEmail($email){
        $findemail = User::where('email', $email)->count();
        if($findemail > 0){
            return true;
        }else{
            return false;
        }
    }

    /* @method  customResponse
     * @param   type, message
     * @return  response
     * @access
     * @desc    This method implement for custom response
     */
    public static function customResponse($type, $msg){
        $response = [];
        switch ($type) {
            case "success":
                $response['code'] = 200;
                $response['type'] = "success";
                if($msg == 'insert'){
                    $response['msg'] = 'Data insert successfully';
                }
                if($msg == 'update'){
                    $response['msg'] = 'Data update successfully';
                }
                if($msg == 'delete'){
                    $response['msg'] = 'Data delete successfully';
                }
                return $response;
                break;
            case "error":
                $response['code'] = 500;
                $response['type'] = "error";
                if($msg == 'insert'){
                    $response['msg'] = 'Data not insert successfully';
                }
                if($msg == 'update'){
                    $response['msg'] = 'Data not update successfully';
                }
                if($msg == 'delete'){
                    $response['msg'] = 'Data not delete successfully';
                }
                return $response;
                break;
            default:
                $response = [];
                return $response;

        }
    }

    /* @method  message
     * @param   type
     * @return  response
     * @access
     * @desc    This method implement for custom message
     */
    public static function message($type){
        $response = [];
        switch ($type) {
            case "insert":
                $response['msg'] = 'Data insert successfully';
                return $response;
                break;
            case "update":
                $response['msg'] = 'Data update successfully';
                return $response;
                break;
            case "delete":
                $response['msg'] = 'Data delete successfully';
                return $response;
                break;
            default:
                $response = [];
                return $response;

        }
    }

    /* @method  uploadFile
     * @param   requestfile, prefixfilename
     * @return  filename
     * @access
     * @desc    For upload file
     */
    public static function uploadFile($requestfile, $prefixfilename, $location){
        //$filename = $prefixfilename.rand().'_'.$requestfile->getClientOriginalName();.
        $filename = $prefixfilename.rand().'.'.$requestfile->getClientOriginalExtension();
        $path = $requestfile->move('uploads/'.$location, $filename);
        //$path = $requestfile->store('uploads/' . $location);
        if($path){
            return $filename;
        }else{
            return false;
        }
    }

    /* @method  uploadVideo
     * @param   requestfile, prefixfilename
     * @return  filename
     * @access
     * @desc    For upload video
     */
    public static function uploadVideo($requestfile, $prefixfilename, $location){
        $filename = $prefixfilename.rand().'.'.$requestfile->getClientOriginalExtension();
        $path = $requestfile->move('uploads/'+$location, $filename);
        if($path){
            return $filename;
        }else{
            return false;
        }
    }

    /* @method  division_num
     * @param   numfirst, numsecond
     * @return  division result
     * @access
     * @desc    For calculate division
     */
    public static function division_num($numfirst,$numsecond){
        return $numsecond == 0 ? 0 : ($numfirst / $numsecond);
    }

    /* @method  thumbnailDelete
     * @param   thumbnail
     * @return  true or false
     * @access
     * @desc    For delete thumbnail
     */
    public static function thumbnailDelete($thumbnail){
        $file_delete = base_path().'/upload/'.$thumbnail;
        if(file_exists($file_delete)){
            @unlink($file_delete);
            return true;
        }else{
            return false;
        }
    }

    /* @method  otpcode
     * @param
     * @return  code
     * @access
     * @desc    Generate otpcode
     */
    public static function otpcode(){
        $logkey = trim(rand(100000, 999999));
        return $logkey;
    }

    /* @method  customPHPMail
     * @param   toaddress, message
     * @return  true or false
     * @access
     * @desc    For mail send
     */
    public static function customPHPMail($toaddress, $message){
        $mail = new PHPMailer;

        // SMTP configurations
        /*$mail->isSMTP();
        $mail->Sendmail = '/usr/sbin/sendmail';
        $mail->Host     = 'email-smtp.us-east-1.amazonaws.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'AKIAVA5HK7633NFJNZ4Y';
        $mail->Password = 'BI269433tkEGs81IyO3ffFpYjdwyAQH11VYLit5XKsc9';
        $mail->SMTPSecure = 'tls';
        $mail->Port        = 587;*/

        $mail->isSMTP();
        $mail->Sendmail     = env('MAIL_SENDMAIL');
        $mail->Host         = env('MAIL_HOST');
        $mail->SMTPAuth     = env('MAIL_SMTPAUTH');
        $mail->Username     = env('MAIL_USERNAME');
        $mail->Password     = env('MAIL_PASSWORD');
        $mail->SMTPSecure   = env('MAIL_ENCRYPTION');
        $mail->Port         = env('MAIL_PORT');

        $mail->setFrom('no-replay@webytor.com', 'Goal System');
        $mail->addAddress($toaddress);
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        $mail->isHTML(true);

        $mail->Subject = 'Confirm Code Notification';
        // Email body content
        $mailContent = '
        <h2>Hello!</h2>
        <h4>Welcome Goal System</h4>
        <h4>'.$message.'</h4>';
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

    }
















} //class close





?>
