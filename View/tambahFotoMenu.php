<?php
include ('../Config/koneksi.php');
if (!isset($_GET['id'])){
    header('Location:../View/KelolaWarung.php');
}

if (isset($_POST['submit_image'])) {
    $deskripsi =$_POST['desc'];
    $id_warung = $_GET['id'];
    for ($i = 0; $i < count($_FILES["upload_file"]["name"]); $i++) {
        $uploadfile = $_FILES["upload_file"]["tmp_name"][$i];
        $folder = "../Assets/img/fotomenu/";
        //Insert Deskripsi
        $query ="INSERT INTO tb_deskripsi VALUES(NULL, '$deskripsi', $id_warung)";
        try {
            $result =mysqli_query($koneksi, $query);
            move_uploaded_file($_FILES["upload_file"]["tmp_name"][$i], "$folder" . $_FILES["upload_file"]["name"][$i]);
        } catch (Exception $e){
            echo $e->getMessage();
        }

    }
    exit();
}


?>

<html>
<head>
    <script type="text/javascript" src="../View/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js"></script>
    <script>
        $(document).ready(function()
        {
            $('form').ajaxForm(function()
            {
                alert("Uploaded SuccessFully");
            });
        });

        function preview_image()
        {
            var total_file=document.getElementById("upload_file").files.length;
            for(var i=0;i<total_file;i++)
            {
                $('#image_preview').append("<img style='height: 254px; width: 300px;' src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
            }
        }
    </script>
    <title>Tambah foto menu</title>
</head>
<body>
<div id="wrapper">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>

        <div class="row">
            <label id="desc">Tulis deskripsi untuk foto tsb disini.. </label>
            <div class="row">
                <textarea id="desc" style="width: 400px; height: 150px; font-size: 16px;" name="desc">

                </textarea>

            </div>
        </div>

        <input type="submit" name='submit_image' value="Tambah gambar"/>
        <button onclick="document.getElementById('upload_file').value=''; document.getElementById('desc').value='';">Reset</button>
    </form>
    <div id="image_preview"></div>
</div>
</body>
</html>


