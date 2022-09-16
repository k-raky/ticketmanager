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
        .container {
            width: 220mm;
            height: 110mm;
            padding: 15mm;
            display: flex;
            justify-content: space-between;
            flex-direction: column
        }
        .sender {
            text-transform: uppercase;
            font-size: 10px;
        }
        .recipient {
            text-transform: uppercase;
            font-size: 10px;
            align-self: flex-end
        }
    </style>

</head>
<body>
    <div class="container border border-3">
        <div class="sender">
            <p>Sender's Adress</p>
        </div>
        <div class="recipient">
            Recipient's Adress
        </div>

    </div>
</body>
</html>