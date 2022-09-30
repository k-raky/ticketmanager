<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <style>
        .bon {
            position: absolute;
            width: 199mm;
            height: 99mm;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
        }
        .ecriture { 
            display: flex;
            flex-direction: column;
        }
    </style>

</head>
<body>
    <div class="bon">
        <div class="ecriture">
            <p>Nom du client : {{ $commande['shipping']->first_name}} {{ $commande['shipping']->last_name}}</p>
            <p>Numero de Commande : {{ $commande['number']}}</p>
            <p>Numero de traitement : 55848594895</p>
        </div>
    </div>
</body>
</html>