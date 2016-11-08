<?php
function fill_masses($mysqli, $filename)
{
    $query = <<<eof
LOAD DATA LOCAL INFILE '$filename' INTO TABLE hypatia_masses
FIELDS TERMINATED BY ' '
LINES TERMINATED BY '\n'
(mass, @var)
SET channel = TRIM(TRAILING '\r' FROM @var)
eof;
    $mysqli->query($query);
}
?>
