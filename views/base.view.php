<!-- Vue de base -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Event-manager</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href=<?php echo getPath("/assets/style.css")?>>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href=<?php echo getPath("/events")?>>Event-manager</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav" style="margin-left: auto !important;margin-right: 50px;">

                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo getPath("/events")?>>Évènements</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo getPath("/participants")?>>Participants</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href=<?php echo getPath("/participations")?>>Participations</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href=<?php echo getPath("/events/add")?>>Ajouter un évènement</a></li>
                                <li><a class="dropdown-item" href=<?php echo getPath("/participants/add")?>>Ajouter un participant</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="container">
            <?php require_once('views/'.$view); ?>
        </div>
    </body>
</html>