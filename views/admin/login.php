<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <?php if ($_ENV['APP_ENV'] == 'local'): ?>
        <link rel="stylesheet" href="http://localhost:5173/src/admin/css/admin.css" />
        <script type="module" src="http://localhost:5173/src/admin/script/login.tsx" defer></script>
    <?php elseif ($_ENV['APP_ENV'] == 'production'): ?>
        <link rel="stylesheet" href="/dist/assets/admin.css" />
        <script type="module" src="/dist/assets/login.js" defer></script>
    <?php endif; ?>
</head>

<body class="dark">
    <div id="root"></div>
</body>

</html>