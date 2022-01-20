<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Giftly')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/normalize.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>
    <div id="app">
    </div>
    <script type="text/javascript" src="<?php echo e(asset('./js/app.js')); ?>"></script>
    <script src="https://kit.fontawesome.com/7651b3f740.js" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\Users\chloe\Documents\Dev\Alternance\fsd06\Giftly\resources\views/vue.blade.php ENDPATH**/ ?>