<?php require_once "upload_img.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="container" id="tourpackages-carousel">
        <div id="sortable" class="row">
          <?php foreach ($listOfItems as $item) { ?>
          <?php $counter++ ?>
            <div id="thumbContainer<?= $counter ?>" class="col-xs-12 col-sm-6 col-md-3 ui-sortable-handle">
              <div class="thumbnail">
                <?php if (isset($_POST["submit".$thisSubmit]) && $counter == $thisSubmit) { ?>
                  <img class="img-responsive" src="img/<?= $counter . "/" . $counter . $file_ext ?>">
                <?php } else { ?>
                  <img class="img-responsive" id="image<?= $counter ?>" src="img/background.png">
                <?php } ?>
                <div class="caption">
                  <h4>Thumbnail label <?= $counter ?></h4>
                  <a id="editThumbBtn<?= $counter ?>" class="btn btn-info btn-xs"  onclick="editThumbBtn(event)">Change Title</a>
                  <a id="deleteThumbBtn<?= $counter ?>" class="btn btn-danger btn-xs" onclick="deleteThumbBtn(event)">Delete Thumb</a>
                  <br><br>
                  <form action="" method="post" enctype="multipart/form-data">
                    <label class="btn btn-primary btn-xs">Change Image
                      <input type="file" class="inputFile" name="file">
                    </label>
                    <input type="submit" id="submit<?= $counter ?>" class="btn btn-success btn-xs" value="Upload" name="submit<?= $counter ?>">
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <div id="counter"></div>
        <!-- End row -->
    </div>
    <!-- End container -->

    <!-- Jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Jquery UI Drag & Drop -->
    <script src="js/jquery-ui.js"></script>
    <!-- My app -->
    <script src="js/app.js"></script>

</body>

</html>
