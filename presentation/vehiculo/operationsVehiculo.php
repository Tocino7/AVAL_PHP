<?PHP

require_once dirname(dirname(__DIR__)) . '/model/enums/Operations.php';
require_once dirname(dirname(__DIR__)) . '/model/enums/Entities.php';
require_once dirname(dirname(__DIR__)) . '/model/controller/FrontController.php';

if (!isset($_REQUEST["operation"])) {
    echo "<p><a href='viewVehiculo.php?operation=" . Operations::CREATE . "'><button type='button' >CREAR NUEVO VEHICULO</button></a></p>";
    echo "<p><a href='operationsVehiculo.php?operation=" . Operations::READ . "'><button type='button' >VER VEHICULO</button></a></p>";
    echo "<p><a href='operationsVehiculo.php?operation=" . Operations::UPDATE . "'><button type='button' >EDITAR VEHICULO</button></a></p>";
    echo "<p><a href='operationsVehiculo.php?operation=" . Operations::DELETE . "'><button type='button' >ELIMINAR VEHICULO</button></a></p>";
} else {

    $ids = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::TOLIST, null);

    if (sizeof($ids) > 0) {
        foreach ($ids as $id) {
            $modelo = FrontController::getInstance()->execute(Entities::VEHICULO, Operations::READ, $id)->getModelo();
            echo "<p><a href='viewVehiculo.php?operation=" . $_REQUEST["operation"] . "&id=$id'><button type='button' >$modelo</button></a></p>";
        }
    } else {
        echo "sin resultados";
    }
}
