<?php

use Base\PhaseComponents as BasePhaseComponents;

/**
 * Skeleton subclass for representing a row from the 'phase_components' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PhaseComponents extends BasePhaseComponents
{
	public function preInsert(){
		$this->setDateTimeCreated(date("Y-m-d H:i:s"));
		$this->setStatus('working');
		return true;
	}
	public function preUpdate(){
		//Set The First Started Date
		if ($this->getDateTimeStarted() == null){
			$this->setDateTimeStarted(date("Y-m-d H:i:s"));
		}
		return true;
	}
}
