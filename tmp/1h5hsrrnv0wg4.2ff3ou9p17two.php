<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- icon -->
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="http://leonardroman-in-v132.infinityfreeapp.com/favico/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="inva"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="http://leonardroman-in-v132.infinityfreeapp.com/favico/mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="http://leonardroman-in-v132.infinityfreeapp.com/favico/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="http://leonardroman-in-v132.infinityfreeapp.com/favico/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="http://leonardroman-in-v132.infinityfreeapp.com/favico/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="http://leonardroman-in-v132.infinityfreeapp.com/favico/mstile-310x310.png" />  
  <!-- ./icon -->

  <!-- bootstrap-css -->
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
  <!-- tweaker css -->
  <link rel="stylesheet" href="assets/css/stylesheet.css">
  <!-- custom css -->
  <?php if (@$CSS_PATH): ?>
    <link rel="stylesheet" href="<?= (@$CSS_PATH) ?>">
  <?php endif; ?>
  
  <title>inva</title>
</head>
<body>
  <input type="hidden" name="global_base_url" value="<?= ($BASE) ?>">

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= ($BASE) ?>">
        <svg width="100" height="30" viewBox="0 0 131 86" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.429 45.3295V68H16.9964V29.8182H24.1307V36.0327H24.603C25.4813 34.0109 26.8568 32.3868 28.7294 31.1605C30.6186 29.9342 32.9967 29.321 35.8636 29.321C38.4654 29.321 40.7441 29.8679 42.6996 30.9616C44.6551 32.0388 46.1714 33.6463 47.2486 35.7841C48.3258 37.9219 48.8643 40.5651 48.8643 43.7138V68H41.4318V44.6087C41.4318 41.8411 40.7109 39.6785 39.2692 38.1207C37.8274 36.5464 35.8471 35.7592 33.3281 35.7592C31.6046 35.7592 30.0717 36.1321 28.7294 36.8778C27.4036 37.6236 26.3513 38.7173 25.5724 40.1591C24.8101 41.5843 24.429 43.3078 24.429 45.3295Z" fill="black"/>
          <path d="M89.6598 30.8182L75.8139 69H67.8594L53.9886 30.8182H61.968L71.6378 60.2003H72.0355L81.6804 30.8182H89.6598Z" fill="black"/>
          <path d="M106.436 68.8452C104.017 68.8452 101.829 68.3977 99.8736 67.5028C97.9181 66.5914 96.3686 65.2739 95.2251 63.5504C94.0982 61.8269 93.5348 59.714 93.5348 57.2116C93.5348 55.0573 93.9491 53.2841 94.7777 51.892C95.6063 50.5 96.7249 49.398 98.1335 48.5859C99.5421 47.7739 101.116 47.1607 102.857 46.7464C104.597 46.3321 106.37 46.0173 108.176 45.8018C110.463 45.5367 112.319 45.3213 113.744 45.1555C115.17 44.9732 116.205 44.6832 116.852 44.2855C117.498 43.8878 117.821 43.2415 117.821 42.3466V42.1726C117.821 40.0017 117.208 38.3196 115.982 37.1264C114.772 35.9332 112.965 35.3366 110.562 35.3366C108.06 35.3366 106.088 35.8918 104.646 37.0021C103.221 38.0959 102.235 39.3139 101.688 40.6562L94.7031 39.0653C95.5317 36.7453 96.7415 34.8726 98.3324 33.4474C99.9399 32.0057 101.788 30.9616 103.876 30.3153C105.964 29.6525 108.16 29.321 110.463 29.321C111.988 29.321 113.603 29.5033 115.31 29.8679C117.034 30.2159 118.641 30.8622 120.133 31.8068C121.641 32.7514 122.875 34.102 123.837 35.8587C124.798 37.5987 125.278 39.8608 125.278 42.6449V68H118.02V62.7798H117.722C117.241 63.741 116.52 64.6856 115.559 65.6136C114.598 66.5417 113.363 67.3123 111.855 67.9254C110.347 68.5386 108.541 68.8452 106.436 68.8452ZM108.052 62.8793C110.107 62.8793 111.863 62.4732 113.322 61.6612C114.797 60.8492 115.915 59.7886 116.678 58.4794C117.456 57.1536 117.846 55.7367 117.846 54.2287V49.3068C117.581 49.572 117.067 49.8205 116.305 50.0526C115.559 50.268 114.705 50.4586 113.744 50.6243C112.783 50.7734 111.847 50.9143 110.935 51.0469C110.024 51.1629 109.262 51.2623 108.648 51.3452C107.207 51.5275 105.889 51.834 104.696 52.2649C103.519 52.6958 102.575 53.3172 101.862 54.1293C101.166 54.9247 100.818 55.9853 100.818 57.3111C100.818 59.1506 101.498 60.5426 102.857 61.4872C104.215 62.4152 105.947 62.8793 108.052 62.8793Z" fill="black"/>
          <rect y="29" width="7" height="40" fill="black"/>
        </svg>                    
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <div style="display: flex; justify-content: space-between; min-width: 100%;">
          <ul class="navbar-nav" style="min-width: 100%; display: flex; justify-content: space-between;">
            <div class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link <?= ((@$ACTIVE_PAGE == 'invoices') ? 'active' : '') ?>" href="<?= ($BASE) ?>">Invoices</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ((@$ACTIVE_PAGE == 'clients') ? 'active' : '') ?>" href="clients">Clients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ((@$ACTIVE_PAGE == 'statistics') ? 'active' : '') ?>" href="statistics">Statistics</a>
              </li>

              <!-- THIS IS FOR TEST ONLY !!! -->
              <li class="nav-item px-2">
                <a class="nav-link backup-btn" href="<?= ($BASE) ?>" style="display:flex;align-items:center;gap:5px">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg>
                  <span>Database backup</span>
                </a>
              </li>
              <!-- ./THIS IS FOR TEST ONLY !!! -->
            </div>

            <div class="d-flex" role="search">
              <input id="universal-search" class="form-control me-2" type="search" placeholder="Invoice number/name" aria-label="Search">
              <span id="universal-search-btn" class="btn btn-outline-success" type="submit" style="display: flex; align-items: center; gap: 10px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                Search</span>
            </div>

            </ul>
        </div>
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
  <!-- Chart.js -->
  <?php if (@$ACTIVE_PAGE == 'statistics'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
  <?php endif; ?>

  <!-- custom js -->
  <script src="assets/js/notification.js" type="text/javascript"></script>
  <script src="assets/js/code.js" type="text/javascript"></script>
  <?php if (@$JS_PATH): ?>
    <script src="<?= (@$JS_PATH) ?>" type="text/javascript"></script>
  <?php endif; ?>
  
</body>
</html>