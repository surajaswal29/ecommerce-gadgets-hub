<title>
    <?php
        include"admin/config.php";
        $sql_seo1="SELECT * FROM product";
        $result_seo1=mysqli_query($con,$sql_seo1);
        $data_seo1=mysqli_fetch_assoc($result_seo1);
        switch($data_seo1['Name'])
        {
            case 'Maa Whole Wheat Atta':
               echo 'Maa Whole Wheat Atta | 100% Organic Atta | Maa Bhubhneshwari Enterprises';
             break;
             case 'Maa Bulgur(Dalia)':
                echo 'Maa Bulgur(Dalia) | Maa Bhubhneshwari Enterprises';
              break;
              case 'Maa Corn Flour(Besan)':
                echo 'Maa Corn Flour(Besan) | Maa Bhubhneshwari Enterprises';
              break;
              case 'Maa Mix Masaale':
                echo 'Maa Mix Masaale | Maa Bhubhneshwari Enterprises';
              break;
              default:
                echo"Maa Bhubhneshwari Enterprises | Best Organic Wheat Flour Provider in Dehradun | 100% Organic Atta";
              break;
        }
    ?>
</title>
<meta name="keyword" content="maa bhubhneshwari enterprises, mb-enterprise, mb-enterprises, Organic atta,">
<meta name="description" content="Maa Bhubhneshwari Enterprises is a Best Organic Wheat Flour Provider in Dehradun.">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://ik.imagekit.io/sweetgrapes2912/favicon_mb/favicon-32x32_xqkU7C1F1h.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://ik.imagekit.io/sweetgrapes2912/favicon_mb/favicon-96x96_JeKnjuz_s.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://ik.imagekit.io/sweetgrapes2912/favicon_mb/favicon-16x16_n-awS2Yc8.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">