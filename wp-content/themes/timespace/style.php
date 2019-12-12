<?
// SCSSPHP Plugin initiator
require_once "scssphp/scss.inc.php";
require_once "scssphp/example/Server.php";

use Leafo\ScssPhp\Server;

use Leafo\ScssPhp\Compiler;

$scss = new Compiler();
$scss->setImportPaths('scss');
$scss->setSourceMap(Compiler::SOURCE_MAP_INLINE);

$directory = "scss";

$server = new Server($directory, null, $scss);
$server->serve();
?>
