<?php

namespace Base;

use \Projects as ChildProjects;
use \ProjectsQuery as ChildProjectsQuery;
use \Exception;
use \PDO;
use Map\ProjectsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'projects' table.
 *
 *
 *
 * @method     ChildProjectsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProjectsQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method     ChildProjectsQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ChildProjectsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildProjectsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildProjectsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildProjectsQuery orderByDiagramType($order = Criteria::ASC) Order by the diagram_type column
 * @method     ChildProjectsQuery orderByLead($order = Criteria::ASC) Order by the lead column
 * @method     ChildProjectsQuery orderBySponsor($order = Criteria::ASC) Order by the sponsor column
 * @method     ChildProjectsQuery orderByCoreTeam($order = Criteria::ASC) Order by the core_team column
 * @method     ChildProjectsQuery orderByBusinessUnit($order = Criteria::ASC) Order by the business_unit column
 * @method     ChildProjectsQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ChildProjectsQuery orderByBusinessImpact($order = Criteria::ASC) Order by the business_impact column
 * @method     ChildProjectsQuery orderByBusinessImpactValue($order = Criteria::ASC) Order by the business_impact_value column
 * @method     ChildProjectsQuery orderByProblemStatement($order = Criteria::ASC) Order by the problem_statement column
 * @method     ChildProjectsQuery orderByGoals($order = Criteria::ASC) Order by the goals column
 * @method     ChildProjectsQuery orderByScope($order = Criteria::ASC) Order by the scope column
 * @method     ChildProjectsQuery orderByDefineReviewDate($order = Criteria::ASC) Order by the define_review_date column
 * @method     ChildProjectsQuery orderByMeasureReviewDate($order = Criteria::ASC) Order by the measure_review_date column
 * @method     ChildProjectsQuery orderByAnalyzeReviewDate($order = Criteria::ASC) Order by the analyze_review_date column
 * @method     ChildProjectsQuery orderByImproveReviewDate($order = Criteria::ASC) Order by the improve_review_date column
 * @method     ChildProjectsQuery orderByControlReviewDate($order = Criteria::ASC) Order by the control_review_date column
 * @method     ChildProjectsQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildProjectsQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildProjectsQuery groupById() Group by the id column
 * @method     ChildProjectsQuery groupByClientId() Group by the client_id column
 * @method     ChildProjectsQuery groupByCreatedBy() Group by the created_by column
 * @method     ChildProjectsQuery groupByStatus() Group by the status column
 * @method     ChildProjectsQuery groupByName() Group by the name column
 * @method     ChildProjectsQuery groupByType() Group by the type column
 * @method     ChildProjectsQuery groupByDiagramType() Group by the diagram_type column
 * @method     ChildProjectsQuery groupByLead() Group by the lead column
 * @method     ChildProjectsQuery groupBySponsor() Group by the sponsor column
 * @method     ChildProjectsQuery groupByCoreTeam() Group by the core_team column
 * @method     ChildProjectsQuery groupByBusinessUnit() Group by the business_unit column
 * @method     ChildProjectsQuery groupByLocation() Group by the location column
 * @method     ChildProjectsQuery groupByBusinessImpact() Group by the business_impact column
 * @method     ChildProjectsQuery groupByBusinessImpactValue() Group by the business_impact_value column
 * @method     ChildProjectsQuery groupByProblemStatement() Group by the problem_statement column
 * @method     ChildProjectsQuery groupByGoals() Group by the goals column
 * @method     ChildProjectsQuery groupByScope() Group by the scope column
 * @method     ChildProjectsQuery groupByDefineReviewDate() Group by the define_review_date column
 * @method     ChildProjectsQuery groupByMeasureReviewDate() Group by the measure_review_date column
 * @method     ChildProjectsQuery groupByAnalyzeReviewDate() Group by the analyze_review_date column
 * @method     ChildProjectsQuery groupByImproveReviewDate() Group by the improve_review_date column
 * @method     ChildProjectsQuery groupByControlReviewDate() Group by the control_review_date column
 * @method     ChildProjectsQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildProjectsQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildProjectsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProjectsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProjectsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProjectsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProjectsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProjectsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProjectsQuery leftJoinClients($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clients relation
 * @method     ChildProjectsQuery rightJoinClients($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clients relation
 * @method     ChildProjectsQuery innerJoinClients($relationAlias = null) Adds a INNER JOIN clause to the query using the Clients relation
 *
 * @method     ChildProjectsQuery joinWithClients($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Clients relation
 *
 * @method     ChildProjectsQuery leftJoinWithClients() Adds a LEFT JOIN clause and with to the query using the Clients relation
 * @method     ChildProjectsQuery rightJoinWithClients() Adds a RIGHT JOIN clause and with to the query using the Clients relation
 * @method     ChildProjectsQuery innerJoinWithClients() Adds a INNER JOIN clause and with to the query using the Clients relation
 *
 * @method     ChildProjectsQuery leftJoinUsersRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedByCreatedBy relation
 * @method     ChildProjectsQuery rightJoinUsersRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedByCreatedBy relation
 * @method     ChildProjectsQuery innerJoinUsersRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedByCreatedBy relation
 *
 * @method     ChildProjectsQuery joinWithUsersRelatedByCreatedBy($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedByCreatedBy relation
 *
 * @method     ChildProjectsQuery leftJoinWithUsersRelatedByCreatedBy() Adds a LEFT JOIN clause and with to the query using the UsersRelatedByCreatedBy relation
 * @method     ChildProjectsQuery rightJoinWithUsersRelatedByCreatedBy() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedByCreatedBy relation
 * @method     ChildProjectsQuery innerJoinWithUsersRelatedByCreatedBy() Adds a INNER JOIN clause and with to the query using the UsersRelatedByCreatedBy relation
 *
 * @method     ChildProjectsQuery leftJoinUsersRelatedBySponsor($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedBySponsor relation
 * @method     ChildProjectsQuery rightJoinUsersRelatedBySponsor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedBySponsor relation
 * @method     ChildProjectsQuery innerJoinUsersRelatedBySponsor($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedBySponsor relation
 *
 * @method     ChildProjectsQuery joinWithUsersRelatedBySponsor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedBySponsor relation
 *
 * @method     ChildProjectsQuery leftJoinWithUsersRelatedBySponsor() Adds a LEFT JOIN clause and with to the query using the UsersRelatedBySponsor relation
 * @method     ChildProjectsQuery rightJoinWithUsersRelatedBySponsor() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedBySponsor relation
 * @method     ChildProjectsQuery innerJoinWithUsersRelatedBySponsor() Adds a INNER JOIN clause and with to the query using the UsersRelatedBySponsor relation
 *
 * @method     ChildProjectsQuery leftJoinUsersRelatedByLead($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedByLead relation
 * @method     ChildProjectsQuery rightJoinUsersRelatedByLead($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedByLead relation
 * @method     ChildProjectsQuery innerJoinUsersRelatedByLead($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedByLead relation
 *
 * @method     ChildProjectsQuery joinWithUsersRelatedByLead($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedByLead relation
 *
 * @method     ChildProjectsQuery leftJoinWithUsersRelatedByLead() Adds a LEFT JOIN clause and with to the query using the UsersRelatedByLead relation
 * @method     ChildProjectsQuery rightJoinWithUsersRelatedByLead() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedByLead relation
 * @method     ChildProjectsQuery innerJoinWithUsersRelatedByLead() Adds a INNER JOIN clause and with to the query using the UsersRelatedByLead relation
 *
 * @method     ChildProjectsQuery leftJoinActionTracking($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionTracking relation
 * @method     ChildProjectsQuery rightJoinActionTracking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionTracking relation
 * @method     ChildProjectsQuery innerJoinActionTracking($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionTracking relation
 *
 * @method     ChildProjectsQuery joinWithActionTracking($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActionTracking relation
 *
 * @method     ChildProjectsQuery leftJoinWithActionTracking() Adds a LEFT JOIN clause and with to the query using the ActionTracking relation
 * @method     ChildProjectsQuery rightJoinWithActionTracking() Adds a RIGHT JOIN clause and with to the query using the ActionTracking relation
 * @method     ChildProjectsQuery innerJoinWithActionTracking() Adds a INNER JOIN clause and with to the query using the ActionTracking relation
 *
 * @method     ChildProjectsQuery leftJoinAnalyzeCeMatrix($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCeMatrix relation
 * @method     ChildProjectsQuery rightJoinAnalyzeCeMatrix($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCeMatrix relation
 * @method     ChildProjectsQuery innerJoinAnalyzeCeMatrix($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildProjectsQuery joinWithAnalyzeCeMatrix($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildProjectsQuery leftJoinWithAnalyzeCeMatrix() Adds a LEFT JOIN clause and with to the query using the AnalyzeCeMatrix relation
 * @method     ChildProjectsQuery rightJoinWithAnalyzeCeMatrix() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCeMatrix relation
 * @method     ChildProjectsQuery innerJoinWithAnalyzeCeMatrix() Adds a INNER JOIN clause and with to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildProjectsQuery leftJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildProjectsQuery rightJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildProjectsQuery innerJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildProjectsQuery joinWithAnalyzeCeMatrixOutputs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildProjectsQuery leftJoinWithAnalyzeCeMatrixOutputs() Adds a LEFT JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildProjectsQuery rightJoinWithAnalyzeCeMatrixOutputs() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildProjectsQuery innerJoinWithAnalyzeCeMatrixOutputs() Adds a INNER JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildProjectsQuery leftJoinAnalyzeCriticalX($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCriticalX relation
 * @method     ChildProjectsQuery rightJoinAnalyzeCriticalX($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCriticalX relation
 * @method     ChildProjectsQuery innerJoinAnalyzeCriticalX($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCriticalX relation
 *
 * @method     ChildProjectsQuery joinWithAnalyzeCriticalX($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCriticalX relation
 *
 * @method     ChildProjectsQuery leftJoinWithAnalyzeCriticalX() Adds a LEFT JOIN clause and with to the query using the AnalyzeCriticalX relation
 * @method     ChildProjectsQuery rightJoinWithAnalyzeCriticalX() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCriticalX relation
 * @method     ChildProjectsQuery innerJoinWithAnalyzeCriticalX() Adds a INNER JOIN clause and with to the query using the AnalyzeCriticalX relation
 *
 * @method     ChildProjectsQuery leftJoinAnalyzeFmea($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeFmea relation
 * @method     ChildProjectsQuery rightJoinAnalyzeFmea($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeFmea relation
 * @method     ChildProjectsQuery innerJoinAnalyzeFmea($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeFmea relation
 *
 * @method     ChildProjectsQuery joinWithAnalyzeFmea($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeFmea relation
 *
 * @method     ChildProjectsQuery leftJoinWithAnalyzeFmea() Adds a LEFT JOIN clause and with to the query using the AnalyzeFmea relation
 * @method     ChildProjectsQuery rightJoinWithAnalyzeFmea() Adds a RIGHT JOIN clause and with to the query using the AnalyzeFmea relation
 * @method     ChildProjectsQuery innerJoinWithAnalyzeFmea() Adds a INNER JOIN clause and with to the query using the AnalyzeFmea relation
 *
 * @method     ChildProjectsQuery leftJoinAnalyzeGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeGateReview relation
 * @method     ChildProjectsQuery rightJoinAnalyzeGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeGateReview relation
 * @method     ChildProjectsQuery innerJoinAnalyzeGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeGateReview relation
 *
 * @method     ChildProjectsQuery joinWithAnalyzeGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinWithAnalyzeGateReview() Adds a LEFT JOIN clause and with to the query using the AnalyzeGateReview relation
 * @method     ChildProjectsQuery rightJoinWithAnalyzeGateReview() Adds a RIGHT JOIN clause and with to the query using the AnalyzeGateReview relation
 * @method     ChildProjectsQuery innerJoinWithAnalyzeGateReview() Adds a INNER JOIN clause and with to the query using the AnalyzeGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinAnalyzeHypothesisMap($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeHypothesisMap relation
 * @method     ChildProjectsQuery rightJoinAnalyzeHypothesisMap($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeHypothesisMap relation
 * @method     ChildProjectsQuery innerJoinAnalyzeHypothesisMap($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeHypothesisMap relation
 *
 * @method     ChildProjectsQuery joinWithAnalyzeHypothesisMap($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeHypothesisMap relation
 *
 * @method     ChildProjectsQuery leftJoinWithAnalyzeHypothesisMap() Adds a LEFT JOIN clause and with to the query using the AnalyzeHypothesisMap relation
 * @method     ChildProjectsQuery rightJoinWithAnalyzeHypothesisMap() Adds a RIGHT JOIN clause and with to the query using the AnalyzeHypothesisMap relation
 * @method     ChildProjectsQuery innerJoinWithAnalyzeHypothesisMap() Adds a INNER JOIN clause and with to the query using the AnalyzeHypothesisMap relation
 *
 * @method     ChildProjectsQuery leftJoinChartExcelData($relationAlias = null) Adds a LEFT JOIN clause to the query using the ChartExcelData relation
 * @method     ChildProjectsQuery rightJoinChartExcelData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ChartExcelData relation
 * @method     ChildProjectsQuery innerJoinChartExcelData($relationAlias = null) Adds a INNER JOIN clause to the query using the ChartExcelData relation
 *
 * @method     ChildProjectsQuery joinWithChartExcelData($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ChartExcelData relation
 *
 * @method     ChildProjectsQuery leftJoinWithChartExcelData() Adds a LEFT JOIN clause and with to the query using the ChartExcelData relation
 * @method     ChildProjectsQuery rightJoinWithChartExcelData() Adds a RIGHT JOIN clause and with to the query using the ChartExcelData relation
 * @method     ChildProjectsQuery innerJoinWithChartExcelData() Adds a INNER JOIN clause and with to the query using the ChartExcelData relation
 *
 * @method     ChildProjectsQuery leftJoinControlControlPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlControlPlan relation
 * @method     ChildProjectsQuery rightJoinControlControlPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlControlPlan relation
 * @method     ChildProjectsQuery innerJoinControlControlPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlControlPlan relation
 *
 * @method     ChildProjectsQuery joinWithControlControlPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlControlPlan relation
 *
 * @method     ChildProjectsQuery leftJoinWithControlControlPlan() Adds a LEFT JOIN clause and with to the query using the ControlControlPlan relation
 * @method     ChildProjectsQuery rightJoinWithControlControlPlan() Adds a RIGHT JOIN clause and with to the query using the ControlControlPlan relation
 * @method     ChildProjectsQuery innerJoinWithControlControlPlan() Adds a INNER JOIN clause and with to the query using the ControlControlPlan relation
 *
 * @method     ChildProjectsQuery leftJoinControlGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlGateReview relation
 * @method     ChildProjectsQuery rightJoinControlGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlGateReview relation
 * @method     ChildProjectsQuery innerJoinControlGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlGateReview relation
 *
 * @method     ChildProjectsQuery joinWithControlGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinWithControlGateReview() Adds a LEFT JOIN clause and with to the query using the ControlGateReview relation
 * @method     ChildProjectsQuery rightJoinWithControlGateReview() Adds a RIGHT JOIN clause and with to the query using the ControlGateReview relation
 * @method     ChildProjectsQuery innerJoinWithControlGateReview() Adds a INNER JOIN clause and with to the query using the ControlGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinControlTestPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlTestPlan relation
 * @method     ChildProjectsQuery rightJoinControlTestPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlTestPlan relation
 * @method     ChildProjectsQuery innerJoinControlTestPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlTestPlan relation
 *
 * @method     ChildProjectsQuery joinWithControlTestPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlTestPlan relation
 *
 * @method     ChildProjectsQuery leftJoinWithControlTestPlan() Adds a LEFT JOIN clause and with to the query using the ControlTestPlan relation
 * @method     ChildProjectsQuery rightJoinWithControlTestPlan() Adds a RIGHT JOIN clause and with to the query using the ControlTestPlan relation
 * @method     ChildProjectsQuery innerJoinWithControlTestPlan() Adds a INNER JOIN clause and with to the query using the ControlTestPlan relation
 *
 * @method     ChildProjectsQuery leftJoinDefineCommunication($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineCommunication relation
 * @method     ChildProjectsQuery rightJoinDefineCommunication($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineCommunication relation
 * @method     ChildProjectsQuery innerJoinDefineCommunication($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineCommunication relation
 *
 * @method     ChildProjectsQuery joinWithDefineCommunication($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineCommunication relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineCommunication() Adds a LEFT JOIN clause and with to the query using the DefineCommunication relation
 * @method     ChildProjectsQuery rightJoinWithDefineCommunication() Adds a RIGHT JOIN clause and with to the query using the DefineCommunication relation
 * @method     ChildProjectsQuery innerJoinWithDefineCommunication() Adds a INNER JOIN clause and with to the query using the DefineCommunication relation
 *
 * @method     ChildProjectsQuery leftJoinDefineGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineGateReview relation
 * @method     ChildProjectsQuery rightJoinDefineGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineGateReview relation
 * @method     ChildProjectsQuery innerJoinDefineGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineGateReview relation
 *
 * @method     ChildProjectsQuery joinWithDefineGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineGateReview() Adds a LEFT JOIN clause and with to the query using the DefineGateReview relation
 * @method     ChildProjectsQuery rightJoinWithDefineGateReview() Adds a RIGHT JOIN clause and with to the query using the DefineGateReview relation
 * @method     ChildProjectsQuery innerJoinWithDefineGateReview() Adds a INNER JOIN clause and with to the query using the DefineGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinDefineRaci($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineRaci relation
 * @method     ChildProjectsQuery rightJoinDefineRaci($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineRaci relation
 * @method     ChildProjectsQuery innerJoinDefineRaci($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineRaci relation
 *
 * @method     ChildProjectsQuery joinWithDefineRaci($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineRaci relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineRaci() Adds a LEFT JOIN clause and with to the query using the DefineRaci relation
 * @method     ChildProjectsQuery rightJoinWithDefineRaci() Adds a RIGHT JOIN clause and with to the query using the DefineRaci relation
 * @method     ChildProjectsQuery innerJoinWithDefineRaci() Adds a INNER JOIN clause and with to the query using the DefineRaci relation
 *
 * @method     ChildProjectsQuery leftJoinDefineRiskManagement($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineRiskManagement relation
 * @method     ChildProjectsQuery rightJoinDefineRiskManagement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineRiskManagement relation
 * @method     ChildProjectsQuery innerJoinDefineRiskManagement($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineRiskManagement relation
 *
 * @method     ChildProjectsQuery joinWithDefineRiskManagement($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineRiskManagement relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineRiskManagement() Adds a LEFT JOIN clause and with to the query using the DefineRiskManagement relation
 * @method     ChildProjectsQuery rightJoinWithDefineRiskManagement() Adds a RIGHT JOIN clause and with to the query using the DefineRiskManagement relation
 * @method     ChildProjectsQuery innerJoinWithDefineRiskManagement() Adds a INNER JOIN clause and with to the query using the DefineRiskManagement relation
 *
 * @method     ChildProjectsQuery leftJoinDefineSipoc($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineSipoc relation
 * @method     ChildProjectsQuery rightJoinDefineSipoc($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineSipoc relation
 * @method     ChildProjectsQuery innerJoinDefineSipoc($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineSipoc relation
 *
 * @method     ChildProjectsQuery joinWithDefineSipoc($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineSipoc relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineSipoc() Adds a LEFT JOIN clause and with to the query using the DefineSipoc relation
 * @method     ChildProjectsQuery rightJoinWithDefineSipoc() Adds a RIGHT JOIN clause and with to the query using the DefineSipoc relation
 * @method     ChildProjectsQuery innerJoinWithDefineSipoc() Adds a INNER JOIN clause and with to the query using the DefineSipoc relation
 *
 * @method     ChildProjectsQuery leftJoinDefineStakeholders($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineStakeholders relation
 * @method     ChildProjectsQuery rightJoinDefineStakeholders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineStakeholders relation
 * @method     ChildProjectsQuery innerJoinDefineStakeholders($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineStakeholders relation
 *
 * @method     ChildProjectsQuery joinWithDefineStakeholders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineStakeholders relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineStakeholders() Adds a LEFT JOIN clause and with to the query using the DefineStakeholders relation
 * @method     ChildProjectsQuery rightJoinWithDefineStakeholders() Adds a RIGHT JOIN clause and with to the query using the DefineStakeholders relation
 * @method     ChildProjectsQuery innerJoinWithDefineStakeholders() Adds a INNER JOIN clause and with to the query using the DefineStakeholders relation
 *
 * @method     ChildProjectsQuery leftJoinDefineValueStreamDiagram($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineValueStreamDiagram relation
 * @method     ChildProjectsQuery rightJoinDefineValueStreamDiagram($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineValueStreamDiagram relation
 * @method     ChildProjectsQuery innerJoinDefineValueStreamDiagram($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery joinWithDefineValueStreamDiagram($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineValueStreamDiagram() Adds a LEFT JOIN clause and with to the query using the DefineValueStreamDiagram relation
 * @method     ChildProjectsQuery rightJoinWithDefineValueStreamDiagram() Adds a RIGHT JOIN clause and with to the query using the DefineValueStreamDiagram relation
 * @method     ChildProjectsQuery innerJoinWithDefineValueStreamDiagram() Adds a INNER JOIN clause and with to the query using the DefineValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery leftJoinDefineVocCcr($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineVocCcr relation
 * @method     ChildProjectsQuery rightJoinDefineVocCcr($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineVocCcr relation
 * @method     ChildProjectsQuery innerJoinDefineVocCcr($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineVocCcr relation
 *
 * @method     ChildProjectsQuery joinWithDefineVocCcr($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineVocCcr relation
 *
 * @method     ChildProjectsQuery leftJoinWithDefineVocCcr() Adds a LEFT JOIN clause and with to the query using the DefineVocCcr relation
 * @method     ChildProjectsQuery rightJoinWithDefineVocCcr() Adds a RIGHT JOIN clause and with to the query using the DefineVocCcr relation
 * @method     ChildProjectsQuery innerJoinWithDefineVocCcr() Adds a INNER JOIN clause and with to the query using the DefineVocCcr relation
 *
 * @method     ChildProjectsQuery leftJoinImproveGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImproveGateReview relation
 * @method     ChildProjectsQuery rightJoinImproveGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImproveGateReview relation
 * @method     ChildProjectsQuery innerJoinImproveGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the ImproveGateReview relation
 *
 * @method     ChildProjectsQuery joinWithImproveGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ImproveGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinWithImproveGateReview() Adds a LEFT JOIN clause and with to the query using the ImproveGateReview relation
 * @method     ChildProjectsQuery rightJoinWithImproveGateReview() Adds a RIGHT JOIN clause and with to the query using the ImproveGateReview relation
 * @method     ChildProjectsQuery innerJoinWithImproveGateReview() Adds a INNER JOIN clause and with to the query using the ImproveGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinImproveImprovementPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImproveImprovementPlan relation
 * @method     ChildProjectsQuery rightJoinImproveImprovementPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImproveImprovementPlan relation
 * @method     ChildProjectsQuery innerJoinImproveImprovementPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ImproveImprovementPlan relation
 *
 * @method     ChildProjectsQuery joinWithImproveImprovementPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ImproveImprovementPlan relation
 *
 * @method     ChildProjectsQuery leftJoinWithImproveImprovementPlan() Adds a LEFT JOIN clause and with to the query using the ImproveImprovementPlan relation
 * @method     ChildProjectsQuery rightJoinWithImproveImprovementPlan() Adds a RIGHT JOIN clause and with to the query using the ImproveImprovementPlan relation
 * @method     ChildProjectsQuery innerJoinWithImproveImprovementPlan() Adds a INNER JOIN clause and with to the query using the ImproveImprovementPlan relation
 *
 * @method     ChildProjectsQuery leftJoinImproveValueStreamDiagram($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImproveValueStreamDiagram relation
 * @method     ChildProjectsQuery rightJoinImproveValueStreamDiagram($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImproveValueStreamDiagram relation
 * @method     ChildProjectsQuery innerJoinImproveValueStreamDiagram($relationAlias = null) Adds a INNER JOIN clause to the query using the ImproveValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery joinWithImproveValueStreamDiagram($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ImproveValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery leftJoinWithImproveValueStreamDiagram() Adds a LEFT JOIN clause and with to the query using the ImproveValueStreamDiagram relation
 * @method     ChildProjectsQuery rightJoinWithImproveValueStreamDiagram() Adds a RIGHT JOIN clause and with to the query using the ImproveValueStreamDiagram relation
 * @method     ChildProjectsQuery innerJoinWithImproveValueStreamDiagram() Adds a INNER JOIN clause and with to the query using the ImproveValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery leftJoinMeasureCollectionPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureCollectionPlan relation
 * @method     ChildProjectsQuery rightJoinMeasureCollectionPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureCollectionPlan relation
 * @method     ChildProjectsQuery innerJoinMeasureCollectionPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureCollectionPlan relation
 *
 * @method     ChildProjectsQuery joinWithMeasureCollectionPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureCollectionPlan relation
 *
 * @method     ChildProjectsQuery leftJoinWithMeasureCollectionPlan() Adds a LEFT JOIN clause and with to the query using the MeasureCollectionPlan relation
 * @method     ChildProjectsQuery rightJoinWithMeasureCollectionPlan() Adds a RIGHT JOIN clause and with to the query using the MeasureCollectionPlan relation
 * @method     ChildProjectsQuery innerJoinWithMeasureCollectionPlan() Adds a INNER JOIN clause and with to the query using the MeasureCollectionPlan relation
 *
 * @method     ChildProjectsQuery leftJoinMeasureControlPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureControlPlan relation
 * @method     ChildProjectsQuery rightJoinMeasureControlPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureControlPlan relation
 * @method     ChildProjectsQuery innerJoinMeasureControlPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureControlPlan relation
 *
 * @method     ChildProjectsQuery joinWithMeasureControlPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureControlPlan relation
 *
 * @method     ChildProjectsQuery leftJoinWithMeasureControlPlan() Adds a LEFT JOIN clause and with to the query using the MeasureControlPlan relation
 * @method     ChildProjectsQuery rightJoinWithMeasureControlPlan() Adds a RIGHT JOIN clause and with to the query using the MeasureControlPlan relation
 * @method     ChildProjectsQuery innerJoinWithMeasureControlPlan() Adds a INNER JOIN clause and with to the query using the MeasureControlPlan relation
 *
 * @method     ChildProjectsQuery leftJoinMeasureGateReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureGateReview relation
 * @method     ChildProjectsQuery rightJoinMeasureGateReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureGateReview relation
 * @method     ChildProjectsQuery innerJoinMeasureGateReview($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureGateReview relation
 *
 * @method     ChildProjectsQuery joinWithMeasureGateReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinWithMeasureGateReview() Adds a LEFT JOIN clause and with to the query using the MeasureGateReview relation
 * @method     ChildProjectsQuery rightJoinWithMeasureGateReview() Adds a RIGHT JOIN clause and with to the query using the MeasureGateReview relation
 * @method     ChildProjectsQuery innerJoinWithMeasureGateReview() Adds a INNER JOIN clause and with to the query using the MeasureGateReview relation
 *
 * @method     ChildProjectsQuery leftJoinMeasureNonvalueAnalysis($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildProjectsQuery rightJoinMeasureNonvalueAnalysis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildProjectsQuery innerJoinMeasureNonvalueAnalysis($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureNonvalueAnalysis relation
 *
 * @method     ChildProjectsQuery joinWithMeasureNonvalueAnalysis($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureNonvalueAnalysis relation
 *
 * @method     ChildProjectsQuery leftJoinWithMeasureNonvalueAnalysis() Adds a LEFT JOIN clause and with to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildProjectsQuery rightJoinWithMeasureNonvalueAnalysis() Adds a RIGHT JOIN clause and with to the query using the MeasureNonvalueAnalysis relation
 * @method     ChildProjectsQuery innerJoinWithMeasureNonvalueAnalysis() Adds a INNER JOIN clause and with to the query using the MeasureNonvalueAnalysis relation
 *
 * @method     ChildProjectsQuery leftJoinMeasureValueStreamDiagram($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureValueStreamDiagram relation
 * @method     ChildProjectsQuery rightJoinMeasureValueStreamDiagram($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureValueStreamDiagram relation
 * @method     ChildProjectsQuery innerJoinMeasureValueStreamDiagram($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery joinWithMeasureValueStreamDiagram($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery leftJoinWithMeasureValueStreamDiagram() Adds a LEFT JOIN clause and with to the query using the MeasureValueStreamDiagram relation
 * @method     ChildProjectsQuery rightJoinWithMeasureValueStreamDiagram() Adds a RIGHT JOIN clause and with to the query using the MeasureValueStreamDiagram relation
 * @method     ChildProjectsQuery innerJoinWithMeasureValueStreamDiagram() Adds a INNER JOIN clause and with to the query using the MeasureValueStreamDiagram relation
 *
 * @method     ChildProjectsQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildProjectsQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildProjectsQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildProjectsQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildProjectsQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildProjectsQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildProjectsQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildProjectsQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildProjectsQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildProjectsQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildProjectsQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildProjectsQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildProjectsQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildProjectsQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     \ClientsQuery|\UsersQuery|\ActionTrackingQuery|\AnalyzeCeMatrixQuery|\AnalyzeCeMatrixOutputsQuery|\AnalyzeCriticalXQuery|\AnalyzeFmeaQuery|\AnalyzeGateReviewQuery|\AnalyzeHypothesisMapQuery|\ChartExcelDataQuery|\ControlControlPlanQuery|\ControlGateReviewQuery|\ControlTestPlanQuery|\DefineCommunicationQuery|\DefineGateReviewQuery|\DefineRaciQuery|\DefineRiskManagementQuery|\DefineSipocQuery|\DefineStakeholdersQuery|\DefineValueStreamDiagramQuery|\DefineVocCcrQuery|\ImproveGateReviewQuery|\ImproveImprovementPlanQuery|\ImproveValueStreamDiagramQuery|\MeasureCollectionPlanQuery|\MeasureControlPlanQuery|\MeasureGateReviewQuery|\MeasureNonvalueAnalysisQuery|\MeasureValueStreamDiagramQuery|\PhaseComponentsQuery|\ProjectPhasesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProjects findOne(ConnectionInterface $con = null) Return the first ChildProjects matching the query
 * @method     ChildProjects findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProjects matching the query, or a new ChildProjects object populated from the query conditions when no match is found
 *
 * @method     ChildProjects findOneById(int $id) Return the first ChildProjects filtered by the id column
 * @method     ChildProjects findOneByClientId(int $client_id) Return the first ChildProjects filtered by the client_id column
 * @method     ChildProjects findOneByCreatedBy(int $created_by) Return the first ChildProjects filtered by the created_by column
 * @method     ChildProjects findOneByStatus(string $status) Return the first ChildProjects filtered by the status column
 * @method     ChildProjects findOneByName(string $name) Return the first ChildProjects filtered by the name column
 * @method     ChildProjects findOneByType(string $type) Return the first ChildProjects filtered by the type column
 * @method     ChildProjects findOneByDiagramType(string $diagram_type) Return the first ChildProjects filtered by the diagram_type column
 * @method     ChildProjects findOneByLead(int $lead) Return the first ChildProjects filtered by the lead column
 * @method     ChildProjects findOneBySponsor(int $sponsor) Return the first ChildProjects filtered by the sponsor column
 * @method     ChildProjects findOneByCoreTeam(string $core_team) Return the first ChildProjects filtered by the core_team column
 * @method     ChildProjects findOneByBusinessUnit(string $business_unit) Return the first ChildProjects filtered by the business_unit column
 * @method     ChildProjects findOneByLocation(string $location) Return the first ChildProjects filtered by the location column
 * @method     ChildProjects findOneByBusinessImpact(string $business_impact) Return the first ChildProjects filtered by the business_impact column
 * @method     ChildProjects findOneByBusinessImpactValue(string $business_impact_value) Return the first ChildProjects filtered by the business_impact_value column
 * @method     ChildProjects findOneByProblemStatement(string $problem_statement) Return the first ChildProjects filtered by the problem_statement column
 * @method     ChildProjects findOneByGoals(string $goals) Return the first ChildProjects filtered by the goals column
 * @method     ChildProjects findOneByScope(string $scope) Return the first ChildProjects filtered by the scope column
 * @method     ChildProjects findOneByDefineReviewDate(string $define_review_date) Return the first ChildProjects filtered by the define_review_date column
 * @method     ChildProjects findOneByMeasureReviewDate(string $measure_review_date) Return the first ChildProjects filtered by the measure_review_date column
 * @method     ChildProjects findOneByAnalyzeReviewDate(string $analyze_review_date) Return the first ChildProjects filtered by the analyze_review_date column
 * @method     ChildProjects findOneByImproveReviewDate(string $improve_review_date) Return the first ChildProjects filtered by the improve_review_date column
 * @method     ChildProjects findOneByControlReviewDate(string $control_review_date) Return the first ChildProjects filtered by the control_review_date column
 * @method     ChildProjects findOneByDateTimeCreated(string $date_time_created) Return the first ChildProjects filtered by the date_time_created column
 * @method     ChildProjects findOneByLastUpdated(string $last_updated) Return the first ChildProjects filtered by the last_updated column *

 * @method     ChildProjects requirePk($key, ConnectionInterface $con = null) Return the ChildProjects by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOne(ConnectionInterface $con = null) Return the first ChildProjects matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProjects requireOneById(int $id) Return the first ChildProjects filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByClientId(int $client_id) Return the first ChildProjects filtered by the client_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByCreatedBy(int $created_by) Return the first ChildProjects filtered by the created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByStatus(string $status) Return the first ChildProjects filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByName(string $name) Return the first ChildProjects filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByType(string $type) Return the first ChildProjects filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByDiagramType(string $diagram_type) Return the first ChildProjects filtered by the diagram_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByLead(int $lead) Return the first ChildProjects filtered by the lead column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneBySponsor(int $sponsor) Return the first ChildProjects filtered by the sponsor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByCoreTeam(string $core_team) Return the first ChildProjects filtered by the core_team column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByBusinessUnit(string $business_unit) Return the first ChildProjects filtered by the business_unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByLocation(string $location) Return the first ChildProjects filtered by the location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByBusinessImpact(string $business_impact) Return the first ChildProjects filtered by the business_impact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByBusinessImpactValue(string $business_impact_value) Return the first ChildProjects filtered by the business_impact_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByProblemStatement(string $problem_statement) Return the first ChildProjects filtered by the problem_statement column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByGoals(string $goals) Return the first ChildProjects filtered by the goals column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByScope(string $scope) Return the first ChildProjects filtered by the scope column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByDefineReviewDate(string $define_review_date) Return the first ChildProjects filtered by the define_review_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByMeasureReviewDate(string $measure_review_date) Return the first ChildProjects filtered by the measure_review_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByAnalyzeReviewDate(string $analyze_review_date) Return the first ChildProjects filtered by the analyze_review_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByImproveReviewDate(string $improve_review_date) Return the first ChildProjects filtered by the improve_review_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByControlReviewDate(string $control_review_date) Return the first ChildProjects filtered by the control_review_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByDateTimeCreated(string $date_time_created) Return the first ChildProjects filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProjects requireOneByLastUpdated(string $last_updated) Return the first ChildProjects filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProjects[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProjects objects based on current ModelCriteria
 * @method     ChildProjects[]|ObjectCollection findById(int $id) Return ChildProjects objects filtered by the id column
 * @method     ChildProjects[]|ObjectCollection findByClientId(int $client_id) Return ChildProjects objects filtered by the client_id column
 * @method     ChildProjects[]|ObjectCollection findByCreatedBy(int $created_by) Return ChildProjects objects filtered by the created_by column
 * @method     ChildProjects[]|ObjectCollection findByStatus(string $status) Return ChildProjects objects filtered by the status column
 * @method     ChildProjects[]|ObjectCollection findByName(string $name) Return ChildProjects objects filtered by the name column
 * @method     ChildProjects[]|ObjectCollection findByType(string $type) Return ChildProjects objects filtered by the type column
 * @method     ChildProjects[]|ObjectCollection findByDiagramType(string $diagram_type) Return ChildProjects objects filtered by the diagram_type column
 * @method     ChildProjects[]|ObjectCollection findByLead(int $lead) Return ChildProjects objects filtered by the lead column
 * @method     ChildProjects[]|ObjectCollection findBySponsor(int $sponsor) Return ChildProjects objects filtered by the sponsor column
 * @method     ChildProjects[]|ObjectCollection findByCoreTeam(string $core_team) Return ChildProjects objects filtered by the core_team column
 * @method     ChildProjects[]|ObjectCollection findByBusinessUnit(string $business_unit) Return ChildProjects objects filtered by the business_unit column
 * @method     ChildProjects[]|ObjectCollection findByLocation(string $location) Return ChildProjects objects filtered by the location column
 * @method     ChildProjects[]|ObjectCollection findByBusinessImpact(string $business_impact) Return ChildProjects objects filtered by the business_impact column
 * @method     ChildProjects[]|ObjectCollection findByBusinessImpactValue(string $business_impact_value) Return ChildProjects objects filtered by the business_impact_value column
 * @method     ChildProjects[]|ObjectCollection findByProblemStatement(string $problem_statement) Return ChildProjects objects filtered by the problem_statement column
 * @method     ChildProjects[]|ObjectCollection findByGoals(string $goals) Return ChildProjects objects filtered by the goals column
 * @method     ChildProjects[]|ObjectCollection findByScope(string $scope) Return ChildProjects objects filtered by the scope column
 * @method     ChildProjects[]|ObjectCollection findByDefineReviewDate(string $define_review_date) Return ChildProjects objects filtered by the define_review_date column
 * @method     ChildProjects[]|ObjectCollection findByMeasureReviewDate(string $measure_review_date) Return ChildProjects objects filtered by the measure_review_date column
 * @method     ChildProjects[]|ObjectCollection findByAnalyzeReviewDate(string $analyze_review_date) Return ChildProjects objects filtered by the analyze_review_date column
 * @method     ChildProjects[]|ObjectCollection findByImproveReviewDate(string $improve_review_date) Return ChildProjects objects filtered by the improve_review_date column
 * @method     ChildProjects[]|ObjectCollection findByControlReviewDate(string $control_review_date) Return ChildProjects objects filtered by the control_review_date column
 * @method     ChildProjects[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildProjects objects filtered by the date_time_created column
 * @method     ChildProjects[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildProjects objects filtered by the last_updated column
 * @method     ChildProjects[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProjectsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProjectsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Projects', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProjectsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProjectsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProjectsQuery) {
            return $criteria;
        }
        $query = new ChildProjectsQuery();
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
     * @return ChildProjects|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProjectsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProjectsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProjects A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `client_id`, `created_by`, `status`, `name`, `type`, `diagram_type`, `lead`, `sponsor`, `core_team`, `business_unit`, `location`, `business_impact`, `business_impact_value`, `problem_statement`, `goals`, `scope`, `define_review_date`, `measure_review_date`, `analyze_review_date`, `improve_review_date`, `control_review_date`, `date_time_created`, `last_updated` FROM `projects` WHERE `id` = :p0';
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
            /** @var ChildProjects $obj */
            $obj = new ChildProjects();
            $obj->hydrate($row);
            ProjectsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProjects|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id > 12
     * </code>
     *
     * @see       filterByClients()
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
     * </code>
     *
     * @see       filterByUsersRelatedByCreatedBy()
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_CREATED_BY, $createdBy, $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the diagram_type column
     *
     * Example usage:
     * <code>
     * $query->filterByDiagramType('fooValue');   // WHERE diagram_type = 'fooValue'
     * $query->filterByDiagramType('%fooValue%', Criteria::LIKE); // WHERE diagram_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $diagramType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDiagramType($diagramType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diagramType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_DIAGRAM_TYPE, $diagramType, $comparison);
    }

    /**
     * Filter the query on the lead column
     *
     * Example usage:
     * <code>
     * $query->filterByLead(1234); // WHERE lead = 1234
     * $query->filterByLead(array(12, 34)); // WHERE lead IN (12, 34)
     * $query->filterByLead(array('min' => 12)); // WHERE lead > 12
     * </code>
     *
     * @see       filterByUsersRelatedByLead()
     *
     * @param     mixed $lead The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByLead($lead = null, $comparison = null)
    {
        if (is_array($lead)) {
            $useMinMax = false;
            if (isset($lead['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_LEAD, $lead['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lead['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_LEAD, $lead['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_LEAD, $lead, $comparison);
    }

    /**
     * Filter the query on the sponsor column
     *
     * Example usage:
     * <code>
     * $query->filterBySponsor(1234); // WHERE sponsor = 1234
     * $query->filterBySponsor(array(12, 34)); // WHERE sponsor IN (12, 34)
     * $query->filterBySponsor(array('min' => 12)); // WHERE sponsor > 12
     * </code>
     *
     * @see       filterByUsersRelatedBySponsor()
     *
     * @param     mixed $sponsor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterBySponsor($sponsor = null, $comparison = null)
    {
        if (is_array($sponsor)) {
            $useMinMax = false;
            if (isset($sponsor['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_SPONSOR, $sponsor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sponsor['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_SPONSOR, $sponsor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_SPONSOR, $sponsor, $comparison);
    }

    /**
     * Filter the query on the core_team column
     *
     * Example usage:
     * <code>
     * $query->filterByCoreTeam('fooValue');   // WHERE core_team = 'fooValue'
     * $query->filterByCoreTeam('%fooValue%', Criteria::LIKE); // WHERE core_team LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coreTeam The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByCoreTeam($coreTeam = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coreTeam)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_CORE_TEAM, $coreTeam, $comparison);
    }

    /**
     * Filter the query on the business_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByBusinessUnit('fooValue');   // WHERE business_unit = 'fooValue'
     * $query->filterByBusinessUnit('%fooValue%', Criteria::LIKE); // WHERE business_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $businessUnit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByBusinessUnit($businessUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($businessUnit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_BUSINESS_UNIT, $businessUnit, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%', Criteria::LIKE); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_LOCATION, $location, $comparison);
    }

    /**
     * Filter the query on the business_impact column
     *
     * Example usage:
     * <code>
     * $query->filterByBusinessImpact('fooValue');   // WHERE business_impact = 'fooValue'
     * $query->filterByBusinessImpact('%fooValue%', Criteria::LIKE); // WHERE business_impact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $businessImpact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByBusinessImpact($businessImpact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($businessImpact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_BUSINESS_IMPACT, $businessImpact, $comparison);
    }

    /**
     * Filter the query on the business_impact_value column
     *
     * Example usage:
     * <code>
     * $query->filterByBusinessImpactValue('fooValue');   // WHERE business_impact_value = 'fooValue'
     * $query->filterByBusinessImpactValue('%fooValue%', Criteria::LIKE); // WHERE business_impact_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $businessImpactValue The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByBusinessImpactValue($businessImpactValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($businessImpactValue)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE, $businessImpactValue, $comparison);
    }

    /**
     * Filter the query on the problem_statement column
     *
     * Example usage:
     * <code>
     * $query->filterByProblemStatement('fooValue');   // WHERE problem_statement = 'fooValue'
     * $query->filterByProblemStatement('%fooValue%', Criteria::LIKE); // WHERE problem_statement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $problemStatement The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByProblemStatement($problemStatement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($problemStatement)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_PROBLEM_STATEMENT, $problemStatement, $comparison);
    }

    /**
     * Filter the query on the goals column
     *
     * Example usage:
     * <code>
     * $query->filterByGoals('fooValue');   // WHERE goals = 'fooValue'
     * $query->filterByGoals('%fooValue%', Criteria::LIKE); // WHERE goals LIKE '%fooValue%'
     * </code>
     *
     * @param     string $goals The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByGoals($goals = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($goals)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_GOALS, $goals, $comparison);
    }

    /**
     * Filter the query on the scope column
     *
     * Example usage:
     * <code>
     * $query->filterByScope('fooValue');   // WHERE scope = 'fooValue'
     * $query->filterByScope('%fooValue%', Criteria::LIKE); // WHERE scope LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scope The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByScope($scope = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scope)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_SCOPE, $scope, $comparison);
    }

    /**
     * Filter the query on the define_review_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDefineReviewDate('2011-03-14'); // WHERE define_review_date = '2011-03-14'
     * $query->filterByDefineReviewDate('now'); // WHERE define_review_date = '2011-03-14'
     * $query->filterByDefineReviewDate(array('max' => 'yesterday')); // WHERE define_review_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $defineReviewDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineReviewDate($defineReviewDate = null, $comparison = null)
    {
        if (is_array($defineReviewDate)) {
            $useMinMax = false;
            if (isset($defineReviewDate['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_DEFINE_REVIEW_DATE, $defineReviewDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defineReviewDate['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_DEFINE_REVIEW_DATE, $defineReviewDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_DEFINE_REVIEW_DATE, $defineReviewDate, $comparison);
    }

    /**
     * Filter the query on the measure_review_date column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasureReviewDate('2011-03-14'); // WHERE measure_review_date = '2011-03-14'
     * $query->filterByMeasureReviewDate('now'); // WHERE measure_review_date = '2011-03-14'
     * $query->filterByMeasureReviewDate(array('max' => 'yesterday')); // WHERE measure_review_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $measureReviewDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByMeasureReviewDate($measureReviewDate = null, $comparison = null)
    {
        if (is_array($measureReviewDate)) {
            $useMinMax = false;
            if (isset($measureReviewDate['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_MEASURE_REVIEW_DATE, $measureReviewDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($measureReviewDate['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_MEASURE_REVIEW_DATE, $measureReviewDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_MEASURE_REVIEW_DATE, $measureReviewDate, $comparison);
    }

    /**
     * Filter the query on the analyze_review_date column
     *
     * Example usage:
     * <code>
     * $query->filterByAnalyzeReviewDate('2011-03-14'); // WHERE analyze_review_date = '2011-03-14'
     * $query->filterByAnalyzeReviewDate('now'); // WHERE analyze_review_date = '2011-03-14'
     * $query->filterByAnalyzeReviewDate(array('max' => 'yesterday')); // WHERE analyze_review_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $analyzeReviewDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeReviewDate($analyzeReviewDate = null, $comparison = null)
    {
        if (is_array($analyzeReviewDate)) {
            $useMinMax = false;
            if (isset($analyzeReviewDate['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE, $analyzeReviewDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($analyzeReviewDate['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE, $analyzeReviewDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE, $analyzeReviewDate, $comparison);
    }

    /**
     * Filter the query on the improve_review_date column
     *
     * Example usage:
     * <code>
     * $query->filterByImproveReviewDate('2011-03-14'); // WHERE improve_review_date = '2011-03-14'
     * $query->filterByImproveReviewDate('now'); // WHERE improve_review_date = '2011-03-14'
     * $query->filterByImproveReviewDate(array('max' => 'yesterday')); // WHERE improve_review_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $improveReviewDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByImproveReviewDate($improveReviewDate = null, $comparison = null)
    {
        if (is_array($improveReviewDate)) {
            $useMinMax = false;
            if (isset($improveReviewDate['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE, $improveReviewDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($improveReviewDate['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE, $improveReviewDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE, $improveReviewDate, $comparison);
    }

    /**
     * Filter the query on the control_review_date column
     *
     * Example usage:
     * <code>
     * $query->filterByControlReviewDate('2011-03-14'); // WHERE control_review_date = '2011-03-14'
     * $query->filterByControlReviewDate('now'); // WHERE control_review_date = '2011-03-14'
     * $query->filterByControlReviewDate(array('max' => 'yesterday')); // WHERE control_review_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $controlReviewDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByControlReviewDate($controlReviewDate = null, $comparison = null)
    {
        if (is_array($controlReviewDate)) {
            $useMinMax = false;
            if (isset($controlReviewDate['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_CONTROL_REVIEW_DATE, $controlReviewDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($controlReviewDate['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_CONTROL_REVIEW_DATE, $controlReviewDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_CONTROL_REVIEW_DATE, $controlReviewDate, $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(ProjectsTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectsTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Clients object
     *
     * @param \Clients|ObjectCollection $clients The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByClients($clients, $comparison = null)
    {
        if ($clients instanceof \Clients) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_CLIENT_ID, $clients->getId(), $comparison);
        } elseif ($clients instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectsTableMap::COL_CLIENT_ID, $clients->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClients() only accepts arguments of type \Clients or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clients relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function joinClients($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clients');

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
            $this->addJoinObject($join, 'Clients');
        }

        return $this;
    }

    /**
     * Use the Clients relation Clients object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientsQuery A secondary query class using the current class as primary query
     */
    public function useClientsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClients($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clients', '\ClientsQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedByCreatedBy($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_CREATED_BY, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectsTableMap::COL_CREATED_BY, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsersRelatedByCreatedBy() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function joinUsersRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'UsersRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedByCreatedBy relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsersRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedByCreatedBy', '\UsersQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedBySponsor($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_SPONSOR, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectsTableMap::COL_SPONSOR, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsersRelatedBySponsor() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedBySponsor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function joinUsersRelatedBySponsor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedBySponsor');

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
            $this->addJoinObject($join, 'UsersRelatedBySponsor');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedBySponsor relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedBySponsorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsersRelatedBySponsor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedBySponsor', '\UsersQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedByLead($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_LEAD, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectsTableMap::COL_LEAD, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsersRelatedByLead() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedByLead relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function joinUsersRelatedByLead($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedByLead');

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
            $this->addJoinObject($join, 'UsersRelatedByLead');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedByLead relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedByLeadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsersRelatedByLead($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedByLead', '\UsersQuery');
    }

    /**
     * Filter the query by a related \ActionTracking object
     *
     * @param \ActionTracking|ObjectCollection $actionTracking the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByActionTracking($actionTracking, $comparison = null)
    {
        if ($actionTracking instanceof \ActionTracking) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $actionTracking->getProjectId(), $comparison);
        } elseif ($actionTracking instanceof ObjectCollection) {
            return $this
                ->useActionTrackingQuery()
                ->filterByPrimaryKeys($actionTracking->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionTracking() only accepts arguments of type \ActionTracking or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionTracking relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function joinActionTracking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionTracking');

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
            $this->addJoinObject($join, 'ActionTracking');
        }

        return $this;
    }

    /**
     * Use the ActionTracking relation ActionTracking object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActionTrackingQuery A secondary query class using the current class as primary query
     */
    public function useActionTrackingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionTracking($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionTracking', '\ActionTrackingQuery');
    }

    /**
     * Filter the query by a related \AnalyzeCeMatrix object
     *
     * @param \AnalyzeCeMatrix|ObjectCollection $analyzeCeMatrix the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCeMatrix($analyzeCeMatrix, $comparison = null)
    {
        if ($analyzeCeMatrix instanceof \AnalyzeCeMatrix) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $analyzeCeMatrix->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCeMatrixOutputs($analyzeCeMatrixOutputs, $comparison = null)
    {
        if ($analyzeCeMatrixOutputs instanceof \AnalyzeCeMatrixOutputs) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $analyzeCeMatrixOutputs->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCriticalX($analyzeCriticalX, $comparison = null)
    {
        if ($analyzeCriticalX instanceof \AnalyzeCriticalX) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $analyzeCriticalX->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeFmea($analyzeFmea, $comparison = null)
    {
        if ($analyzeFmea instanceof \AnalyzeFmea) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $analyzeFmea->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeGateReview($analyzeGateReview, $comparison = null)
    {
        if ($analyzeGateReview instanceof \AnalyzeGateReview) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $analyzeGateReview->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByAnalyzeHypothesisMap($analyzeHypothesisMap, $comparison = null)
    {
        if ($analyzeHypothesisMap instanceof \AnalyzeHypothesisMap) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $analyzeHypothesisMap->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByChartExcelData($chartExcelData, $comparison = null)
    {
        if ($chartExcelData instanceof \ChartExcelData) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $chartExcelData->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByControlControlPlan($controlControlPlan, $comparison = null)
    {
        if ($controlControlPlan instanceof \ControlControlPlan) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $controlControlPlan->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByControlGateReview($controlGateReview, $comparison = null)
    {
        if ($controlGateReview instanceof \ControlGateReview) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $controlGateReview->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByControlTestPlan($controlTestPlan, $comparison = null)
    {
        if ($controlTestPlan instanceof \ControlTestPlan) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $controlTestPlan->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineCommunication($defineCommunication, $comparison = null)
    {
        if ($defineCommunication instanceof \DefineCommunication) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineCommunication->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineGateReview($defineGateReview, $comparison = null)
    {
        if ($defineGateReview instanceof \DefineGateReview) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineGateReview->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineRaci($defineRaci, $comparison = null)
    {
        if ($defineRaci instanceof \DefineRaci) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineRaci->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineRiskManagement($defineRiskManagement, $comparison = null)
    {
        if ($defineRiskManagement instanceof \DefineRiskManagement) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineRiskManagement->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineSipoc($defineSipoc, $comparison = null)
    {
        if ($defineSipoc instanceof \DefineSipoc) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineSipoc->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineStakeholders($defineStakeholders, $comparison = null)
    {
        if ($defineStakeholders instanceof \DefineStakeholders) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineStakeholders->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineValueStreamDiagram($defineValueStreamDiagram, $comparison = null)
    {
        if ($defineValueStreamDiagram instanceof \DefineValueStreamDiagram) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineValueStreamDiagram->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByDefineVocCcr($defineVocCcr, $comparison = null)
    {
        if ($defineVocCcr instanceof \DefineVocCcr) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $defineVocCcr->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByImproveGateReview($improveGateReview, $comparison = null)
    {
        if ($improveGateReview instanceof \ImproveGateReview) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $improveGateReview->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByImproveImprovementPlan($improveImprovementPlan, $comparison = null)
    {
        if ($improveImprovementPlan instanceof \ImproveImprovementPlan) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $improveImprovementPlan->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByImproveValueStreamDiagram($improveValueStreamDiagram, $comparison = null)
    {
        if ($improveValueStreamDiagram instanceof \ImproveValueStreamDiagram) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $improveValueStreamDiagram->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByMeasureCollectionPlan($measureCollectionPlan, $comparison = null)
    {
        if ($measureCollectionPlan instanceof \MeasureCollectionPlan) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $measureCollectionPlan->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByMeasureControlPlan($measureControlPlan, $comparison = null)
    {
        if ($measureControlPlan instanceof \MeasureControlPlan) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $measureControlPlan->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByMeasureGateReview($measureGateReview, $comparison = null)
    {
        if ($measureGateReview instanceof \MeasureGateReview) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $measureGateReview->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByMeasureNonvalueAnalysis($measureNonvalueAnalysis, $comparison = null)
    {
        if ($measureNonvalueAnalysis instanceof \MeasureNonvalueAnalysis) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $measureNonvalueAnalysis->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByMeasureValueStreamDiagram($measureValueStreamDiagram, $comparison = null)
    {
        if ($measureValueStreamDiagram instanceof \MeasureValueStreamDiagram) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $measureValueStreamDiagram->getProjectId(), $comparison);
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * Filter the query by a related \PhaseComponents object
     *
     * @param \PhaseComponents|ObjectCollection $phaseComponents the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $phaseComponents->getProjectId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            return $this
                ->usePhaseComponentsQuery()
                ->filterByPrimaryKeys($phaseComponents->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPhaseComponents() only accepts arguments of type \PhaseComponents or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PhaseComponents relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function joinPhaseComponents($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PhaseComponents');

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
            $this->addJoinObject($join, 'PhaseComponents');
        }

        return $this;
    }

    /**
     * Use the PhaseComponents relation PhaseComponents object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PhaseComponentsQuery A secondary query class using the current class as primary query
     */
    public function usePhaseComponentsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPhaseComponents($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PhaseComponents', '\PhaseComponentsQuery');
    }

    /**
     * Filter the query by a related \ProjectPhases object
     *
     * @param \ProjectPhases|ObjectCollection $projectPhases the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProjectsQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(ProjectsTableMap::COL_ID, $projectPhases->getProjectId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            return $this
                ->useProjectPhasesQuery()
                ->filterByPrimaryKeys($projectPhases->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildProjectsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildProjects $projects Object to remove from the list of results
     *
     * @return $this|ChildProjectsQuery The current query, for fluid interface
     */
    public function prune($projects = null)
    {
        if ($projects) {
            $this->addUsingAlias(ProjectsTableMap::COL_ID, $projects->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the projects table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProjectsTableMap::clearInstancePool();
            ProjectsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProjectsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProjectsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProjectsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProjectsQuery
