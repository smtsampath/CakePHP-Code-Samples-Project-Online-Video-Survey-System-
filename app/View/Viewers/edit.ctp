<div id="content">
    <div class="content_inner">

<?php echo $this->Form->create('Viewer');?>
<h2><?php echo __('Edit Profile Information'); ?>&nbsp;</h2>
<table style="width:auto;  background-color:#151515; border:solid 0px #151515; padding:10px; border-radius: 0px;">
    
    <tr>
        <td style="text-align:left;width:250px">&nbsp;</td>
        <td style="text-align:left;width:50px">&nbsp;</td>
        <td style="text-align:left;">&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('NIC Number'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('nic', array('label'=>'','maxlength'=>'10'));?>&nbsp;
        <div style=" margin-left: 150px; margin-top: -35px; background-color:#151515; width:auto; height:auto;">Eg: 8XXXXXXXXV</div>
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Date Of Birth'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('dob', array(
                                                                    'label'=>'' ,                       
                                                                    'dateFormat' => 'DMY',
                                                                    'minYear' => date('Y') - 100,
                                                                    'maxYear' => date('Y') - 18 ));?>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Gender'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('gender', 
                                        array('label'=>'', 'type' => 'select',
                                            'options' => array(
                                                '' => 'Select',
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    
    <tr>
        <td style="text-align:left;"><?php echo __('Address Line1'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('address1', array('label'=>'', 'size' => 40));?>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Address Line2'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('address2', array('label'=>'', 'size' => 40));?>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('City'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('city', array('label'=>''));?>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('District'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('district', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                            'options' => array(
                                                '' => 'Select',
                                                'Ampara'        => 'Ampara',
                                                'Anuradhapura'  => 'Anuradhapura',
                                                'Badulla'       => 'Badulla',
                                                'Batticaloa'    => 'Batticaloa',
                                                'Colombo'       => 'Colombo',
                                                'Galle'         => 'Galle',
                                                'Gampaha'       => 'Gampaha',
                                                'Hambantota'    => 'Hambantota',
                                                'Jaffna'        => 'Jaffna',
                                                'Kalutara'      => 'Kalutara',
                                                'Kandy'         => 'Kandy',
                                                'Kegalle'       => 'Kegalle',
                                                'Kilinochchi'   => 'Kilinochchi',
                                                'Kurunegala'    => 'Kurunegala',
                                                'Mannar'        => 'Mannar',
                                                'Matale'        => 'Matale',
                                                'Matara'        => 'Matara',
                                                'Moneragala'    => 'Moneragala',
                                                'Mullaitivu'    => 'Mullaitivu',
                                                'Nuwara Eliya'  => 'Nuwara Eliya',
                                                'Polonnaruwa'   => 'Polonnaruwa',
                                                'Puttalam'      => 'Puttalam',
                                                'Ratnapura'     => 'Ratnapura',
                                                'Trincomalee'   => 'Trincomalee',
                                                'Vavuniya'      => 'Vavuniya',                                                              
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Province'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('province', 
                                            array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                                'options' => array(
                                                    '' => 'Select',
                                                'Eastern Province'          => 'Eastern Province',
                                                'North Central Province'    => 'North Central Province',
                                                'Uva Province'              => 'Uva Province',
                                                'Western Province'          => 'Western Province',
                                                'Southern Province'         => 'Southern Province',
                                                'Northern Province'         => 'Northern Province',
                                                'Central Province'          => 'Central Province',
                                                'Sabaragamuwa Provincee'    => 'Sabaragamuwa Province',
                                                'North Western Province'    => 'North Western Province',
                                            
                                                ),                                                          
                                            ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Country'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php  echo $this->Form->input('country', array(
                                                        'label'     => '', 
                                                        'disabled'  => 'disabled',
                                                        'value'     => 'SRI LANKA',
                        
                                                     ));?>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Contact [Mobile]'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('contact1', array('label'=>'','maxlength'=>'12'));?>&nbsp;
        <div style=" margin-left: 150px; margin-top: -35px; background-color:#151515; width:auto; height:auto;">Eg: +94112000555</div>
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Contact [Home]'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('contact2', array('label'=>'','maxlength'=>'12'));?>&nbsp;
        <div style=" margin-left: 150px; margin-top: -35px; background-color:#151515; width:auto; height:auto;">Eg: +94712555555</div>
        </td>
        
    </tr>
    <tr>
        <td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Education'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('education', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthbig',
                                            'options' => array(
                                                '' => 'Select',
                                            'No Degree'                     => 'No Degree',
                                            'Graduate school degree'        => 'Graduate school degree',                                            
                                            'Professional Qualifications'   => 'Professional Qualifications',
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Relationship Status'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('relationship_status', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                            'options' => array(
                                                '' => 'Select',
                                                'Single'             => 'Single',
                                                'Married'            => 'Married',
                                                'Widowed'            => 'Widowed',
                                                'Engaged'            => 'Engaged',
                                                'Divorced'           => 'Divorced',
                                                'In a relationship'  => 'In a relationship',  
                                                'Its complicated'    => 'Its complicated'
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Kids in your Household'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('num_of_kids', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                            'options' => array(
                                                '' => 'Select',
                                                'None'          => 'None',
                                                'One'           => 'One',
                                                'Two'           => 'Two',
                                                'Three'         => 'Three',
                                                'Four'          => 'Four',
                                                'Five and more' => 'Five and more',                                 
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Employment'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('employment', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                            'options' => array(
                                                '' => 'Select',
                                                'Unemployed'    => 'Unemployed',
                                                'Student'       => 'Student',
                                                'Part time'     => 'Part time',
                                                'Full time'     => 'Full time',
                                                'Self employed' => 'Self employed',
                                                'Housewife'     => 'Housewife',                     
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Designation'); ?>&nbsp; * </td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('designation', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                            'options' => array(
                                                '' => 'Select',
                                                'None'                      => 'None',
                                                'Trainee'    				=> 'Trainee',
                                                'junior Executive'      	=> 'junior Executive',
                                                'Executive'    	 			=> 'Executive',
												'Senior Executive'     		=> 'Senior Executive',
												'Assistant Manager'     	=> 'Assistant Manager',
												'Manager'     				=> 'Manager',
												'Senior Manager'     		=> 'Senior Manager',
												'Chief Executive Officer'   => 'Chief Executive Officer',
                                                                   
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Career'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;">
        <?php echo $this->Form->input('career', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthbig',
                                            'options' => array(
                                            '' => 'Select',
                                        'IT-Sware/DB/QA/Web/Graphics/GIS'       => 'IT-Sware/DB/QA/Web/Graphics/GIS',
                                        'IT-HWare/Networks/Systems'             => 'IT-HWare/Networks/Systems',
                                        'Accounting/Auditing/Finance'           => 'Accounting/Auditing/Finance',
                                        'Banking/Insurance'                     => 'Banking/Insurance',
                                        'Sales/Marketing/Merchandising'         => 'Sales/Marketing/Merchandising',
                                        'HR/Training'                           => 'HR/Training',
                                        'Corporate Management/Analysts'         => 'Corporate Management/Analysts',
                                        'Office Admin/Secretary/Receptionist'   => 'Office Admin/Secretary/Receptionist',
                                        'Civil Eng/Construction'                => 'Civil Eng/Construction',
                                        'IT-Telecoms'                           => 'IT-Telecoms',
                                        'Customer Relations/Public Relations'   => 'Customer Relations/Public Relations',
                                        'Logistics/Warehouse/Transport'         => 'Logistics/Warehouse/Transport',
                                        'Eng-Mech/Auto/Elec'                    => 'Eng-Mech/Auto/Elec',
                                        'Manufacturing/Operations'              => 'Manufacturing/Operations',
                                        'Media/Advert/Communication'            => 'Media/Advert/Communication',
                                        'Hotels/Restaurants/Food'               => 'Hotels/Restaurants/Food',
                                        'Hospitality/Tourism'                   => 'Hospitality/Tourism',
                                        'Arts/Recreation/Sports'                => 'Arts/Recreation/Sports',
                                        'Hospital/Nursing/Healthcare'           => 'Hospital/Nursing/Healthcare',
                                        'Legal/Law'                             => 'Legal/Law',
                                        'Supervision/Quality Control'           => 'Supervision/Quality Control',
                                        'Teaching/Academic/Library'             => 'Apparel/Clothing',
                                        'Airline/Marine'                        => 'Airline/Marine',
                                        'R&D/Lab/Technologist'                  => 'R&D/Lab/Technologist',
                                        'Agriculture/Dairy/Environment'         => 'Agriculture/Dairy/Environment',
                                        'Beauty/Cosmetics/Fashion'              => 'Beauty/Cosmetics/Fashion',
                                        'Security'                              => 'Security',
                                        'International Development'             => 'International Development',
                                        'KPO/BPO'                               => 'KPO/BPO',                   
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Monthly income'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
		<td style="text-align:left;">
		<?php echo $this->Form->input('monthly_income', 
                                        array('label'=>'', 'type' => 'select','class' => 'select_widthsmall',
                                            'options' => array(
                                                '' => 'Select',
                                                'Less than 10,000 LKR'    	=> 'Less than 10,000 LKR',
                                                '10,000 LKR - 20,000 LKR'   => '10,000 LKR - 20,000 LKR',
                                                '20,001 LKR - 50,000 LKR'   => '20,001 LKR - 50,000 LKR',
                                                '50,001 LKR - 100,000 LKR' 	=> '50,001 LKR - 100,000 LKR',
                                                '100,000 LKR and above' 	=> '100,000 LKR and above',                
                                            ),                                                          
                                        ));?>&nbsp;
        
        </td>
       
    </tr>
    
    <tr>
        <td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td colspan="3" style="text-align:right;padding-right:212px;"><?php echo $this->Form->submit('Submit', array('class' => 'but-color'));?>&nbsp;</td>
    </tr>   
</table>

    <?php echo $this->Form->end();?>
    </div><!-- end #main -->
</div><!-- end #content -->

