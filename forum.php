<?php
session_start();
require_once ('function.php');
$con = getPDO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>forum</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body>
<style>
    /* CSS стилі для форми */
    form {
        margin: 80px;
    }
</style>


<form method="post" >
    <label for="exampleInputSend" class="form-label">Welcome <?php echo $_SESSION['login'] ?></label>

    <!-- show forum -->
    <div class="forum">
        <div class="card">
            <div class="card-header">
                Forum
            </div>
            <ul class="list-group list-group-flush" id="list-of-messages">
                <li class="list-group-item">
                    <strong>Login</strong> date : text <a href="?delete_message=-">delete</a>

                </li>
            </ul>
        </div>

        <hr><hr>
        <div class="mb-3">
            <label for="exampleInputSend" class="form-label">Messages</label>
            <input type="text" class="form-control" name="sendMessage" required>

        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    // $(document).load( () => {
    //
    // } )
    function appendComment(login, message ){
        $("#list-of-messages").append(`<li class="list-group-item"><strong>${login}</strong>: ${message}</li>`)
    }
    $.ajax({
        url:'./messages.php',
        method: 'GET',
        success: request => {
            if(request.data){
                console.log(request.data)
                request.data.map( comment => {

                    appendComment(comment.login, comment.text)
                })
            }
        }
    })
    $("form").submit(event => {
        event.preventDefault();

        let data1 = {
            login: $(this).find('input[name="login"]').val(),
            message: $(this).find('input[name="text"]').val(),

        }
        $.ajax({
            url:'createMessage.php',
            method: 'POST',
            data: data1,
            success: function (request) {
                appendComment(data1.login, data1.text);
                $('form').trigger("reset");
            }
        })
    })
</script>

</body>
</html>

