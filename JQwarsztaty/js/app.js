
$(document).ready(function () {


    var endpoint = 'api/books.php';

    createBook();
    showAllBooks();


    function showAllBooks() {
        $.ajax({
            url: endpoint,
            data: {},
            type: "GET",
            dataType: "json"
        })
                .done(function (json) {              
                $.each(json, function (object, book) {
                    var book = $("<i><div id='" + book.id + "''class='displayBook'>" + book.name + "</div></i>");
                    $('.bookList').append(book);
                });

                $('.bookList div').one('click', showBookDetails);
            })
                .fail(function () {
                alert("błąd w ładowaniu książek");
            });
        
    }

    function showBookDetails() {
        var display = $(this);
        $.ajax({
            url: endpoint,
            data: 'id=' + $(this).get(0).id,
            type: 'GET',
            dataType: 'json'
        })
                .done(function (json) {

                    display.append("<div class='displayBook'> Autor: " + json.autor + "<br/>\
                                                              Opis: " + json.description + '\
                            <form class="editBook"> \n\
                                   <h3>Edycja danych:\n\</h3>' +
                            '<input type="text" name="name" value="' + json.name + '"/><br/>'
                            + '<input type="text" name="autor" value="' + json.autor + '"/><br/>'
                            + '<input type="text" name="description" value="' + json.description + '"/><br/>'
                            + '<input type="submit" class="edit" value="Zmień dane" name="' + json.id + '"/>\n\
                            </form> \n\
                            <a href class="delete" value="' + json.id + '">Usuń książkę</a<br/>\n\
                                  </div><br/>');

                    $('.delete').click(deleteBook);
                    $('.editBook').on('submit', function (e) {
                        e.preventDefault();
                        editBook(this);
                    });
                })
                        .fail(function() {
                            alert("błąd w ładowaniu danych");
                });



    }

    function editBook(form) {

        var editData = {
            id: $(form).find('.edit').attr('name'),
            name: $(form).find('[name=name]').val(),
            autor: $(form).find('[name=autor]').val(),
            description: $(form).find('[name=description]').val()
        };


        $.ajax({
            url: endpoint,
            data: editData,
            type: "PUT",
            dataType: "json"
        })
            .done (function () {
                alert("Dane zostały zaktualizowane");
                location.reload(true);
            })
            .fail (function () {
                alert("błąd w edycji danych");           
        });
    }

    function deleteBook() {
        var bookToDelete = $('.delete').attr('value');
        $.ajax({
            url: endpoint,
            data: 'id=' + bookToDelete,
            type: "DELETE",
            dataType: "json"
        })
                .done(function () {
                    alert("usunięto książkę");
                    window.location.reload(true);
                })
                .fail(function () {
                    alert("błąd podczas usuwania książki");
                });

    }

    function createBook() {
        $('form[name="addBook"]').on('submit', function (e) {
            e.preventDefault();

            var newData = {
                'name': $('input[name="name"]').val(),
                'autor': $('input[name="autor"]').val(),
                'description': $('input[name="description"]').val()
            };

            $.ajax({
                url: endpoint,
                data: newData,
                type: "POST",
                dataType: "json"

            })
                    .done(function () {
                        alert("dodano nową książkę");
                        window.location.reload(true);
                    })
                    .fail(function () {
                        alert("błąd podczas tworzenia nowej książki");
                        window.location.reload(true);                      
                    });

        });
    }


});








