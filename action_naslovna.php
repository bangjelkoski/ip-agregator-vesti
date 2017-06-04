<?php 
include('config.php');

// Block A
$settings['Kategorija'] = 0;
$settings['Sortiranje'] = 3;
$settings['Broj'] = $_POST['a_number'];
setSetting($conn, 'A', $settings);

// Block B
$settings['Kategorija'] = 0;
$settings['Sortiranje'] = 2;
$settings['Broj'] = $_POST['b_number'];
setSetting($conn, 'B', $settings);

// Block D
$settings['Kategorija'] = $_POST['d_category'];
$settings['Sortiranje'] = $_POST['d_sort'];
$settings['Broj'] = $_POST['d_number'];
setSetting($conn, 'D', $settings);

// Block E
$settings['Kategorija'] = $_POST['e_category'];
$settings['Sortiranje'] = $_POST['e_sort'];
$settings['Broj'] = $_POST['e_number'];
setSetting($conn, 'E', $settings);

// Block F
$settings['Kategorija'] = $_POST['f_category'];
$settings['Sortiranje'] = $_POST['f_sort'];
$settings['Broj'] = $_POST['f_number'];
setSetting($conn, 'F', $settings);

// Block G
$settings['Kategorija'] = $_POST['g_category'];
$settings['Sortiranje'] = $_POST['g_sort'];
$settings['Broj'] = $_POST['g_number'];
setSetting($conn, 'G', $settings);

// Block H
$settings['Kategorija'] = $_POST['h_category'];
$settings['Sortiranje'] = $_POST['h_sort'];
$settings['Broj'] = $_POST['h_number'];
setSetting($conn, 'H', $settings);

// Block I
$settings['Kategorija'] = $_POST['i_category'];
$settings['Sortiranje'] = $_POST['i_sort'];
$settings['Broj'] = $_POST['i_number'];
setSetting($conn, 'I', $settings);

// Block J
$settings['Kategorija'] = $_POST['j_category'];
$settings['Sortiranje'] = $_POST['j_sort'];
$settings['Broj'] = $_POST['j_number'];
setSetting($conn, 'J', $settings);

// Block K
$settings['Kategorija'] = $_POST['k_category'];
$settings['Sortiranje'] = $_POST['k_sort'];
$settings['Broj'] = $_POST['k_number'];
setSetting($conn, 'K', $settings);

// Block L
$settings['Kategorija'] = $_POST['l_category'];
$settings['Sortiranje'] = $_POST['l_sort'];
$settings['Broj'] = $_POST['l_number'];
setSetting($conn, 'L', $settings);

header('Location: naslovna.php');
die();

?>