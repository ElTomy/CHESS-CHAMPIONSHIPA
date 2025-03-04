<?php
  include '../servidor.php';
  $server= new servidor();
  session_start();

  $usuario = $_GET['Usuario'];

  $usuario_info = $server->PerfilUsuario($usuario);
  list($ELO,$Victorias,$Tablas,$Derrotas,$Coronaciones,$Comidas,$Menos_Tiempo,$Menos_Movimientos) = $server->InfoEstadisticas($usuario_info['usuario']);


  $logros = $server->TraigoLogros();
  $numero_logros = count($logros);

  $trofeos = $server->traigoTrofeos($usuario);
  $numero_trofeos = count($trofeos);
  
  $mislogros = $server->TraigoMisLogros($usuario);
  $numero_mislogros = count($mislogros);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../Javascript/Loader.js"></script>
    <script src="../Usuarios/js/Usuario.js"></script>
    <script src="../Usuarios/js/function-usuarios.js"></script>
    <script src="JS/Logros.js"></script>

    <link
      rel="shortcut icon"
      href="../media/svg/Logo/Favicon.svg"
      type="image/x-icon"
    />
    
    <link rel="stylesheet" href="../styles/styles.css" />

    <title>ChessUY | 

      <?php
            if(isset($_SESSION['usuario'])){
              if($usuario == $_SESSION['usuario']){
                echo "<span data-lang='my-profile'>Mi Perfil</span>";
              }else{
                echo $usuario;
              }
            }else{
              echo $usuario;
            } 
      ?>

    </title>
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

    <section class="profile-wrapper">
        <div class="profile-body">
            <a href="/ChessUY/Index">
              <img src="/ChessUY/media/svg/Logo/Logo(ForDarkVersion).svg" alt="">
            </a>
            <?php
              echo '<div class="profile-avatar">
                <div class="profile-flex">';

                if($usuario_info['tipo'] == "0"){
                  echo '  <div class="profile-body-picture" style="border: 2px solid '.$usuario_info['ColorIcono'].'; animation: spin 4s infinite linear ; box-shadow: 0 0 15px 0 '.$usuario_info['ColorIcono'].'; background-color: '. $usuario_info['ColorFondo'] .'">
                            <i class="' . $usuario_info['Icono'] . '" style="color: '.$usuario_info['ColorIcono'].'"></i>
                          </div>';
                }else{
                  echo '  <div class="profile-body-picture" style="background-color: '. $usuario_info['ColorFondo'] .'">
                            <i class="' . $usuario_info['Icono'] . '" style="color: '.$usuario_info['ColorIcono'].'"></i>
                          </div>';
                }
                  echo ' <div class="profile-avatar-body">';
                    echo "<p>" . $usuario_info['usuario'] . "</p>";
                    if($usuario_info['tipo'] == 0){
                      $tipo = "<i class='fas fa-star'></i> <span data-lang='admin'>Administrador</span>";
                    }else if($usuario_info['tipo'] == 1){
                      $tipo = "<i class='fas fa-chess-knight'></i> <span data-lang='player'>Jugador</span>";
                    }else if($usuario_info['tipo'] == 2){
                      $tipo = "<i class='fas fa-ruler-horizontal'></i> <span data-lang='reff'>Árbitro</span>";
                    }else if($usuario_info['tipo'] == 3){
                      $tipo = "<i class='fas fa-microphone'></i> <span data-lang='journalist'>Periodista</span>";
                    }
                    echo "<p class='tipo-profile'>$tipo</p>";
                  ?>
                    </div>
                  </div>
                  <?php

                  if(isset($_SESSION['usuario'])){
                    if($usuario_info['usuario'] == $_SESSION['usuario'] || $_SESSION['tipo'] == 0){
                      echo '<a href="/ChessUY/Profile/Editar/' . $usuario_info['usuario'] . '"><i class="fas fa-edit"></i> <span data-lang="edit-profile">Editar Perfil</a>';
                    }
                  }else{

                  }
                  

                  ?>
                  
            </div>

            <?php

            if($numero_trofeos > 0){
              echo '<section class="trofeos-wrapper">
                      <div class="trofeo-header">
                        <h1 data-lang="trophies">Trofeos</h1>
                        <div class="trofeos-list">';

                        for($x = 0; $x < $numero_trofeos; $x++){
                          echo '<div class="trofeo">
                                  <div class="trofeo-img">
                                    <img src="'.$trofeos[$x]["Tipo"].'" alt="">
                                  </div>
                                  <div class="trofeo-body">
                                    <h1>'.$trofeos[$x]["nombre"].'</h1>
                                  </div>
                                </div>';
                        }

                        echo '
                        </div>

                      </div>
                    </section>';
            }

            ?>

            
            
            <div class="profile-grid">

              <div class="estadisticas-wrapper">
              <?php

              if($ELO !== null){
                echo "
                <div class='estadisticas-header'>
                  <h1 data-lang='stats'>Estadisticas</h1>
                </div>
                <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-elo'>ELO:</h1><p>" .$ELO . "</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-victories'>Victorias:</h1><p>$Victorias</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-draw'>Tablas:</h1><p>$Tablas</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-defeats'>Derrotas:</h1><p>$Derrotas</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-promote'>Coronaciones:</h1><p>$Coronaciones</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-eaten'>Piezas Comidas:</h1><p>$Comidas</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-time-victories'>Victoria en menos tiempo:</h1><p>$Menos_Tiempo</p>
                        </div>
                        <div class='estadisticas-body'>
                          <h1 class='estadisticas-titulo' data-lang='profile-move-victories'>Victoria en menos movimientos:</h1><p>$Menos_Movimientos</p>
                        </div>";
              }else{
                echo "<div class='estadisticas-empty'>
                        <h1><i class='fas fa-exclamation'></i> <span data-lang='sorry'>Lo sentimos...</span></h1>
                        <p data-lang='no-stats-to-show'>No hay estadisticas para mostrar.</p>
                      </div>";
              }
              
              echo '
              </div>

              <div class="logros-wrapper">
                <div class="logros-header">
                  <h1 data-lang="achievements">Logros</h1><p>('.$numero_mislogros.')</p>
                </div>

                <div id="logros">';
                $contador = 1;

                do{

                  for($x = 1; $x < $numero_logros; $x ++){
                    if($contador <= 4){

                      if(isset($mislogros[($contador - 1)]['ID'])){

                        $ID = $mislogros[($contador - 1)]['ID'];
    
                        echo ' <div class="logro-wrapper">
                                  <div class="logro">
    
                                      <div class="logro-img">
                                          <img src="'. $logros[($ID - 1)]['Imagen'] .'" alt="">
                                          <i class="fas fa-lock" id="locked"></i>
                                      </div>
    
                                      <div class="logro-body">
                                          <h1>'. $logros[($ID - 1)]['Nombre'] .'</h1>
                                          <p>'. $logros[($ID - 1)]['Descripcion'] .'</p>
                                          <p class="porcentaje">'. $logros[($ID - 1)]['Porcentaje'] .'<span data-lang="percentage-achievement">% de los usuarios tienen este logro.</span></p>
                                      </div>
                                  </div>
                              </div>';
    
                              $contador++;
                      }else{
                        echo ' <div class="logro-wrapper">
                                  <div class="logro locked">
    
                                      <div class="logro-img">
                                          <img src="'. $logros[($x - 1)]['Imagen'] .'" alt="">
                                          <i class="fas fa-lock" id="locked"></i>
                                      </div>
    
                                      <div class="logro-body">
                                          <h1>'. $logros[($x - 1)]['Nombre'] .'</h1>
                                          <p>'. $logros[($x - 1)]['Descripcion'] .'</p>
                                          <p class="porcentaje">'. $logros[($x - 1)]['Porcentaje'] .'<span data-lang="percentage-achievement">% de los usuarios tienen este logro.</span></p>
                                      </div>
                                  </div>
                              </div>';
    
                              $contador++;
                      }
                    }
                    
                  }
                } while($contador <= 4);


                echo '</div>
                <a class="ver-logros" href="/ChessUY/Profile/Logros/'.$usuario.'"><i class="fas fa-medal"></i>Ver todos los logros</a>
              </div>
            </div>
        </div>
    </section>

    <div id="footer">
    </div>
  </body>
</html>';
?>


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