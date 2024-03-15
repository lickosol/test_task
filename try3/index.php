
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tryyyy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<section>
    <div class="container">
        <div class="row jistify-content-center">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">фильм</th>
                        <th scope="col">год выпуска</th>
                        <th scope="col">страна</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tbody>
                    <?php

                    $res = [];
                    if (($file = fopen("films.csv", "r")) !== false){
                        while (($data = fgetcsv($file, 1000, ";")) !==false) {
                            $res[]= $data;
                        }
                        fclose($file);
                    }
                    ?>
                    <table class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <?php
                            for($i = 0; $i<count($res[$i]);$i++) {
                                echo '<th scope="col">'.$res[0][$i]."</th>";

                            }
                            echo "</tr>";
                            ?>


                        </thead>
                    <?php
                    for($i = 1; $i<count($res); $i++)
                    {
                        echo "<tr>";
                        for($j = 0; $j<count($res[$j]); $j++)
                        {
                            echo "<td>".$res[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</body>
</html>


</table>