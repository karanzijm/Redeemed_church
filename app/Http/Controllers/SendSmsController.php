<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use App\Congregation;
use App\Contact;
use App\Appointment;


class SendSmsController extends Controller
{
    //
    private $sms='';
    private $filename='';

    public function __construct(){
    $username = 'sandbox'; // use 'sandbox' for development in the test environment
    $apiKey   = '4c438216081942313f68b8a0fb5914ac9f7fc1a274515523af5a6d78fb8447d0'; // use your sandbox app API key for development in the test environment
    $AT       = new AfricasTalking($username, $apiKey);
    // Get one of the services
    $this->sms = $AT->sms();
    $this->middleware('auth',['except'=>['addContact']]);
    }

    public function userBooking(Request $request)
    {
        //validate
       $validatedData = $this->validate($request,[
           'name' => ['required'],
           'message' => ['string'],
           'phone' => ['required', 'regex:/^07[0|5|9]{1}[0-9]{7}$/'],
           'email' => ['email:rfc,dns'],
       ]);

       $appointment = new Appointment([
           'name' => $request->get('name'),
           'phone' => $request->get('phone'),
           'email' => $request->get('email'),
           'interest' => $request->get('interest'),
           'message' => $request->get('message'),
           'status' =>0
       ]);
       $appointment->save();
       return back()->with('success','Your appointment has been added');
    }

    public function sendSms(Request $request){

        //As preached by Deacon Humphrey R : Locked down but not blocked. Your voice can not be blocked; Continue to Connect with God. God is not only breaking chains and strongholds; He is opening new doors and new opportunities for you.( Acts 16:22-28). Pr Kasaija
        // $msg = '"If you make the LORD your refuge, if you make the Most High your shelter, no evil will conquer you; no plague will come near your home. For he will order his angels to protect you wherever you go." Ps.91:9-11. Pr Kasaija';
        // dd(str_split($msg));
        $contacts_ = Contact::select("contact")->get()->toArray();
        // $contacts_ =['a', 'b', 'c', 'd','e','f'];

        $imp =[];
        $aa =[];
        $i = 0;
        foreach($contacts_ as $id){
            $i++;
            // array_push($imp,$id);
            array_push($imp,$id['contact']);
            if($i>50){
                // $aa = implode(',',$imp);
                $recipients = implode(',',$imp);
                var_dump($recipients);
                $this->sendToAT($recipients);
                $i =0;
                array_splice($imp,0);
                echo '<br/>';
            }

            // array_push($imp,$id['contact']);

        }
        exit();
        // $recipients = implode(',',$imp);
        // // var_dump($recipients);exit();exit();

        // $this->sendToAT($recipients);
    }

    private function sendToAT($recipients){

// dd($message);
        // $username = 'Redeemedchurch'; // use 'sandbox' for development in the test environment
        // $apiKey   = 'e1a5c9d9156de4b64459eeabcea0ac52996071c9c91979322ce15ebe667a0447'; // use your sandbox app API key for development in the test environment
        // $AT       = new AfricasTalking($username, $apiKey);
        // Get sms of the services
        // $sms      = $AT->sms();
         // Use the service
// var_dump($recipients);exit();
         $username ='rcm@vsmsug.com';
         $password ='passionately';
         $sender ='Redeemed church';
        //  $message = preg_replace('/\s+/', '%20', $message);
        $message = 'Catherine Poran and Deacon Margaret Nalwanga lost their mother a Vigil Tue 20 Oct Kibiri Busabala.Burial Wed 21 Oct at 2pm  Degeya Bombo Rd.';

         $url = 'http://www.vsmsug.com/vapi-cgibin/?uname=rcm@vsmsug.com&passwd=passionately&mm='.urlencode($message).'&n='.$recipients.'&f=RedeemedChurch';
                //    http://www.vsmsug.com/vapi-cgibin/?uname=rcm@vsmsug.com&passwd=passionately&mm=Have%20u%20received%20the%20messages...&n=256770802760,256701586693,256754243503&f=RedeemedChurch
        //  $url ='http://www.vsmsug.com/vapi- cgibin/?uname='.$username.
        //          '&passwd=pass**&mm=Iam% 20testing&n=256701888781,256776888781&f= psms';

         try{
            $request_headers[] =  'Content-Type:application/json';
            if (!function_exists('curl_init')){
                die('cURL is not installed. Install and try again.');
            }
            // var_dump($url);exit();
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $result = curl_exec($ch);
            var_dump($result);
            // $result   = $sms->send([
            //     'to'      => $recipients,
            //     'message' => $message,
            //     'from' => 'SMSINFO'
            // ]);

            return $result;
         } catch(Exception $e) {
             echo "Error: ".$e->getMessage();
         }

    }

    //add phone numbers from a .docx file
    public function read(Request $request){
        // dd(request()->file('file'));
        $this->filename = request()->file('file');
        //'/Users/user/Documents/all.docx';
        $striped_content = '';
        $content = '';
        $zip = zip_open($this->filename);
        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);
       //remove tags remain with only text
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);
        //remove spaces
        $striped_content = str_replace(' ','',$striped_content);
        $my_array = explode(',',$striped_content);//create an array
        $my_array[0] = preg_replace('~[\r\n]+~', '', $my_array[0]);//remove \n from first element
        $my_unique_array = array_unique($my_array);
        // dd($my_unique_array);
        $count = count($my_unique_array);
        $arr = array();//array with the keys sequential
        $i=0;
        $start = microtime(true);
        foreach($my_unique_array as $key => $contact){
               array_push($arr,$contact);
               //if the last element has been reached don't add it it only has tags
               if(count($arr) >= $count){
               break;
               }else{
                   $query = Contact::select('contact')->where('contact', '=', $arr[$i])->exists();
                //    dd($query);
                //if the number doesn't exist add it to the contacts
                   if(!$query){
                        $contact = new Contact([
                            'contact' => $arr[$i]
                        ]);
                        $contact->save();
                   }
                    $i++;
               }

        }
        $time_elapsed_secs = microtime(true) - $start;
        // dd($time_elapsed_secs);

        return redirect('/getUsers')->with('success','Contacts Added');

    }

    public function addMessage(){
        return view('forms.sendmessage');
    }

    public function addContact(){
        return view('forms.contact');
    }

}
