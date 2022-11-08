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
            width: 199mm;
            height: 99mm;
            display: flex;
            flex-direction : column;
            justify-content: center;
            align-items: center;
            vertical-align: middle
        }
        p { 
            text-transform: "uppercase";
            margin-bottom: 0px;
            text-align: left;
            font-size: 10px;
        }
        .etiquettes {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        li {
            font-size: 10px
        }
        
        .text {
            width: 90%;
        }
        img {
            width: 10%;
            height: 100%;
            align-self:flex-end;
            margin-right: 15px;
            object-fit: contain
        }
        .container {
            display: flex;
            width: 100%;
            height: 100%;
            justify-content: center;
            flex-direction: column
        }
        table{
            font-size: 10px;
            margin-right: 0;
            margin-bottom: 7px;
            margin-right: 0;
            height: 75px;
        }
        .header{
            display: flex;
            flex-direction: row
        }
        .text-logo{
            width: 40%;
            background-color: aqua;
            margin-left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            font-weight: lighter;
            border-style: solid;
            border: 1px black
        }
        ol{
            margin: 0;
            width: 175px
        }
    </style>

</head>
<body>
    <div class="bon">
        <div class="container">
            <div class="header">
                <div class="text">
                    <p><strong>NOM DU CLIENT</strong> : {{ $commande['shipping']->first_name}} {{ $commande['shipping']->last_name}} 
                        - <strong>NUMERO DE COMMANDE</strong> : {{ $commande['number']}} 
                        - <strong>NUMERO DE TRAITEMENT</strong> : {{ sprintf("%'.04d",($allocation[0]->user_id) ?? 1).'-'.date('dmY',strtotime($commande['date_created'])).'-'.sprintf("%'.05d\n",$counter) }}</p>
                    <p><strong>Date d’entrée de la commande</strong> : {{ date('d/m/Y',strtotime($commande['date_created'])) }} - <strong>Date de traitement de la commande</strong> : {{ date('d/m/Y')}}</p>
                </div>
            </div>
            <div class="contenu">
                <p><strong>Contenu de la commande : </strong></p>
                <div class="etiquettes">
                    @if (isset($info) && $info->count() == 4)
                        @for ($i = 1; $i < 11; $i++)
                            <x-etiquette :numetiq="$i" :info="$info" />
                        @endfor
                    @endif
                    @if (isset($info) && $info->count() == 10 )
                        @for ($i = 1; $i < 11; $i++)
                            <x-etiquette :numetiq="$i" :info="$info['label'.$i.'_info']" />
                        @endfor
                    @endif
                    <div class="text-logo">
                        <p  style="font-size: 14px">Save your Document - Save your time</p>
                        <p style="font-size: 14px">Just Save It on www.just-save-it.com</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>