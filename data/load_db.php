<?php
/**
 * zf3 - load_db.php.
 *
 * @author: Timon Eckert <timon.eckert@abavo.de>
 * @since: 22.07.2016 - 08:31
 *
 * @copyright: since 2016 - abavo GmbH <info@abavo.de>
 * @license: Proprietary
 */
$db = new PDO('mysql:dbname=u_teckert_zf3;host=localhost;charset=utf8', 'teckert', 'teckert');
$fh = fopen(__DIR__ . '/schema.sql', 'r');

while ($line = fread($fh, 4096)) {
    $db->exec($line);
}

fclose($fh);
