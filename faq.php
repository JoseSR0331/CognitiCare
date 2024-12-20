<?php
session_start();
include("./componentes/encabezado.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - FAQ</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="Estilos/styles.css">
</head>
<body>
    <!-- Contenido Principal -->
    <div id="content" class="content container mt-5 custom-padding">
        <h1 class="text-center">Preguntas Frecuentes (FAQ)</h1>
        <div class="accordion my-5" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ¿Qué son las pruebas cognitivas?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Las pruebas cognitivas revisan si hay problemas con ciertas funciones cerebrales llamadas "cogniciones". La cognición incluye pensar, aprender, recordar y utilizar el juicio y el lenguaje. Los problemas con la cognición se conocen como "deterioro cognitivo".
                        <br><br>
                        El deterioro cognitivo es más común en personas mayores, pero no es una parte normal del envejecimiento. Puede ser causado por muchas afecciones médicas y mentales. Algunas de estas afecciones pueden ser tratables, como infecciones urinarias, depresión y efectos secundarios de los medicamentos.
                    </div>
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        ¿Para qué se usa?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Las pruebas cognitivas se usan si una persona muestra signos de un problema con la memoria, el pensamiento u otras funciones cerebrales. La prueba muestra si una persona tiene un problema que requiere más exámenes.
                    </div>
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        ¿Por qué necesito pruebas cognitivas?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Usted podría necesitar estas pruebas si muestra signos de deterioro cognitivo. Usted o su familia puede notar estos cambios. Los signos incluyen:
                        <ul>
                            <li>Olvidarse de citas y eventos importantes</li>
                            <li>Perder cosas a menudo</li>
                            <li>Dificultad para encontrar palabras que usted habitualmente sabe</li>
                            <li>Perder el hilo de las ideas en conversaciones, películas o libros</li>
                            <li>Sentir más irritabilidad y/o ansiedad</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- FAQ 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        ¿Debo hacer algo para prepararme para las pruebas cognitivas?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Las pruebas cognitivas no requieren ningún preparativo especial.
                    </div>
                </div>
            </div>
            <!-- FAQ 5 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        ¿Qué significan los resultados?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        El resultado de su prueba será una puntuación.
                        <br><br>
                        Si sus resultados son normales, de todas formas podría tener algún deterioro cognitivo que la prueba no muestre. Si usted o su familia están preocupados acerca de su función cerebral, pero sus resultados fueron normales, hable con su profesional de la salud sobre otro tipo de prueba cognitiva.
                        <br><br>
                        Si su puntuación es más baja de lo normal, en general significa que tiene un nivel de deterioro cognitivo. Sin embargo, su profesional de la salud no puede hacer un diagnóstico sólo con el resultado de la prueba.
                        <br><br>
                        Su profesional de la salud también puede pedir pruebas para confirmar o descartar afecciones tratables que pueden estar causando deterioro cognitivo. Las pruebas a las que se someta dependerán de su historia clínica, examen físico y los resultados de la prueba cognitiva. Es posible que le hagan pruebas para detectar afecciones tratables como:
                        <ul>
                            <li>Enfermedades vasculares</li>
                            <li>Trastornos del sueño</li>
                            <li>Hipotiroidismo</li>
                            <li>Falta de ciertas vitaminas, como vitamina B12 o minerales</li>
                            <li>Afecciones de salud mental como depresión, ansiedad o estrés</li>
                            <li>Conmoción cerebral u otras lesiones de la cabeza por un accidente o caída</li>
                            <li>Accidente cerebrovascular</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- FAQ 6 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        ¿Debo saber algo más sobre las pruebas cognitivas?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Usted puede haber escuchado acerca de pruebas cognitivas que puede hacer por sí mismo en línea. Si usted o alguien que conoce está preocupado acerca de un impedimento cognitivo, hacer este tipo de pruebas puede ayudar. Sin embargo, es importante hacer un seguimiento con su profesional de la salud para discutir los resultados y otras pruebas que usted puede necesitar para diagnosticar su afección apropiadamente.
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-5">
            <a href="referencias.php" class="btn btn-primary btn-custom">
                <i class="bi bi-book"></i> Referencias
            </a>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include("./componentes/pie.php");
    ?>

    <!-- Scripts de la página -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Pasar el array de PHP a JavaScript
    const pages = <?php echo json_encode($pages); ?>;
    </script>
    <!-- Main JS -->
    <script src="Scripts/main.js"></script>
</body>
</html>

