<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>Connexion</title>
    <link rel="icon" type="image/x-icon"  href="<?=base_url("static/logo_angora/Logo Agora blanc.png")?> " sizes="256x256">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?= base_url("assets/admin/js/require.min.js"); ?>"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="<?= base_url("assets/admin/css/dashboard.css"); ?>" rel="stylesheet" />
    <script src="<?= base_url("assets/admin/js/dashboard.js"); ?>"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?= base_url("assets/admin/plugins/charts-c3/plugin.css"); ?>" rel="stylesheet" />
    <script src="<?= base_url("assets/admin/plugins/charts-c3/plugin.js"); ?>"></script>
    <!-- Google Maps Plugin -->
    <link href="<?= base_url("assets/admin/plugins/maps-google/plugin.css"); ?>" rel="stylesheet" />
    <script src="<?= base_url("assets/admin/plugins/maps-google/plugin.js"); ?>"></script>
    <!-- Input Mask Plugin -->
    <script src="<?= base_url("assets/admin/plugins/input-mask/plugin.js"); ?>"></script>
</head>

<body class="">
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="text-center mb-6">
                            <img src="./assets/brand/tabler.svg" class="h-6" alt="">
                        </div>

                        <?= form_open("/admin/login/create", ['class' => 'card']) ?>
                        <div class="card-body p-6">
                            <div class="card-title">Se connecter</div>
                            <div class="form-group">
                                <?= warning_alert(); ?>
                                <label class="form-label">E-mail<span class="form-required">*</span></label>
                                <input type="text" name="email" value="<?= old('email') ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mot de passe<span class="form-required">*</span></label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                            </div>
                        </div>
                        </form>
                        <div class="text-center text-muted">
                            <a href="<?= site_url() ?>">Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>