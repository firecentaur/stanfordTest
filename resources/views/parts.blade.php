
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>parts</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo asset('css/tables.css')?>" type="text/css">

</head>
<body>

<table>

    <tr>
        @foreach($posTags as $posTag)
            <td>{{$posTag[0]}}</td>
        @endforeach
    </tr>
    <tr>
        @foreach($posTags as $posTag)
            <td><span style="color:red;cursor:pointer" title="{{$posTag[1]}}">{{$posTag[2]}}</span></td>
        @endforeach
    </tr>
</table>
</body>
</html>
