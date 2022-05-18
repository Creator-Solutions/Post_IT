<!--//#FFD47A  #FF8E2A-->
<!DOCTYPE html>
<head>
    <title></title>
    <style>
    *{
        margin: 0;
        padding: 0;
    }

    html{
        height: 100%;
    }

    .nav{
        width: 250px;
        height: 100%;
        position: fixed;
        background-color: #FFD47A;
    }

    .nav .container{
        width: 75%;
        margin: 200px auto;
        display: flex;
        flex-direction: column;
        
    }

    .nav .container .block{
        height: 55px;
        width: 100%;
        margin-top: 15px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .nav .container .block:hover{
        background-color: #fff;
        border-radius: 10px;
        cursor: pointer;
    }

    .nav .container .block a{
        color: #111;
        margin-left: 15px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 16px;
    }

    .nav .container .block img{
        margin-left: 25px;
        width: 30px;
        height: 30px;
    }

    .nav .container .block .pencil{
        width: 30px;
        height: 30px;
    }
    </style>

<body>

    <div class="nav">
        <div class="container">
            <div class="block">
                <img src="../Images/home.png" />
                <a>Home</a>
            </div>
            <div class="block">
                <img src="../Images/search.png" />
                <a>Search</a>
            </div>
            <div class="block">
                <img src="../Images/pencil.png" class="pencil"/>
                <a>My Posts</a>
            </div>
            <div class="block">
                <img src="../Images/account.png" class="pencil"/>
                <a>Account</a>
            </div>
        </div>
    </div>

</body>
</head>