<?php
// mengaktifkan session php

use Mpdf\Tag\A;

session_start();
// menghapus semua session
session_destroy();
// mengalihkan halaman ke halaman login
header("location:./index.php");
