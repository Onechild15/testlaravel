<?php

/*
|--------------------------------------------------------------------------
| DB2 Config
|--------------------------------------------------------------------------
Valeurs définies pour le niveau d'isolation, pour PDO (mot clé "CMT" ou "CommitMode" dans le DSN) :
0 = Commit immediate (*NONE)
1 = Read committed (*CS)
2 = Read uncommitted (*CHG)
3 = Repeatable read (*ALL)
4 = Serializable (*RR)

* naming:
0 = "sql" (as in schema.table)
1 = "system" (as in schema/table)

* dateFormat:
0 = yy/dd (*JUL)
1 = mm/dd/yy (*MDY)
2 = dd/mm/yy (*DMY)
3 = yy/mm/dd (*YMD)
4 = mm/dd/yyyy (*USA)
5 = yyyy-mm-dd (*ISO)
6 = dd.mm.yyyy (*EUR)
7 = yyyy-mm-dd (*JIS)

* dateSeperator:
0 = "/" (forward slash)
1 = "-" (dash)
2 = "." (period)
3 = "," (comma)
4 = " " (blank)

* decimal:
0 = "." (period)
1 = "," (comma)

* timeFormat:
0 = hh:mm:ss (*HMS)
1 = hh:mm AM/PM (*USA)
2 = hh.mm.ss (*ISO)
3 = hh.mm.ss (*EUR)
4 = hh:mm:ss (*JIS)

* timeSeparator:
0 = ":" (colon)
1 = "." (period)
2 = "," (comma)
3 = " " (blank)

* PDO::ATTR_CASE:
PDO::CASE_LOWER
PDO::CASE_UPPER
PDO::CASE_NATURAL

* PDO::I5_ATTR_DBC_SYS_NAMING
true
false

* PDO::I5_ATTR_COMMIT
PDO::I5_TXN_READ_COMMITTED
PDO::I5_TXN_READ_UNCOMMITTED
PDO::I5_TXN_REPEATABLE_READ
PDO::I5_TXN_SERIALIZABLE
PDO::I5_TXN_NO_COMMIT

* PDO::I5_ATTR_DBC_LIBL
,
* PDO::I5_ATTR_DBC_CURLIB,

*/

return [

    'connections' => [

        'ibmi' => [
            'driver' => 'pdo',
			//'driver' => 'iSeriesDSN',
			//'driver' => 'odbc:iSeriesDSN',
            // or 'db2_ibmi_ibm' / 'db2_zos_odbc' / 'db2_expressc_odbc
            //'driverName' => '{iSeries Access ODBC Driver}',
			'driverName' => 'iSeriesDSN',
            // or '{iSeries Access ODBC Driver}' '{IBM i Access ODBC Driver 64-bit}'
            //'host' => '5.5.1.5',
			'host' => 'odbc:iSeriesDSN',
            'username' => 'khairul',
            'password' => 'khairul',
            'database' => 'DV@CABLIB',
            'prefix' => '',
            'schema' => 'DV@CABLIB',
            //'port' => 50000,
			'port' => 8471,
            'date_format' => 'Y-m-d H:i:s',
            
            'options' => [
                PDO::ATTR_CASE => PDO::CASE_LOWER,
                PDO::ATTR_PERSISTENT => false
            ]
            + (defined('PDO::I5_ATTR_DBC_SYS_NAMING') ? [PDO::I5_ATTI5_ATTR_DBC_SYS_NAMINGR_COMMIT => false] : [])
            + (defined('PDO::I5_ATTR_COMMIT') ? [PDO::I5_ATTR_COMMIT => PDO::I5_TXN_NO_COMMIT] : [])
            + (defined('PDO::I5_ATTR_JOB_SORT') ? [PDO::I5_ATTR_JOB_SORT => false] : [])
            + (defined('PDO::I5_ATTR_DBC_LIBL') ? [PDO::I5_ATTR_DBC_LIBL => ''] : [])
            + (defined('PDO::I5_ATTR_DBC_CURLIB') ? [PDO::I5_ATTR_DBC_CURLIB => ''] : [])
        ],

    ],

];
