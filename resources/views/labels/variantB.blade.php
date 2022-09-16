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
            width: 80mm;
            height: 54mm;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            padding-left: 2mm;
            padding-right: 2mm;
        }
        .variant-text {
            text-align :center;  
            margin: auto;
            display: flex;
            flex-direction: column;
            font-family: 'Times New Roman', Times, serif
        }
        .variant-container {
            background-color: orange; 
            width : 76mm; 
            height : 12mm; 
            overflow : hidden;
            display: flex;
            flex-direction :column; 
            font-size :6px;
            border: solid #000;
            border-width: 0.1px;
            margin-top: 0.25mm;
            margin-bottom: 0.25mm;
        }
        .top-container {
            display: flex;
            flex-direction: row;
            height: 50%;
            align-items: center;
            transform: rotateX(180deg);
        }
        .logo {
            width: 13mm;
            font-size: 3px;
            padding: auto;
            border: solid #000;
            border-width: 0.1px;
            border-radius: 25%;
            text-align: center;
            padding: 0.5px;
            height: 50%;
        }
        .emptyblock {
            background-color: orange;
            height: 20.5mm;
            width: 100%;
            border: solid #000;
            border-width: 0.1px;
        }
    </style>
</head>
<body>
    <div class="variants">
        <div class="emptyblock"></div>
        <x-variant/>
        <div class="emptyblock"></div>
    </div>
</body>
</html>