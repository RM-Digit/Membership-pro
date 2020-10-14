<?php

namespace Map;

use \AnalyzeRegressionOutputs;
use \AnalyzeRegressionOutputsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'analyze_regression_outputs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AnalyzeRegressionOutputsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AnalyzeRegressionOutputsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'analyze_regression_outputs';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AnalyzeRegressionOutputs';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AnalyzeRegressionOutputs';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 31;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 31;

    /**
     * the column name for the id field
     */
    const COL_ID = 'analyze_regression_outputs.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'analyze_regression_outputs.project_id';

    /**
     * the column name for the multiple_r field
     */
    const COL_MULTIPLE_R = 'analyze_regression_outputs.multiple_r';

    /**
     * the column name for the r_square field
     */
    const COL_R_SQUARE = 'analyze_regression_outputs.r_square';

    /**
     * the column name for the adjusted_r_square field
     */
    const COL_ADJUSTED_R_SQUARE = 'analyze_regression_outputs.adjusted_r_square';

    /**
     * the column name for the standard_error field
     */
    const COL_STANDARD_ERROR = 'analyze_regression_outputs.standard_error';

    /**
     * the column name for the observations field
     */
    const COL_OBSERVATIONS = 'analyze_regression_outputs.observations';

    /**
     * the column name for the regression_df field
     */
    const COL_REGRESSION_DF = 'analyze_regression_outputs.regression_df';

    /**
     * the column name for the regression_ss field
     */
    const COL_REGRESSION_SS = 'analyze_regression_outputs.regression_ss';

    /**
     * the column name for the regression_ms field
     */
    const COL_REGRESSION_MS = 'analyze_regression_outputs.regression_ms';

    /**
     * the column name for the regression_f field
     */
    const COL_REGRESSION_F = 'analyze_regression_outputs.regression_f';

    /**
     * the column name for the regression_f_significance field
     */
    const COL_REGRESSION_F_SIGNIFICANCE = 'analyze_regression_outputs.regression_f_significance';

    /**
     * the column name for the residual_df field
     */
    const COL_RESIDUAL_DF = 'analyze_regression_outputs.residual_df';

    /**
     * the column name for the residual_ss field
     */
    const COL_RESIDUAL_SS = 'analyze_regression_outputs.residual_ss';

    /**
     * the column name for the residual_ms field
     */
    const COL_RESIDUAL_MS = 'analyze_regression_outputs.residual_ms';

    /**
     * the column name for the total_df field
     */
    const COL_TOTAL_DF = 'analyze_regression_outputs.total_df';

    /**
     * the column name for the total_ss field
     */
    const COL_TOTAL_SS = 'analyze_regression_outputs.total_ss';

    /**
     * the column name for the intercept_coefficients field
     */
    const COL_INTERCEPT_COEFFICIENTS = 'analyze_regression_outputs.intercept_coefficients';

    /**
     * the column name for the intercept_standard_error field
     */
    const COL_INTERCEPT_STANDARD_ERROR = 'analyze_regression_outputs.intercept_standard_error';

    /**
     * the column name for the intercept_t_stat field
     */
    const COL_INTERCEPT_T_STAT = 'analyze_regression_outputs.intercept_t_stat';

    /**
     * the column name for the intercept_p_value field
     */
    const COL_INTERCEPT_P_VALUE = 'analyze_regression_outputs.intercept_p_value';

    /**
     * the column name for the intercept_lower field
     */
    const COL_INTERCEPT_LOWER = 'analyze_regression_outputs.intercept_lower';

    /**
     * the column name for the intercept_upper field
     */
    const COL_INTERCEPT_UPPER = 'analyze_regression_outputs.intercept_upper';

    /**
     * the column name for the hh_size_coefficients field
     */
    const COL_HH_SIZE_COEFFICIENTS = 'analyze_regression_outputs.hh_size_coefficients';

    /**
     * the column name for the hh_size_standard_error field
     */
    const COL_HH_SIZE_STANDARD_ERROR = 'analyze_regression_outputs.hh_size_standard_error';

    /**
     * the column name for the hh_size_t_stat field
     */
    const COL_HH_SIZE_T_STAT = 'analyze_regression_outputs.hh_size_t_stat';

    /**
     * the column name for the hh_size_p_value field
     */
    const COL_HH_SIZE_P_VALUE = 'analyze_regression_outputs.hh_size_p_value';

    /**
     * the column name for the hh_size_lower field
     */
    const COL_HH_SIZE_LOWER = 'analyze_regression_outputs.hh_size_lower';

    /**
     * the column name for the hh_size_upper field
     */
    const COL_HH_SIZE_UPPER = 'analyze_regression_outputs.hh_size_upper';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'analyze_regression_outputs.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'analyze_regression_outputs.last_updated';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'MultipleR', 'RSquare', 'AdjustedRSquare', 'StandardError', 'Observations', 'RegressionDf', 'RegressionSs', 'RegressionMs', 'RegressionF', 'RegressionFSignificance', 'ResidualDf', 'ResidualSs', 'ResidualMs', 'TotalDf', 'TotalSs', 'InterceptCoefficients', 'InterceptStandardError', 'InterceptTStat', 'InterceptPValue', 'InterceptLower', 'InterceptUpper', 'HhSizeCoefficients', 'HhSizeStandardError', 'HhSizeTStat', 'HhSizePValue', 'HhSizeLower', 'HhSizeUpper', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'multipleR', 'rSquare', 'adjustedRSquare', 'standardError', 'observations', 'regressionDf', 'regressionSs', 'regressionMs', 'regressionF', 'regressionFSignificance', 'residualDf', 'residualSs', 'residualMs', 'totalDf', 'totalSs', 'interceptCoefficients', 'interceptStandardError', 'interceptTStat', 'interceptPValue', 'interceptLower', 'interceptUpper', 'hhSizeCoefficients', 'hhSizeStandardError', 'hhSizeTStat', 'hhSizePValue', 'hhSizeLower', 'hhSizeUpper', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(AnalyzeRegressionOutputsTableMap::COL_ID, AnalyzeRegressionOutputsTableMap::COL_PROJECT_ID, AnalyzeRegressionOutputsTableMap::COL_MULTIPLE_R, AnalyzeRegressionOutputsTableMap::COL_R_SQUARE, AnalyzeRegressionOutputsTableMap::COL_ADJUSTED_R_SQUARE, AnalyzeRegressionOutputsTableMap::COL_STANDARD_ERROR, AnalyzeRegressionOutputsTableMap::COL_OBSERVATIONS, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_DF, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_SS, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_MS, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_F, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_F_SIGNIFICANCE, AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_DF, AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_SS, AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_MS, AnalyzeRegressionOutputsTableMap::COL_TOTAL_DF, AnalyzeRegressionOutputsTableMap::COL_TOTAL_SS, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_COEFFICIENTS, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_STANDARD_ERROR, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_T_STAT, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_P_VALUE, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_LOWER, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_UPPER, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_COEFFICIENTS, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_STANDARD_ERROR, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_T_STAT, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_P_VALUE, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_LOWER, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_UPPER, AnalyzeRegressionOutputsTableMap::COL_DATE_TIME_CREATED, AnalyzeRegressionOutputsTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'multiple_r', 'r_square', 'adjusted_r_square', 'standard_error', 'observations', 'regression_df', 'regression_ss', 'regression_ms', 'regression_f', 'regression_f_significance', 'residual_df', 'residual_ss', 'residual_ms', 'total_df', 'total_ss', 'intercept_coefficients', 'intercept_standard_error', 'intercept_t_stat', 'intercept_p_value', 'intercept_lower', 'intercept_upper', 'hh_size_coefficients', 'hh_size_standard_error', 'hh_size_t_stat', 'hh_size_p_value', 'hh_size_lower', 'hh_size_upper', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'MultipleR' => 2, 'RSquare' => 3, 'AdjustedRSquare' => 4, 'StandardError' => 5, 'Observations' => 6, 'RegressionDf' => 7, 'RegressionSs' => 8, 'RegressionMs' => 9, 'RegressionF' => 10, 'RegressionFSignificance' => 11, 'ResidualDf' => 12, 'ResidualSs' => 13, 'ResidualMs' => 14, 'TotalDf' => 15, 'TotalSs' => 16, 'InterceptCoefficients' => 17, 'InterceptStandardError' => 18, 'InterceptTStat' => 19, 'InterceptPValue' => 20, 'InterceptLower' => 21, 'InterceptUpper' => 22, 'HhSizeCoefficients' => 23, 'HhSizeStandardError' => 24, 'HhSizeTStat' => 25, 'HhSizePValue' => 26, 'HhSizeLower' => 27, 'HhSizeUpper' => 28, 'DateTimeCreated' => 29, 'LastUpdated' => 30, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'multipleR' => 2, 'rSquare' => 3, 'adjustedRSquare' => 4, 'standardError' => 5, 'observations' => 6, 'regressionDf' => 7, 'regressionSs' => 8, 'regressionMs' => 9, 'regressionF' => 10, 'regressionFSignificance' => 11, 'residualDf' => 12, 'residualSs' => 13, 'residualMs' => 14, 'totalDf' => 15, 'totalSs' => 16, 'interceptCoefficients' => 17, 'interceptStandardError' => 18, 'interceptTStat' => 19, 'interceptPValue' => 20, 'interceptLower' => 21, 'interceptUpper' => 22, 'hhSizeCoefficients' => 23, 'hhSizeStandardError' => 24, 'hhSizeTStat' => 25, 'hhSizePValue' => 26, 'hhSizeLower' => 27, 'hhSizeUpper' => 28, 'dateTimeCreated' => 29, 'lastUpdated' => 30, ),
        self::TYPE_COLNAME       => array(AnalyzeRegressionOutputsTableMap::COL_ID => 0, AnalyzeRegressionOutputsTableMap::COL_PROJECT_ID => 1, AnalyzeRegressionOutputsTableMap::COL_MULTIPLE_R => 2, AnalyzeRegressionOutputsTableMap::COL_R_SQUARE => 3, AnalyzeRegressionOutputsTableMap::COL_ADJUSTED_R_SQUARE => 4, AnalyzeRegressionOutputsTableMap::COL_STANDARD_ERROR => 5, AnalyzeRegressionOutputsTableMap::COL_OBSERVATIONS => 6, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_DF => 7, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_SS => 8, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_MS => 9, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_F => 10, AnalyzeRegressionOutputsTableMap::COL_REGRESSION_F_SIGNIFICANCE => 11, AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_DF => 12, AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_SS => 13, AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_MS => 14, AnalyzeRegressionOutputsTableMap::COL_TOTAL_DF => 15, AnalyzeRegressionOutputsTableMap::COL_TOTAL_SS => 16, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_COEFFICIENTS => 17, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_STANDARD_ERROR => 18, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_T_STAT => 19, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_P_VALUE => 20, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_LOWER => 21, AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_UPPER => 22, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_COEFFICIENTS => 23, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_STANDARD_ERROR => 24, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_T_STAT => 25, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_P_VALUE => 26, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_LOWER => 27, AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_UPPER => 28, AnalyzeRegressionOutputsTableMap::COL_DATE_TIME_CREATED => 29, AnalyzeRegressionOutputsTableMap::COL_LAST_UPDATED => 30, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'multiple_r' => 2, 'r_square' => 3, 'adjusted_r_square' => 4, 'standard_error' => 5, 'observations' => 6, 'regression_df' => 7, 'regression_ss' => 8, 'regression_ms' => 9, 'regression_f' => 10, 'regression_f_significance' => 11, 'residual_df' => 12, 'residual_ss' => 13, 'residual_ms' => 14, 'total_df' => 15, 'total_ss' => 16, 'intercept_coefficients' => 17, 'intercept_standard_error' => 18, 'intercept_t_stat' => 19, 'intercept_p_value' => 20, 'intercept_lower' => 21, 'intercept_upper' => 22, 'hh_size_coefficients' => 23, 'hh_size_standard_error' => 24, 'hh_size_t_stat' => 25, 'hh_size_p_value' => 26, 'hh_size_lower' => 27, 'hh_size_upper' => 28, 'date_time_created' => 29, 'last_updated' => 30, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('analyze_regression_outputs');
        $this->setPhpName('AnalyzeRegressionOutputs');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AnalyzeRegressionOutputs');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('project_id', 'ProjectId', 'INTEGER', true, null, null);
        $this->addColumn('multiple_r', 'MultipleR', 'DOUBLE', true, null, null);
        $this->addColumn('r_square', 'RSquare', 'DOUBLE', true, null, null);
        $this->addColumn('adjusted_r_square', 'AdjustedRSquare', 'DOUBLE', true, null, null);
        $this->addColumn('standard_error', 'StandardError', 'DOUBLE', true, null, null);
        $this->addColumn('observations', 'Observations', 'INTEGER', true, null, null);
        $this->addColumn('regression_df', 'RegressionDf', 'DOUBLE', true, null, null);
        $this->addColumn('regression_ss', 'RegressionSs', 'DOUBLE', true, null, null);
        $this->addColumn('regression_ms', 'RegressionMs', 'DOUBLE', true, null, null);
        $this->addColumn('regression_f', 'RegressionF', 'DOUBLE', true, null, null);
        $this->addColumn('regression_f_significance', 'RegressionFSignificance', 'DOUBLE', true, null, null);
        $this->addColumn('residual_df', 'ResidualDf', 'DOUBLE', true, null, null);
        $this->addColumn('residual_ss', 'ResidualSs', 'DOUBLE', true, null, null);
        $this->addColumn('residual_ms', 'ResidualMs', 'DOUBLE', true, null, null);
        $this->addColumn('total_df', 'TotalDf', 'DOUBLE', true, null, null);
        $this->addColumn('total_ss', 'TotalSs', 'DOUBLE', true, null, null);
        $this->addColumn('intercept_coefficients', 'InterceptCoefficients', 'DOUBLE', true, null, null);
        $this->addColumn('intercept_standard_error', 'InterceptStandardError', 'DOUBLE', true, null, null);
        $this->addColumn('intercept_t_stat', 'InterceptTStat', 'DOUBLE', true, null, null);
        $this->addColumn('intercept_p_value', 'InterceptPValue', 'DOUBLE', true, null, null);
        $this->addColumn('intercept_lower', 'InterceptLower', 'DOUBLE', true, null, null);
        $this->addColumn('intercept_upper', 'InterceptUpper', 'DOUBLE', true, null, null);
        $this->addColumn('hh_size_coefficients', 'HhSizeCoefficients', 'DOUBLE', true, null, null);
        $this->addColumn('hh_size_standard_error', 'HhSizeStandardError', 'DOUBLE', true, null, null);
        $this->addColumn('hh_size_t_stat', 'HhSizeTStat', 'DOUBLE', true, null, null);
        $this->addColumn('hh_size_p_value', 'HhSizePValue', 'DOUBLE', true, null, null);
        $this->addColumn('hh_size_lower', 'HhSizeLower', 'DOUBLE', true, null, null);
        $this->addColumn('hh_size_upper', 'HhSizeUpper', 'DOUBLE', true, null, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? AnalyzeRegressionOutputsTableMap::CLASS_DEFAULT : AnalyzeRegressionOutputsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (AnalyzeRegressionOutputs object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AnalyzeRegressionOutputsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AnalyzeRegressionOutputsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AnalyzeRegressionOutputsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnalyzeRegressionOutputsTableMap::OM_CLASS;
            /** @var AnalyzeRegressionOutputs $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AnalyzeRegressionOutputsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AnalyzeRegressionOutputsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AnalyzeRegressionOutputsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AnalyzeRegressionOutputs $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnalyzeRegressionOutputsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_ID);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_MULTIPLE_R);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_R_SQUARE);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_ADJUSTED_R_SQUARE);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_STANDARD_ERROR);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_OBSERVATIONS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_REGRESSION_DF);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_REGRESSION_SS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_REGRESSION_MS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_REGRESSION_F);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_REGRESSION_F_SIGNIFICANCE);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_DF);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_SS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_RESIDUAL_MS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_TOTAL_DF);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_TOTAL_SS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_COEFFICIENTS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_STANDARD_ERROR);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_T_STAT);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_P_VALUE);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_LOWER);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_INTERCEPT_UPPER);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_COEFFICIENTS);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_STANDARD_ERROR);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_T_STAT);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_P_VALUE);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_LOWER);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_HH_SIZE_UPPER);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(AnalyzeRegressionOutputsTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.multiple_r');
            $criteria->addSelectColumn($alias . '.r_square');
            $criteria->addSelectColumn($alias . '.adjusted_r_square');
            $criteria->addSelectColumn($alias . '.standard_error');
            $criteria->addSelectColumn($alias . '.observations');
            $criteria->addSelectColumn($alias . '.regression_df');
            $criteria->addSelectColumn($alias . '.regression_ss');
            $criteria->addSelectColumn($alias . '.regression_ms');
            $criteria->addSelectColumn($alias . '.regression_f');
            $criteria->addSelectColumn($alias . '.regression_f_significance');
            $criteria->addSelectColumn($alias . '.residual_df');
            $criteria->addSelectColumn($alias . '.residual_ss');
            $criteria->addSelectColumn($alias . '.residual_ms');
            $criteria->addSelectColumn($alias . '.total_df');
            $criteria->addSelectColumn($alias . '.total_ss');
            $criteria->addSelectColumn($alias . '.intercept_coefficients');
            $criteria->addSelectColumn($alias . '.intercept_standard_error');
            $criteria->addSelectColumn($alias . '.intercept_t_stat');
            $criteria->addSelectColumn($alias . '.intercept_p_value');
            $criteria->addSelectColumn($alias . '.intercept_lower');
            $criteria->addSelectColumn($alias . '.intercept_upper');
            $criteria->addSelectColumn($alias . '.hh_size_coefficients');
            $criteria->addSelectColumn($alias . '.hh_size_standard_error');
            $criteria->addSelectColumn($alias . '.hh_size_t_stat');
            $criteria->addSelectColumn($alias . '.hh_size_p_value');
            $criteria->addSelectColumn($alias . '.hh_size_lower');
            $criteria->addSelectColumn($alias . '.hh_size_upper');
            $criteria->addSelectColumn($alias . '.date_time_created');
            $criteria->addSelectColumn($alias . '.last_updated');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(AnalyzeRegressionOutputsTableMap::DATABASE_NAME)->getTable(AnalyzeRegressionOutputsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AnalyzeRegressionOutputsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AnalyzeRegressionOutputsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AnalyzeRegressionOutputsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AnalyzeRegressionOutputs or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AnalyzeRegressionOutputs object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionOutputsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AnalyzeRegressionOutputs) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnalyzeRegressionOutputsTableMap::DATABASE_NAME);
            $criteria->add(AnalyzeRegressionOutputsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AnalyzeRegressionOutputsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AnalyzeRegressionOutputsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AnalyzeRegressionOutputsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the analyze_regression_outputs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AnalyzeRegressionOutputsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AnalyzeRegressionOutputs or Criteria object.
     *
     * @param mixed               $criteria Criteria or AnalyzeRegressionOutputs object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionOutputsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AnalyzeRegressionOutputs object
        }

        if ($criteria->containsKey(AnalyzeRegressionOutputsTableMap::COL_ID) && $criteria->keyContainsValue(AnalyzeRegressionOutputsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AnalyzeRegressionOutputsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AnalyzeRegressionOutputsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AnalyzeRegressionOutputsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AnalyzeRegressionOutputsTableMap::buildTableMap();
