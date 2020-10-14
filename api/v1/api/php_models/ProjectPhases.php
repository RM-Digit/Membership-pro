<?php

use Base\ProjectPhases as BaseProjectPhases;

/**
 * Skeleton subclass for representing a row from the 'project_phases' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class ProjectPhases extends BaseProjectPhases
{
	public function preInsert(){
		$this->setDateTimeCreated(date("Y-m-d H:i:s"));
		return true;
	}

	// public function postInsert(){
	// 	$phases = array(
	// 		"Define" => array("Charter","VOC & CCR","Risk Management","RACI","Stakeholders","SIPOC","Value Stream Diagram","Communication","Gate Review"),
	// 		"Measure" => array("Non-Value Analysis","C&E Matrix","Collection Plan","Histogram","Control Plan","Value Stream Diagram","Gate Review"),
	// 		"Analyze" => array("Pareto Chart","FMEA","Hypothesis Map","Critical X","Regression","Gate Review"),
	// 		"Improve" => array("Value Stream Diagram","Improvement Plan","Gate Review"),
	// 		"Control" => array("SCP Chart","Control Plan","Test Plan","Hypothesis Test","Gate Review")
	// 	);
	// 	$phase_components = $phases[$this->getName()];
	// 	$projd = new ProjectsQuery();
	// 	$proj = $projd->findPk($this->getProjectId());
	// 	$cs = array();
	// 	foreach ($phase_components AS $c){
	// 		$cs[] = $c;
	// 		if ($c == 'SIPOC' || $c == 'Value Stream Diagram'){
	// 			if ($c !== $proj->getDiagramType()){
	// 				continue;
	// 			}
	// 		}
	// 		$pc = new PhaseComponents();
	// 		$pc->setProjectId($this->getProjectId());
	// 		$pc->setPhaseId($this->getId());
	// 		$pc->setName($c);
	// 		$pc->save();
	// 	}

	// 	return true;
	// }
}
