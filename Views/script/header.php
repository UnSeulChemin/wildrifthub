<?php 
$activeHub = (empty($_GET['p'])) ? 'active ' : null;
$activeChampions = (str_contains($_GET['p'], 'champions')) ? 'active ' : null;
$activeGuides = (str_contains($_GET['p'], 'guides')) ? 'active ' : null;
$activePro = (in_array($_GET['p'], ['users'])) ? 'active ' : null;
$activeLogin = (str_contains($_GET['p'], 'login')) ? 'active ' : null;
$activeAdmin = (str_contains($_GET['p'], 'admin')) ? 'active ' : null;
?>