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
            width: 119mm;
            height: 79mm;
            padding: 7mm;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            margin: auto
        }
        .sender {
            text-transform: uppercase;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            flex-direction: row
        }
        .recipient {
            text-transform: uppercase;
            font-size: 14px;
            font-family: 'Courier New', Courier, monospace;
            align-self: flex-end
        }
    </style>

</head>
<body>
    <div class="enveloppe">
        <div class="sender">
            <div >
                Sender's Adress
            </div>
            <div style="text-align: right;">
                <p style="margin-bottom: 0px">8678645767656646586</p>
                <p>675e675e765</p>
            </div>
        </div>
        <div class="recipient">
            Recipient's Adress
        </div>

    </div>
</body>
</html>