<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Autoload the DomPDF classes
require_once t3lib_extMgm::extPath($_EXTKEY) . 'vendor/autoload.php';
// Load the default configuration
require_once t3lib_extMgm::extPath($_EXTKEY) . 'vendor/dompdf/dompdf/dompdf_config.inc.php';