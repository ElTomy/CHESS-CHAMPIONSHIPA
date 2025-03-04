<?php   
date_default_timezone_set('America/Montevideo');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script
      src="https://kit.fontawesome.com/1e193e3a23.js"
      crossorigin="anonymous"
    ></script>
    <script src="../Javascript/Loader.js"></script>

    <link
      rel="shortcut icon"
      href="../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    <script src="js/Form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/styles.css" />

    <title>ChessUY | Register</title>
  </head>
  <body>

    <div id="header"></div>

    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <div class="landing-video">
        <div class="background-opacity"></div>
        <video autoplay="" loop="" muted="">
          <source src="../media/videos/Ajedrez.mp4" type="video/mp4" />
        </video>
    </div>

    <div id="modal"></div>

    <div class="register-wrapper2">  

        <div class="register-logo">
            <a href="../index.html">
            <img src="../media/svg/Logo/Logo(ForDarkVersion).svg" alt="" />
            </a>
        </div>

        <div class="column-wrapper">
            <div class="column">
                <div class="inputs">
                    <input type="text" id="nombre" name="nombre" required />
                    <label class="lbl-user">
                        <span class="text-user" data-lang="name"> Nombre </span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="text" id="apellido" name="apellido" required />
                    <label class="lbl-user">
                        <span class="text-user" data-lang="surname"> Apellido </span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="text" id="institucion" name="institucion" required />
                    <label class="lbl-user">
                        <span class="text-user" data-lang="institute"> Institución Liceal </span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="text" id="año" name="año" required />
                    <label class="lbl-user">
                        <span class="text-user" data-lang="study-year"> Año Cursando </span>
                    </label>
                </div>
                <div class="inputs">
                    <?php

                    $año = date('Y');
                    $mes = date('m');
                    $dia = date('d');

                    echo "<input type='date' max='$año-$mes-$dia' id='nacimiento' name='nacimiento' />";
                    ?>
                    <label class="lbl-user">
                        <span class="text-user" data-lang="birthday"> Fecha de Nacimiento</span>
                    </label>
                    
                </div>
            </div>
            <div class="column">
                <div class="inputs">
                    <input type="text" id="cedula" name="cedula" required />
                    <label class="lbl-user">
                        <span class="text-user" data-lang="id-cedula"> Cedula</span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="text" id="celular" name="celular" required />
                    <label class="lbl-user">
                        <span class="text-user" data-lang="cellphone"> Celular</span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="email" id="email" name="email" required />
                    <label class="lbl-user">
                    <span class="text-user"> Email </span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="text" id="usuario" name="usuario" required />
                    <label class="lbl-user">
                    <span class="text-user" data-lang="username"> Usuario </span>
                    </label>
                </div>
                <div class="inputs">
                    <input type="password" id="contraseña" name="Contraseña" required />
                    <label class="lbl-user">
                    <span class="text-user" data-lang="password"> Contraseña </span>
                    </label>
                </div>
            </div>
        </div>
        <div class="register-button">
            <a href="#" onclick="Register()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <i class="fas fa-user"></i>Register
            </a>
        </div>
        
    </div>

    <div id="footer"></div>
  </body>
</html>


<!-- 

                                                                                                    
                                                          .&           &                                                    
                                                          ,&&          &&                                                  
                                                            #&&&         &&%                                                
                                                            ,&&&&,       &&&.                                              
                                                              &&&&&&      &&&&                                             
                                                                &&&&&&&&    &&&&&                                           
                                                                  &&&&&&&&&  #&&&&&                                         
                                                                    &&&&&&&&&&&      &                                      
                                                                      &&&&&&&&&&&&&&&&&&&&                                 
                                                    *&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&                            
                                              (&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&                         
                                          &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&                       
                                      &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&    /&&&&&&&&&&&                      
                                    &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&         &&&&&&&&                     
                                  &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&,  &&&&&&&&&                  
                                &&&&&&&&&&&&&&&                    &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&#         
                              &&&&&&&&&&&&*                          &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&/ 
                            (&&&&&&&&&(                                &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
                            &&&&&&&&                                     &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
                          &&&&&&                                         &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
                          &&&&                                              &&&&&&&&&&&&&&&&&&&&&&(&&&&&&&&&&&&&&&&&&&&&&&&%
                        #&&                                                     #                           %&&&&&&&&&&&&( 
                        &                                                                                        ,&&&&&&   
                                                                                                                    /&& 

   &&&&&&&&&&&&  *&&&&    &&&&, ,&&&&&&&&&&&&   &&&&&&&&&&&& &&&&&&&&&&&&#   &&&&      &&&& .&&&&    &&&&%  &&&&&&&&&&&    &&&&&&&&&&&&*      #&&&&&     
  &&&&.     &&&&   &&&&  &&&&            &&&&   &&&&                  &&&&   &&&&      &&&&   &&&&  &&&&            &&&&&           &&&&     (&&&&&&&    
                    &&&&&&&&    ,&&&&&&&&&&&(   &&&&&&&&&&,          &&&&&   &&&&&&&&&&&&&&    &&&&&&&&              &&&&         .&&&&&    #&&&( &&&&   
 &&&&&               &&&&&&     ,&&&&,,,(&&&&   &&&&,,,,,,   &&&&&&&&&&(     &&&&,,,,,,&&&&     &&&&&&      &&&&     &&&&  &&&&&&&&&&.      &&&&   &&&&  
  &&&&&    *&&&&      &&&&      ,&&&&    *&&&&  &&&&         &&&&   &&&&&    &&&&      &&&&      &&&&       &&&&    &&&&,  &&&&   &&&&#    &&&&&&&&&&&&& 
   .&&&&&&&&&&/       &&&&      ,&&&&&&&&&&&&   &&&&&&&&&&&& &&&&    &&&&&   &&&&      &&&&      &&&&       &&&&&&&&&&(    &&&&    &&&&&  &&&&      &&&&&

                                          Copyright © 2021 CyberHydra. Todos los derechos reservados.
 -->