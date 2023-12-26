<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="authpage/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Page</title>
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
    <link rel="stylesheet" href="authpage/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="authpage/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="authpage/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="authpage/css/demo.css" />
    <link rel="stylesheet" href="authpage/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="authpage/vendor/css/pages/page-auth.css" />
    <script src="authpage/vendor/js/helpers.js"></script>
    <script src="authpage/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
              <img src="assets/images/kahatex.png" alt="">
              </div>
              <!-- /Logo -->
              <h4 class="mb-2 text-center">Rekap Packing System</h4>
            <!-- Tampilkan pesan error jika ada -->
            <?php if (session()->has('error')) : ?>
        <p style="color: red;"><?= session('error') ?></p>
    <?php endif; ?>

              <form id="Auth" class="mb-3" action="<?= base_url('authverify') ?>" method="POST">
                <div class="mb-3">
                <?php if (isset($validation)) : ?>
            <ul style="color: red;">
                <?php foreach ($validation->getErrors() as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
                  <label for="email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Masukan Username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
               
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    <script src="authpage/vendor/libs/jquery/jquery.js"></script>
    <script src="authpage/vendor/libs/popper/popper.js"></script>
    <script src="authpage/vendor/js/bootstrap.js"></script>
    <script src="authpage/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="authpage/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="authpage/js/main.js"></script>

  </body>
</html>