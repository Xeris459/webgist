<?php
namespace App\Libraries;

use \App\Models\Meta_model;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CustemLibrary extends Controller
{
    
    public function slug($url): string
    {
        return str_replace( array( '-', '.', ' ', ',' ), '-', preg_replace('/[^A-Za-z0-9\s.\s-]/', '', $url));
    }

    public function change_format_date($date, $pemisah = '-'):string
    {
        $temp = expolode('-', $date);

        return $temp[2] . $pemisah . $temp[1] . $pemisah . $temp[0];
    }

    public function change_format_date_with_month($date, $pemisah = '-'):string
    {
        $temp = explode('-', $date);
        $tanggal = $temp[2];
        $tahun = $temp[0];

        switch($temp[1]){
            case 1:
                $bulan = 'January';
                break;
            case 2:
                $bulan = 'February';
                break;
            case 3:
                $bulan = 'March';
                break;
            case 4:
                $bulan = 'April';
                break;
            case 5:
                $bulan = 'May';
                break;
            case 6:
                $bulan = 'June';
                break;
            case 7:
                $bulan = 'July';
                break;
            case 8:
                $bulan = 'August';
                break;
            case 9:
                $bulan = 'September';
                break;
            case 10:
                $bulan = 'October';
                break;
            case 11:
                $bulan = 'November';
                break;
            default:
                $bulan = 'december';
                break;
        }

        return $tanggal . $pemisah . $bulan . $pemisah . $tahun;
    }

    public function Rechaptha($token, $key){
        $data = array(
            'secret' => $key,
            'response' => $token
        );
        
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        
        $res = json_decode($response, true);
        
        return $res;
        
    }

    public function meta(array $array = []){
        $webName = TITLE;
        $meta = [];
        $meti = new Meta_model();

        $def = $meti->first();

        $meta['title']          = $webName;
        $meta['desk_website']   = $def->desk;
        $meta['tag_website']    = $def->tag;
        $meta['image']          = base_url() . '/media/' . $def->image;
        $meta['url']            = base_url(uri_string());
        $meta['description']    = $meta['desk_website'];
        $meta['title']          = $webName;

        foreach ($array as $val) {   
            $meta['title']          = $val['title'] . " | " . $webName;
            $meta['description']    = isset($val['desk']) ? $val['desk'] : $meta['desk_website'];
            $meta['desk_website']   = $meta['description'];
            $meta['image']          = isset($val['image']) ? base_url() . '/media/' . $val['image'] : base_url() . '/media/' . $meta['image'];
        }
        
        return $meta;
        
    }

    public function sendEmail($to, $message, $subject, $devEmail = 'no-reply@sensualism.com', $devName = Email_Name_Team){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;     
            $mail->isSMTP();
            $mail->SMTPAuth   = true;
            // $mail->SMTPSecure = 'tls';
            $mail->Host       = 'mail.skinartsoul.com';
            $mail->Username   = 'dev@skinartsoul.com';
            $mail->Password   = 'dev@2021';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $mail->setFrom($devEmail, $devName);
            $mail->addAddress($to);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();

            $return = 1;
        } catch (Exception $e) {
            $return = 0;
        }

        return $return;
	}

    public function upload($field, $path,int $quality = 70){
        $request    = service('request');
        $file       = $request->getFile($field);
        
        if($file->isValid()){
            $new_name = $file->getRandomName();
            $image = \Config\Services::image()
                                            ->withFile($file)
                                            ->flatten(255,255,255)
                                            ->convert(IMAGETYPE_WEBP)
                                            ->save($path . $new_name, $quality);
    
            // $file->move($path, $new_name);

            return $new_name;
        } else {
            return false;
        }
    }

    public function change($field, $path, $redirect,  $size = 2048, $mime = 'image/png,image/jpg,image/jpeg', $ext = 'png,jpg,jpeg'){
        $request = service('request');
        $validation = \Config\Services::validation();
        $file = $request->getFile($field);
        
        if(!empty($file->getName())){
            $rule = [
                "$field" => [
                        'rules' => "is_image[$field]|max_size[$field,$size]|mime_in[$field,$mime]|ext_in[$field,$ext]",
                    ]
                ];
            
            if(!$this->validate($rule)){
                $massage = $validation->getErrors();
                session()->setFlashdata('error', $massage);

                return header("Location:". base_url() . $redirect);
            }

            if($file->isValid()){
                $new_name = $file->getRandomName();
        
                $file->move($path, $new_name);
    
                return $new_name;
            } else {
                $massage = "File tidak valid";
                session()->setFlashdata('error', $massage);
 
                return header("Location:". base_url() . $redirect);
            }
        }
    }
} 