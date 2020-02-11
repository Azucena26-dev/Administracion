<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta name="description" content="Panel administrador KODIGO" />
    <meta name="author" content="KODIGO" />
    <title>SOLICITUD DE INGRESO – KODIGO. | <?php echo GlobalValuesPage::TitleGlobal; ?></title>

    <!-- steps -->
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('plugins/steps/steps.css', 'Assets') ?>" />

    <?php $this->renderPartial('head', 'php') ?>
    <link rel="stylesheet"
          href="<?php echo $this->_helpers->linkTo('plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css', 'Assets') ?>">
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2.css', 'Assets') ?>" rel="stylesheet"
          type="text/css">
    <link href="<?php echo $this->_helpers->linkTo('plugins/select2/css/select2-bootstrap.min.css', 'Assets') ?>"
          rel="stylesheet" type="text/css">
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-blue white-sidebar-color logo-blue">
<div class="page-wrapper">
    <?php require_once "views/partials/_header_top.php"; ?>
    <!-- start page container -->
    <div class="page-container">
        <!-- start sidebar menu -->
        <?php require_once "views/partials/_menu.php"; ?>
        <!-- end sidebar menu -->
        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content" >
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <ol class="breadcrumb page-breadcrumb pull-left" >
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>">Inicio</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a href="/admin/postulacion/consultacandidatos">ESTUDIANTE</a><i class="fa fa-angle-right"></i></li>
                            <li class="active">SOLICITUD DE INGRESO – KODIGO.</li>
                        </ol>
                    </div>
                </div>
                <!-- wizard with validation-->
                <div id="wizard" style="display:none;"></div>
                    <div class="row" >
                        <div class="col-sm-12">
                            <div class="card-body" style=" margin-top:50px">
                                <div class="card-head">
                                    <header>SOLICITUD DE INGRESO – KODIGO.</header>
                                </div>
                                <div class="card-body ">
                                    <form id="form_inputs_consultar" >

                                        <h3>Datos Personales</h3>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="card-body " id="bar-parent2">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">

                                                                <div class="form-group">
                                                                    <label>Primer Nombre:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <input type="text" class="form-control" id="nombre1" name="nombre1"   disabled= true 
                                                                    value="<?php echo $datos[0]["primer_nombre"]?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Segundo Nombre:<span class="required"> * </span></label>
                                                                    <input type="text" class="form-control" id="nombre2" name="nombre2" disabled= true value="<?php echo $datos[0]["segundo_nombre"]?>">
                                                                    
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Primer Apellido:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <input type="text" class="form-control" id="apellido" name="apellido" disabled= true value="<?php echo $datos[0]["primer_apellido"]?>" >
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Segundo Apellido:</label>
                                                                    <input type="text" class="form-control" id="apellido2" name="apellido2" disabled= true value="<?php echo $datos[0]["segundo_apellido"]?>" >
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Otros nombres:</label>
                                                                    <input type="text" class="form-control" id="otrosnombres" name="otrosnombres" disabled= true value="<?php echo $datos[0]["otro_nombre"]?>">
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label>Género:  <span class="required"> * </span></label>
                                                                    <input class="form-control" id="genero" name="genero"  disabled= true value="<?php echo $datosusuario[0]["genero"]?>">
                                                                       
                                                                    </input>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Fecha nacimiento: (AA/MM/DD)
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <input id="fecha_nacimiento" name="fecha_nacimiento"   disabled= true type="text"
                                                                        class="form-control" value="<?php echo $datosusuario[0]["fecha_nacimiento"]?>">
                                                                        
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label>Tipo Documento:<span class="required"> * </span></label>
                                                                <input class="form-control" id= "documento" name="documento"  disabled= true value="<?php echo $documenton[0]["nombre"]?>" >
                                                                    
                                                                </input>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Número de documento:<span class="required"> * </span></label>
                                                                <input type="text" class="form-control" id="ndocumento" name="ndocumento" value="<?php echo $datosusuario[0]["numero_documento"]?>" disabled= true>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Descríbete a ti mismo en máximo 50 caracteres:<span class="required"  > * </span></label>
                                                                <textarea class="form-control" rows="3" id="limite" name="limite"  disabled= true maxlength="50"> <?php echo $datosinformativos[0]["descripcion_personal"]?></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 col-sm-6">
                                                           
                                                            <div class="form-group">
                                                                <label>¿Por qué quieres ingresar a Kodigo?<span class="required"> * </span></label>
                                                                <textarea class="form-control" rows="3" id="ingresar" name="ingresar"  disabled= true maxlength="100" > <?php echo $datosinformativos[0]["razon_ingreso"]?></textarea>
                                                            </div>
                                                            
                                                         

                                                            <div class="form-group">
                                                                <label>¿Conoces a algún estudiante o egresado de Kodigo?<span class="required"> * </span></label>
                                                                <div>
                                                                    <input type="radio" name="conocesestudiante_kodigo" value="1"> Sí<br>
                                                                    <input type="radio" name="conocesestudiante_kodigo" checked value="0"> No<br>
 </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>En tus propias palabras, ¿qué crees que es Kodigo?<span class="required"> * </span></label>
                                                                <textarea class="form-control" rows="3" id="quees_kodigo" name="quees_kodigo" disabled= true  maxlength="100" > <?php echo $datosinformativos[0]["descripcion_kodigo"]?></textarea>
                                                            </div>
                                                            

                                                            <div class="form-group">
                                                                <label>¿En qué departamento de El Salvador vives? <span class="required"> * </span></label>
                                                                <input class="form-control" id="departamento" name="departamento" disabled= true  value="<?php echo $departamento[0]["departamento"]?>">
                                                                    
                                                                </input>
                                                            </div>


                                                    <!--   ####MUNICIPIOS######## -->

                                                    <div class="form-group">
                                                    <label>¿En qué Municipio vives? <span
                                                            class="required"> * </span></label>
                                                            <input class="form-control" id="muni" name="muni" disabled= true  value="<?php echo $municipio[0]["municipio"]?>">
                                                </div>
                                            
                                                    <!--  FIN  ####MUNICIPIOS######## -->

                                                            
                                                            <div class="form-group">
                                                                <label>¿Cuál es tu dirección?<span class="required"> * </span></label>
                                                                
                                                                <textarea class="form-control" rows="3" id="quees_kodigo" name="direccion" disabled= true  > <?php echo  $datosusuario[0]["direccion"]?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>En caso de ser aceptado en Kodigo, ¿crees poder asumir los costos en los que incurrirás por vivienda y/o transporte para asistir a clases?
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div>
             
                                                                    <input type="radio" name="aceptado_kodigo"  disabled <?php if($datosinformativos[0]["asumir_costos"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosinformativos[0]["asumir_costos"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                                    <input type="radio" name="aceptado_kodigo"  disabled <?php if($datosinformativos[0]["asumir_costos"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosinformativos[0]["asumir_costos"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>En caso de no poder contactarte por medio de tu correo, intentaremos hacerlo por tu perfil de Facebook. Coloca el enlace aquí:</label>
                                                                <input type="text" class="form-control" id="facebook" name="facebook" disabled  value="<?php echo $datosusuario[0]["facebook"]?>">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!--   ########################DATOS ACADEMICOS -->

                                    <h3>Datos Académicos</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="card-body " id="bar-parent2">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">

                                                            <div class="form-group">
                                                                <label>¿Eres estudiante activo?<span class="required"> * </span></label>
                                                                <div>
                                                           
                                                                    <input type="radio" name="estudiante_activo1"  disabled <?php if($datosusuario[0]["estudiante_activo"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosusuario[0]["estudiante_activo"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                                    <input type="radio" name="estudiante_activo0"  disabled <?php if($datosusuario[0]["estudiante_activo"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosusuario[0]["estudiante_activo"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                    
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Nivel académico:<span class="required"> * </span></label>
                                                                <input class="form-control" id="nivelacademicopersonal" onChange="nivelFuncion(this)" name="nivelacademicopersonal" disabled= true value="<?php echo $nivel[0]["tipo_nivel_academico"]?>">
                                                                    
                                                                </input>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>¿Qué carrera estudiaste / estás estudiando?</label>
                                                                <input type="text" disabled=true class="form-control" id="carrera" name="carrera"   maxlength="100" value="<?php echo $datosusuario[0]["carrera_estudiada"]?>" >
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Nombre del centro de estudio al que asistes o asististe más reciente:<span class="required"> * </span></label>
                                                                <input type="text" disabled=true class="form-control" id="ce_procedencia"  maxlength="200"  name="ce_procedencia"value="<?php echo $datosusuario[0]["centro_estudio"]?>" >
                                                            </div>
                                                        </div>
                                                    </div>                                                      
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!--   ########################Información académica/profesional-->

                                    <h3>Información Profesional</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">

                                                <div class="form-group"> 
                                                    <label>¿Has trabajado antes?<span class="required">*</span></label>
                                        <!--   Se llama a la funcion trabajoFuncion para los select-->
                                                    <input  type="text" class="form-control" id="trabajo" name="trabajo" disabled= true value="<?php echo $datosprofesionales[0]["trabajo_previo"]?>"><?php echo $datosprofesionales[0]["trabajo_previo"]?></option>  
                                                    
                                                </div>

                                             <!--  div donde se encuentran las opciones a ocultar-->

                                               
                                                <div class="form-group">
                                                    <label>¿Trabajas/trabajabas para una empresa o de manera independiente?</label>
                                                    <input class="form-control" id="trabajabas" name="trabajabas" disabled="true" value="<?php echo $datosprofesionales[0]["tipo_trabajo"]?>" >
                                                       
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Cuál es/era tu puesto de trabajo?</label>
                                                    <input type="text"  maxlength="100"  disabled="true"  id="roltrabajo" name="roltrabajo" class="form-control" value="<?php echo $datosprofesionales[0]["puesto_trabajo"]?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>¿Es/era un trabajo formal? (¿Recibías boletas de pago o estabas en planilla?)</label>
                                                    <div>
                                        
                                                    <input type="radio" name="trabajo_formal1"  disabled <?php if($datosprofesionales[0]["trabajo_formal"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosprofesionales[0]["trabajo_formal"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                    <input type="radio" name="trabajo_formal0"  disabled <?php if($datosprofesionales[0]["trabajo_formal"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosprofesionales[0]["trabajo_formal"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                      
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Cuánto recibes/recibías de sueldo al mes?</label>
                                                    <input type="text"  maxlength="4"  class="form-control" id="sueldo" name="sueldo"  disabled ="true" value="$<?php echo $datosprofesionales[0]["sueldo_mensual"]?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Cuál es/era tu horario?</label>
                                                    <input type="text" class="form-control" disabled="true"  id="horario" name="horario" value="<?php echo $datosprofesionales[0]["horario"]?>">
                                                       
                                                   
                                                </div> 
                                                
                                            </div>

                                            <div class="col-md-6 col-sm-6">
   
                                            </div> 
                                        </div>  
                                    </fieldset>                                

                                   
                                    <!--   ######################## Socioeconomico-->


                                    <h3>Estudio Socioeconómico</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">

                                                <div class="form-group">
                                                    <label>¿Cuál es el ingreso mensual de tu familia? (sin incluirte)
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <input type="text"  maxlength="4" class="form-control" id="ingreso_familiar" name="ingreso_familiar" disabled= true value="$<?php echo $datoseconomicos[0]["ingresos_familiares"]?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Cuántas personas más viven en tu casa? (sin incluirte)
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <input type="text"  maxlength="2" id="personas_casa" name="personas_casa" disabled= true class="form-control" value="<?php echo $datoseconomicos[0]["cantidad_personas"]?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Cuál es el nivel de estudios más alto alcanzado por tus padres?<span class="required"> * </span></label>
                                                    <input class="form-control" id="nivelacademico" name="nivelacademico" disabled= true value="<?php echo $datoseconomicos[0]["id_nivel_academico"]?>" >
                                                        
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Tienes hijos?<span class="required"> * </span></label>
                                                    <div>
                                                        <input type="radio" name="tiene_hijos"  disabled <?php if($datosusuario[0]["hijos"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosusuario[0]["hijos"] =="0"){echo "<spam style='display:none' ";}?>>Si</spam>
                                                        <input type="radio" name="tiene_hijos"  disabled <?php if($datosusuario[0]["hijos"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosusuario[0]["hijos"] =="1"){echo "<spam style='display:none' ";}?>>No</spam>
                                                    </div>
                                                </div>  
                                                   <div class="form-group">
                                                    <label>¿Qué recursos utilizarías para cubrir tus gastos?
                                                    <span class="required"> * </span>
                                                    </label>
                                                    <input class="form-control" id="recursos_gastos" name="recursos_gastos" disabled= true value="<?php echo $datosprofesionales[0]["recursos_pagar"]?>">
                                                        
                                                    </input>
                                                </div>

                                            </div> 
                                        </div>
                                    </fieldset>

                                    <!--   ########################INTERESES -->



                                    <h3>Intereses</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                
                                                <div class="form-group">
                                                    <label>Del 1 al 5, ¿cómo calificarías tu interés por la tecnología?
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <input class="form-control" id="interes_tecnologia" name="interes_tecnologia" disabled= true value="<?php echo $datosintereses[0]["puntaje_tecnologia"]?>">
                                                        
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Qué nivel tienes programando?
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <input class="form-control" id="nivel_programacion" name="nivel_programacion" disabled= true value="<?php echo $datosintereses[0]["nivel_programacion"]?>">
                                                        
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Cuál es tu actividad favorita relacionada a la tecnología?
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <input class="form-control" id="actividades" name="actividades" disabled= true value="<?php echo $datosintereses[0]["actividades"]?>">
                                                        
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Tienes computadora funcional en casa?<span class="required"> * </span></label>
                                                    <div>
                                                      
                                                        <input type="radio" name="tiene_computadora"  disabled <?php if($datosintereses[0]["computadora"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosintereses[0]["computadora"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                       <input type="radio" name="tiene_computadora"  disabled <?php if($datosintereses[0]["computadora"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosintereses[0]["computadora"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                    
                                                        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Tienes una conexión a Internet en casa?<span class="required"> * </span></label>
                                                    <div>
                                                     
                                                       <input type="radio" name="tiene_internet"  disabled <?php if($datosintereses[0]["internet"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosintereses[0]["internet"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                       <input type="radio" name="tiene_internet"  disabled <?php if($datosintereses[0]["internet"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosintereses[0]["internet"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                    

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">

                                                <div class="form-group">
                                                    <label>¿Dónde accedes al internet normalmente?<span class="required"> * </span></label>
                                                    <input class="form-control" id="acceder_internet" name="acceder_internet" disabled= true value="<?php echo $datosintereses[0]["acceso_internet"]?>">
                                                        
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Con qué frecuencia usas internet?<span class="required"> * </span></label>
                                                    <input class="form-control" id="frecuencia_internet" name="frecuencia_internet" disabled= true value="<?php echo $datosintereses[0]["frecuencia_internet"]?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Tienes smartphone?<span class="required"> * </span></label>
                                                    <div>
                                                        
                                                        <input type="radio" name="tiene_smartphone"  disabled <?php if($datosintereses[0]["smartphone"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosintereses[0]["smartphone"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                        <input type="radio" name="tiene_smartphone"  disabled <?php if($datosintereses[0]["smartphone"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosintereses[0]["smartphone"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                    

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>¿Con qué frecuencia usas la computadora?<span class="required"> * </span></label>
                                                    <input class="form-control" id="frecuencia_computadora" name="frecuencia_computadora" disabled= true value="<?php echo $datosintereses[0]["frecuencia_computadora"]?>">
                                                     
                                                    </input>
                                                </div>

                                                <div class="form-group">
                                                    <label>La próxima etapa consiste en realizar algunos exámenes. 
                                                    En caso de ser invitad@ a la próxima etapa, necesitarás una computadora 
                                                    y acceso a internet por al menos -- horas sin interrupción y un lugar 
                                                    donde puedas concentrarte. ¿Tienes cómo acceder a un espacio que cumpla con esas
                                                    características?<span class="required"> * </span></label>
                                                    <div>
                                                        
                                                        <input type="radio" name="posibilidad_etapa_examen"  disabled <?php if($datosinformativos[0]["posibilidad_etapa_examen"] =="1"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosinformativos[0]["posibilidad_etapa_examen"] =="0"){echo "<spam style='display: none' ";}?>>Si</spam>
                                                        <input type="radio" name="posibilidad_etapa_examen"  disabled <?php if($datosinformativos[0]["posibilidad_etapa_examen"] =="0"){echo "<input value='' checked type='radio'";}else{echo "<input value='' type='radio' style='display: none'";}?> > <spam <?php if($datosinformativos[0]["posibilidad_etapa_examen"] =="1"){echo "<spam style='display: none' ";}?>>No</spam>
                                                    
                                                    </div>
                                                   
                                                </div> 
                                                
                                                

                                            </div>
                                        </div>  
                                       

                                    </fieldset>  



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content -->
        <!-- end chat sidebar -->
    </div>
    <!-- end page container -->
    <!-- start footer -->
    <!-- end page container -->
    <!-- start footer -->
    <?php require_once "views/partials/_footer.php"; ?>
    <!-- end footer -->

</div>
<?php require_once "views/partials/_outputJs.php"; ?>
<script src="<?php echo $this->_helpers->linkTo('plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js', 'Assets') ?>" ></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js', 'Assets') ?>"></script>
<!-- steps -->
<script src="<?php echo $this->_helpers->linkTo('plugins/steps/jquery.steps.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('plugins/select2/js/select2.js', 'Assets') ?>"></script>
<script src="<?php echo $this->_helpers->linkTo('js/crud/ajax_call_alert_validacion.js', 'Assets') ?>"></script>

<!--solicitud.js -->
<script src="<?php echo $this->_helpers->linkTo('js/solicitud/solicitudKconsultar.js', 'Assets') ?>"> </script>


</body>
</html>