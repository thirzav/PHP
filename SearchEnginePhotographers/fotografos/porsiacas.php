
<div id="contenido1">
                <div id="div_arriba_titulo">
                    <h1><?php echo $fotografo->getNombreF() . " " . $fotografo->getApellido1F() . " " . $fotografo->getApellido2F() ?></h1>
                </div>
                <div id="div_medio">
                    <div>
                        <div id="div_medio_img">
                            <img src="<?php echo $fotografo->getFotoPerfil() ?>" alt="imagen de perfil" id="img_perfil">
                        </div>
                    </div>
                    <div id="div_medio_datosEmpresa">
                        <h2>Datos de empresa:</h2>
                        <p><strong>Nombre: </strong><?php echo $fotografo->getNombreEmpresa() ?></p>
                        <p><strong>NIF: </strong><?php echo $fotografo->getNif() ?></p>
                        <p><?php echo $fotografo->getDescripcionF() ?></p>
                    </div>
                </div>
                <div id="div_abajo">
                    <div id="div_abajo_izquierda">
                        <h2>Dirección:</h2>
                        <p><?php echo $fotografo->getCalle() ?></p>
                        <p><?php echo $fotografo->getPostcodeF() . " " . $fotografo->getCiudadF() ?></p>
                    </div>
                    <div id="div_abajo_derecha">
                        <h2>Datos de contacto</h2>
                        <p><strong>Email: </strong><?php echo $fotografo->getEmail() ?></p>
                        <p><strong>Teléfono: </strong><?php echo $fotografo->getTelefonoF() ?></p>
                    </div>

                </div>
            </div>

            <div id="contenido2">
                <form action="modFotografo.php?fotografo_id=<?php echo $fotografo_id ?>" method="POST" enctype="multipart/form-data">
                    <div id="container2">
                        <div id="div_arriba_titulo">
                            <h1 id="titulo_registrar">Editar perfil</h1>
                        </div>
                        <div id="div_medio1">
                            <div id="div_medio_img_user">
                                <img src="<?php echo $fotografo->getFotoPerfil()?>" alt="" id="img_user">
                                <label for="foto_perfil"></label>
                                <input type="file" name="foto_perfil" id="foto_perfil" value="<?php echo $fotografo->getFotoPerfil() ?>"/>
                                <input type="hidden" name="foto_perfil2" id="foto_perfil2" value="<?php echo $fotografo->getFotoPerfil() ?>"/>
                            </div>
                            <div>
                                <h3 class="titulo_txtbox">Nombre completo:</h3>
                                <div class="div_input">
                                    <input type="text" name="nombreF" id="nombreF" value="<?php echo $fotografo->getNombreF()?>" required/>
                                    <label for="nombreF">Nombre</label>     
                                </div>
                                <div id="div_txtbox_nombre">

                                    <div class="div_input">
                                        <input type="text" name="apellido1F" id="apellido1F" value="<?php echo $fotografo->getApellido1F()?>" required/>
                                        <label for="apellido1F">Primer apellido</p>
                                    </div>   

                                    <div class="div_input">
                                        <input type="text" name="apellido2F" id="apellido2F" value="<?php echo $fotografo->getApellido2F()?>"/>
                                        <label for="apellido2F">Segundo apellido</label>
                                    </div>  

                                </div>
                            </div>

                        </div>
                        <div id="div_medio2">
                            <div>
                                <label for="descripcionF" id="sobreTi"><strong>Sobre ti:</strong></label>
                            </div>
                            <div>
                                <textarea name="descripcionF" id="descripcionF" required><?php echo $fotografo->getDescripcionF()?></textarea>
                            </div>
                        </div>
                        <div id="div_medio3">
                            <div>
                                <h3 class="titulo_txtbox">Datos de la empresa:</h3>
                                <div id="div_txtbox_nombre">

                                    <div class="div_input">
                                        <input type="text" id="nombreEmpresa" name="nombreEmpresa" value="<?php echo $fotografo->getNombreEmpresa()?>" required/>
                                        <label for="nombreEmpresa">Nombre empresa</p>
                                    </div>   

                                    <div class="div_input">
                                        <input type="text" name="nif" id="nif" value="<?php echo $fotografo->getNif()?>" required/>
                                        <label for="nif">NIF</label>
                                    </div>  
                                                            
                                </div>
                            </div>
                        </div>
                        <div id="div_medio4">
                            <div>
                                <h3 class="titulo_txtbox">Dirección:</h3>
                                <div class="div_input">
                                    <input type="text" name="calle" id="calle" value="<?php echo $fotografo->getCalle()?>" required>
                                    <label for="calle" id="label_calle">p.e. Benidorm 24, 4º 2ª</label>
                                </div>

                                <div id="div_txtbox_nombre">

                                    <div class="div_input">
                                        <input type="text" name="postcodeF" id="postcodeF" value="<?php echo $fotografo->getPostcodeF()?>" required>
                                        <label for="postcode_f">Código Postal</label>
                                    </div>   

                                    <div class="div_input">
                                        <input type="text" name="ciudadF" id="ciudadF" value="<?php echo $fotografo->getCiudadF()?>" required>
                                        <label for="ciudadF">Ciudad</label>
                                    </div>  
                                        
                                </div>
                            </div>
                            <div>
                                <div class="div_input" id="input_contacto">
                                    <h3 class="titulo_txtbox">Datos de contacto</h3>
                                </div>
                                <div id="div_txtbox_nombre">
                                    <div id="div_input_emailTel">
                                        <input type="email" name="emailF" id="emailF" value="<?php echo $fotografo->getEmail()?>" required>
                                        <label for="emailF" id="label_email">Email</label>
                                        <input type="telefonoF" name="telefonoF" id="telefonoF" value="<?php echo $fotografo->getTelefonoF()?>">
                                        <label for="telefonoF">Número de teléfono</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="div_abajo">
                            <div id="div_btn_submit">
                                <input type="submit" id="btn_submit" value="Guardar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="contenido3">

            </div>