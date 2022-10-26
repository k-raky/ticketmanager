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
            display: flex;
            flex-direction : column;
            width: 350mm;
            height: 150mm;
            justify-content: center;
            align-items: center;
        }
        p { 
            text-transform: "uppercase";
            margin-bottom: 0px
        }
        .etiquettes {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        li {
            font-size: 12px
        }
        .infos {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .text {
            width: 40%;
            margin-left: 0;
            margin: 1%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-size: 24px;
            font-weight: bold
        }
        img {
            position: absolute;
            margin-right: 250px;
            top: 0px;
            right: 0px;
            top: 2%
        }
    </style>

</head>
<body>
    <div class="bon">
        <div style="width: 300mm">
            <img src="/storage/img/logo.png" width="100px" height="80px">
            <p>NOM DU CLIENT : TESTV TESTN - NUMERO DE COMMANDE : 2666 - NUMERO DE TRAITEMENT : 55848594895</p>
            <p>Date d’entrée de la commande : .......................................... Date de traitement de la commande : .....................................</p>
            <div class="contenu">
                <p>Contenu de la commande : </p>
                <div class="etiquettes">
                    @for ($i =1 ; $i < 11 ; $i++)
                        <x-etiquette :numlabel="1"/>    
                    @endfor
                    <div class="text">
                        <p>Save your Document – Save your time</p>
                        <p>Just Save It</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>