<?php

namespace Base;

use \Users as ChildUsers;
use \UsersQuery as ChildUsersQuery;
use \Exception;
use \PDO;
use Map\UsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'users' table.
 *
 *
 *
 * @method     ChildUsersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUsersQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method     ChildUsersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildUsersQuery orderByAccessLevelId($order = Criteria::ASC) Order by the access_level_id column
 * @method     ChildUsersQuery orderByEmailAddress($order = Criteria::ASC) Order by the email_address column
 * @method     ChildUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildUsersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildUsersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildUsersQuery orderByWorkTitle($order = Criteria::ASC) Order by the work_title column
 * @method     ChildUsersQuery orderByReportsTo($order = Criteria::ASC) Order by the reports_to column
 * @method     ChildUsersQuery orderByProfileImageUrl($order = Criteria::ASC) Order by the profile_image_url column
 * @method     ChildUsersQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildUsersQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildUsersQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildUsersQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildUsersQuery orderByTimeZone($order = Criteria::ASC) Order by the time_zone column
 * @method     ChildUsersQuery orderByIsLoggedIn($order = Criteria::ASC) Order by the is_logged_in column
 * @method     ChildUsersQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     ChildUsersQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ChildUsersQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 * @method     ChildUsersQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildUsersQuery orderByWordpressId($order = Criteria::ASC) Order by the wordpress_id column
 *
 * @method     ChildUsersQuery groupById() Group by the id column
 * @method     ChildUsersQuery groupByClientId() Group by the client_id column
 * @method     ChildUsersQuery groupByStatus() Group by the status column
 * @method     ChildUsersQuery groupByAccessLevelId() Group by the access_level_id column
 * @method     ChildUsersQuery groupByEmailAddress() Group by the email_address column
 * @method     ChildUsersQuery groupByPassword() Group by the password column
 * @method     ChildUsersQuery groupByFirstName() Group by the first_name column
 * @method     ChildUsersQuery groupByLastName() Group by the last_name column
 * @method     ChildUsersQuery groupByWorkTitle() Group by the work_title column
 * @method     ChildUsersQuery groupByReportsTo() Group by the reports_to column
 * @method     ChildUsersQuery groupByProfileImageUrl() Group by the profile_image_url column
 * @method     ChildUsersQuery groupByPhone() Group by the phone column
 * @method     ChildUsersQuery groupByCity() Group by the city column
 * @method     ChildUsersQuery groupByState() Group by the state column
 * @method     ChildUsersQuery groupByZip() Group by the zip column
 * @method     ChildUsersQuery groupByTimeZone() Group by the time_zone column
 * @method     ChildUsersQuery groupByIsLoggedIn() Group by the is_logged_in column
 * @method     ChildUsersQuery groupByLastLogin() Group by the last_login column
 * @method     ChildUsersQuery groupByCreatedBy() Group by the created_by column
 * @method     ChildUsersQuery groupByLastUpdated() Group by the last_updated column
 * @method     ChildUsersQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildUsersQuery groupByWordpressId() Group by the wordpress_id column
 *
 * @method     ChildUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsersQuery leftJoinClients($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clients relation
 * @method     ChildUsersQuery rightJoinClients($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clients relation
 * @method     ChildUsersQuery innerJoinClients($relationAlias = null) Adds a INNER JOIN clause to the query using the Clients relation
 *
 * @method     ChildUsersQuery joinWithClients($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Clients relation
 *
 * @method     ChildUsersQuery leftJoinWithClients() Adds a LEFT JOIN clause and with to the query using the Clients relation
 * @method     ChildUsersQuery rightJoinWithClients() Adds a RIGHT JOIN clause and with to the query using the Clients relation
 * @method     ChildUsersQuery innerJoinWithClients() Adds a INNER JOIN clause and with to the query using the Clients relation
 *
 * @method     ChildUsersQuery leftJoinAccessLevels($relationAlias = null) Adds a LEFT JOIN clause to the query using the AccessLevels relation
 * @method     ChildUsersQuery rightJoinAccessLevels($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AccessLevels relation
 * @method     ChildUsersQuery innerJoinAccessLevels($relationAlias = null) Adds a INNER JOIN clause to the query using the AccessLevels relation
 *
 * @method     ChildUsersQuery joinWithAccessLevels($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AccessLevels relation
 *
 * @method     ChildUsersQuery leftJoinWithAccessLevels() Adds a LEFT JOIN clause and with to the query using the AccessLevels relation
 * @method     ChildUsersQuery rightJoinWithAccessLevels() Adds a RIGHT JOIN clause and with to the query using the AccessLevels relation
 * @method     ChildUsersQuery innerJoinWithAccessLevels() Adds a INNER JOIN clause and with to the query using the AccessLevels relation
 *
 * @method     ChildUsersQuery leftJoinUsersRelatedByReportsTo($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedByReportsTo relation
 * @method     ChildUsersQuery rightJoinUsersRelatedByReportsTo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedByReportsTo relation
 * @method     ChildUsersQuery innerJoinUsersRelatedByReportsTo($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedByReportsTo relation
 *
 * @method     ChildUsersQuery joinWithUsersRelatedByReportsTo($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedByReportsTo relation
 *
 * @method     ChildUsersQuery leftJoinWithUsersRelatedByReportsTo() Adds a LEFT JOIN clause and with to the query using the UsersRelatedByReportsTo relation
 * @method     ChildUsersQuery rightJoinWithUsersRelatedByReportsTo() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedByReportsTo relation
 * @method     ChildUsersQuery innerJoinWithUsersRelatedByReportsTo() Adds a INNER JOIN clause and with to the query using the UsersRelatedByReportsTo relation
 *
 * @method     ChildUsersQuery leftJoinActionTracking($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionTracking relation
 * @method     ChildUsersQuery rightJoinActionTracking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionTracking relation
 * @method     ChildUsersQuery innerJoinActionTracking($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionTracking relation
 *
 * @method     ChildUsersQuery joinWithActionTracking($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActionTracking relation
 *
 * @method     ChildUsersQuery leftJoinWithActionTracking() Adds a LEFT JOIN clause and with to the query using the ActionTracking relation
 * @method     ChildUsersQuery rightJoinWithActionTracking() Adds a RIGHT JOIN clause and with to the query using the ActionTracking relation
 * @method     ChildUsersQuery innerJoinWithActionTracking() Adds a INNER JOIN clause and with to the query using the ActionTracking relation
 *
 * @method     ChildUsersQuery leftJoinControlControlPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlControlPlan relation
 * @method     ChildUsersQuery rightJoinControlControlPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlControlPlan relation
 * @method     ChildUsersQuery innerJoinControlControlPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlControlPlan relation
 *
 * @method     ChildUsersQuery joinWithControlControlPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlControlPlan relation
 *
 * @method     ChildUsersQuery leftJoinWithControlControlPlan() Adds a LEFT JOIN clause and with to the query using the ControlControlPlan relation
 * @method     ChildUsersQuery rightJoinWithControlControlPlan() Adds a RIGHT JOIN clause and with to the query using the ControlControlPlan relation
 * @method     ChildUsersQuery innerJoinWithControlControlPlan() Adds a INNER JOIN clause and with to the query using the ControlControlPlan relation
 *
 * @method     ChildUsersQuery leftJoinControlTestPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the ControlTestPlan relation
 * @method     ChildUsersQuery rightJoinControlTestPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ControlTestPlan relation
 * @method     ChildUsersQuery innerJoinControlTestPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the ControlTestPlan relation
 *
 * @method     ChildUsersQuery joinWithControlTestPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ControlTestPlan relation
 *
 * @method     ChildUsersQuery leftJoinWithControlTestPlan() Adds a LEFT JOIN clause and with to the query using the ControlTestPlan relation
 * @method     ChildUsersQuery rightJoinWithControlTestPlan() Adds a RIGHT JOIN clause and with to the query using the ControlTestPlan relation
 * @method     ChildUsersQuery innerJoinWithControlTestPlan() Adds a INNER JOIN clause and with to the query using the ControlTestPlan relation
 *
 * @method     ChildUsersQuery leftJoinDefineCommunication($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineCommunication relation
 * @method     ChildUsersQuery rightJoinDefineCommunication($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineCommunication relation
 * @method     ChildUsersQuery innerJoinDefineCommunication($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineCommunication relation
 *
 * @method     ChildUsersQuery joinWithDefineCommunication($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineCommunication relation
 *
 * @method     ChildUsersQuery leftJoinWithDefineCommunication() Adds a LEFT JOIN clause and with to the query using the DefineCommunication relation
 * @method     ChildUsersQuery rightJoinWithDefineCommunication() Adds a RIGHT JOIN clause and with to the query using the DefineCommunication relation
 * @method     ChildUsersQuery innerJoinWithDefineCommunication() Adds a INNER JOIN clause and with to the query using the DefineCommunication relation
 *
 * @method     ChildUsersQuery leftJoinDefineRiskManagement($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineRiskManagement relation
 * @method     ChildUsersQuery rightJoinDefineRiskManagement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineRiskManagement relation
 * @method     ChildUsersQuery innerJoinDefineRiskManagement($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineRiskManagement relation
 *
 * @method     ChildUsersQuery joinWithDefineRiskManagement($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineRiskManagement relation
 *
 * @method     ChildUsersQuery leftJoinWithDefineRiskManagement() Adds a LEFT JOIN clause and with to the query using the DefineRiskManagement relation
 * @method     ChildUsersQuery rightJoinWithDefineRiskManagement() Adds a RIGHT JOIN clause and with to the query using the DefineRiskManagement relation
 * @method     ChildUsersQuery innerJoinWithDefineRiskManagement() Adds a INNER JOIN clause and with to the query using the DefineRiskManagement relation
 *
 * @method     ChildUsersQuery leftJoinDefineStakeholders($relationAlias = null) Adds a LEFT JOIN clause to the query using the DefineStakeholders relation
 * @method     ChildUsersQuery rightJoinDefineStakeholders($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DefineStakeholders relation
 * @method     ChildUsersQuery innerJoinDefineStakeholders($relationAlias = null) Adds a INNER JOIN clause to the query using the DefineStakeholders relation
 *
 * @method     ChildUsersQuery joinWithDefineStakeholders($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the DefineStakeholders relation
 *
 * @method     ChildUsersQuery leftJoinWithDefineStakeholders() Adds a LEFT JOIN clause and with to the query using the DefineStakeholders relation
 * @method     ChildUsersQuery rightJoinWithDefineStakeholders() Adds a RIGHT JOIN clause and with to the query using the DefineStakeholders relation
 * @method     ChildUsersQuery innerJoinWithDefineStakeholders() Adds a INNER JOIN clause and with to the query using the DefineStakeholders relation
 *
 * @method     ChildUsersQuery leftJoinMeasureControlPlan($relationAlias = null) Adds a LEFT JOIN clause to the query using the MeasureControlPlan relation
 * @method     ChildUsersQuery rightJoinMeasureControlPlan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MeasureControlPlan relation
 * @method     ChildUsersQuery innerJoinMeasureControlPlan($relationAlias = null) Adds a INNER JOIN clause to the query using the MeasureControlPlan relation
 *
 * @method     ChildUsersQuery joinWithMeasureControlPlan($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the MeasureControlPlan relation
 *
 * @method     ChildUsersQuery leftJoinWithMeasureControlPlan() Adds a LEFT JOIN clause and with to the query using the MeasureControlPlan relation
 * @method     ChildUsersQuery rightJoinWithMeasureControlPlan() Adds a RIGHT JOIN clause and with to the query using the MeasureControlPlan relation
 * @method     ChildUsersQuery innerJoinWithMeasureControlPlan() Adds a INNER JOIN clause and with to the query using the MeasureControlPlan relation
 *
 * @method     ChildUsersQuery leftJoinProjectsRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectsRelatedByCreatedBy relation
 * @method     ChildUsersQuery rightJoinProjectsRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectsRelatedByCreatedBy relation
 * @method     ChildUsersQuery innerJoinProjectsRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectsRelatedByCreatedBy relation
 *
 * @method     ChildUsersQuery joinWithProjectsRelatedByCreatedBy($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectsRelatedByCreatedBy relation
 *
 * @method     ChildUsersQuery leftJoinWithProjectsRelatedByCreatedBy() Adds a LEFT JOIN clause and with to the query using the ProjectsRelatedByCreatedBy relation
 * @method     ChildUsersQuery rightJoinWithProjectsRelatedByCreatedBy() Adds a RIGHT JOIN clause and with to the query using the ProjectsRelatedByCreatedBy relation
 * @method     ChildUsersQuery innerJoinWithProjectsRelatedByCreatedBy() Adds a INNER JOIN clause and with to the query using the ProjectsRelatedByCreatedBy relation
 *
 * @method     ChildUsersQuery leftJoinProjectsRelatedBySponsor($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectsRelatedBySponsor relation
 * @method     ChildUsersQuery rightJoinProjectsRelatedBySponsor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectsRelatedBySponsor relation
 * @method     ChildUsersQuery innerJoinProjectsRelatedBySponsor($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectsRelatedBySponsor relation
 *
 * @method     ChildUsersQuery joinWithProjectsRelatedBySponsor($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectsRelatedBySponsor relation
 *
 * @method     ChildUsersQuery leftJoinWithProjectsRelatedBySponsor() Adds a LEFT JOIN clause and with to the query using the ProjectsRelatedBySponsor relation
 * @method     ChildUsersQuery rightJoinWithProjectsRelatedBySponsor() Adds a RIGHT JOIN clause and with to the query using the ProjectsRelatedBySponsor relation
 * @method     ChildUsersQuery innerJoinWithProjectsRelatedBySponsor() Adds a INNER JOIN clause and with to the query using the ProjectsRelatedBySponsor relation
 *
 * @method     ChildUsersQuery leftJoinProjectsRelatedByLead($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectsRelatedByLead relation
 * @method     ChildUsersQuery rightJoinProjectsRelatedByLead($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectsRelatedByLead relation
 * @method     ChildUsersQuery innerJoinProjectsRelatedByLead($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectsRelatedByLead relation
 *
 * @method     ChildUsersQuery joinWithProjectsRelatedByLead($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectsRelatedByLead relation
 *
 * @method     ChildUsersQuery leftJoinWithProjectsRelatedByLead() Adds a LEFT JOIN clause and with to the query using the ProjectsRelatedByLead relation
 * @method     ChildUsersQuery rightJoinWithProjectsRelatedByLead() Adds a RIGHT JOIN clause and with to the query using the ProjectsRelatedByLead relation
 * @method     ChildUsersQuery innerJoinWithProjectsRelatedByLead() Adds a INNER JOIN clause and with to the query using the ProjectsRelatedByLead relation
 *
 * @method     ChildUsersQuery leftJoinUsersRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsersRelatedById relation
 * @method     ChildUsersQuery rightJoinUsersRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsersRelatedById relation
 * @method     ChildUsersQuery innerJoinUsersRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the UsersRelatedById relation
 *
 * @method     ChildUsersQuery joinWithUsersRelatedById($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UsersRelatedById relation
 *
 * @method     ChildUsersQuery leftJoinWithUsersRelatedById() Adds a LEFT JOIN clause and with to the query using the UsersRelatedById relation
 * @method     ChildUsersQuery rightJoinWithUsersRelatedById() Adds a RIGHT JOIN clause and with to the query using the UsersRelatedById relation
 * @method     ChildUsersQuery innerJoinWithUsersRelatedById() Adds a INNER JOIN clause and with to the query using the UsersRelatedById relation
 *
 * @method     \ClientsQuery|\AccessLevelsQuery|\UsersQuery|\ActionTrackingQuery|\ControlControlPlanQuery|\ControlTestPlanQuery|\DefineCommunicationQuery|\DefineRiskManagementQuery|\DefineStakeholdersQuery|\MeasureControlPlanQuery|\ProjectsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUsers findOne(ConnectionInterface $con = null) Return the first ChildUsers matching the query
 * @method     ChildUsers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsers matching the query, or a new ChildUsers object populated from the query conditions when no match is found
 *
 * @method     ChildUsers findOneById(int $id) Return the first ChildUsers filtered by the id column
 * @method     ChildUsers findOneByClientId(int $client_id) Return the first ChildUsers filtered by the client_id column
 * @method     ChildUsers findOneByStatus(string $status) Return the first ChildUsers filtered by the status column
 * @method     ChildUsers findOneByAccessLevelId(int $access_level_id) Return the first ChildUsers filtered by the access_level_id column
 * @method     ChildUsers findOneByEmailAddress(string $email_address) Return the first ChildUsers filtered by the email_address column
 * @method     ChildUsers findOneByPassword(string $password) Return the first ChildUsers filtered by the password column
 * @method     ChildUsers findOneByFirstName(string $first_name) Return the first ChildUsers filtered by the first_name column
 * @method     ChildUsers findOneByLastName(string $last_name) Return the first ChildUsers filtered by the last_name column
 * @method     ChildUsers findOneByWorkTitle(string $work_title) Return the first ChildUsers filtered by the work_title column
 * @method     ChildUsers findOneByReportsTo(int $reports_to) Return the first ChildUsers filtered by the reports_to column
 * @method     ChildUsers findOneByProfileImageUrl(string $profile_image_url) Return the first ChildUsers filtered by the profile_image_url column
 * @method     ChildUsers findOneByPhone(string $phone) Return the first ChildUsers filtered by the phone column
 * @method     ChildUsers findOneByCity(string $city) Return the first ChildUsers filtered by the city column
 * @method     ChildUsers findOneByState(string $state) Return the first ChildUsers filtered by the state column
 * @method     ChildUsers findOneByZip(string $zip) Return the first ChildUsers filtered by the zip column
 * @method     ChildUsers findOneByTimeZone(string $time_zone) Return the first ChildUsers filtered by the time_zone column
 * @method     ChildUsers findOneByIsLoggedIn(int $is_logged_in) Return the first ChildUsers filtered by the is_logged_in column
 * @method     ChildUsers findOneByLastLogin(string $last_login) Return the first ChildUsers filtered by the last_login column
 * @method     ChildUsers findOneByCreatedBy(int $created_by) Return the first ChildUsers filtered by the created_by column
 * @method     ChildUsers findOneByLastUpdated(string $last_updated) Return the first ChildUsers filtered by the last_updated column
 * @method     ChildUsers findOneByDateTimeCreated(string $date_time_created) Return the first ChildUsers filtered by the date_time_created column
 * @method     ChildUsers findOneByWordpressId(int $wordpress_id) Return the first ChildUsers filtered by the wordpress_id column *

 * @method     ChildUsers requirePk($key, ConnectionInterface $con = null) Return the ChildUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOne(ConnectionInterface $con = null) Return the first ChildUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers requireOneById(int $id) Return the first ChildUsers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByClientId(int $client_id) Return the first ChildUsers filtered by the client_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByStatus(string $status) Return the first ChildUsers filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByAccessLevelId(int $access_level_id) Return the first ChildUsers filtered by the access_level_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByEmailAddress(string $email_address) Return the first ChildUsers filtered by the email_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByPassword(string $password) Return the first ChildUsers filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByFirstName(string $first_name) Return the first ChildUsers filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByLastName(string $last_name) Return the first ChildUsers filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByWorkTitle(string $work_title) Return the first ChildUsers filtered by the work_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByReportsTo(int $reports_to) Return the first ChildUsers filtered by the reports_to column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByProfileImageUrl(string $profile_image_url) Return the first ChildUsers filtered by the profile_image_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByPhone(string $phone) Return the first ChildUsers filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByCity(string $city) Return the first ChildUsers filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByState(string $state) Return the first ChildUsers filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByZip(string $zip) Return the first ChildUsers filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByTimeZone(string $time_zone) Return the first ChildUsers filtered by the time_zone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByIsLoggedIn(int $is_logged_in) Return the first ChildUsers filtered by the is_logged_in column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByLastLogin(string $last_login) Return the first ChildUsers filtered by the last_login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByCreatedBy(int $created_by) Return the first ChildUsers filtered by the created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByLastUpdated(string $last_updated) Return the first ChildUsers filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByDateTimeCreated(string $date_time_created) Return the first ChildUsers filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByWordpressId(int $wordpress_id) Return the first ChildUsers filtered by the wordpress_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @method     ChildUsers[]|ObjectCollection findById(int $id) Return ChildUsers objects filtered by the id column
 * @method     ChildUsers[]|ObjectCollection findByClientId(int $client_id) Return ChildUsers objects filtered by the client_id column
 * @method     ChildUsers[]|ObjectCollection findByStatus(string $status) Return ChildUsers objects filtered by the status column
 * @method     ChildUsers[]|ObjectCollection findByAccessLevelId(int $access_level_id) Return ChildUsers objects filtered by the access_level_id column
 * @method     ChildUsers[]|ObjectCollection findByEmailAddress(string $email_address) Return ChildUsers objects filtered by the email_address column
 * @method     ChildUsers[]|ObjectCollection findByPassword(string $password) Return ChildUsers objects filtered by the password column
 * @method     ChildUsers[]|ObjectCollection findByFirstName(string $first_name) Return ChildUsers objects filtered by the first_name column
 * @method     ChildUsers[]|ObjectCollection findByLastName(string $last_name) Return ChildUsers objects filtered by the last_name column
 * @method     ChildUsers[]|ObjectCollection findByWorkTitle(string $work_title) Return ChildUsers objects filtered by the work_title column
 * @method     ChildUsers[]|ObjectCollection findByReportsTo(int $reports_to) Return ChildUsers objects filtered by the reports_to column
 * @method     ChildUsers[]|ObjectCollection findByProfileImageUrl(string $profile_image_url) Return ChildUsers objects filtered by the profile_image_url column
 * @method     ChildUsers[]|ObjectCollection findByPhone(string $phone) Return ChildUsers objects filtered by the phone column
 * @method     ChildUsers[]|ObjectCollection findByCity(string $city) Return ChildUsers objects filtered by the city column
 * @method     ChildUsers[]|ObjectCollection findByState(string $state) Return ChildUsers objects filtered by the state column
 * @method     ChildUsers[]|ObjectCollection findByZip(string $zip) Return ChildUsers objects filtered by the zip column
 * @method     ChildUsers[]|ObjectCollection findByTimeZone(string $time_zone) Return ChildUsers objects filtered by the time_zone column
 * @method     ChildUsers[]|ObjectCollection findByIsLoggedIn(int $is_logged_in) Return ChildUsers objects filtered by the is_logged_in column
 * @method     ChildUsers[]|ObjectCollection findByLastLogin(string $last_login) Return ChildUsers objects filtered by the last_login column
 * @method     ChildUsers[]|ObjectCollection findByCreatedBy(int $created_by) Return ChildUsers objects filtered by the created_by column
 * @method     ChildUsers[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildUsers objects filtered by the last_updated column
 * @method     ChildUsers[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildUsers objects filtered by the date_time_created column
 * @method     ChildUsers[]|ObjectCollection findByWordpressId(int $wordpress_id) Return ChildUsers objects filtered by the wordpress_id column
 * @method     ChildUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UsersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Users', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsersQuery) {
            return $criteria;
        }
        $query = new ChildUsersQuery();
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
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `client_id`, `status`, `access_level_id`, `email_address`, `password`, `first_name`, `last_name`, `work_title`, `reports_to`, `profile_image_url`, `phone`, `city`, `state`, `zip`, `time_zone`, `is_logged_in`, `last_login`, `created_by`, `last_updated`, `date_time_created`, `wordpress_id` FROM `users` WHERE `id` = :p0';
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
            /** @var ChildUsers $obj */
            $obj = new ChildUsers();
            $obj->hydrate($row);
            UsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_CLIENT_ID, $clientId, $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the access_level_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessLevelId(1234); // WHERE access_level_id = 1234
     * $query->filterByAccessLevelId(array(12, 34)); // WHERE access_level_id IN (12, 34)
     * $query->filterByAccessLevelId(array('min' => 12)); // WHERE access_level_id > 12
     * </code>
     *
     * @see       filterByAccessLevels()
     *
     * @param     mixed $accessLevelId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByAccessLevelId($accessLevelId = null, $comparison = null)
    {
        if (is_array($accessLevelId)) {
            $useMinMax = false;
            if (isset($accessLevelId['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_ACCESS_LEVEL_ID, $accessLevelId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessLevelId['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_ACCESS_LEVEL_ID, $accessLevelId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_ACCESS_LEVEL_ID, $accessLevelId, $comparison);
    }

    /**
     * Filter the query on the email_address column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailAddress('fooValue');   // WHERE email_address = 'fooValue'
     * $query->filterByEmailAddress('%fooValue%', Criteria::LIKE); // WHERE email_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByEmailAddress($emailAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_EMAIL_ADDRESS, $emailAddress, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the work_title column
     *
     * Example usage:
     * <code>
     * $query->filterByWorkTitle('fooValue');   // WHERE work_title = 'fooValue'
     * $query->filterByWorkTitle('%fooValue%', Criteria::LIKE); // WHERE work_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $workTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByWorkTitle($workTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($workTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_WORK_TITLE, $workTitle, $comparison);
    }

    /**
     * Filter the query on the reports_to column
     *
     * Example usage:
     * <code>
     * $query->filterByReportsTo(1234); // WHERE reports_to = 1234
     * $query->filterByReportsTo(array(12, 34)); // WHERE reports_to IN (12, 34)
     * $query->filterByReportsTo(array('min' => 12)); // WHERE reports_to > 12
     * </code>
     *
     * @see       filterByUsersRelatedByReportsTo()
     *
     * @param     mixed $reportsTo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByReportsTo($reportsTo = null, $comparison = null)
    {
        if (is_array($reportsTo)) {
            $useMinMax = false;
            if (isset($reportsTo['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_REPORTS_TO, $reportsTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reportsTo['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_REPORTS_TO, $reportsTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_REPORTS_TO, $reportsTo, $comparison);
    }

    /**
     * Filter the query on the profile_image_url column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileImageUrl('fooValue');   // WHERE profile_image_url = 'fooValue'
     * $query->filterByProfileImageUrl('%fooValue%', Criteria::LIKE); // WHERE profile_image_url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $profileImageUrl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByProfileImageUrl($profileImageUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($profileImageUrl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_PROFILE_IMAGE_URL, $profileImageUrl, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the time_zone column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeZone('fooValue');   // WHERE time_zone = 'fooValue'
     * $query->filterByTimeZone('%fooValue%', Criteria::LIKE); // WHERE time_zone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timeZone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByTimeZone($timeZone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeZone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_TIME_ZONE, $timeZone, $comparison);
    }

    /**
     * Filter the query on the is_logged_in column
     *
     * Example usage:
     * <code>
     * $query->filterByIsLoggedIn(1234); // WHERE is_logged_in = 1234
     * $query->filterByIsLoggedIn(array(12, 34)); // WHERE is_logged_in IN (12, 34)
     * $query->filterByIsLoggedIn(array('min' => 12)); // WHERE is_logged_in > 12
     * </code>
     *
     * @param     mixed $isLoggedIn The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByIsLoggedIn($isLoggedIn = null, $comparison = null)
    {
        if (is_array($isLoggedIn)) {
            $useMinMax = false;
            if (isset($isLoggedIn['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_IS_LOGGED_IN, $isLoggedIn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isLoggedIn['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_IS_LOGGED_IN, $isLoggedIn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_IS_LOGGED_IN, $isLoggedIn, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_LAST_LOGIN, $lastLogin, $comparison);
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
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_CREATED_BY, $createdBy, $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
    }

    /**
     * Filter the query on the wordpress_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWordpressId(1234); // WHERE wordpress_id = 1234
     * $query->filterByWordpressId(array(12, 34)); // WHERE wordpress_id IN (12, 34)
     * $query->filterByWordpressId(array('min' => 12)); // WHERE wordpress_id > 12
     * </code>
     *
     * @param     mixed $wordpressId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function filterByWordpressId($wordpressId = null, $comparison = null)
    {
        if (is_array($wordpressId)) {
            $useMinMax = false;
            if (isset($wordpressId['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_WORDPRESS_ID, $wordpressId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wordpressId['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_WORDPRESS_ID, $wordpressId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersTableMap::COL_WORDPRESS_ID, $wordpressId, $comparison);
    }

    /**
     * Filter the query by a related \Clients object
     *
     * @param \Clients|ObjectCollection $clients The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByClients($clients, $comparison = null)
    {
        if ($clients instanceof \Clients) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_CLIENT_ID, $clients->getId(), $comparison);
        } elseif ($clients instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsersTableMap::COL_CLIENT_ID, $clients->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
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
     * Filter the query by a related \AccessLevels object
     *
     * @param \AccessLevels|ObjectCollection $accessLevels The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByAccessLevels($accessLevels, $comparison = null)
    {
        if ($accessLevels instanceof \AccessLevels) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ACCESS_LEVEL_ID, $accessLevels->getId(), $comparison);
        } elseif ($accessLevels instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsersTableMap::COL_ACCESS_LEVEL_ID, $accessLevels->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAccessLevels() only accepts arguments of type \AccessLevels or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AccessLevels relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinAccessLevels($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AccessLevels');

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
            $this->addJoinObject($join, 'AccessLevels');
        }

        return $this;
    }

    /**
     * Use the AccessLevels relation AccessLevels object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AccessLevelsQuery A secondary query class using the current class as primary query
     */
    public function useAccessLevelsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAccessLevels($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AccessLevels', '\AccessLevelsQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedByReportsTo($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_REPORTS_TO, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UsersTableMap::COL_REPORTS_TO, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsersRelatedByReportsTo() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedByReportsTo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinUsersRelatedByReportsTo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedByReportsTo');

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
            $this->addJoinObject($join, 'UsersRelatedByReportsTo');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedByReportsTo relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedByReportsToQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsersRelatedByReportsTo($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedByReportsTo', '\UsersQuery');
    }

    /**
     * Filter the query by a related \ActionTracking object
     *
     * @param \ActionTracking|ObjectCollection $actionTracking the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByActionTracking($actionTracking, $comparison = null)
    {
        if ($actionTracking instanceof \ActionTracking) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $actionTracking->getUserId(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
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
     * Filter the query by a related \ControlControlPlan object
     *
     * @param \ControlControlPlan|ObjectCollection $controlControlPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByControlControlPlan($controlControlPlan, $comparison = null)
    {
        if ($controlControlPlan instanceof \ControlControlPlan) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $controlControlPlan->getWhoMeasures(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinControlControlPlan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useControlControlPlanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinControlControlPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ControlControlPlan', '\ControlControlPlanQuery');
    }

    /**
     * Filter the query by a related \ControlTestPlan object
     *
     * @param \ControlTestPlan|ObjectCollection $controlTestPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByControlTestPlan($controlTestPlan, $comparison = null)
    {
        if ($controlTestPlan instanceof \ControlTestPlan) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $controlTestPlan->getResponsibleParty(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinControlTestPlan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useControlTestPlanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByDefineCommunication($defineCommunication, $comparison = null)
    {
        if ($defineCommunication instanceof \DefineCommunication) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $defineCommunication->getOwner(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinDefineCommunication($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useDefineCommunicationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDefineCommunication($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineCommunication', '\DefineCommunicationQuery');
    }

    /**
     * Filter the query by a related \DefineRiskManagement object
     *
     * @param \DefineRiskManagement|ObjectCollection $defineRiskManagement the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByDefineRiskManagement($defineRiskManagement, $comparison = null)
    {
        if ($defineRiskManagement instanceof \DefineRiskManagement) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $defineRiskManagement->getPersonAccountable(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinDefineRiskManagement($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useDefineRiskManagementQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDefineRiskManagement($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DefineRiskManagement', '\DefineRiskManagementQuery');
    }

    /**
     * Filter the query by a related \DefineStakeholders object
     *
     * @param \DefineStakeholders|ObjectCollection $defineStakeholders the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByDefineStakeholders($defineStakeholders, $comparison = null)
    {
        if ($defineStakeholders instanceof \DefineStakeholders) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $defineStakeholders->getUserId(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
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
     * Filter the query by a related \MeasureControlPlan object
     *
     * @param \MeasureControlPlan|ObjectCollection $measureControlPlan the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByMeasureControlPlan($measureControlPlan, $comparison = null)
    {
        if ($measureControlPlan instanceof \MeasureControlPlan) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $measureControlPlan->getWhoMeasures(), $comparison);
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
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinMeasureControlPlan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useMeasureControlPlanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMeasureControlPlan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MeasureControlPlan', '\MeasureControlPlanQuery');
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByProjectsRelatedByCreatedBy($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $projects->getCreatedBy(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            return $this
                ->useProjectsRelatedByCreatedByQuery()
                ->filterByPrimaryKeys($projects->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectsRelatedByCreatedBy() only accepts arguments of type \Projects or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectsRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinProjectsRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectsRelatedByCreatedBy');

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
            $this->addJoinObject($join, 'ProjectsRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the ProjectsRelatedByCreatedBy relation Projects object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectsQuery A secondary query class using the current class as primary query
     */
    public function useProjectsRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProjectsRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectsRelatedByCreatedBy', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByProjectsRelatedBySponsor($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $projects->getSponsor(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            return $this
                ->useProjectsRelatedBySponsorQuery()
                ->filterByPrimaryKeys($projects->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectsRelatedBySponsor() only accepts arguments of type \Projects or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectsRelatedBySponsor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinProjectsRelatedBySponsor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectsRelatedBySponsor');

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
            $this->addJoinObject($join, 'ProjectsRelatedBySponsor');
        }

        return $this;
    }

    /**
     * Use the ProjectsRelatedBySponsor relation Projects object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectsQuery A secondary query class using the current class as primary query
     */
    public function useProjectsRelatedBySponsorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProjectsRelatedBySponsor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectsRelatedBySponsor', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByProjectsRelatedByLead($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $projects->getLead(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            return $this
                ->useProjectsRelatedByLeadQuery()
                ->filterByPrimaryKeys($projects->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByProjectsRelatedByLead() only accepts arguments of type \Projects or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectsRelatedByLead relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinProjectsRelatedByLead($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectsRelatedByLead');

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
            $this->addJoinObject($join, 'ProjectsRelatedByLead');
        }

        return $this;
    }

    /**
     * Use the ProjectsRelatedByLead relation Projects object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectsQuery A secondary query class using the current class as primary query
     */
    public function useProjectsRelatedByLeadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProjectsRelatedByLead($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectsRelatedByLead', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUsersQuery The current query, for fluid interface
     */
    public function filterByUsersRelatedById($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(UsersTableMap::COL_ID, $users->getReportsTo(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            return $this
                ->useUsersRelatedByIdQuery()
                ->filterByPrimaryKeys($users->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsersRelatedById() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UsersRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function joinUsersRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UsersRelatedById');

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
            $this->addJoinObject($join, 'UsersRelatedById');
        }

        return $this;
    }

    /**
     * Use the UsersRelatedById relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsersRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UsersRelatedById', '\UsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUsers $users Object to remove from the list of results
     *
     * @return $this|ChildUsersQuery The current query, for fluid interface
     */
    public function prune($users = null)
    {
        if ($users) {
            $this->addUsingAlias(UsersTableMap::COL_ID, $users->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersTableMap::clearInstancePool();
            UsersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsersQuery
