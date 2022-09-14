<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <style type="text/css">
        .variants {
            position: absolute;
            margin-right: 7.5590551181px;
            margin-top: 37.795275591px;
            right: 0px;
        }
        .backwards {
            display: inline;
            -moz-transform: scale(-1, -1);
            -webkit-transform: scale(-1, -1);
            -o-transform: scale(-1, -1);
            -ms-transform: scale(-1, -1);
            transform: scale(-1, -1);
        }
        .variant-text {
            text-align :center;  
            margin: auto;
            display: flex;
            flex-direction: column;
            background-color: aqua
        }
        .variant-container {
            background-color: orange; 
            width : 287.24409449px; 
            height : 45.354330709px; 
            overflow : hidden;
            display: flex;
            flex-direction :column;
            margin-left: 7.5590551181px; 
            font-size :6px;
        }
        .top-container {
            display: flex;
            flex-direction: row;
            height: 50%;
            align-items: center
        }
        .logo {
            width: 37.795275591px;
            margin-right: 11.338582677px;
            font-size: 3px;
            padding: auto;
            border: solid #000;
            border-width: 0.5px;
            border-radius: 25%;
            text-align: center;
            padding: 0.5px;
            height: 50%;
        }
    </style>
</head>
<body>

    <div class="variants">
        <x-variant/>
        <x-variant/>
        <x-variant/>
        <x-variant/>
        <x-variant/>
    </div>
</body>
</html>