<?php

use App\Agent;
use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		 $agents = [

				[
					'name' => 'General Enquiries',
					'company' => 'Cape Tillers',
					'phone' => '',
					'cell' => '082 569 6360',
					'email' => 'info@capetillers.co.za',
					'area' => 'Country Wide',
					'website' => 'https://capetillers.co.za'
				],
				[
					'name' => 'Chenell Naude',
					'company' => 'Cape Tillers',
					'phone' => '084 731 5753',
					'cell' => ' 062 491 4576',
					'email' => 'chenell@capetillers.co.za',
					'area' => 'Western/Northern Cape',
					'website' => 'https://capetillers.co.za'
				],
				[
					'name' => 'Norman',
					'company' => 'Dana Tool Paint & Hardware',
					'phone' => '084 240 8681',
					'cell' => ' 044 694 0002',
					'email' => 'brandwag55@gmail.com',
					'area' => 'Southern Cape/Eden',
					'website' => ''
				],
				[
					'name' => 'Gerrie Koen',
					'company' => 'Designarts Engineering',
					'phone' => '084 240 8681',
					'cell' => ' 044 694 0002',
					'email' => 'gerrie@designarts.co.za',
					'area' => 'Western/Eastern/Northern Cape',
					'website' => ''
				],
				[
					'name' => 'Johan Steenkamp',
					'company' => 'Hochland Tractor Centre',
					'phone' => '',
					'cell' => '+264815634591',
					'email' => 'htcsales10@gmail.com',
					'area' => 'Namibia',
					'website' => ''
				]

		 ];


		 Agent::insert($agents);
	}
}
