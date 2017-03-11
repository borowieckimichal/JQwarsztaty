

<html>
    <head>
        <title>strona główna</title>
        <meta content="text/html" charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/app.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="books">
            <form action="#" id="bookForm" method="POST" name="addBook">
                <fieldset>
                    <label>
                    Nazwa książki:
                    <input type="text" id="name" name="name">
                    <br>
                    Autor:
                    <input type="text" id="autor" name="autor">
                    <br>
                    Opis książki:
                    <input type="text" id="description" name="description">
                    <br>
                    <input type="submit" id="addBook" name="addBook" value="Dodaj książkę">
                    </label>                  
                </fieldset>              
            </form>           
        </div>
        <p> lista książek </p>
        <div class="bookList">
            
            
        </div>
    </body>
</html>

