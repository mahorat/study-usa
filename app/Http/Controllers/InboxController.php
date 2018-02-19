<?php

namespace App\Http\Controllers;

use App\User;
use App\Inbox;
use App\StudentData;
use App\Helpers\Helpers;
use App\Helpers\User as U;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class InboxController extends Controller
{
	/*
    |--------------------------------------------------------------------------
    | Inbox Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles inbox users for the application 
    | 
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Views path and theme details
    |--------------------------------------------------------------------------
    */

    /**
     * Return view path to page for compose new message.
     *
     * @var string
     */

    protected $composeView;

    /**
     * Return view path for inbox messages page .
     *
     * @var string
     */

    public $inboxView;

    /**
     * Return view path to page with sended messages.
     *
     * @var string
     */

    public $sendedView;

    /**
     * Return view path to page with trashed messages.
     *
     * @var string
     */

    public $trashedView;

    /**
     * Return view path to page with message details.
     *
     * @var string
     */

    protected $messageView;


	/*
    |--------------------------------------------------------------------------
    | Redirects path
    |--------------------------------------------------------------------------
    */

	/**
     * Where to redirect users after send new message.
     *
     * @var string
     */

	protected $redirectToAfterSendMessage = '/inbox';

	/*
    |--------------------------------------------------------------------------
    | Field names in HTML form
    |--------------------------------------------------------------------------
    */

	/**
     * Recipient field name.
     *
     * @var string
     */

	public $recipient = 'recipient';

	/**
     * Sender field name.
     *
     * @var string
     */

	public $sender = 'sender';

	/**
     * Subject field name.
     *
     * @var string
     */

	public $subject = 'subject';

	/**
     * Message field name.
     *
     * @var string
     */

	public $message = 'message';

    /*
    |--------------------------------------------------------------------------
    | Multipurpose Inbox templates details
    |--------------------------------------------------------------------------
    */

    public $theme = "jetson"; // List of themes: limitless, jetson

    public function __construct()
    {
        $this->theme       = "layouts/inbox/".$this->theme.".";
        $this->inboxView   = $this->theme."inbox";
        $this->composeView = $this->theme."compose";
        $this->messageView = $this->theme."message";
    }

    /*
    |--------------------------------------------------------------------------
    | Controller Core Methods
    |--------------------------------------------------------------------------
    */

	/**
     * Show the inbox messages page.
     *
     * @return \Illuminate\Http\Response
     */

    public function inbox()
    {
        $email_users = User::pluck("email")->toArray();
        Helpers::to_js_array($email_users);
        $messages      = $this->getMessages('new');
        $countMessages = $this->countMessages();

        return view($this->inboxView, $countMessages, compact("messages"));
    }

    /**
     * Show the sended messages page.
     *
     * @return \Illuminate\Http\Response
     */

    public function sended(Request $request)
    {
        $messages      = $this->getMessages('sended');
        $countMessages = $this->countMessages();

        return view($this->inboxView, $countMessages, compact("messages"));
    }

    /**
     * Show the trashed messages page.
     *
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $messages      = $this->getMessages('trashed');
        $countMessages = $this->countMessages();

        return view($this->inboxView, $countMessages, compact("messages"));
    }

    /**
     * Show the sended messages page.
     *
     * @return \Illuminate\Http\Response
     */

    public function message(Request $request, $id)
    {
        try 
        {
            $decrypted = decrypt($id);
        }

        catch (DecryptException $e) 
        {
            return redirect()->back();
        }  

        $getMessage   = Inbox::where('id', decrypt($id))->get();

        $user_id      = Auth::user()->id;
        $sender_id    = $getMessage->first()->sender;
        $recipient_id = $getMessage->first()->recipient;
        $seen         = $getMessage->first()->seen;

        $data = $this->getMessage($id);

        if($user_id == $recipient_id)
        {
            if($seen == 0) 
            {
                Inbox::where('id', decrypt($id))->update(['seen' => 1]);
            }

            return view($this->messageView, $data, $this->countMessages());
        }

        elseif($user_id == $sender_id)
        {
            return view($this->messageView, $data, $this->countMessages());
        }

        else return redirect()->back();
    }

    public function read(Request $request, $id)
    {

        $getMessage   = Inbox::where('id', $id)->get();

        $user_id      = Auth::user()->id;
        $sender_id    = $getMessage->first()->sender;
        $recipient_id = $getMessage->first()->recipient;
        $seen         = $getMessage->first()->seen;

        $getMessage      = Inbox::where('id', $id)->get();

        $date            = $getMessage->first()->created_at;
        $status          = $getMessage->first()->seen;
        $subject         = $getMessage->first()->subject;
        $message         = $getMessage->first()->message;
        
        $user_id         = Auth::user()->id;
        $sender_id       = $getMessage->first()->sender;
        $message_id      = $getMessage->first()->id;
        $recipient_id    = $getMessage->first()->recipient;

        $sender          = $getMessage->first()->messageSender->name;
        $sender_email          = $getMessage->first()->messageSender->email;
        $recipient       = User::where('id', $recipient_id)->first()->name;
        
        
        $data =  [
                    'id'           => $message_id,
                    'date'         => $date,
                    'sender'       => $sender,
                    'subject'      => $subject,
                    'message'      => $message,
                    'user_id'      => $user_id,
                    'sender_id'    => $sender_id,
                    'recipient'    => $recipient,
                    'recipient_id' => $recipient_id,
                    'sender_email' => $sender_email  
                 ];

        return view("layouts/inbox/theme-limitless/message", $data, $this->countMessages());
    }

    public function trash(Request $request, $id)
    {
        try 
        {
            $decrypted = decrypt($id);
        }

        catch (DecryptException $e) 
        {
            return redirect()->back();
        }

        $id                   = decrypt($id);
        $inbox                = new Inbox; 
        $getMessage           = Inbox::where('id', $id)->get();

        $user_id              = Auth::user()->id;
        $sender_id            = $getMessage->first()->sender;
        $recipient_id         = $getMessage->first()->recipient;

        $seen                 = $getMessage->first()->seen;

        $trashed_in_recipient = $getMessage->first()->trashed_in_recipient;
        $trashed_in_sender    = $getMessage->first()->trashed_in_sender;

        $show_in_recipient    = $getMessage->first()->show_in_recipient;
        $show_in_sender       = $getMessage->first()->show_in_sender;

        ## Actions on recipient ##

        if ($sender_id != $user_id AND $trashed_in_recipient == 0)
        {
            //echo "<p>Will be trashed in recipient this message!</p>";
            $inbox->where('id', $id)->update(['trashed_in_recipient' => 1]);
        }

        elseif($sender_id != $user_id AND $trashed_in_recipient == 1 AND $show_in_recipient == 0)
        {
            //echo "<p>Will be block displaying this message in recipient!</p>";
            $inbox->where('id', $id)->update(['show_in_recipient' => 1]);
        }

        ## Actions on sender ##

        elseif($sender_id == $user_id AND $trashed_in_sender == 0)
        {
            //echo "<p>Will be trashed this message in sender!</p>";
            $inbox->where('id', $id)->update(['trashed_in_sender' => 1]);
        }

        elseif($sender_id == $user_id AND $trashed_in_sender == 1 AND $show_in_sender == 0)
        {
            //echo "<p>Will be block displaying this message in sender!</p>";
            $inbox->where('id', $id)->update(['show_in_sender' => 1]);
        }

        return redirect()->back();
    }

    /*
    |--------------------------------------------------------------------------
    | Validate methods part
    |--------------------------------------------------------------------------
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

	protected function validator(array $data)
	{        
		return Validator::make($data, [

	        "recipient" => [
	        	'sometimes',
	        	'required',
	        	'email',
	        	'exists:users,email',
		        Rule::notIn([auth()->user()->email])
		    ],

		    "subject" => 'sometimes|required|min:10',

		    "message" => 'sometimes|required|min:50',

	    ], $this->validator_messages());
	}


    /**
     * Return the validation messages to the request.
     *
     * @return array
     */

    protected function validator_messages()
    {
        return [

        	// Recipient field rules messages

            'recipient.required' => 'Please enter the recipient email address!',
            'recipient.email'    => 'Please enter a valid recipient email!',
            'recipient.exists'   => 'Recipient with entered email not found!',
            'recipient.not_in'   => 'You can not send a message to yourself!',

            // Sender field rules messages

            'sender.required' => 'Please enter the sender email address!',
            'sender.email'    => 'Please enter a valid sender email!',
            'sender.in'       => 'Please don\'t change your email address in this field!',

            // Subject field rules messages

            'subject.required' => 'Please enter message subject!',
            'subject.min'      => 'Please enter minimum :min charackters!',

            // Mesage field rules messages

            'message.required' => 'Please enter message text!',
            'message.min'      => 'Please enter minimum :min charackters!',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Messages methods part
    |--------------------------------------------------------------------------
    */

    public function getMessages($message_type = "new")
    {
        $user_id = Auth::user()->id;

        $inbox = new Inbox();

        $paginate = 3;

        switch ($message_type) {
            case 'new':
                $messages = $inbox->where('recipient', $user_id)
                                  ->where('trashed_in_recipient', 0)
                                  ->where('show_in_recipient', 0)
                                  ->orderBy('created_at', 'desc')
                                  ->paginate($paginate);
                break;

            case 'sended':
                $messages = $inbox->where('sender', $user_id)
                                  ->where('trashed_in_sender', 0)
                                  ->where('show_in_sender', 0)
                                  ->orderBy('created_at', 'desc')
                                  ->paginate($paginate);
                break;

            case 'trashed':
                $messages = $inbox->where(function($query) use ($user_id) {
                                $query->where('recipient', $user_id);
                                $query->where('trashed_in_recipient', 1);
                                $query->where('show_in_recipient', '!=', 1);
                            })->orWhere(function($query) use ($user_id) {
                                $query->where('sender', $user_id);
                                $query->where('trashed_in_sender', 1);
                                $query->where('show_in_sender', '!=', 1);
                            })->orderBy('created_at', 'desc')
                              ->paginate($paginate);
                break;
            
            default:
                return abort(404);
                break;
        }

        return $messages;
    }

    public function messages($message_type)
    {
        $getMessages   = $this->getMessages($message_type);

        $data = [
            'messages' => $getMessages,
            'null'     => null      
        ];

        return $data;
    }

    public function getMessage($id)
    {
        $getMessage      = Inbox::where('id', decrypt($id))->get();

        $date            = $getMessage->first()->created_at;
        $status          = $getMessage->first()->seen;
        $subject         = $getMessage->first()->subject;
        $message         = $getMessage->first()->message;
        
        $user_id         = Auth::user()->id;
        $sender_id       = $getMessage->first()->sender;
        $message_id      = $getMessage->first()->id;
        $recipient_id    = $getMessage->first()->recipient;

        $sender          = U::user($sender_id)->name;
        $sender_email    = U::user($sender_id)->email;
        $recipient       = U::user($recipient_id)->name;
        
        
        $data =  [
                    'id'           => $message_id,
                    'date'         => $date,
                    'sender'       => $sender,
                    'subject'      => $subject,
                    'message'      => $message,
                    'user_id'      => $user_id,
                    'sender_id'    => $sender_id,
                    'recipient'    => $recipient,
                    'recipient_id' => $recipient_id,
                    'sender_email' => $sender_email  
                 ];

        return $data;
    }

    public function countMessages()
    {
        $user_id = Auth::user()->id;

        $new_messages = Inbox::where('recipient', $user_id)
                             ->where('trashed_in_recipient', 0)
                             ->where('seen', 0)->count();
                            
        $sended_messages = Inbox::where('sender', $user_id)->where('trashed_in_sender', '!=', 1)->count();

        $trashed = $query = Inbox::where(function($query) use ($user_id) {
                                $query->where('recipient', $user_id);
                                $query->where('trashed_in_recipient', 1);
                                $query->where('show_in_recipient', '!=', 1);
                            })->orWhere(function($query) use ($user_id) {
                                $query->where('sender', $user_id);
                                $query->where('trashed_in_sender', 1);
                                $query->where('show_in_sender', '!=', 1);
                            })->count();

        $userdata = StudentData::where('id_user', $user_id)->get()->toJson();
        $userdata = json_decode($userdata);
        $countMessages = 
        [
            'new'     => $new_messages,
            'null'    => null,
            'sended'  => $sended_messages,
            'drafts'  => 5,
            'trashed' => $trashed,
            'userdata'=> $userdata,   
        ];

        return $countMessages;
    }

    /*
    |--------------------------------------------------------------------------
    | Compose message methods part
    |--------------------------------------------------------------------------
    */

    /**
     * Show the compose new message page.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function compose()
    {
        return view($this->composeView,
            $this->countMessages(),
            [
                'sender'    => $this->sender, 
                'recipient' => $this->recipient,
                'subject'   => $this->subject,
                'message'   => $this->message,
            ]
        );
    }

    /**
     * Handle a send new message request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function send(Request $request)
    {
        $this->validator($request->all())->validate();

        $recipient = $request->recipient;
        $user = User::where('email', $recipient)->get();
        $recipient = $user[0]['id'];
        $recipient_email = $user[0]['email'];
        // var_dump(U::is_student() == true AND U::is_student($recipient) == true);
        // var_dump(U::is_student() == true AND U::is_admin($recipient) == true);
        // var_dump(U::is_student() == true AND U::is_student($recipient) == true OR U::is_student() == true AND U::is_admin($recipient) == true);

        if(U::is_student() == true AND U::is_student($recipient) == true OR U::is_student() == true AND U::is_admin($recipient) == true)
        {
            return back()->with('error', "With your privilege you can not send message to $recipient_email");
        }

        else
        { 
            $this->create($request->all());
            return redirect($this->redirectToAfterSendMessage);
        }
    }

    public function checkboxActions($id, $button = "read")
    {
        $id              = decrypt($id);
        $inbox           = new Inbox;
        $message         = $inbox->where('id', $id)->get();

        $seen            = $message[0]->seen;

        $user_id         = Auth::id();
        $sender_id       = $message[0]->sender;
        $recipient_id    = $message[0]->recipient;
        
        $trashed_in_sender    = $message[0]->trashed_in_sender;
        $trashed_in_recipient = $message[0]->trashed_in_recipient;
        

        $show_in_sender    = $message[0]->show_in_sender;
        $show_in_recipient = $message[0]->show_in_recipient;

        ## Actions on recipient ##
        
        if($sender_id != $user_id AND $button == "read" AND $seen == 0)
        {
            $inbox->where('id', $id)->update(['seen' => 1]);
            //echo "<p>Will be seen this message!</p>";
        }

        elseif($sender_id != $user_id AND $button == "unread" AND $seen == 1)
        {
            $inbox->where('id', $id)->update(['seen' => 0]);
            //echo "<p>Will be unread this message!</p>";
        }

        elseif ($sender_id != $user_id AND $button == "trash" AND $trashed_in_recipient == 0)
        {
            //echo "<p>Will be trashed in recipient this message!</p>";
            $inbox->where('id', $id)->update(['trashed_in_recipient' => 1]);
        }

        elseif($sender_id != $user_id AND $button == "trash" AND $trashed_in_recipient == 1 AND $show_in_recipient == 0)
        {
            //echo "<p>Will be block displaying this message in recipient!</p>";
            $inbox->where('id', $id)->update(['show_in_recipient' => 1]);
        }

        ## Actions on sender ##

        elseif($sender_id == $user_id AND $button == "trash" AND $trashed_in_sender == 0)
        {
            //echo "<p>Will be trashed this message in sender!</p>";
            $inbox->where('id', $id)->update(['trashed_in_sender' => 1]);
        }

        elseif($sender_id == $user_id AND $button == "trash" AND $trashed_in_sender == 1 AND $show_in_sender == 0)
        {
            //echo "<p>Will be block displaying this message in sender!</p>";
            $inbox->where('id', $id)->update(['show_in_sender' => 1]);
        }
    }

    public function checkbox(Request $request)
    {
        $messages = $request->messages;
        $button   = $request->button;
        //dump($button);
        $count    = count($messages);

        if($count > 0)
        {
            foreach ($messages as $id)
            {
                $this->checkboxActions($id, $button);
            }  

            return redirect()->back();
        }

        else return redirect()->back();
    }

    /**
     * Create a new message instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return App\Inbox;
     */

    public function create(array $data)
    {
        $recipient = $data["$this->recipient"];
        $sender    = Auth::user()->email;
        $subject   = $data["$this->subject"];
        $message   = $data["$this->message"];

        $recipient_id = User::where('email', $recipient)->first()->id;
        $sender_id    = Auth::user()->id;

        $inbox = new Inbox;

        $inbox->subject    = $subject;
        $inbox->message    = $message;
        $inbox->sender     = $sender_id;
        $inbox->recipient  = $recipient_id;

        $inbox->save();     
    }

    public static function otabek(){
        return "Otabek";
    }

}
