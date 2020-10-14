<?php

namespace Map;

use \AnalyzeRegression;
use \AnalyzeRegressionQuery;
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
 * This class defines the structure of the 'analyze_regression' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AnalyzeRegressionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AnalyzeRegressionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'analyze_regression';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AnalyzeRegression';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AnalyzeRegression';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 34;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 34;

    /**
     * the column name for the id field
     */
    const COL_ID = 'analyze_regression.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'analyze_regression.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'analyze_regression.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'analyze_regression.phase_component_id';

    /**
     * the column name for the input field
     */
    const COL_INPUT = 'analyze_regression.input';

    /**
     * the column name for the multiple_r field
     */
    const COL_MULTIPLE_R = 'analyze_regression.multiple_r';

    /**
     * the column name for the r_square field
     */
    const COL_R_SQUARE = 'analyze_regression.r_square';

    /**
     * the column name for the adjusted_r_square field
     */
    const COL_ADJUSTED_R_SQUARE = 'analyze_regression.adjusted_r_square';

    /**
     * the column name for the standard_error field
     */
    const COL_STANDARD_ERROR = 'analyze_regression.standard_error';

    /**
     * the column name for the observations field
     */
    const COL_OBSERVATIONS = 'analyze_regression.observations';

    /**
     * the column name for the regression_df field
     */
    const COL_REGRESSION_DF = 'analyze_regression.regression_df';

    /**
     * the column name for the regression_ss field
     */
    const COL_REGRESSION_SS = 'analyze_regression.regression_ss';

    /**
     * the column name for the regression_ms field
     */
    const COL_REGRESSION_MS = 'analyze_regression.regression_ms';

    /**
     * the column name for the regression_f field
     */
    const COL_REGRESSION_F = 'analyze_regression.regression_f';

    /**
     * the column name for the regression_f_significance field
     */
    const COL_REGRESSION_F_SIGNIFICANCE = 'analyze_regression.regression_f_significance';

    /**
     * the column name for the residual_df field
     */
    const COL_RESIDUAL_DF = 'analyze_regression.residual_df';

    /**
     * the column name for the residual_ss field
     */
    const COL_RESIDUAL_SS = 'analyze_regression.residual_ss';

    /**
     * the column name for the residual_ms field
     */
    const COL_RESIDUAL_MS = 'analyze_regression.residual_ms';

    /**
     * the column name for the total_df field
     */
    const COL_TOTAL_DF = 'analyze_regression.total_df';

    /**
     * the column name for the total_ss field
     */
    const COL_TOTAL_SS = 'analyze_regression.total_ss';

    /**
     * the column name for the intercept_coefficients field
     */
    const COL_INTERCEPT_COEFFICIENTS = 'analyze_regression.intercept_coefficients';

    /**
     * the column name for the intercept_standard_error field
     */
    const COL_INTERCEPT_STANDARD_ERROR = 'analyze_regression.intercept_standard_error';

    /**
     * the column name for the intercept_t_stat field
     */
    const COL_INTERCEPT_T_STAT = 'analyze_regression.intercept_t_stat';

    /**
     * the column name for the intercept_p_value field
     */
    const COL_INTERCEPT_P_VALUE = 'analyze_regression.intercept_p_value';

    /**
     * the column name for the intercept_lower field
     */
    const COL_INTERCEPT_LOWER = 'analyze_regression.intercept_lower';

    /**
     * the column name for the intercept_upper field
     */
    const COL_INTERCEPT_UPPER = 'analyze_regression.intercept_upper';

    /**
     * the column name for the hh_size_coefficients field
     */
    const COL_HH_SIZE_COEFFICIENTS = 'analyze_regression.hh_size_coefficients';

    /**
     * the column name for the hh_size_standard_error field
     */
    const COL_HH_SIZE_STANDARD_ERROR = 'analyze_regression.hh_size_standard_error';

    /**
     * the column name for the hh_size_t_stat field
     */
    const COL_HH_SIZE_T_STAT = 'analyze_regression.hh_size_t_stat';

    /**
     * the column name for the hh_size_p_value field
     */
    const COL_HH_SIZE_P_VALUE = 'analyze_regression.hh_size_p_value';

    /**
     * the column name for the hh_size_lower field
     */
    const COL_HH_SIZE_LOWER = 'analyze_regression.hh_size_lower';

    /**
     * the column name for the hh_size_upper field
     */
    const COL_HH_SIZE_UPPER = 'analyze_regression.hh_size_upper';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'analyze_regression.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'analyze_regression.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Input', 'MultipleR', 'RSquare', 'AdjustedRSquare', 'StandardError', 'Observations', 'RegressionDf', 'RegressionSs', 'RegressionMs', 'RegressionF', 'RegressionFSignificance', 'ResidualDf', 'ResidualSs', 'ResidualMs', 'TotalDf', 'TotalSs', 'InterceptCoefficients', 'InterceptStandardError', 'InterceptTStat', 'InterceptPValue', 'InterceptLower', 'InterceptUpper', 'HhSizeCoefficients', 'HhSizeStandardError', 'HhSizeTStat', 'HhSizePValue', 'HhSizeLower', 'HhSizeUpper', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'input', 'multipleR', 'rSquare', 'adjustedRSquare', 'standardError', 'observations', 'regressionDf', 'regressionSs', 'regressionMs', 'regressionF', 'regressionFSignificance', 'residualDf', 'residualSs', 'residualMs', 'totalDf', 'totalSs', 'interceptCoefficients', 'interceptStandardError', 'interceptTStat', 'interceptPValue', 'interceptLower', 'interceptUpper', 'hhSizeCoefficients', 'hhSizeStandardError', 'hhSizeTStat', 'hhSizePValue', 'hhSizeLower', 'hhSizeUpper', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(AnalyzeRegressionTableMap::COL_ID, AnalyzeRegressionTableMap::COL_PROJECT_ID, AnalyzeRegressionTableMap::COL_PHASE_ID, AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID, AnalyzeRegressionTableMap::COL_INPUT, AnalyzeRegressionTableMap::COL_MULTIPLE_R, AnalyzeRegressionTableMap::COL_R_SQUARE, AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE, AnalyzeRegressionTableMap::COL_STANDARD_ERROR, AnalyzeRegressionTableMap::COL_OBSERVATIONS, AnalyzeRegressionTableMap::COL_REGRESSION_DF, AnalyzeRegressionTableMap::COL_REGRESSION_SS, AnalyzeRegressionTableMap::COL_REGRESSION_MS, AnalyzeRegressionTableMap::COL_REGRESSION_F, AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE, AnalyzeRegressionTableMap::COL_RESIDUAL_DF, AnalyzeRegressionTableMap::COL_RESIDUAL_SS, AnalyzeRegressionTableMap::COL_RESIDUAL_MS, AnalyzeRegressionTableMap::COL_TOTAL_DF, AnalyzeRegressionTableMap::COL_TOTAL_SS, AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS, AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR, AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT, AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE, AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER, AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER, AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS, AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR, AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT, AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE, AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER, AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER, AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED, AnalyzeRegressionTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'input', 'multiple_r', 'r_square', 'adjusted_r_square', 'standard_error', 'observations', 'regression_df', 'regression_ss', 'regression_ms', 'regression_f', 'regression_f_significance', 'residual_df', 'residual_ss', 'residual_ms', 'total_df', 'total_ss', 'intercept_coefficients', 'intercept_standard_error', 'intercept_t_stat', 'intercept_p_value', 'intercept_lower', 'intercept_upper', 'hh_size_coefficients', 'hh_size_standard_error', 'hh_size_t_stat', 'hh_size_p_value', 'hh_size_lower', 'hh_size_upper', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Input' => 4, 'MultipleR' => 5, 'RSquare' => 6, 'AdjustedRSquare' => 7, 'StandardError' => 8, 'Observations' => 9, 'RegressionDf' => 10, 'RegressionSs' => 11, 'RegressionMs' => 12, 'RegressionF' => 13, 'RegressionFSignificance' => 14, 'ResidualDf' => 15, 'ResidualSs' => 16, 'ResidualMs' => 17, 'TotalDf' => 18, 'TotalSs' => 19, 'InterceptCoefficients' => 20, 'InterceptStandardError' => 21, 'InterceptTStat' => 22, 'InterceptPValue' => 23, 'InterceptLower' => 24, 'InterceptUpper' => 25, 'HhSizeCoefficients' => 26, 'HhSizeStandardError' => 27, 'HhSizeTStat' => 28, 'HhSizePValue' => 29, 'HhSizeLower' => 30, 'HhSizeUpper' => 31, 'DateTimeCreated' => 32, 'LastUpdated' => 33, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'input' => 4, 'multipleR' => 5, 'rSquare' => 6, 'adjustedRSquare' => 7, 'standardError' => 8, 'observations' => 9, 'regressionDf' => 10, 'regressionSs' => 11, 'regressionMs' => 12, 'regressionF' => 13, 'regressionFSignificance' => 14, 'residualDf' => 15, 'residualSs' => 16, 'residualMs' => 17, 'totalDf' => 18, 'totalSs' => 19, 'interceptCoefficients' => 20, 'interceptStandardError' => 21, 'interceptTStat' => 22, 'interceptPValue' => 23, 'interceptLower' => 24, 'interceptUpper' => 25, 'hhSizeCoefficients' => 26, 'hhSizeStandardError' => 27, 'hhSizeTStat' => 28, 'hhSizePValue' => 29, 'hhSizeLower' => 30, 'hhSizeUpper' => 31, 'dateTimeCreated' => 32, 'lastUpdated' => 33, ),
        self::TYPE_COLNAME       => array(AnalyzeRegressionTableMap::COL_ID => 0, AnalyzeRegressionTableMap::COL_PROJECT_ID => 1, AnalyzeRegressionTableMap::COL_PHASE_ID => 2, AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID => 3, AnalyzeRegressionTableMap::COL_INPUT => 4, AnalyzeRegressionTableMap::COL_MULTIPLE_R => 5, AnalyzeRegressionTableMap::COL_R_SQUARE => 6, AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE => 7, AnalyzeRegressionTableMap::COL_STANDARD_ERROR => 8, AnalyzeRegressionTableMap::COL_OBSERVATIONS => 9, AnalyzeRegressionTableMap::COL_REGRESSION_DF => 10, AnalyzeRegressionTableMap::COL_REGRESSION_SS => 11, AnalyzeRegressionTableMap::COL_REGRESSION_MS => 12, AnalyzeRegressionTableMap::COL_REGRESSION_F => 13, AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE => 14, AnalyzeRegressionTableMap::COL_RESIDUAL_DF => 15, AnalyzeRegressionTableMap::COL_RESIDUAL_SS => 16, AnalyzeRegressionTableMap::COL_RESIDUAL_MS => 17, AnalyzeRegressionTableMap::COL_TOTAL_DF => 18, AnalyzeRegressionTableMap::COL_TOTAL_SS => 19, AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS => 20, AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR => 21, AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT => 22, AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE => 23, AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER => 24, AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER => 25, AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS => 26, AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR => 27, AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT => 28, AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE => 29, AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER => 30, AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER => 31, AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED => 32, AnalyzeRegressionTableMap::COL_LAST_UPDATED => 33, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'input' => 4, 'multiple_r' => 5, 'r_square' => 6, 'adjusted_r_square' => 7, 'standard_error' => 8, 'observations' => 9, 'regression_df' => 10, 'regression_ss' => 11, 'regression_ms' => 12, 'regression_f' => 13, 'regression_f_significance' => 14, 'residual_df' => 15, 'residual_ss' => 16, 'residual_ms' => 17, 'total_df' => 18, 'total_ss' => 19, 'intercept_coefficients' => 20, 'intercept_standard_error' => 21, 'intercept_t_stat' => 22, 'intercept_p_value' => 23, 'intercept_lower' => 24, 'intercept_upper' => 25, 'hh_size_coefficients' => 26, 'hh_size_standard_error' => 27, 'hh_size_t_stat' => 28, 'hh_size_p_value' => 29, 'hh_size_lower' => 30, 'hh_size_upper' => 31, 'date_time_created' => 32, 'last_updated' => 33, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
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
        $this->setName('analyze_regression');
        $this->setPhpName('AnalyzeRegression');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\AnalyzeRegression');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('project_id', 'ProjectId', 'INTEGER', true, null, null);
        $this->addColumn('phase_id', 'PhaseId', 'INTEGER', true, null, null);
        $this->addColumn('phase_component_id', 'PhaseComponentId', 'INTEGER', true, null, null);
        $this->addColumn('input', 'Input', 'LONGVARCHAR', false, null, null);
        $this->addColumn('multiple_r', 'MultipleR', 'DOUBLE', false, null, null);
        $this->addColumn('r_square', 'RSquare', 'DOUBLE', false, null, null);
        $this->addColumn('adjusted_r_square', 'AdjustedRSquare', 'DOUBLE', false, null, null);
        $this->addColumn('standard_error', 'StandardError', 'DOUBLE', false, null, null);
        $this->addColumn('observations', 'Observations', 'INTEGER', false, null, null);
        $this->addColumn('regression_df', 'RegressionDf', 'DOUBLE', false, null, null);
        $this->addColumn('regression_ss', 'RegressionSs', 'DOUBLE', false, null, null);
        $this->addColumn('regression_ms', 'RegressionMs', 'DOUBLE', false, null, null);
        $this->addColumn('regression_f', 'RegressionF', 'DOUBLE', false, null, null);
        $this->addColumn('regression_f_significance', 'RegressionFSignificance', 'DOUBLE', false, null, null);
        $this->addColumn('residual_df', 'ResidualDf', 'DOUBLE', false, null, null);
        $this->addColumn('residual_ss', 'ResidualSs', 'DOUBLE', false, null, null);
        $this->addColumn('residual_ms', 'ResidualMs', 'DOUBLE', false, null, null);
        $this->addColumn('total_df', 'TotalDf', 'DOUBLE', false, null, null);
        $this->addColumn('total_ss', 'TotalSs', 'DOUBLE', false, null, null);
        $this->addColumn('intercept_coefficients', 'InterceptCoefficients', 'DOUBLE', false, null, null);
        $this->addColumn('intercept_standard_error', 'InterceptStandardError', 'DOUBLE', false, null, null);
        $this->addColumn('intercept_t_stat', 'InterceptTStat', 'DOUBLE', false, null, null);
        $this->addColumn('intercept_p_value', 'InterceptPValue', 'DOUBLE', false, null, null);
        $this->addColumn('intercept_lower', 'InterceptLower', 'DOUBLE', false, null, null);
        $this->addColumn('intercept_upper', 'InterceptUpper', 'DOUBLE', false, null, null);
        $this->addColumn('hh_size_coefficients', 'HhSizeCoefficients', 'DOUBLE', false, null, null);
        $this->addColumn('hh_size_standard_error', 'HhSizeStandardError', 'DOUBLE', false, null, null);
        $this->addColumn('hh_size_t_stat', 'HhSizeTStat', 'DOUBLE', false, null, null);
        $this->addColumn('hh_size_p_value', 'HhSizePValue', 'DOUBLE', false, null, null);
        $this->addColumn('hh_size_lower', 'HhSizeLower', 'DOUBLE', false, null, null);
        $this->addColumn('hh_size_upper', 'HhSizeUpper', 'DOUBLE', false, null, null);
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
        return $withPrefix ? AnalyzeRegressionTableMap::CLASS_DEFAULT : AnalyzeRegressionTableMap::OM_CLASS;
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
     * @return array           (AnalyzeRegression object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AnalyzeRegressionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AnalyzeRegressionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AnalyzeRegressionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnalyzeRegressionTableMap::OM_CLASS;
            /** @var AnalyzeRegression $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AnalyzeRegressionTableMap::addInstanceToPool($obj, $key);
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
            $key = AnalyzeRegressionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AnalyzeRegressionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AnalyzeRegression $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnalyzeRegressionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_ID);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INPUT);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_MULTIPLE_R);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_R_SQUARE);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_STANDARD_ERROR);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_OBSERVATIONS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_REGRESSION_DF);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_REGRESSION_SS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_REGRESSION_MS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_REGRESSION_F);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_RESIDUAL_DF);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_RESIDUAL_SS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_RESIDUAL_MS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_TOTAL_DF);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_TOTAL_SS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(AnalyzeRegressionTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.input');
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
        return Propel::getServiceContainer()->getDatabaseMap(AnalyzeRegressionTableMap::DATABASE_NAME)->getTable(AnalyzeRegressionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AnalyzeRegressionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AnalyzeRegressionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AnalyzeRegressionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AnalyzeRegression or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AnalyzeRegression object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AnalyzeRegression) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnalyzeRegressionTableMap::DATABASE_NAME);
            $criteria->add(AnalyzeRegressionTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AnalyzeRegressionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AnalyzeRegressionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AnalyzeRegressionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the analyze_regression table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AnalyzeRegressionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AnalyzeRegression or Criteria object.
     *
     * @param mixed               $criteria Criteria or AnalyzeRegression object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AnalyzeRegression object
        }

        if ($criteria->containsKey(AnalyzeRegressionTableMap::COL_ID) && $criteria->keyContainsValue(AnalyzeRegressionTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AnalyzeRegressionTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AnalyzeRegressionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AnalyzeRegressionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AnalyzeRegressionTableMap::buildTableMap();
