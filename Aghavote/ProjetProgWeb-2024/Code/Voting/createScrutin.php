<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un scrutin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <style type= "text/css">
        #optionsContaine
        { display: none; }
    </style>
</head>
<body style="background-image: url('https://altselection.com/wp-content/uploads/2022/06/220524-MPD-Twitter-Update-GOT7-NANANA-Relay-Dance-Behind-The-Scenes-documents-1.jpeg'); background-size: cover; background-opacity: 0.5; background-repeat: repeat;">



<div class="container mt-4">
    <div class="row">
        <div class="col-lg-4 offset-lg-4 bg-light rounded mt-4">
            <h2 class="text-center mt-2">Creation d'un scrutin</h2>
            <form action="" method="post" role="form" class="p-2" id="Creation-scrutin-frm">
                <div class="form-group">
                    <label for="Titre">Titre du scrutin</label>
                    <input type="text" name="Titre" class="form-control mb-2" placeholder="Titre" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Question">Quel est la question du scrutin ?</label>
                    <input type="text" name="Question" class="form-control mb-2" placeholder="Question" required autocomplete="on">
                </div>
                <div class="form-group">
                    <label for="nbOptions">Nombre d'options de vote</label>
                    <input type="number" name="nbOptions" id="nbOptions" class="form-control" min="1" required>
                </div>
                <div class="form-group">
                    <button onclick="generateOptions()" class="btn btn-primary btn-success mt-2 d-block mx-auto">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Les options de vote seront ajoutées ici -->

        <div class="col-lg-4 offset-lg-4 bg-light rounded offset-lt-4 mt-4" id="optionsContainer" style="display: none;">
            <label>Remplissez les options de vote</label>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#nbOptions").submit(function(){
                $("#optionsContainer").show();
            })
        });
    </script>

</body>
</html>
