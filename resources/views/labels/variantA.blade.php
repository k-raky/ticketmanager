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
            width: 79mm;
            height: 84mm;
            padding-left: 2mm;
            padding-right: 2mm;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center
        }
        .variant-text {
            font-size: 7px;
            width: 100%;
            height: 6mm;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-left: 2mm;
            font-family: Arial
        }
        .variant-container {
            width: 100%;
            height: 12mm;
        }
        .top-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 6mm;
            transform: rotateX(180deg);
        }
        .logo {
           font-size: 5.5px;
           text-align: center;
           margin-right: 1mm;
           border-color: black;
           border-style: solid;
           border-width: 0.1em;
           border-radius: 50px;
           height: fit-content;
           width: 30mm;
           justify-content: center;
           align-items: center;
           display: flex;
           flex-direction: column;
           font-family: Arial
        }
        p {
            margin: 0px;
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

            <x-variant :info="$info" :mb='1.5' :mb_logo='1' />
            <x-variant :info="$info" :mb='1' :mb_logo=0.5/>
            <x-variant :info="$info" :mt_infos='0.5'/>
            <x-variant :info="$info" :mt='1.5' :mt_infos='0.5'/>
            <x-variant :info="$info" :mt='2' :mt_infos='0.5'/>
            
        @endif
        
    </div>
</body>
</html>