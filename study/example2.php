<html>

<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

</head>

<body>

<?php

echo $_REQUEST['nickname'].'님의 직업은 '.$_REQUEST['job'].'이군요!';

?>
<form method="POST" action="" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="PUT">
    <input type="text" name="nickname" />
    <input type="text" name="job"  />
    <input type="submit"  value = "수정">
</form>

<form method="POST" action="" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="DELETE">
    <input type="submit" value = "삭제">
</form>

<!--<form
    method="PUT"
    action="domain/route/param?query=value"
>
    <input type="hidden" name="delete_id" value="1" />
    <input type="hidden" name="put_id" value="1" />
    <input type="text" name="put_name" value="content_or_not" />
    <div>
        <button name="update_data">Save changes</button>
        <button name="remove_data">Remove</button>
    </div>
</form>
<hr>
<form
    method="DELETE"
    action="domain/route/param?query=value"
>
    <input type="hidden" name="delete_id" value="1" />
    <input type="text" name="delete_name" value="content_or_not" />
    <button name="delete_data">Remove item</button>
</form>
-->

<!--<form action="#" method="post">     <input type="hidden" name="_method" value="put" /> </form>-->

<!--<form action="#" method="post">     <input type="hidden" name="_method" value="delet" /> </form>-->




</body>

</html>


<!--<script>
    var putMethod = ( event ) => {
        // Prevent redirection of Form Click
        event.preventDefault();
        var target = event.target;
        while ( target.tagName != "FORM" ) {
            target = target.parentElement;
        } // While the target is not te FORM tag, it looks for the parent element
        // The action attribute provides the request URL
        var url = target.getAttribute( "action" );

        // Collect Form Data by prefix "put_" on name attribute
        var bodyForm = target.querySelectorAll( "[name^=put_]");
        var body = {};
        bodyForm.forEach( element => {
            // I used split to separate prefix from worth name attribute
            var nameArray = element.getAttribute( "name" ).split( "_" );
            var name = nameArray[ nameArray.length - 1 ];
            if ( element.tagName != "TEXTAREA" ) {
                var value = element.getAttribute( "value" );
            } else {
                // if element is textarea, value attribute may return null or undefined
                var value = element.innerHTML;
            }
            // all elements with name="put_*" has value registered in body object
            body[ name ] = value;
        } );
        var xhr = new XMLHttpRequest();
        xhr.open( "PUT", url );
        xhr.setRequestHeader( "Content-Type", "application/json" );
        xhr.onload = () => {
            if ( xhr.status === 200 ) {
                // reload() uses cache, reload( true ) force no-cache. I reload the page to make "redirects normal effect" of HTML form when submit. You can manipulate DOM instead.
                location.reload( true );
            } else {
                console.log( xhr.status, xhr.responseText );
            }
        }
        xhr.send( body );
    }

    var deleteMethod = ( event ) => {
        event.preventDefault();
        var confirm = window.confirm( "Certeza em deletar este conteúdo?" );
        if ( confirm ) {
            var target = event.target;
            while ( target.tagName != "FORM" ) {
                target = target.parentElement;
            }
            var url = target.getAttribute( "action" );
            var xhr = new XMLHttpRequest();
            xhr.open( "DELETE", url );
            xhr.setRequestHeader( "Content-Type", "application/json" );
            xhr.onload = () => {
                if ( xhr.status === 200 ) {
                    location.reload( true );
                    console.log( xhr.responseText );
                } else {
                    console.log( xhr.status, xhr.responseText );
                }
            }
            xhr.send();
        }
    }
</script>

<script>
    document.querySelectorAll( "[name=update_data], [name=delete_data]" ).forEach( element => {
        var button = element;
        var form = element;
        while ( form.tagName != "FORM" ) {
            form = form.parentElement;
        }
        var method = form.getAttribute( "method" );
        if ( method == "PUT" ) {
            button.addEventListener( "click", putMethod );
        }
        if ( method == "DELETE" ) {
            button.addEventListener( "click", deleteMethod );
        }
    } );
</script>

<script>
    document.querySelectorAll( "[name=remove_data]" ).forEach( element => {
        var button = element;
        button.addEventListener( "click", deleteMethod );
</script>-->