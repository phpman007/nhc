<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \DB;
use App\Model\Frontend\Elections;
class confirmRegister extends Command
{
	/**
	* The name and signature of the console command.
	*
	* @var string
	*/
	protected $signature = 'confirmRegister:sendingMail {schedule_id : schedule_id}';

	/**
	* The console command description.
	*
	* @var string
	*/
	protected $description = 'Command description';

	/**
	* Create a new command instance.
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
	}

	/**
	* Execute the console command.
	*
	* @return mixed
	*/
	public function handle()
	{
		$schedule_id = $this->argument('schedule_id');

		$elections = Elections::where('id', $schedule_id)->first();

		switch ($elections->groupId)
		{
			case '1':
			$field = 'seniorGroupId';
			break;

			case '2':
			$field = 'organizationGroupId';
			break;

			case '3':
			$field = 'ngoGroupId';
			break;

			default:
			$field = 'seniorGroupId';
			break;
		}

		foreach($elections->member($elections->{$field})->get() as $member) {
				Mail::to($member->email)->send(new App\Mail\confirmRegister($member));
		}

		DB::table('log')->insert(['ipAddress' => 'Server Events SubGroup='. $schedule_id,'action' =>'Sending Confirm mail to member', 'dt'=> now(), 'created_at' =>now(), 'updated_at'=>now()]);


	}
}
