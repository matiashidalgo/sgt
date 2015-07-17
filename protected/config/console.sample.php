<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	// preloading 'log' component
	'preload'=>array('log'),

    'import'=>CMap::mergeArray(
        array()
        ,require(dirname(__FILE__).'/console/import.php')
    ),

    'modules'=>CMap::mergeArray(
        array()
        ,require(dirname(__FILE__).'/console/modules.php')
    ),

	// application components
	'components'=>CMap::mergeArray(
        array(

            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=sgt',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ),

            /*
            'cache'=>array(
                'class'=>'system.caching.CMemCache',
                'servers'=>array(
                    array('host'=>'server1', 'port'=>11211),
                    array('host'=>'server2', 'port'=>11211),
                ),
            ),
            'cache'=>array(
                //'class'=>'CDummyCache',
                'class'=>'CDbCache',
                'connectionID'=>'db'
            ),
            */
        )
        ,require(dirname(__FILE__).'/console/components.php')
    ),
),require(dirname(__FILE__).'/console/extra.php'));