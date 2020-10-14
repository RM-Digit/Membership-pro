<?php

namespace Base;

use \AnalyzeRegression as ChildAnalyzeRegression;
use \AnalyzeRegressionQuery as ChildAnalyzeRegressionQuery;
use \Exception;
use \PDO;
use Map\AnalyzeRegressionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'analyze_regression' table.
 *
 *
 *
 * @method     ChildAnalyzeRegressionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAnalyzeRegressionQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildAnalyzeRegressionQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildAnalyzeRegressionQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildAnalyzeRegressionQuery orderByInput($order = Criteria::ASC) Order by the input column
 * @method     ChildAnalyzeRegressionQuery orderByMultipleR($order = Criteria::ASC) Order by the multiple_r column
 * @method     ChildAnalyzeRegressionQuery orderByRSquare($order = Criteria::ASC) Order by the r_square column
 * @method     ChildAnalyzeRegressionQuery orderByAdjustedRSquare($order = Criteria::ASC) Order by the adjusted_r_square column
 * @method     ChildAnalyzeRegressionQuery orderByStandardError($order = Criteria::ASC) Order by the standard_error column
 * @method     ChildAnalyzeRegressionQuery orderByObservations($order = Criteria::ASC) Order by the observations column
 * @method     ChildAnalyzeRegressionQuery orderByRegressionDf($order = Criteria::ASC) Order by the regression_df column
 * @method     ChildAnalyzeRegressionQuery orderByRegressionSs($order = Criteria::ASC) Order by the regression_ss column
 * @method     ChildAnalyzeRegressionQuery orderByRegressionMs($order = Criteria::ASC) Order by the regression_ms column
 * @method     ChildAnalyzeRegressionQuery orderByRegressionF($order = Criteria::ASC) Order by the regression_f column
 * @method     ChildAnalyzeRegressionQuery orderByRegressionFSignificance($order = Criteria::ASC) Order by the regression_f_significance column
 * @method     ChildAnalyzeRegressionQuery orderByResidualDf($order = Criteria::ASC) Order by the residual_df column
 * @method     ChildAnalyzeRegressionQuery orderByResidualSs($order = Criteria::ASC) Order by the residual_ss column
 * @method     ChildAnalyzeRegressionQuery orderByResidualMs($order = Criteria::ASC) Order by the residual_ms column
 * @method     ChildAnalyzeRegressionQuery orderByTotalDf($order = Criteria::ASC) Order by the total_df column
 * @method     ChildAnalyzeRegressionQuery orderByTotalSs($order = Criteria::ASC) Order by the total_ss column
 * @method     ChildAnalyzeRegressionQuery orderByInterceptCoefficients($order = Criteria::ASC) Order by the intercept_coefficients column
 * @method     ChildAnalyzeRegressionQuery orderByInterceptStandardError($order = Criteria::ASC) Order by the intercept_standard_error column
 * @method     ChildAnalyzeRegressionQuery orderByInterceptTStat($order = Criteria::ASC) Order by the intercept_t_stat column
 * @method     ChildAnalyzeRegressionQuery orderByInterceptPValue($order = Criteria::ASC) Order by the intercept_p_value column
 * @method     ChildAnalyzeRegressionQuery orderByInterceptLower($order = Criteria::ASC) Order by the intercept_lower column
 * @method     ChildAnalyzeRegressionQuery orderByInterceptUpper($order = Criteria::ASC) Order by the intercept_upper column
 * @method     ChildAnalyzeRegressionQuery orderByHhSizeCoefficients($order = Criteria::ASC) Order by the hh_size_coefficients column
 * @method     ChildAnalyzeRegressionQuery orderByHhSizeStandardError($order = Criteria::ASC) Order by the hh_size_standard_error column
 * @method     ChildAnalyzeRegressionQuery orderByHhSizeTStat($order = Criteria::ASC) Order by the hh_size_t_stat column
 * @method     ChildAnalyzeRegressionQuery orderByHhSizePValue($order = Criteria::ASC) Order by the hh_size_p_value column
 * @method     ChildAnalyzeRegressionQuery orderByHhSizeLower($order = Criteria::ASC) Order by the hh_size_lower column
 * @method     ChildAnalyzeRegressionQuery orderByHhSizeUpper($order = Criteria::ASC) Order by the hh_size_upper column
 * @method     ChildAnalyzeRegressionQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildAnalyzeRegressionQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildAnalyzeRegressionQuery groupById() Group by the id column
 * @method     ChildAnalyzeRegressionQuery groupByProjectId() Group by the project_id column
 * @method     ChildAnalyzeRegressionQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildAnalyzeRegressionQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildAnalyzeRegressionQuery groupByInput() Group by the input column
 * @method     ChildAnalyzeRegressionQuery groupByMultipleR() Group by the multiple_r column
 * @method     ChildAnalyzeRegressionQuery groupByRSquare() Group by the r_square column
 * @method     ChildAnalyzeRegressionQuery groupByAdjustedRSquare() Group by the adjusted_r_square column
 * @method     ChildAnalyzeRegressionQuery groupByStandardError() Group by the standard_error column
 * @method     ChildAnalyzeRegressionQuery groupByObservations() Group by the observations column
 * @method     ChildAnalyzeRegressionQuery groupByRegressionDf() Group by the regression_df column
 * @method     ChildAnalyzeRegressionQuery groupByRegressionSs() Group by the regression_ss column
 * @method     ChildAnalyzeRegressionQuery groupByRegressionMs() Group by the regression_ms column
 * @method     ChildAnalyzeRegressionQuery groupByRegressionF() Group by the regression_f column
 * @method     ChildAnalyzeRegressionQuery groupByRegressionFSignificance() Group by the regression_f_significance column
 * @method     ChildAnalyzeRegressionQuery groupByResidualDf() Group by the residual_df column
 * @method     ChildAnalyzeRegressionQuery groupByResidualSs() Group by the residual_ss column
 * @method     ChildAnalyzeRegressionQuery groupByResidualMs() Group by the residual_ms column
 * @method     ChildAnalyzeRegressionQuery groupByTotalDf() Group by the total_df column
 * @method     ChildAnalyzeRegressionQuery groupByTotalSs() Group by the total_ss column
 * @method     ChildAnalyzeRegressionQuery groupByInterceptCoefficients() Group by the intercept_coefficients column
 * @method     ChildAnalyzeRegressionQuery groupByInterceptStandardError() Group by the intercept_standard_error column
 * @method     ChildAnalyzeRegressionQuery groupByInterceptTStat() Group by the intercept_t_stat column
 * @method     ChildAnalyzeRegressionQuery groupByInterceptPValue() Group by the intercept_p_value column
 * @method     ChildAnalyzeRegressionQuery groupByInterceptLower() Group by the intercept_lower column
 * @method     ChildAnalyzeRegressionQuery groupByInterceptUpper() Group by the intercept_upper column
 * @method     ChildAnalyzeRegressionQuery groupByHhSizeCoefficients() Group by the hh_size_coefficients column
 * @method     ChildAnalyzeRegressionQuery groupByHhSizeStandardError() Group by the hh_size_standard_error column
 * @method     ChildAnalyzeRegressionQuery groupByHhSizeTStat() Group by the hh_size_t_stat column
 * @method     ChildAnalyzeRegressionQuery groupByHhSizePValue() Group by the hh_size_p_value column
 * @method     ChildAnalyzeRegressionQuery groupByHhSizeLower() Group by the hh_size_lower column
 * @method     ChildAnalyzeRegressionQuery groupByHhSizeUpper() Group by the hh_size_upper column
 * @method     ChildAnalyzeRegressionQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildAnalyzeRegressionQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildAnalyzeRegressionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAnalyzeRegressionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAnalyzeRegressionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAnalyzeRegressionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAnalyzeRegressionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAnalyzeRegressionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAnalyzeRegression findOne(ConnectionInterface $con = null) Return the first ChildAnalyzeRegression matching the query
 * @method     ChildAnalyzeRegression findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAnalyzeRegression matching the query, or a new ChildAnalyzeRegression object populated from the query conditions when no match is found
 *
 * @method     ChildAnalyzeRegression findOneById(int $id) Return the first ChildAnalyzeRegression filtered by the id column
 * @method     ChildAnalyzeRegression findOneByProjectId(int $project_id) Return the first ChildAnalyzeRegression filtered by the project_id column
 * @method     ChildAnalyzeRegression findOneByPhaseId(int $phase_id) Return the first ChildAnalyzeRegression filtered by the phase_id column
 * @method     ChildAnalyzeRegression findOneByPhaseComponentId(int $phase_component_id) Return the first ChildAnalyzeRegression filtered by the phase_component_id column
 * @method     ChildAnalyzeRegression findOneByInput(string $input) Return the first ChildAnalyzeRegression filtered by the input column
 * @method     ChildAnalyzeRegression findOneByMultipleR(double $multiple_r) Return the first ChildAnalyzeRegression filtered by the multiple_r column
 * @method     ChildAnalyzeRegression findOneByRSquare(double $r_square) Return the first ChildAnalyzeRegression filtered by the r_square column
 * @method     ChildAnalyzeRegression findOneByAdjustedRSquare(double $adjusted_r_square) Return the first ChildAnalyzeRegression filtered by the adjusted_r_square column
 * @method     ChildAnalyzeRegression findOneByStandardError(double $standard_error) Return the first ChildAnalyzeRegression filtered by the standard_error column
 * @method     ChildAnalyzeRegression findOneByObservations(int $observations) Return the first ChildAnalyzeRegression filtered by the observations column
 * @method     ChildAnalyzeRegression findOneByRegressionDf(double $regression_df) Return the first ChildAnalyzeRegression filtered by the regression_df column
 * @method     ChildAnalyzeRegression findOneByRegressionSs(double $regression_ss) Return the first ChildAnalyzeRegression filtered by the regression_ss column
 * @method     ChildAnalyzeRegression findOneByRegressionMs(double $regression_ms) Return the first ChildAnalyzeRegression filtered by the regression_ms column
 * @method     ChildAnalyzeRegression findOneByRegressionF(double $regression_f) Return the first ChildAnalyzeRegression filtered by the regression_f column
 * @method     ChildAnalyzeRegression findOneByRegressionFSignificance(double $regression_f_significance) Return the first ChildAnalyzeRegression filtered by the regression_f_significance column
 * @method     ChildAnalyzeRegression findOneByResidualDf(double $residual_df) Return the first ChildAnalyzeRegression filtered by the residual_df column
 * @method     ChildAnalyzeRegression findOneByResidualSs(double $residual_ss) Return the first ChildAnalyzeRegression filtered by the residual_ss column
 * @method     ChildAnalyzeRegression findOneByResidualMs(double $residual_ms) Return the first ChildAnalyzeRegression filtered by the residual_ms column
 * @method     ChildAnalyzeRegression findOneByTotalDf(double $total_df) Return the first ChildAnalyzeRegression filtered by the total_df column
 * @method     ChildAnalyzeRegression findOneByTotalSs(double $total_ss) Return the first ChildAnalyzeRegression filtered by the total_ss column
 * @method     ChildAnalyzeRegression findOneByInterceptCoefficients(double $intercept_coefficients) Return the first ChildAnalyzeRegression filtered by the intercept_coefficients column
 * @method     ChildAnalyzeRegression findOneByInterceptStandardError(double $intercept_standard_error) Return the first ChildAnalyzeRegression filtered by the intercept_standard_error column
 * @method     ChildAnalyzeRegression findOneByInterceptTStat(double $intercept_t_stat) Return the first ChildAnalyzeRegression filtered by the intercept_t_stat column
 * @method     ChildAnalyzeRegression findOneByInterceptPValue(double $intercept_p_value) Return the first ChildAnalyzeRegression filtered by the intercept_p_value column
 * @method     ChildAnalyzeRegression findOneByInterceptLower(double $intercept_lower) Return the first ChildAnalyzeRegression filtered by the intercept_lower column
 * @method     ChildAnalyzeRegression findOneByInterceptUpper(double $intercept_upper) Return the first ChildAnalyzeRegression filtered by the intercept_upper column
 * @method     ChildAnalyzeRegression findOneByHhSizeCoefficients(double $hh_size_coefficients) Return the first ChildAnalyzeRegression filtered by the hh_size_coefficients column
 * @method     ChildAnalyzeRegression findOneByHhSizeStandardError(double $hh_size_standard_error) Return the first ChildAnalyzeRegression filtered by the hh_size_standard_error column
 * @method     ChildAnalyzeRegression findOneByHhSizeTStat(double $hh_size_t_stat) Return the first ChildAnalyzeRegression filtered by the hh_size_t_stat column
 * @method     ChildAnalyzeRegression findOneByHhSizePValue(double $hh_size_p_value) Return the first ChildAnalyzeRegression filtered by the hh_size_p_value column
 * @method     ChildAnalyzeRegression findOneByHhSizeLower(double $hh_size_lower) Return the first ChildAnalyzeRegression filtered by the hh_size_lower column
 * @method     ChildAnalyzeRegression findOneByHhSizeUpper(double $hh_size_upper) Return the first ChildAnalyzeRegression filtered by the hh_size_upper column
 * @method     ChildAnalyzeRegression findOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeRegression filtered by the date_time_created column
 * @method     ChildAnalyzeRegression findOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeRegression filtered by the last_updated column *

 * @method     ChildAnalyzeRegression requirePk($key, ConnectionInterface $con = null) Return the ChildAnalyzeRegression by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOne(ConnectionInterface $con = null) Return the first ChildAnalyzeRegression matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeRegression requireOneById(int $id) Return the first ChildAnalyzeRegression filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByProjectId(int $project_id) Return the first ChildAnalyzeRegression filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByPhaseId(int $phase_id) Return the first ChildAnalyzeRegression filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildAnalyzeRegression filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInput(string $input) Return the first ChildAnalyzeRegression filtered by the input column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByMultipleR(double $multiple_r) Return the first ChildAnalyzeRegression filtered by the multiple_r column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByRSquare(double $r_square) Return the first ChildAnalyzeRegression filtered by the r_square column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByAdjustedRSquare(double $adjusted_r_square) Return the first ChildAnalyzeRegression filtered by the adjusted_r_square column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByStandardError(double $standard_error) Return the first ChildAnalyzeRegression filtered by the standard_error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByObservations(int $observations) Return the first ChildAnalyzeRegression filtered by the observations column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByRegressionDf(double $regression_df) Return the first ChildAnalyzeRegression filtered by the regression_df column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByRegressionSs(double $regression_ss) Return the first ChildAnalyzeRegression filtered by the regression_ss column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByRegressionMs(double $regression_ms) Return the first ChildAnalyzeRegression filtered by the regression_ms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByRegressionF(double $regression_f) Return the first ChildAnalyzeRegression filtered by the regression_f column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByRegressionFSignificance(double $regression_f_significance) Return the first ChildAnalyzeRegression filtered by the regression_f_significance column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByResidualDf(double $residual_df) Return the first ChildAnalyzeRegression filtered by the residual_df column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByResidualSs(double $residual_ss) Return the first ChildAnalyzeRegression filtered by the residual_ss column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByResidualMs(double $residual_ms) Return the first ChildAnalyzeRegression filtered by the residual_ms column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByTotalDf(double $total_df) Return the first ChildAnalyzeRegression filtered by the total_df column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByTotalSs(double $total_ss) Return the first ChildAnalyzeRegression filtered by the total_ss column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInterceptCoefficients(double $intercept_coefficients) Return the first ChildAnalyzeRegression filtered by the intercept_coefficients column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInterceptStandardError(double $intercept_standard_error) Return the first ChildAnalyzeRegression filtered by the intercept_standard_error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInterceptTStat(double $intercept_t_stat) Return the first ChildAnalyzeRegression filtered by the intercept_t_stat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInterceptPValue(double $intercept_p_value) Return the first ChildAnalyzeRegression filtered by the intercept_p_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInterceptLower(double $intercept_lower) Return the first ChildAnalyzeRegression filtered by the intercept_lower column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByInterceptUpper(double $intercept_upper) Return the first ChildAnalyzeRegression filtered by the intercept_upper column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByHhSizeCoefficients(double $hh_size_coefficients) Return the first ChildAnalyzeRegression filtered by the hh_size_coefficients column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByHhSizeStandardError(double $hh_size_standard_error) Return the first ChildAnalyzeRegression filtered by the hh_size_standard_error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByHhSizeTStat(double $hh_size_t_stat) Return the first ChildAnalyzeRegression filtered by the hh_size_t_stat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByHhSizePValue(double $hh_size_p_value) Return the first ChildAnalyzeRegression filtered by the hh_size_p_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByHhSizeLower(double $hh_size_lower) Return the first ChildAnalyzeRegression filtered by the hh_size_lower column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByHhSizeUpper(double $hh_size_upper) Return the first ChildAnalyzeRegression filtered by the hh_size_upper column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeRegression filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeRegression requireOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeRegression filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeRegression[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAnalyzeRegression objects based on current ModelCriteria
 * @method     ChildAnalyzeRegression[]|ObjectCollection findById(int $id) Return ChildAnalyzeRegression objects filtered by the id column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByProjectId(int $project_id) Return ChildAnalyzeRegression objects filtered by the project_id column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildAnalyzeRegression objects filtered by the phase_id column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildAnalyzeRegression objects filtered by the phase_component_id column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInput(string $input) Return ChildAnalyzeRegression objects filtered by the input column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByMultipleR(double $multiple_r) Return ChildAnalyzeRegression objects filtered by the multiple_r column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByRSquare(double $r_square) Return ChildAnalyzeRegression objects filtered by the r_square column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByAdjustedRSquare(double $adjusted_r_square) Return ChildAnalyzeRegression objects filtered by the adjusted_r_square column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByStandardError(double $standard_error) Return ChildAnalyzeRegression objects filtered by the standard_error column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByObservations(int $observations) Return ChildAnalyzeRegression objects filtered by the observations column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByRegressionDf(double $regression_df) Return ChildAnalyzeRegression objects filtered by the regression_df column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByRegressionSs(double $regression_ss) Return ChildAnalyzeRegression objects filtered by the regression_ss column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByRegressionMs(double $regression_ms) Return ChildAnalyzeRegression objects filtered by the regression_ms column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByRegressionF(double $regression_f) Return ChildAnalyzeRegression objects filtered by the regression_f column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByRegressionFSignificance(double $regression_f_significance) Return ChildAnalyzeRegression objects filtered by the regression_f_significance column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByResidualDf(double $residual_df) Return ChildAnalyzeRegression objects filtered by the residual_df column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByResidualSs(double $residual_ss) Return ChildAnalyzeRegression objects filtered by the residual_ss column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByResidualMs(double $residual_ms) Return ChildAnalyzeRegression objects filtered by the residual_ms column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByTotalDf(double $total_df) Return ChildAnalyzeRegression objects filtered by the total_df column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByTotalSs(double $total_ss) Return ChildAnalyzeRegression objects filtered by the total_ss column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInterceptCoefficients(double $intercept_coefficients) Return ChildAnalyzeRegression objects filtered by the intercept_coefficients column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInterceptStandardError(double $intercept_standard_error) Return ChildAnalyzeRegression objects filtered by the intercept_standard_error column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInterceptTStat(double $intercept_t_stat) Return ChildAnalyzeRegression objects filtered by the intercept_t_stat column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInterceptPValue(double $intercept_p_value) Return ChildAnalyzeRegression objects filtered by the intercept_p_value column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInterceptLower(double $intercept_lower) Return ChildAnalyzeRegression objects filtered by the intercept_lower column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByInterceptUpper(double $intercept_upper) Return ChildAnalyzeRegression objects filtered by the intercept_upper column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByHhSizeCoefficients(double $hh_size_coefficients) Return ChildAnalyzeRegression objects filtered by the hh_size_coefficients column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByHhSizeStandardError(double $hh_size_standard_error) Return ChildAnalyzeRegression objects filtered by the hh_size_standard_error column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByHhSizeTStat(double $hh_size_t_stat) Return ChildAnalyzeRegression objects filtered by the hh_size_t_stat column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByHhSizePValue(double $hh_size_p_value) Return ChildAnalyzeRegression objects filtered by the hh_size_p_value column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByHhSizeLower(double $hh_size_lower) Return ChildAnalyzeRegression objects filtered by the hh_size_lower column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByHhSizeUpper(double $hh_size_upper) Return ChildAnalyzeRegression objects filtered by the hh_size_upper column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildAnalyzeRegression objects filtered by the date_time_created column
 * @method     ChildAnalyzeRegression[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildAnalyzeRegression objects filtered by the last_updated column
 * @method     ChildAnalyzeRegression[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AnalyzeRegressionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AnalyzeRegressionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AnalyzeRegression', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAnalyzeRegressionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAnalyzeRegressionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAnalyzeRegressionQuery) {
            return $criteria;
        }
        $query = new ChildAnalyzeRegressionQuery();
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
     * @return ChildAnalyzeRegression|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AnalyzeRegressionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAnalyzeRegression A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `input`, `multiple_r`, `r_square`, `adjusted_r_square`, `standard_error`, `observations`, `regression_df`, `regression_ss`, `regression_ms`, `regression_f`, `regression_f_significance`, `residual_df`, `residual_ss`, `residual_ms`, `total_df`, `total_ss`, `intercept_coefficients`, `intercept_standard_error`, `intercept_t_stat`, `intercept_p_value`, `intercept_lower`, `intercept_upper`, `hh_size_coefficients`, `hh_size_standard_error`, `hh_size_t_stat`, `hh_size_p_value`, `hh_size_lower`, `hh_size_upper`, `date_time_created`, `last_updated` FROM `analyze_regression` WHERE `id` = :p0';
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
            /** @var ChildAnalyzeRegression $obj */
            $obj = new ChildAnalyzeRegression();
            $obj->hydrate($row);
            AnalyzeRegressionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAnalyzeRegression|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ID, $id, $comparison);
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
     * @param     mixed $projectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @param     mixed $phaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PHASE_ID, $phaseId, $comparison);
    }

    /**
     * Filter the query on the phase_component_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseComponentId(1234); // WHERE phase_component_id = 1234
     * $query->filterByPhaseComponentId(array(12, 34)); // WHERE phase_component_id IN (12, 34)
     * $query->filterByPhaseComponentId(array('min' => 12)); // WHERE phase_component_id > 12
     * </code>
     *
     * @param     mixed $phaseComponentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the input column
     *
     * Example usage:
     * <code>
     * $query->filterByInput('fooValue');   // WHERE input = 'fooValue'
     * $query->filterByInput('%fooValue%', Criteria::LIKE); // WHERE input LIKE '%fooValue%'
     * </code>
     *
     * @param     string $input The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInput($input = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($input)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INPUT, $input, $comparison);
    }

    /**
     * Filter the query on the multiple_r column
     *
     * Example usage:
     * <code>
     * $query->filterByMultipleR(1234); // WHERE multiple_r = 1234
     * $query->filterByMultipleR(array(12, 34)); // WHERE multiple_r IN (12, 34)
     * $query->filterByMultipleR(array('min' => 12)); // WHERE multiple_r > 12
     * </code>
     *
     * @param     mixed $multipleR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByMultipleR($multipleR = null, $comparison = null)
    {
        if (is_array($multipleR)) {
            $useMinMax = false;
            if (isset($multipleR['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_MULTIPLE_R, $multipleR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($multipleR['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_MULTIPLE_R, $multipleR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_MULTIPLE_R, $multipleR, $comparison);
    }

    /**
     * Filter the query on the r_square column
     *
     * Example usage:
     * <code>
     * $query->filterByRSquare(1234); // WHERE r_square = 1234
     * $query->filterByRSquare(array(12, 34)); // WHERE r_square IN (12, 34)
     * $query->filterByRSquare(array('min' => 12)); // WHERE r_square > 12
     * </code>
     *
     * @param     mixed $rSquare The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByRSquare($rSquare = null, $comparison = null)
    {
        if (is_array($rSquare)) {
            $useMinMax = false;
            if (isset($rSquare['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_R_SQUARE, $rSquare['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rSquare['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_R_SQUARE, $rSquare['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_R_SQUARE, $rSquare, $comparison);
    }

    /**
     * Filter the query on the adjusted_r_square column
     *
     * Example usage:
     * <code>
     * $query->filterByAdjustedRSquare(1234); // WHERE adjusted_r_square = 1234
     * $query->filterByAdjustedRSquare(array(12, 34)); // WHERE adjusted_r_square IN (12, 34)
     * $query->filterByAdjustedRSquare(array('min' => 12)); // WHERE adjusted_r_square > 12
     * </code>
     *
     * @param     mixed $adjustedRSquare The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByAdjustedRSquare($adjustedRSquare = null, $comparison = null)
    {
        if (is_array($adjustedRSquare)) {
            $useMinMax = false;
            if (isset($adjustedRSquare['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE, $adjustedRSquare['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adjustedRSquare['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE, $adjustedRSquare['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE, $adjustedRSquare, $comparison);
    }

    /**
     * Filter the query on the standard_error column
     *
     * Example usage:
     * <code>
     * $query->filterByStandardError(1234); // WHERE standard_error = 1234
     * $query->filterByStandardError(array(12, 34)); // WHERE standard_error IN (12, 34)
     * $query->filterByStandardError(array('min' => 12)); // WHERE standard_error > 12
     * </code>
     *
     * @param     mixed $standardError The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByStandardError($standardError = null, $comparison = null)
    {
        if (is_array($standardError)) {
            $useMinMax = false;
            if (isset($standardError['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_STANDARD_ERROR, $standardError['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($standardError['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_STANDARD_ERROR, $standardError['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_STANDARD_ERROR, $standardError, $comparison);
    }

    /**
     * Filter the query on the observations column
     *
     * Example usage:
     * <code>
     * $query->filterByObservations(1234); // WHERE observations = 1234
     * $query->filterByObservations(array(12, 34)); // WHERE observations IN (12, 34)
     * $query->filterByObservations(array('min' => 12)); // WHERE observations > 12
     * </code>
     *
     * @param     mixed $observations The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByObservations($observations = null, $comparison = null)
    {
        if (is_array($observations)) {
            $useMinMax = false;
            if (isset($observations['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_OBSERVATIONS, $observations['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($observations['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_OBSERVATIONS, $observations['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_OBSERVATIONS, $observations, $comparison);
    }

    /**
     * Filter the query on the regression_df column
     *
     * Example usage:
     * <code>
     * $query->filterByRegressionDf(1234); // WHERE regression_df = 1234
     * $query->filterByRegressionDf(array(12, 34)); // WHERE regression_df IN (12, 34)
     * $query->filterByRegressionDf(array('min' => 12)); // WHERE regression_df > 12
     * </code>
     *
     * @param     mixed $regressionDf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByRegressionDf($regressionDf = null, $comparison = null)
    {
        if (is_array($regressionDf)) {
            $useMinMax = false;
            if (isset($regressionDf['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_DF, $regressionDf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regressionDf['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_DF, $regressionDf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_DF, $regressionDf, $comparison);
    }

    /**
     * Filter the query on the regression_ss column
     *
     * Example usage:
     * <code>
     * $query->filterByRegressionSs(1234); // WHERE regression_ss = 1234
     * $query->filterByRegressionSs(array(12, 34)); // WHERE regression_ss IN (12, 34)
     * $query->filterByRegressionSs(array('min' => 12)); // WHERE regression_ss > 12
     * </code>
     *
     * @param     mixed $regressionSs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByRegressionSs($regressionSs = null, $comparison = null)
    {
        if (is_array($regressionSs)) {
            $useMinMax = false;
            if (isset($regressionSs['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_SS, $regressionSs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regressionSs['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_SS, $regressionSs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_SS, $regressionSs, $comparison);
    }

    /**
     * Filter the query on the regression_ms column
     *
     * Example usage:
     * <code>
     * $query->filterByRegressionMs(1234); // WHERE regression_ms = 1234
     * $query->filterByRegressionMs(array(12, 34)); // WHERE regression_ms IN (12, 34)
     * $query->filterByRegressionMs(array('min' => 12)); // WHERE regression_ms > 12
     * </code>
     *
     * @param     mixed $regressionMs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByRegressionMs($regressionMs = null, $comparison = null)
    {
        if (is_array($regressionMs)) {
            $useMinMax = false;
            if (isset($regressionMs['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_MS, $regressionMs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regressionMs['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_MS, $regressionMs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_MS, $regressionMs, $comparison);
    }

    /**
     * Filter the query on the regression_f column
     *
     * Example usage:
     * <code>
     * $query->filterByRegressionF(1234); // WHERE regression_f = 1234
     * $query->filterByRegressionF(array(12, 34)); // WHERE regression_f IN (12, 34)
     * $query->filterByRegressionF(array('min' => 12)); // WHERE regression_f > 12
     * </code>
     *
     * @param     mixed $regressionF The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByRegressionF($regressionF = null, $comparison = null)
    {
        if (is_array($regressionF)) {
            $useMinMax = false;
            if (isset($regressionF['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_F, $regressionF['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regressionF['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_F, $regressionF['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_F, $regressionF, $comparison);
    }

    /**
     * Filter the query on the regression_f_significance column
     *
     * Example usage:
     * <code>
     * $query->filterByRegressionFSignificance(1234); // WHERE regression_f_significance = 1234
     * $query->filterByRegressionFSignificance(array(12, 34)); // WHERE regression_f_significance IN (12, 34)
     * $query->filterByRegressionFSignificance(array('min' => 12)); // WHERE regression_f_significance > 12
     * </code>
     *
     * @param     mixed $regressionFSignificance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByRegressionFSignificance($regressionFSignificance = null, $comparison = null)
    {
        if (is_array($regressionFSignificance)) {
            $useMinMax = false;
            if (isset($regressionFSignificance['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE, $regressionFSignificance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regressionFSignificance['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE, $regressionFSignificance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE, $regressionFSignificance, $comparison);
    }

    /**
     * Filter the query on the residual_df column
     *
     * Example usage:
     * <code>
     * $query->filterByResidualDf(1234); // WHERE residual_df = 1234
     * $query->filterByResidualDf(array(12, 34)); // WHERE residual_df IN (12, 34)
     * $query->filterByResidualDf(array('min' => 12)); // WHERE residual_df > 12
     * </code>
     *
     * @param     mixed $residualDf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByResidualDf($residualDf = null, $comparison = null)
    {
        if (is_array($residualDf)) {
            $useMinMax = false;
            if (isset($residualDf['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_DF, $residualDf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($residualDf['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_DF, $residualDf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_DF, $residualDf, $comparison);
    }

    /**
     * Filter the query on the residual_ss column
     *
     * Example usage:
     * <code>
     * $query->filterByResidualSs(1234); // WHERE residual_ss = 1234
     * $query->filterByResidualSs(array(12, 34)); // WHERE residual_ss IN (12, 34)
     * $query->filterByResidualSs(array('min' => 12)); // WHERE residual_ss > 12
     * </code>
     *
     * @param     mixed $residualSs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByResidualSs($residualSs = null, $comparison = null)
    {
        if (is_array($residualSs)) {
            $useMinMax = false;
            if (isset($residualSs['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_SS, $residualSs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($residualSs['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_SS, $residualSs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_SS, $residualSs, $comparison);
    }

    /**
     * Filter the query on the residual_ms column
     *
     * Example usage:
     * <code>
     * $query->filterByResidualMs(1234); // WHERE residual_ms = 1234
     * $query->filterByResidualMs(array(12, 34)); // WHERE residual_ms IN (12, 34)
     * $query->filterByResidualMs(array('min' => 12)); // WHERE residual_ms > 12
     * </code>
     *
     * @param     mixed $residualMs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByResidualMs($residualMs = null, $comparison = null)
    {
        if (is_array($residualMs)) {
            $useMinMax = false;
            if (isset($residualMs['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_MS, $residualMs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($residualMs['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_MS, $residualMs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_RESIDUAL_MS, $residualMs, $comparison);
    }

    /**
     * Filter the query on the total_df column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalDf(1234); // WHERE total_df = 1234
     * $query->filterByTotalDf(array(12, 34)); // WHERE total_df IN (12, 34)
     * $query->filterByTotalDf(array('min' => 12)); // WHERE total_df > 12
     * </code>
     *
     * @param     mixed $totalDf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByTotalDf($totalDf = null, $comparison = null)
    {
        if (is_array($totalDf)) {
            $useMinMax = false;
            if (isset($totalDf['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_TOTAL_DF, $totalDf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalDf['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_TOTAL_DF, $totalDf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_TOTAL_DF, $totalDf, $comparison);
    }

    /**
     * Filter the query on the total_ss column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalSs(1234); // WHERE total_ss = 1234
     * $query->filterByTotalSs(array(12, 34)); // WHERE total_ss IN (12, 34)
     * $query->filterByTotalSs(array('min' => 12)); // WHERE total_ss > 12
     * </code>
     *
     * @param     mixed $totalSs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByTotalSs($totalSs = null, $comparison = null)
    {
        if (is_array($totalSs)) {
            $useMinMax = false;
            if (isset($totalSs['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_TOTAL_SS, $totalSs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalSs['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_TOTAL_SS, $totalSs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_TOTAL_SS, $totalSs, $comparison);
    }

    /**
     * Filter the query on the intercept_coefficients column
     *
     * Example usage:
     * <code>
     * $query->filterByInterceptCoefficients(1234); // WHERE intercept_coefficients = 1234
     * $query->filterByInterceptCoefficients(array(12, 34)); // WHERE intercept_coefficients IN (12, 34)
     * $query->filterByInterceptCoefficients(array('min' => 12)); // WHERE intercept_coefficients > 12
     * </code>
     *
     * @param     mixed $interceptCoefficients The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInterceptCoefficients($interceptCoefficients = null, $comparison = null)
    {
        if (is_array($interceptCoefficients)) {
            $useMinMax = false;
            if (isset($interceptCoefficients['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS, $interceptCoefficients['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interceptCoefficients['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS, $interceptCoefficients['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS, $interceptCoefficients, $comparison);
    }

    /**
     * Filter the query on the intercept_standard_error column
     *
     * Example usage:
     * <code>
     * $query->filterByInterceptStandardError(1234); // WHERE intercept_standard_error = 1234
     * $query->filterByInterceptStandardError(array(12, 34)); // WHERE intercept_standard_error IN (12, 34)
     * $query->filterByInterceptStandardError(array('min' => 12)); // WHERE intercept_standard_error > 12
     * </code>
     *
     * @param     mixed $interceptStandardError The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInterceptStandardError($interceptStandardError = null, $comparison = null)
    {
        if (is_array($interceptStandardError)) {
            $useMinMax = false;
            if (isset($interceptStandardError['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR, $interceptStandardError['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interceptStandardError['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR, $interceptStandardError['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR, $interceptStandardError, $comparison);
    }

    /**
     * Filter the query on the intercept_t_stat column
     *
     * Example usage:
     * <code>
     * $query->filterByInterceptTStat(1234); // WHERE intercept_t_stat = 1234
     * $query->filterByInterceptTStat(array(12, 34)); // WHERE intercept_t_stat IN (12, 34)
     * $query->filterByInterceptTStat(array('min' => 12)); // WHERE intercept_t_stat > 12
     * </code>
     *
     * @param     mixed $interceptTStat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInterceptTStat($interceptTStat = null, $comparison = null)
    {
        if (is_array($interceptTStat)) {
            $useMinMax = false;
            if (isset($interceptTStat['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT, $interceptTStat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interceptTStat['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT, $interceptTStat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT, $interceptTStat, $comparison);
    }

    /**
     * Filter the query on the intercept_p_value column
     *
     * Example usage:
     * <code>
     * $query->filterByInterceptPValue(1234); // WHERE intercept_p_value = 1234
     * $query->filterByInterceptPValue(array(12, 34)); // WHERE intercept_p_value IN (12, 34)
     * $query->filterByInterceptPValue(array('min' => 12)); // WHERE intercept_p_value > 12
     * </code>
     *
     * @param     mixed $interceptPValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInterceptPValue($interceptPValue = null, $comparison = null)
    {
        if (is_array($interceptPValue)) {
            $useMinMax = false;
            if (isset($interceptPValue['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE, $interceptPValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interceptPValue['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE, $interceptPValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE, $interceptPValue, $comparison);
    }

    /**
     * Filter the query on the intercept_lower column
     *
     * Example usage:
     * <code>
     * $query->filterByInterceptLower(1234); // WHERE intercept_lower = 1234
     * $query->filterByInterceptLower(array(12, 34)); // WHERE intercept_lower IN (12, 34)
     * $query->filterByInterceptLower(array('min' => 12)); // WHERE intercept_lower > 12
     * </code>
     *
     * @param     mixed $interceptLower The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInterceptLower($interceptLower = null, $comparison = null)
    {
        if (is_array($interceptLower)) {
            $useMinMax = false;
            if (isset($interceptLower['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER, $interceptLower['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interceptLower['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER, $interceptLower['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER, $interceptLower, $comparison);
    }

    /**
     * Filter the query on the intercept_upper column
     *
     * Example usage:
     * <code>
     * $query->filterByInterceptUpper(1234); // WHERE intercept_upper = 1234
     * $query->filterByInterceptUpper(array(12, 34)); // WHERE intercept_upper IN (12, 34)
     * $query->filterByInterceptUpper(array('min' => 12)); // WHERE intercept_upper > 12
     * </code>
     *
     * @param     mixed $interceptUpper The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByInterceptUpper($interceptUpper = null, $comparison = null)
    {
        if (is_array($interceptUpper)) {
            $useMinMax = false;
            if (isset($interceptUpper['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER, $interceptUpper['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interceptUpper['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER, $interceptUpper['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER, $interceptUpper, $comparison);
    }

    /**
     * Filter the query on the hh_size_coefficients column
     *
     * Example usage:
     * <code>
     * $query->filterByHhSizeCoefficients(1234); // WHERE hh_size_coefficients = 1234
     * $query->filterByHhSizeCoefficients(array(12, 34)); // WHERE hh_size_coefficients IN (12, 34)
     * $query->filterByHhSizeCoefficients(array('min' => 12)); // WHERE hh_size_coefficients > 12
     * </code>
     *
     * @param     mixed $hhSizeCoefficients The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByHhSizeCoefficients($hhSizeCoefficients = null, $comparison = null)
    {
        if (is_array($hhSizeCoefficients)) {
            $useMinMax = false;
            if (isset($hhSizeCoefficients['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS, $hhSizeCoefficients['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hhSizeCoefficients['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS, $hhSizeCoefficients['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS, $hhSizeCoefficients, $comparison);
    }

    /**
     * Filter the query on the hh_size_standard_error column
     *
     * Example usage:
     * <code>
     * $query->filterByHhSizeStandardError(1234); // WHERE hh_size_standard_error = 1234
     * $query->filterByHhSizeStandardError(array(12, 34)); // WHERE hh_size_standard_error IN (12, 34)
     * $query->filterByHhSizeStandardError(array('min' => 12)); // WHERE hh_size_standard_error > 12
     * </code>
     *
     * @param     mixed $hhSizeStandardError The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByHhSizeStandardError($hhSizeStandardError = null, $comparison = null)
    {
        if (is_array($hhSizeStandardError)) {
            $useMinMax = false;
            if (isset($hhSizeStandardError['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR, $hhSizeStandardError['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hhSizeStandardError['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR, $hhSizeStandardError['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR, $hhSizeStandardError, $comparison);
    }

    /**
     * Filter the query on the hh_size_t_stat column
     *
     * Example usage:
     * <code>
     * $query->filterByHhSizeTStat(1234); // WHERE hh_size_t_stat = 1234
     * $query->filterByHhSizeTStat(array(12, 34)); // WHERE hh_size_t_stat IN (12, 34)
     * $query->filterByHhSizeTStat(array('min' => 12)); // WHERE hh_size_t_stat > 12
     * </code>
     *
     * @param     mixed $hhSizeTStat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByHhSizeTStat($hhSizeTStat = null, $comparison = null)
    {
        if (is_array($hhSizeTStat)) {
            $useMinMax = false;
            if (isset($hhSizeTStat['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT, $hhSizeTStat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hhSizeTStat['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT, $hhSizeTStat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT, $hhSizeTStat, $comparison);
    }

    /**
     * Filter the query on the hh_size_p_value column
     *
     * Example usage:
     * <code>
     * $query->filterByHhSizePValue(1234); // WHERE hh_size_p_value = 1234
     * $query->filterByHhSizePValue(array(12, 34)); // WHERE hh_size_p_value IN (12, 34)
     * $query->filterByHhSizePValue(array('min' => 12)); // WHERE hh_size_p_value > 12
     * </code>
     *
     * @param     mixed $hhSizePValue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByHhSizePValue($hhSizePValue = null, $comparison = null)
    {
        if (is_array($hhSizePValue)) {
            $useMinMax = false;
            if (isset($hhSizePValue['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE, $hhSizePValue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hhSizePValue['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE, $hhSizePValue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE, $hhSizePValue, $comparison);
    }

    /**
     * Filter the query on the hh_size_lower column
     *
     * Example usage:
     * <code>
     * $query->filterByHhSizeLower(1234); // WHERE hh_size_lower = 1234
     * $query->filterByHhSizeLower(array(12, 34)); // WHERE hh_size_lower IN (12, 34)
     * $query->filterByHhSizeLower(array('min' => 12)); // WHERE hh_size_lower > 12
     * </code>
     *
     * @param     mixed $hhSizeLower The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByHhSizeLower($hhSizeLower = null, $comparison = null)
    {
        if (is_array($hhSizeLower)) {
            $useMinMax = false;
            if (isset($hhSizeLower['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER, $hhSizeLower['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hhSizeLower['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER, $hhSizeLower['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER, $hhSizeLower, $comparison);
    }

    /**
     * Filter the query on the hh_size_upper column
     *
     * Example usage:
     * <code>
     * $query->filterByHhSizeUpper(1234); // WHERE hh_size_upper = 1234
     * $query->filterByHhSizeUpper(array(12, 34)); // WHERE hh_size_upper IN (12, 34)
     * $query->filterByHhSizeUpper(array('min' => 12)); // WHERE hh_size_upper > 12
     * </code>
     *
     * @param     mixed $hhSizeUpper The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByHhSizeUpper($hhSizeUpper = null, $comparison = null)
    {
        if (is_array($hhSizeUpper)) {
            $useMinMax = false;
            if (isset($hhSizeUpper['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER, $hhSizeUpper['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hhSizeUpper['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER, $hhSizeUpper['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER, $hhSizeUpper, $comparison);
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
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(AnalyzeRegressionTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeRegressionTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAnalyzeRegression $analyzeRegression Object to remove from the list of results
     *
     * @return $this|ChildAnalyzeRegressionQuery The current query, for fluid interface
     */
    public function prune($analyzeRegression = null)
    {
        if ($analyzeRegression) {
            $this->addUsingAlias(AnalyzeRegressionTableMap::COL_ID, $analyzeRegression->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the analyze_regression table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnalyzeRegressionTableMap::clearInstancePool();
            AnalyzeRegressionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AnalyzeRegressionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AnalyzeRegressionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AnalyzeRegressionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AnalyzeRegressionQuery
