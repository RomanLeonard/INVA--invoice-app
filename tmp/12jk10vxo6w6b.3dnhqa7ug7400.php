<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">

  <title>invoice app</title>
</head>
<body>
  <div class="page-title">
    <h1><?= ($page_title) ?></h1>
  </div>

  <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>


  <script src="assets/js/bootstrap/bootstrap.bundle.min" type="text/javascript"></script>
</body>
</html>