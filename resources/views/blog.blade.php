<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">This is Vivi's Blog </div>

                <img width="50%" class="center" src="  {{$article->pic}}" alt="">
            </div>

            <form action="/blog/vi/upload" method="post" enctype="multipart/form-data">
                <input name="upfile" type="file" width="300" height="30"/><input name="" type="submit" value="上传" />
            </form>
        </div>
    </body>
</html>
