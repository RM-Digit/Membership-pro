<?php

use Base\Projects as BaseProjects;

/**
 * Skeleton subclass for representing a row from the 'projects' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Projects extends BaseProjects
{

  public function postInsert(){

    $this->setDateTimeCreated(date('Y-m-d H:i:s'));
    $this->save();
    
    $phases = array(
      "Define" => array("Charter","VOC & CCR","Risk Management","RACI","Stakeholders","SIPOC","Value Stream Diagram","Communication","Gate Review"),
      "Measure" => array("Non-Value Analysis","Collection Plan","Histogram","Value Stream Diagram","Gate Review"),
      "Analyze" => array("Pareto Chart","C&E Matrix","FMEA","Hypothesis Map","Regression","Critical X","Gate Review"),
      "Improve" => array("Future State Map","Improvement Plan","Gate Review"),
      "Control" => array("SCP Chart","Control Plan","Test Plan","Gate Review")
    );
    
    foreach($phases as $phaseName => $phaseComponents){

      $phase = new ProjectPhases();
      $phase->setProjectId($this->getId());
      $phase->setName($phaseName);
      $phase->setDateTimeCreated(date('Y-m-d H:i:s'));
      $phase->save();

      foreach($phaseComponents AS $phaseComponentName){
        // if($phaseName === 'Define' && in_array($phaseComponentName, [ 'SIPOC', 'Value Stream Diagram' ])){
        //   if($phaseComponentName != $this->getDiagramType()){
        //     continue;
        //   }
        // }
        $phaseComponent = new PhaseComponents();
        $phaseComponent->setPhaseId($phase->getId());
        $phaseComponent->setProjectId($this->getId());
        $phaseComponent->setName($phaseComponentName);
        $phaseComponent->setDateTimeCreated(date('Y-m-d H:i:s'));
        if($phaseName === 'Define' && $phaseComponentName === 'Charter'){
          $phaseComponent->setStatus('complete');
        }
        $phaseComponent->save();
      }

    }

    return true;
  
  }

}
