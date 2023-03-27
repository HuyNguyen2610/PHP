<?php
$act = "import";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'import':
        include 'View/Type/AddType.php';
        break;
    case 'import_type':
        if (isset($_POST['submit_file'])) {
            $file = $_FILES['file']['tmp_name'];
            file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
            $file_open = fopen($file, "r");
            while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                $db = new connect();
                $maloai = $csv[0];
                $tenhh = $csv[1];
                $idmenu = $csv[2];
                $query = "insert into loai(maloai,tenhh,idmenu) values($maloai,'$tenhh','$idmenu')";
                // echo $query;
                $db->exec($query);
            }
            echo '<script>alert ("import success!")</script>';
            include './View/Type/AllType.php';
        }

        break;
}

?>