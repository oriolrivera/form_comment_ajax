<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Muro Tipo Facebook</title>

  <!-- Se incluye el framework de JavaScript "JQuery" -->
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>


  <script type="text/javascript">
  function loadWall(){
     //Funcion para cargar el muro
     $("#wall").load('wall.php');
     //Devuelve el campo message a vacio
     $("#msg").val("")
       }

  //Cuando el documento esta listo carga el muro
 $(document).ready(function(){
   loadWall();
 });
  </script>

  <!-- Le doy un poco de estilo-->
  <style type="text/css">
     body{
        font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
     }
     label{
        color: #808080;
        font-size: 11px;
        font-weight: bold;
        line-height: 30px;
     }
     #wrapper{
        width: 605px;
        margin-left: auto;
        margin-right: auto;
     }
     #msg{
        border: thin solid #B4BBCD !important;
        padding: 5px;
     }
     #submit{
        color: #fff;
        font-size: 13px;
        background-color: #5B74A8;
        background-image: url("background.png");
        background-position: 0 -98px;
        background-repeat: no-repeat;
        border-color: #29447E #29447E #1A356E;
       border-style: solid;
       border-width: 1px;
       cursor: pointer;
       display: inline-block;
       font-weight: bold;
       line-height: normal !important;
       padding: 4px 6px 4px;
       text-align: center;
       text-decoration: none;
       vertical-align: top;
       white-space: nowrap;
     }
     #wall{
        width: 430px;
        min-height: 200px;
        border: solid thin #B4BBCD;
        margin-top: 10px;
     }
     #wall ul{
        list-style: none;
        font-size: 12px;
        line-height: 20px;
     }
     #wall ul #date{
        font-style: italic;
        font-size: 11px;
        color: #ccc;
        padding-left: 5px;
     }
     #loading{
        float: left;
        position:relative;
        top: 10px;
        left: 450px;
        display: none;
     }
  </style>

 </head>
 <body>
 <div id="wrapper">

    <div id="form">
       <form action="javascript: addMessage();" method="post" id="form_wall">
          <label for="msg">¿Que estás pensando?</label>
          <br />
          <input type="text" name="msg" id="msg" maxlength="200" size="50" />
          <input type="submit" name="submit" id="submit" value="Comentar" />
       </form>
    <div id="loading"><img src="loading.gif" /></div>
    </div>

    <div id="wall"></div>

 </div>

<script>
   function addMessage(){

      //Tomas el valor del campo msg
      var msg = $("#msg").val();

      //Si empieza el ajax muestro el loading
      $("#loading").ajaxStart(function(){
         $("#loading").show();
      });

      //Cuando termina el ajax oculta el loading
      $("#loading").ajaxStop(function(){
         $("#loading").hide();
      });

      //Se envian los datos a url y al completarse se recarga el muro
      //con la nueva informacion
      $.ajax({
         url: 'action.php',
         data: 'msg='+ msg,
         type: 'post',
         error: function(obj, msg, obj2){
            alert(msg);
         },
         success: function(data){
            loadWall();
         }
      });
   };
</script>
 </body>
</html>