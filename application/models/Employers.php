<?php

class Application_Model_Employers 
{
	private $_dbTable;
	public function __construct()
	{
		$this->_dbTable = new Application_Model_DbTable_Employers(); // new instance of db table
	}
	
	public function allEmployers() // output all employers
	{
		$arr = $this->_dbTable->fetchAll(); // table rows
		
		$group = ""; 												// define var
		$group .= "<ul id='employers' class='group list'>";			// concatonate
		foreach ($arr as $row){							// loop
			$all = $row;											// set var to column
			if ($all !== 'NULL') {
				$group .= "<li><p><b>Company:</b>".$all->company
							 ." <b>Contact:</b> <i>".$all->title."</i> ".$all->contact_first." ".$all->contact_last
							 ."</br><b>Location:</b>".$all->address.", ".$all->town.", ".$all->state.", ".$all->zipcode
							 ."</br><b>Email:</b>".$all->email." <b>Main PH:</b>".$all->mainPH." <b>Other PH:</b>".$all->officePH." <b>Website:</b>".$all->website
							 ."</br><b>Notation:</b>".$all->note." <b>History:</b>".$all->history
							 ."</p></li>";  					// loop through columns
			}
		}
		$group .= "</ul>";									// close
		
		return $group;											// return
	}
	
}