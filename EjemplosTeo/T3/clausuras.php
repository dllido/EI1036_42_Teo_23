<?php
$colorCoche = 'rojo';
$colorCoche2 = 'verde';
$mostrarColor = function() use ($colorCoche,$colorCoche2) {
    $colorCoche = 'azul';
    print("$colorCoche - $colorCoche2\n");
};
$colorCoche2 = 'amarillo';
$mostrarColor();
print("$colorCoche-$colorCoche2\n"); // Mostrará rojo
?>