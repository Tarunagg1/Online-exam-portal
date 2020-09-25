<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .printcontainer {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        width: 50%;
        margin: auto;
    }

    .exmtitle h1 {
        text-align: center;
    }

    .info-block {
        width: 50%;
        float: left;
        height: 50px;
        line-height: 50px;
        text-align: center;
    }

    .userinfoblock {
        margin-top: 75px;
    }
    </style>
</head>
<body>
    <div class="printcontainer">
        <div class="exmtitle">
            <h1>{{$exmtitle}}</h1>
        </div>
        <div class="userinfoblock">
            <div class="info-block">
                <label>Name: {{$userinfo->name}}</label>
            </div>
        </div>
        <div class="userinfoblock">
            <div class="info-block">
                <label>Email: {{$userinfo->email}}</label>
            </div>
        </div>
        <div class="userinfoblock">
            <div class="info-block">
                <label>Number: {{$userinfo->number}}</label>
            </div>
        </div>
        <div class="userinfoblock">
            <div class="info-block">
                <label>Dob: {{date('d M Y',strtotime($userinfo->dob))}}</label>
            </div>
        </div>
        <div class="userinfoblock">
            <div class="info-block">
                <label>Form date: {{date('d M Y',strtotime($userinfo->created_at))}}</label>
            </div>
        </div>
        <button class="btn btn-info" onclick="window.print()">Print</button>
    </div>
</body>

</html>