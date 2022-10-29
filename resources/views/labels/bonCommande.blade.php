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
            width: 400mm;
            height: 200mm;
            justify-content: center;
            align-items: center;
            vertical-align: middle
        }
        p { 
            text-transform: "uppercase";
            margin-bottom: 0px;
        }
        .etiquettes {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        li {
            font-size: 13px
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
            margin-right: 55px;
            top: 0px;
            right: 0px;
            top: 2%
        }
    </style>

</head>
<body>
    <div class="bon">
        <div class="mx-auto" style="width: 90%; height : 90%">
            <p><strong>NOM DU CLIENT</strong> : {{ $commande['shipping']->first_name}} {{ $commande['shipping']->last_name}} 
                - <strong>NUMERO DE COMMANDE</strong> : {{ $commande['number']}} 
                - <strong>NUMERO DE TRAITEMENT</strong> : {{ sprintf("%'.04d",$allocation[0]->user_id).'-'.date('dmY',strtotime($commande['date_created'])).'-'.sprintf("%'.05d\n",$counter) }}</p>
            <p><strong>Date d’entrée de la commande</strong> : {{ date('d/m/Y',strtotime($commande['date_created'])) }} - <strong>Date de traitement de la commande</strong> : {{ date('d/m/Y')}}</p>
            <div class="contenu">
                <p><strong>Contenu de la commande : </strong></p>
                <div class="etiquettes">
                    @if (isset($info) && $info->count() == 4)
                        @for ($i = 1; $i < 11; $i++)
                            <x-etiquette :numetiq="$i" :info="$info" />
                        @endfor
                    @endif
                    @if (isset($info) && $info->count() == 40 )
                        @for ($i = 1; $i < 11; $i++)
                            <x-etiquette :numetiq="$i" :info="$info['label'.$i.'_info']" />
                        @endfor
                    @endif
                    <div class="text">
                        <p style="margin-bottom: 1px">Save your Document – Save your time</p>
                        <p>Just Save It</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>