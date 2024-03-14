<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> AghaVote </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="optionVote.js"></script>


    <style>
        body {
            background-color: lightgreen; /* Change la couleur de fond en vert */
        }
    </style>

<style type= "text/css">
        #optionsContainer
        { display: none; }
    </style>

</head>

<!-- BACKGROUND -->
<body style="background-image: url('https://altselection.com/wp-content/uploads/2022/06/220524-MPD-Twitter-Update-GOT7-NANANA-Relay-Dance-Behind-The-Scenes-documents-1.jpeg'); background-size: cover; background-opacity: 0.5; background-repeat: repeat;">

<style>
    /* Styles pour les éléments à faire ressortir */
    .bg-light {
        background-color: white; /* Change la couleur de fond des éléments à une couleur claire */
    }

    .form-control {
        border-color: green; /* Change la couleur de la bordure des éléments de formulaire */
    }

    .btn-primary {
        background-color: blue; /* Change la couleur de fond du bouton principal */
        color: white; /* Change la couleur du texte du bouton principal */
    }

    .bg-light.rounded {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Ajoute une ombre à l'élément */
    }

</style>

<!-- TITRE  -->
<div class="row">
    <div class="col-lg-4 offset-lg-4 bg-light rounded offset-lt-4 mt-4" id="Creation-scrutin-title">
        <h2 class="text-center mt-2"> CREATION D'UN SCRUTIN </h2> 
    </div>

    <!-- TITRE DU SCRUTIN -->
    <div class="col-lg-4 offset-lg-4 bg-light rounded offset-lt-4 mt-4" id="titreSctn">
        <form action="" method="post" role="form" class="p-2" id="Creation-scrutin-frm">
            <div class="form-group">
                <label for="Titre">Titre du scrutin</label>
                <input type="text" name="Titre" class="form-control mb-2" placeholder="Titre" required autocomplete="on">
            </div>
        </form>
    </div> 
    
    <!-- QUESTION DU SCRUTIN -->
    <div class="col-lg-4 offset-lg-4 bg-light rounded offset-lt-4 mt-4" id="questionSctn">
        <form action="" method="post" role="form" class="p-2" id="Creation-scrutin-frm">
            <div class="form-group">
                <label for="Question">Quel est la question du scrutin ?</label>
                <input type="text" name="Question" class="form-control mb-2" placeholder="Question" required autocomplete="on">
            </div>
    </div>

    <!-- OPTION DU SCRUTIN -->
    <div class="col-lg-4 offset-lg-4 bg-light rounded offset-lt-4 mt-4" id="optionSctn">
        <div class="form-group">
            <label for="nbOptions">Nombre d'options de vote</label>
            <input type="number" name="nbOptions" id="nbOptions" class="form-control" min="1" required>
                <button onclick="generateOptions()" class="btn btn-primary mt-2 d-block mx-auto" id="submit">Submit</button>
        </div>
    </div>

        <div class="col-lg-4 offset-lg-4 bg-light rounded offset-lt-4 mt-4" id="optionsContainer">
            <!-- Les options de vote seront ajoutées ici -->
            <label >Remplissez les options de vote</label>
        </div>

        <script type= "text/javascript">
                $(document).ready(function(){
                $("#nbOptions").click(function(){
                $("#optionsContainer").show();
            })
        });


</div>

</body>
</html>