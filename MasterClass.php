<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;

class rdc
{
    public $base_domian_path = "http://rdccharlie.com/basecrm/";
   
    public $email_config;
    public $email_box = array(
        array(
            "smtp_host" => "send.one.com",
            "smtp_port" => "465",
            "imapPath" => "{imap.one.com:993/imap/ssl}INBOX",
            "username" => "bot@rdccharlie.com",
            "password" => "password",
        )
    );
    private $lead_from = array(
        "address_1" => array(
            "email" => "leads@email.realtor.com",
            "subject_search" => 'New realtor.com',
            "mobile_no_last_string" => "Comment:",
            "forwarding_rule_amount" => 200000,
            "post_rule_code" => 85253
        )
    );
    private $base_crm_config = array(
        'accessToken' => '1fc9a174832498a758224b72f4d246adf9f6cfdaec33b19f2c770ffb83e62357'
    );
    private $twilio_config = array(
        "AccountSid" => "ACfd5e34ad10ec64d0ab97c7c43202c686",
        "AuthToken" => "b8931b8dd4db63aba48be24435dfffc4"
    );
    private $zoho_config = array(
        "token" => '11744461ddb23a96ed7ce57f31b18494'
    );
    private $ring_central_config = array(
        "appKey" => 'qrwinWHsTRiyFiq20iPFQQ',
        "appSecret" => 'Xz6M1Z2MRpObzKvXVugCZgBFpi2J-jR3O4f-pbXEtSJA',
        "username" => "+14805256665",
        "password" => "Panther1!"
    );
   
    private $debug = true;
    private $execution_start_time;
    private $email_check_from_date;
    private $email_read_type = "UNSEEN";

    function __construct()
    {
        $this->debug();
        $this->load();
		$this->init();

    }

    private function init()
    {
        @session_start();
        date_default_timezone_set('US/Arizona');
        $this->execution_start_time = time();
        $this->email_check_from_date = "01 Nov 2016";
        //$this->email_check_from_date = date('d M Y', $this->execution_start_time);
        //echo $this->email_check_from_date;
    }

    public function run_email_loop()
    {

		
        $now_exc = time();
        if ($this->execution_start_time + 57 < $now_exc) {
            echo "<div>" . "Executed:  start:" . $this->execution_start_time . ",  end:" . $now_exc . "</div>";
            //  die();
        }
        foreach ($this->email_box as $email_box_one) {
            $this->email_config = $email_box_one;
            foreach ($this->lead_from as $lead_from) {
                $this->read_and_process_email($lead_from);
               // echo "insideRunEMAIL";
            }
        }

    }

    public $domain_set = array(
        "Charlie" => array(
            "app_name" => "Charlie",
            "from" => "+14805258426",
            "to" => "+14805256665",
            "alt_number" => "+16023631448",
            "source_id" => "621827"
        ),
        "Bravo" => array(
            "app_name" => "Bravo",
            "from" => "+16023131343",
            "to" => "+14805256665",
            "alt_number" => "+16023965471",
            "source_id" => "621827"
        ),
        "Alpha" => array(
            "app_name" => "Alpha",
            "from" => "+14805257949",
            "to" => "+14805256665",
            "alt_number" => "+16023965471",
            "source_id" => "621826"
        )

    );

    

    private function read_and_process_email($lead_from)
    {
        $inbox = imap_open($this->email_config["imapPath"], $this->email_config["username"], $this->email_config["password"]) or die('Cannot connect to ' . $this->email_config["username"] . " : " . imap_last_error());
        $emails = imap_search($inbox, $this->email_read_type . ' FROM "' . $lead_from["email"] . '" SINCE "' . $this->email_check_from_date . '"');
        if ($emails) {
            //echo "if";
            $emails = array_reverse($emails);
            $data_total_array = array();
            foreach ($emails as $mail) {
                //echo "loop";
                imap_setflag_full($inbox, $mail, "\\Seen \\Flagged", ST_UID);
                $headerInfo = imap_headerinfo($inbox, $mail);
                $email_body = strip_tags(imap_fetchbody($inbox, $mail, "1"));
                $email_body = str_replace('=', '', str_replace('=20', '', $email_body));
                if (strpos($headerInfo->subject, $lead_from["subject_search"]) !== false) { 
                    $email = trim($this->get_string_between($email_body, 'Email Address:', 'Phone Number:'));
                    $mobile = trim($this->get_string_between($email_body, 'Phone Number:', $lead_from["mobile_no_last_string"]));
                        
                   //echo "email - > " . $email;
    				$mobile = preg_replace('/[^0-9.]+/', '', $mobile);
    				
    				//echo "mobile - > " . $mobile;
                     
                        
                    $this->loginToExternalSite($email,$mobile);
                        
                     $emailStructure = imap_fetchstructure($inbox, $mail);
					
                }
            }
        }
        
        imap_expunge($inbox);
        imap_close($inbox);
        sleep(1);
    }

    private function load()
    {
        require __DIR__ . '/vendor/autoload.php';
    }

    private function debug()
    {
        if ($this->debug) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }

    private function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    private function formatPhoneNumber($phoneNumber)
    {
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        $phoneNumber = "+1" . $phoneNumber;

        return $phoneNumber;
    }

	Public function loginToExternalSite($ValuserName,$Valpassword)
	{
		
		$cookie_file_path = "/cookies.txt";
		$LOGINURL = "https://www.arizonaretirementrealestatepro.com/"; 
		$agent = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36";

		// begin script
		$ch = curl_init();

		// extra headers
		$headers[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
		$headers[] = "Accept-Encoding:gzip, deflate, br";
		$headers[] = "Accept-Language:en-US,en;q=0.9";
		$headers[] = "Connection: Keep-Alive";
		$headers[] = "DNT:1";
		$headers[] = "Host:www.arizonaretirementrealestatepro.com";
		$headers[] = "Upgrade-Insecure-Requests:1";


		// basic curl options for all requests
		curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
		curl_setopt($ch, CURLOPT_HEADER,  0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
			   curl_setopt($ch, CURLOPT_USERAGENT, $agent); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 

		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path); 
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path); 
		curl_setopt($ch, CURLOPT_ENCODING, 'identity');
		// set first URL
		curl_setopt($ch, CURLOPT_URL, $LOGINURL);

		// execute session to get cookies and required form inputs
		$content = curl_exec($ch); 
		curl_close($ch);
		//print_r(curl_getinfo($ch));                                   zeBUUtTlgRYaUm-aBpaMC3MURwCf_eVEDO5yyEqg2G9MtLlYMR3rYraOQHtDew-Ekdvoo4aybLDnjI3z4MEXAKSimJk1
		//<input name="__RequestVerificationToken" type="hidden" value="YHlGXbM6nfsbfUKhOnIy5skFCE5hQ9k8pkZ6UkHc7kXs6GpuQaNvBG1eO5GbZMe0vOEyMxObmvwcwGDCoEeRnlc2aN41">
		preg_match('/<input name="__RequestVerificationToken" type="hidden" value="(.*?)" \/>/',$content, $match);
		//echo "hi >" . $match[1];



		$cookie_file_path = "/cookies.txt";
		$LOGINURL = "https://www.arizonaretirementrealestatepro.com/api/account/login"; 
		$agent = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36";

		// begin script
		$ch = curl_init();

		// extra headers
		$headers[] = "X-Requested-With: XMLHttpRequest";
		$headers[] = "X-NewRelic-ID: Vg8EWFJWGwUAVVFXDgA=";
		$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
		$headers[] = "Accept: */*";
		$headers[] = "Referer: https://www.arizonaretirementrealestatepro.com/";
		$headers[] = "Accept-Language: en-IN";
		$headers[] = "Accept-Encoding: gzip, deflate";
		$headers[] = "Connection: Keep-Alive";
		$headers[] = "Cache-Control: no-cache";


		//echo 'Curl error\n\n\n\n\n\n: ' . curl_error($ch);
		//__RequestVerificationToken=_y5UpDYmbMmLWzdPlabe9I-1HWY4fRKRauYyAHbcKJxq2Ue00mhNiHNmQbIsxWvniB0AVr2BJ5NZCUNYtJdCgzz_a-o1&Email=Kpolkus%40gmail.com&password=4806281610&Timezone=%2B53
			
		//echo "<<<<" . $content . ">>>>>>>>>>"; 
		$fields['__RequestVerificationToken'] = $match[1];
		$fields['Email'] = $ValuserName; //"Kpolkus@gmail.com"; // "Kpolkus%40gmail.com";
		$fields['password'] = $Valpassword;
		$fields['Timezone'] = "%2B53";

		// set postfields using what we extracted from the form
		$POSTFIELDS = http_build_query($fields); 
		// change URL to login URL
		//curl_setopt($ch, CURLOPT_URL, $LOGINURL); 
		//echo "postdata >>" . $POSTFIELDS;
		// set post options
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $POSTFIELDS); 


		// basic curl options for all requests
		curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
		curl_setopt($ch, CURLOPT_HEADER,  0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		  curl_setopt($ch, CURLOPT_USERAGENT, $agent); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 

		//curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path); 
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path); 
		curl_setopt($ch, CURLOPT_ENCODING, 'identity');
		// set first URL
		curl_setopt($ch, CURLOPT_URL, $LOGINURL);

		// execute session to get cookies and required form inputs
		$content = curl_exec($ch); 
		curl_close($ch);
		//echo "New request >>>>>>>>>>>>>>>>>>." . $content;
	    //"status":"Failure","userInfo"
	    preg_match('/"status":"(.*?)","userInfo/',$content, $match);
		//echo "Status  " . $match[1]; 
		if ( $match[1]=="Failure"){
		  //echo "Status  " . $match[1]; 
		  $this->send_email("Klmartinre@gmail.com","Login Failed For User Id : " . $ValuserName ,$content);
		}
	}
	
	private function send_email($to, $sub, $body)
    {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $this->email_config["smtp_host"];  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $this->email_config["username"];                 // SMTP username
            $mail->Password = $this->email_config["password"];                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $this->email_config["smtp_port"];                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($this->email_config["username"], '');
            $mail->addAddress($to, '');     // Add a recipient
            $mail->addReplyTo($this->email_config["username"], '');


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $sub;
            $mail->Body = $body;
            $mail->AltBody = $body;

            $mail->send();
            if ($this->debug) {
                //echo '<div>Message has been sent</div>';
            }


        } catch (Exception $e) {
            if ($this->debug) {
                //echo 'Message could not be sent.';
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
    }
    
}
