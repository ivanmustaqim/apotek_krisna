<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session','pagination','cart');

$autoload['drivers'] = array();

$autoload['helper'] = array('form','url','html','file','download');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('m_user','modelapp','m_supplier','m_login','m_search','m_jenisobat','m_sales','m_laporan','Model_data');
