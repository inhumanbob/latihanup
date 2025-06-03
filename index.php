<html>
    <head>
        <title>Data Gambar</title>
    </head>
    <body>
        <h1>Data Gambar</h1>
        <a href="form.php">Tambah Gambar</a><br><br>
        <table border="1" cellpadding="8">
        <tr>
            <th>Gambar</th>
            <th>Nama File</th>
            <th>Ukuran File</th>
            <th>Tipe File</th>
        </tr>
        <?php
        include "koneksi.php";

        $query="SELECT*FROM gambar";
        $sql=mysqli_query($connect,$query);
        $row=mysqli_num_rows($sql);

        if($row>0){
            while($data=mysqli_fetch_array($sql)){
                echo"<tr>";
                echo"<td><img src='images/".$data['nama']."'width='100' height='100'></td>";
                echo"<td>".$data['nama']."</td>";
                echo"<td>".$data['ukuran']"</td>";
                echo"<td>".$data['tipe']."</td>";
                echo"</tr>";
            }
        }else{
            echo"<tr><td colspan='4'>Data tidak ada</td></tr>";
        }
        ?>
        </table>
    </body>
</html>