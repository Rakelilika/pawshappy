<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PawsHappy') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="styles" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Script -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="banner text-center">
        <div class="banner-overlay-register">
            <div class="container-privacidad">
                <div class="d-flex justify-content-center">
                    <div class="card2">
                        <div>
                            <h2 class="card-header">Política de Privacidad</h2>
                        </div>
                        <div class="card-body">
                            <h3>Protección de datos de carácter personal según la LOPDGDD</h3>
                            <p>PawsHappy, en aplicación de la normativa vigente en materia de protección de datos de
                                carácter personal, informa que los datos personales que se recogen a través de los
                                formularios del Sitio web: PawsHappy, se incluyen en los ficheros automatizados
                                específicos de usuarios de los servicios de PawsHappy.

                                La recogida y tratamiento automatizado de los datos de carácter personal tiene como
                                finalidad el mantenimiento de la relación comercial y el desempeño de tareas de
                                información, formación, asesoramiento y otras actividades propias de PawsHappy.

                                Estos datos únicamente serán cedidos a aquellas entidades que sean necesarias con el
                                único objetivo de dar cumplimiento a la finalidad anteriormente expuesta.

                                PawsHappy adopta las medidas necesarias para garantizar la seguridad, integridad y
                                confidencialidad de los datos conforme a lo dispuesto en el Reglamento (UE) 2016/679 del
                                Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de
                                las personas físicas en lo que respecta al tratamiento de datos personales y a la libre
                                circulación de los mismos.

                                El usuario podrá en cualquier momento ejercitar los derechos de acceso, oposición,
                                rectificación y cancelación reconocidos en el citado Reglamento (UE). El ejercicio de
                                estos derechos puede realizarlo el propio usuario a través de email a:
                                <a class="strong" href="mailto:pawshappyco@gmail.com">pawshappyco@gmail.com</a> o en la
                                dirección: ______.

                                El usuario manifiesta que todos los datos facilitados por él son ciertos y correctos, y
                                se compromete a mantenerlos actualizados, comunicando los cambios a PawsHappy.
                            </p>

                            <h3>Finalidad del tratamiento de los datos personales:</h3>
                            <p>¿Con qué finalidad trataremos tus datos personales?
                                En PawsHappy, trataremos tus datos personales recabados a través del Sitio Web:
                                __________, con las siguientes finalidades:

                                1. En caso de contratación de los bienes y servicios ofertados a través de PawsHappy,
                                para mantener la relación contractual, así como la gestión, administración, información,
                                prestación y mejora del servicio.

                                2. Envío de información solicitada a través de los formularios dispuestos en PawsHappy
                                3. Remitir boletines (newsletters), así como comunicaciones comerciales de promociones
                                y/o publicidad de PawsHappy y del sector.

                                Te recordamos que puedes oponerte al envío de comunicaciones comerciales por cualquier
                                vía y en cualquier momento, remitiendo un correo electrónico a la dirección indicada
                                anteriormente.

                                Los campos de dichos registros son de cumplimentación obligatoria, siendo imposible
                                realizar las finalidades expresadas si no se aportan esos datos.</p>

                            <h3>¿Por cuánto tiempo se conservan los datos personales recabados?</h3>
                            <p>Los datos personales proporcionados se conservarán mientras se mantenga la relación
                                comercial o no solicites su supresión y durante el plazo por el cuál pudieran derivarse
                                responsabilidades legales por los servicios prestados. Legitimación:

                                El tratamiento de tus datos se realiza con las siguientes bases jurídicas que legitiman
                                el mismo:

                                1. La solicitud de información y/o la contratación de los servicios de PawsHappy, cuyos
                                términos y condiciones se pondrán a tu disposición en todo caso, de forma previa a una
                                eventual contratación.

                                2. El consentimiento libre, específico, informado e inequívoco, en tanto que te
                                informamos poniendo a tu disposición la presente política de privacidad, que tras la
                                lectura de la misma, en caso de estar conforme, puedes aceptar mediante una declaración o 
                                una clara acción afirmativa, como el marcado de una casilla dispuesta al efecto.

                                En caso de que no nos facilites tus datos o lo hagas de forma errónea o incompleta, no
                                podremos atender tu solicitud, resultando del todo imposible proporcionarte la
                                información solicitada o llevar a cabo la contratación de los servicios.</p>

                            <h3>Destinatarios:</h3>
                            <p>Los datos no se comunicarán a ningún tercero ajeno a PawsHappy, salvo obligación legal.

                                Como encargados de tratamiento, tenemos contratados a los siguientes proveedores de
                                servicios, habiéndose comprometido al cumplimiento de las disposiciones normativas, de
                                aplicación en materia de protección de datos, en el momento de su contratación:

                                 (ENCARGADO) Raquel Diaz Rey, con domicilio en Avda del deporte nº5 39002 Santander
                                Cantabria, NIF/CIF nº 720368745R, presta servicios de director.</p>

                            <h3> Datos recopilados por usuarios de los servicios</h3>
                            <p> los casos en que el usuario incluya ficheros con datos de carácter personal en los
                                servidores de alojamiento compartido, PawsHappy no se hace responsable del
                                incumplimiento por parte del usuario del RGPD.</p>

                            <h3>Retención de datos en conformidad a la LSSI</h3>
                            <p>PawsHappy informa de que, como prestador de servicio de alojamiento de datos y en
                                virtud de lo establecido en la Ley 34/2002 de 11 de julio de Servicios de la Sociedad de
                                la Información y de Comercio Electrónico (LSSI), retiene por un periodo máximo de 12
                                meses la información imprescindible para identificar el origen de los datos alojados y 
                                el momento en que se inició la prestación del servicio. La retención de estos datos 
                                no afecta al secreto de las comunicaciones y sólo podrán ser utilizados en el marco 
                                de una investigación criminal o para la salvaguardia de la seguridad pública, poniéndose 
                                a disposición de los jueces y/o tribunales o del Ministerio que así los requiera.

                                La comunicación de datos a las Fuerzas y Cuerpos del Estado se hará en virtud a lo
                                dispuesto en la normativa sobre protección de datos personales.</p>

                            <h3>Derechos propiedad intelectual PawsHappy</h3>
                            <p>Raquel Diaz Rey es titular de todos los derechos de autor, propiedad intelectual,
                                industrial, “know how” y cuantos otros derechos guardan relación con los contenidos del
                                sitio web ___________ y los servicios ofertados en el mismo, así como de los programas 
                                necesarios para su implementación y la información relacionada.

                                No se permite la reproducción, publicación y/o uso no estrictamente privado de los
                                contenidos, totales o parciales, del sitio web PawsHappy sin el consentimiento previo y
                                por escrito.</p>

                            <h3>Propiedad intelectual del software</h3>
                            <p>El usuario debe respetar los programas de terceros puestos a su disposición por
                                PawsHappy, aun siendo gratuitos y/o de disposición pública.

                                PawsHappy dispone de los derechos de explotación y propiedad intelectual necesarios del
                                software.

                                El usuario no adquiere derecho alguno o licencia por el servicio contratado, sobre el
                                software necesario para la prestación del servicio, ni tampoco sobre la información
                                técnica de seguimiento del servicio, excepción hecha de los derechos y licencias necesarios para el
                                cumplimiento de los servicios contratados y únicamente durante la duración de los mismos.

                                Para toda actuación que exceda del cumplimiento del contrato, el usuario necesitará
                                autorización por escrito por parte de PawsHappy, quedando prohibido al usuario acceder,
                                modificar, visualizar la configuración, estructura y ficheros de los servidores propiedad de
                                PawsHappy, asumiendo la responsabilidad civil y penal derivada de cualquier incidencia que se 
                                pudiera producir en los servidores y sistemas e seguridad como consecuencia directa de una actuación
                                negligente o maliciosa por su parte.
                            </p>

                            <h3>Propiedad intelectual de los contenidos alojados</h3>
                            <p>Se prohíbe el uso contrario a la legislación sobre propiedad intelectual de los servicios
                                prestados por PawsHappy y, en particular de:

                                • La utilización que resulte contraria a las leyes españolas o que infrinja los derechos
                                de terceros.
                                • La publicación o la transmisión de cualquier contenido que, a juicio de PawsHappy,
                                resulte violento, obsceno, abusivo, ilegal, racial, xenófobo o difamatorio.
                                • Los cracks, números de serie de programas o cualquier otro contenido que vulnere
                                derechos de la propiedad intelectual de terceros.
                                • La recogida y/o utilización de datos personales de otros usuarios sin su
                                consentimiento expreso o contraviniendo lo dispuesto en Reglamento (UE) 2016/679 del
                                Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de las personas
                                físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de los
                                mismos.
                                • La utilización del servidor de correo del dominio y de las direcciones de correo
                                electrónico para el envío de correo masivo no deseado.

                                El usuario tiene toda la responsabilidad sobre el contenido de su web, la información
                                transmitida y almacenada, los enlaces de hipertexto, las reivindicaciones de terceros y
                                las acciones legales en referencia a propiedad intelectual,</p>

                            <h3>Derechos de terceros y protección de menores.</h3>
                            <p>El usuario es responsable respecto a las leyes y reglamentos en vigor y las reglas que
                                tienen que ver con el funcionamiento del servicio online, comercio electrónico, derechos
                                de autor, mantenimiento del orden público, así como principios universales de uso de
                                Internet.

                                El usuario indemnizará a PawsHappy por los gastos que generara la imputación de
                                ____________ en alguna causa cuya responsabilidad fuera atribuible al usuario,
                                incluidos honorarios y gastos de defensa jurídica, incluso en el caso de una decisión
                                judicial no definitiva.</p>

                            <h3>Protección de la información alojada</h3>
                            <p>PawsHappy realiza copias de seguridad de los contenidos alojados en sus servidores, sin
                                embargo no se responsabiliza de la pérdida o el borrado accidental de los datos por
                                parte de los usuarios. De igual manera, no garantiza la reposición total de los datos
                                borrados por los usuarios, ya que los citados datos podrían haber sido suprimidos y/o
                                modificados durante el periodo del tiempo transcurrido desde la última copia de
                                seguridad.

                                Los servicios ofertados, excepto los servicios específicos de backup, no incluyen la
                                reposición de los contenidos conservados en las copias de seguridad realizadas por
                                PawsHappy,
                                cuando esta pérdida sea imputable al usuario; en este caso, se determinará una tarifa
                                acorde a la
                                complejidad y volumen de la recuperación, siempre previa aceptación del usuario.

                                La reposición de datos borrados sólo está incluida en el precio del servicio cuando la
                                pérdida del contenido sea debida a causas atribuibles a PawsHappy.</p>

                            <h3>Comunicaciones comerciales</h3>
                            <p>En aplicación de la LSSI. PawsHappy no enviará comunicaciones publicitarias o
                                promocionales por correo electrónico u otro medio de comunicación electrónica
                                equivalente que previamente no hubieran sido solicitadas o expresamente autorizadas por 
                                los destinatarios de las mismas.

                                En el caso de usuarios con los que exista una relación contractual previa,
                                PawsHappy sí está autorizado al envío de comunicaciones comerciales referentes a 
                                productos o servicios de PawsHappy que sean similares a los que inicialmente fueron objeto
                                de contratación con el cliente.

                                En todo caso, el usuario, tras acreditar su identidad, podrá solicitar que no se
                                le haga llegar más información comercial a través de los canales de Atención al Cliente.
                            </p>
                        </div>
                    <div class="mb-30">
                        <a href="{{ route('welcome') }}">
                            {{ __('Volver') }}
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
