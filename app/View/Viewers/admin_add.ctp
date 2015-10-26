<div class="viewers form">
<?php echo $this->Form->create('Viewer');?>
	<fieldset>
		<legend><?php echo __('Admin Add Viewer'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('nic'). '*';
		echo $this->Form->input('dob', array(
									'label'=>''	,						
  									'dateFormat' => 'DMY',
								    'minYear' => date('Y') - 100,
								    'maxYear' => date('Y') - 18 ));
		echo $this->Form->input('gender', array(
									'label'=>'', 'type' => 'select',
									'options' => array(
										'' => '__Select___',
							            'Male' => 'Male',
							            'Female' => 'Female',
		        					),															
									));
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('district', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
											'' => '___Select______',
										'Ampara' 		=> 'Ampara',
										'Anuradhapura' 	=> 'Anuradhapura',
										'Badulla' 		=> 'Badulla',
										'Batticaloa' 	=> 'Batticaloa',
										'Colombo' 		=> 'Colombo',
										'Galle' 		=> 'Galle',
										'Gampaha' 		=> 'Gampaha',
										'Hambantota' 	=> 'Hambantota',
										'Jaffna' 		=> 'Jaffna',
										'Kalutara' 		=> 'Kalutara',
										'Kandy' 		=> 'Kandy',
										'Kegalle' 		=> 'Kegalle',
										'Kilinochchi' 	=> 'Kilinochchi',
										'Kurunegala' 	=> 'Kurunegala',
										'Mannar' 		=> 'Mannar',
										'Matale' 		=> 'Matale',
										'Matara' 		=> 'Matara',
										'Moneragala' 	=> 'Moneragala',
										'Mullaitivu' 	=> 'Mullaitivu',
										'Nuwara Eliya' 	=> 'Nuwara Eliya',
										'Polonnaruwa' 	=> 'Polonnaruwa',
										'Puttalam' 		=> 'Puttalam',
										'Ratnapura' 	=> 'Ratnapura',
										'Trincomalee' 	=> 'Trincomalee',
										'Vavuniya' 		=> 'Vavuniya',																
			        					),															
									));
		echo $this->Form->input('province', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
											'' => '___Select______________',
										'Eastern Province' 			=> 'Eastern Province',
										'North Central Province' 	=> 'North Central Province',
										'Uva Province' 				=> 'Uva Province',
										'Western Province' 			=> 'Western Province',
										'Southern Province'			=> 'Southern Province',
										'Northern Province' 		=> 'Northern Province',
										'Central Province' 			=> 'Central Province',
										'Sabaragamuwa Provincee' 	=> 'Sabaragamuwa Province',
										'North Western Province' 	=> 'North Western Province',
									
			        					),															
									));
		echo $this->Form->input('country', array(
									'label'		=> '', 
									'disabled' 	=> 'disabled',
									'value'		=> 'SRI LANKA',
	
								 ));
		echo $this->Form->input('contact1', array(
									'label'=>'+94112XXXXXX '
								));
		echo $this->Form->input('contact1', array(
									'label'=>'+94112XXXXXX '
								));
		 echo $this->Form->input('education', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
											'' => '___Select______________',
										'No Degree' 					=> 'No Degree',
										'Graduate school degree' 		=> 'Graduate school degree',											
										'Professional Qualifications' 	=> 'Professional Qualifications',
			        					),															
									));
		echo $this->Form->input('relationship_status', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
											'' => '___Select_____',
										'Single'			=> 'Single',
										'Married'			=> 'Married',
										'Widowed'			=> 'Widowed',
										'Engaged'			=> 'Engaged',
										'Divorced'			=> 'Divorced',
										'Its complicated'	=> 'Its complicated',										
			        					),															
									));
		echo $this->Form->input('num_of_kids', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
											'' => '___Select_____',
										'None'			=> 'None',
										'One'			=> 'One',
										'Two'			=> 'Two',
										'Three'			=> 'Three',
										'Four'			=> 'Four',
										'Five and more'	=> 'Five and more',									
			        					),															
									));
		echo $this->Form->input('employment', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
											'' => '___Select_____',
										'Unemployed' 	=> 'Unemployed',
										'Student'		=> 'Student',
										'Part time'		=> 'Part time',
										'Full time'		=> 'Full time',
										'Self employed'	=> 'Self employed',
										'Housewife'		=> 'Housewife',						
		        						),															
									));
		echo $this->Form->input('career', 
									array('label'=>'', 'type' => 'select',
										'options' => array(
										'' => '___Select_______________________',
										'IT-Sware/DB/QA/Web/Graphics/GIS' 		=> 'IT-Sware/DB/QA/Web/Graphics/GIS',
										'IT-HWare/Networks/Systems' 			=> 'IT-HWare/Networks/Systems',
										'Accounting/Auditing/Finance'			=> 'Accounting/Auditing/Finance',
										'Banking/Insurance' 					=> 'Banking/Insurance',
										'Sales/Marketing/Merchandising' 		=> 'Sales/Marketing/Merchandising',
										'HR/Training'							=> 'HR/Training',
										'Corporate Management/Analysts' 		=> 'Corporate Management/Analysts',
										'Office Admin/Secretary/Receptionist' 	=> 'Office Admin/Secretary/Receptionist',
										'Civil Eng/Construction' 				=> 'Civil Eng/Construction',
										'IT-Telecoms' 							=> 'IT-Telecoms',
										'Customer Relations/Public Relations' 	=> 'Customer Relations/Public Relations',
										'Logistics/Warehouse/Transport' 		=> 'Logistics/Warehouse/Transport',
										'Eng-Mech/Auto/Elec' 					=> 'Eng-Mech/Auto/Elec',
										'Manufacturing/Operations' 				=> 'Manufacturing/Operations',
										'Media/Advert/Communication' 			=> 'Media/Advert/Communication',
										'Hotels/Restaurants/Food' 				=> 'Hotels/Restaurants/Food',
										'Hospitality/Tourism' 					=> 'Hospitality/Tourism',
										'Arts/Recreation/Sports' 				=> 'Arts/Recreation/Sports',
										'Hospital/Nursing/Healthcare' 			=> 'Hospital/Nursing/Healthcare',
										'Legal/Law' 							=> 'Legal/Law',
										'Supervision/Quality Control' 			=> 'Supervision/Quality Control',
										'Teaching/Academic/Library' 			=> 'Apparel/Clothing',
										'Airline/Marine' 						=> 'Airline/Marine',
										'R&D/Lab/Technologist' 					=> 'R&D/Lab/Technologist',
										'Agriculture/Dairy/Environment' 		=> 'Agriculture/Dairy/Environment',
										'Beauty/Cosmetics/Fashion' 				=> 'Beauty/Cosmetics/Fashion',
										'Security' 								=> 'Security',
										'International Development' 			=> 'International Development',
										'KPO/BPO' 								=> 'KPO/BPO',					
			        					),															
									));
			$opts = array(
						1 => 'Less than 10,000 LKR', 
						2 => '10,000 LKR - 20,000 LKR', 
						3 => '20,001 LKR - 50,000 LKR', 
						4 => '50,001 LKR - 100,000 LKR', 
						5 => '100,000 LKR and above ',
					);
			
			array_unshift($opts, array('' => '___Select_____________') ) ;
	
		 echo $this->Form->input('monthly_income', array(
		 								'label'=>'', 
		 								'type' => 'select',
										'options' => $opts										
									));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Viewers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
