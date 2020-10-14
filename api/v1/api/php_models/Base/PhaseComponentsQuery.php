<?php

namespace Base;

use \PhaseComponents as ChildPhaseComponents;
use \PhaseComponentsQuery as ChildPhaseComponentsQuery;
use \Exception;
use \PDO;
use Map\PhaseComponentsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'phase_components' table.
 *
 *
 *
 * @method     ChildPhaseComponentsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPhaseComponentsQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildPhaseComponentsQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildPhaseComponentsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildPhaseComponentsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildPhaseComponentsQuery orderByGrade($order = Criteria::ASC) Order by the grade column
 * @method     ChildPhaseComponentsQuery orderByDateTimeStarted($order = Criteria::ASC) Order by the date_time_started column
 * @method     ChildPhaseComponentsQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildPhaseComponentsQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildPhaseComponentsQuery groupById() Group by the id column
 * @method     ChildPhaseComponentsQuery groupByProjectId() Group by the project_id column
 * @method     ChildPhaseComponentsQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildPhaseComponentsQuery groupByStatus() Group by the status column
 * @method     ChildPhaseComponentsQuery groupByName() Group by the name column
 * @method     ChildPhaseComponentsQuery groupByGrade() Group by the grade column
 * @method     ChildPhaseComponentsQuery groupByDateTimeStarted() Group by the date_time_started column
 * @method     ChildPhaseComponentsQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildPhaseComponentsQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildPhaseComponentsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPhaseComponentsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPhaseComponentsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPhaseComponentsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPhaseComponentsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPhaseComponentsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPhaseComponentsQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildPhaseComponentsQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildPhaseComponentsQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildPhaseComponentsQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildPhaseComponentsQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildPhaseComponentsQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildPhaseComponentsQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildPhaseComponentsQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildPhaseComponentsQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildPhaseComponentsQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildPhaseComponentsQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinAnalyzeCeMatrix($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCeMatrix relation
 * @method     ChildPhaseComponentsQuery rightJoinAnalyzeCeMatrix($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCeMatrix relation
 * @method     ChildPhaseComponentsQuery innerJoinAnalyzeCeMatrix($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildPhaseComponentsQuery joinWithAnalyzeCeMatrix($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithAnalyzeCeMatrix() Adds a LEFT JOIN clause and with to the query using the AnalyzeCeMatrix relation
 * @method     ChildPhaseComponentsQuery rightJoinWithAnalyzeCeMatrix() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCeMatrix relation
 * @method     ChildPhaseComponentsQuery innerJoinWithAnalyzeCeMatrix() Adds a INNER JOIN clause and with to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildPhaseComponentsQuery rightJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildPhaseComponentsQuery innerJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildPhaseComponentsQuery joinWithAnalyzeCeMatrixOutputs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithAnalyzeCeMatrixOutputs() Adds a LEFT JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildPhaseComponentsQuery rightJoinWithAnalyzeCeMatrixOutputs() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildPhaseComponentsQuery innerJoinWithAnalyzeCeMatrixOutputs() Adds a INNER JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinAnalyzeCriticalX($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCriticalX relation
 * @method     ChildPhaseComponentsQuery rightJoinAnalyzeCriticalX($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCriticalX relation
 * @method     ChildPhaseComponentsQuery innerJoinAnalyzeCriticalX($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCriticalX relation
 *
 * @method     ChildPhaseComponentsQuery joinWithAnalyzeCriticalX($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCriticalX relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithAnalyzeCriticalX() Adds a LEFT JOIN clause and with to the query using the AnalyzeCriticalX relation
 * @method     ChildPhaseComponentsQuery rightJoinWithAnalyzeCriticalX() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCriticalX relation
 * @method     ChildPhaseComponentsQuery innerJoinWithAnalyzeCriticalX() Adds a INNER JOIN clause and with to the query using the AnalyzeCriticalX relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinAnalyzeFmea($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeFmea relation
 * @method     ChildPhaseComponentsQuery rightJoinAnalyzeFmea($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeFmea relation
 * @method     ChildPhaseComponentsQuery innerJoinAnalyzeFmea($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeFmea relation
 *
 * @method     ChildPhaseComponentsQuery joinWithAnalyzeFmea($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeFmea relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithAnalyzeFmea() Adds a LEFT JOIN clause and with to the query using the AnalyzeFmea relation
 * @method     ChildPhaseComponentsQuery rightJoinWithAnalyzeFmea() Adds a RIGHT JOIN clause and with to the query using the AnalyzeFmea relation
 * @method     ChildPhaseComponentsQuery innerJoinWithAnalyzeFmea() Adds a INNER JOIN clause and with to the query using the AnalyzeFmea relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinAnalyzeGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinAnalyzeGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinAnalyzeGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeGateReview relation
 *
 * @method     ChildPhaseComponentsQuery joinWithAnalyzeGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithAnalyzeGateReview() Adds a LEFT JOIN clause and with to the query using the AnalyzeGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinWithAnalyzeGateReview() Adds a RIGHT JOIN clause and with to the query using the AnalyzeGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinWithAnalyzeGateReview() Adds a INNER JOIN clause and with to the query using the AnalyzeGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinAnalyzeHypothesisMap($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeHypothesisMap relation
 * @method     ChildPhaseComponentsQuery rightJoinAnalyzeHypothesisMap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeHypothesisMap relation
 * @method     ChildPhaseComponentsQuery innerJoinAnalyzeHypothesisMap($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeHypothesisMap relation
 *
 * @method     ChildPhaseComponentsQuery joinWithAnalyzeHypothesisMap($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeHypothesisMap relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithAnalyzeHypothesisMap() Adds a LEFT JOIN clause and with to the query using the AnalyzeHypothesisMap relation
 * @method     ChildPhaseComponentsQuery rightJoinWithAnalyzeHypothesisMap() Adds a RIGHT JOIN clause and with to the query using the AnalyzeHypothesisMap relation
 * @method     ChildPhaseComponentsQuery innerJoinWithAnalyzeHypothesisMap() Adds a INNER JOIN clause and with to the query using the AnalyzeHypothesisMap relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinChartExcelData($relationAlias = null) Adds a LEFT JOIN clause to the query using the ChartExcelData relation
 * @method     ChildPhaseComponentsQuery rightJoinChartExcelData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ChartExcelData relation
 * @method     ChildPhaseComponentsQuery innerJoinChartExcelData($relationAlias = null) Adds a INNER JOIN clause to the query using the ChartExcelData relation
 *
 * @method     ChildPhaseComponentsQuery joinWithChartExcelData($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ChartExcelData relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithChartExcelData() Adds a LEFT JOIN clause and with to the query using the ChartExcelData relation
 * @method     ChildPhaseComponentsQuery rightJoinWithChartExcelData() Adds a RIGHT JOIN clause and with to the query using the ChartExcelData relation
 * @method     ChildPhaseComponentsQuery innerJoinWithChartExcelData() Adds a INNER JOIN clause and with to the query using the ChartExcelData relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinControlControlPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlControlPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinControlControlPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlControlPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinControlControlPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlControlPlan relation
 *
 * @method     ChildPhaseComponentsQuery joinWithControlControlPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlControlPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithControlControlPlan() Adds a LEFT JOIN clause and with to the query using the ControlControlPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinWithControlControlPlan() Adds a RIGHT JOIN clause and with to the query using the ControlControlPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinWithControlControlPlan() Adds a INNER JOIN clause and with to the query using the ControlControlPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinControlGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinControlGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinControlGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlGateReview relation
 *
 * @method     ChildPhaseComponentsQuery joinWithControlGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithControlGateReview() Adds a LEFT JOIN clause and with to the query using the ControlGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinWithControlGateReview() Adds a RIGHT JOIN clause and with to the query using the ControlGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinWithControlGateReview() Adds a INNER JOIN clause and with to the query using the ControlGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinControlTestPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlTestPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinControlTestPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlTestPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinControlTestPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlTestPlan relation
 *
 * @method     ChildPhaseComponentsQuery joinWithControlTestPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlTestPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithControlTestPlan() Adds a LEFT JOIN clause and with to the query using the ControlTestPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinWithControlTestPlan() Adds a RIGHT JOIN clause and with to the query using the ControlTestPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinWithControlTestPlan() Adds a INNER JOIN clause and with to the query using the ControlTestPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineCommunication($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineCommunication relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineCommunication($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineCommunication relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineCommunication($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineCommunication relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineCommunication($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineCommunication relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineCommunication() Adds a LEFT JOIN clause and with to the query using the DefineCommunication relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineCommunication() Adds a RIGHT JOIN clause and with to the query using the DefineCommunication relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineCommunication() Adds a INNER JOIN clause and with to the query using the DefineCommunication relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineGateReview relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineGateReview() Adds a LEFT JOIN clause and with to the query using the DefineGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineGateReview() Adds a RIGHT JOIN clause and with to the query using the DefineGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineGateReview() Adds a INNER JOIN clause and with to the query using the DefineGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineRaci($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineRaci relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineRaci($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineRaci relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineRaci($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineRaci relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineRaci($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineRaci relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineRaci() Adds a LEFT JOIN clause and with to the query using the DefineRaci relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineRaci() Adds a RIGHT JOIN clause and with to the query using the DefineRaci relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineRaci() Adds a INNER JOIN clause and with to the query using the DefineRaci relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineRiskManagement($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineRiskManagement relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineRiskManagement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineRiskManagement relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineRiskManagement($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineRiskManagement relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineRiskManagement($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineRiskManagement relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineRiskManagement() Adds a LEFT JOIN clause and with to the query using the DefineRiskManagement relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineRiskManagement() Adds a RIGHT JOIN clause and with to the query using the DefineRiskManagement relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineRiskManagement() Adds a INNER JOIN clause and with to the query using the DefineRiskManagement relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineSipoc($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineSipoc relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineSipoc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineSipoc relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineSipoc($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineSipoc relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineSipoc($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineSipoc relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineSipoc() Adds a LEFT JOIN clause and with to the query using the DefineSipoc relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineSipoc() Adds a RIGHT JOIN clause and with to the query using the DefineSipoc relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineSipoc() Adds a INNER JOIN clause and with to the query using the DefineSipoc relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineStakeholders($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineStakeholders relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineStakeholders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineStakeholders relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineStakeholders($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineStakeholders relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineStakeholders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineStakeholders relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineStakeholders() Adds a LEFT JOIN clause and with to the query using the DefineStakeholders relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineStakeholders() Adds a RIGHT JOIN clause and with to the query using the DefineStakeholders relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineStakeholders() Adds a INNER JOIN clause and with to the query using the DefineStakeholders relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineValueStreamDiagram($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineValueStreamDiagram($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineValueStreamDiagram($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineValueStreamDiagram($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineValueStreamDiagram() Adds a LEFT JOIN clause and with to the query using the DefineValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineValueStreamDiagram() Adds a RIGHT JOIN clause and with to the query using the DefineValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineValueStreamDiagram() Adds a INNER JOIN clause and with to the query using the DefineValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinDefineVocCcr($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineVocCcr relation
 * @method     ChildPhaseComponentsQuery rightJoinDefineVocCcr($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineVocCcr relation
 * @method     ChildPhaseComponentsQuery innerJoinDefineVocCcr($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineVocCcr relation
 *
 * @method     ChildPhaseComponentsQuery joinWithDefineVocCcr($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineVocCcr relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithDefineVocCcr() Adds a LEFT JOIN clause and with to the query using the DefineVocCcr relation
 * @method     ChildPhaseComponentsQuery rightJoinWithDefineVocCcr() Adds a RIGHT JOIN clause and with to the query using the DefineVocCcr relation
 * @method     ChildPhaseComponentsQuery innerJoinWithDefineVocCcr() Adds a INNER JOIN clause and with to the query using the DefineVocCcr relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinImproveGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImproveGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinImproveGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImproveGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinImproveGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the ImproveGateReview relation
 *
 * @method     ChildPhaseComponentsQuery joinWithImproveGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ImproveGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithImproveGateReview() Adds a LEFT JOIN clause and with to the query using the ImproveGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinWithImproveGateReview() Adds a RIGHT JOIN clause and with to the query using the ImproveGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinWithImproveGateReview() Adds a INNER JOIN clause and with to the query using the ImproveGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinImproveImprovementPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImproveImprovementPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinImproveImprovementPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImproveImprovementPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinImproveImprovementPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ImproveImprovementPlan relation
 *
 * @method     ChildPhaseComponentsQuery joinWithImproveImprovementPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ImproveImprovementPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithImproveImprovementPlan() Adds a LEFT JOIN clause and with to the query using the ImproveImprovementPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinWithImproveImprovementPlan() Adds a RIGHT JOIN clause and with to the query using the ImproveImprovementPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinWithImproveImprovementPlan() Adds a INNER JOIN clause and with to the query using the ImproveImprovementPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinImproveValueStreamDiagram($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImproveValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery rightJoinImproveValueStreamDiagram($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImproveValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery innerJoinImproveValueStreamDiagram($relationAlias = null) Adds a INNER JOIN clause to the query using the ImproveValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery joinWithImproveValueStreamDiagram($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ImproveValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithImproveValueStreamDiagram() Adds a LEFT JOIN clause and with to the query using the ImproveValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery rightJoinWithImproveValueStreamDiagram() Adds a RIGHT JOIN clause and with to the query using the ImproveValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery innerJoinWithImproveValueStreamDiagram() Adds a INNER JOIN clause and with to the query using the ImproveValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinMeasureCollectionPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureCollectionPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinMeasureCollectionPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureCollectionPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinMeasureCollectionPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureCollectionPlan relation
 *
 * @method     ChildPhaseComponentsQuery joinWithMeasureCollectionPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureCollectionPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithMeasureCollectionPlan() Adds a LEFT JOIN clause and with to the query using the MeasureCollectionPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinWithMeasureCollectionPlan() Adds a RIGHT JOIN clause and with to the query using the MeasureCollectionPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinWithMeasureCollectionPlan() Adds a INNER JOIN clause and with to the query using the MeasureCollectionPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinMeasureControlPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureControlPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinMeasureControlPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureControlPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinMeasureControlPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureControlPlan relation
 *
 * @method     ChildPhaseComponentsQuery joinWithMeasureControlPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureControlPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithMeasureControlPlan() Adds a LEFT JOIN clause and with to the query using the MeasureControlPlan relation
 * @method     ChildPhaseComponentsQuery rightJoinWithMeasureControlPlan() Adds a RIGHT JOIN clause and with to the query using the MeasureControlPlan relation
 * @method     ChildPhaseComponentsQuery innerJoinWithMeasureControlPlan() Adds a INNER JOIN clause and with to the query using the MeasureControlPlan relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinMeasureGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinMeasureGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinMeasureGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureGateReview relation
 *
 * @method     ChildPhaseComponentsQuery joinWithMeasureGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithMeasureGateReview() Adds a LEFT JOIN clause and with to the query using the MeasureGateReview relation
 * @method     ChildPhaseComponentsQuery rightJoinWithMeasureGateReview() Adds a RIGHT JOIN clause and with to the query using the MeasureGateReview relation
 * @method     ChildPhaseComponentsQuery innerJoinWithMeasureGateReview() Adds a INNER JOIN clause and with to the query using the MeasureGateReview relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinMeasureNonvalueAnalysis($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildPhaseComponentsQuery rightJoinMeasureNonvalueAnalysis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildPhaseComponentsQuery innerJoinMeasureNonvalueAnalysis($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureNonvalueAnalysis relation
 *
 * @method     ChildPhaseComponentsQuery joinWithMeasureNonvalueAnalysis($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureNonvalueAnalysis relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithMeasureNonvalueAnalysis() Adds a LEFT JOIN clause and with to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildPhaseComponentsQuery rightJoinWithMeasureNonvalueAnalysis() Adds a RIGHT JOIN clause and with to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildPhaseComponentsQuery innerJoinWithMeasureNonvalueAnalysis() Adds a INNER JOIN clause and with to the query using the MeasureNonvalueAnalysis relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinMeasureValueStreamDiagram($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery rightJoinMeasureValueStreamDiagram($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery innerJoinMeasureValueStreamDiagram($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery joinWithMeasureValueStreamDiagram($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureValueStreamDiagram relation
 *
 * @method     ChildPhaseComponentsQuery leftJoinWithMeasureValueStreamDiagram() Adds a LEFT JOIN clause and with to the query using the MeasureValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery rightJoinWithMeasureValueStreamDiagram() Adds a RIGHT JOIN clause and with to the query using the MeasureValueStreamDiagram relation
 * @method     ChildPhaseComponentsQuery innerJoinWithMeasureValueStreamDiagram() Adds a INNER JOIN clause and with to the query using the MeasureValueStreamDiagram relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\AnalyzeCeMatrixQuery|\AnalyzeCeMatrixOutputsQuery|\AnalyzeCriticalXQuery|\AnalyzeFmeaQuery|\AnalyzeGateReviewQuery|\AnalyzeHypothesisMapQuery|\ChartExcelDataQuery|\ControlControlPlanQuery|\ControlGateReviewQuery|\ControlTestPlanQuery|\DefineCommunicationQuery|\DefineGateReviewQuery|\DefineRaciQuery|\DefineRiskManagementQuery|\DefineSipocQuery|\DefineStakeholdersQuery|\DefineValueStreamDiagramQuery|\DefineVocCcrQuery|\ImproveGateReviewQuery|\ImproveImprovementPlanQuery|\ImproveValueStreamDiagramQuery|\MeasureCollectionPlanQuery|\MeasureControlPlanQuery|\MeasureGateReviewQuery|\MeasureNonvalueAnalysisQuery|\MeasureValueStreamDiagramQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPhaseComponents findOne(ConnectionInterface $con = null) Return the first ChildPhaseComponents matching the query
 * @method     ChildPhaseComponents findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPhaseComponents matching the query, or a new ChildPhaseComponents object populated from the query conditions when no match is found
 *
 * @method     ChildPhaseComponents findOneById(int $id) Return the first ChildPhaseComponents filtered by the id column
 * @method     ChildPhaseComponents findOneByProjectId(int $project_id) Return the first ChildPhaseComponents filtered by the project_id column
 * @method     ChildPhaseComponents findOneByPhaseId(int $phase_id) Return the first ChildPhaseComponents filtered by the phase_id column
 * @method     ChildPhaseComponents findOneByStatus(string $status) Return the first ChildPhaseComponents filtered by the status column
 * @method     ChildPhaseComponents findOneByName(string $name) Return the first ChildPhaseComponents filtered by the name column
 * @method     ChildPhaseComponents findOneByGrade(string $grade) Return the first ChildPhaseComponents filtered by the grade column
 * @method     ChildPhaseComponents findOneByDateTimeStarted(string $date_time_started) Return the first ChildPhaseComponents filtered by the date_time_started column
 * @method     ChildPhaseComponents findOneByDateTimeCreated(string $date_time_created) Return the first ChildPhaseComponents filtered by the date_time_created column
 * @method     ChildPhaseComponents findOneByLastUpdated(string $last_updated) Return the first ChildPhaseComponents filtered by the last_updated column *

 * @method     ChildPhaseComponents requirePk($key, ConnectionInterface $con = null) Return the ChildPhaseComponents by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOne(ConnectionInterface $con = null) Return the first ChildPhaseComponents matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhaseComponents requireOneById(int $id) Return the first ChildPhaseComponents filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByProjectId(int $project_id) Return the first ChildPhaseComponents filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByPhaseId(int $phase_id) Return the first ChildPhaseComponents filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByStatus(string $status) Return the first ChildPhaseComponents filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByName(string $name) Return the first ChildPhaseComponents filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByGrade(string $grade) Return the first ChildPhaseComponents filtered by the grade column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByDateTimeStarted(string $date_time_started) Return the first ChildPhaseComponents filtered by the date_time_started column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByDateTimeCreated(string $date_time_created) Return the first ChildPhaseComponents filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPhaseComponents requireOneByLastUpdated(string $last_updated) Return the first ChildPhaseComponents filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPhaseComponents[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPhaseComponents objects based on current ModelCriteria
 * @method     ChildPhaseComponents[]|ObjectCollection findById(int $id) Return ChildPhaseComponents objects filtered by the id column
 * @method     ChildPhaseComponents[]|ObjectCollection findByProjectId(int $project_id) Return ChildPhaseComponents objects filtered by the project_id column
 * @method     ChildPhaseComponents[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildPhaseComponents objects filtered by the phase_id column
 * @method     ChildPhaseComponents[]|ObjectCollection findByStatus(string $status) Return ChildPhaseComponents objects filtered by the status column
 * @method     ChildPhaseComponents[]|ObjectCollection findByName(string $name) Return ChildPhaseComponents objects filtered by the name column
 * @method     ChildPhaseComponents[]|ObjectCollection findByGrade(string $grade) Return ChildPhaseComponents objects filtered by the grade column
 * @method     ChildPhaseComponents[]|ObjectCollection findByDateTimeStarted(string $date_time_started) Return ChildPhaseComponents objects filtered by the date_time_started column
 * @method     ChildPhaseComponents[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildPhaseComponents objects filtered by the date_time_created column
 * @method     ChildPhaseComponents[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildPhaseComponents objects filtered by the last_updated column
 * @method     ChildPhaseComponents[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PhaseComponentsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PhaseComponentsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PhaseComponents', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPhaseComponentsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPhaseComponentsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPhaseComponentsQuery) {
            return $criteria;
        }
        $query = new ChildPhaseComponentsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPhaseComponents|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PhaseComponentsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PhaseComponentsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPhaseComponents A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `status`, `name`, `grade`, `date_time_started`, `date_time_created`, `last_updated` FROM `phase_components` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPhaseComponents $obj */
            $obj = new ChildPhaseComponents();
            $obj->hydrate($row);
            PhaseComponentsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPhaseComponents|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the project_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectId(1234); // WHERE project_id = 1234
     * $query->filterByProjectId(array(12, 34)); // WHERE project_id IN (12, 34)
     * $query->filterByProjectId(array('min' => 12)); // WHERE project_id > 12
     * </code>
     *
     * @see       filterByProjects()
     *
     * @param     mixed $projectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_PROJECT_ID, $projectId, $comparison);
    }

    /**
     * Filter the query on the phase_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseId(1234); // WHERE phase_id = 1234
     * $query->filterByPhaseId(array(12, 34)); // WHERE phase_id IN (12, 34)
     * $query->filterByPhaseId(array('min' => 12)); // WHERE phase_id > 12
     * </code>
     *
     * @see       filterByProjectPhases()
     *
     * @param     mixed $phaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_PHASE_ID, $phaseId, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the grade column
     *
     * Example usage:
     * <code>
     * $query->filterByGrade('fooValue');   // WHERE grade = 'fooValue'
     * $query->filterByGrade('%fooValue%', Criteria::LIKE); // WHERE grade LIKE '%fooValue%'
     * </code>
     *
     * @param     string $grade The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByGrade($grade = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($grade)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_GRADE, $grade, $comparison);
    }

    /**
     * Filter the query on the date_time_started column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTimeStarted('2011-03-14'); // WHERE date_time_started = '2011-03-14'
     * $query->filterByDateTimeStarted('now'); // WHERE date_time_started = '2011-03-14'
     * $query->filterByDateTimeStarted(array('max' => 'yesterday')); // WHERE date_time_started > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTimeStarted The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDateTimeStarted($dateTimeStarted = null, $comparison = null)
    {
        if (is_array($dateTimeStarted)) {
            $useMinMax = false;
            if (isset($dateTimeStarted['min'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_DATE_TIME_STARTED, $dateTimeStarted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeStarted['max'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_DATE_TIME_STARTED, $dateTimeStarted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_DATE_TIME_STARTED, $dateTimeStarted, $comparison);
    }

    /**
     * Filter the query on the date_time_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTimeCreated('2011-03-14'); // WHERE date_time_created = '2011-03-14'
     * $query->filterByDateTimeCreated('now'); // WHERE date_time_created = '2011-03-14'
     * $query->filterByDateTimeCreated(array('max' => 'yesterday')); // WHERE date_time_created > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTimeCreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
    }

    /**
     * Filter the query on the last_updated column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdated('2011-03-14'); // WHERE last_updated = '2011-03-14'
     * $query->filterByLastUpdated('now'); // WHERE last_updated = '2011-03-14'
     * $query->filterByLastUpdated(array('max' => 'yesterday')); // WHERE last_updated > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(PhaseComponentsTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhaseComponentsTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProjects() only accepts arguments of type \Projects or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projects relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinProjects($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projects');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Projects');
        }

        return $this;
    }

    /**
     * Use the Projects relation Projects object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectsQuery A secondary query class using the current class as primary query
     */
    public function useProjectsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjects($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projects', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \ProjectPhases object
     *
     * @param \ProjectPhases|ObjectCollection $projectPhases The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProjectPhases() only accepts arguments of type \ProjectPhases or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectPhases relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinProjectPhases($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectPhases');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProjectPhases');
        }

        return $this;
    }

    /**
     * Use the ProjectPhases relation ProjectPhases object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectPhasesQuery A secondary query class using the current class as primary query
     */
    public function useProjectPhasesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectPhases($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectPhases', '\ProjectPhasesQuery');
    }

    /**
     * Filter the query by a related \AnalyzeCeMatrix object
     *
     * @param \AnalyzeCeMatrix|ObjectCollection $analyzeCeMatrix the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCeMatrix($analyzeCeMatrix, $comparison = null)
    {
        if ($analyzeCeMatrix instanceof \AnalyzeCeMatrix) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $analyzeCeMatrix->getPhaseComponentId(), $comparison);
        } elseif ($analyzeCeMatrix instanceof ObjectCollection) {
            return $this
                ->useAnalyzeCeMatrixQuery()
                ->filterByPrimaryKeys($analyzeCeMatrix->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalyzeCeMatrix() only accepts arguments of type \AnalyzeCeMatrix or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeCeMatrix relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinAnalyzeCeMatrix($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeCeMatrix');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnalyzeCeMatrix');
        }

        return $this;
    }

    /**
     * Use the AnalyzeCeMatrix relation AnalyzeCeMatrix object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeCeMatrixQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeCeMatrixQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeCeMatrix($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeCeMatrix', '\AnalyzeCeMatrixQuery');
    }

    /**
     * Filter the query by a related \AnalyzeCeMatrixOutputs object
     *
     * @param \AnalyzeCeMatrixOutputs|ObjectCollection $analyzeCeMatrixOutputs the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCeMatrixOutputs($analyzeCeMatrixOutputs, $comparison = null)
    {
        if ($analyzeCeMatrixOutputs instanceof \AnalyzeCeMatrixOutputs) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $analyzeCeMatrixOutputs->getPhaseComponentId(), $comparison);
        } elseif ($analyzeCeMatrixOutputs instanceof ObjectCollection) {
            return $this
                ->useAnalyzeCeMatrixOutputsQuery()
                ->filterByPrimaryKeys($analyzeCeMatrixOutputs->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalyzeCeMatrixOutputs() only accepts arguments of type \AnalyzeCeMatrixOutputs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinAnalyzeCeMatrixOutputs($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeCeMatrixOutputs');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnalyzeCeMatrixOutputs');
        }

        return $this;
    }

    /**
     * Use the AnalyzeCeMatrixOutputs relation AnalyzeCeMatrixOutputs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeCeMatrixOutputsQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeCeMatrixOutputsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeCeMatrixOutputs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeCeMatrixOutputs', '\AnalyzeCeMatrixOutputsQuery');
    }

    /**
     * Filter the query by a related \AnalyzeCriticalX object
     *
     * @param \AnalyzeCriticalX|ObjectCollection $analyzeCriticalX the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCriticalX($analyzeCriticalX, $comparison = null)
    {
        if ($analyzeCriticalX instanceof \AnalyzeCriticalX) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $analyzeCriticalX->getPhaseComponentId(), $comparison);
        } elseif ($analyzeCriticalX instanceof ObjectCollection) {
            return $this
                ->useAnalyzeCriticalXQuery()
                ->filterByPrimaryKeys($analyzeCriticalX->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalyzeCriticalX() only accepts arguments of type \AnalyzeCriticalX or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeCriticalX relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinAnalyzeCriticalX($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeCriticalX');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnalyzeCriticalX');
        }

        return $this;
    }

    /**
     * Use the AnalyzeCriticalX relation AnalyzeCriticalX object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeCriticalXQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeCriticalXQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeCriticalX($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeCriticalX', '\AnalyzeCriticalXQuery');
    }

    /**
     * Filter the query by a related \AnalyzeFmea object
     *
     * @param \AnalyzeFmea|ObjectCollection $analyzeFmea the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeFmea($analyzeFmea, $comparison = null)
    {
        if ($analyzeFmea instanceof \AnalyzeFmea) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $analyzeFmea->getPhaseComponentId(), $comparison);
        } elseif ($analyzeFmea instanceof ObjectCollection) {
            return $this
                ->useAnalyzeFmeaQuery()
                ->filterByPrimaryKeys($analyzeFmea->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalyzeFmea() only accepts arguments of type \AnalyzeFmea or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeFmea relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinAnalyzeFmea($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeFmea');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnalyzeFmea');
        }

        return $this;
    }

    /**
     * Use the AnalyzeFmea relation AnalyzeFmea object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeFmeaQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeFmeaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeFmea($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeFmea', '\AnalyzeFmeaQuery');
    }

    /**
     * Filter the query by a related \AnalyzeGateReview object
     *
     * @param \AnalyzeGateReview|ObjectCollection $analyzeGateReview the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeGateReview($analyzeGateReview, $comparison = null)
    {
        if ($analyzeGateReview instanceof \AnalyzeGateReview) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $analyzeGateReview->getPhaseComponentId(), $comparison);
        } elseif ($analyzeGateReview instanceof ObjectCollection) {
            return $this
                ->useAnalyzeGateReviewQuery()
                ->filterByPrimaryKeys($analyzeGateReview->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalyzeGateReview() only accepts arguments of type \AnalyzeGateReview or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeGateReview relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinAnalyzeGateReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeGateReview');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnalyzeGateReview');
        }

        return $this;
    }

    /**
     * Use the AnalyzeGateReview relation AnalyzeGateReview object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeGateReviewQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeGateReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeGateReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeGateReview', '\AnalyzeGateReviewQuery');
    }

    /**
     * Filter the query by a related \AnalyzeHypothesisMap object
     *
     * @param \AnalyzeHypothesisMap|ObjectCollection $analyzeHypothesisMap the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeHypothesisMap($analyzeHypothesisMap, $comparison = null)
    {
        if ($analyzeHypothesisMap instanceof \AnalyzeHypothesisMap) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $analyzeHypothesisMap->getPhaseComponentId(), $comparison);
        } elseif ($analyzeHypothesisMap instanceof ObjectCollection) {
            return $this
                ->useAnalyzeHypothesisMapQuery()
                ->filterByPrimaryKeys($analyzeHypothesisMap->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnalyzeHypothesisMap() only accepts arguments of type \AnalyzeHypothesisMap or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeHypothesisMap relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinAnalyzeHypothesisMap($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeHypothesisMap');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnalyzeHypothesisMap');
        }

        return $this;
    }

    /**
     * Use the AnalyzeHypothesisMap relation AnalyzeHypothesisMap object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeHypothesisMapQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeHypothesisMapQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeHypothesisMap($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeHypothesisMap', '\AnalyzeHypothesisMapQuery');
    }

    /**
     * Filter the query by a related \ChartExcelData object
     *
     * @param \ChartExcelData|ObjectCollection $chartExcelData the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByChartExcelData($chartExcelData, $comparison = null)
    {
        if ($chartExcelData instanceof \ChartExcelData) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $chartExcelData->getPhaseComponentId(), $comparison);
        } elseif ($chartExcelData instanceof ObjectCollection) {
            return $this
                ->useChartExcelDataQuery()
                ->filterByPrimaryKeys($chartExcelData->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByChartExcelData() only accepts arguments of type \ChartExcelData or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ChartExcelData relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinChartExcelData($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ChartExcelData');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ChartExcelData');
        }

        return $this;
    }

    /**
     * Use the ChartExcelData relation ChartExcelData object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ChartExcelDataQuery A secondary query class using the current class as primary query
     */
    public function useChartExcelDataQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinChartExcelData($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ChartExcelData', '\ChartExcelDataQuery');
    }

    /**
     * Filter the query by a related \ControlControlPlan object
     *
     * @param \ControlControlPlan|ObjectCollection $controlControlPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByControlControlPlan($controlControlPlan, $comparison = null)
    {
        if ($controlControlPlan instanceof \ControlControlPlan) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $controlControlPlan->getPhaseComponentId(), $comparison);
        } elseif ($controlControlPlan instanceof ObjectCollection) {
            return $this
                ->useControlControlPlanQuery()
                ->filterByPrimaryKeys($controlControlPlan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByControlControlPlan() only accepts arguments of type \ControlControlPlan or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ControlControlPlan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinControlControlPlan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ControlControlPlan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ControlControlPlan');
        }

        return $this;
    }

    /**
     * Use the ControlControlPlan relation ControlControlPlan object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ControlControlPlanQuery A secondary query class using the current class as primary query
     */
    public function useControlControlPlanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinControlControlPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ControlControlPlan', '\ControlControlPlanQuery');
    }

    /**
     * Filter the query by a related \ControlGateReview object
     *
     * @param \ControlGateReview|ObjectCollection $controlGateReview the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByControlGateReview($controlGateReview, $comparison = null)
    {
        if ($controlGateReview instanceof \ControlGateReview) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $controlGateReview->getPhaseComponentId(), $comparison);
        } elseif ($controlGateReview instanceof ObjectCollection) {
            return $this
                ->useControlGateReviewQuery()
                ->filterByPrimaryKeys($controlGateReview->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByControlGateReview() only accepts arguments of type \ControlGateReview or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ControlGateReview relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinControlGateReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ControlGateReview');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ControlGateReview');
        }

        return $this;
    }

    /**
     * Use the ControlGateReview relation ControlGateReview object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ControlGateReviewQuery A secondary query class using the current class as primary query
     */
    public function useControlGateReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinControlGateReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ControlGateReview', '\ControlGateReviewQuery');
    }

    /**
     * Filter the query by a related \ControlTestPlan object
     *
     * @param \ControlTestPlan|ObjectCollection $controlTestPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByControlTestPlan($controlTestPlan, $comparison = null)
    {
        if ($controlTestPlan instanceof \ControlTestPlan) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $controlTestPlan->getPhaseComponentId(), $comparison);
        } elseif ($controlTestPlan instanceof ObjectCollection) {
            return $this
                ->useControlTestPlanQuery()
                ->filterByPrimaryKeys($controlTestPlan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByControlTestPlan() only accepts arguments of type \ControlTestPlan or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ControlTestPlan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinControlTestPlan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ControlTestPlan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ControlTestPlan');
        }

        return $this;
    }

    /**
     * Use the ControlTestPlan relation ControlTestPlan object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ControlTestPlanQuery A secondary query class using the current class as primary query
     */
    public function useControlTestPlanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinControlTestPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ControlTestPlan', '\ControlTestPlanQuery');
    }

    /**
     * Filter the query by a related \DefineCommunication object
     *
     * @param \DefineCommunication|ObjectCollection $defineCommunication the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineCommunication($defineCommunication, $comparison = null)
    {
        if ($defineCommunication instanceof \DefineCommunication) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineCommunication->getPhaseComponentId(), $comparison);
        } elseif ($defineCommunication instanceof ObjectCollection) {
            return $this
                ->useDefineCommunicationQuery()
                ->filterByPrimaryKeys($defineCommunication->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineCommunication() only accepts arguments of type \DefineCommunication or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineCommunication relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineCommunication($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineCommunication');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineCommunication');
        }

        return $this;
    }

    /**
     * Use the DefineCommunication relation DefineCommunication object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineCommunicationQuery A secondary query class using the current class as primary query
     */
    public function useDefineCommunicationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineCommunication($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineCommunication', '\DefineCommunicationQuery');
    }

    /**
     * Filter the query by a related \DefineGateReview object
     *
     * @param \DefineGateReview|ObjectCollection $defineGateReview the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineGateReview($defineGateReview, $comparison = null)
    {
        if ($defineGateReview instanceof \DefineGateReview) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineGateReview->getPhaseComponentId(), $comparison);
        } elseif ($defineGateReview instanceof ObjectCollection) {
            return $this
                ->useDefineGateReviewQuery()
                ->filterByPrimaryKeys($defineGateReview->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineGateReview() only accepts arguments of type \DefineGateReview or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineGateReview relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineGateReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineGateReview');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineGateReview');
        }

        return $this;
    }

    /**
     * Use the DefineGateReview relation DefineGateReview object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineGateReviewQuery A secondary query class using the current class as primary query
     */
    public function useDefineGateReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineGateReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineGateReview', '\DefineGateReviewQuery');
    }

    /**
     * Filter the query by a related \DefineRaci object
     *
     * @param \DefineRaci|ObjectCollection $defineRaci the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineRaci($defineRaci, $comparison = null)
    {
        if ($defineRaci instanceof \DefineRaci) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineRaci->getPhaseComponentId(), $comparison);
        } elseif ($defineRaci instanceof ObjectCollection) {
            return $this
                ->useDefineRaciQuery()
                ->filterByPrimaryKeys($defineRaci->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineRaci() only accepts arguments of type \DefineRaci or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineRaci relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineRaci($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineRaci');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineRaci');
        }

        return $this;
    }

    /**
     * Use the DefineRaci relation DefineRaci object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineRaciQuery A secondary query class using the current class as primary query
     */
    public function useDefineRaciQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineRaci($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineRaci', '\DefineRaciQuery');
    }

    /**
     * Filter the query by a related \DefineRiskManagement object
     *
     * @param \DefineRiskManagement|ObjectCollection $defineRiskManagement the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineRiskManagement($defineRiskManagement, $comparison = null)
    {
        if ($defineRiskManagement instanceof \DefineRiskManagement) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineRiskManagement->getPhaseComponentId(), $comparison);
        } elseif ($defineRiskManagement instanceof ObjectCollection) {
            return $this
                ->useDefineRiskManagementQuery()
                ->filterByPrimaryKeys($defineRiskManagement->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineRiskManagement() only accepts arguments of type \DefineRiskManagement or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineRiskManagement relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineRiskManagement($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineRiskManagement');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineRiskManagement');
        }

        return $this;
    }

    /**
     * Use the DefineRiskManagement relation DefineRiskManagement object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineRiskManagementQuery A secondary query class using the current class as primary query
     */
    public function useDefineRiskManagementQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineRiskManagement($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineRiskManagement', '\DefineRiskManagementQuery');
    }

    /**
     * Filter the query by a related \DefineSipoc object
     *
     * @param \DefineSipoc|ObjectCollection $defineSipoc the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineSipoc($defineSipoc, $comparison = null)
    {
        if ($defineSipoc instanceof \DefineSipoc) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineSipoc->getPhaseComponentId(), $comparison);
        } elseif ($defineSipoc instanceof ObjectCollection) {
            return $this
                ->useDefineSipocQuery()
                ->filterByPrimaryKeys($defineSipoc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineSipoc() only accepts arguments of type \DefineSipoc or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineSipoc relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineSipoc($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineSipoc');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineSipoc');
        }

        return $this;
    }

    /**
     * Use the DefineSipoc relation DefineSipoc object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineSipocQuery A secondary query class using the current class as primary query
     */
    public function useDefineSipocQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineSipoc($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineSipoc', '\DefineSipocQuery');
    }

    /**
     * Filter the query by a related \DefineStakeholders object
     *
     * @param \DefineStakeholders|ObjectCollection $defineStakeholders the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineStakeholders($defineStakeholders, $comparison = null)
    {
        if ($defineStakeholders instanceof \DefineStakeholders) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineStakeholders->getPhaseComponentId(), $comparison);
        } elseif ($defineStakeholders instanceof ObjectCollection) {
            return $this
                ->useDefineStakeholdersQuery()
                ->filterByPrimaryKeys($defineStakeholders->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineStakeholders() only accepts arguments of type \DefineStakeholders or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineStakeholders relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineStakeholders($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineStakeholders');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineStakeholders');
        }

        return $this;
    }

    /**
     * Use the DefineStakeholders relation DefineStakeholders object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineStakeholdersQuery A secondary query class using the current class as primary query
     */
    public function useDefineStakeholdersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineStakeholders($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineStakeholders', '\DefineStakeholdersQuery');
    }

    /**
     * Filter the query by a related \DefineValueStreamDiagram object
     *
     * @param \DefineValueStreamDiagram|ObjectCollection $defineValueStreamDiagram the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineValueStreamDiagram($defineValueStreamDiagram, $comparison = null)
    {
        if ($defineValueStreamDiagram instanceof \DefineValueStreamDiagram) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineValueStreamDiagram->getPhaseComponentId(), $comparison);
        } elseif ($defineValueStreamDiagram instanceof ObjectCollection) {
            return $this
                ->useDefineValueStreamDiagramQuery()
                ->filterByPrimaryKeys($defineValueStreamDiagram->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineValueStreamDiagram() only accepts arguments of type \DefineValueStreamDiagram or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineValueStreamDiagram relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineValueStreamDiagram($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineValueStreamDiagram');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineValueStreamDiagram');
        }

        return $this;
    }

    /**
     * Use the DefineValueStreamDiagram relation DefineValueStreamDiagram object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineValueStreamDiagramQuery A secondary query class using the current class as primary query
     */
    public function useDefineValueStreamDiagramQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineValueStreamDiagram($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineValueStreamDiagram', '\DefineValueStreamDiagramQuery');
    }

    /**
     * Filter the query by a related \DefineVocCcr object
     *
     * @param \DefineVocCcr|ObjectCollection $defineVocCcr the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByDefineVocCcr($defineVocCcr, $comparison = null)
    {
        if ($defineVocCcr instanceof \DefineVocCcr) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $defineVocCcr->getPhaseComponentId(), $comparison);
        } elseif ($defineVocCcr instanceof ObjectCollection) {
            return $this
                ->useDefineVocCcrQuery()
                ->filterByPrimaryKeys($defineVocCcr->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDefineVocCcr() only accepts arguments of type \DefineVocCcr or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DefineVocCcr relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinDefineVocCcr($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DefineVocCcr');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'DefineVocCcr');
        }

        return $this;
    }

    /**
     * Use the DefineVocCcr relation DefineVocCcr object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DefineVocCcrQuery A secondary query class using the current class as primary query
     */
    public function useDefineVocCcrQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDefineVocCcr($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineVocCcr', '\DefineVocCcrQuery');
    }

    /**
     * Filter the query by a related \ImproveGateReview object
     *
     * @param \ImproveGateReview|ObjectCollection $improveGateReview the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByImproveGateReview($improveGateReview, $comparison = null)
    {
        if ($improveGateReview instanceof \ImproveGateReview) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $improveGateReview->getPhaseComponentId(), $comparison);
        } elseif ($improveGateReview instanceof ObjectCollection) {
            return $this
                ->useImproveGateReviewQuery()
                ->filterByPrimaryKeys($improveGateReview->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByImproveGateReview() only accepts arguments of type \ImproveGateReview or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ImproveGateReview relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinImproveGateReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ImproveGateReview');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ImproveGateReview');
        }

        return $this;
    }

    /**
     * Use the ImproveGateReview relation ImproveGateReview object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ImproveGateReviewQuery A secondary query class using the current class as primary query
     */
    public function useImproveGateReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImproveGateReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ImproveGateReview', '\ImproveGateReviewQuery');
    }

    /**
     * Filter the query by a related \ImproveImprovementPlan object
     *
     * @param \ImproveImprovementPlan|ObjectCollection $improveImprovementPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByImproveImprovementPlan($improveImprovementPlan, $comparison = null)
    {
        if ($improveImprovementPlan instanceof \ImproveImprovementPlan) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $improveImprovementPlan->getPhaseComponentId(), $comparison);
        } elseif ($improveImprovementPlan instanceof ObjectCollection) {
            return $this
                ->useImproveImprovementPlanQuery()
                ->filterByPrimaryKeys($improveImprovementPlan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByImproveImprovementPlan() only accepts arguments of type \ImproveImprovementPlan or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ImproveImprovementPlan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinImproveImprovementPlan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ImproveImprovementPlan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ImproveImprovementPlan');
        }

        return $this;
    }

    /**
     * Use the ImproveImprovementPlan relation ImproveImprovementPlan object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ImproveImprovementPlanQuery A secondary query class using the current class as primary query
     */
    public function useImproveImprovementPlanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImproveImprovementPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ImproveImprovementPlan', '\ImproveImprovementPlanQuery');
    }

    /**
     * Filter the query by a related \ImproveValueStreamDiagram object
     *
     * @param \ImproveValueStreamDiagram|ObjectCollection $improveValueStreamDiagram the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByImproveValueStreamDiagram($improveValueStreamDiagram, $comparison = null)
    {
        if ($improveValueStreamDiagram instanceof \ImproveValueStreamDiagram) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $improveValueStreamDiagram->getPhaseComponentId(), $comparison);
        } elseif ($improveValueStreamDiagram instanceof ObjectCollection) {
            return $this
                ->useImproveValueStreamDiagramQuery()
                ->filterByPrimaryKeys($improveValueStreamDiagram->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByImproveValueStreamDiagram() only accepts arguments of type \ImproveValueStreamDiagram or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ImproveValueStreamDiagram relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinImproveValueStreamDiagram($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ImproveValueStreamDiagram');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ImproveValueStreamDiagram');
        }

        return $this;
    }

    /**
     * Use the ImproveValueStreamDiagram relation ImproveValueStreamDiagram object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ImproveValueStreamDiagramQuery A secondary query class using the current class as primary query
     */
    public function useImproveValueStreamDiagramQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImproveValueStreamDiagram($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ImproveValueStreamDiagram', '\ImproveValueStreamDiagramQuery');
    }

    /**
     * Filter the query by a related \MeasureCollectionPlan object
     *
     * @param \MeasureCollectionPlan|ObjectCollection $measureCollectionPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByMeasureCollectionPlan($measureCollectionPlan, $comparison = null)
    {
        if ($measureCollectionPlan instanceof \MeasureCollectionPlan) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $measureCollectionPlan->getPhaseComponentId(), $comparison);
        } elseif ($measureCollectionPlan instanceof ObjectCollection) {
            return $this
                ->useMeasureCollectionPlanQuery()
                ->filterByPrimaryKeys($measureCollectionPlan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMeasureCollectionPlan() only accepts arguments of type \MeasureCollectionPlan or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MeasureCollectionPlan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinMeasureCollectionPlan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MeasureCollectionPlan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MeasureCollectionPlan');
        }

        return $this;
    }

    /**
     * Use the MeasureCollectionPlan relation MeasureCollectionPlan object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MeasureCollectionPlanQuery A secondary query class using the current class as primary query
     */
    public function useMeasureCollectionPlanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMeasureCollectionPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MeasureCollectionPlan', '\MeasureCollectionPlanQuery');
    }

    /**
     * Filter the query by a related \MeasureControlPlan object
     *
     * @param \MeasureControlPlan|ObjectCollection $measureControlPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByMeasureControlPlan($measureControlPlan, $comparison = null)
    {
        if ($measureControlPlan instanceof \MeasureControlPlan) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $measureControlPlan->getPhaseComponentId(), $comparison);
        } elseif ($measureControlPlan instanceof ObjectCollection) {
            return $this
                ->useMeasureControlPlanQuery()
                ->filterByPrimaryKeys($measureControlPlan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMeasureControlPlan() only accepts arguments of type \MeasureControlPlan or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MeasureControlPlan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinMeasureControlPlan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MeasureControlPlan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MeasureControlPlan');
        }

        return $this;
    }

    /**
     * Use the MeasureControlPlan relation MeasureControlPlan object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MeasureControlPlanQuery A secondary query class using the current class as primary query
     */
    public function useMeasureControlPlanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMeasureControlPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MeasureControlPlan', '\MeasureControlPlanQuery');
    }

    /**
     * Filter the query by a related \MeasureGateReview object
     *
     * @param \MeasureGateReview|ObjectCollection $measureGateReview the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByMeasureGateReview($measureGateReview, $comparison = null)
    {
        if ($measureGateReview instanceof \MeasureGateReview) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $measureGateReview->getPhaseComponentId(), $comparison);
        } elseif ($measureGateReview instanceof ObjectCollection) {
            return $this
                ->useMeasureGateReviewQuery()
                ->filterByPrimaryKeys($measureGateReview->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMeasureGateReview() only accepts arguments of type \MeasureGateReview or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MeasureGateReview relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinMeasureGateReview($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MeasureGateReview');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MeasureGateReview');
        }

        return $this;
    }

    /**
     * Use the MeasureGateReview relation MeasureGateReview object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MeasureGateReviewQuery A secondary query class using the current class as primary query
     */
    public function useMeasureGateReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMeasureGateReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MeasureGateReview', '\MeasureGateReviewQuery');
    }

    /**
     * Filter the query by a related \MeasureNonvalueAnalysis object
     *
     * @param \MeasureNonvalueAnalysis|ObjectCollection $measureNonvalueAnalysis the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByMeasureNonvalueAnalysis($measureNonvalueAnalysis, $comparison = null)
    {
        if ($measureNonvalueAnalysis instanceof \MeasureNonvalueAnalysis) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $measureNonvalueAnalysis->getPhaseComponentId(), $comparison);
        } elseif ($measureNonvalueAnalysis instanceof ObjectCollection) {
            return $this
                ->useMeasureNonvalueAnalysisQuery()
                ->filterByPrimaryKeys($measureNonvalueAnalysis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMeasureNonvalueAnalysis() only accepts arguments of type \MeasureNonvalueAnalysis or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MeasureNonvalueAnalysis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinMeasureNonvalueAnalysis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MeasureNonvalueAnalysis');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MeasureNonvalueAnalysis');
        }

        return $this;
    }

    /**
     * Use the MeasureNonvalueAnalysis relation MeasureNonvalueAnalysis object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MeasureNonvalueAnalysisQuery A secondary query class using the current class as primary query
     */
    public function useMeasureNonvalueAnalysisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMeasureNonvalueAnalysis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MeasureNonvalueAnalysis', '\MeasureNonvalueAnalysisQuery');
    }

    /**
     * Filter the query by a related \MeasureValueStreamDiagram object
     *
     * @param \MeasureValueStreamDiagram|ObjectCollection $measureValueStreamDiagram the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function filterByMeasureValueStreamDiagram($measureValueStreamDiagram, $comparison = null)
    {
        if ($measureValueStreamDiagram instanceof \MeasureValueStreamDiagram) {
            return $this
                ->addUsingAlias(PhaseComponentsTableMap::COL_ID, $measureValueStreamDiagram->getPhaseComponentId(), $comparison);
        } elseif ($measureValueStreamDiagram instanceof ObjectCollection) {
            return $this
                ->useMeasureValueStreamDiagramQuery()
                ->filterByPrimaryKeys($measureValueStreamDiagram->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMeasureValueStreamDiagram() only accepts arguments of type \MeasureValueStreamDiagram or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MeasureValueStreamDiagram relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function joinMeasureValueStreamDiagram($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MeasureValueStreamDiagram');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MeasureValueStreamDiagram');
        }

        return $this;
    }

    /**
     * Use the MeasureValueStreamDiagram relation MeasureValueStreamDiagram object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MeasureValueStreamDiagramQuery A secondary query class using the current class as primary query
     */
    public function useMeasureValueStreamDiagramQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMeasureValueStreamDiagram($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MeasureValueStreamDiagram', '\MeasureValueStreamDiagramQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPhaseComponents $phaseComponents Object to remove from the list of results
     *
     * @return $this|ChildPhaseComponentsQuery The current query, for fluid interface
     */
    public function prune($phaseComponents = null)
    {
        if ($phaseComponents) {
            $this->addUsingAlias(PhaseComponentsTableMap::COL_ID, $phaseComponents->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the phase_components table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhaseComponentsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PhaseComponentsTableMap::clearInstancePool();
            PhaseComponentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhaseComponentsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PhaseComponentsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PhaseComponentsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PhaseComponentsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PhaseComponentsQuery
