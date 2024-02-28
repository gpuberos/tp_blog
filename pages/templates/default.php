<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Project Name</title>
    <meta name="description" content="TP Création d'un blog">
    <meta name="author" content="Guy-Philippe Uberos">

</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php?p=home">Project name</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">

            <section class="pt-5">
                <?= $content; ?>
            </section>

        </div>
    </main>
    <footer>

    </footer>
</body>

</html>