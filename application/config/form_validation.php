<?php

// remove since translation isn't working properly
$config = array(

				 
	'currency' => array(
				 	array(
                                	'field'=>'name',
                                	'label'=>'Name',
                                	'rules'=>'required|trim|xss_clean'
                                )
                       ),
    'accounts' => array(
                       array(
                       		'field' => 'name',
                       		'label'=> "<span class='required'>name</span>",
                            'rules'=>'required|trim|xss_clean'
                       )
    ),
    'categories' => array(
    					array(
    						'field' => 'name',
    						'label' => 'Name', // (staviti prijevod ?)
    						'rules' => 'required|trim|xss_clean'
    					)
    				)                    			 

);


	