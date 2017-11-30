<?php

require_once 'app/module.php';

new __MODULE('Helpers',    'modules/helpers.php',    array('Models','Views','Front','Controller'), array('all'), array('all') );
new __MODULE('Models',     'modules/models.php',     array('Controller','Helpers'),                array('all'), array('all') );
new __MODULE('Views',      'modules/views.php',      array('Controller','Helpers'),                array('all'), array('all') );
new __MODULE('Controller', 'modules/controller.php', array('Models','Views','Front','Helpers'),    array('all'), array('all') );
new __MODULE('Front',      'modules/front.php',      array('Controller','Helpers','__SCRIPT'),                array('all'), array('all') );

Front::init('__SCRIPT');
