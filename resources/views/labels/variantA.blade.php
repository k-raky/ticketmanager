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
            width: 79mm;
            height: 82mm;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-left: 2mm;
            padding-right: 1mm;
        }
        .variant-text {
            text-align :center;  
            margin: auto;
            display: flex;
            flex-direction: column;
            font-family: 'Times New Roman', Times, serif;
            font-size: 8px
        }
        .variant-container {
            width : 100%; 
            height : 12mm; 
            overflow : hidden;
            display: flex;
            flex-direction :column; 
            font-size :6px;
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
            width: 15mm;
            font-size: 5px;
            padding: auto;
            border: solid #000;
            border-width: 0.1px;
            border-radius: 25%;
            text-align: center;
            padding: 0.5px;
            height: 50%;
        }
    </style>
</head>
<body>
    <div class="variants">

        @if(isset($data) && $data->isNotEmpty())
        
            <x-variant :info="$data['label1_info']"/>
            <x-variant :info="$data['label2_info']"/>
            <x-variant :info="$data['label3_info']"/>
            <x-variant :info="$data['label4_info']"/>
            <x-variant :info="$data['label5_info']"/>
            
        @elseif(isset($info) && $info->isNotEmpty())

            <x-variant :info="$info"/>
            <x-variant :info="$info"/>
            <x-variant :info="$info"/>
            <x-variant :info="$info"/>
            <x-variant :info="$info"/>
            
        @endif
        
    </div>
</body>
</html>