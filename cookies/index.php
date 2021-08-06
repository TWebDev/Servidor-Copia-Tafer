<!DOCTYPE html>
<html lang="en" manifest="cache.cache">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Cookies</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <?php 

$value = 'something from somewhere';

setcookie("TestCookie", $value);
setcookie("TestCookie", $value, time()+3600);  /* expire in 1 hour */
setcookie("TestCookie", $value, time()+3600, "/~rasmus/", "https://beachvacations.com.mx/", 1);



// Another way to debug/test is to view all cookies
//print_r($_COOKIE);


$arr_cookie_options = array (
    'expires' => time() + 60*60*24*30,
    'path' => '/',
    'domain' => '.example.com', // leading dot for compatibility or use subdomain
    'secure' => true,     // or false
    'httponly' => true,    // or false
    'samesite' => 'Lax' // None || Lax  || Strict
    );
setcookie('TestCookie', 'The Cookie Value', $arr_cookie_options);  

//print_r($_COOKIE);
?>
    
    <div class="cookies-box">
        <div class="container-cookies">
            <div class="parrafo">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et, obcaecati aperiam provident odit placeat officiis. 
                    Dolor fugiat voluptate minus eius exercitationem excepturi vitae repellat, iusto eum ullam asperiores! Placeat, autem. <a href="">Politicas de privacidad</a></p>
            </div>
            <div class="botones">
                <button id = "ok">Aceptar</button>
                <button id="close">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
        const btn_close = document.querySelector('#close')
        const btn_ok = document.querySelector('#ok')
        const cont_cookies = document.querySelector('.cookies-box')
        
        btn_ok.addEventListener('click', () => {
            cont_cookies.style.bottom = '-200px'
        })

        btn_close.addEventListener('click', () => {
          cont_cookies.style.bottom = '-200px'  
        })

    </script>


<div>
    <iframe src="https://www.youtube.com/watch?v=TH9lD9HXL8E" frameborder="0" allowfullscreen></iframe>
</div>
</body>

</html>