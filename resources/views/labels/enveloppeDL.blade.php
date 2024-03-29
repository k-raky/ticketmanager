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
        .enveloppe {
            position: absolute;
            width: 219mm;
            height: 109mm;
            padding: 14mm;
            display: flex;
            justify-content: space-between;
            flex-direction: column
        }
        .sender {
            text-transform: uppercase;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
        }
        .recipient {
            text-transform: uppercase;
            font-size: 12px;
            font-family: 'Courier New', Courier, monospace;
            align-self: flex-end;
            text-align: right
        }
        p {
            margin-bottom: 0px
        }
    </style>

</head>
<body>
    <div class="enveloppe">
        <div class="sender">
            <p><strong>just save it</strong></p>
            <p>1 Place aux herbes,</p>
            <p>26100 Romans-sur-Isère</p>
            <p>France</p>
        </div>
        <div class="recipient">
            <p>{{ $commande['shipping']->first_name}} {{ $commande['shipping']->last_name}}</p>
            <p>{{ $commande['shipping']->address_1}}</p>
            <p>{{ $commande['shipping']->postcode}} {{ $commande['shipping']->city}}</p>
            <p> {{ $commande['shipping']->country}} </p>
        </div>

    </div>
</body>
</html>