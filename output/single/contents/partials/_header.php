<?php

/*
[--------------------------------------------------------------------------
[ Exemple
[--------------------------------------------------------------------------
[
[ Le fichier '_header.php' est automatiquement appelé au dessus de tout vos
[ fichiers (classes, constantes, fonctions, pages web, etc.) ainsi la ligne
[ ci-dessous démarre la session pour tout vos fichiers si elle n'était pas
[ encore démarrée.
[
*/

if (session_status() == PHP_SESSION_NONE)	{	session_start(); }