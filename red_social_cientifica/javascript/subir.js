
var boton="";
var cadena="";
var parrafosResumen ="";
var parrafoResumen ="";
var citar_Resumen ="";
var res="";
var resumen="";
var boton_contenidos="";
var i=0;
function iniciar(){
    boton=document.getElementById( "descripcionArchivos" ).addEventListener( "click", ejecutar, false );
    citar_Resumen=document.getElementById( "refResumen" ).addEventListener( "click", addParrafoResumen, false );
    //parrafosResumen=addParrafoResumen();
    boton_contenidos=document.getElementById( "contenidos_boton" ).addEventListener( "click", mostrar_contenido, false );


}
function ejecutar(){
    cadena+="<input type=" +'"text"'+ 'name="alt" placeholder ='+"Descripcion de archivo><br>";
    /*Si se hace click de manera iterativa, se puede invocar a varios eventos y como cadena es un acumulador, simplemente absorvera lo que tiene y aumentara lo asignado */
    document.getElementById("addDescripcionArchivos").innerHTML =  cadena;
    /* La cadena se convierte a codigo html y se inyecta hacia el id de addDescripcionArchivos*/
}
function addParrafoResumen(){
    cadena="<input type=" +'"text"'+ 'name="refResumen1" placeholder ='+" \"escribir nombre de autor\" ><br>"+
    "<input type=" +'"text"'+ 'name="refResumen2" placeholder ='+" \"escribir el anio de publicacion\"><br>"+"<input type=" +
    '"text"'+ 'name="refResumen3" placeholder ='+" \"escribir el titulo de la publicacion\"><br>";;
    /*Si se hace click de manera iterativa, se puede invocar a varios eventos y como cadena es un acumulador, simplemente absorvera lo que tiene y aumentara lo asignado */
    document.getElementById("addRefResumen").innerHTML =  cadena;
    i++;

}
function addReferenciaResumen(){
    var referenciaResumen ="";
    resumen=referenciaResumen;

    
}
function mostrar_contenido(){
	document.getElementById("mostrando_contenidos").innerHTML = "<h1>Hola</h1>";
	/*"<?php echo \"\"<p>Categoria:\". $posts['categoria'].\"<br>\".$posts['contenido'].\"</p>\"\";?>";*/
}


window.addEventListener( "load", iniciar, false );


