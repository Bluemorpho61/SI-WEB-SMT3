<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Tambah Foto Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Angular file upload directive</title><link rel='stylesheet' href='../View/css/bootstrap.min.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<div ng-app="app">
  <div ng-controller="UploadController as vm">
    <div class="container">
      <div class="page-header">
        <h1>Tambahkan foto menu baru</h1>

      </div>

      <form ng-model="vm.file" my-file-upload>
        <div class="form-group">
          <label for="fileName">Silahkan pilih satu buah gambar untuk diunggah</label>
          <div class="input-group">
            <input type="text" id="fileName" class="form-control" readonly ng-model="fileName" ng-click="browse()">
              <span class="input-group-btn">
              <button type="button" class="btn btn-default" ng-click="browse()">Browse</button>
            </span>
          </div>
        </div>
          <div>
              <h5 style=" font-weight: bold">Masukkan Deskripsi</h5>
              <textarea style="width: 400px; height: 100px; font-size: 14px" name="deskripsi-tulis" id="deskripsi-tulis"></textarea>
          </div>
          <div>
              <h5>Atau Pilih salah satu deskripsi yang sudah ditambahkan sebelumnya</h5>
              <label for="pil-deskripsi">Deskripsi yang sudah ada</label>
              <select name="pil-deskripsi" id="pil-deskripsi">
                <option>Value 1</option>
                <option>Value 2</option>
              </select>
          </div>

        <div>
          <button type="reset" class="btn btn-default" ng-click="reset()">Reset</button>
          <button type="button" class="btn btn-primary" ng-click="vm.upload()" ng-disabled="!vm.file">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script><script  src="../View/js/script.js"></script>

</body>
</html>
