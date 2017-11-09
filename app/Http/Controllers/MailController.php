<?php
namespace App\Http\Controllers;

use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\Student;
use App\Course;
use Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{

	public function __construct(Request $request, Student $students)
	{
		$this->request = $request;
		$this->students = $students;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	$data['students'] = Student::all(); 
	$data['courses'] = Course::all();
	return view('manage/mailer.index',$data);
}

	/**
	 * Update posisi menu
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function sendemail()
	{	

		$validator = Validator::make($this->request->all(),[
			'email.*' => 'required|email',
			'title' => 'required|max:255',
			'content' => 'required|max:255',
		]);

		if($validator->fails()){
			return response()->json(['err'=>'All fields are required']);
		}

		$data_toview = array();
		$data_toview['content'] =  $this->request->content;
		$data_toview['title'] = $this->request->title;
		$data_toview['email'] = $this->request->email;

		$email_sender 	= 'trantranhuycn@gmail.com';
		$email_pass		= 'jtirkmvjcjexarxl';
		$email_to 		= $this->request->email;

			// Backup your default mailer
		$backup = \Mail::getSwiftMailer();
		try{

			//https://accounts.google.com/DisplayUnlockCaptcha
			// Setup your gmail mailer
			$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
			$transport->setUsername($email_sender);
			$transport->setPassword($email_pass);

						// Any other mailer configuration stuff needed...
			$gmail = new Swift_Mailer($transport);

						// Set the mailer as gmail
			\Mail::setSwiftMailer($gmail);

			$data['emailto'] =$email_to;
			$data['sender'] =  $email_sender;
						//Sender dan Reply harus sama

			Mail::send('manage.mailer.message', $data_toview, function($message) use ($data)
			{

				$message->from($data['sender'], 'UTT Mailer');
				$message->to($data['emailto'])
				->replyTo($data['sender'], 'UTT Mailer')
				->subject('Test Email');
				
			});

		}
		catch(\Swift_TransportException $e){
			$response = $e->getMessage() ;
			return response()->json(['exc'=>$response]);
		}

			// Restore your original mailer
		Mail::setSwiftMailer($backup);
		return response()->json(['success'=>'Your email has been sent sucessfully!']);
		
	}




}