<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap-css -->
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
  <!-- tweaker css -->
  <link rel="stylesheet" href="assets/css/stylesheet.css">
  <!-- custom css -->
  <?php if ($CSS_PATH): ?>
    <link rel="stylesheet" href="<?= ($CSS_PATH) ?>">
  <?php endif; ?>
  
  <title>invoice app</title>
</head>
<body>
  <input type="hidden" name="global_base_url" value="<?= ($BASE) ?>">

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <svg width="100" height="30" viewBox="0 0 131 85" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M61.0676 45.3295V68H53.6351V29.8182H60.7694V36.0327H61.2417C62.12 34.0109 63.4954 32.3868 65.3681 31.1605C67.2573 29.9342 69.6354 29.321 72.5023 29.321C75.1041 29.321 77.3828 29.8679 79.3382 30.9616C81.2937 32.0388 82.8101 33.6463 83.8873 35.7841C84.9644 37.9219 85.503 40.5651 85.503 43.7138V68H78.0705V44.6087C78.0705 41.8411 77.3496 39.6785 75.9078 38.1207C74.4661 36.5464 72.4857 35.7592 69.9668 35.7592C68.2433 35.7592 66.7104 36.1321 65.3681 36.8778C64.0423 37.6236 62.99 38.7173 62.2111 40.1591C61.4488 41.5843 61.0676 43.3078 61.0676 45.3295Z" fill="black"/>
          <path d="M47.6598 29.8182L33.8139 68H25.8594L11.9886 29.8182H19.968L29.6378 59.2003H30.0355L39.6804 29.8182H47.6598Z" fill="black"/>
          <path d="M106.436 68.8452C104.017 68.8452 101.829 68.3977 99.8736 67.5028C97.9181 66.5914 96.3686 65.2739 95.2251 63.5504C94.0982 61.8269 93.5348 59.714 93.5348 57.2116C93.5348 55.0573 93.9491 53.2841 94.7777 51.892C95.6063 50.5 96.7249 49.398 98.1335 48.5859C99.5421 47.7739 101.116 47.1607 102.857 46.7464C104.597 46.3321 106.37 46.0173 108.176 45.8018C110.463 45.5367 112.319 45.3213 113.744 45.1555C115.17 44.9732 116.205 44.6832 116.852 44.2855C117.498 43.8878 117.821 43.2415 117.821 42.3466V42.1726C117.821 40.0017 117.208 38.3196 115.982 37.1264C114.772 35.9332 112.965 35.3366 110.562 35.3366C108.06 35.3366 106.088 35.8918 104.646 37.0021C103.221 38.0959 102.235 39.3139 101.688 40.6562L94.7031 39.0653C95.5317 36.7453 96.7415 34.8726 98.3324 33.4474C99.9399 32.0057 101.788 30.9616 103.876 30.3153C105.964 29.6525 108.16 29.321 110.463 29.321C111.988 29.321 113.603 29.5033 115.31 29.8679C117.034 30.2159 118.641 30.8622 120.133 31.8068C121.641 32.7514 122.875 34.102 123.837 35.8587C124.798 37.5987 125.278 39.8608 125.278 42.6449V68H118.02V62.7798H117.722C117.241 63.741 116.52 64.6856 115.559 65.6136C114.598 66.5417 113.363 67.3123 111.855 67.9254C110.347 68.5386 108.541 68.8452 106.436 68.8452ZM108.052 62.8793C110.107 62.8793 111.863 62.4732 113.322 61.6612C114.797 60.8492 115.915 59.7886 116.678 58.4794C117.456 57.1536 117.846 55.7367 117.846 54.2287V49.3068C117.581 49.572 117.067 49.8205 116.305 50.0526C115.559 50.268 114.705 50.4586 113.744 50.6243C112.783 50.7734 111.847 50.9143 110.935 51.0469C110.024 51.1629 109.262 51.2623 108.648 51.3452C107.207 51.5275 105.889 51.834 104.696 52.2649C103.519 52.6958 102.575 53.3172 101.862 54.1293C101.166 54.9247 100.818 55.9853 100.818 57.3111C100.818 59.1506 101.498 60.5426 102.857 61.4872C104.215 62.4152 105.947 62.8793 108.052 62.8793Z" fill="black"/>
          <rect y="29" width="7" height="40" fill="black"/>
        </svg>          
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link invoice" href="<?= ($BASE) ?>">Invoices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link clients" href="clients">Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link statistics disabled" href="statistics">Statistics</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- page title and utility (buttons, inputs etc.) -->
  <?php echo $this->render($title_utility,NULL,get_defined_vars(),0); ?>
  <!-- ./page title and utility (buttons, inputs etc.) -->
 

  <!-- content -->
  <div class="page-content">
    <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
  </div>
    
  <!-- ./content -->

  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- bootstrap-js -->
  <script src="assets/js/bootstrap/bootstrap.bundle.min.js" type="text/javascript"></script>
  
  <!-- custom js -->
  <script src="assets/js/notification.js" type="text/javascript"></script>
  <script src="assets/js/code.js" type="text/javascript"></script>
  <?php if ($JS_PATH): ?>
    <script src="<?= ($JS_PATH) ?>" type="text/javascript"></script>
  <?php endif; ?>
  
</body>
</html>