<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
// use App\Congregation;
use App\Contact;
use App\Church;
// use App\Appointment;
use App\Imports\churchImport;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;


class SendSmsController extends Controller
{
    //
    private $sms = '';
    private $filename = '';
    private $message = '';

    public function __construct()
    {
        $username = 'sandbox'; // use 'sandbox' for development in the test environment
        $apiKey = '4c438216081942313f68b8a0fb5914ac9f7fc1a274515523af5a6d78fb8447d0'; // use your sandbox app API key for development in the test environment
        $AT = new AfricasTalking($username, $apiKey);
        // Get one of the services
        $this->sms = $AT->sms();
        $this->middleware('auth', ['except' => ['addContact']]);
    }

    public function userBooking(Request $request)
    {
        //validate
        $validatedData = $this->validate($request, [
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
            'status' => 0
        ]);
        $appointment->save();
        return back()->with('success', 'Your appointment has been added');
    }

    public function import(Request $request)
    {
        $result = 0;
        request()->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        if (request()->file('file')) {
            Excel::import(new churchImport, request()->file('file'));
        } else {
            $result = "Please Provide an Excell sheet";
        }

        echo $result;
    }

    public function getContacts(Request $request)
    {
        $contacts = $request->get('contacts');
        // var_dump($contacts);
        $this->message = $request->get('message');
        // var_dump($this->message);
        $contact_ = [];
        foreach ($contacts as $contact) {
            if (strlen($contact['phone_number']) == 10) {
                array_push($contact_, preg_replace('/^0/', '256', $contact['phone_number']));
            }
            array_push($contact_, $contact['phone_number']);

        }
        $this->sendSms($contact_);

    }

    public function sendSms($contacts_)
    {

        // dd($this->message);
        // $contacts_ = Church::select("phone_number")->get()->toArray();

        $imp = [];
        $i = 0;
        $result = '';
        $div = sizeof($contacts_);
        if ($div < 50) {
            foreach ($contacts_ as $id) {
                array_push($imp, $id);
            }
            $recipients = implode(',', $imp);
            $result = $this->sendToAT($recipients);
        } else {
            $div = ((int)($div / 50)) * 50;
            foreach ($contacts_ as $key => $id) {

                $i++;
                array_push($imp, $id);
                if ($i > 50) {
                    $recipients = implode(',', $imp);
                    $result = $this->sendToAT($recipients);
                    $i = 0;
                    array_splice($imp, 0);
                    echo '<br/>';
                }

                if ($key >= $div) {
                    $result=$this->sendToAT($id);
                    var_dump($id);
                }

            }
        }

        // echo $result == 1701 ? 0 : 1;
    }

    private function sendToAT($recipients)
    {

        $username = 'redeemedmak@vsmsug.com';
        $password = 'saviour';
        $sender = 'Redeemed church';

        $url = 'http://www.vsmsug.com/vapi-cgibin/?uname=' . $username . '&passwd=' . $password . '&mm=' . urlencode($this->message) . '&n=' . $recipients . '&f=RedeemedChurch';
        try {
            $request_headers[] = 'Content-Type:application/json';
            if (!function_exists('curl_init')) {
                die('cURL is not installed. Install and try again.');
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $result = curl_exec($ch);

            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    //add phone numbers from a .docx file
    public function read(Request $request)
    {
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
        $striped_content = str_replace(' ', '', $striped_content);
        $my_array = explode(',', $striped_content);//create an array
        $my_array[0] = preg_replace('~[\r\n]+~', '', $my_array[0]);//remove \n from first element
        $my_unique_array = array_unique($my_array);
        // dd($my_unique_array);
        $count = count($my_unique_array);
        $arr = array();//array with the keys sequential
        $i = 0;
        $start = microtime(true);
        foreach ($my_unique_array as $key => $contact) {
            array_push($arr, $contact);
            //if the last element has been reached don't add it it only has tags
            if (count($arr) >= $count) {
                break;
            } else {
                $query = Contact::select('contact')->where('contact', '=', $arr[$i])->exists();
                //    dd($query);
                //if the number doesn't exist add it to the contacts
                if (!$query) {
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

        return redirect('/getUsers')->with('success', 'Contacts Added');

    }

    public function addMessage()
    {
        return view('forms.sendmessage');
    }

    public function addContact()
    {
        return view('forms.contact');
    }

}
