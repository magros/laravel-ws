<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <style>
        * {
            font-family: sans-serif;
        }

        input {
            height: 16px;
            border: 1px solid #efefef;
            padding: 5px;
            border-radius: 3px;
        }

        .btn {
            display: inline;
            background-color: green;
            color: white;
            padding: 5px;
            text-decoration: none;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="form">
        <input type="text" placeholder="Escribe un mensaje" id="message" >
        <div class="btn btn-success" onclick="sendMessage()">Enviar mensaje</div>
    </div>
    <div id="messages">
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script>

    window.Echo.channel('chat')
        .listen('.messages', (res) => {
            console.log(res);
            document.getElementById("messages").innerHTML += '<p>'+res.data.message +'</p>';
        });

    var sendMessage = function () {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("messages").innerHTML += this.responseText;
            }
        };
        var message = document.getElementById('message').value;

        console.log(message);
        xhttp.open("POST", "send-message", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("message="+message);
    };
</script>
</body>
</html>
