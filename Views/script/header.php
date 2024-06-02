<?php 
$activeHub = (empty($_GET['p'])) ? 'active ' : null;
$activeChampions = (str_contains($_GET['p'], 'champions')) ? 'active ' : null;
$activeGuides = (str_contains($_GET['p'], 'guides')) ? 'active ' : null;
$activePro = (str_contains($_GET['p'], 'pro')) ? 'active ' : null;
$activeLogin = (str_contains($_GET['p'], 'login')) ? 'active ' : null;
?>