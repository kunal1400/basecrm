<?php

/**
 * CHange date
 * change seen to unseen
 */

/*
RDC Alpha
+1 480-525-7949

RDC Bravo
+1 602-313-1343

Charlie
+1 480-525-8426


Client:  602-363-1448
*/


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
            "username" => "email@rdcbravo.com",
            "password" => "Kathem10",
        ),
        array(
            "smtp_host" => "send.one.com",
            "smtp_port" => "465",
            "imapPath" => "{imap.one.com:993/imap/ssl}INBOX",
            "username" => "email@rdcalpha.com",
            "password" => "Martin10",
        )
    );
    private $lead_from = array(
        "address_1" => array(
            "email" => "leads@email.realtor.com",
            "subject_search" => 'New realtor.com',
            "mobile_no_last_string" => "Comment:"
        ),
        "address_2" => array(
            "email" => "REALTOR.com-Connection-Lead@realtor.com",
            "subject_search" => "You_have_received_a_lead_from",
            "mobile_no_last_string" => "I need"
        )
    );

    private $twilio_config = array(
        "AccountSid" => "ACfd5e34ad10ec64d0ab97c7c43202c686",
        "AuthToken" => "b8931b8dd4db63aba48be24435dfffc4"
    );

    private $ring_central_config = array(
        "appKey" => 'qrwinWHsTRiyFiq20iPFQQ',
        "appSecret" => 'Xz6M1Z2MRpObzKvXVugCZgBFpi2J-jR3O4f-pbXEtSJA',
        "username" => "+14805256665",
        "password" => "Panther1!"
    );
    public $twilio_forwarder_file = "twilio/forwarder.xml";
    public $twilio_gather_file = "twilio/twilio_gather.xml";
    public $twilio_gather_handler_file = "twilio/twilio_gather_handler.php";
    private $db_con;
    private $debug = true;
    private $execution_start_time;
    private $email_check_from_date;
    private $email_read_type = "UNSEEN";

    function __construct()
    {
        $this->debug();
        $this->load();
        //$this->connect_database();
        $this->init();
    }

    private function init()
    {
        @session_start();
        date_default_timezone_set('US/Arizona');
        $this->execution_start_time = time();
        //$this->email_check_from_date = "01 Nov 2016";
        $this->email_check_from_date = date('d M Y', $this->execution_start_time);

    }

    public function run_email_loop()
    {
        $now_exc = time();
        if ($this->execution_start_time + 57 < $now_exc) {
            //echo "<div>" . "Executed:  startwhile(true)$this->execution_start_time . ",  end:" . $now_exc . "</div>";
            echo "executed start:".$start_exc." end:".$now_exc ;
            die();
        }
        foreach ($this->email_box as $email_box_one) {
            $this->email_config = $email_box_one;
            foreach ($this->lead_from as $lead_from) {
                $this->read_and_process_email($lead_from);
            }
        }
    sleep(1);
    }


    private $text_to_sms_send_to = "6026946300@txt.att.net,4806281610@txt.att.net,mobile";

    public $domain_set = array(
        "Bravo" => array(
            "app_name" => "Bravo",
            "from" => "+16023131343",
            "to" => "+14805256665",
            "alt_number" => "+16024225444",
            "source_id" => "621827"
        ),
        "Alpha" => array(
            "app_name" => "Alpha",
            "from" => "+14805257949",
            "to" => "+14805256665",
            "alt_number" => "+16024225444",
            "source_id" => "621826"
        )
    );

    private function parsed_data_action($data_array, $lead_from)
    {
        if ($this->email_config["username"] == "email@rdcbravo.com") {
            $use_domain_set = $this->domain_set["Bravo"];
        } else if ($this->email_config["username"] == "email@rdcalpha.com") {
            $use_domain_set = $this->domain_set["Alpha"];
        }

        $property_value = $data_array['description'];
        $data_text = "Lead : " . $data_array['first_name'] . "\r\n";
        $data_text .= $data_array['last_name'] . "\r\n";
        $data_text .= $data_array['email'] . "\r\n";
        $data_text .= $data_array['mobile'] . "\r\n";
        $data_text .= $data_array['address1'] . "\r\n";
        $data_text .= $data_array['custom_fields']['price_of_home'] . "\r\n";

        $data_array['source_id'] = $use_domain_set["source_id"];
        $this->add_ringcentral($data_array['mobile'], $data_array['first_name'], $data_array['last_name'], $data_array['email']);
        $this->twilio_send_sms($use_domain_set["from"], $use_domain_set["to"], str_replace("\r\n", ", ", $data_text));
        // $this->send_email($this->text_to_sms_send_to, "New Lead " . $use_domain_set["app_name"], $data_text);

        $Arizona = (int)date('H');
        if ($Arizona <= 20 and $Arizona >= 8) {
            //if (strpos($data_array['custom_fields']['Inquiry Comment'], 'lease') == false or strpos($data_array['custom_fields']['Inquiry Comment'], 'rent') == false) {
                //if ($property_value > 200000) {
                    //if ($use_domain_set["app_name"] == "Bravo" && $data_array['zip'] == $lead_from["post_rule_code"]) {
                       //$use_domain_set = $this->domain_set["Charlie"];
                       //$this->twilio_make_call($use_domain_set["from"], $use_domain_set["alt_number"], $data_array['mobile']);
                       $this->twilio_make_call($use_domain_set["from"], $use_domain_set["to"], $data_array['mobile']);
                    // } else {
                    //     $this->twilio_make_call($use_domain_set["from"], $use_domain_set["to"], $data_array['mobile']);
                    // }
                // } else {
                //     $this->twilio_send_sms($use_domain_set["from"], $use_domain_set["alt_number"], str_replace("\r\n", ", ", $data_text));
                //     $this->send_email("kellymichaelshomes@gmail.com", "New Lead " . $use_domain_set["app_name"], $data_text);
                //     $this->twilio_make_call($use_domain_set["from"], $use_domain_set["alt_number"], $data_array['mobile']);
                // }
            //}
        }
        // var_dump($data_array);
        // var_dump($use_domain_set);
       //$base_crm_id = $this->save_to_basecrm($data_array);
       //$this->saveLead($data_array, $base_crm_id);

    }

    private function read_and_process_email($lead_from)
    {
        $inbox = imap_open($this->email_config["imapPath"], $this->email_config["username"], $this->email_config["password"]) or die('Cannot connect to ' . $this->email_config["username"] . " : " . imap_last_error());
        $emails = imap_search($inbox, $this->email_read_type . ' FROM "' . $lead_from["email"] . '" SINCE "' . $this->email_check_from_date . '"');
        if ($emails) {
            $emails = array_reverse($emails);
            $data_total_array = array();
            foreach ($emails as $mail) {
                imap_setflag_full($inbox, $mail, "\\Seen \\Flagged", ST_UID);
                $headerInfo = imap_headerinfo($inbox, $mail);
                $email_body = strip_tags(imap_fetchbody($inbox, $mail, "1"));
                $email_body = str_replace('=', '', str_replace('=20', '', $email_body));
                if (strpos($headerInfo->subject, $lead_from["subject_search"]) !== false) {

                    $first_name = trim($this->get_string_between($email_body, 'First Name:', 'Last Name:'));
                    $last_name_basic = trim($this->get_string_between($email_body, 'Last Name:', 'Email Address:'));
                    $last_name = $last_name_basic ? $last_name_basic : $first_name;
                    $first_name = $last_name_basic ? $first_name : '';
                    $email = trim($this->get_string_between($email_body, 'Email Address:', 'Phone Number:'));
                    $mobile = trim($this->get_string_between($email_body, 'Phone Number:', $lead_from["mobile_no_last_string"]));
                    $address = trim($this->get_string_between($email_body, 'Property Address:', 'MLSID'));
                    $add_exp = explode(",", $address);
                    $address = $add_exp[0];
                    $address = preg_replace('/\W\w+\s*(\W*)$/', '$1', $address);
                    $address = preg_replace('/\W\w+\s*(\W*)$/', '$1', $address);
                    $st_zip = explode(" ", $add_exp[1]);
                    $state = $st_zip[1];
                    $zip = $st_zip[2];
                    $carray = preg_split('/\\s/i', $add_exp[0]);
                    $city = end($carray);
                    $property_value = preg_replace('/[^0-9]/', '', str_replace('$', '',
                        trim($this->get_string_between($email_body, 'Basic Property Attributes:', 'Bed'))));
                    $comment = trim($this->get_string_between($email_body, 'Comment:', 'This consumer inquired about:'));
                    $mlsid = trim($this->get_string_between($email_body, 'MLSID #', 'Email target:'));
                    $bedrooms = trim($this->get_string_between($email_body, 'Bed:', 'Bath:'));
                    $bathrooms = trim($this->get_string_between($email_body, 'Bath:', 'Property Type:'));

                    $data_array = array();
                    $data_array['first_name'] = $first_name;
                    $data_array['last_name'] = $last_name;
                    $data_array['email'] = $email;
                    $data_array['mobile'] = $mobile;
                    $data_array['address1'] = $address;
                    $data_array['description'] = $property_value;

                    $data_array['state'] = $state;
                    $data_array['zip'] = $zip;
                    $data_array['city'] = $city;
                    $data_array['address']['line1'] = $address;
                    $data_array['custom_fields']['Inquiry Comment'] = $comment;
                    $data_array['custom_fields']['MLSID'] = $mlsid;
                    $data_array['custom_fields']['Bedrooms'] = $bedrooms;
                    $data_array['custom_fields']['Bathrooms'] = $bathrooms;
                    $data_array['custom_fields']['price_of_home'] = $property_value;

                    $this->parsed_data_action($data_array, $lead_from);

                    $emailStructure = imap_fetchstructure($inbox, $mail);
                }
            }
        }
        imap_expunge($inbox);
        imap_close($inbox);
        //sleep(1);
    }

    private function save_to_basecrm($data_array)
    {
        $client = new \BaseCRM\Client($this->base_crm_config);
        $createdLead = $client->leads->create($data_array);
        return $createdLead['id'];
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
                echo '<div>Message has been sent</div>';
            }


        } catch (Exception $e) {
            if ($this->debug) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        }
    }

    public function twilio_generate_xml($caller_id, $lead_number)
    {
        $txt = '<Response><Dial callerId="' . $caller_id . '">' . $lead_number . '</Dial></Response>';
        $forwarder_file = fopen($this->twilio_forwarder_file, "w") or (($this->debug) ? die("Unable to open file!") : "");
        fwrite($forwarder_file, $txt);
        fclose($forwarder_file);
        $resp = '<?xml version="1.0" encoding="UTF-8"?>
                  <Response>
                      <Pause length="1"/>
                      <Gather action="' . $this->base_domian_path . $this->twilio_gather_handler_file . '" timeout="10" numDigits="1">
                          <Say voice="alice">Please press 1 to forward this call to new lead, or press any key to cancel</Say>
                      </Gather>
                      <Redirect>' . $this->base_domian_path . $this->twilio_gather_file . '</Redirect>
                  </Response>';
        $gather_file = fopen($this->twilio_gather_file, "w") or (($this->debug) ? die("Unable to open file!") : "");
        fwrite($gather_file, $resp);
        fclose($gather_file);
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

    private function add_ringcentral($number, $firstName, $lastName, $email)
    {
        $RingCentral = new RingCentral\SDK\SDK($this->ring_central_config["appKey"], $this->ring_central_config["appSecret"], RingCentral\SDK\SDK::SERVER_PRODUCTION);
        $RingCentral->platform()->login($this->ring_central_config["username"], "1", $this->ring_central_config["password"]);
        if ($RingCentral->platform()->loggedIn()) {
            $apiResponse = $RingCentral->platform()->get('/account/~/extension/~/address-book/contact', array("phoneNumber" => $this->formatPhoneNumber($number)));
            if (count($apiResponse->json()->records) == 0) {
                $apiResponse = $RingCentral->platform()->post('/account/~/extension/~/address-book/contact', array(
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "mobilePhone" => $this->formatPhoneNumber($number),
                ));
                if ($this->debug) {
                    var_dump($apiResponse->json());
                }
            }
        }
    }

    public function twilio_make_call($from, $to, $lead_number)
    {
        $this->twilio_generate_xml($from, $lead_number);
        $client = new Twilio\Rest\Client($this->twilio_config["AccountSid"], $this->twilio_config["AuthToken"]);
        try {
            $call = $client->calls->create(
                $to,
                $from,
                array("url" => $this->base_domian_path . $this->twilio_gather_file)
            );
            if ($this->debug) {
                echo '<div>' . "Started call: " . $call->sid . '</div>';
            }
        } catch (Exception $e) {
            if ($this->debug) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    private function twilio_send_sms($from, $to, $body)
    {
        $id = $this->twilio_config["AccountSid"];
        $token = $this->twilio_config["AuthToken"];
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $data = array(
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);
        if ($this->debug) {
            var_dump($y);
        }
    }

    private function getLead($phone)
    {
        $phone = ltrim(trim($phone), "+1");
        $phone = preg_replace('/[^0-9]/', '', $phone);
        $sth = $this->db_con->prepare("SELECT * FROM leads where phone=:phone limit 1");
        $sth->bindParam(':phone', $phone);
        $sth->execute();
        $rows = $sth->fetch(PDO::FETCH_ASSOC);
        if ($sth->rowCount() == 1) {
            return $rows;
        } else {
            return false;
        }
    }

    private function saveLead($data_array, $rid)
    {
        $first_name = $data_array['first_name'];
        $last_name = $data_array['last_name'];
        $email = $data_array['email'];
        $mobile = preg_replace('/[^0-9]/', '', $data_array['mobile']);
        $data = json_encode($data_array);
        $statement = $this->db_con->prepare("INSERT INTO leads (fname, lname, email, phone, data, resource_id ) VALUES (:fname, :lname, :email, :phone, :data, :resource_id )");
        $statement->bindParam(":fname", $first_name);
        $statement->bindParam(":lname", $last_name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":phone", $mobile);
        $statement->bindParam(":data", $data);
        $statement->bindParam(":resource_id", $rid);
        $count = $statement->execute();
    }

    public function twilio_gather_handler($number)
    {
        ?>
        <Response>
            <?php if ($number == 1) { ?>
                <Redirect method="POST"><?php echo $this->base_domian_path . $this->twilio_forwarder_file; ?></Redirect>
            <?php } else { ?>
                <Hangup/>
            <?php } ?>
        </Response>
        <?php
    }

    public function receive_sms($From, $To, $Body)
    {
        $client = new \BaseCRM\Client($this->base_crm_config);
        $lead = $this->getLead($From);
        $msg = '';
        $data = json_decode($lead['data'], true);
        $output = preg_replace('/[^0-9]/', '', $data['description']);
        if ($output < 175000) {
            $body = strtolower($Body);
            if (isset($lead["resource_id"]) and $msg != '') {
                $note = array();
                $note['resource_type'] = 'lead';
                $note['resource_id'] = (int)$lead['resource_id'];
                $note['content'] = 'Auto Reply: ' . $msg;
                $note['type'] = 'note';
                $client->notes->create($note);
            }

        }
        $Body = "Customer Reply From {$From} : " . $Body;
        if (isset($lead["fname"])) {
            $name = $lead["fname"] . " " . $lead["lname"];
            $Body = "Message From {$name}: " . $Body;
        }
        if (isset($To)) {
            $this->twilio_send_sms($this->$From, $this->$To, $Body);
            if (isset($lead["resource_id"])) {
                $note = array();
                $note['resource_type'] = 'lead';
                $note['resource_id'] = (int)$lead['resource_id'];
                $note['content'] = $Body;
                $note['type'] = 'note';
                $client->notes->create($note);
            }
        }
    }
}
